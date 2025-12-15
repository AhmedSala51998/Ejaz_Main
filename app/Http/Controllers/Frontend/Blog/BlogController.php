<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status',1)
            ->latest()
            ->paginate(9);

        return view('frontend.pages.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $blog->increment('views');

        return view('frontend.pages.blog.show', compact('blog'));
    }
}
