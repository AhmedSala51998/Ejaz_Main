
{{--==============--}}
<style>
/* General Body & Typography */
body {
    font-family: 'Rubik', sans-serif; /* A more modern and clean Arabic-friendly font */
    color: #333;
    line-height: 1.6;
    margin: 0; /* Ensure no default body margin interferes with sticky header */
    padding-top: 0; /* Will be adjusted by JS for sticky header */
}

/* Header Styling - Base styles */
.main-header {
    padding: 0 0; /* Reduced padding for a shorter header - KEEPING THIS AS IS */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Subtle shadow for default header */
    position: relative; /* Default position for sticky transition */
    z-index: 1000;
    transition: all 0.3s ease-in-out; /* Smooth transition for sticky and background changes */
    border-bottom: 1px solid rgba(0, 0, 0, 0.05); /* Very light border-bottom */
}

/* Header Background for Homepage (Vertical Gradient) */
.main-header.homepage-header {
    background: linear-gradient(to bottom, #fcefdc 0%, #ffffff 100%); /* Lighter, more subtle vertical gradient */
    border-color: rgba(252, 239, 220, 0.5); /* Matching border for light gradient */
    box-shadow: 0 4px 15px rgba(252, 239, 220, 0.5); /* Subtle shadow matching the gradient */
}

/* Header Background for Other Pages (default is light/white) */
.main-header.default-header {
    background: #ffffff; /* Pure white background */
    border-color: rgba(0, 0, 0, 0.08); /* Slightly more visible border for white header */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Default shadow for white header */
}

/* Sticky Header (applies to both types) */
.main-header.sticky-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    /* Background determined by homepage-header or default-header */
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); /* More prominent shadow when sticky */
    padding: 5px 0; /* Further reduced padding when sticky */
}
/* Specific sticky shadow for homepage if it should be distinct */
.main-header.homepage-header.sticky-header {
    box-shadow: 0 6px 20px rgba(252, 239, 220, 0.7); /* Stronger shadow for sticky on homepage */
}


/* Adjust body padding when sticky header is active to prevent content jump */
body.sticky-header-active {
    padding-top: var(--header-height); /* Set this via JS based on header height */
}

.main-header .container-fluid {
    max-width: 1440px; /* Wider container for more space */
    margin: 0 auto;
    padding: 0 30px; /* More padding on sides */
}

.header-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: nowrap; /* Prevent wrapping for desktop layout */
}

/* Logo Styling - Increased max-height while keeping header padding */
.header-logo {
    max-height: 75px; /* Increased logo size */
    transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), filter 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.2)); /* Default subtle shadow for white background */
}

/* Logo shadow for homepage (light orange gradient background) */
.homepage-header .header-logo {
    filter: drop-shadow(0 0 10px rgba(247, 183, 49, 0.4)); /* Slightly more pronounced for better visibility on lighter gradient */
}

.navbar-brand:hover .header-logo {
    transform: scale(1.08); /* Slight scale on hover */
    /* Stronger shadow on hover, specific to gradient */
    filter: drop-shadow(0 0 18px rgba(247, 183, 49, 0.7)); /* More prominent hover shadow */
}
/* Ensure hover effect looks good on white background too */
.default-header .navbar-brand:hover .header-logo {
    filter: drop-shadow(0 0 15px rgba(0, 0, 0, 0.4));
}


/* Navigation Menu */
.main-nav .navbar-nav {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 30px; /* Slightly reduced spacing */
}

.main-nav .navLink {
    color: #4a4a4a; /* Slightly darker grey for better contrast on white */
    text-decoration: none;
    font-weight: 600;
    padding: 8px 0; /* Reduced padding for nav links */
    position: relative;
    transition: color 0.3s ease, transform 0.2s ease, text-shadow 0.3s ease;
    display: block;
    font-size: 1rem; /* Standard font size */
}

/* NavLink colors on homepage header (for contrast with lighter gradient) */
.homepage-header .main-nav .navLink {
    color: #4a4a4a; /* Keep consistent as background is light */
}
.homepage-header .main-nav .navLink:hover {
    color: #d97706;
}
.homepage-header .main-nav .navLink.active {
    color: #d97706;
}


