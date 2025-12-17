<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ url('/all-workers') }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>{{ url('/blog') }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/about') }}</loc>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/ourStaff') }}</loc>
        <priority>0.7</priority>
    </url>

    <url>
        <loc>{{ url('/supports/contactUs') }}</loc>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>{{ url('/countries') }}</loc>
        <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
        <priority>0.7</priority>
    </url>

    @foreach($blogs as $blog)
        <url>
            <loc>{{ route('blog.show', $blog->slug) }}</loc>
            <lastmod>{{ $blog->updated_at->format('Y-m-d') }}</lastmod>
            <priority>0.7</priority>
        </url>
    @endforeach

</urlset>
