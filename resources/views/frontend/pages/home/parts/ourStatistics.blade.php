@section('styles')
<style>
.statistics{
    padding:40px 0;
}

.statistics .SectionTitle{
    text-align:center;
    margin-bottom:60px;
}

.statistics .title{
    font-size:40px;
    font-weight:900;
    color:#111827;
    margin-bottom:10px;
    letter-spacing:-0.5px;
}

.statistics .hint{
    font-size:16px;
    color:#6b7280;
    max-width:600px;
    margin:0 auto;
    line-height:1.7;
}

/* grid spacing */
.statisticsInner{
    row-gap:25px;
}

/* card */
.statistics .specifications{
    position:relative;
    background:#fff;
    border:1px solid rgba(17,24,39,.06);
    border-radius:20px;
    padding:35px 22px;
    text-align:center;
    transition:all .35s ease;
    height:100%;
    overflow:hidden;
}

/* subtle top highlight line */
.statistics .specifications::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:3px;
    background:linear-gradient(90deg,#D89835,#f59e0b);
    opacity:0;
    transition:.3s ease;
}

.statistics .specifications:hover::before{
    opacity:1;
}

/* icon container */
.statistics .specifications i{
    width:60px;
    height:60px;
    line-height:60px;
    border-radius:14px;
    font-size:26px !important;
    color:#D89835 !important;
    background:rgba(216,152,53,.08);
    display:block;
    margin:0 auto 15px;
}

/* number */
.statistics .odometer{
    font-size:38px;
    font-weight:900;
    color:#111827;
    margin:0;
    letter-spacing:1px;
}

/* label */
.statistics h5,
.statistics h6{
    font-size:15px;
    font-weight:600;
    color:#6b7280;
    margin-top:8px;
}

/* responsive */
@media(max-width:991px){
    .statistics .title{
        font-size:32px;
    }

    .statistics .odometer{
        font-size:32px;
    }
}

@media(max-width:767px){
    .statistics{
        padding:80px 0;
    }

    .statistics .specifications{
        padding:28px 18px;
    }
}

</style>
@endsection
@if (count($statistics) == 4)
    <section class="statistics">
        <div class="container">

            <div class="row statisticsInner">
                <div class="circleBlur"></div>
                <div class="circleBlur2"></div>
                @foreach($statistics as $statistic)
                <div class="col-12 col-md-3 p-2">
                    <div class="specifications wow fadeInUp">
                        <i style="font-size: 44px !important;color:#d97706 !important;margin-left:5px !important" class="fa {{$statistic->icon}}"></i>
                        <p style="padding-left:5px !important;font-weight:bold" class="odometer" data-count="{{$statistic->number}}">00</p>
                        <h5> {{$statistic->title}} </h5>
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
@section('js')
<script>
    if (window.innerWidth > 768) {
        document.querySelectorAll('.odometer').forEach(el => {
            el.innerHTML = el.dataset.count;
        });
    }
</script>
@endsection