.main-nav .navLink::after {
    content: '';
    position: absolute;
    left: 50%; /* Start from center */
    transform: translateX(-50%); /* Center the underline */
    bottom: -4px; /* Slightly below the text */
    width: 0;
    height: 3px; /* Thicker underline */
    background-color: #d97706; /* Deeper orange for underline */
    border-radius: 2px;
    transition: width 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.main-nav .navLink:hover::after {
    width: 100%;
}

.main-nav .navLink:hover {
    color: #d97706;
    transform: translateY(-2px); /* Slight lift */
    text-shadow: 0 0 4px rgba(217, 119, 6, 0.2);
}

/* Active Nav Link (More polished and distinct) */
.main-nav .navLink.active {
    color: #d97706;
    font-weight: 800; /* Bolder for active */
    transform: translateY(-1px);
}
.main-nav .navLink.active::after {
    width: 100%;
    background-color: #d97706;
    box-shadow: 0 2px 6px rgba(217, 119, 6, 0.3);
}


/* Dropdown Menu (Services / Account) */
.dropdownWrapper {
    position: relative;
}

.dropdownMenu {
    display: none;
    position: absolute;
    top: calc(100% + 10px); /* Slightly less space from parent link */
    right: 0; /* Align to the right for RTL */
    background: #fff;
    border-radius: 12px; /* Slightly less rounded */
    /* NEW: Orange-toned shadow for dropdown menu */
    box-shadow: 0 8px 25px rgba(217, 119, 6, 0.25); /* Orange-toned shadow */
    padding: 12px 0; /* Reduced padding */
    min-width: 200px; /* Slightly narrower */
    z-index: 10;
    opacity: 0;
    transform: translateY(15px); /* Less initial drop */
    transition: opacity 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    border: 1px solid rgba(247, 183, 49, 0.1);
}

.dropdownMenu.force-show {
    display: block !important;
    opacity: 1;
    transform: translateY(0);
}

.dropdownMenu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.dropdownMenu ul li a {
    display: block;
    padding: 10px 22px; /* Adjusted padding */
    color: #555;
    text-decoration: none;
    font-weight: 500;
    /* NEW: Smooth transition for hover effect in dropdown */
    transition: background-color 0.3s ease, color 0.3s ease, padding-right 0.3s ease, transform 0.2s ease;
    border-right: 3px solid transparent; /* Subtle border for active/hover */
}

.dropdownMenu ul li a:hover {
    background-color: #fff8ee; /* Very light orange background on hover */
    color: #d97706;
    padding-right: 25px; /* Slight indent on hover */
    border-color: #d97706;
    transform: translateX(3px); /* Gentle slide-in effect */
}
.dropdownMenu ul li a.active {
    background-color: #f7f7f7;
    color: #d97706;
    font-weight: 600;
    border-color: #d97706;
}

/* Dropdown Arrow Icon */
.arrowIcon {
    width: 18px; /* Slightly smaller */
    height: 18px;
    margin-right: 6px; /* Consistent margin for RTL */
    vertical-align: middle;
    fill: #4a4a4a; /* Matches nav link color */
    transition: transform 0.3s ease, fill 0.3s ease;
}
/* Arrow icon color for homepage header */
.homepage-header .arrowIcon {
    fill: #4a4a4a; /* Keep consistent as background is light */
}


.dropdownToggle.active .arrowIcon {
    transform: rotate(180deg);
    fill: #d97706; /* Matches active link color */
}

/* Call to Action Button */
.cta-button {
    background: #d97706; /* Stronger orange for CTA */
    color: #fff;
    padding: 12px 28px; /* Adjusted padding */
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    box-shadow: 0 6px 20px rgba(217, 119, 6, 0.3); /* Adjusted shadow */
    position: relative;
    overflow: hidden;
    font-size: 1rem; /* Standard font size */
}

.cta-button svg {
    transition: transform 0.3s ease;
}

.cta-button:hover {
    background: #a05a00; /* Even darker orange on hover */
    box-shadow: 0 10px 30px rgba(217, 119, 6, 0.5);
    transform: translateY(-2px); /* Less lift */
    color:#FFF
}

.cta-button:hover svg {
    transform: translateX(4px); /* Less pronounced arrow movement */
}

/* Mobile Toggler (Hamburger Icon) */
#mobileMenuToggle {
    background: #fff;
    padding: 10px; /* Adjusted padding */
    border-radius: 8px; /* Adjusted rounded */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: 1px solid #f7b731;
    box-shadow: 0 4px 10px rgba(247, 183, 49, 0.2);
    transition: all 0.3s ease;
}

