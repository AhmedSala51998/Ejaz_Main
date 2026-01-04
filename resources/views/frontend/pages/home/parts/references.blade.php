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

<style>
  .references {
    background: linear-gradient(145deg, #fffdfa, #fff9f3 50%, #f5f1ec);
    box-shadow: inset 0 10px 60px rgba(255 168 0 / 0.15);
    padding-bottom: 80px;
  }

  .sectionTitle h2 {
    font-weight: 900;
    font-size: 3rem;
    color: #222;
    letter-spacing: 1.2px;
    margin-bottom: 8px;
    text-shadow: 0 2px 8px rgba(255 153 0 / 0.25);
  }

  .sectionTitle p {
    font-size: 1.3rem;
    color: #555;
    max-width: 600px;
    margin: 0 auto;
    font-weight: 600;
    letter-spacing: 0.3px;
  }

  .referenceLogo {
    position: relative;
    height: 240px;
    background: rgba(255 255 255 / 0.12);
    border-radius: 30px;
    border: 2px solid rgba(255 168 0 / 0.4);
    backdrop-filter: blur(22px);
    -webkit-backdrop-filter: blur(22px);
    box-shadow:
      0 15px 30px rgba(255 168 0 / 0.22),
      inset 0 0 40px rgba(255 255 255 / 0.35);
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55), box-shadow 0.6s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .referenceLogo .shine {
    position: absolute;
    top: -70%;
    left: -70%;
    width: 200%;
    height: 200%;
    background: linear-gradient(120deg, rgba(255 255 255 / 0.35) 0%, transparent 60%);
    transform: rotate(25deg);
    pointer-events: none;
    animation: shineMove 3s linear infinite;
    opacity: 0.7;
  }

  @keyframes shineMove {
    0% {
      transform: translateX(-100%) rotate(25deg);
    }
    100% {
      transform: translateX(100%) rotate(25deg);
    }
  }

  .referenceLogo:hover {
    transform: perspective(600px) translateY(-20px) scale(1.12) rotateX(8deg) rotateZ(-3deg);
    box-shadow:
      0 0 40px rgba(255 168 0 / 0.7),
      0 25px 60px rgba(255 168 0 / 0.45);
    border-color: rgba(255 168 0 / 0.9);
    background: rgba(255 255 255 / 0.25);
  }

  .referenceLogo img {
    max-height: 140px;
    max-width: 100%;
    object-fit: contain;
    filter: drop-shadow(0 0 3px rgba(255 168 0, 0.5));
    transition: transform 0.6s ease, filter 0.6s ease;
    position: relative;
    z-index: 3;
  }

  .referenceLogo:hover img {
    transform: scale(1.18);
    filter: drop-shadow(0 0 12px rgba(255 168 0, 0.85));
  }

  .swiper-pagination-bullet {
    background: #ffb700;
    width: 14px;
    height: 14px;
    margin: 0 8px !important;
    border-radius: 50%;
    opacity: 0.8;
    box-shadow: 0 0 10px rgba(255 183 0, 0.4);
    transition: all 0.35s ease;
  }

  .swiper-pagination-bullet-active {
    background: #cc8b00;
    width: 18px;
    height: 18px;
    opacity: 1;
    box-shadow: 0 0 20px rgba(204 139 0, 0.9);
    transform-origin: center;
    animation: pulse 1.6s infinite;
  }

  @keyframes pulse {
    0%, 100% {
      transform: scale(1);
      opacity: 1;
    }
    50% {
      transform: scale(1.2);
      opacity: 0.7;
    }
  }

  /* Responsive */
  @media (max-width: 992px) {
    .referenceLogo {
      height: 200px;
      padding: 20px 25px;
    }
    .referenceLogo img {
      max-height: 110px;
    }
  }
  @media (max-width: 576px) {
    .sectionTitle h2 {
      font-size: 2.3rem;
    }
    .sectionTitle p {
      font-size: 1.1rem;
    }
  }
  /* Section Titles - Enhanced */
.section-title {
    font-size: 3.2rem; /* Slightly larger */
    color: #2c3e50; /* Darker, more professional grey */
    font-weight: 800; /* Bolder */
    position: relative;
    padding-bottom: 15px; /* Space for underline effect */
}

.section-title::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 80px; /* Short underline */
    height: 4px; /* Thicker underline */
    background: linear-gradient(to right, #D89835, #F2B544); /* Gradient underline */
    border-radius: 2px;
}

.section-subtitle {
    color: #7f8c8d; /* Muted grey for subtitle */
    font-size: 1.2rem; /* Slightly larger */
    margin-top: 10px;
}
</style>

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
