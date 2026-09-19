<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Jobs\SendSMSJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CancelOrders extends Command
{
    protected $signature = 'cancel:orders';

    protected $description = 'Cancel orders which have exceeded the allowed time';

    public function handle()
    {
        // Lock لمدة 5 دقائق لمنع تشغيل الأمر أكثر من مرة في نفس الوقت
        $lock = $this->laravel->cache->lock('cancel_orders_lock', 300);

        if (!$lock->get()) {
            return 0;
        }

        try {

            /*
            |--------------------------------------------------------------------------
            | Philippines = 7
            | Philippines orders expire after 6 hours
            | Other nationalities expire after 48 hours
            |--------------------------------------------------------------------------
            */

            $philippinesNationalityId = 7;

            /*
            |--------------------------------------------------------------------------
            | Get orders that should be cancelled
            |--------------------------------------------------------------------------
            */

            $query = Order::where('status', 'under_work')
                ->where(function ($query) use ($philippinesNationalityId) {

                    /*
                    |--------------------------------------------------------------------------
                    | Philippines
                    | Cancel after 6 hours
                    |--------------------------------------------------------------------------
                    */

                    $query->where(function ($q) use ($philippinesNationalityId) {

                        $q->whereHas('biography', function ($bio) use ($philippinesNationalityId) {
                            $bio->where('nationalitie_id', $philippinesNationalityId);
                        })
                        ->where('created_at', '<=', now()->subHours(6));

                    })

                    /*
                    |--------------------------------------------------------------------------
                    | Other nationalities
                    | Cancel after 48 hours
                    |--------------------------------------------------------------------------
                    */

                    ->orWhere(function ($q) use ($philippinesNationalityId) {

                        $q->whereHas('biography', function ($bio) use ($philippinesNationalityId) {
                            $bio->where('nationalitie_id', '!=', $philippinesNationalityId);
                        })
                        ->where('created_at', '<=', now()->subHours(48));

                    });

                })
                ->with([
                    'user:id,phone',
                    'biography:id,cv_name,nationalitie_id'
                ]);

            /*
            |--------------------------------------------------------------------------
            | Count orders
            |--------------------------------------------------------------------------
            */

            $count = $query->count();

            if ($count === 0) {
                return 0;
            }

            /*
            |--------------------------------------------------------------------------
            | Process orders in chunks
            |--------------------------------------------------------------------------
            */

            $query->chunkById(50, function ($orders) {

                foreach ($orders as $order) {

                    DB::transaction(function () use ($order) {

                        /*
                        |--------------------------------------------------------------------------
                        | Cancel Order
                        |--------------------------------------------------------------------------
                        */

                        $order->update([
                            'status' => 'canceled'
                        ]);

                        /*
                        |--------------------------------------------------------------------------
                        | Reset Biography
                        |--------------------------------------------------------------------------
                        */

                        if ($order->biography) {

                            $order->biography->update([
                                'status'   => 'new',
                                'admin_id' => null,
                                'user_id'  => null,
                            ]);
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Send SMS to Customer
                        |--------------------------------------------------------------------------
                        */

                        $clientPhone = $order->user->phone ?? null;

                        $workerName = $order->biography->cv_name ?? 'العاملة';

                        if ($clientPhone) {

                            $msg = "انتهت مهلة الحجز المحددة للسيرة الذاتية: {$workerName}، وتم إلغاء الحجز تلقائيًا.";

                            SendSMSJob::dispatch($clientPhone, $msg);
                        }

                    });
                }
            });

        } catch (\Exception $e) {

            Log::error("CancelOrders failed: " . $e->getMessage());

        } finally {

            // Release lock
            $lock->release();
        }

        return 0;
    }
}
