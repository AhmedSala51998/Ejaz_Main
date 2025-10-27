<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload_Files;
use App\Models\PDF;
use Illuminate\Http\Request;

class AdminPDFController extends Controller
{
    use Upload_Files;

    public function index(Request $request){

        if (!checkPermission(27))
            return view('admin.permission');

        $pdf=PDF::first();

        return view('admin.pdf.index',compact('pdf'));
    }
    public function updatePDF(Request $request){

        if (!checkPermission(28))
            return view('admin.permission');

        $validator=\Validator::make($request->all(),
            [
                'employer_rights_and_duties'=>'nullable|mimes:pdf',
                'rights_and_duties_of_domestic_workers'=>'nullable|mimes:pdf',
            ]);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'errors'=>$validator->errors()]);
        }

        $pdf=PDF::first();

        if ($request->hasFile('employer_rights_and_duties')){
            $data ['employer_rights_and_duties'] = $this->uploadFiles('PDF',$request->file('employer_rights_and_duties'),$pdf->employer_rights_and_duties );
          $pdf->update($data);
        }


        if ($request->hasFile('rights_and_duties_of_domestic_workers')){
            $data ['rights_and_duties_of_domestic_workers'] = $this->uploadFiles('PDF',$request->file('rights_and_duties_of_domestic_workers'),$pdf->rights_and_duties_of_domestic_workers );
            $pdf->update($data);
        }

      return response()->json(['status'=>true]);



    }


}
