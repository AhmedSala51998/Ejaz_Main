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
                <audio id="chat-sound" src="https://cdn.pixabay.com/audio/2022/03/15/audio_b91f44f395.mp3" preload="auto"></audio>
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
                    <audio id="chat-sound" src="https://cdn.pixabay.com/audio/2022/03/15/audio_b91f44f395.mp3" preload="auto"></audio>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script type="module">
import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js';
import Globe from 'https://cdn.jsdelivr.net/npm/globe.gl@2.33.1/+esm';
import * as topojson from 'https://cdn.jsdelivr.net/npm/topojson-client@3/+esm';
import * as d3 from 'https://cdn.jsdelivr.net/npm/d3-geo@3/+esm';

const emphasizedCountries = {
  231: { iso: 'et', name: 'اثيوبيا', revealed: false },
  800: { iso: 'ug', name: 'اوغندا', revealed: false },
  50:  { iso: 'bd', name: 'بنجلاديش', revealed: false },
  608: { iso: 'ph', name: 'الفلبين', revealed: false },
  404: { iso: 'ke', name: 'كينيا', revealed: false },
  356: { iso: 'in', name: 'الهند', revealed: false },
  144: { iso: 'lk', name: 'سريلانكا', revealed: false },
  108: { iso: 'bi', name: 'بروندي', revealed: false },
  682: { iso: 'sa', name: 'المملكة العربية السعودية', revealed: true }
};

const saudiInfo = emphasizedCountries[682];
let countriesGeoJson = [];
let globeBackgroundMaterial = null;
let backgroundSphere = null;
let currentCountryId = null;
let countryLabels = {};
let countryDisplayIndex = 0;

const tooltip = document.getElementById('tooltip');
const chat = document.getElementById('chat-message');
const sound = document.getElementById('chat-sound');
const displayDelay = 700;

const globe = Globe()(document.getElementById('globe-container'))
  .globeImageUrl(null)
  .backgroundColor('white')
  .showAtmosphere(false)
  .globeMaterial(new THREE.MeshBasicMaterial({ color: 0xD89835, transparent: true, opacity: 0.3 }))
  .pointAltitude(0.005)
  .pointRadius(0.08)
  .pointColor(() => '#3A60A5')
  .pointsData([]);

globe.controls().autoRotate = false;
globe.controls().autoRotateSpeed = 0.1;
globe.controls().enableZoom = false;

const dots = [];
for (let lat = -85; lat <= 85; lat += 2.5) {
  for (let lng = -180; lng <= 180; lng += 2.5) {
    dots.push({ lat, lng });
  }
}
globe.pointsData(dots);

fetch('https://cdn.jsdelivr.net/npm/world-atlas@2/countries-110m.json')
  .then(res => res.json())
  .then(worldData => {
    countriesGeoJson = topojson.feature(worldData, worldData.objects.countries).features;
    const loader = new THREE.TextureLoader();

    globe
      .polygonsData(countriesGeoJson)
      .polygonCapMaterial(f => {
        const info = emphasizedCountries[parseInt(f.id)];
        if (info && info.revealed) {
          const texture = loader.load(`https://flagcdn.com/w320/${info.iso}.png`);
          return new THREE.MeshBasicMaterial({ map: texture, transparent: true, opacity: 0.95, side: THREE.DoubleSide });
        }
        return new THREE.MeshBasicMaterial({ color: 'white', transparent: true, opacity: 0.01 });
      })
      .polygonStrokeColor(f => emphasizedCountries[parseInt(f.id)]?.revealed ? '#0a4aad' : '#999')
      .polygonAltitude(f => emphasizedCountries[parseInt(f.id)]?.revealed ? 0.03 : 0.001)
      .onPolygonHover(f => {
        if (f) {
          const id = parseInt(f.id);
          const info = emphasizedCountries[id];
          tooltip.style.display = info && info.revealed ? 'block' : 'none';
          tooltip.innerText = info?.price ? `${info.name} - ${info.price} ريال` : info?.name || '';
        } else tooltip.style.display = 'none';
      })
      .onPolygonClick(f => {
        if (!f) return;
        const id = parseInt(f.id);
        const info = emphasizedCountries[id];
        if (!info?.revealed) return;

        if (currentCountryId === id) {
          if (backgroundSphere) globe.scene().remove(backgroundSphere);
          backgroundSphere = null;
          currentCountryId = null;
          return;
        }

        drawFlagSphere(info.iso, info.name);
        currentCountryId = id;

        if (id !== saudiInfo.id) {
          const loaderEl = document.getElementById('globe-loader');
          loaderEl.style.display = 'flex';
          fetch(`/get-nationality-id?name=${encodeURIComponent(info.name)}`)
            .then(res => res.json())
            .then(data => {
              loaderEl.style.display = 'none';
              if (data?.id) window.location.href = `/all-workers/${data.id}`;
              else alert("لم يتم العثور على الدولة");
            })
            .catch(() => { loaderEl.style.display = 'none'; alert("خطأ أثناء جلب الدولة"); });
        }
      });

    revealNextCountry();
  });

function drawFlagSphere(iso, text) {
  const canvas = document.createElement('canvas');
  canvas.width = 1024; canvas.height = 512;
  const ctx = canvas.getContext('2d');

  const img = new Image();
  img.crossOrigin = 'anonymous';
  img.src = `https://flagcdn.com/w320/${iso}.png`;
  img.onload = () => {
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    ctx.fillStyle = 'rgba(0,0,0,0.7)';
    ctx.fillRect(0, canvas.height - 80, canvas.width, 80);
    ctx.fillStyle = 'white';
    ctx.font = 'bold 30px sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText(text, canvas.width / 2, canvas.height - 30);

    const tex = new THREE.CanvasTexture(canvas);
    globeBackgroundMaterial = new THREE.MeshBasicMaterial({ map: tex, transparent: true, opacity: 0.8 });

    if (backgroundSphere) globe.scene().remove(backgroundSphere);
    backgroundSphere = new THREE.Mesh(new THREE.SphereGeometry(globe.getGlobeRadius() * 1.01, 75, 75), globeBackgroundMaterial);
    globe.scene().add(backgroundSphere);
  };
}

function revealNextCountry() {
  const ids = Object.keys(emphasizedCountries).map(Number).filter(id => id !== saudiInfo.id);

  if (countryDisplayIndex < ids.length) {
    const cid = ids[countryDisplayIndex];
    emphasizedCountries[cid].revealed = true;
    globe.polygonsData(countriesGeoJson);
    countryDisplayIndex++;
    setTimeout(revealNextCountry, displayDelay);
  }
}
</script>
