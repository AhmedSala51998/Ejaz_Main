@extends('frontend.layouts.layout')

@section('title')
    الأسئلة الشائعة
@endsection

@section('styles')
<style>
body{
    background:#fff;
    font-family:'Tajawal',sans-serif;
    color:#333;
}

/* ===== Banner ===== */
.banner{
    background:linear-gradient(135deg,#f4a835,#fff1db);
    padding:60px 20px;
    text-align:center;
    border-radius:0 0 50px 50px;
    box-shadow:0 8px 20px rgba(0,0,0,.1);
    position:relative;
    overflow:hidden;
}
.banner h1{
    font-size:3rem;
    font-weight:900;
}
.banner ul{
    list-style:none;
    padding:0;
    margin-top:15px;
    display:flex;
    justify-content:center;
    gap:20px;
}
.banner ul li a{
    color:#333;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
}
.banner ul li a.active,
.banner ul li a:hover{
    color:#fff;
    background:#f4a835;
    padding:6px 14px;
    border-radius:12px;
}

/* ===== Support Page ===== */
.supportPage{
    padding:60px 0;
    background:linear-gradient(180deg,#fffdfa,#fff);
}

/* ===== Trending (Sidebar) ===== */
.trending{
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(14px);
    border-radius:22px;
    padding:25px;
    border:1px solid rgba(244,168,53,.4);
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    height:100%;
}

.trending .headTitle h1{
    font-size:22px;
    font-weight:800;
    color:#f4a835;
    margin-bottom:20px;
}

.trending ul{
    list-style:none;
    padding:0;
    margin:0;
}

.trending ul li{
    margin-bottom:12px;
}

.trending ul li a{
    display:block;
    padding:14px 16px;
    border-radius:14px;
    background:#fff;
    border:1px solid rgba(244,168,53,.25);
    color:#333;
    font-weight:600;
    transition:.3s;
}

.trending ul li a:hover,
.trending ul li.active a{
    background:linear-gradient(135deg,#f4a835,#ffb23c);
    color:#fff;
    transform:translateX(-5px);
    box-shadow:0 8px 18px rgba(244,168,53,.35);
}

/* ===== FAQ Container ===== */

/* ===== FAQ Item ===== */
.supportFaq .accordion-item,
.supportFaq .faq-item{
    background:#fff;
    border-radius:16px;
    margin-bottom:15px;
    border:1px solid rgba(244,168,53,.25);
    overflow:hidden;
    transition:.3s;
}

.supportFaq .accordion-item:hover,
.supportFaq .faq-item:hover{
    box-shadow:0 10px 25px rgba(244,168,53,.25);
}

.supportFaq .accordion-button{
    background:transparent;
    font-weight:700;
    color:#333;
    padding:16px 18px;
}

.supportFaq .accordion-button:not(.collapsed){
    background:linear-gradient(135deg,#f4a835,#ffb23c);
    color:#fff;
}

.supportFaq .accordion-body{
    padding:18px;
    line-height:1.8;
    color:#555;
}

/* ===== Subject Content ===== */
#container-question p{
    font-size:16px;
    line-height:1.9;
    color:#444;
}

/* ===== Responsive ===== */
@media(max-width:991px){
    .banner h1{font-size:2.4rem}
    .supportFaq{margin-top:20px}
}

@media(max-width:575px){
    .banner{
        padding:40px 15px;
        border-radius:0 0 30px 30px;
    }
    .banner h1{font-size:1.9rem}
    .trending{padding:20px}
    .supportFaq{padding:20px}
}
</style>
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> الأسئلة الشائعة </h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active">  الأسئلة الشائعة  </a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->

        <!-- ================ supportPage ================= -->
        <section class="supportPage">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-2">
                        <!-- faq -->
                        <div class="" id="container-question">
                        @include('frontend.pages.support.parts.questions')
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </content>
@endsection

@section('js')

    <script>
        $(document).on('click','.subjectTextShow',function (e){
           e.preventDefault();
           var text=$(this).attr('data-text');
            var content=``;

            if(text=="questions"){


                $.ajax({
                    type:'GET',
                    url:"{{route('frontend.frequently-questions')}}",
                    data:{

                    },

                    success:function(res){
                        if(res['status']==true)
                        {
                            $('#container-question').html(res['html']);

                        }
                        else if(res['status']==false)
                        {

                        }
                        else
                        {

                        }

                    },
                    error: function(data){

                    }
                });








            }
            else{
               content=`<p>${text}</p>`;
                $('#container-question').html(content);


            }



        });
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                @foreach($questions as $question)
                {
                "@type": "Question",
                "name": {!! json_encode($question->title, JSON_UNESCAPED_UNICODE) !!},
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": {!! json_encode(strip_tags($question->desc), JSON_UNESCAPED_UNICODE) !!}
                }
                }@if(!$loop->last),@endif
                @endforeach
            ]
        }
    </script>

@endsection
