<?php

namespace App\Http\Actions\ingaz;


use App\Models\ingaz\AppVisit;
use App\Http\Actions\MainAction;
use App\Models\ingaz\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AppVisitAction extends MainAction
{
    public function __construct(AppVisit $model)
    {
        $this->model = $model;
    }

    public function storeAppVisit($request)
    {

        $existingRecord = $this->model->whereDate('date', now()->toDateString())
                                ->first();
        if ($existingRecord) {
            if ($request['type'] == 'android') {
                $existingRecord->android_count += 1;
            } elseif ($request['type'] == 'ios') {
                $existingRecord->ios_count += 1;
            } elseif ($request['type'] == 'web') {
                $cookie = Cookie::where(['value'=>$_COOKIE['web_cookie']])->first();
                if(!$cookie){
                    $cookie = Cookie::create(['name'=>'web_cookie','value'=>$_COOKIE['web_cookie']]);
                }
               if(!$cookie->visits_count) {
                   $existingRecord->web_count += 1;
                   $cookie->increment('visits_count');
               }
            }
            $existingRecord->save();
        } else {
            $data['date'] = now()->toDateString();
            if ($request['type'] == 'android') {
                $data['android_count'] = 1;
            } elseif ($request['type'] == 'ios') {
                $data['ios_count'] = 1;
            } elseif ($request['type'] == 'web') {
                $data['web_count'] = 1;
            }

            $this->store($data);
        }
        return true;
    }

    public function sumTotal($type ='total',$date = '')
    {
        $sumResult = DB::table($this->model->getTable())->selectRaw('SUM(android_count) as sum_android_count, SUM(ios_count) as sum_ios_count, SUM(web_count) as sum_web_count, SUM(android_count + ios_count + web_count) as total_sum')
            ->when($date, function($q) use($date){
               return $q->where('date',$date);
            })
            ->first();

            $data['sum_android'] = (int)$sumResult->sum_android_count ;
            $data['sum_ios'] = (int)$sumResult->sum_ios_count ;
            $data['sum_web'] = (int)$sumResult->sum_web_count ;
            $data['sum_total'] = (int)$sumResult->total_sum ;

        return $data;
    }
}
