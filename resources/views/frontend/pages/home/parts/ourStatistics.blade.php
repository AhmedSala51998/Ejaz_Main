<link rel="stylesheet" href="{{asset('frontend/css/our_statistics_style.css')}}" />
@if (count($statistics) == 4)
    <section class="statistics">
        <div class="container">
            <div class="SectionTitle">
                <h2 class="title"> {{__('frontend.statistics')}} </h2>
                <h6 class="hint"> {{$settings->our_statistics_desc}} </h6>
            </div>
            <div class="row statisticsInner">
                <div class="circleBlur"></div>
                <div class="circleBlur2"></div>
                @foreach($statistics as $statistic)
                <div class="col-12 col-md-3 p-2">
                    <div class="specifications wow fadeInUp">
                        <i style="font-size: 44px !important;color:#d97706 !important;margin-left:5px !important" class="fa {{$statistic->icon}}"></i>
                        <h1 class="odometer" data-count="{{$statistic->number}}">00</h1>
                        <h6> {{$statistic->title}} </h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@else
    <section class="statistics">
        <div class="container">
            <div class="SectionTitle">
                <h2 class="title"> الاحصائيات </h2>
                <h6 class="hint"> اليك بعض احصائيات العملاء الذين تشرفنا بالعمل معهم </h6>
            </div>
            <div class="row statisticsInner">
                <div class="circleBlur"></div>
                <div class="circleBlur2"></div>
                <div class="col-6 col-md-3 p-2">
                    <div class="specifications wow fadeInUp">
                        <i class="fa fa-users"></i>
                        <h1 class="odometer" data-count="794">00</h1>
                        <h6> عمالائنا </h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                    <div class="specifications wow fadeInUp">
                        <i class="fas fa-building"></i>
                        <h1 class="odometer" data-count="812">00</h1>
                        <h6> زوارنا </h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                    <div class="specifications wow fadeInUp">
                        <i class="fa fa-user"></i>
                        <h1 class="odometer" data-count="793">00</h1>
                        <h6> خدمة العملاء </h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                    <div class="specifications wow fadeInUp">
                        <i class="fa fa-briefcase"></i>
                        <h1 class="odometer" data-count="710">00</h1>
                        <h6> عامل وعاملة </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<script>
    if (window.innerWidth > 768) {
        document.querySelectorAll('.odometer').forEach(el => {
            el.innerHTML = el.dataset.count;
        });
    }
</script>


