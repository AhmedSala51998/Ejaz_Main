@extends('frontend.layouts.layout')

@section('title')
{{ $blog->title }}
@endsection

@section('styles')
  <link rel="stylesheet" href="{{asset('frontend/css/blogs_show_details_style.css')}}" />
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
