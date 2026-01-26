<link rel="stylesheet" href="{{asset('frontend/css/our_statistics_home_style.css')}}" />
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
                        <i class="fa {{$statistic->icon}}"></i>
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
                        <i class="fa fa-buildings"></i>
                        <h1 class="odometer" data-count="812">00</h1>
                        <h6> زوارنا </h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                    <div class="specifications wow fadeInUp">
                        <i class="fa fa-user-headset"></i>
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



