@foreach($ordersHistory as $orderHistory)
<div class="order-card-super-pro mb-5">
    <div class="row g-4 align-items-stretch">
        {{-- Increased col-lg- width for image on large screens --}}
        <div class="col-lg-5 col-md-6 d-flex align-items-center justify-content-center p-3">
            <div class="swiper workerCvSlider-super-pro shadow-orange-glow rounded-4 position-relative overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach($orderHistory->biography->images as $image)
                        <div class="swiper-slide d-flex align-items-center justify-content-center">
                            <a data-fancybox="user-cv-{{$orderHistory->id}}" href="{{get_file($image->image)}}" class="cv-image-link-super-pro">
                                <img src="{{get_file($image->image)}}" alt="CV Image" class="img-fluid rounded-4 animate__animated animate__fadeIn">
                            </a>
                        </div>
                    @endforeach
                </div>
             
            </div>
        </div>

        {{-- Adjusted col-lg- width for details, giving it more space --}}
        <div class="col-lg-7 col-md-6 p-3"> {{-- Changed to col-lg-7 to give more width to details --}}
            <div class="order-details-content-super h-100 d-flex flex-column justify-content-start"> {{-- Changed justify-content-center to justify-content-start for text to avoid vertical centering issues --}}
                <h4 class="order-code-heading-super mb-3">
                    <i class="fas fa-barcode me-2 text-orange-dark"></i> {{__('frontend.orderCode')}}:
                    <span class="fw-bold text-dark">{{$orderHistory->order_code}}</span>
                </h4>
                <ul class="order-info-list-super-pro">
                    <li>
                        <div class="info-item-super">
                            <span class="icon-wrap-super"><i class="fas fa-globe text-orange-gradient"></i></span>
                            <div>
                                <h6 class="text-orange-dark-title">{{__('frontend.Nationality')}}:</h6>
                                <p>{{$orderHistory->biography->nationalitie? $orderHistory->biography->nationalitie->title : "غير متاح"}}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="info-item-super">
                            <span class="icon-wrap-super"><i class="fas fa-user-tie text-orange-gradient"></i></span>
                            <div>
                                <h6 class="text-orange-dark-title">{{__('frontend.Occupation')}}:</h6>
                                <p>{{$orderHistory->biography->job? $orderHistory->biography->job->title : "غير متاح"}}</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="d-flex align-items-center mt-3">
                    <span class="status-label-super me-2"><i class="fas fa-info-circle text-orange-main"></i> الحالة:</span>
                    @php
                        $statusClass = '';
                        $statusText = '';
                        switch ($orderHistory->status) {
                            case "canceled":
                                $statusClass = 'status-pill-orange status-canceled-orange';
                                $statusText = __('frontend.orderCanceled');
                                break;
                            case "tfeez":
                                $statusClass = 'status-pill-orange status-tfeez-orange';
                                $statusText = 'أصبح العقد الخاص بكم في مرحلة التفييز بنجاح';
                                break;
                            case "musaned":
                                $statusClass = 'status-pill-orange status-musaned-orange';
                                $statusText = 'تم ربط العقد الخاص بكم في مساند بنجاح';
                                break;
                            case "traning":
                                $statusClass = 'status-pill-orange status-traning-orange';
                                $statusText = 'أصبح العقد الخاص بكم في مرحلة الإجراءات بنجاح';
                                break;
                            case "contract":
                                $statusClass = 'status-pill-orange status-contract-orange';
                                $statusText = 'تم قبول التعاقد الخاص بكم';
                                break;
                            case "finished":
                                $statusClass = 'status-pill-orange status-finished-orange';
                                        $statusText = __('frontend.orderDone');
                                        break;
                                    default:
                                        $statusClass = 'status-pill-orange status-pending-orange';
                                        $statusText = 'حالة غير معروفة';
                                        break;
                                }
                            @endphp
                            <span class="order-status-pill-super {{ $statusClass }}">
                                {{ $statusText }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- New Row for buttons to place them below --}}
                <div class="col-12 mt-4 d-flex flex-column align-items-center justify-content-center"> {{-- full width column for buttons --}}
                    <a href="{{route('profile.getOrder',$orderHistory->id)}}" class="btn-details-super-pro animate__animated animate__pulse animate__infinite">
                        <i class="fas fa-file-alt me-2"></i> تفاصيل الطلب
                    </a>
                    <!--<button class="btn-contact-super-pro mt-3 animate__animated animate__fadeInUp">
                        <i class="fas fa-headset me-2"></i> تواصل معنا
                    </button>-->
                </div>
            </div>
        </div>
