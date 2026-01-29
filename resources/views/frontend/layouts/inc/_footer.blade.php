<style>
    footer {
        background: #F8F8F8;
        color: #333;
        font-family: 'Tajawal', sans-serif;
        padding: 60px 0 20px;
        position: relative;
        overflow: hidden;
    }

    footer .footer-logo img {
        max-width: 160px;
        margin-bottom: 20px;
    }

    footer h3 {
        font-size: 20px;
        margin-bottom: 15px;
        color: #D9801F;
    }

    footer ul {
        list-style: none;
        padding: 0;
    }

    footer ul li {
        margin-bottom: 10px;
    }

    footer ul li a {
        text-decoration: none;
        color: #555;
        transition: all 0.3s ease;
    }

    footer ul li a:hover {
        color: #D9801F;
    }

    footer .connect i {
        margin-left: 10px;
        color: #D9801F;
        min-width: 20px;
        display: inline-block;
    }

    footer .social {
        display: flex;
        gap: 12px;
        margin-top: 20px;
    }

    footer .social a {
        background: #D9801F;
        color: white;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    footer .social a:hover {
        background: #F1B165;
    }

    footer .copy {
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #ddd;
        font-size: 14px;
        color: #888;
    }

    footer .copy img {
        margin-top: 10px;
        max-width: 120px;
    }

    @media (max-width: 767px) {
        footer {
            text-align: center;
        }

        footer .social {
            justify-content: center;
        }
    }
</style>

<footer dir="rtl">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="footer-logo">
                    <a href="{{route('home')}}">
                        <!--<img src="{{asset('frontend/img/ramadan_logo.png')}}" alt="logo">-->
                        <img src="{{$settings->footer_logo?get_file($settings->footer_logo):asset('frontend/img/logo.svg')}}" alt="logo">
                    </a>
                </div>
                <p>{{$settings->footer_desc}}</p>
            </div>

            <div class="col-lg-2 col-6">
                <h3>روابط سريعة</h3>
                <ul>
                    <li><a href="{{route('all-workers')}}">طلب استقدام</a></li>
                    <li><a href="{{trans('transferService')}}">طلب نقل خدمات</a></li>
                    <li><a href="{{route('track_order_view')}}">تتبع طلبك</a></li>
                    @auth
                        <li><a href="{{route('auth.profile')}}">{{__('frontend.profile')}}</a></li>
                        <li><a href="{{route('auth.profile')}}">طلبات الاستقدام</a></li>
                    @endauth
                    @guest
                        <li><a href="{{route('auth.login')}}">{{__('frontend.Login')}}</a></li>
                    @endguest
                </ul>
            </div>

            <div class="col-lg-2 col-6">
                <h3>روابط تهمك</h3>
                <ul>
                    <li><a href="{{checkRouteIsHome('#popular_service')}}">{{__('frontend.OurServices')}}</a></li>
                    <li><a href="{{route('frontend.aboutUs')}}">من نحن</a></li>
                    <li><a href="{{route('frontend.show.countries')}}">دول الاستقدام</a></li>
                    <li><a href="{{route('frontend.show.ourStaff')}}">خدمة العملاء</a></li>
                    <!--<li><a href="{{route('frontend.supports')}}">{{__('frontend.faq')}}</a></li>-->
                    <li><a href="{{route('frontend.supports.contactUs')}}">{{__('frontend.contactUs')}}</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h3>مزيد من الدعم</h3>
                <ul class="connect">
                    @if(Cookie::get('branch') == 'yanbu')
                      <li><i style="color:#d97706 !important" class="fa-solid fa-location-dot"></i> {{$settings->address1??"السعودية - الرياض - شارع الوحدة"}}</li>
                    @elseif(Cookie::get('branch') == 'jeddah')
                      <li><i style="color:#d97706 !important" class="fa-solid fa-location-dot"></i> الأمير فيصل، حي الخالدية، جدة 23423</li>
                    @elseif(Cookie::get('branch') == 'riyadh')
                        <li><i style="color:#d97706 !important" class="fa-solid fa-location-dot"></i> 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</li>
                    @else
                        <li><i style="color:#d97706 !important" class="fa-solid fa-location-dot"></i> {{$settings->address1??"السعودية - الرياض - شارع الوحدة"}}</li>
                    @endif
                    @if($settings->callNumber)
                        <li><i style="color:#d97706 !important" class="fa-solid fa-phone"></i> <a href="tel:{{$settings->callNumber}}">{{$settings->callNumber}}</a></li>
                    @endif
                    <li><i style="color:#d97706 !important" class="fab fa-whatsapp"></i> <a href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}">{{$settings->whatsappNumber}}</a></li>
                    <li><i style="color:#d97706 !important" class="fa-solid fa-phone"></i> <a href="https://api.whatsapp.com/send?phone={{$settings->phone1}}">{{$settings->phone1}}</a> - <a href="https://api.whatsapp.com/send?phone={{$settings->phone2}}">{{$settings->phone2}}</a></li>
                    <li><i style="color:#d97706 !important" class="fa-solid fa-phone"></i> <a href="https://api.whatsapp.com/send?phone={{$settings->phone3}}">{{$settings->phone3}}</a> - <a href="https://api.whatsapp.com/send?phone={{$settings->phone4}}">{{$settings->phone4}}</a></li>
                    <li><i style="color:#d97706 !important" class="fa-solid fa-envelope"></i> <a href="mailto:{{$settings->email1}}">{{$settings->email1}}</a></li>
                </ul>
                <ul class="social">
                    @if($settings->facebook)
                        <li><a href="{{$settings->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if($settings->whatsapp)
                        <li><a href="{{$settings->whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                    @endif
                    @if($settings->twitter)
                        <li><a href="{{$settings->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    @endif
                    @if($settings->snapchat_ghost)
                        <li><a href="{{$settings->snapchat_ghost}}" target="_blank"><i class="fab fa-snapchat"></i></a></li>
                    @endif
                    @if($settings->instagram)
                        <li><a href="{{$settings->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    @endif
                </ul>
            </div>

            <div class="col-12">
                <div class="copy">
                    <p>كل الحقوق محفوظة لشركة إيجاز للاستقدام © <script>document.write(new Date().getFullYear())</script></p>
                    <img src="{{asset('frontend/img/musand.svg')}}" alt="musaned">
                </div>
            </div>
        </div>
    </div>
</footer>
