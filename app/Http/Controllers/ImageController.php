<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Imagick;

class ImageController extends Controller
{
    public function index()
    {
        $imgExt = new Imagick();
        $imgExt->readImage(public_path('pdf-document.pdf'));
        $imgExt->writeImages('pdf_image_doc.jpg', true);
        dd("Document has been converted");
    }
}
