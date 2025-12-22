@extends('frontend.layouts.layout')

@section('title')
مدونة الاستقدام في السعودية
@endsection

@section('styles')
<style>
body {
    background-color: #FFF;
    font-family: 'Tajawal', sans-serif;
}

.banner {
    background: linear-gradient(135deg, #f4a835, #fff1db);
    padding: 60px 20px;
    text-align: center;
    border-radius: 0 0 50px 50px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    color: #333;
    position: relative;
    overflow: hidden;
}

.banner::before {
    content: '';
    position: absolute;
    top: -100px;
    left: -100px;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    z-index: 0;
}

.banner h1 {
    font-size: 3rem;
    font-weight: bold;
    z-index: 1;
    position: relative;
}

.banner ul {
    list-style: none;
    padding: 0;
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 20px;
    z-index: 1;
    position: relative;
}

.banner ul li a {
    color: #333;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
}

.banner ul li a.active,
.banner ul li a:hover {
    color: #fff;
    background: #f4a835;
    padding: 6px 14px;
    border-radius: 12px;
}
:root {
    --orange: #D89835;
    --orange-dark: #c8812a;
    --gray-dark: #5F5F5F;
    --text-main: #212121;
    --card-bg: rgba(255, 255, 255, 0.25);
    --border-color: rgba(255, 255, 255, 0.25);
}

/* Grid */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

@media (max-width: 992px) {
    .blog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .blog-grid {
        grid-template-columns: 1fr;
    }
}

/* Blog Card */
.blog-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 22px;
    overflow: visible;
    backdrop-filter: blur(12px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    position: relative;
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 38px rgba(216,152,53,0.45);
}

/* Image */
.blog-image {
    height: 200px;
    overflow: hidden;
    position: relative;
    border-radius: 22px 22px 0 0;
}

.blog-image img {
    width: 100%;
    height: 100%;
    transition: transform .6s ease;
    border-radius: 22px 22px 0 0;
}

.blog-card:hover .blog-image img {
    transform: scale(1.08);
}

/* Category badge */
.blog-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--orange);
    color: #fff;
    padding: 6px 14px;
    font-size: 0.8rem;
    border-radius: 50px;
    font-weight: 600;
}

/* Content */
.blog-content {
    padding: 25px 20px 30px;
    text-align: right;
}

.blog-content h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 10px;
    line-height: 1.5;
}

.blog-content p {
    font-size: 0.95rem;
    color: var(--gray-dark);
    min-height: 60px;
    margin-bottom: 18px;
}

.blog-content h3 {
    color: #212121 !important;
}

.blog-content p {
    color: #555 !important;
}


/* Meta */
.blog-meta {
    font-size: 0.8rem;
    color: #888;
    margin-bottom: 15px;
}

/* Button */
.blog-content a {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--orange);
    color: #fff;
    font-weight: 600;
    padding: 10px 24px;
    border-radius: 50px;
    font-size: 0.9rem;
    text-decoration: none;
    transition: background .3s ease;
}

.blog-content a:hover {
    background: var(--orange-dark);
}




/* Intro */
.blog-intro h2{
    font-size:2.4rem;
    font-weight:900;
    color:#1f1f1f;
    margin-bottom:12px;
    text-align:center;
}
.blog-intro p{
    color:#666;
    max-width:620px;
    margin:0 auto;
    line-height:1.9;
    text-align:center;
}

/* Featured Editorial */
.editorial-feature{
    position:relative;
    height:420px;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 30px 60px rgba(0,0,0,.15);
    margin-bottom:60px;
}
.editorial-feature img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.6s ease;
}
.editorial-feature:hover img{
    transform:scale(1.05);
}
.feature-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to top, rgba(0,0,0,.75), rgba(0,0,0,.15));
    color:#fff;
    padding:40px;
    display:flex;
    flex-direction:column;
    justify-content:flex-end;
}
.feature-overlay span{
    background:#D89835;
    padding:6px 18px;
    border-radius:30px;
    font-size:.8rem;
    font-weight:800;
    width:max-content;
    margin-bottom:15px;
}
.feature-overlay h2{
    font-size:2.3rem;
    font-weight:900;
    margin-bottom:12px;
}
.feature-overlay p{
    max-width:520px;
    opacity:.95;
}

