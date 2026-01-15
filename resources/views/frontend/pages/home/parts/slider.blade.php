<style>
  :root {
    --orange: #D89835;
    --orange-dark: #c8812a;
    --gray-dark: #5F5F5F;
    --text-main: #212121;
    --card-bg: rgba(255, 255, 255, 0.2);
    --border-color: rgba(255, 255, 255, 0.2);
}
    * {
       box-shadow: none !important;
    }
    #globe-container {
        display: flex;
        align-items: center;
        justify-content: center;
        left: 10%;
        z-index: 10000;
        background: transparent !important;
        box-shadow: none !important;
        filter: none !important;
        backdrop-filter: none !important;
        border: none !important;
    }

    #globe-container canvas {
        background: transparent !important;
        box-shadow: none !important;
        filter: none !important;
        border: none !important;
        outline: none !important;
        pointer-events: auto !important;
    }

    .bubble-animate {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
    }
    #tooltip {
        position: absolute;
        display: none;
        padding: 6px 12px;
        background: rgba(0, 0, 0, 0.75);
        color: white;
        border-radius: 6px;
        font-family: sans-serif;
        font-size: 14px;
        pointer-events: none;
        white-space: nowrap;
        z-index: 9999;
    }

    #saudi-bubble {
      position: absolute;
      width: 50px;
      height: 50px;
      background: rgba(244, 168, 53, 0.25);
      border-radius: 50%;
      backdrop-filter: blur(8px);
      box-shadow:
        0 0 15px rgba(244, 168, 53, 0.6),
        inset 0 0 30px rgba(244, 168, 53, 0.3);
      pointer-events: none;
      z-index: 10000;
      overflow: visible;
    }

    .ripple-ring {
      position: absolute;
      border: 2px solid rgba(244, 168, 53, 0.6);
      border-radius: 50%;
      width: 50px;
      height: 50px;
      top: 0;
      left: 0;
      animation: rippleExpand 2s ease-out forwards;
      pointer-events: none;
      opacity: 0.8;
    }

    @keyframes rippleExpand {
      0% {
        transform: scale(1);
        opacity: 0.8;
      }
      100% {
        transform: scale(2.5);
        opacity: 0;
      }
    }

    #saudi-bubble::after {
      content: '';
      position: absolute;
      top: -18px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      border-left: 15px solid transparent;
      border-right: 15px solid transparent;
      border-top: 18px solid rgba(244, 168, 53, 0.25);
      filter: drop-shadow(0 0 5px rgba(244, 168, 53, 0.4));
    }

    @keyframes bubbleScalePulse {
      0%, 100% {
        transform: scale(1);
        box-shadow:
          0 0 15px rgba(244, 168, 53, 0.6),
          inset 0 0 30px rgba(244, 168, 53, 0.3);
      }
      50% {
        transform: scale(1.1);
        box-shadow:
          0 0 25px rgba(244, 168, 53, 0.9),
          inset 0 0 45px rgba(244, 168, 53, 0.5);
      }
    }

    #chat-message {
      position: absolute;
      display: none;
      background: linear-gradient(135deg, #f4a835 0%, #e07b00 100%);
      color: white;
      padding: 14px 22px;
      border-radius: 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 14px;
      max-width: 280px;
      box-shadow: 0 6px 18px rgba(244, 168, 53, 0.6);
      z-index: 11000;
      line-height: 1.4;
      user-select: none;
      cursor: default;
      animation: fadeSlideIn 0.5s ease-out forwards;
      opacity: 0;
      pointer-events: none;
    }

    /*#chat-message::after {
      content: '';
      position: absolute;
      bottom: -14px;
      left: 40px;
      width: 0;
      height: 0;
      border-left: 14px solid transparent;
      border-right: 14px solid transparent;
      border-top: 14px solid #e07b00;
      filter: drop-shadow(0 3px 3px rgba(224, 123, 0, 0.3));
    }*/

    @keyframes fadeSlideIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeSlideOut {
      from {
        opacity: 1;
        transform: translateY(0);
      }
      to {
        opacity: 0;
        transform: translateY(20px);
      }
    }


    html, body {
        overflow-x: hidden !important;
    }


  .animatedLinkk {
      display: inline-block;
      background: var(--orange);
      color: white;
      font-weight: 600;
      padding: 10px 22px;
      border-radius: 50px;
      font-size: 0.95rem;
      text-decoration: none;
      transition: background 0.3s ease;
  }

  .animatedLinkk:hover {
      background: var(--orange);
  }

