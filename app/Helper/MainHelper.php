<?php

use App\Helper\Constant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
if (!function_exists('jsonSuccess')) {
    function jsonSuccess($data = null, $msg = null, $code = 200)
    {
        $msg = ($msg == null) ? __("auth.done successfully") : $msg;
        return response()->json([
            'code' => $code,
            'data' => $data,
            'message' => $msg
        ], 200);
    }
}

if (!function_exists('jsonValid')) {
    function jsonValid($data, $msg = "", $code = 422)
    {
        return response()->json([
            'code' => $code,
            'data' => $data,
            'message' => $data->all()[0]
        ], 422);
    }
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */

if (!function_exists('addButton')) {
    function addButton($route, $text = "", $class = "btn-success")
    {
        $fullText = __("buttons.add button") . ' ' . $text;
        return '
                <div class="d-flex mb-3 justify-content-end">
                    <button type="button" class="btn ' . $class . ' float-start addButton mx-1" data-bs-toggle="modal" data-bs-target="#createModal"
                           model-title="' . $fullText . '"  model-route="' . $route . '" title="' . __("buttons.add button") . '" >
                       <i class="fa fa-plus-circle"></i>  ' . $fullText . '
                    </button>
                </div>
                ';
    }
}

if (!function_exists('editButton')) {
    function editButton($route, $text = "")
    {
        $fullText = __("buttons.edit") . ' ' . $text;
        return '<button type="button" class="btn btn-primary editButton" data-bs-toggle="modal" data-bs-target="#createModal"
                       model-route="' . $route . '" model-title="' . $fullText . '">
                   <i class="fa fa-pencil"></i>
                </button>';
    }
}

// if (!function_exists('editButton')) {
//     function editButton($route, $text = "",$permissionName = "")
//     {
//         $editButton = '';
//         if (Auth::guard('admin')->user()->hasPermission($permissionName)) {
//             $fullText = __("buttons.edit") . ' ' . $text;
//             $editButton = '<button type="button" class="btn btn-primary editButton" data-bs-toggle="modal" data-bs-target="#createModal"
//                        model-route="' . $route . '" model-title="' . $fullText . '">
//                             <i class="fa fa-pencil"></i>
//                         </button>';
//         }
//         return $editButton;
//     }
// }

if (!function_exists('leaveButton')) {
    function leaveButton($route, $text = "")
    {
        $fullText = 'تسجيل الانصراف ' . ' ' . $text;
        return '<button type="button" class="btn btn-primary editButton" data-bs-toggle="modal" data-bs-target="#createModal"
                       model-route="' . $route . '" model-title="' . $fullText . '">
                    تسجيل الانصراف
                </button>';
    }
}


if (!function_exists('deleteButton')) {
    function deleteButton($route)
    {
        return '<button type="button" class="btn btn-danger deleteButton" delete-route="' . $route . '">
                      <i class="fa fa-trash-o"></i>
                </button>';
    }
}

// function deleteButton($route, $permissionName)
// {
//     if (Auth::guard('admin')->user()->hasPermission($permissionName)) {
//         return '<button type="button" class="btn btn-danger deleteButton" delete-route="' . $route . '">
//                     <i class="fa fa-trash-o"></i>
//                 </button>';
//     } else {
//         return '';
//     }
// }

if (!function_exists('confirmButton')) {
    function confirmButton($route, $id)
    {
        return '<button type="button" class="btn btn-warning confirmButton"  confirm-id="' . $id . '" confirm-route="' . $route . '">
                      <i class="fa fa-check-square-o"></i>
                </button>';
    }
}

if (!function_exists('updateStatusButton')) {
    function updateStatusButton($table, $status, $id, $text = null)
    {
        $class = $status ? 'btn-success' : 'btn-secondary';
        if ($text == null) {
            $text = $status ? 'نشط' : 'غير نشط';
        }
        return '<button class="btn ' . $class . ' btn-sm toggle-status" data-id="' . $id . '" data-table="' . $table . '">' . $text . '</button>';
    }
}

if (!function_exists('updateSuccessEmployeeStatusButton')) {
    function updateSuccessEmployeeStatusButton($table, $id, $text)
    {
        return '<button class="btn btn-success btn-sm accept-button" data-id="' . $id . '" data-table="' . $table . '">' . $text . '</button>';
    }
}
if (!function_exists('updateDangerEmployeeStatusButton')) {
    function updateDangerEmployeeStatusButton($table, $id, $text)
    {
        return '<button class="btn btn-danger btn-sm reject-button" data-id="' . $id . '" data-table="' . $table . '">' . $text . '</button>';
    }
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */

if (!function_exists('getEnumData')) {
    function getEnumData($enumArr, $array_name, $optionSelect = '')
    {
        $options = '<option value="">' . helperTrans('ingaz.choose') . '</option>';
        $constantArray = Constant::globalArray[$array_name];
        $locale = \App::currentLocale();
        foreach ($enumArr as $case) {
            $text = (isset($constantArray[$case->value][$locale])) ? $constantArray[$case->value][$locale] : "undefined";
            $selected = ($optionSelect == $case->value) ? "selected" : "";
            $options .= '<option value="' . $case->value . '"  ' . $selected . '>' . $text . '</option>';
        }
        return $options;
    }
}

function getSexType($value)
{
    if ($value == 0) {
        return getImgTag('images/male.png', '60px', "50px");
    } else if ($value == 1) {
        return getImgTag('images/female.avif', '60px', "50px");
    }
}

if (!function_exists('getEnumValue')) {
    function getEnumValue($array_name, $key)
    {
        $constantArray = Constant::globalArray[$array_name];
        $locale = \App::currentLocale();
        return (isset($constantArray[$key][$locale])) ? $constantArray[$key][$locale] : "undefined";;
    }
}


/*
   <option value="">اختر </option>
    @if ($array != null && !empty($array) && count($array) >0)
    @foreach ($array as $one)
      <option value="">اختر</option>
     @endforeach
     @endif
 */

if (!function_exists('showSelectElement')) {
    function showSelectElement($array, $key_name, $optionSelect = '', $attr = "")
    {
        $options = '<option value="">اختر </option>';
        if ($array != null && !empty($array) && count($array) > 0) {
            foreach ($array as $one) {
                $text = $one->{$key_name};
                $value = $one->id;
                $selected = ($optionSelect == $value) ? "selected" : "";
                $options .= '<option value="' . $value . '"  ' . $attr . '  ' . $selected . '>' . $text . '</option>';
            }
        } else {
            $options = '<option value="">لا يوجد بيانات </option>';
        }

        return $options;
    }
}

/*if (!function_exists('uploadFile')) {


    function uploadFile($image, $path, $compress = null, $quality_ratio = 90)
    {
        // Generate a random file name
        $fileName = getRandomStringRandomInt(10) . time();

        // Create the destination path if it doesn't exist
        $destinationPath = storage_path('app/public/' . $path);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        try {
            // Compress the image if needed
            if ($compress != null) {
                $fileName .= '.webp';
                $img = Image::make($image);
                $img->encode('webp', $quality_ratio)->save($destinationPath . '/' . $fileName);
            } else {
                $fileName .= '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileName);
            }

            return $path . $fileName;
        } catch (\Exception $e) {
            // For now, continue with the original image without compression
            $fileName .= '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fileName);

            return $path . $fileName;
        }
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile($fileFullPath)
    {
        $deletePath = storage_path('');
        $deletePath .= Constant::filesPath;
        $deletePath .= $fileFullPath;
        return File::delete($deletePath);
    }
}


if (!function_exists('showFile')) {
    function showFile($fileFullPath)
    {
        return asset('/storage/' . $fileFullPath);
    }
}
if (!function_exists('get_file')) {
    function get_file($fileFullPath)
    {
        return asset('/storage/' . $fileFullPath);
    }
}
if (!function_exists('imageOrNull')) {
    function imageOrNull($fileFullPath)
    {
        if ($fileFullPath && file_exists(public_path('/storage/' . $fileFullPath))) {
            return asset('/storage/' . $fileFullPath);
        }

        return "";
    }
}


function getFile($fileFullPath)
{
    if ($fileFullPath && file_exists(public_path('/storage/' . $fileFullPath))) {
        return asset('/storage/' . $fileFullPath);
    }

    return asset(asset('/storage/uploads/noImage.gif'));
}*/

if (!function_exists('uploadFile')) {
    /**
     * رفع ملف داخل public/storage/uploads/{path}
     */
    function uploadFile($image, $path, $compress = null, $quality_ratio = 90)
    {
        // random اسم الملف
        $fileName = getRandomStringRandomInt(10) . time();

        // المسار داخل public/storage/uploads
        $destinationPath = public_path('storage/uploads/' . $path);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        try {
            if ($compress != null) {
                $fileName .= '.webp';
                $img = Image::make($image);
                $img->encode('webp', $quality_ratio)->save($destinationPath . '/' . $fileName);
            } else {
                $fileName .= '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileName);
            }

            return $path . '/' . $fileName;
        } catch (\Exception $e) {
            $fileName .= '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fileName);

            return $path . '/' . $fileName;
        }
    }
}

if (!function_exists('deleteFile')) {
    /**
     * حذف ملف من public/storage/uploads
     */
    function deleteFile($fileFullPath)
    {
        $deletePath = public_path('storage/uploads/' . $fileFullPath);
        if (file_exists($deletePath)) {
            return File::delete($deletePath);
        }
        return false;
    }
}

if (!function_exists('showFile')) {
    /**
     * عرض رابط ملف
     */
    function showFile($fileFullPath)
    {
        return asset('storage/uploads/' . $fileFullPath);
    }
}

if (!function_exists('imageOrNull')) {
    /**
     * إرجاع الصورة إن وُجدت وإلا null
     */
    function imageOrNull($fileFullPath)
    {
        if ($fileFullPath && file_exists(public_path('storage/uploads/' . $fileFullPath))) {
            return asset('storage/uploads/' . $fileFullPath);
        }
        return "";
    }
}

if (!function_exists('getFile')) {
    /**
     * نفس فكرة get_file لكن مع noImage.gif
     */
    function getFile($fileFullPath)
    {
        if ($fileFullPath && file_exists(public_path('storage/uploads/' . $fileFullPath))) {
            return asset('storage/uploads/' . $fileFullPath);
        }

        return asset('storage/uploads/noImage.gif');
    }
}

if (!function_exists('getAuthUser')) {
    function getAuthUser()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        if ($user == null) {
            $user = \Illuminate\Support\Facades\Auth::guard('admin')->user();
        }
        return $user;
    }
}

if (!function_exists('getGuardedUser')) {
    function getGuardedUser($column = null)
    {
        if ($column) {
            return Auth::guard(config('auth.defaults.guard'))->user()->{$column};
        }
        return Auth::guard(config('auth.defaults.guard'))->user();
    }
}

if (!function_exists('extractModelName')) {
    function extractModelName($migration)
    {
        preg_match('/create_(\w+)_table/i', pathinfo($migration, PATHINFO_FILENAME), $matches);

        $modelName = $matches[1] ?? null;

        return $modelName !== null ? Str::singular(Str::studly($modelName)) : null;
    }
}

if (!function_exists('getMigrations')) {
    function getMigrations($projectName)
    {
        $path = database_path("migrations/{$projectName}");

        $migrations = [];
        foreach (scandir($path) as $file) {
            $filePath = $path . DIRECTORY_SEPARATOR . $file;

            if (is_file($filePath) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $migrations[] = $file;
            }
        }

        return $migrations;
    }
}


/*if (!function_exists('getImgTag')) {
    function getImgTag($fileFullPath, $width = "150px", $height = "120px")
    {
        $image_path = get_file($fileFullPath);
        if (file_exists('storage/' . $fileFullPath)) {
            $image = '<img src="' . $image_path . '" alt="profile-image" style="height: ' . $height . '; width: ' . $width . ';" class="avatar rounded me-2">';
        } else {
            $image = '<img src="' . getFile($image_path) . '" alt="profile-image" style="height: ' . $height . '; width: ' . $width . ';" class="avatar rounded me-2">';
        }
        return $image;
    }

}*/

if (!function_exists('getImgTag')) {
    /**
     * ترجيع tag للصورة مباشرة
     */
    function getImgTag($fileFullPath, $width = "150px", $height = "120px")
    {
        $image_path = get_file($fileFullPath);
        $exists = file_exists(public_path('storage/uploads/' . $fileFullPath));

        $src = $exists ? $image_path : getFile($fileFullPath);
        return '<img src="' . $src . '" alt="image" style="height: ' . $height . '; width: ' . $width . ';" class="avatar rounded me-2">';
    }
}


if (!function_exists('getPhoneWithTag')) {
    function getPhoneWithTag($phone)
    {
        if ($phone) {
            $phoneWithTag = '<a href=tel:' . $phone . '>' . $phone . '
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg></a>';
        } else {
            $phoneWithTag = "لم يسجل هاتف";
        }
        return $phoneWithTag;
    }
}

if (!function_exists('getEmailWithTag')) {
    function getEmailWithTag($email)
    {
        if ($email) {
            $emailWithTag = '<a href=mailto:' . $email . '>' . $email . '</a>';
        } else {
            $emailWithTag = "لم يسجل ايميل";
        }
        return $emailWithTag;
    }
}

if (!function_exists('getRandomStringRandomInt')) {
    function getRandomStringRandomInt($length = 16)
    {
        $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pieces = "";
        $max = mb_strlen($stringSpace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces .= $stringSpace[random_int(0, $max)];
        }
        return $pieces;
    }
}

if (!function_exists('getFieldLanguage')) {
    function getFieldLanguage($locale)
    {
        return isset(Constant::globalArray['project_language'][$locale]) ? Constant::globalArray['project_language'][$locale] : '#';
    }
}

if (!function_exists('firstFilterAccount')) {
    function firstFilterAccount($dataSearch)
    {
        $show_type = $dataSearch["show_type"];
        $accountStatment = DB::table('constraint_details')
            ->select([
                'constraint_details.date', 'constraint_details.statement',
                'constraint_details.debtor_value as first_debtor_value',
                'constraint_details.creditor_value as first_creditor_value',
                'constraint_details.type', 'accounts.name as account_name',
                "accounts.status", 'constraint_details.constraint_id'
            ])
            ->join('accounts', 'accounts.id', '=', 'constraint_details.account_id')
            ->when($show_type == 1, function ($q) use ($dataSearch) {
                return $q->whereDate("constraint_details.date", "<", $dataSearch["from_date"]);
            })
            ->orderBy("constraint_details.date", "ASC")->get();
        return $accountStatment;
    }
}

function api(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
{
    return auth()->guard('api');
}


if (!function_exists('helperTrans')) {
    function helperTrans($str): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {

        $arrayOfKeys = explode('.', $str);
        $file = $arrayOfKeys[0] ?? 'file';
        $key = $arrayOfKeys[1] ?? '';

        $local = get_api_lang();

        try {
            $lang_array = include(resource_path("lang/$local/$file.php"));

            $processed_key = ucfirst(str_replace('_', ' ', remove_invalid_characters($key)));

            if (!array_key_exists($key, $lang_array)) {
                $lang_array[$key] = $processed_key;
                $str = "<?php return " . var_export($lang_array, true) . ";";
                file_put_contents(resource_path("lang/$local/$file.php"), $str);
                $result = $processed_key;
            } else {
                $result = __("$file.$key");
            }
        } catch (\Exception $exception) {
            $result = __("$file.$key");
        }

        return $result;
    }
}

function remove_invalid_characters($str): array|string
{
    return str_ireplace(['\'', '"', ',', ';', '<', '>'], ' ', $str);
}

function get_api_lang(): array|string
{
    return request()->header('lang') ?? 'ar';
}


if (!function_exists('generalReturn')) {
    function generalReturn($request, $sql, $resource, $message = "success")
    {
        $jsonMsg = ["message" => $message, "code" => 200];
        $pagination_status = ($request->pagination) ? $request->pagination : "off";
        $limit_per_page = ($request->limit_per_page) ? $request->limit_per_page : "5";
        if ($pagination_status == 'on') {
            $data = $sql->latest()->paginate($limit_per_page);
            $json = array_merge($jsonMsg, ["data" => $resource::collection($data)]);
            $json = array_merge($json, collect($data)->except(["data", 'links'])->toArray());
            return response()->json($json, 200);
        }
        $json = array_merge($jsonMsg, ["data" => $resource::collection($sql->latest()->get())]);
        return response()->json($json, 200);
    }
}
