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
.blog-home-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    border:1px solid #eee;
    box-shadow:0 8px 20px rgba(0,0,0,.05);
    transition:.3s ease;
    height:100%;
}

.blog-home-card:hover{
    transform:translateY(-6px);
    border-color:#D89835;
    box-shadow:0 20px 40px rgba(216,152,53,.15);
}

.blogsSwiper .swiper-button-next,
.blogsSwiper .swiper-button-prev,
.blogsSwiper .swiper-pagination{
    display:none !important;
}

.blogsSwiper{
    overflow: visible !important;
    padding: 10px 0;
}

.blogsSwiper .swiper-wrapper{
    align-items: stretch;
}

.blogsSwiper .swiper-slide{
    height: auto;
}
</style>

@if(isset($latestBlogs) && $latestBlogs->count())

<section class="latest-blogs py-5 bg-white">
<div class="container">

    <div class="text-center mb-5">
        <h2 class="section-title">أحدث مقالاتنا</h2>
        <p class="section-subtitle">نصائح ومعلومات مهمة قبل الاستقدام في السعودية</p>
    </div>

    <div class="swiper blogsSwiper">
        <div class="swiper-wrapper">

            @foreach($latestBlogs as $blog)
            <div class="swiper-slide">

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

        <!-- arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- pagination -->
        <div class="swiper-pagination mt-4"></div>

    </div>

</div>
</section>

@endif
<script>
document.addEventListener("DOMContentLoaded", function () {

    new Swiper(".blogsSwiper", {
        loop: true,
        grabCursor: true,
        spaceBetween: 25,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 4
            }
        }
    });

});
</script>
