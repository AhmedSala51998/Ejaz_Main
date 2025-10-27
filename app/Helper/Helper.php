<?php


use Carbon\Carbon;
use ConvertApi\ConvertApi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

/*function worker_new_cv($id)
{
    try {
      //  ConvertApi::setApiSecret(env('FILE_CONVERTER_KEY'));

//        $result = ConvertApi::convert('png', [
//            'File' => route('frontend.cvDesign', $id),
//            'WebHook' => route('frontend.cvDesign', $id),
//        ], 'html'
//        );

        if(isset($result->response['Files'][0])&&!empty($result->response['Files'][0])) {

            $name = Str::random(5) . '_' . time() . '.png';
            $dirname = 'new_cvs/time_' . $name;
            $result->saveFiles(base_path('/storage/app/public/uploads/' . $dirname));
            return $dirname;
        }else{

            return null;

        }
    } catch (\Exception $e) {
        return null;

    }

}*/
if (!function_exists('worker_new_cv')) {
    function worker_new_cv($id)
    {
        try {
            // ConvertApi::setApiSecret(env('FILE_CONVERTER_KEY'));

            // $result = ConvertApi::convert('png', [
            //     'File' => route('frontend.cvDesign', $id),
            //     'WebHook' => route('frontend.cvDesign', $id),
            // ], 'html');

            if (isset($result->response['Files'][0]) && !empty($result->response['Files'][0])) {

                // اسم الملف العشوائي
                $fileName = Str::random(5) . '_' . time() . '.png';

                // المسار النسبي داخل uploads
                $relativePath = 'new_cvs/' . $fileName;

                // المسار الفعلي
                $destinationPath = public_path('storage/uploads/new_cvs');

                // إنشاء المجلد لو مش موجود
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0777, true, true);
                }

                // حفظ الملف في نفس مسار النظام
                $result->saveFiles($destinationPath . '/' . $fileName);

                // نرجّع فقط المسار النسبي اللي بيتخزن في قاعدة البيانات
                return $relativePath;

            } else {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }
    }
}
if (!function_exists('setting')) {
    function setting()
    {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

/*if (!function_exists('checkRouteIsHome')) {
    function checkRouteIsHome($id)
    {
        if (request()->routeIs('home')) {
            return $id;
        }else{
            return  route('home').$id;
        }
    }
}*/

if (!function_exists('checkRouteIsHome')) {
    function checkRouteIsHome($id)
    {
        // لو أنا في الـ landing (/) العادي
        if (request()->routeIs('home')) {
            return $id;
        }

        // لو أنا في صفحة فرع معين
        if (request()->routeIs('branch.home')) {
            $branch = request()->route('branch');
            return $id; // لأننا بالفعل في نفس الفرع
        }

        // في أي صفحة تانية، رجّع لينك الفرع الحالي
        $branch = request()->segment(1); // yanbu / riyadh / jeddah
        if (in_array($branch, ['yanbu','riyadh','jeddah'])) {
            return route('branch.home', ['branch' => $branch]) . $id;
        }

        // fallback → landing page
        return route('home') . $id;
    }
}


if (!function_exists('years_between_two_date')) {
    function years_between_two_date($first)
    {
        $d1 = new DateTime($first);
        $d2 = new DateTime(date('Y-m-d'));

        $diff = $d2->diff($d1);

        return $diff->y;
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}
if (!function_exists('user')) {
    function user()
    {
        return auth()->guard('user');
    }
}

if (!function_exists('aurl')) {
    function aurl($url = null)
    {
        return url('admin/' . $url);
    }
}

/*if (!function_exists('get_file')) {

    function get_file($file)
    {
        // Storage::exists( $file )
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $file_path = $file;
        } elseif ($file) {
            $file_path = asset('storage/uploads') . '/' . $file;
        } else {
            $file_path=asset('dashboard/assets/images/companies/img-1.png');
        }
        return $file_path;
    }//end
}
if (!function_exists('get_new_file')) {

    function get_new_file($file)
    {
        // Storage::exists( $file )
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            $file_path = $file;
        } elseif ($file) {
            $file_path = asset('storage/app/public/') . '/' . $file;
        } else {
            $file_path=asset('dashboard/assets/images/companies/img-1.png');
        }
        return $file_path;
    }//end
}*/

if (!function_exists('get_file')) {
    /**
     * عرض الملف أو صورة افتراضية
     */
    function get_file($file)
    {
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            return $file;
        } elseif ($file && file_exists(public_path('storage/uploads/' . $file))) {
            return asset('storage/uploads/' . $file);
        } else {
            return asset('dashboard/assets/images/companies/img-1.png');
        }
    }
}

if (!function_exists('get_new_file')) {
    /**
     * نسخة جديدة من get_file (نفس المنطق)
     */
    function get_new_file($file)
    {
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            return $file;
        } elseif ($file && file_exists(public_path('storage/uploads/' . $file))) {
            return asset('storage/uploads/' . $file);
        } else {
            return asset('dashboard/assets/images/companies/img-1.png');
        }
    }
}

if (!function_exists('permissionsList')) {
    function permissionsList()
    {
        return \App\Models\Admin::findOrFail(auth()->guard('admin')->user()->id)
            ->permissions()
            ->pluck('name')->toArray();
    }
}

if (!function_exists('checkAdminHavePermission')) {
    function checkAdminHavePermission($permission_name)
    {
        if (in_array($permission_name, \App\Models\Admin::findOrFail(auth()->guard('admin')->user()->id)
            ->permissions()->pluck('name')
            ->toArray())) {
            return true;
        }
        return false;
    }
}
if (!function_exists('diffBetweenTwoDates')) {
    function diffBetweenTwoDates($date1)
    {
        try {
            $date2 = (\Carbon\Carbon::now())->toDateTimeString();

            $diff = abs(strtotime($date2) - strtotime($date1));

            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));

            $minuts = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);

            $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minuts * 60));
            return [$years, $months, $days, $hours, $minuts, $seconds];
        } catch (\Exception $exception) {
            return [0, 0, 0, 0, 0, 0];
        }

    }
}//end if

function checkPermission($permission_id){
    $ides=[];
    $admin=  \App\Models\Admin::find(admin()->id());
    $roles= $admin->roles;
    for($i=0;$i<count($roles);$i++)
    {
        $permissions= $roles[$i]->permissions;

        for($j=0;$j<count($permissions);$j++)
        {
            array_push($ides,$permissions[$j]->id);
        }

    }
    $admin=  Auth::guard('admin')->user()->id;

    if (!in_array($permission_id, $ides))
        return false;
    return true;
}