/* Magazine Grid */
.magazine-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(320px,1fr));
    gap:40px;
}
.mag-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    transition:.4s ease;
}
.mag-card:hover{
    transform:translateY(-10px);
    box-shadow:0 25px 50px rgba(216,152,53,.35);
}
.mag-card img{
    width:100%;
    height:230px;
    object-fit:cover;
}
.mag-content{
    padding:26px;
}
.mag-content span{
    font-size:.8rem;
    color:#999;
}
.mag-content h3{
    font-size:1.35rem;
    font-weight:800;
    margin:12px 0;
    line-height:1.6;
}
.mag-content p{
    color:#555;
    line-height:1.8;
    margin-bottom:20px;
}
.mag-content a{
    font-weight:800;
    color:#D89835;
    text-decoration:none;
}

/* Empty State */
.empty-blog{
    text-align:center;
    padding:80px 20px;
}
.empty-blog img{
    max-width:420px;
    margin-bottom:25px;
}
.empty-blog h3{
    font-size:1.7rem;
    font-weight:900;
    color:#333;
}
.empty-blog p{
    color:#777;
    margin-top:10px;
}

</style>
@endsection

@section('content')

<div class="banner">
    <h1>مدونة الاستقدام</h1>
    <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a class="active">المدونة</a></li>
    </ul>
</div>

<section class="customer-service-section py-5">
    <div class="container">

        <section class="blog-section py-5">
            <div class="container">

                {{-- Intro --}}
                <div class="blog-intro mb-5">
                    <h2>آخر مقالات الاستقدام</h2>
                    <p>
                        مقالات متخصصة تساعدك على فهم أنظمة وشروط الاستقدام في المملكة العربية السعودية
                    </p>
                </div>

                @if($blogs->count())

                    {{-- Featured Editorial --}}
                    @php $featured = $blogs->first(); @endphp
                    <section class="editorial-feature">
                        <a href="{{ route('blog.show', $featured->slug) }}">
                            <img src="{{ asset($featured->image ?? 'frontend/img/blogs/default.png') }}"
                                alt="{{ $featured->title }}">
                            <div class="feature-overlay">
                                <span>مقال مميز</span>
                                <h2>{{ $featured->title }}</h2>
                                <p>{{ $featured->excerpt }}</p>
                            </div>
                        </a>
                    </section>

                    {{-- Magazine Grid --}}
                    @if($blogs->count() > 1)
                        <section class="magazine-grid">
                            @foreach($blogs->skip(1) as $blog)
                                <article class="mag-card">
                                    <img src="{{ asset($blog->image ?? 'frontend/img/blogs/default.png') }}"
                                        alt="{{ $blog->title }}">

                                    <div class="mag-content">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            {{ $blog->created_at->translatedFormat('d F Y') }}
                                        </span>

                                        <h3>{{ $blog->title }}</h3>
                                        <p>{{ $blog->excerpt }}</p>

                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            قراءة المقال →
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </section>
                    @endif

                    <div class="mt-5">
                        {{ $blogs->links() }}
                    </div>

                @else

                    {{-- Empty State --}}
                    <div class="empty-blog">
                        <img src="{{ asset('frontend/img/no_data.png') }}" alt="لا توجد مقالات">
                        <h3>لا توجد مقالات بعد</h3>
                        <p>نعمل حالياً على تجهيز محتوى مفيد عن الاستقدام في السعودية</p>
                    </div>

                @endif

            </div>
        </section>

        <div class="mt-4">
            {{ $blogs->links() }}
        </div>

    </div>
</section>

@endsection
