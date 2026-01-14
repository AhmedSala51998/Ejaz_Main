<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use TaqnyatSms;
use Illuminate\Support\Facades\Log;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;
    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($phone, $message)
    {
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            $bearer = '2a17275dc72bdb4bd16a93eaf6f6530e';
            $taqnyt = new TaqnyatSms($bearer);

            $sender = 'Ejazrec';
            $smsId = '25489';

            $taqnyt->sendMsg($this->message, $this->phone, $sender, $smsId);

        } catch (\Exception $e) {
            Log::error("SendSMSJob failed for {$this->phone}: " . $e->getMessage());
        }
    }
}
