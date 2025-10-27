<?php

namespace App\Console\Commands;

use App\Models\Biography;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class deleteOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $orders=Order::where('status','under_work')->where('created_at', '<=', Carbon::now()->subHours(24)->toDateTimeString())->get();

        foreach ($orders as $order){
            $cv=Biography::findOrFail($order->biography_id );
            $cv->status='new';
            $cv->save();
            $order->delete();
        }

        print_r("EL Sdodey");
    }
}
