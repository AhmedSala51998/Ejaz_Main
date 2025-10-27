<style>
.card-custom {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0,0,0,0.05);
    transition: 0.3s ease;
    width: 750px;
}

@media (max-width: 991px) {
    .card-custom {
        width: 100%;
    }
}

.card-custom:hover {
    transform: scale(1.01);
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
}

.text-orange {
    color: #f4a835 !important;
}

.btn-orange {
    background-color: #f4a835;
    color: #fff;
    border-radius: 20px;
    transition: 0.3s ease;
}

.btn-orange:hover {
    background-color: #e69e24;
    color: #fff;
}

.timer .time-box {
    min-width: 72px;
    padding: 8px;
    font-weight: bold;
    font-size: 16px;
    background: #ffffff;
    border-radius: 6px;
    color: #f4a835;
    box-shadow: 0 0 6px rgba(0,0,0,0.05);
}

.profileCustomerInfo img,
.timer img {
    max-width: 100%;
    height: auto;
    display: block;
}
.card-custom {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0,0,0,0.05);
    transition: 0.3s ease;
    width: 750px;
    margin: auto;
}
@media (max-width: 991px) {
    .card-custom {
        width: 100%;
    }
}
.card-custom:hover {
    transform: scale(1.01);
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
}
.text-orange {
    color: #f4a835 !important;
}
.btn-orange {
    background-color: #f4a835;
    color: #fff;
    border-radius: 20px;
    transition: 0.3s ease;
}
.btn-orange:hover {
    background-color: #e69e24;
}
.time-box {
    min-width: 72px;
    padding: 8px;
    font-weight: bold;
    font-size: 16px;
    background: #ffffff;
    border-radius: 6px;
    color: #f4a835;
    box-shadow: 0 0 6px rgba(0,0,0,0.05);
}
.time-box {
    min-width: 72px;
    width: 72px; /* اجبره يكون ثابت */
    padding: 8px;
    font-weight: bold;
    font-size: 16px;
    background: #ffffff;
    border-radius: 6px;
    color: #f4a835;
    box-shadow: 0 0 6px rgba(0,0,0,0.05);
    text-align: center;

    /* ✅ تثبيت عرض الرقم لتجنب البربشة */
    font-feature-settings: "tnum";
    font-variant-numeric: tabular-nums;
}
.time-box {
    min-width: 72px;
    padding: 8px;
    font-weight: bold;
    font-size: 16px;
    background-color: #ffffff;
    border-radius: 6px;
    color: #f4a835;
    font-family: 'Courier New', Courier, monospace; /* خط مونويسب */
    box-shadow: none !important; /* إزالة الظلال */
    transition: none !important; /* إزالة الانتقالات */
    will-change: contents; /* تحسين الأداء */
    text-align: center;
    user-select: none; /* لمنع تحديد النص لتقليل فلاش */
}

</style>

@foreach($currentOrders as $currentOrder)
    @php
        $createdAt = \Carbon\Carbon::parse($currentOrder->created_at);
        $expiresAtTimestamp = $createdAt->copy()->addHours(48)->timestamp * 1000;
        $orderStatus = $currentOrder->status;
    @endphp

    <div class="col-12 mb-4">
        <div class="card-custom shadow rounded-4 overflow-hidden position-relative">
            <div class="row g-0">
                <!-- الصور -->
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

                <!-- معلومات الطلب -->
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


                    <!-- العداد (يظهر فقط إذا الحالة under_work) -->
                    @if($orderStatus == 'under_work')
                    <div id="timer{{$currentOrder->id}}" class="timer d-flex justify-content-between text-center rounded-3 p-2 mb-3"
                         data-date="{{ $expiresAtTimestamp }}" data-id="{{ $currentOrder->id }}" data-status="{{$currentOrder->status}}">
                        <div id="days{{$currentOrder->id}}" class="time-box">00</div> 
                        <div id="hours{{$currentOrder->id}}" class="time-box">00</div> 
                        <div id="minutes{{$currentOrder->id}}" class="time-box">00</div>
                        <div id="seconds{{$currentOrder->id}}" class="time-box">00</div>
                    </div>
                    @endif

                    <!-- بيانات الدعم -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<audio id="successSound" src="https://assets.mixkit.co/sfx/preview/mixkit-correct-answer-tone-2870.mp3" preload="auto"></audio>
<script>
window.onload = function () {
    console.log('Timer script started');
    try {
        function updateBox(id, value) {
            const el = document.getElementById(id);
            if (el && el.innerText !== value) {
                el.innerText = value;
            }
        }

        document.querySelectorAll('.timer').forEach(function (timer) {
            let endDateStr = timer.dataset.date;
            let orderId = timer.dataset.id;
            let status = timer.dataset.status;

            if (status === 'contract') {
                timer.querySelectorAll('.time-box').forEach(box => box.innerText = '00');
                return;
            }

            let hasExpired = false;

            let interval = setInterval(function () {
                let now = Date.now();
                let endDate = new Date(parseInt(endDateStr));

                if (isNaN(endDate.getTime())) {
                    clearInterval(interval);
                    console.error("⛔ تاريخ غير صالح:", endDateStr);
                    return;
                }

                let distance = endDate.getTime() - now;

                if (distance <= 0) {
                    clearInterval(interval);
                    if (hasExpired) return;
                    hasExpired = true;

                    ['days', 'hours', 'minutes', 'seconds'].forEach(unit => {
                        updateBox(unit + orderId, '00');
                    });

                    fetch(`/cancel-reservation/${orderId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(res => res.json())
                    .then(res => {
                        let sound = document.getElementById('successSound');
                        if (sound) sound.play();

                        if (res.status === 'skipped') return;

                        Swal.fire({
                            icon: res.status === 'error' ? 'error' : 'warning',
                            title: res.status === 'error' ? 'الطلب غير موجود ❌' : '⏰ انتهت مهلة الحجز!',
                            html: res.status === 'error'
                                ? `<div style="font-size: 16px; line-height: 1.6; color: #555; direction: rtl;">
                                        للأسف لم نتمكن من العثور على هذا الطلب.<br>
                                        قد يكون تم إلغاؤه مسبقًا أو هناك خطأ ما.
                                   </div>`
                                : `<div style="font-size: 17px; text-align: center; direction: rtl;">
                                        <p style="margin-bottom: 10px; font-weight: bold; color: #333;">
                                            لم يتم التعاقد خلال المهلة المحددة.
                                        </p>
                                        <p style="font-size: 15px; color: #555;">
                                            تم <span style="color:#e74c3c; font-weight:bold;">إلغاء الحجز</span> تلقائيًا وإتاحة العاملة لباقي العملاء.
                                        </p>
                                   </div>`,
                            confirmButtonText: 'فهمت ✅',
                            background: '#fffdf7',
                            customClass: {
                                confirmButton: 'btn btn-orange fw-bold px-4 py-2 rounded-pill shadow'
                            },
                            buttonsStyling: false
                        });

                        timer.closest('.col-12')?.classList.add('d-none');
                    });

                } else {
                    const days = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
                    const hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                    const minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                    const seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');

                    updateBox('days' + orderId, days);
                    updateBox('hours' + orderId, hours);
                    updateBox('minutes' + orderId, minutes);
                    updateBox('seconds' + orderId, seconds);
                }
            }, 1000);
        });
    } catch (e) {
        console.error("⛔ فشل في تنفيذ سكربت العداد:", e);
    }
};
</script>

