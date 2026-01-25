@foreach($currentOrders as $currentOrder)
    @php
        $createdAt = \Carbon\Carbon::parse($currentOrder->created_at);
        $expiresAtTimestamp = $createdAt->copy()->addHours(48)->timestamp * 1000;
        $orderStatus = $currentOrder->status;
    @endphp

    <div class="col-12 mb-4">
        <div class="card-custom shadow rounded-4 overflow-hidden position-relative">
            <div class="row g-0">
                <div class="col-md-5 bg-white p-3">
                    <div class="swiper workerCvSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a data-fancybox="{{$currentOrder->biography->id}}" href="{{ get_file($currentOrder->biography->cv_file) }}">
                                    <img src="{{ get_file($currentOrder->biography->cv_file) }}" class="img-fluid rounded-3 shadow-sm">
                                </a>
                            </div>
                            @foreach($currentOrder->biography->images as $image)
                                <div class="swiper-slide">
                                    <a data-fancybox="{{$currentOrder->biography->id}}" href="{{ get_file($image->image) }}">
                                        <img src="{{ get_file($image->image) }}" class="img-fluid rounded-3 shadow-sm">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-7 p-4 bg-light position-relative d-flex flex-column justify-content-between">
                     <div class="mb-3">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <h6 class="fw-bold text-orange mb-1">{{ __('frontend.Nationality') }}</h6>
                                <p class="mb-0 text-muted">{{ $currentOrder->biography->nationalitie->title ?? '-' }}</p>
                            </li>
                            <li class="mb-2">
                                <h6 class="fw-bold text-orange mb-1">{{ __('frontend.job') }}</h6>
                                <p class="mb-0 text-muted">{{ $currentOrder->biography->job->title ?? '-' }}</p>
                            </li>
                            <li>
                                <h6 class="fw-bold text-orange mb-1">{{ __('frontend.RecruitmentStatus') }}</h6>
                                <p class="mb-0 text-muted">{{ __('frontend.RecruitmentCurrent') }}</p>
                            </li>
                        </ul>
                    </div>


                    @if($orderStatus == 'under_work')
                    <div id="timer{{$currentOrder->id}}" class="timer d-flex justify-content-between text-center rounded-3 p-2 mb-3"
                         data-date="{{ $expiresAtTimestamp }}" data-id="{{ $currentOrder->id }}" data-status="{{$currentOrder->status}}">
                        <div id="days{{$currentOrder->id}}" class="time-box">00</div>
                        <div id="hours{{$currentOrder->id}}" class="time-box">00</div>
                        <div id="minutes{{$currentOrder->id}}" class="time-box">00</div>
                        <div id="seconds{{$currentOrder->id}}" class="time-box">00</div>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center bg-white bg-opacity-75 p-2 rounded-3">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('frontend')}}/img/customer-service.png" width="40" class="me-2">
                            <div>
                                <h6 class="mb-0 text-orange">{{ $currentOrder->admin->name }}</h6>
                                <small class="text-muted">خدمة العملاء</small>
                            </div>
                        </div>
                        <a href="{{ route('profile.getOrder', $currentOrder->id) }}" target="_blank" class="btn btn-orange btn-sm px-3">
                            تفاصيل الطلب
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


