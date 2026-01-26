
{{--==============--}}
<link rel="stylesheet" href="{{asset('frontend/css/header_style.css')}}" />
@php
    $isHomePage = Request::is('/'); // Check if current route is homepage
    $headerClass = $isHomePage ? 'homepage-header' : 'default-header';
@endphp

<header class="main-header {{ $headerClass }}" id="mainHeader">
    <div class="container-fluid">
        <section class="header-inner">
            <a class="navbar-brand" href="{{route('home')}}">
                <!--<img src="{{asset('frontend/img/ramadan_logo.png')}}" loading="lazy" alt="Company Logo" class="header-logo">-->
                <img src="{{$settings->header_logo?get_file($settings->header_logo):asset('frontend/img/logo.svg')}}" width="100" height="55" loading="eager" fetchpriority="high" decoding="async" class="header-logo" alt="Company Logo">
            </a>

            <nav class="navbar navbar-expand-lg main-nav">
                <button id="mobileMenuToggle" class="mobile-toggler d-lg-none">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <ul class="navbar-nav">
                    <li><a class="navLink {{ Request::routeIs('home') ? 'active' : '' }}" href="{{route('home')}}"> {{__('frontend.Home')}} </a></li>
                    <li class="dropdownWrapper">
                        <a class="navLink dropdownToggle {{ Request::routeIs(['all-workers', 'transferService', 'services-single']) ? 'active' : '' }}" href="javascript:void(0);" id="toggleCategories">
                            خدماتنا
                            <svg class="arrowIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z"/>
                            </svg>
                        </a>
                        <div class="dropdownMenu categoriesList" id="categoriesMenu">
                            <ul>
                                <li><a href="{{ route('all-workers') }}">طلب استقدام</a></li>
                                <li><a href="{{ route('transferService') }}">طلب نقل خدمات</a></li>
                                <li><a href="{{ route('services-single') }}">خدمات فردية</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="navLink {{ Request::routeIs('frontend.aboutUs') ? 'active' : '' }}" href="{{route('frontend.aboutUs')}}"> من نحن </a></li>
                    <li><a class="navLink {{ Request::routeIs('frontend.show.countries') ? 'active' : '' }}" href="{{route('frontend.show.countries')}}"> دول الاستقدام </a></li>
                    <li><a class="navLink {{ Request::routeIs('frontend.show.ourStaff') ? 'active' : '' }}" href="{{route('frontend.show.ourStaff')}}"> خدمة العملاء </a></li>
                    <li><a class="navLink {{ Request::routeIs('track_order_view') ? 'active' : '' }}" href="{{route('track_order_view')}}"> تتبع طلبك</a></li>
                    <li><a class="navLink {{ Request::routeIs('blog.index') ? 'active' : '' }}" href="{{route('blog.index')}}"> المدونة </a></li>
                    <li><a class="navLink {{ Request::routeIs('frontend.supports.contactUs') ? 'active' : '' }}" href="{{route('frontend.supports.contactUs')}}"> تواصل معنا</a></li>

                    @auth()
                        <li class="dropdownWrapper d-none d-lg-block">
                            <a class="navLink dropdownToggle {{ Request::routeIs(['auth.profile', 'auth.notifications', 'auth.settings']) ? 'active' : '' }}" href="javascript:void(0);">
                                حسابي
                                <svg class="arrowIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z"/>
                                </svg>
                            </a>
                            <div class="dropdownMenu categoriesList">
                                <ul>
                                    <li><a href="{{route('auth.profile')}}"> طلبات الاستقدام </a></li>
                                    <li><a href="{{route('auth.profile')}}"> الاشعارات</a></li>
                                    <li><a href="{{route('auth.logout')}}"> {{__('frontend.Logout')}}</a></li>
                                </ul>
                            </div>
                        </li>

                    @endauth
                    @guest
                        <li class="d-none d-lg-block"><a class="navLink {{ Request::routeIs('auth.login') ? 'active' : '' }}" href="{{route('auth.login')}}">تسجيل الدخول</a></li>
                    @endguest
                </ul>
            </nav>

            <div class="moreActions d-none d-lg-block">
                <a href="{{route('all-workers')}}" class="cta-button">
                    طلب استقدام
                    <svg class="ms-2" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="7" y1="17" x2="17" y2="7"></line>
                        <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </a>
            </div>
        </section>
    </div>
</header>

