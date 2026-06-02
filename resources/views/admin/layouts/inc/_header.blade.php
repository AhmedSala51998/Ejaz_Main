<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
                    <span class="logo-sm"><img src="{{isset($settings->tap_logo)?get_file($settings->tap_logo):asset('39a6d186-91a6-477b-9a9b-217b49230b91.jpg')}}" alt="" height="22"></span>
                    <span class="logo-lg">
                        <img class="logo_basic" src="{{isset($settings->header_logo)?get_file($settings->header_logo):asset('39a6d186-91a6-477b-9a9b-217b49230b91.jpg')}}" alt="" height="37">
                    </span>
                </a>

                <a href="{{route('admin.dashboard')}}" class="logo logo-light">
                    <!-- test -->
                    <span class="logo-sm">
                        <img class="logo_basic" src="{{isset($settings->tap_logo)?get_file($settings->tap_logo):asset('39a6d186-91a6-477b-9a9b-217b49230b91.jpg')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img class="logo_basic" src="{{isset($settings->header_logo)?get_file($settings->header_logo):asset('39a6d186-91a6-477b-9a9b-217b49230b91.jpg')}}" alt="" height="37">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">--}}
            {{-- <div class="position-relative">--}}
            {{-- <input type="text" class="form-control" placeholder="بحث ....">--}}
            {{-- <span class="bx bx-search-alt"></span>--}}
            {{-- </div>--}}
            {{-- </form>--}}

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="px-lg-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{route('admin.dashboard')}}">
                                    <img src="{{asset('dashboard')}}/assets/images/brands/github.png" alt="Github">
                                    <span>الرئيسة</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{route('sliders.index')}}">
                                    <img src="{{asset('dashboard')}}/assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>البانر</span>
                                </a>
                            </div>

                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{route('users.index')}}">
                                    <img src="{{asset('dashboard')}}/assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>العملاء</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{route('admins.index')}}">
                                    <img src="{{asset('dashboard')}}/assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                    <span>المشرفين</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item editProfile" href="#">
                                    <img src="{{asset('dashboard')}}/assets/images/brands/slack.png" alt="slack">
                                    <span>الملف الشخصى</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <a href="{{route('home')}}" ><i class="fa fa-globe" aria-hidden="true"> الموقع</i>
                </a>
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user useImageEdit" src="{{admin()->user()->image?get_file(admin()->user()->image):asset('namiLogo.svg')}}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 nameEdit" key="t-henry">{{admin()->user()->name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->

                    <a class="dropdown-item editProfile" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <span key="t-profile">الحساب الشخصى</span>
                    </a>

                    <a class="dropdown-item d-block" href="{{route('settings.index')}}"><span class="badge bg-success float-end"></span>
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                        <span key="t-settings">الإعدادات العامة</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('admin.logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">تسجيل الخروج </span></a>
                </div>
            </div>



        </div>
    </div>
</header>
