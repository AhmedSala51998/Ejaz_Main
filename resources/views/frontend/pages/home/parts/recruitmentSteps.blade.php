<section class="steps" id="steps">
    <div class="container">
        <!-- Section Title -->
        <div class="SectionTitle text-md-start">
            <h1 class="title" data-aos="fade-up">{{__('frontend.Recruitment steps')}}</h1>
            <h6 class="hint" data-aos="fade-up">{{$settings->recruitment_step_desc??"تعرف علي الخطوات التي نعمل بها ..."}}</h6>
        </div>
        <!-- steps -->
        <div class="allSteps">
            <div class="step" data-aos="zoom-out-left">
                <div class="icon">
                    <i class="fa-thin fa-wallet"></i>
                </div>
                <p>
                {{$settings->recruitment_step1_desc??" سداد رسوم تخليص اجراءات العمالة المنزلية الخاصة بك عبر الخدمات الالكترونية
                    في البنك او عن طريق القنوات التالية"}}
                <div class="images">
                    <img src="{{asset('frontend')}}/img/mc.webp">
                    <img src="{{asset('frontend')}}/img/mada.webp">
                </div>
                </p>
            </div>
            <div class="step" data-aos="zoom-out-left">
                <div class="icon">
                    <i class="fa-thin fa-passport"></i>
                </div>
                <p>{{$settings->recruitment_step2_desc??" طلب تخليص اجراءات  العمالة المنزلية الخاصة بك في برنامج مساند"}}</p>
            </div>
            <div class="step" data-aos="zoom-out-left">
                <div class="icon">
                    <i class="fa-thin fa-id-card"></i>
                </div>
                <p>{{$settings->recruitment_step3_desc??"اختيار السيرة الذاتية للعمالة المنزلية عبر البحث في برنامج مساند
                    عن طريق المهنة/ الجنسية "}}</p>

            </div>
            <div class="step" data-aos="zoom-out-left">
                <div class="icon">
                    <i class="fa-thin fa-wallet"></i>
                </div>
                <p>{{$settings->recruitment_step4_desc??"دفع مبلغ اختياري وتوثيق طلب استقدام العمالة المنزلية المحددة بعد
                    اختيار السيرة الذاتية "}}</p>
            </div>
            <div class="step" data-aos="zoom-out-left">
                <div class="icon">
                    <i class="fa-thin fa-plane"></i>
                </div>
                <p>{{$settings->recruitment_step5_desc??" وصول العمالة المنزلية من المطار المحلي الى المكتب"}}</p>
            </div>
        </div>
    </div>
</section>
