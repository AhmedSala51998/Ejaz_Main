@extends('frontend.layouts.layout')

@section('title')
مدونة الاستقدام في السعودية
@endsection

@section('styles')
   <link rel="stylesheet" href="{{asset('frontend/css/blogs_index_style.css')}}" />
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
    <div class="">

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
                @php
                    $featured = $blogs->where('is_featured', 1)->first();
                    $normalBlogs = $featured
                        ? $blogs->where('id', '!=', $featured->id)
                        : $blogs;
                @endphp
                {{-- Featured Editorial --}}
                @if($featured)
                <section class="editorial-feature">
                    <a href="{{ route('blog.show', $featured->slug) }}">
                        <img src="{{ asset($featured->featured_image ?? 'frontend/img/blogs/default_b.png') }}"
                            alt="{{ $featured->title }}">
                        <div class="feature-overlay">
                            <span>مقال مميز</span>
                            <h2>{{ $featured->title }}</h2>
                            <p>{{ $featured->excerpt }}</p>
                        </div>
                    </a>
                </section>
                @endif
                {{-- Magazine Grid --}}
                @if($normalBlogs->count())
                    <section class="magazine-grid">
                         @foreach($normalBlogs as $blog)
                            <article class="mag-card">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="card-link"></a>
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

    </div>
</section>

@endsection
