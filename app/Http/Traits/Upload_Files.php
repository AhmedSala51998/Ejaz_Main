<?php


namespace App\Http\Traits;


//use Faker\Provider\Image;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

trait Upload_Files
{



    //---------------Upload Files----------------
    /*public function uploadFiles($folder_name,$file,$is_updated_file){
        //upload or update
        $fileNameToStore=null;

        if ($file){
            if ($is_updated_file!=null) {
             //   $fileNameToStore=$is_updated_file;
                \Storage::delete('/public/' .'uploads/'.$is_updated_file);
            }
            $fileName_original =$file->getClientOriginalName();
            $fileNameWithExt =$file->getClientOriginalExtension();
            $fileName = $folder_name.'/'.pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //$ext =$file->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_'.$fileName_original . '_'.time() . '.' . $fileNameWithExt;
            $file->storeAs('public/uploads/', $fileNameToStore);
        }else{
            $fileNameToStore=$is_updated_file;
        }

        return $fileNameToStore!=null?$fileNameToStore:null;
    }//end


    public function createImageFromTextManual($folder , $text , $size , $color_text, $color_background)
    {
        $img = \DefaultProfileImage::create($text, $size, $color_text, $color_background);
        $time = time().rand(11111,99999);
        $image_file = "{$folder}/{$time}.png";
        \Storage::put("public/uploads/{$image_file}", $img->encode());
        return $image_file;
    }*/

    public function uploadFiles($folder_name, $file, $is_updated_file = null)
    {
        $fileNameToStore = null;

        if ($file) {
            // حذف الملف القديم لو موجود
            if (!empty($is_updated_file)) {
                $oldFilePath = public_path('storage/uploads/' . $is_updated_file);
                if (file_exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // تجهيز المسار الجديد داخل public/storage/uploads
            $destinationPath = public_path('storage/uploads/' . $folder_name);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // اسم الملف
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $folder_name . '/' . $originalName . '_' . time() . '.' . $extension;

            // حفظ الملف داخل المسار
            $file->move($destinationPath, basename($fileNameToStore));
        } else {
            $fileNameToStore = $is_updated_file;
        }

        return $fileNameToStore ?: null;
    }


    /**
     * إنشاء صورة نصية (مثل صورة المستخدم الافتراضية) وتخزينها في public/storage/uploads/{folder}
     */
    public function createImageFromTextManual($folder, $text, $size, $color_text, $color_background)
    {
        // إنشاء الصورة باستخدام DefaultProfileImage
        $img = \DefaultProfileImage::create($text, $size, $color_text, $color_background);

        // تجهيز الاسم والمسار
        $time = time() . rand(11111, 99999);
        $image_file = "{$folder}/{$time}.png";
        $destinationPath = public_path('storage/uploads/' . $folder);

        // إنشاء الفولدر لو مش موجود
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // حفظ الصورة
        $img->encode('png')->save($destinationPath . '/' . $time . '.png');

        return $image_file;
    }


}//end trait
