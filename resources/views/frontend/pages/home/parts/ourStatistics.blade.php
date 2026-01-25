<style>
.statistics {
    position: relative;
    padding: 80px 0;
    background: linear-gradient(145deg, #f7f8fc, #ffffff);
    overflow: hidden;
}

.statistics .SectionTitle {
    text-align: center;
    margin-bottom: 50px;
}

.statistics .title {
    font-size: 36px;
    font-weight: bold;
    color: #0d2a4a;
}

.statistics .hint {
    font-size: 16px;
    color: #6c757d;
}

.statisticsInner {
    position: relative;
    z-index: 2;
}

.statistics .specifications {
    background: #fff;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    border-radius: 16px;
    padding: 30px 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

.statistics .specifications:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
}

.statistics .specifications i {
    font-size: 40px;
    color: #ff9800;
    margin-bottom: 20px;
    display: block;
}

.statistics .specifications h1 {
    font-size: 32px;
    font-weight: bold;
    color: #1c1e21;
    margin-bottom: 10px;
}

.statistics .specifications h6 {
    font-size: 16px;
    color: #777;
}

.circleBlur, .circleBlur2 {
    position: absolute;
    border-radius: 50%;
    z-index: 0;
}

.circleBlur {
    width: 300px;
    height: 300px;
    background: rgba(255, 193, 7, 0.15);
    top: -100px;
    left: -100px;
    filter: blur(120px);
}

.circleBlur2 {
    width: 250px;
    height: 250px;
    background: rgba(0, 123, 255, 0.15);
    bottom: -80px;
    right: -80px;
    filter: blur(100px);
}
@media (max-width: 767px) {
  .statistics .specifications {
    margin-bottom: 20px;
  }
  .statistics .col-6 {
    max-width: 100%;
    flex: 0 0 100%;
  }
}

</style>

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



