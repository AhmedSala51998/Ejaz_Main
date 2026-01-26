@extends('frontend.layouts.layout')

@section('title')
    من نحن
@endsection

@section('styles')
 <link rel="stylesheet" href="{{asset('frontend/css/about_style.css')}}" />
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
            }, 1600);
        }
    });
</script>
@endsection


