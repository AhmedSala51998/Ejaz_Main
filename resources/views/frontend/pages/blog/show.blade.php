@extends('frontend.layouts.layout')

@section('title')
{{ $blog->title }}
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
@media (max-width: 768px) {

    .banner {
        padding: 35px 15px;
        border-radius: 0 0 28px 28px;
        box-shadow: 0 6px 16px rgba(244, 168, 53, 0.25);
    }

    .banner::before {
        width: 180px;
        height: 180px;
        top: -60px;
        left: -60px;
    }

    .banner h1 {
        font-size: 1.6rem;
        line-height: 1.4;
        margin-bottom: 15px;
    }

    .banner ul {
        flex-wrap: wrap;
        gap: 10px;
    }

    .banner ul li a {
        font-size: 0.85rem;
        padding: 5px 10px;
        border-radius: 10px;
    }

    .banner ul li a.active {
        background: #f4a835;
        color: #fff;
    }

    .blog-hero img {
        width: 100%;
        height: 100%;
        object-fit:contain;
        display: block;
        margin: 0 auto;
    }
}
:root {
    --orange: #D89835;
    --orange-dark: #c8812a;
    --gray-dark: #5F5F5F;
    --text-main: #212121;
    --card-bg: rgba(255, 255, 255, 0.25);
    --border-color: rgba(255, 255, 255, 0.25);
}

/* Article Wrapper */
.blog-article {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 25px;
    padding: 40px;
    backdrop-filter: blur(12px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

/* Title */
.blog-article h1 {
    font-size: 2.4rem;
    font-weight: 800;
    color: var(--text-main);
    margin-bottom: 15px;
}

/* Meta */
.blog-meta {
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 25px;
}

/* Image */
.blog-cover {
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 30px;
}

.blog-cover img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

/* Content */
.blog-content {
    font-size: 1.05rem;
    line-height: 2;
    color: var(--gray-dark);
}

.blog-content h2,
.blog-content h3 {
    color: var(--orange);
    font-weight: 700;
    margin-top: 35px;
}

.blog-content ul {
    padding-right: 20px;
}

.blog-content ul li {
    margin-bottom: 10px;
}

/* Back button */
.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--orange);
    color: #fff;
    font-weight: 600;
    padding: 10px 26px;
    border-radius: 50px;
    text-decoration: none;
    transition: .3s;
}

.back-btn:hover {
    background: var(--orange-dark);
}


/* Layout */
.blog-layout {
    display: grid;
    grid-template-columns: 1fr 280px;
    gap: 40px;
}

/* Main Article */
.blog-main {
    background: #fff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

/* Hero */
.blog-hero {
    position: relative;
    height: 420px;
}

.blog-hero img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.65), rgba(0,0,0,.1));
    color: #fff;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.hero-overlay h1 {
    font-size: 2.2rem;
    font-weight: 800;
    line-height: 1.4;
}

.hero-meta {
    font-size: .9rem;
    opacity: .9;
    margin-top: 10px;
}

.hero-badge {
    background: var(--orange);
    padding: 6px 16px;
    border-radius: 50px;
    font-size: .8rem;
    width: fit-content;
    margin-bottom: 15px;
}

/* Body */
.blog-body {
    padding: 40px;
    font-size: 1.05rem;
    line-height: 2.1;
    color: #333;
}

.blog-body h2,
.blog-body h3 {
    color: var(--orange);
    margin-top: 35px;
    font-weight: 700;
}

/* Sidebar */
.blog-sidebar {
    position: sticky;
    top: 120px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.side-box {
    background: #fff;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.side-box h4 {
    font-size: 1rem;
    margin-bottom: 10px;
    color: var(--text-main);
}

.side-btn {
    display: block;
    background: var(--orange);
    color: #fff;
    text-align: center;
    padding: 10px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
}

.side-btn:hover {
    background: var(--orange-dark);
}

/* Responsive */
@media (max-width: 992px) {
    .blog-layout {
        grid-template-columns: 1fr;
    }

    .blog-sidebar {
        position: static;
    }

    .blog-hero {
        height: 300px;
    }
}

</style>
@endsection


@section('content')

<!-- Banner -->
<div class="banner">
    <h1>{{ $blog->title }}</h1>
    <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="{{ route('blog.index') }}">المدونة</a></li>
        <li><a class="active">{{ $blog->title }}</a></li>
    </ul>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12">

                <div class="blog-layout">

                <!-- Article -->
                <article class="blog-main">

                    <!-- Hero -->
                    <div class="blog-hero">
                        <img src="{{ asset($blog->second_image ?? 'frontend/img/blogs/1_b.png') }}"
                            alt="{{ $blog->title }}">

                        <div class="hero-overlay">
                            <span class="hero-badge">الاستقدام</span>
                            <h1>{{ $blog->title }}</h1>
                            <div class="hero-meta">
                                <i class="fa fa-calendar"></i>
                                {{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="blog-body">
                        {!! $blog->content !!}
                    </div>

                </article>

                <!-- Sidebar -->
                <aside class="blog-sidebar">

                    <div class="side-box">
                        <h4>تاريخ النشر</h4>
                        <p>
                            {{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}
                        </p>
                    </div>

                    <div class="side-box">
                        <h4>تنقّل</h4>
                        <a href="{{ route('blog.index') }}" class="side-btn">
                            ← الرجوع للمدونة
                        </a>
                    </div>

                </aside>

            </div>

            </div>

        </div>
    </div>
</section>

@endsection