@media (max-width: 768px) {
  #globe-container {
    width: calc(100vw - 30px);
    max-width: 460px;
    aspect-ratio: 1 / 1;
    height: auto;
    position: relative;
    left: calc(50% + 7px);
    transform: translateX(-50%);
    margin-top: -5px;
    margin-bottom: 10px;
    border-radius: 50%;
    overflow: hidden;
    background: transparent !important;
    box-shadow: none !important;
  }

  #globe-container canvas {
    width: 100% !important;
    height: 100% !important;
    object-fit: contain;
    border-radius: 50%;
    display: block;
    margin: 0 auto;
    position: relative;
    left: 0 !important;
    transform: none !important;
  }

}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

canvas {
  image-rendering: auto;
}
#globe-container {
  aspect-ratio: 1 / 1;
  min-height: 520px;
}

</style>
@if (count($sliders)>0)
<section class="mainSection">


    {{--@if (count($sliders)>0)--}}
    <div id="globe-loader" style="
      position: fixed;
      top: 0; left: 0;
      width: 100vw; height: 100vh;
      background: rgba(255,255,255,0.8);
      z-index: 9999;
      display: none;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(6px);
    ">
      <div class="globe-spinner" style="
        width: 80px;
        height: 80px;
        border: 6px solid #f4a835;
        border-top: 6px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      "></div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-7 order-md-2" style="box-shadow: none !important;">
                <!-- orbit canvas -->
                <!--<div id="globe">
                    <canvas></canvas>
                </div>-->
                <div id="globe-container"></div>
                <div id="saudi-bubble"></div>
                <div id="tooltip"></div>
                <div id="chat-message">مرحباً بكم في المملكة العربية السعودية - شركة إيجاز للاستقدام ترحب بعودتكم من جديد</div>
            </div>
            <div class="col-md-5 order-md-1 p-1">
                <!-- main slider -->
                <div class="mainSlider swiperContainer">
                    <div class="swiper mainSliderContainer">
                        <div class="swiper-wrapper">
                            <!-- swiper-slide -->
                            @foreach($sliders as $slider)

                            <div class="swiper-slide mainSlideItem">
                                <div class="info">
                                    <h1 class="sliderTitle" style="color:#D89835"> {{$slider->title}} </h1>
                                    <p class="hint" style="color:#D89835">
                                        {{$slider->desc}}
                                    </p>

                                    <a href="{{route('all-workers')}}" class="animatedLinkk">
                                        طلب استقدام

                                        <i class="fa-regular fa-arrow-up-left ms-2"><span></span></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- bubble-animate -->
    <div class="bubble-animate">
        <span class="circle small square1"></span>
        <span class="circle small square2"></span>
        <span class="circle small square3"></span>
        <span class="circle small square4"></span>
        <span class="circle small square5"></span>
        <span class="circle medium square1"></span>
        <span class="circle medium square2"></span>
        <span class="circle medium square3"></span>
        <span class="circle medium square4"></span>
        <span class="circle medium square5"></span>
        <span class="circle large square1"></span>
        <span class="circle large square2"></span>
        <span class="circle large square3"></span>
        <span class="circle large square4"></span>
    </div>
