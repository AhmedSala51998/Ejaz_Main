@extends('frontend.layouts.layout')

@section('title')
{{ $blog->title }}
@endsection

@section('styles')
<style>
:root{
    --orange:#D89835;
    --orange-dark:#c8812a;
    --text:#1f1f1f;
    --muted:#666;
    --bg:#fff;
    --soft:#f9f9f9;
    --shadow:0 25px 60px rgba(0,0,0,.08);
}

body{
    font-family:'Tajawal',sans-serif;
    background:var(--bg);
    color:var(--text);
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

/* ===== Layout ===== */
.article-layout{
    display:grid;
    grid-template-columns:1fr 340px;
    gap:50px;
    margin-top:60px;
}
@media(max-width:992px){
    .article-layout{grid-template-columns:1fr}
}

/* ===== HERO ===== */
.article-hero{
    position:relative;
    height:460px;
    border-radius:32px;
    overflow:hidden;
    box-shadow:var(--shadow);
    margin-top: 50px
}
.article-hero img{
    width:100%;
    height:100%;
    object-fit:cover;
}
.article-hero::after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(to top,rgba(0,0,0,.75),rgba(0,0,0,.15));
}
.hero-content{
    position:absolute;
    bottom:0;
    padding:45px;
    color:#fff;
    z-index:2;
}
.hero-tag{
    background:var(--orange);
    padding:6px 20px;
    border-radius:30px;
    font-size:.85rem;
    font-weight:800;
    display:inline-block;
    margin-bottom:15px;
}
.hero-content h1{
    font-size:2.7rem;
    font-weight:900;
    line-height:1.4;
    margin-bottom:12px;
}
.hero-meta{
    font-size:.9rem;
    opacity:.9;
}

/* ===== Article Box ===== */
.article-box{
    background:#fff;
    border-radius:30px;
    padding:50px;
    margin-top:-80px;
    position:relative;
    box-shadow:var(--shadow);
}
@media(max-width:768px){
    .article-hero{height:260px}
    .article-box{padding:25px;margin-top:-40px}
}

/* ===== Content ===== */
.article-content{
    font-size:1.05rem;
    line-height:2;
    color:#444;
}
.article-content h2,
.article-content h3{
    margin-top:40px;
    color:var(--orange);
    font-weight:800;
}
.article-content ul{
    padding-right:22px;
}
.article-content li{
    margin-bottom:12px;
}

/* ===== Sidebar ===== */
.article-sidebar{
    position:sticky;
    top:120px;
    display:flex;
    flex-direction:column;
    gap:25px;
}
.side-card{
    background:#fff;
    border-radius:24px;
    padding:28px;
    box-shadow:var(--shadow);
}
.side-card h4{
    font-weight:900;
    margin-bottom:12px;
}
.side-btn{
    display:block;
    background:linear-gradient(135deg,var(--orange),#f3c26f);
    color:#fff;
    text-align:center;
    padding:14px;
    border-radius:40px;
    font-weight:800;
    text-decoration:none;
}
.side-btn:hover{
    background:var(--orange-dark);
}

/* ===== Author ===== */
.author-box{
    display:flex;
    align-items:center;
    gap:15px;
}
.author-avatar{
    width:55px;
    height:55px;
    border-radius:50%;
    background:var(--orange);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-weight:900;
}
.author-box span{
    font-size:.85rem;
    color:var(--muted);
}
</style>
@endsection

@section('content')
<div class="banner">
    <h1>{{ $blog->title }}</h1>
    <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="{{ route('blog.index') }}">المدونة</a></li>
        <li><a class="active">{{ $blog->title }}</a></li>
    </ul>
</div>

<section class="container pb-5">

    {{-- HERO --}}
    <div class="article-hero">
        <img src="{{ asset($blog->second_image ?? 'frontend/img/blogs/default_b.png') }}"
             alt="{{ $blog->title }}">

        <div class="hero-content">
            <span class="hero-tag">الاستقدام</span>
            <h1>{{ $blog->title }}</h1>
            <div class="hero-meta">
                {{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}
            </div>
        </div>
    </div>

    <div class="article-layout">

        {{-- MAIN ARTICLE --}}
        <article class="article-box">
            <div class="article-content">
                {!! $blog->content !!}
            </div>
        </article>

        {{-- SIDEBAR --}}
        <aside class="article-sidebar">

            <div class="side-card author-box">
                <div class="author-avatar">S</div>
                <div>
                    <strong>قسم الاستقدام</strong>
                    <span>مقال إرشادي</span>
                </div>
            </div>

            <div class="side-card">
                <h4>تاريخ النشر</h4>
                <p>{{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}</p>
            </div>

            <div class="side-card">
                <a href="{{ route('blog.index') }}" class="side-btn">
                    ← الرجوع للمدونة
                </a>
            </div>

        </aside>

    </div>
</section>
@endsection