@endforeach


<style>
    /* Global Styling for Super Professional Design */
    :root {
        --orange-main: #FF6F00; /* Main vibrant orange */
        --orange-dark: #E65100; /* Darker orange for emphasis */
        --orange-light: #FFB300; /* Lighter orange for accents/shadows */
        --orange-gradient-start: #FFA000; /* Gradient start */
        --orange-gradient-end: #FF6F00;   /* Gradient end */
        --card-bg: #ffffff;
        --light-bg: #fdfdfd; /* Very light background for the page */
        --dark-text: #2c3e50; /* Dark text for contrast */
        --subtle-text: #7f8c8d; /* Grey for secondary text */
        --border-light: #f0f0f0;
        --shadow-elevation-1: 0 4px 12px rgba(0, 0, 0, 0.08);
        --shadow-elevation-2: 0 10px 30px rgba(0, 0, 0, 0.15);
        --shadow-orange-glow: 0 0 25px rgba(255, 111, 0, 0.25); /* Subtle orange glow */
    }

    body {
        font-family: 'Tajawal', sans-serif;
        background-color: var(--light-bg);
        color: var(--dark-text);
        line-height: 1.6;
    }

    /* Super Professional Order Card */
    .order-card-super-pro {
        background: var(--card-bg);
        border-radius: 20px; /* More rounded corners */
        box-shadow: var(--shadow-elevation-2);
        padding: 35px; /* More padding */
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1); /* Smoother transition */
        border: 1px solid var(--border-light);
        position: relative;
        overflow: hidden;
    }

    .order-card-super-pro:hover {
        transform: translateY(-12px) scale(1.015); /* More pronounced lift */
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
    }

    /* Professional CV Slider */
    .workerCvSlider-super-pro {
        width: 100%;
        max-width: 380px; /* **Increased max-width for wider image** */
        height: 380px;     /* **Increased height to maintain aspect ratio** */
        border-radius: 18px; /* Matching card radius */
        box-shadow: var(--shadow-elevation-1);
        background-color: #f7f7f7; /* Very light gray for slider background */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border: 2px solid var(--orange-main); /* Orange border for highlight */
    }

    .workerCvSlider-super-pro .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Changed to cover for a fuller image in the frame */
        border-radius: 16px; /* Slightly less than container for internal padding effect */
        transition: transform 0.6s ease; /* Slower, smoother transform */
    }

    .workerCvSlider-super-pro .swiper-slide img:hover {
        transform: scale(1.08); /* More noticeable zoom */
    }

    /* Custom Swiper Pagination & Navigation - All Orange */
    .swiper-pagination-super-pro.swiper-pagination-bullets .swiper-pagination-bullet {
        background-color: var(--orange-light);
        opacity: 0.7;
        transition: all 0.4s ease;
    }

    .swiper-pagination-super-pro.swiper-pagination-bullets .swiper-pagination-bullet-active {
        background: linear-gradient(45deg, var(--orange-gradient-start), var(--orange-gradient-end));
        opacity: 1;
        width: 30px; /* Wider active bullet */
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(255, 111, 0, 0.4);
    }

    .swiper-button-super-pro {
        color: var(--orange-main) !important;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        width: 45px; /* Larger buttons */
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        transition: all 0.4s ease;
        opacity: 0.9;
    }

    .swiper-button-super-pro:hover {
        background: var(--orange-main);
        color: white !important;
        opacity: 1;
        transform: scale(1.15);
        box-shadow: 0 5px 15px rgba(255, 111, 0, 0.5);
    }

    .swiper-button-super-pro::after {
        font-size: 1.4rem !important; /* Larger arrows */
    }

    /* Order Details Content */
    .order-details-content-super {
        padding-inline-start: 25px;
    }

    .order-code-heading-super {
        font-size: 1.7rem; /* Larger heading */
        color: var(--orange-dark);
        margin-bottom: 25px;
        border-bottom: 3px solid var(--orange-main); /* Thicker orange line */
        padding-bottom: 12px;
        display: flex;
        align-items: center;
        position: relative;
    }

    .order-code-heading-super i {
        color: var(--orange-main); /* Ensure barcode icon is orange */
    }

    .order-code-heading-super span.fw-bold {
        color: var(--dark-text); /* Keep code text dark for readability */
        margin-inline-start: 5px;
    }

    /* Order Info List Professional - All Orange Focus */
    .order-info-list-super-pro {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .order-info-list-super-pro li {
        margin-bottom: 20px; /* More space between items */
    }

    .info-item-super {
        display: flex;
        align-items: flex-start;
    }

    .info-item-super .icon-wrap-super {
        background: linear-gradient(45deg, rgba(255, 160, 0, 0.15), rgba(255, 111, 0, 0.15)); /* Orange tinted background */
        color: var(--orange-main);
        border-radius: 50%;
        width: 40px; /* Larger icon wrappers */
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-inline-end: 20px;
        font-size: 1.3rem; /* Larger icons */
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(255, 111, 0, 0.1);
    }

    .info-item-super h6 {
        margin: 0;
        font-weight: 800; /* Bolder titles */
        color: var(--orange-dark); /* Orange title */
        font-size: 1.15rem; /* Larger title font */
    }

    .info-item-super p {
        margin: 4px 0 0;
        color: var(--subtle-text); /* Subtler grey for descriptions */
        font-size: 1rem;
    }

    .text-orange-gradient {
        background: linear-gradient(45deg, var(--orange-gradient-start), var(--orange-gradient-end));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent; /* Fallback for browsers not supporting text clipping */
    }

    .text-orange-dark {
        color: var(--orange-dark) !important;
    }

    .text-orange-main {
        color: var(--orange-main) !important;
    }
    .text-orange-dark-title {
        color: var(--orange-dark) !important;
    }


    /* Status Label */
    .status-label-super {
        font-weight: 700;
        color: var(--dark-text);
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        text-transform: uppercase;
    }

    .status-label-super i {
        color: var(--orange-main);
        margin-inline-end: 8px;
        font-size: 1.2em;
    }

    /* Order Status Pill Design - Orange Theme */
    .status-pill-orange {
        padding: 10px 22px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 140px; /* Ensure consistent width */
        text-align: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .status-canceled-orange {
        background-color: #fff3e0; /* Light orange tint */
        color: #d32f2f; /* Standard red for cancel */
        border: 1px solid #d32f2f;
    }

    .status-tfeez-orange,
    .status-musaned-orange,
    .status-traning-orange {
        background-color: #fff9c4; /* Lighter yellow for pending */
        color: #fbc02d; /* Darker yellow */
        border: 1px solid #fbc02d;
    }

    .status-contract-orange {
        background-color: #ffe0b2; /* A warm, soft orange for contract */
        color: #ef6c00; /* Darker orange text */
        border: 1px solid #ef6c00;
    }

    .status-finished-orange {
        background-color: #e8f5e9; /* Light green for finished */
        color: #388e3c; /* Dark green */
        border: 1px solid #388e3c;
    }

    .status-pending-orange {
        background-color: #f5f5f5; /* Light grey for unknown */
        color: #757575; /* Medium grey */
        border: 1px solid #757575;
    }

    /* Action Buttons - Orange Theme */
    .btn-details-super-pro,
    .btn-contact-super-pro {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 15px 30px; /* Larger padding */
        border-radius: 35px; /* More rounded */
        font-weight: bold;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        font-size: 1rem; /* Slightly larger font */
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Stronger initial shadow */
        min-width: 240px; /* **Wider buttons** */
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-details-super-pro {
        background: linear-gradient(45deg, var(--orange-gradient-start), var(--orange-gradient-end));
        color: white;
        border: none;
        position: relative;
        overflow: hidden; /* For hover effect glow */
    }

    .btn-details-super-pro:before { /* Inner glow effect */
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(-100%) skewX(-30deg);
        transition: all 0.7s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .btn-details-super-pro:hover:before {
        transform: translateX(100%) skewX(-30deg);
    }

    .btn-details-super-pro:hover {
        background: linear-gradient(45deg, var(--orange-gradient-end), var(--orange-gradient-start)); /* Reverse gradient on hover */
        transform: translateY(-5px); /* More lift */
        box-shadow: 0 12px 28px rgba(255, 111, 0, 0.5); /* Stronger orange glow */
        color: white;
    }

    .btn-contact-super-pro {
        background-color: white;
        color: var(--orange-main);
        border: 2px solid var(--orange-main);
    }

    .btn-contact-super-pro:hover {
        background-color: var(--orange-main);
        color: white;
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(255, 111, 0, 0.3);
    }

    /* Animate.css Integration */
    /* Ensure Animate.css is linked in your <head> section */

    /* Responsive adjustments */
    @media (min-width: 992px) { /* Desktop large screens */
        .order-card-super-pro .col-lg-5 { /* Image column */
            flex: 0 0 auto;
            width: 41.66666667%; /* Adjusted to take 5/12 of the row */
        }
        .order-card-super-pro .col-lg-7 { /* Details column - **Increased to take 7/12 of the row** */
            flex: 0 0 auto;
            width: 58.33333333%;
        }
        /* The buttons column is now in a new row (col-12), so no need for col-lg-3 */
    }


    @media (max-width: 991.98px) {
        .order-details-content-super {
            padding-inline-start: 0;
            text-align: center;
        }
        .order-code-heading-super {
            justify-content: center;
            font-size: 1.4rem;
        }
        .order-info-list-super-pro li {
            justify-content: center;
        }
        .info-item-super {
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
        .info-item-super .icon-wrap-super {
            margin-bottom: 15px;
            margin-inline-end: 0;
        }
        .status-label-super,
        .order-status-pill-super {
            justify-content: center;
            margin: 0 auto;
        }
        /* Buttons are now col-12, so the specific padding-top for col-lg-3 is not needed */
    }

    @media (max-width: 767.98px) {
        .order-card-super-pro {
            padding: 25px;
        }
        .workerCvSlider-super-pro {
            max-width: 320px; /* Adjusted max-width for better mobile viewing */
            height: 320px;
            border-radius: 15px;
        }
        .workerCvSlider-super-pro .swiper-slide img {
            border-radius: 13px;
        }
        .order-code-heading-super {
            font-size: 1.2rem;
        }
        .btn-details-super-pro, .btn-contact-super-pro {
            width: 90%;
            max-width: 300px; /* Adjusted max-width for mobile buttons */
            padding: 12px 20px;
            font-size: 0.9rem;
        }
        .swiper-button-super-pro {
            width: 35px;
            height: 35px;
        }
        .swiper-button-super-pro::after {
            font-size: 1rem !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliders = document.querySelectorAll('.workerCvSlider-super-pro');
        sliders.forEach(slider => {
            new Swiper(slider, {
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
                },
                pagination: {
                    el: '.swiper-pagination-super-pro',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                speed: 900,
            });
        });
    });
</script>