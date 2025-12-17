<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <sitemap>
        <loc>{{ url('/sitemap-pages.xml') }}</loc>
    </sitemap>

    @for($i = 1; $i <= $totalFiles; $i++)
        <sitemap>
            <loc>{{ url("/sitemap-blogs-$i.xml") }}</loc>
        </sitemap>
    @endfor

</sitemapindex>
