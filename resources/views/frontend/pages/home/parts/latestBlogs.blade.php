<style>
.blog-home-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s ease;
    height:100%;
}

.blog-home-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(216,152,53,.25);
}

.blog-home-card img{
    width:100%;
    height:180px;
    object-fit:cover;
}

.blog-home-card h3{
    font-size:1.1rem;
    font-weight:700;
    margin:10px 0;
}

.blog-home-card h3 a{
    color:#212121;
    text-decoration:none;
}

.blog-home-card p{
    font-size:.9rem;
    color:#666;
}

.blog-date{
    font-size:.8rem;
    color:#999;
}

.read-more{
    color:#D89835;
    font-weight:700;
    text-decoration:none;
}

.btn-orange{
    background:#D89835;
    color:#fff;
    border:none;
}

.btn-orange:hover{
    background:#c8842f;
    color:#fff;
}

.carousel-indicators{
    display:none !important;
}
</style>

@if(isset($latestBlogs) && $latestBlogs->count())
<section class="latest-blogs py-5 bg-white">
<div class="container">

    <div class="text-center mb-5">
        <h2 class="section-title">أحدث مقالاتنا</h2>
        <p class="section-subtitle">نصائح ومعلومات مهمة قبل الاستقدام في السعودية</p>
    </div>

    <div id="blogsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-indicators">
            @php $chunks = $latestBlogs->chunk(4); @endphp
            @foreach($chunks as $key => $items)
            <button type="button"
                    data-bs-target="#blogsCarousel"
                    data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}">
            </button>
            @endforeach
        </div>

        <div class="carousel-inner">

            @foreach($chunks as $key => $items)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="row gy-4">

                    @foreach($items as $blog)
                    <div class="col-lg-3 col-md-6">
                        <div class="blog-home-card">

                            <a href="{{ route('blog.show', $blog->slug) }}">
                                <img src="{{ asset($blog->image ?? 'frontend/img/blogs/default.png') }}">
                            </a>

                            <div class="p-3">
                                <span class="blog-date">
                                    {{ $blog->created_at->translatedFormat('d F Y') }}
                                </span>

                                <h3>
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        {{ Str::limit($blog->title,60) }}
                                    </a>
                                </h3>

                                <p>{{ Str::limit($blog->excerpt,90) }}</p>

                                <a href="{{ route('blog.show', $blog->slug) }}" class="read-more">
                                    قراءة المقال →
                                </a>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endforeach

        </div>

    </div>

    <div class="text-center mt-5">
        <a href="{{ route('blog.index') }}" class="btn btn-orange px-4 py-2 rounded-pill">
            عرض كل المقالات
        </a>
    </div>

</div>
</section>
@endif
