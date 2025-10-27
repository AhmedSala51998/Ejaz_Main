<?php

namespace App\Http\Actions\dashboard;

use App\Enums\auth\AdminTypes;
use App\Enums\ingaz\OrderEnum;
use App\Http\Actions\ingaz\ContactAction;
use App\Http\Actions\ingaz\OrderAction;
use App\Http\Actions\ingaz\UserAction;
use App\Http\Actions\MainAction;
use App\Models\auth\Admin;
use App\Models\ingaz\Contact;
use App\Models\ingaz\JobType;
use App\Models\ingaz\Maid;
use App\Models\ingaz\Order;
use App\Models\ingaz\OrderDetail;
use App\Models\ingaz\User;
use Illuminate\Support\Facades\DB;

class DashboardAction extends MainAction
{


    public function getJobTypes(){
        $jobTypes = JobType::with('orders')->get();

        // Prepare the data for the chart
        $chartData = [];

        foreach ($jobTypes as $type) {
            // Calculate monthly order counts using the orders relationship
            $monthlyOrderCounts = $type->orders->groupBy(function ($order) {
                return $order->created_at->format('n'); // Group by month
            })->map->count()->toArray();

            // Add each job type and its monthly order counts to the chart data
            $chartData[] = [
                'name' => $type->title,
                'data' => $monthlyOrderCounts,
            ];
        }
        return $chartData;

    }

    public function getClientsCount(){
        $clients = new UserAction(new User());
        return $clients->getCounts();
    }

    public function getContactsCount(){
        $action = new ContactAction(new Contact());
        return $action->get()->count();
    }

    public function getCurrentOrdersCount(){
        $current_statuses = [OrderEnum::New->value, OrderEnum::Paid->value, OrderEnum::Started->value, OrderEnum::Completed->value];
        $act = new OrderAction(new Order());
        return $act->getWhereIn('status',$current_statuses)->count();
    }

    public function getTopCallCenter(){
        return Admin::select('admins.id', 'admins.name', 'admins.sex_type')
            ->selectRaw('COUNT(order_details.id) as order_count')
            ->join('order_details', 'admins.id', '=', 'order_details.admin_id')
            ->groupBy('admins.id', 'admins.name', 'admins.sex_type')
            ->orderByDesc('order_count')
            ->limit(3)
            ->get();
    }

    public function callCenterCount()
    {
        return Admin::where('admin_type',AdminTypes::CustomerService->value)->count();
    }

    public function cvCount()
    {
        return Maid::count();
    }

    public function orderedCvCount()
    {
        return Maid::whereHas('orders',function ($q){
            return $q->whereNotIn('status',['new','refused']);
        })->count();
    }


    public function getOrderCountsByType()
    {
        return Order::select('orders.job_type_id', DB::raw('count(*) as count'), 'job_types_translations.title as title')
            ->join('job_types', 'orders.job_type_id', '=', 'job_types.id')
            ->join('job_types_translations', function ($join) {
                $join->on('job_types.id', '=', 'job_types_translations.job_type_id')
                    ->where('job_types_translations.locale', '=', app()->getLocale());
            })
            ->groupBy('orders.job_type_id')
            ->get();
    }






}
