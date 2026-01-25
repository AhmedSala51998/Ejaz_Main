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
                        <i class="fas fa-headset me-2"></i>
                    </button>-->
                </div>
            </div>
        </div>
@endforeach

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
