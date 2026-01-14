<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Biography;
use App\Jobs\SendSMSJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CancelOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel orders which have exceeded 48 hours without confirmation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lock = $this->laravel->cache->lock('cancel_orders_lock', 300);
        if (!$lock->get()) {
            Log::info('CancelOrders: Command already running.');
            return 0;
        }

        try {
            $count = Order::where('status', 'under_work')
                ->where('created_at', '<=', now()->subHours(48))
                ->count();

            if ($count === 0) {
                Log::info('CancelOrders: No orders to cancel.');
                return 0;
            }

            Order::where('status', 'under_work')
                ->where('created_at', '<=', now()->subHours(48))
                ->with(['user:id,phone','biography:id,cv_name'])
                ->chunkById(50, function ($orders) {
                    foreach ($orders as $order) {
                        DB::transaction(function() use ($order) {
                            $order->update(['status' => 'canceled']);

                            if ($order->biography) {
                                $order->biography->update([
                                    'status' => 'new',
                                    'admin_id' => null,
                                    'user_id' => null
                                ]);
                            }

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
            $lock->release();
        }

        return 0;
    }
}
