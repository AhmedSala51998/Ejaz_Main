<section class="references py-6">
  <div class="container">
    <div class="sectionTitle text-center mb-5" data-aos="fade-up">
      <h2 class="section-title">الجهات المرجعية</h2>
      <p class="section-subtitle">نفخر بالتعاون مع أبرز الجهات الحكومية والرسمية</p>
    </div>

    <div class="swiper referencesSlider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="referenceLogo glass-card">
            <img src="{{asset('frontend')}}/img/Ministry-of-Foreign-Affairs-01.svg" alt="وزارة الخارجية" loading="lazy" />
            <div class="shine"></div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="referenceLogo glass-card">
            <img src="{{asset('frontend')}}/img/Ministry-of-Interior-01.svg" alt="وزارة الداخلية" loading="lazy" />
            <div class="shine"></div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="referenceLogo glass-card">
            <img src="{{asset('frontend')}}/img/Ministry-of-Labor-and-Social-Development.svg" alt="وزارة الموارد البشرية" loading="lazy" />
            <div class="shine"></div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="referenceLogo glass-card">
            <img src="{{asset('frontend')}}/img/musand.svg" alt="مساند" loading="lazy" />
            <div class="shine"></div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination mt-5"></div>
    </div>
  </div>
</section>
<link rel="stylesheet" href="{{asset('frontend/css/our_references_home_style.css')}}" />
<script>
  var swiper = new Swiper(".referencesSlider", {
    loop: true,
    spaceBetween: 45,
    slidesPerView: 3,
    speed: 900,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      576: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
</script>