<div id="mobileSidebar" class="mobile-sidebar">
    <div class="sidebar-header text-center">
        <a href="{{ route('home') }}" class="logo-link animate-logo">
            <img src="{{ asset('frontend/img/logo.png') }}" width="85" height="55" loading="eager" fetchpriority="high" decoding="async" class="img-fluid logo-img" alt="شعار">
        </a>
        <button id="closeSidebar" class="close-btn">&times;</button>
    </div>
    <ul class="sidebar-nav">
        <li><a class="{{ Request::routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">الرئيسية</a></li>
        <li><a class="{{ Request::routeIs('all-workers') ? 'active' : '' }}" href="{{ route('all-workers') }}">طلب استقدام</a></li>
        <li><a class="{{ Request::routeIs('transferService') ? 'active' : '' }}" href="{{ route('transferService') }}">طلب نقل خدمات</a></li>
        <li><a class="{{ Request::routeIs('services-single') ? 'active' : '' }}" href="{{ route('services-single') }}">خدمات فردية</a></li>
        <li><a class="{{ Request::routeIs('frontend.aboutUs') ? 'active' : '' }}" href="{{route('frontend.aboutUs')}}">من نحن</a></li>
        <li><a class="{{ Request::routeIs('frontend.show.countries') ? 'active' : '' }}" href="{{route('frontend.show.countries')}}">دول الاستقدام</a></li>
        <li><a class="{{ Request::routeIs('frontend.show.ourStaff') ? 'active' : '' }}" href="{{route('frontend.show.ourStaff')}}">خدمة العملاء</a></li>
        <li><a class="{{ Request::routeIs('track_order_view') ? 'active' : '' }}" href="{{route('track_order_view')}}">تتبع الطلب</a></li>
        <li><a class="{{ Request::routeIs('blog.index') ? 'active' : '' }}" href="{{route('blog.index')}}">المدونة</a></li>
        <li><a class="{{ Request::routeIs('frontend.supports.contactUs') ? 'active' : '' }}" href="{{route('frontend.supports.contactUs')}}">تواصل معنا</a></li>
        @auth()
            <li class="dropdownWrapper d-block d-lg-none">
                <a class="navLink dropdownToggle {{ Request::routeIs(['auth.profile', 'auth.notifications', 'auth.settings']) ? 'active' : '' }}" href="javascript:void(0);">
                    حسابي
                    <svg class="arrowIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 10l5 5 5-5z"/>
                    </svg>
                </a>
                <div class="dropdownMenu categoriesList">
                    <ul>
                        <li><a href="{{route('auth.profile')}}"> طلبات الاستقدام </a></li>
                        <li><a href="{{route('auth.profile')}}"> الاشعارات</a></li>
                        <li><a href="{{route('auth.logout')}}"> {{__('frontend.Logout')}}</a></li>
                    </ul>
                </div>
            </li>

        @endauth
        @guest
            <li class="d-block d-lg-none"><a class="navLink {{ Request::routeIs('auth.login') ? 'active' : '' }}" href="{{route('auth.login')}}">تسجيل الدخول</a></li>
        @endguest
    </ul>
</div>
<div id="sidebarOverlay" class="sidebar-overlay"></div>

<script>
document.addEventListener("DOMContentLoaded", () => {

    /* =========================
       Helpers
    ========================== */
    const $ = (s, p = document) => p.querySelector(s);
    const $$ = (s, p = document) => [...p.querySelectorAll(s)];

    const currentPath = location.pathname.replace(/\/$/, "");

    const setActiveLink = (link) => {
        const linkPath = link.pathname.replace(/\/$/, "");
        if (linkPath === currentPath) {
            link.classList.add("active");
            return true;
        }
        link.classList.remove("active");
        return false;
    };

    /* =========================
       Active Links (Desktop + Mobile)
    ========================== */
    $$(".navbar-nav .navLink, #mobileSidebar a").forEach(setActiveLink);

    /* =========================
       Dropdown Active State
    ========================== */
    $$(".dropdownWrapper").forEach(wrapper => {
        const toggle = $(".dropdownToggle", wrapper);
        const menu = $(".categoriesList, .dropdownMenu", wrapper);
        if (!toggle || !menu) return;

        const links = $$("a", menu);
        const hasActive = links.some(setActiveLink);

        if (hasActive) {
            toggle.classList.add("active");
            menu.classList.add("force-show");
        }
    });

    /* =========================
       Dropdown Toggle (Delegation)
    ========================== */
    document.addEventListener("click", (e) => {
        const toggle = e.target.closest(".dropdownToggle");
        if (!toggle) return;

        e.preventDefault();
        const wrapper = toggle.closest(".dropdownWrapper");
        const menu = $(".categoriesList, .dropdownMenu", wrapper);
        if (!menu) return;

        const isOpen = menu.classList.contains("force-show");

        $$(".categoriesList.force-show, .dropdownMenu.force-show")
            .forEach(m => m.classList.remove("force-show"));

        $$(".dropdownToggle.active")
            .forEach(t => t.classList.remove("active"));

        if (!isOpen) {
            menu.classList.add("force-show");
            toggle.classList.add("active");
        }
    }, { passive: true });

    /* =========================
       Mobile Sidebar
    ========================== */
    const sidebar = $("#mobileSidebar");
    const overlay = $("#sidebarOverlay");

    $("#mobileMenuToggle")?.addEventListener("click", () => {
        sidebar?.classList.add("active");
        overlay?.classList.add("active");
    });

    $("#closeSidebar")?.addEventListener("click", closeSidebar);
    overlay?.addEventListener("click", closeSidebar);

    function closeSidebar() {
        sidebar?.classList.remove("active");
        overlay?.classList.remove("active");
    }

    /* =========================
       Sticky Header (Optimized)
    ========================== */
    const header = $("#mainHeader");
    if (header) {
        let ticking = false;

        window.addEventListener("scroll", () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    header.classList.toggle("sticky-header", window.scrollY > 0);
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }

});
</script>

