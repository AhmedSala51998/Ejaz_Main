@extends('frontend.layouts.layout')

@section('title')
مدونة الاستقدام في السعودية
@endsection

@section('styles')
<style>
body {
    background-color: #f8f8f8;
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
    grid-template-columns: repeat(2, 1fr); /* 3 أعمدة فقط */
    gap: 30px;
}

@media (max-width: 992px) {
    .blog-grid {
        grid-template-columns: repeat(2, 1fr); /* عمودين للشاشات المتوسطة */
    }
}

@media (max-width: 576px) {
    .blog-grid {
        grid-template-columns: 1fr; /* عمود واحد للموبايل */
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
    transform: translateY(-8px);
    box-shadow: 0 18px 38px rgba(216,152,53,0.45);
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 38px rgba(216,152,53,0.45);
}

/* Image */
.blog-image {
    height: 300px;
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

        <div class="text-center mb-5">
            <h1 class="section-title">مدونة الاستقدام في السعودية</h1>
            <p class="section-subtitle">
                كل ما يخص الاستقدام، الشروط، الأسعار، والدول المسموح بها
            </p>
        </div>

        <div class="blog-grid">

            @foreach($blogs as $blog)
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="{{ asset($blog->image ?? 'frontend/img/blogs/2.png') }}"
                            alt="{{ $blog->title }}">

                        <span class="blog-badge">
                            الاستقدام
                        </span>
                    </div>

                    <div class="blog-content">

                        <div class="blog-meta">
                            <i class="fa fa-calendar"></i>
                            {{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}
                        </div>

                        <h3>{{ $blog->title }}</h3>

                        <p>{{ $blog->excerpt }}</p>

                        <a href="{{ route('blog.show', $blog->slug) }}">
                            قراءة المقال
                            <i class="fa fa-arrow-left"></i>
                        </a>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="mt-4">
            {{ $blogs->links() }}
        </div>

    </div>
</section>

@endsection
