<?php

namespace App\Http\Actions\sharedCode;



use App\Models\hr\Job;
use App\Http\Actions\MainAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ToggleStatusAction extends MainAction
{
    public function storeToggleStatus($request)
    {
        $id = $request->input('id');
        $table =  $request->table_name;
        $obj = DB::table($table)->find($id);
        if(isset($obj->status)) {
            $newStatus = !$obj->status;
            DB::table($table)->where('id',$id)->update(['status' => $newStatus]);
            $statusText = $newStatus ? 'نشط' : 'غير نشط';
            $message = "تم تحديث الحالة بنجاح إلى $statusText";
            return jsonSuccess(['message' => $message, 'status' => $statusText]);
        }
        return jsonValid(['message' => 'لا يوجد حالات']);
    }
}
