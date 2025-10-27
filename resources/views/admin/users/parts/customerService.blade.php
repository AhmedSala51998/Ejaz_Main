@extends('admin.layouts.layout')
@section('styles')
    <!-- Data Tables -->
    <!-- DataTables -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    {{--    {{asset('dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css--}}

    <style>
        .dropify-font-upload:before,
        .dropify-wrapper .dropify-message span.file-icon:before {
            content: "\f382";
            font-weight: 100;
            color: #000;
            font-size: 26px;
        }

        .dropify-wrapper .dropify-message p {
            text-align: center;
            font-size: 15px;
        }

    </style>
    @include('frontend.layouts.assets._css')
    <link rel="stylesheet" media="all" href="{{asset('frontend')}}/cute-alert-master/style.css"/>
@endsection

@section('page-title')
خدمة العملاء
@endsection


@section('content')

    <content>
        <!-- ================ select Customer Service ================= -->
        <section class="selectCustomerService">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 p-2">
                        <div class="headTitle">
                            <h1> اختر احد مندوبي خدمة العملاء </h1>
                            <p>
                                {{__('frontend.Please choose a customer service representative to continue completing the contract and complete the recruitmentContract')}}
                            </p>
                        </div>
                        <div class="choose">
                            @foreach($admins as $admin)
                                <!--  customer -->
                                <div class=" col customerOption " id="customerSupport">
                                    <input type="radio" class="btn-check customerSupport" value="{{$admin->id}}" name="customer" id="option{{$admin->id}}">
                                    <label class="btn btn-outline" for="option{{$admin->id}}">
                                        <img src="{{asset('frontend')}}/img/customer-service.png" alt="">
                                        <span> {{$admin->name}} </span>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                        <div class=" pt-4 p-2 text-center">


                            <button  attr-id="{{$cv->id}}" user-id="{{$user->id}}"    class="animatedLink Recruitment-Request">
                                {{__('frontend.Recruitment Request')}}
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </content>













@endsection


@section('js')
<script>

    $(document).on('click','.Recruitment-Request',function (e){
        e.preventDefault()
        var ob = $(this)
        var id = $(this).attr('attr-id');
        var url = '{{route('admin.adminCompleteTheRecruitmentRequest',[$cv->id,':id',$user->id])}}';

        var customer_support = $("#customerSupport .customerSupport:checked").val()

        var user_id=  $(this).attr('user-id');
        if(customer_support == '' ||customer_support == null)
        {
            cuteToast({
                type: "warning", // or 'info', 'error', 'warning'
                message: "{{__('frontend.please Select From Customer Support')}}",
                timer: 3000
            })
            return 0 ;
        }
        url = url.replace(':id', customer_support);
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                ob.attr('disabled',true)
                ob.html(`<i class='fa fa-spinner fa-spin '></i>`)
            },
            success: function(data){
                ob.attr('disabled',false)
                ob.html(`{{__('frontend.Recruitment Request')}}
                <i class="fa-solid fa-briefcase ms-2"></i>`)
                cuteAlert({
                    title: "{{__('frontend.Congratulation')}}",
                    message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                    type: "success", // or 'info', 'error', 'warning'
                    buttonText: "{{__('frontend.ok')}}"
                }).then((e)=>{
                    location.replace("{{route('users.index')}}")
                })

            },
            error: function(data) {
                ob.html(`{{__('frontend.Recruitment Request')}}
                <i class="fa-solid fa-briefcase ms-2"></i>`)
                if (data.status === 400) {
                    cuteToast({
                        type: "warning", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.this worker had reserved')}}",
                        timer: 3000
                    })
                }

                if (data.status === 500) {
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.there ar an error')}}",
                        timer: 3000
                    })
                }
            }
        });




    });
</script>

@endsection









