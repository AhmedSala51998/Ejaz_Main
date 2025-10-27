<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    //

    public function downloadZip()
    {
        Storage::disk('local')->makeDirectory('tobedownload',$mode=0775); // zip store here
        $zip_file=storage_path('app/tobedownload/invoices.zip');
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $path = storage_path('invoices'); // path to your pdf files
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                // extracting filename with substr/strlen
                $relativePath = substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        $headers = array('Content-Type'=>'application/octet-stream',);
        $zip_new_name = "Invoice-".date("y-m-d-h-i-s").".zip";
        return response()->download($zip_file,$zip_new_name,$headers);
    }



}
