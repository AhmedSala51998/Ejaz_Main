@extends('frontend.layouts.layout')

@section('title')
{{ $blog->title }}
@endsection

@section('styles')
<style>
:root {
    --orange: #D89835;
    --orange-dark: #c8812a;
    --gray-dark: #5F5F5F;
    --text-main: #212121;
    --card-bg: rgba(255,255,255,0.25);
    --border-color: rgba(255,255,255,0.25);
    --shadow-color: rgba(0,0,0,0.08);
    --bg-light: #fdf6ed;
}

body {
    font-family: 'Tajawal', sans-serif;
    background: var(--bg-light);
    color: var(--text-main);
    margin: 0;
    padding: 0;
}

/* Banner */
.banner {
    background: linear-gradient(135deg, #f4a835, #fff1db);
    padding: 60px 20px;
    text-align: center;
    border-radius: 0 0 50px 50px;
    color: #333;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 20px var(--shadow-color);
}
.banner::before {
    content: '';
    position: absolute;
    top: -120px;
    left: -120px;
    width: 350px;
    height: 350px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
    z-index: 0;
}
.banner h1 { font-size: 3rem; font-weight: 800; position: relative; z-index: 1; }
.banner ul { list-style: none; display: flex; justify-content: center; gap: 18px; padding: 0; margin-top: 15px; position: relative; z-index: 1; }
.banner ul li a { color: #333; font-weight: 600; text-decoration: none; transition: .3s; padding: 6px 14px; border-radius: 12px; }
.banner ul li a.active, .banner ul li a:hover { background: #fff; color: var(--orange); }

/* Layout */
.blog-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 40px;
    margin-top: 40px;
}

.blog-main {
    background: var(--card-bg);
    border-radius: 25px;
    padding: 30px;
    backdrop-filter: blur(15px);
    box-shadow: 0 15px 35px var(--shadow-color);
}

/* Hero Image */
.blog-hero {
    position: relative;
    height: 450px;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 30px;
}
.blog-hero img { width: 100%; height: 100%; object-fit: cover; }
.hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.55), rgba(0,0,0,0.05));
    display: flex; flex-direction: column; justify-content: flex-end;
    padding: 30px;
    color: #fff;
}
.hero-overlay h1 { font-size: 2.4rem; font-weight: 800; margin:0; }
.hero-badge { background: var(--orange); padding: 6px 16px; border-radius: 50px; font-size: .85rem; margin-bottom: 10px; width: fit-content; }

/* Blog Content */
.blog-body {
    font-size: 1.05rem;
    line-height: 2;
    color: var(--gray-dark);
}
.blog-body h2, .blog-body h3 { color: var(--orange); margin-top: 35px; font-weight: 700; }
.blog-body ul { padding-right: 20px; }
.blog-body ul li { margin-bottom: 10px; }

/* Sidebar */
.blog-sidebar {
    position: sticky;
    top: 120px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.side-box {
    background: var(--card-bg);
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 10px 25px var(--shadow-color);
    backdrop-filter: blur(12px);
}
.side-box h4 { margin-bottom: 10px; color: var(--text-main); }
.side-btn {
    display: block; background: var(--orange); color: #fff;
    text-align: center; padding: 10px; border-radius: 50px;
    text-decoration: none; font-weight: 600; transition: .3s;
}
.side-btn:hover { background: var(--orange-dark); }

/* Responsive */
@media (max-width: 992px){ .blog-layout { grid-template-columns: 1fr; } .blog-sidebar { position: static; } .blog-hero { height: 300px; } }
@media (max-width: 768px){ .blog-hero { height: 200px; } }

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

<section class="container py-5">
    <div class="blog-layout">

        <!-- Main Article -->
        <article class="blog-main">
            <div class="blog-hero">
                <img src="{{ asset($blog->second_image ?? 'frontend/img/blogs/default_b.png') }}" alt="{{ $blog->title }}">
                <div class="hero-overlay">
                    <span class="hero-badge">الاستقدام</span>
                    <h1>{{ $blog->title }}</h1>
                    <div class="hero-meta">{{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}</div>
                </div>
            </div>

            <div class="blog-body">
                {!! $blog->content !!}
            </div>
        </article>

        <!-- Sidebar -->
        <aside class="blog-sidebar">
            <div class="side-box">
                <h4>تاريخ النشر</h4>
                <p>{{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}</p>
            </div>

            <div class="side-box">
                <h4>تنقّل</h4>
                <a href="{{ route('blog.index') }}" class="side-btn">← الرجوع للمدونة</a>
            </div>
        </aside>

    </div>
</section>
@endsection
