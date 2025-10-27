@extends('frontend.layouts.layout')

@section('title')
    مركز  المساعدة
@endsection

@section('styles')
    <style>
    </style>
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1>  مركز  المساعدة  </h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active">  مركز  المساعدة  </a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->

        <!-- ================ supportPage ================= -->
        <section class="supportPage">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 p-2">
                        <!-- trending  -->
                        <div class="trending">

                            <div class="headTitle text-start " data-aos=" fade-up">
                                <h1> موضوعات شائعة </h1>
                            </div>
                            <ul>
                                <ul>
                                    <li class="" data-aos=" fade-up active"> <a data-text="questions" class="subjectTextShow" href="">الاسئلة الشائعة</a> </li>
                                </ul>
                                @forelse($subjects as $subject)
                                <li class="" data-aos=" fade-up"> <a data-text="{{$subject->desc}}" class="subjectTextShow" href="">{{$subject->title}}</a> </li>
                                @empty
                                    <li class="" data-aos=" fade-up"> <a href=""> لايوجد مواضيع شائعة </a> </li>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 p-2">
                        <!-- faq -->
                        <div class="supportFaq bg-white" id="container-question">
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
                    url:"{{route('frontend.supports')}}",
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


@endsection
