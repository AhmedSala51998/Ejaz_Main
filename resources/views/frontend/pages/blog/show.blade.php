@extends('frontend.layouts.layout')

@section('title')
{{ $blog->title }}
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

            <div class="col-lg-9">

                <article class="blog-article">

                    <div class="blog-meta">
                        <i class="fa fa-calendar"></i>
                        {{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}
                    </div>

                    <div class="blog-cover">
                        <img src="{{ asset($blog->image) }}"
                             alt="{{ $blog->title }}">
                    </div>

                    <div class="blog-content">
                        {!! $blog->content !!}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('blog.index') }}" class="back-btn">
                            <i class="fa fa-arrow-right"></i>
                            الرجوع للمدونة
                        </a>
                    </div>

                </article>

            </div>

        </div>
    </div>
</section>

@endsection
