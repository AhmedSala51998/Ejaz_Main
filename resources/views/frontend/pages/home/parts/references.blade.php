<section class="references-pro">
  <div class="container">

    <div class="section-header text-center" data-aos="fade-up">
      <h2>الجهات المرجعية</h2>
      <p>نفخر بالتعاون مع أبرز الجهات الحكومية والرسمية</p>
    </div>

    <div class="swiper referencesSwiper">
      <div class="swiper-wrapper">

        <!-- Item -->
        <div class="swiper-slide">
          <div class="reference-card">
            <img src="{{asset('frontend')}}/img/Ministry-of-Foreign-Affairs-01.svg" alt="وزارة الخارجية">
          </div>
        </div>

        <div class="swiper-slide">
          <div class="reference-card">
            <img src="{{asset('frontend')}}/img/Ministry-of-Interior-01.svg" alt="وزارة الداخلية">
          </div>
        </div>

        <div class="swiper-slide">
          <div class="reference-card">
            <img src="{{asset('frontend')}}/img/Ministry-of-Labor-and-Social-Development.svg" alt="وزارة الموارد البشرية">
          </div>
        </div>

        <div class="swiper-slide">
          <div class="reference-card">
            <img src="{{asset('frontend')}}/img/musand.svg" alt="مساند">
          </div>
        </div>

      </div>

      <div class="swiper-pagination"></div>
    </div>

  </div>
</section>

<style>
/* =========================
   References – PRO TRUST
========================= */

.references-pro {
  background: linear-gradient(180deg, #fdfbf8, #f6f1ea);
  padding: 90px 0;
}

/* Section Header */
.section-header h2 {
  font-size: 3rem;
  font-weight: 800;
  color: #1f2933;
  margin-bottom: 12px;
  position: relative;
}

.section-header h2::after {
  content: '';
  width: 70px;
  height: 4px;
  background: linear-gradient(90deg, #c9a24d, #f3c969);
  display: block;
  margin: 14px auto 0;
  border-radius: 4px;
}

.section-header p {
  font-size: 1.15rem;
  color: #6b7280;
  max-width: 620px;
  margin: 18px auto 0;
}

/* Reference Card */
.reference-card {
  height: 220px;
  border-radius: 26px;
  background: rgba(255, 255, 255, 0.75);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  border: 1px solid rgba(203, 164, 77, 0.35);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all .45s ease;
  box-shadow:
    0 20px 40px rgba(0,0,0,.08);
  position: relative;
  overflow: hidden;
}

/* Soft Glow Layer */
.reference-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at top, rgba(243,201,105,.25), transparent 70%);
  opacity: 0;
  transition: opacity .4s ease;
}

/* Hover Effect */
.reference-card:hover {
  transform: translateY(-12px);
  box-shadow:
    0 30px 70px rgba(201,162,77,.35);
}

.reference-card:hover::before {
  opacity: 1;
}

.reference-card img {
  max-height: 130px;
  max-width: 85%;
  object-fit: contain;
  transition: transform .45s ease, filter .45s ease;
  filter: grayscale(100%) opacity(.85);
  z-index: 2;
}

.reference-card:hover img {
  transform: scale(1.08);
  filter: grayscale(0%) opacity(1);
}

/* Swiper Pagination */
.references-pro .swiper-pagination {
  margin-top: 40px;
}

.references-pro .swiper-pagination-bullet {
  width: 10px;
  height: 10px;
  background: #d1a94a;
  opacity: .5;
  transition: all .3s ease;
}

.references-pro .swiper-pagination-bullet-active {
  width: 26px;
  border-radius: 8px;
  opacity: 1;
  background: linear-gradient(90deg,#c9a24d,#f3c969);
}

/* Responsive */
@media (max-width: 992px) {
  .reference-card {
    height: 190px;
  }
}

@media (max-width: 576px) {
  .section-header h2 {
    font-size: 2.3rem;
  }
}
</style>

<script>
new Swiper('.referencesSwiper', {
  loop: true,
  speed: 800,
  spaceBetween: 40,
  grabCursor: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    576: { slidesPerView: 2 },
    992: { slidesPerView: 3 },
  }
});
</script>