</section>
@else


    <section class="mainSection">


        {{--@if (count($sliders)>0)--}}

        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7 order-md-2" style="box-shadow: none !important;">
                    <!-- orbit canvas -->
                    <!--<div id="globe">
                        <canvas></canvas>
                    </div>-->
                    <div id="globe-container"></div>
                    <div id="saudi-bubble"></div>
                    <div id="tooltip"></div>
                    <div id="chat-message">مرحباً بكم في المملكة العربية السعودية - شركة إيجاز للاستقدام ترحب بعودتكم من جديد</div>
                </div>
                <div class="col-md-5 order-md-1 p-1">
                    <!-- main slider -->
                    <div class="mainSlider swiperContainer">
                        <div class="swiper mainSliderContainer">
                            <div class="swiper-wrapper">
                                <!-- swiper-slide -->
                                <div class="swiper-slide mainSlideItem">
                                    <div class="info">
                                        <h1 class="sliderTitle" style="color:#D89835"> شركة ايجاز للاستقدام  </h1>
                                        <p class="hint" style="color:#D89835">
                                            اكبر شركة للاستقدام في المملكة العربية السعودية
                                        </p>
                                        <a href="{{route('all-workers')}}" class="animatedLinkk">
                                            طلب استقدام
                                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- swiper-slide -->
                                <div class="swiper-slide mainSlideItem">
                                    <div class="info">
                                        <h1 class="sliderTitle" style="color:#D89835">خدمات متميزة</h1>
                                        <p class="hint" style="color:#D89835">تعرف علي خدمتنا التي نقدمها لك</p>
                                        <a href="{{route('all-workers')}}" class="animatedLinkk">
                                            طلب استقدام
                                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- swiper-slide -->
                                <div class="swiper-slide mainSlideItem">
                                    <div class="info">
                                        <h1 class="sliderTitle" style="color:#D89835">سهولة الاستخدام</h1>
                                        <p class="hint" style="color:#D89835">
                                            ابدأ حجزك واتمم دفعك من خلال الموقع الالكتروني او التواصل معنا
                                            بوقت وجيز وبخطوات مختصرة
                                        </p>
                                        <a href="{{route('all-workers')}}" class="animatedLinkk">
                                            طلب استقدام
                                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- bubble-animate -->
        <div class="bubble-animate">
            <span class="circle small square1"></span>
            <span class="circle small square2"></span>
            <span class="circle small square3"></span>
            <span class="circle small square4"></span>
            <span class="circle small square5"></span>
            <span class="circle medium square1"></span>
            <span class="circle medium square2"></span>
            <span class="circle medium square3"></span>
            <span class="circle medium square4"></span>
            <span class="circle medium square5"></span>
            <span class="circle large square1"></span>
            <span class="circle large square2"></span>
            <span class="circle large square3"></span>
            <span class="circle large square4"></span>
        </div>
    </section>










@endif

