@extends('frontend.layouts.layout')

@section('title')
    من نحن
@endsection

@section('styles')
    <style>
        body {
            background-color: #fff;
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

    </style>
@endsection

@section('content')
    <!-- ✅ Banner -->
    <div class="banner">
        <h1>من نحن</h1>
        <ul>
            <li><a href="{{ route('home') }}">الرئيسية</a></li>
            <li><a href="#" class="active">من نحن</a></li>
        </ul>
    </div>

    <!-- ✅ محتوى الصفحة -->
    <section class="about">
      <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mb-lg-0 mb-50 mt-50">
                <div class="about_text">
                    <div class="SectionTitle text-md-start">
                        <h2 class="title" data-aos="fade-up"> من نحن  </h2>
                        <h6 class="hint" data-aos="fade-up"> شركة ايجاز للاستقدام ... </h6>
                    </div>
                    <p >
                        أحد أعرق شركات الاستقدام في المملكة منذ أكثر منذ ثلاثون عاما ولدينا عشرة فروع خارج المملكة لجلب أفضل العمالة المدربة والماهرة طبقا للمعايير الدولية ارضاءا لعملائنا

                    </p>


                    <ul class="description-list list-unstyled">
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            خدمة عملاء مميزة على مدار اليوم

                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            مرخصين من وزارة الموارد البشرية ومتواجدون في منصة مساند
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            ضمان العمالة 3 أشهر
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            نلتزم بتقديم خدمات استقدام عالية الجودة بمستوى عالٍ من الاحترافية
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            سرعه الانجاز والتواصل الفعال خلال مده العقد معك

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-12 position-relative">
                <div class="img">
                    @if(Cookie::get('branch') == 'yanbu')
                        <img src="{{ asset('frontend/img/about_yanbu.jpg') }}" alt="Yanbu">
                    @elseif(Cookie::get('branch') == 'jeddah')
                        <img src="{{ asset('frontend/img/about_jeddah.jpg') }}" alt="Jeddah">
                    @elseif(Cookie::get('branch') == 'riyadh')
                        <img src="{{ asset('frontend/img/about_riyadh.jpg') }}" alt="Riyadh">
                    @else
                        <img src="{{ asset('frontend/img/about_yanbu.jpg') }}" alt="Default">
                    @endif
                    <div class="bun">
                        <h6>
                            يمكنك الأن استقدام عمالتك لفترات محدودة ماذا تنتظر!؟
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', function () {
        const image = document.getElementById('animated-image');
        if (image) {
            image.classList.add('rotate');
            setTimeout(() => {
                image.classList.remove('rotate');
            }, 1600); // 1.6 ثانية نفس مدة الانيميشن
        }
    });
</script>
@endsection


