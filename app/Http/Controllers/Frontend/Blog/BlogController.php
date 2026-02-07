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

        return view('frontend.pages.blogs.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $faqs = $blog->faqs()
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->paginate(5);

        $sessionKey = 'blog_viewed_' . $blog->id;
        if (!session()->has($sessionKey)) {
            $blog->increment('views');
            session()->put($sessionKey, true);
        }

        return view('frontend.pages.blogs.show', compact('blog', 'faqs'));
    }

}
