@extends('frontend.layouts.layout')
@section('title')
    {{__('frontend.profile')}}
@endsection
@section('styles')
<style>
    /* General Profile Section Styling */
    .profile {
        background-color: #fff; /* A softer, modern light grey background */
        padding: 60px 0;
        min-height: 100vh; /* Ensure it takes at least the full viewport height */
        display: flex;
        align-items: flex-start; /* Align content to the top */
        margin-top:-30px
    }


    /* User Header Styling */
    .userHeader {
        background: linear-gradient(135deg, #f4a835, #fff1db); /* Orange gradient */
        border-radius: 10px !important;
        padding: 30px 40px;
        color: #000 !important;
        box-shadow: 0 12px 30px rgba(255,140,0,0.15); /* Deeper, softer shadow with orange tint */
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight:bold !important;
        margin-bottom: 40px; /* More space below header */
        flex-wrap: wrap;
        position: relative; /* For potential absolute positioning of elements */
        overflow: hidden; /* Ensure content stays within rounded corners */
    }

    .userHeader::before { /* Subtle background pattern */
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="%23ffffff" opacity="0.1"/></svg>');
        background-size: 50px;
        opacity: 0.1;
        pointer-events: none;
    }

    .userInfo {
        z-index: 1; /* Ensure text is above pseudo-element */
    }
    .userInfo h3 {
        font-size: 32px; /* Even larger font size for name */
        font-weight: 800; /* Extra bold */
        margin-bottom: 10px;
        letter-spacing: 0.5px; /* Slightly more spaced letters */
    }
    .userInfo p {
        margin: 0;
        font-size: 18px;
        opacity: 0.9; /* Slightly less opaque for better contrast on gradient */
        font-weight: 400;
    }
    .userHeader .control a {
        color: white;
        font-size: 26px; /* Larger icon */
        transition: transform 0.3s ease-in-out, opacity 0.3s ease; /* Smooth hover effect */
        background-color: rgba(255, 165, 0, 0.5); /* Semi-transparent orange background for button */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }
    .userHeader .control a:hover {
        transform: scale(1.15) rotate(5deg); /* More dynamic hover */
        opacity: 0.9;
        background-color: rgba(255, 165, 0, 0.7); /* More opaque orange on hover */
    }

    .userHeader .control a {
        color: #fff;
        font-size: 28px; /* Larger, more prominent icon */
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); /* Smoother animation */
        background-color: rgba(255, 255, 255, 0.2); /* Lighter, more subtle background */
        border-radius: 50%;
        width: 55px; /* Larger click area */
        height: 55px; /* Larger click area */
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .userHeader .control a:hover {
        transform: scale(1.18) rotate(8deg); /* More dynamic hover */
        background-color: rgba(255, 255, 255, 0.35); /* More opaque on hover */
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

    /* Profile Navigation Styling */
    .profileNavCol {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(255,140,0,0.1); /* Consistent, refined shadow with orange tint */
        overflow: hidden;
        margin-top: 0;
        padding: 15px 0; /* Internal padding for the whole nav block */
        height: fit-content; /* Adjust height based on content */
    }
    .profileNavCol a {
        padding: 18px 25px;
        text-align: right;
        text-decoration: none;
        color: #4a4a4a; /* Darker grey for better contrast */
        border-bottom: 1px solid #e0e0e0; /* Lighter, subtle border */
        transition: background 0.3s ease, color 0.3s ease, padding-right 0.3s ease;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: flex-end; /* Align content to the right for RTL */
        font-size: 17px;
        background-color: rgba(244, 168, 53, 0.1) !important;

    }
    .profileNavCol a i {
        margin-left: 12px; /* Space between icon and text for RTL */
        font-size: 20px; /* Larger icons */
        color: #888; /* Slightly darker grey icon color */
        transition: color 0.3s ease;
    }
    .profileNavCol a:last-child {
        border-bottom: none;
    }
    .profileNavCol a.active, .profileNavCol a:hover {
        background: #fff0cc; /* Light orange background for active/hover */
        color: #ff8c00; /* Orange text color */
        padding-right: 35px; /* More pronounced indent on hover/active */
        border: 1px solid #ff8c00;
    }
    .profileNavCol a.active i, .profileNavCol a:hover i {
        color: #ff8c00; /* Orange icon on active/hover */
    }
    .profileNavCol a.active {
        position: relative;
    }
    .profileNavCol a.active::before { /* Active indicator bar */
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background-color: #ff8c00; /* Orange bar */
        border-radius: 0 5px 5px 0;
    }


    /* Profile Content Styling */
    .profileContent {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(255,140,0,0.1); /* Consistent shadow with nav, orange tint */
        padding: 40px;
        min-height: 500px; /* Increased min-height for more substantial content area */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column; /* Allow content to stack */
        text-align: center;
    }
    .image_for_profile {
        max-width: 70%; /* Smaller image for better balance */
        height: auto;
        border-radius: 20px; /* More rounded corners */
        box-shadow: 0 10px 25px rgba(255,140,0,0.1); /* Orange tinted shadow */
        margin-bottom: 30px; /* Space below image */
    }

    /* Loader Styling (if used) */
    .linear-background3 {
        background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%);
        width: 100%;
        height: 100%; /* Take full height of parent */
        animation: loading 1.5s infinite linear;
        border-radius: 10px;
    }
    @keyframes loading {
        0% { transform: translate(-100%, 0); }
        100% { transform: translate(100%, 0); }
    }


    /* Responsive Adjustments */
    @media (max-width: 991.98px) { /* Tablet and smaller */
        .profile {
            padding: 40px 0;
            margin-top:-10px
        }
        .userHeader {
            flex-direction: column;
            text-align: center;
            padding: 25px 30px;
            margin-bottom: 30px;
        }
        .userHeader .userInfo {
            margin-bottom: 25px; /* More space between info and control */
        }
        .userInfo h3 {
            font-size: 26px;
        }
        .userInfo p {
            font-size: 17px;
        }
        .userHeader .control a {
            width: 45px;
            height: 45px;
            font-size: 22px;
        }

        .profileNavCol {
            flex-direction: row; /* Display nav links horizontally */
            flex-wrap: wrap; /* Allow wrapping */
            justify-content: center; /* Center horizontally */
            margin-bottom: 30px; /* Space below nav on smaller screens */
            padding: 10px; /* Smaller internal padding */
            box-shadow: 0 8px 20px rgba(255,140,0,0.08); /* Slightly lighter shadow with orange tint */
        }
        .profileNavCol a {
            flex: 1 1 auto; /* Allow links to grow and shrink */
            padding: 15px 10px;
            font-size: 15px;
            border-bottom: none; /* Remove bottom border for horizontal layout */
            border-left: 1px solid #f0f0f0; /* Add left border for separation */
            text-align: center;
            justify-content: center; /* Center icon and text */
        }
        .profileNavCol a:first-child {
            border-left: none; /* No left border for the first item */
        }
        .profileNavCol a i {
            margin: 0 5px; /* Adjust margin for horizontal layout */
        }
        .profileNavCol a.active, .profileNavCol a:hover {
            padding-right: 15px; /* Reset padding for horizontal layout */
            padding-left: 15px;
            background: #fff0cc; /* Keep light orange */
            color: #ff8c00; /* Keep orange text */
        }
        .profileNavCol a.active::before { /* Adjust active indicator for horizontal */
            width: 100%;
            height: 5px;
            top: auto;
            bottom: 0;
            left: 0;
            border-radius: 0 0 5px 5px;
        }

        .profileContent {
            padding: 30px;
            min-height: 350px;
        }
        .image_for_profile {
            max-width: 80%;
        }
    }

    @media (max-width: 767.98px) { /* Mobile */
        .profile {
            padding: 25px 0;
        }
        .userHeader {
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
        }
        .userInfo h3 {
            font-size: 22px;
        }
        .userInfo p {
            font-size: 15px;
        }
        .userHeader .control a {
            font-size: 20px;
            width: 40px;
            height: 40px;
        }
        .profileNavCol {
            padding: 5px;
        }
        .profileNavCol a {
            font-size: 14px;
            padding: 12px 8px;
            flex-basis: 50%; /* Two items per row on very small screens */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            border: 1px solid #f0f0f0; /* Add border for clear separation */
            margin: 2px 0; /* Small margin between items */
        }
        .profileNavCol a:first-child,
        .profileNavCol a:nth-child(2) { /* Adjust borders for first two items */
            border-left: 1px solid #f0f0f0;
        }
        .profileNavCol a.active::before { /* For mobile, active indicator can be top or bottom */
            height: 3px;
            width: 80%;
            left: 10%;
            top: 0;
            bottom: auto;
            border-radius: 0 0 3px 3px;
        }
        .profileContent {
            padding: 20px;
            min-height: 280px;
        }
        .image_for_profile {
            max-width: 90%;
            margin-bottom: 20px;
        }
    }

        .banner {
        background: linear-gradient(135deg, #f4a835, #fff1db);
        padding: 60px 20px;
        text-align: center;
        border-radius: 0 0 50px 50px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        color: #333;
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
        position: relative;
        z-index: 1;
    }

    .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 1;
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
        @media (max-width: 767.98px) {
        .banner h1 {
            font-size: 2rem;
        }
        .banner ul {
            flex-wrap: wrap; /* Allow navigation links to wrap */
            gap: 10px;
        }
        .banner {
            padding: 40px 15px;
            border-radius: 0 0 30px 30px;
        }
        .banner h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection
@section('content')
<content>
    <div class="banner">
        <h1> حسابي الشخصي </h1>
        <ul>
            <li> <a href="{{route('home')}}">الرئيسية </a> </li>
            <li> <a href="#!" class="active"> حسابي الشخصي </a> </li>
        </ul>
    </div>
    <section class="profile">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-2"> {{-- Increased column width for better header display --}}
                    <div class="userHeader">
                        <div class="userInfo">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="userName">
                                    <h3>{{$user->name}}</h3>
                                    <p>{{$user->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="control">
                            <a href="{{route('auth.logout')}}" data-bs-toggle="tooltip" title="{{__('frontend.Logout')}}">
                                <i class="fas fa-power-off"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 p-2"> {{-- Wrapped navigation and content in a single row for better alignment --}}
                    <div class="row">
                        <div class="col-lg-3"> {{-- Dedicated column for navigation --}}
                            <div class="profileNavCol">
                                <a href="{{route('profile.CurrentOrders')}}" id="activeButton" class="change_part_of_profile">
                                    <i class="fa-solid fa-user-hair-mullet"></i> طلبات الاستقدام
                                </a>
                                <a href="{{route('profile.OrdersHistory')}}" class="change_part_of_profile">
                                    <i class="fa-solid fa-user-headset"></i> سجل الطلبات
                                </a>
                                <a href="{{route('profile.Notifications')}}" class="change_part_of_profile">
                                    <i class="fas fa-bell"></i> الاشعارات
                                </a>
                                <a href="{{route('profile.editProfile')}}" class="change_part_of_profile">
                                    <i class="fas fa-cog"></i> اعدادات الحساب
                                </a>
                                <a href="{{route('auth.logout')}}">
                                    <i class="fas fa-power-off"></i> {{__('frontend.Logout')}}
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-9 mt-4 mt-lg-0"> {{-- Column for content, with top margin for mobile --}}
                            <div class="profileContent" id="display_profile_part">
                                <div class="d-flex justify-content-center align-items-center w-100 h-100"> {{-- Ensure content is centered --}}
                                    <img class="image_for_profile" src="{{asset('frontend/img/register.svg')}}" alt="Profile Placeholder Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</content>
@endsection
@section('js')
    <script>
        var ProfileLoader = `<div class="linear-background3"></div>`;
        $(document).on('click',".change_part_of_profile",function (e) {
            e.preventDefault()
            //add
            $(".change_part_of_profile").removeClass('active');
            $(this).addClass('active');
            var link = $(this).attr('href');
            $.get(link, function(data) {
                $('#display_profile_part').empty();
                $('#display_profile_part').append(ProfileLoader)
                window.setTimeout(function() {
                    $('#display_profile_part').empty();
                    $('#display_profile_part').append(data['html']);
                    loadTimer()
                    $('.select2').select2();
                    $('.dropify').dropify();
                    $.validate({
                        ignore: 'input[type=hidden]',
                        modules : 'date, security',
                        lang:"{{ LaravelLocalization::getCurrentLocale() }}",
                    });
                }, 300);
            });
        })
    </script>
    <script>
        //load more current orders
        $(document).on('click','#load_more_current_orders_button',function (e){

            e.preventDefault()
            var current_orders_page = parseInt(document.getElementById("current_page_orders").value) + 1;
            loadMoreDataFormCurrentOrders(current_orders_page);
        })//end fun
        function loadMoreDataFormCurrentOrders(current_orders_page) {
            var url = '{{route('front.loadMoreCurrentOrders')}}?page=' + current_orders_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                   //   $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_current_orders_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_current_orders_button").remove();
                    }
                    else {
                        document.getElementById("current_page_orders").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#current_orders_section_to_append').append(data.html);
                        loadTimer()
                        //   $(".spinner").hide()
                        $('#load_more_current_orders_button').html(
                             `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                           `
                        )
                    }, 20);
                },
                error: function (data) {
                    //$(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        //load more cases
        $(document).on('click','#load_more_notifications_button',function (e){
            e.preventDefault()
            var notifications_page = parseInt(document.getElementById("current_page_notifications").value) + 1;
            loadMoreDataFormNotification(notifications_page);
        })//end fun
        function loadMoreDataFormNotification(notifications_page) {
            var url = '{{route('profile.loadMoreNotifications')}}?page=' +notifications_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                   //  $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_notifications_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_notifications_button").remove();
                    }
                    else {
                        document.getElementById("current_page_notifications").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#notifications_section_to_append').append(data.html);
                       // $(".spinner").hide()
                          $('#load_more_notifications_button').html(
                             `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                           `
                          )
                    }, 20);
                },
                error: function (data) {
                   //$(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        //load more current orders
        $(document).on('click','#load_more_history_orders_button',function (e){
            e.preventDefault()
            var history_orders_page = parseInt(document.getElementById("history_page_orders").value) + 1;
            loadMoreDataFormHistoryOrders(history_orders_page);
        })//end fun
        function loadMoreDataFormHistoryOrders(history_orders_page) {
            var url = '{{route('front.loadMoreOrdersHistory')}}?page=' + history_orders_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    //   $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_history_orders_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_history_orders_button").remove();
                    }
                    else {
                        document.getElementById("history_page_orders").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#history_orders_section_to_append').append(data.html);
                        //   $(".spinner").hide()
                        $('#load_more_history_orders_button').html(
                             `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                           `
                        )
                    }, 20);
                },
                error: function (data) {
                    //$(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        var timeOfSendingCode = 0;
        // Add validator
        $.formUtils.addValidator({
            name : 'validatePhoneNumberOfSAR',
            validatorFunction : function(value, $el, config, language, $form) {
                return /^(5)(5|0|3|6|4|9|1|8|7|2)([0-9]{7})$/.test(value);
            },
            errorMessage : "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'validatePhoneNumberOfSAR'
        });
        $.formUtils.addValidator({
            name : 'repeatPassword',
            validatorFunction : function(value, $el, config, language, $form) {
                return value == $("#password").val()
            },
            errorMessage : "{{__('frontend.PasswordAndConfirmPasswordIsNotTheSame')}}",
            errorMessageKey: 'repeatPasswordKey'
        });
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $(document).on('click','.passwordEye',function(e) {
            $(this).find('.far').toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).closest('.passwordDiv').find('.passwordInput'));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        //update basic info of user
        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $("#Form").attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button').attr('disabled',true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    //$('#submit-button').prop('disabled', true);
                    window.setTimeout(function() {
                       //  $("#user_info_in_header").attr("src",data.user.logo_link);
                        $("#user_logo_in_profile").attr("src",data.user.logo_link);
                        $("#user_name_in_profile").html(data.user.name);
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_button').attr('disabled',false)
                        $('#submit_button').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_button').attr('disabled',false)
                    $('#submit_button').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 400) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the email is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
        //update password of user
        $(document).on('submit','form#FormPassword',function(e) {
            e.preventDefault();
            var myForm = $("#FormPassword")[0]
            var formData = new FormData(myForm)
            var url = $("#FormPassword").attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_buttonPassword').attr('disabled',true)
                    $('#submit_buttonPassword').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    //$('#submit-button').prop('disabled', true);
                    window.setTimeout(function() {
                        // $("#user_info_in_header").attr("src",data.user.logo_link);
                        // $("#user_info_in_profile").attr("src",data.user.logo_link);
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_buttonPassword').attr('disabled',false)
                        $('#submit_buttonPassword').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_buttonPassword').attr('disabled',false)
                    $('#submit_buttonPassword').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.there ar an error')}}",
                            timer: 3000
                        })
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
        var codeSentToMobile
        $(document).on('submit','form#ChangePhoneForm',function(e) {
            e.preventDefault();
            $("#phoneInCode").val($("#Phone").val())
            var myForm = $("#ChangePhoneForm")[0]
            var formData = new FormData(myForm)
            var url = $('#ChangePhoneForm').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button_for_phone_change').attr('disabled',true)
                    $('#submit_button_for_phone_change').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    window.setTimeout(function() {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.Code Is Sent to Your phone')}}",
                            timer: 3000
                        })
                        $('#submit_button_for_phone_change').attr('disabled',false)
                        $('#submit_button_for_phone_change').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)
                        codeSentToMobile = data
                        $("#registerForm").hide()
                        $("#CodeForm").show()
                        document.getElementById("vCodeIdFirst").focus();
                        timeOfSendingCode++
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_button_for_phone_change').attr('disabled',false)
                    $('#submit_button_for_phone_change').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
    </script>
    <script>
        var vCode = (function () {
            //cache dom
            var $inputs = $("#vCode").find("input");
            //bind events
            $inputs.on('keyup', processInput);
            //define methods
            function processInput(e) {
                var x = e.charCode || e.keyCode;
                if ((x == 8 || x == 46) && this.value.length == 0) {
                    var indexNum = $inputs.index(this);
                    if (indexNum != 0) {
                        $inputs.eq($inputs.index(this) - 1).focus();
                    }
                }
                if (ignoreChar(e))
                    return false;
                else if (this.value.length == this.maxLength) {
                    $(this).next('input').focus();
                }
            }
            function ignoreChar(e) {
                var x = e.charCode || e.keyCode;
                if (x == 37 || x == 38 || x == 39 || x == 40)
                    return true;
                else
                    return false
            }
        })();
        $(document).on('submit','form#CompleteRegister',function(e) {
            e.preventDefault();
            const codeHere = [];
            var inputs = $(".vCode-input");
            for(var i = 0; i < inputs.length; i++){
                if ($(inputs[i]).val() == '' || $(inputs[i]).val() == null){
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.please , fill all input with correct code')}}",
                        timer: 3000
                    })
                    return 0
                }else{
                    codeHere.push($(inputs[i]).val());
                }
            }
            if (codeSentToMobile != codeHere.join('')){
                cuteToast({
                    type: "error", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.this code is wrong')}}",
                    timer: 3000
                })
                return 0;
            }
            $("#codeInCode").val(codeSentToMobile)
            var myForm = $("#CompleteRegister")[0]
            var formData = new FormData(myForm)
            var url = $('#CompleteRegister').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#CompleteRegisterButton').attr('disabled',true)
                    $('#CompleteRegisterButton').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    window.setTimeout(function() {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#CompleteRegisterButton').attr('disabled',false)
                        $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                        location.reload()
                    }, 2000);
                },
                error: function (data) {
                    $('#CompleteRegisterButton').attr('disabled',false)
                    $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
        $(document).on('click',"#registerAgain",function (e){
            e.preventDefault()
            $("#registerForm").show()
            $("#CodeForm").hide()
            document.getElementById("vCodeIdFirst").blur();
        })
        $(document).on('click',"#sendCodeAgain",function (e){
            e.preventDefault()
            if ( $("#sendCodeAgain").attr('attr-code-sent') == 'sent')
            {
                $('#sendCodeAgain').html(`<i class='fa fa-spinner fa-spin '></i>`)
                window.setTimeout(function() {
                    $("#codeReceiveOrNot").html("{{__('frontend.CodeIsSentAgain')}}")
                    $("#Form").submit()
                    countdown(1)
                    $("#sendCodeAgain").attr('attr-code-sent',"no_send")
                }, 1000);
            }else{
                cuteToast({
                    type: "error", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.Please wait until the time is up')}}",
                    timer: 3000
                })
                return 0;
            }
        })
        var timeoutHandle;
        function countdown(minutes) {
            var seconds = 60;
            var mins = minutes
            var counter = document.getElementById("sendCodeAgain");
            var current_minutes = mins-1
            let interval = setInterval(() => {
                seconds--;
                counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
                // our seconds have run out
                if(seconds <= 0) {
                    // our minutes have run out
                    if(current_minutes <= 0) {
                        // we display the finished message and clear the interval so it stops.
                        counter.innerHTML = "{{__('frontend.ReSent')}}"
                        $("#codeReceiveOrNot").html("{{__('frontend.I did not receive the activation code')}}")
                        $("#sendCodeAgain").attr('attr-code-sent',"sent")
                        clearInterval(interval);
                    } else {
                        // otherwise, we decrement the number of minutes and change the seconds back to 60.
                        current_minutes--;
                        seconds = 60;
                    }
                }
                // we set our interval to a second.
            }, 1000);
        }


        function loadTimer()
        {
            $(document).find('.timer').each(function (index){
                var date = $(this).data('date')
                var id = $(this).data('id')
                var countDownDate = new Date(date).getTime();
                setInterval(function () {
                    var now = new Date().getTime();
                    var timeLeft = countDownDate - now;
                    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    // Result is output to the specific element
                    document.getElementById("days"+id).innerHTML = days + "<span> يوم </span>";
                    document.getElementById("hours"+id).innerHTML = hours + "<span> ساعة </span> "
                    document.getElementById("minutes"+id).innerHTML = minutes + " <span> دقيقة </span> "
                    document.getElementById("seconds"+id).innerHTML = seconds + "<span> ثانية </span> "
                }, 1000);
            })
        }
    </script>
<script>
    $('#activeButton').click();
</script>
@endsection
