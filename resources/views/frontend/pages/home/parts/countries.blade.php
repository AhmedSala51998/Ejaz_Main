<link rel="stylesheet" href="{{asset('frontend/css/countries_style.css')}}" />
<script>
document.addEventListener("DOMContentLoaded", () => {
    const flags = document.querySelectorAll(".flag-wrapper");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate-flag-once");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    flags.forEach(flag => observer.observe(flag));
});
</script>

@if (count($countries)>0)
<section class="countries" id="countries">
    <div class="container">
        <div class="sectionTitle" data-aos="fade-up">
            <h1 class="section-title">دول الاستقدام</h1>
            <h6 class="section-subtitle">نقوم بالاستقدام من مختلف الدول التي توفر عمالة مهرة ...</h6>
        </div>

        <div class="allCountries">
            @foreach($countries as $country)
                <div class="country" data-aos="zoom-in">

                    <div class="flag-wrapper">

                             <img src="{{get_file($country->image)}}" alt="{{ $country->title }}" loading="lazy" width="120" height="120">


                    </div>

                    <h4>{{ $country->title }}</h4>
                    <h5>{{ $country->price }}
                        <span class="riyal-logo">
                            <svg viewBox="0 0 120 40" xmlns="http://www.w3.org/2000/svg">
                                <text x="60" y="28"
                                    text-anchor="middle"
                                    font-size="26"
                                    font-weight="800"
                                    font-family="Cairo, Tajawal, sans-serif"
                                    fill="#D89835">
                                    ريال
                                </text>
                            </svg>
                        </span>
                    </h5>
                    <p>{{ $country->description }}</p>
                    <a href="{{ route('all-workers', $country->id) }}">
                        اطلب الآن
                        <i class="fa fa-arrow-left ms-2"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