#mobileMenuToggle svg {
    color: #d97706; /* Icon color matches CTA */
}

#mobileMenuToggle:hover {
    background-color: #fffbe6;
    border-color: #d97706;
    transform: scale(1.03); /* Less scale on hover */
}

/* Mobile Sidebar - Keeping existing styles as they were good, with minor adjustments for consistency */
.mobile-sidebar {
    background: #fff;
    padding: 25px 20px; /* Reduced padding for sidebar */
    width: 280px; /* Slightly narrower sidebar */
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    box-shadow: -5px 0 20px rgba(247, 183, 49, 0.3); /* Adjusted shadow for consistency */
    right: -280px; /* Hidden by default */
    position: fixed;
    top: 0;
    height: 100%;
    transition: right 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); /* Faster transition */
    z-index: 11000;
    overflow-y: auto;
}

.mobile-sidebar.active {
    right: 0;
}

.sidebar-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-bottom: 20px;
    margin-bottom: 25px;
    border-bottom: 2px solid #f7b731; /* Consistent border color */
    position: relative;
}

.sidebar-header .logo-img {
    max-height: 60px; /* Smaller logo in sidebar */
    filter: drop-shadow(0 0 8px rgba(247, 183, 49, 0.6));
}

.sidebar-header .logo-link:hover .logo-img {
    transform: scale(1.05);
    filter: drop-shadow(0 0 15px rgba(247, 183, 49, 0.9));
}

.close-btn {
    position: absolute;
    top: 10px; /* Adjusted position */
    left: 15px;
    font-size: 32px; /* Adjusted size */
    background: none;
    border: none;
    color: #d97706;
    cursor: pointer;
    transition: color 0.3s ease, transform 0.2s ease;
}

.close-btn:hover {
    color: #a05a00;
    transform: rotate(45deg); /* Different rotation */
}

.sidebar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-nav li {
    margin-bottom: 12px; /* Adjusted margin */
}

.sidebar-nav li a {
    display: block;
    padding: 12px 18px; /* Adjusted padding */
    border-radius: 10px; /* Adjusted rounded */
    background-color: #fcfcfc;
    color: #4a4a4a;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    border: 1px solid #eee;
}

.sidebar-nav li a:hover,
.sidebar-nav li a.active {
    background-color: #f7b731;
    color: white;
    box-shadow: 0 4px 10px rgba(247, 183, 49, 0.3);
    border-color: #f7b731;
    transform: translateX(3px); /* Less movement on active/hover */
}

/* Sidebar Overlay */
.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1099;
    display: none;
    opacity: 0;
    transition: opacity 0.3s ease; /* Faster transition */
}

.sidebar-overlay.active {
    display: block;
    opacity: 1;
}

/* Utility Classes for Responsiveness */
.d-none { display: none !important; }
.d-block { display: block !important; }

@media (min-width: 992px) {
    .d-lg-block { display: block !important; }
    .d-lg-none { display: none !important; }
}

@media (max-width: 991.98px) {
    .d-lg-block { display: none !important; }
    .d-lg-none { display: block !important; }

    .main-nav .navbar-nav {
        display: none;
    }

    .header-inner {
        justify-content: space-between;
    }
}

