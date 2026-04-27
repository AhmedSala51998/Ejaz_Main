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
            ->get();

        $text = $blog->title . ' ' . $blog->excerpt;
        $words = collect(explode(' ', $text))
            ->filter(fn($w) => mb_strlen($w) > 3)
            ->unique()
            ->take(6);

        $relatedBlogs = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->where(function($q) use ($words) {
                foreach ($words as $word) {
                    $q->orWhere('title', 'LIKE', "%{$word}%")
                    ->orWhere('excerpt', 'LIKE', "%{$word}%");
                }
            })
            ->inRandomOrder()
            ->take(4)
            ->get();

        if ($relatedBlogs->count() < 4) {
            $more = Blog::where('status', 1)
                ->where('id', '!=', $blog->id)
                ->inRandomOrder()
                ->take(4 - $relatedBlogs->count())
                ->get();

            $relatedBlogs = $relatedBlogs->merge($more);
        }

        $sessionKey = 'blog_viewed_' . $blog->id;
        if (!session()->has($sessionKey)) {
            $blog->increment('views');
            session()->put($sessionKey, true);
        }

        return view('frontend.pages.blogs.show', compact('blog', 'faqs', 'relatedBlogs'));
    }

}