@php
$countryMap = [
    231 => ['iso' => 'et', 'revealed' => false, 'name' => 'اثيوبيا'],
    800 => ['iso' => 'ug', 'revealed' => false, 'name' => 'اوغندا'],
    50  => ['iso' => 'bd', 'revealed' => false, 'name' => 'بنجلاديش'],
    608 => ['iso' => 'ph', 'revealed' => false, 'name' => 'الفلبين'],
    404 => ['iso' => 'ke', 'revealed' => false, 'name' => 'كينيا'],
    356 => ['iso' => 'in', 'revealed' => false, 'name' => 'الهند'],
    144 => ['iso' => 'lk', 'revealed' => false, 'name' => 'سريلانكا'],
    108 => ['iso' => 'bi', 'revealed' => false, 'name' => 'بروندي'],
    682 => ['iso' => 'sa', 'revealed' => true, 'name' => 'المملكة العربية السعودية'],
];
@endphp
<script defer src="https://unpkg.com/three@0.152.2/build/three.min.js"></script>
<script defer src="https://unpkg.com/globe.gl"></script>
<script defer src="https://unpkg.com/topojson@3"></script>
<script defer src="https://unpkg.com/d3-geo@3"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {

  /* ================= CONFIG ================= */
  const GLOBE_CONFIG = {
    saudiLat: 23.8859,
    saudiLng: 45.0792,
    altitude: 1.7,
    revealDelay: 700
  };

  /* ================= DATA ================= */
  const emphasizedCountries = {
    231: { iso:'et', name:'اثيوبيا', revealed:false, price:null },
    800: { iso:'ug', name:'اوغندا', revealed:false, price:null },
    50:  { iso:'bd', name:'بنجلاديش', revealed:false, price:null },
    608: { iso:'ph', name:'الفلبين', revealed:false, price:null },
    404: { iso:'ke', name:'كينيا', revealed:false, price:null },
    356: { iso:'in', name:'الهند', revealed:false, price:null },
    144: { iso:'lk', name:'سريلانكا', revealed:false, price:null },
    108: { iso:'bi', name:'بروندي', revealed:false, price:null },
    682: { iso:'sa', name:'المملكة العربية السعودية', revealed:true, price:null }
  };

  /* ================= DOM ================= */
  const dom = {
    container: document.getElementById('globe-container'),
    tooltip: document.getElementById('tooltip'),
    bubble: document.getElementById('saudi-bubble'),
    chat: document.getElementById('chat-message')
  };

  /* ================= INIT GLOBE ================= */
  const globe = Globe()(dom.container)
    .globeImageUrl(null)
    .backgroundColor('white')
    .showAtmosphere(false)
    .globeMaterial(
      new THREE.MeshBasicMaterial({ color: 0xf4a835, transparent:true, opacity:0.08 })
    );

  globe.controls().enableZoom = false;
  globe.controls().autoRotate = false;

  /* ================= POINTS ================= */
  const dots = [];
  for (let lat = -80; lat <= 80; lat += 5) {
    for (let lng = -180; lng <= 180; lng += 5) {
      dots.push({ lat, lng });
    }
  }
  globe.pointsData(dots);

  /* ================= TOOLTIP ================= */
  document.addEventListener("mousemove", e => {
    dom.tooltip.style.left = e.pageX + 10 + 'px';
    dom.tooltip.style.top  = e.pageY + 10 + 'px';
  });

  /* ================= LOAD COUNTRIES ================= */
  fetch('https://unpkg.com/world-atlas/countries-110m.json')
    .then(res => res.json())
    .then(worldData => {
      const countries = topojson.feature(
        worldData, worldData.objects.countries
      ).features;

      const loader = new THREE.TextureLoader();

      globe
        .polygonsData(countries)
        .polygonCapMaterial(f => {
          const info = emphasizedCountries[f.id];
          if (info?.revealed) {
            return new THREE.MeshBasicMaterial({
              map: loader.load(`https://flagcdn.com/w320/${info.iso}.png`),
              transparent:true,
              opacity:0.95
            });
          }
          return new THREE.MeshBasicMaterial({ transparent:true, opacity:0.01 });
        })
        .polygonAltitude(f => emphasizedCountries[f.id]?.revealed ? 0.03 : 0.001)
        .onPolygonHover(f => {
          if (!f) return dom.tooltip.style.display = 'none';
          const info = emphasizedCountries[f.id];
          if (!info?.revealed) return;
          dom.tooltip.textContent = info.price
            ? `${info.name} - ${info.price} ريال`
            : info.name;
          dom.tooltip.style.display = 'block';
        })
        .onPolygonClick(f => {
          const info = emphasizedCountries[f.id];
          if (!info?.revealed || f.id == 682) return;
          window.location.href = `/all-workers/${f.id}`;
        });

      focusOnSaudi();
    });

  /* ================= HELPERS ================= */
  function focusOnSaudi(){
    globe.pointOfView(
      { lat:GLOBE_CONFIG.saudiLat, lng:GLOBE_CONFIG.saudiLng, altitude:GLOBE_CONFIG.altitude },
      2000
    );
    showSaudiMessage();
    setTimeout(() => globe.controls().autoRotate = true, 2500);
  }

  function showSaudiMessage(){
    dom.bubble.style.display = 'block';
    dom.chat.style.display = 'block';
    setTimeout(() => {
      dom.bubble.style.display = 'none';
      dom.chat.style.display = 'none';
    }, 3500);
  }

});
</script>