/* Animations */
@keyframes zoomFade {
    0% { opacity: 0; transform: scale(0.5) translateY(-20px); }
    100% { opacity: 1; transform: scale(1) translateY(0); }
}

.animate-logo {
    animation: zoomFade 1s ease forwards;
    opacity: 0;
}



.logo-with-lottie {
    display: flex;
    align-items: center;
    gap: 8px;
}

.header-logo {
    height: 78px;
    width: auto;
}

.header-lottie {
    width: 160px;
    height: 160px;
}

@media (max-width: 768px) {
    .header-lottie {
        display: none;
    }
}

</style>
@php
    $isHomePage = Request::is('/'); // Check if current route is homepage
    $headerClass = $isHomePage ? 'homepage-header' : 'default-header';
@endphp

<header class="main-header {{ $headerClass }}" id="mainHeader">
    <div class="container-fluid">
        <section class="header-inner">
            <!--<a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('frontend/img/logo.png')}}" loading="lazy" alt="Company Logo" class="header-logo">
            </a>-->
            <a class="navbar-brand logo-with-lottie" href="{{route('home')}}">
                <img src="{{asset('frontend/img/logo.png')}}" loading="lazy" alt="Company Logo" class="header-logo">

                <dotlottie-wc
                    src="https://lottie.host/6e3d4846-9273-49bc-b9f8-ad68230ce99f/C0ScOf5nrx.lottie"
                    class="header-lottie"
                    autoplay
                    loop>
                </dotlottie-wc>
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
            <img src="{{ asset('frontend/img/logo.png') }}" class="img-fluid logo-img" alt="شعار">
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
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById('toggleCategories');
        const dropdown = document.getElementById('categoriesMenu');

        if (toggleBtn && dropdown) {
            toggleBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const isOpen = dropdown.classList.contains('force-show');
                if (isOpen) {
                    dropdown.classList.remove('force-show');
                    toggleBtn.classList.remove('active');
                } else {
                    dropdown.classList.add('force-show');
                    toggleBtn.classList.add('active');
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!toggleBtn.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.remove('force-show');
                    toggleBtn.classList.remove('active');
                }
            });
        }


    });

    document.addEventListener("DOMContentLoaded", function () {
        const mobileMenuToggle = document.getElementById("mobileMenuToggle");
        const sidebar = document.getElementById("mobileSidebar");
        const closeBtn = document.getElementById("closeSidebar");
        const overlay = document.getElementById("sidebarOverlay");

        if (mobileMenuToggle && sidebar && closeBtn && overlay) {
            mobileMenuToggle.addEventListener("click", function () {
                sidebar.classList.add("active");
                overlay.classList.add("active");
            });

            closeBtn.addEventListener("click", function () {
                sidebar.classList.remove("active");
                overlay.classList.remove("active");
            });

            overlay.addEventListener("click", function () {
                sidebar.classList.remove("active");
                this.classList.remove("active");
            });
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const currentUrl = window.location.href.split(/[?#]/)[0];

        // Function to check and set active class
        const setActiveLink = (link) => {
            try {
                const linkPath = new URL(link.href).pathname;
                const currentPath = new URL(currentUrl).pathname;
                if (linkPath === currentPath) {
                    link.classList.add("active");
                    return true; // Return true if link is active
                } else {
                    link.classList.remove("active");
                    return false;
                }
            } catch (e) {
                console.error("Invalid URL for link:", link.href, e);
                return false;
            }
        };

        // Desktop and Mobile Navigation Links
        const allNavLinks = document.querySelectorAll(".navbar-nav .navLink, #mobileSidebar .sidebar-nav a");
        allNavLinks.forEach(link => {
            setActiveLink(link);
        });

        // Handle "خدماتنا" dropdown active state (Desktop)
        const desktopDropdownWrapper = document.querySelector(".dropdownWrapper");
        if (desktopDropdownWrapper) {
            const dropdownToggle = desktopDropdownWrapper.querySelector(".dropdownToggle");
            const dropdownMenu = desktopDropdownWrapper.querySelector(".categoriesList");
            const dropdownLinks = dropdownMenu ? dropdownMenu.querySelectorAll("a") : [];

            let anyDropdownLinkActive = false;
            dropdownLinks.forEach(link => {
                if (setActiveLink(link)) {
                    anyDropdownLinkActive = true;
                }
            });

            if (anyDropdownLinkActive && dropdownToggle && dropdownMenu) {
                dropdownToggle.classList.add("active");
                dropdownMenu.classList.add("force-show");
            }
        }

        // Handle "حسابي" dropdown active state (Desktop)
        const desktopAccountDropdownWrapper = document.querySelector(".navbar-nav .dropdownWrapper.d-none.d-lg-block");
        if (desktopAccountDropdownWrapper) {
            const accountDropdownToggle = desktopAccountDropdownWrapper.querySelector(".dropdownToggle");
            const accountDropdownMenu = desktopAccountDropdownWrapper.querySelector(".categoriesList");
            const accountDropdownLinks = accountDropdownMenu ? accountDropdownMenu.querySelectorAll("a") : [];

            let anyAccountDropdownLinkActive = false;
            accountDropdownLinks.forEach(link => {
                if (setActiveLink(link)) {
                    anyAccountDropdownLinkActive = true;
                }
            });

            if (anyAccountDropdownLinkActive && accountDropdownToggle && accountDropdownMenu) {
                accountDropdownToggle.classList.add("active");
                accountDropdownMenu.classList.add("force-show");
            }
        }

        // Handle "حسابي" dropdown active state (Mobile)
        const mobileAccountDropdownWrapper = document.querySelector("#mobileSidebar .dropdownWrapper.d-block.d-lg-none");
        if (mobileAccountDropdownWrapper) {
            const mobileAccountDropdownToggle = mobileAccountDropdownWrapper.querySelector(".dropdownToggle");
            const mobileAccountDropdownMenu = mobileAccountDropdownWrapper.querySelector(".categoriesList");
            const mobileAccountDropdownLinks = mobileAccountDropdownMenu ? mobileAccountDropdownMenu.querySelectorAll("a") : [];

            let anyMobileAccountDropdownLinkActive = false;
            mobileAccountDropdownLinks.forEach(link => {
                if (setActiveLink(link)) {
                    anyMobileAccountDropdownLinkActive = true;
                }
            });

            if (anyMobileAccountDropdownLinkActive && mobileAccountDropdownToggle && mobileAccountDropdownMenu) {
                mobileAccountDropdownToggle.classList.add("active");
                mobileAccountDropdownMenu.classList.add("force-show");
            }
        }

        // Sticky Header functionality
        const mainHeader = document.getElementById('mainHeader');
        if (mainHeader) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 0) { // Or a specific offset, e.g., mainHeader.offsetHeight
                    mainHeader.classList.add('sticky-header');
                } else {
                    mainHeader.classList.remove('sticky-header');
                }
            });
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // اختار كل أزرار حسابي فقط (حسب الكلاس الموجود في الكود الحالي)
        const accountDropdowns = document.querySelectorAll('.dropdownWrapper .dropdownToggle');

        accountDropdowns.forEach(toggle => {
            const parent = toggle.closest('.dropdownWrapper');
            const dropdownMenu = parent.querySelector('.dropdownMenu');

            // تحكّم فقط إذا كان النص هو "حسابي"
            if (toggle.textContent.trim().includes("حسابي")) {
                toggle.addEventListener('click', function (e) {
                    e.preventDefault();

                    const isOpen = dropdownMenu.classList.contains('force-show');

                    if (isOpen) {
                        dropdownMenu.classList.remove('force-show');
                        toggle.classList.remove('active');
                    } else {
                        dropdownMenu.classList.add('force-show');
                        toggle.classList.add('active');
                    }
                });

                // إغلاق عند الضغط خارج "حسابي"
                document.addEventListener('click', function (event) {
                    if (!parent.contains(event.target)) {
                        dropdownMenu.classList.remove('force-show');
                        toggle.classList.remove('active');
                    }
                });
            }
        });
    });
</script>
