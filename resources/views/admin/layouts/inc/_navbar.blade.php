<!-- https://themesbrand.com/skote-django/layouts/icons-boxicons.html -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->


            <ul class="metismenu list-unstyled" id="side-menu">
                <!-- <li class="menu-title" key="t-menu">القائمة</li> -->

                {{--------  Home---------}}
                @if(checkPermission(1))

                    <li>
                        <a href="{{route('admin.dashboard')}}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">الرئيسية</span>
                        </a>
                    </li>
                @endif
                @if(checkPermission(31))
                    <li>
                        <a href="{{route('admin-orders.index')}}" class="waves-effect">
                            <i class="bx bxs-file"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">  طلبات الاستقدام</span>
                        </a>
                    </li>
                @endif
{{--                @if(checkPermission(34))--}}
{{--                    <li>--}}
{{--                        <a href="{{route('biographies-special.index')}}" class="waves-effect">--}}
{{--                            <i class="bx bxs-file-plus"></i>--}}
{{--                            <span class="badge rounded-pill bg-info float-end"></span>--}}
{{--                            <span key="t-dashboards">   طلبات الاستقدام الخاصة </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}
                @if(checkPermission(18))
                    <li>
                        <a href="{{route('biographies.index')}}" class="waves-effect">
                            <i class="bx bxs-file-find"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">   السير الذاتية </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('biographies.blocked')}}" class="waves-effect">
                            <i class="bx bxs-error-alt"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">   السير الذاتية المحظورة </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('nationalities.index')}}" class="waves-effect">
                            <i class="bx bx-globe"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards"> دول الاستقدام  </span>
                        </a>
                    </li>
                @endif
                @if(checkPermission(22))
                    <li>
                        <a href="{{route('users.index')}}" class="waves-effect">
                            <i class="bx bxs-user-detail"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">العملاء</span>
                        </a>
                    </li>
                @endif
                @if(checkPermission(22))
                    <li>
                        <a href="{{route('contacts.index')}}">
                            <i class="bx bxs-inbox"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">طلبات التواصل</span>
                        </a>
                    </li>
                @endif
                @if(checkPermission(6))
                    <li>
                        <a href="{{route('admins.index')}}" class="waves-effect">
                            <i class="bx bx-user"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">الموظفين </span>
                        </a>
                    </li>
                @endif
                @if(checkPermission(40))
                    <li>
                        <a href="{{route('roles.index')}}" class="waves-effect">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">صلاحيات الموظفين</span>
                        </a>
                    </li>
                @endif
                @if(checkPermission(14))
                    <li>
                        <a href="{{route('recruitment-offices.index')}}" class="waves-effect">
                            <i class="bx bxs-buildings"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards"> مكاتب الاستقدام  </span>
                        </a>
                    </li>
                @endif
                @if(checkPermission(3))

                    <li>
                        <a href="{{route('settings.index')}}" class="waves-effect">
                            <i class="bx bx-wrench"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">الإعدادات العامة</span>
                        </a>
                    </li>
                @endif

                @if(checkPermission(5))
                    <li>
                        <a href="#" class="waves-effect editProfile">
                            <i class="bx bx-user-circle"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-dashboards">الملف الشخصى</span>
                        </a>
                    </li>
                @endif

                @if(checkPermission(10))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-report"></i>
                            <span>اعدادات السيرة الذاتية  </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{route('experiences.index')}}">
                                    <i class="bx bx-star"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">الخبرة </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('jobs.index')}}">
                                    <i class="bx bx-id-card"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">مسميات الوظائف </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('language-titles.index')}}">
                                    <i class="bx bx-text"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">اللغات </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('nationalities.index')}}">
                                    <i class="bx bx-flag"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">الجنسيات</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('religions.index')}}">
                                    <i class="bx bxs-id-card"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards"> الاديان </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('skills.index')}}">
                                    <i class="bx bx-star"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards"> المهارات </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('social-types.index')}}">
                                    <i class="bx bx-slider"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards"> الحالة الاجتماعية </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('cities.index')}}">
                                    <i class="bx bxs-id-card"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards"> المدن  </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('age-ranges.index')}}">
                                    <i class="bx bx-filter"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards"> فئة الاعمار  </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(checkPermission(36))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-book-content"></i>
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span>بيانات الصفحة الرئيسية  </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="{{route('sliders.index')}}">
                                    <i class="bx bx-list-ol"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">البنر الرئيسى</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('our-services.index')}}">
                                    <i class="bx bx-list-ol"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">خدماتنا</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('frequently-questions.index')}}">
                                    <i class="bx bx-question-mark"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">الاسئلة الشائعة</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{route('frequently-subjects.index')}}">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards">المواضيع الشائعة</span>
                                </a>
                            </li>


                            {{--                        <li>--}}
                            {{--                            <a href="{{route('sponsors.index')}}" >--}}
                            {{--                                <i class="bx bxs-planet"></i>--}}
                            {{--                                <span class="badge rounded-pill bg-info float-end"></span>--}}
                            {{--                                <span key="t-dashboards"> الرعاة </span>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}

                            <li>
                                <a href="{{route('statistics.index')}}">
                                    <i class="bx bx-pie-chart-alt-2"></i>
                                    <span class="badge rounded-pill bg-info float-end"></span>
                                    <span key="t-dashboards"> الاحصائيات </span>
                                </a>
                            </li>


                        </ul>
                    </li>
                @endif



            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
