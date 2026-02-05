<?php

namespace App\Http\Controllers\Frontend\Support;

use App\Http\Controllers\Controller;
use App\Models\FrequentlyQuestion;
use Illuminate\Http\Request;

class SupportFrontController extends Controller
{
    //

    public function supports(Request $request)
    {
        $questions = FrequentlyQuestion::latest()->paginate(9);

        if ($request->ajax()) {
            $html = view(
                'frontend.pages.support.parts.questions',
                compact('questions')
            )->render();

            return response()->json([
                'status' => true,
                'html'   => $html
            ]);
        }

        return view(
            'frontend.pages.support.index',
            compact('questions')
        );
    }

    public function contactUs(){
        return view('frontend.pages.supportContactUs.index');
    }

}
