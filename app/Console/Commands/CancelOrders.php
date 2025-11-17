<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Biography;
use TaqnyatSms;

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
    private function sendSMS($phone,$msg)
    {
        $bearer = '2a17275dc72bdb4bd16a93eaf6f6530e';
        $taqnyt = new TaqnyatSms($bearer);

        $body = 'message Content';
        $recipients = ['966********'];
        $sender = 'Ejazrec';
        $smsId = '25489';

        $phone= $phone;

        //$message =$taqnyt->sendMsg($msg, $phone, $sender, $smsId);

        $result = $taqnyt->sendMsg($msg, $phone, $sender, $smsId);

        return $result;

    }

    public function handle()
    {
        $ordersToCancel = Order::with(['user:id,phone','biography:id,cv_name'])
            ->where('status', 'under_work')
            ->where('created_at', '<=', now()->subHours(48))
            ->limit(10)
            ->get();

        foreach ($ordersToCancel as $order) {

            $order->update(['status' => 'canceled']);

            $order->biography->update([
                'status' => 'new',
                'admin_id' => null,
                'user_id' => null
            ]);

            $clientPhone = $order->user->phone ?? null;
            $workerName = $order->biography->cv_name ?? 'العاملة';

            if ($clientPhone) {
                $msg = "انتهت مهلة الحجز المحددة للسيرة الذاتية: {$workerName}، وتم إلغاء الحجز تلقائيًا.";

                try {
                    $this->sendSMS($clientPhone, $msg);
                } catch (\Exception $e) {
                    \Log::error("SMS failed for Order ID {$order->id}: " . $e->getMessage());
                }
            }
        }

        return 0;
    }
}
