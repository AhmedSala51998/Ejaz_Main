<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Nationalitie;
use App\Models\OurService;
use Illuminate\Http\Request;

class OurStaffController extends Controller
{
    public function index(Request $request)
    {
        $branch = $request->cookie('branch');
        /*$admins = \App\Models\Admin::where('admin_type','!=',0)->where(function($q) use ($branch) {
                    $q->where('branch', $branch)
                    ->orWhere('branch', 'all_branches');
                })->get();*/

        $admins = \App\Models\Admin::where('admin_type', '!=', 0)
        ->where(function($q) use ($branch) {
            $q->where('branch', $branch)
            ->orWhere('branch', 'all_branches')
            ->orWhere(function($q2) use ($branch) {
                if ($branch === 'riyadh') {
                    $q2->whereIn('branch', ['r_y', 'j_r']);
                } elseif ($branch === 'jeddah') {
                    $q2->whereIn('branch', ['y_j', 'j_r']);
                } elseif ($branch === 'yanbu') {
                    $q2->whereIn('branch', ['r_y', 'y_j']);
                }
            });
        })
        ->get();
        /*$admins = Cache::rememberForever("admins", function() use ($branch) {
            return \App\Models\Admin::where('admin_type', '!=', 0)
                ->where(function($q) use ($branch) {
                    $q->where('branch', $branch)
                    ->orWhere('branch', 'all_branches')
                    ->orWhere(function($q2) use ($branch) {
                        if ($branch === 'riyadh') {
                            $q2->whereIn('branch', ['r_y', 'j_r']);
                        } elseif ($branch === 'jeddah') {
                            $q2->whereIn('branch', ['y_j', 'j_r']);
                        } elseif ($branch === 'yanbu') {
                            $q2->whereIn('branch', ['r_y', 'y_j']);
                        }
                    });
                })->get();
        });*/

        return view('frontend.pages.ourStaff.ourStaff',['admins'=>$admins]);
    }//end fun



}
