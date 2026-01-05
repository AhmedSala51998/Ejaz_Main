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

/* ===============================
   RAMADAN DECORATIONS – PRO MAX
================================ */

.ramadan-group {
    position: absolute;
    top: 12%;
    width: 170px;
    z-index: 10;
    pointer-events: none;
    transform-style: preserve-3d;
}

/* Position */
.ramadan-group.left  { left: 2.5%; }
.ramadan-group.right { right: 2.5%; }

/* ================= Moon ================= */
.ramadan-group .moon {
    width: 85px;
    display: block;
    margin: 0 auto 14px;
    opacity: .95;
    animation: moonFloat 7s ease-in-out infinite;
    filter: drop-shadow(0 6px 18px rgba(255,255,255,.25));
}

/* ================= Lantern ================= */
.ramadan-group .lantern {
    width: 100%;
    display: block;
    transform-origin: top center;
    animation:
        lanternSwing 4.5s cubic-bezier(.4,0,.2,1) infinite,
        lanternGlow 2.2s ease-in-out infinite alternate;
    will-change: transform, filter;
    filter: drop-shadow(0 18px 30px rgba(216,152,53,.35));
}

/* ================= Animations ================= */

/* Natural Lantern Swing */
@keyframes lanternSwing {
    0%   { transform: rotate(0deg) translateY(0); }
    20%  { transform: rotate(1.8deg) translateY(5px); }
    40%  { transform: rotate(-1.4deg) translateY(9px); }
    60%  { transform: rotate(2.2deg) translateY(6px); }
    80%  { transform: rotate(-1.6deg) translateY(8px); }
    100% { transform: rotate(0deg) translateY(0); }
}

/* Moon Floating */
@keyframes moonFloat {
    0%   { transform: translateY(0); }
    50%  { transform: translateY(12px); }
    100% { transform: translateY(0); }
}

/* Lantern Glow */
@keyframes lanternGlow {
    0% {
        filter:
            drop-shadow(0 15px 25px rgba(216,152,53,.25))
            brightness(1);
    }
    100% {
        filter:
            drop-shadow(0 18px 40px rgba(255,200,0,.6))
            brightness(1.15);
    }
}

/* ================= Parallax Depth ================= */
.ramadan-group.left {
    animation: sideFloatLeft 12s ease-in-out infinite;
}
.ramadan-group.right {
    animation: sideFloatRight 12s ease-in-out infinite;
}

@keyframes sideFloatLeft {
    0%   { transform: translateY(0) translateX(0); }
    50%  { transform: translateY(18px) translateX(6px); }
    100% { transform: translateY(0) translateX(0); }
}

@keyframes sideFloatRight {
    0%   { transform: translateY(0) translateX(0); }
    50%  { transform: translateY(18px) translateX(-6px); }
    100% { transform: translateY(0) translateX(0); }
}

/* ================= Mobile ================= */
@media (max-width: 992px) {
    .ramadan-group {
        width: 110px;
        top: 6%;
        opacity: .85;
    }
    .ramadan-group .moon { width: 55px; }
}

/* Hide globe & bubble until loader finishes */
#globe-container,
#saudi-bubble {
  opacity: 0;
  visibility: hidden;
  transition: opacity .6s ease, visibility .6s ease;
}

/* Show after loader */
.globe-visible {
  opacity: 1;
  visibility: visible;
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
    <!-- Ramadan Decorations -->
    <!--<div class="ramadan-group left">
        <img src="{{ asset('frontend/img/ramadan/ramadan1.png') }}" class="moon">
        <img src="{{ asset('frontend/img/ramadan/ramadan2.png') }}" class="lantern">
    </div>

    <div class="ramadan-group right">
        <img src="{{ asset('frontend/img/ramadan/ramadan3.png') }}" class="moon">
        <img src="{{ asset('frontend/img/ramadan/ramadan1.png') }}" class="lantern">
    </div>-->
    @php
    $decorations = [
        ['moon' => 'ramadan1.png', 'lantern' => 'ramadan2.png'],
        ['moon' => 'ramadan3.png', 'lantern' => 'ramadan1.png'],
    ];
    @endphp

    @foreach($decorations as $index => $item)
    <div class="ramadan-group {{ $index % 2 == 0 ? 'left' : 'right' }}">
        <img src="{{ asset('frontend/img/ramadan/'.$item['moon']) }}" class="moon" alt="Ramadan Moon">
        <img src="{{ asset('frontend/img/ramadan/'.$item['lantern']) }}" class="lantern" alt="Ramadan Lantern">
    </div>
    @endforeach
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
<script src="https://unpkg.com/three@0.152.2/build/three.min.js"></script>
<script src="https://unpkg.com/globe.gl"></script>
<script src="https://unpkg.com/topojson@3"></script>
<script src="https://unpkg.com/d3-geo@3"></script>
<script>
function getCentroidFromPolygon(coords) {
  let x = 0, y = 0, len = coords.length;
  for (let i = 0; i < len; i++) {
    x += coords[i][0];
    y += coords[i][1];
  }
  return [x / len, y / len];
}

function getCentroidFromMultiPolygon(polygons) {
  let totalX = 0, totalY = 0, totalPoints = 0;
  for (const polygon of polygons) {
    const [x, y] = getCentroidFromPolygon(polygon[0]);
    totalX += x;
    totalY += y;
    totalPoints++;
  }
  return [totalX / totalPoints, totalY / totalPoints];
}

const dbCountries = @json(
    $countries->keyBy('country_name')
);

const emphasizedCountries = {
  231: { id: 231, iso: 'et', name: 'اثيوبيا', price: null, revealed: false },
  800: { id: 800, iso: 'ug', name: 'اوغندا', price: null, revealed: false },
  50:  { id: 50, iso: 'bd', name: 'بنجلاديش', price: null, revealed: false },
  608: { id: 608, iso: 'ph', name: 'الفلبين', price: null, revealed: false },
  404: { id: 404, iso: 'ke', name: 'كينيا', price: null, revealed: false },
  356: { id: 356, iso: 'in', name: 'الهند', price: null, revealed: false },
  144: { id: 144, iso: 'lk', name: 'سريلانكا', price: null, revealed: false },
  108: { id: 108, iso: 'bi', name: 'بروندي', price: null, revealed: false },
  682: { id: 682, iso: 'sa', name: 'المملكة العربية السعودية', price: null, revealed: true }
};

const normalize = str => str.trim();

Object.values(emphasizedCountries).forEach(country => {
    const key = normalize(country.name);
    if (dbCountries[key]) {
        country.price = dbCountries[key].price;
    }
});

const saudiInfo = emphasizedCountries[682];
let countryLabels = {};
let backgroundSphere = null;
let globeBackgroundMaterial = null;
let currentCountryId = null;
let firstLoadDone = false;
let countriesGeoJson = [];
const tooltip = document.getElementById('tooltip');
const chat = document.getElementById('chat-message');
const sound = document.getElementById('chat-sound');
let countryDisplayIndex = 0;
const displayDelay = 700;

const globe = Globe()(document.getElementById('globe-container'))
  .globeImageUrl(null)
  .backgroundColor('white')
  .showAtmosphere(false)
  .globeMaterial(new THREE.MeshBasicMaterial({ color: 0xf4a835, transparent: true, opacity: 0.08 }))
  .pointAltitude(0.005)
  .pointRadius(0.08)
  .pointColor(() => '#3A60A5')
  .pointsData([]);

globe.controls().autoRotate = false;
globe.controls().autoRotateSpeed = 0.1;
globe.controls().enableZoom = false;


document.addEventListener('mousemove', e => {
  tooltip.style.left = `${e.pageX + 10}px`;
  tooltip.style.top = `${e.pageY + 10}px`;
});

document.addEventListener('click', e => {
  if (!e.target.closest('canvas')) {
    if (backgroundSphere) {
      globe.scene().remove(backgroundSphere);
      backgroundSphere = null;
      currentCountryId = null;
    }
  }
});

const dots = [];
for (let lat = -85; lat <= 85; lat += 2.5) {
  for (let lng = -180; lng <= 180; lng += 2.5) {
    dots.push({ lat, lng });
  }
}
globe.pointsData(dots);

fetch('https://unpkg.com/world-atlas/countries-110m.json')
  .then(res => res.json())
  .then(worldData => {
    countriesGeoJson = window.topojson.feature(worldData, worldData.objects.countries).features;
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
          if (info && info.revealed) {
            tooltip.innerText = info.price ? `${info.name} - سعر الاستقدام: ${info.price} ريال` : info.name;
            tooltip.style.display = 'block';
          } else tooltip.style.display = 'none';
        } else tooltip.style.display = 'none';
      })
      .onPolygonClick(f => {
        const id = parseInt(f.id);
        const info = emphasizedCountries[id];
        if (!info || !info.revealed) return;

        if (currentCountryId === id) {
          if (backgroundSphere) globe.scene().remove(backgroundSphere);
          backgroundSphere = null;
          currentCountryId = null;
          return;
        }

        drawFlagSphere(info.iso, info.price ? `${info.name} - ${info.price} ريال` : info.name);
        currentCountryId = id;

        if (id !== saudiInfo.id) {
          const loader = document.getElementById('globe-loader');
          loader.style.display = 'flex';

          fetch(`/get-nationality-id?name=${encodeURIComponent(info.name)}`)
            .then(res => res.json())
            .then(data => {
              if (data?.id) {
                setTimeout(() => {
                  window.location.href = `/all-workers/${data.id}`;
                }, 800);
              } else {
                loader.style.display = 'none';
                alert("لم يتم العثور على الدولة");
              }
            })
            .catch(() => {
              loader.style.display = 'none';
              alert("خطأ أثناء جلب الدولة");
            });
        }

      });

      function revealNextCountry() {
        const ids = Object.keys(emphasizedCountries).map(Number).filter(id => id !== saudiInfo.id);

        if (countryDisplayIndex < ids.length) {
          const cid = ids[countryDisplayIndex];
          emphasizedCountries[cid].revealed = true;
          globe.polygonsData([...countriesGeoJson]);

          const geo = countriesGeoJson.find(c => parseInt(c.id) === cid);
          const info = emphasizedCountries[cid];

          if (geo && info) {
            let lat, lng;
            try {
              const [lng_, lat_] = d3.geoCentroid(geo);
              lng = lng_;
              lat = lat_;
            } catch (e) {
              if (geo.bbox) {
                lat = (geo.bbox[1] + geo.bbox[3]) / 2;
                lng = (geo.bbox[0] + geo.bbox[2]) / 2;
              } else {
                const centroid = geo.geometry.coordinates.length === 1
                  ? getCentroidFromPolygon(geo.geometry.coordinates[0])
                  : getCentroidFromMultiPolygon(geo.geometry.coordinates);
                lng = centroid[0];
                lat = centroid[1];
              }
            }

            const labelText = info.price ? `${info.name} - ${info.price} ريال` : info.name;

            globe.pointOfView({ lat, lng, altitude: 1.7 }, 1600);

            setTimeout(() => {
              if (!countryLabels[cid]) {
                const label = createCountryLabel(labelText, lat, lng);
                globe.scene().add(label);
                countryLabels[cid] = label;
              } else {
                globe.scene().add(countryLabels[cid]);
              }

              countryDisplayIndex++;
              setTimeout(revealNextCountry, displayDelay);
            }, 1700);

          } else {
            countryDisplayIndex++;
            setTimeout(revealNextCountry, displayDelay);
          }
        }
      }



    if (saudiInfo && !firstLoadDone) {
      firstLoadDone = true;
      setTimeout(() => {
        globe.pointOfView({ lat: 23.8859, lng: 45.0792, altitude: 1.7 }, 2000);
        setTimeout(() => {
          drawFlagSphere('sa', 'مرحباً بكم في المملكة العربية السعودية - شركة إيجاز للاستقدام ترحب بعودتكم من جديد');
          showSaudiMessage();
          setTimeout(() => {
            if (backgroundSphere) globe.scene().remove(backgroundSphere);
            globe.controls().autoRotate = false;
            const centerLatLng = { lat: 7.5, lng: 82 };
            globe.pointOfView(centerLatLng, 2000);
            setTimeout(() => {
              globe.controls().autoRotate = true;
              globe.controls().autoRotateSpeed = 0.5;
              revealNextCountry();
            }, 2000);
          }, 3000);
        }, 2000);
      }, 1000);
    }

  });

function drawFlagSphere(iso, text) {
  const canvas = document.createElement('canvas');
  canvas.width = 1024;
  canvas.height = 512;
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
    globeBackgroundMaterial = new THREE.MeshBasicMaterial({ map: tex, transparent: true, opacity: 0.8, side: THREE.DoubleSide });

    if (backgroundSphere) globe.scene().remove(backgroundSphere);
    backgroundSphere = new THREE.Mesh(new THREE.SphereGeometry(globe.getGlobeRadius() * 1.01, 75, 75), globeBackgroundMaterial);
    globe.scene().add(backgroundSphere);
  };
}

if (!CanvasRenderingContext2D.prototype.roundRect) {
  CanvasRenderingContext2D.prototype.roundRect = function (x, y, w, h, r) {
    if (w < 2 * r) r = w / 2;
    if (h < 2 * r) r = h / 2;
    this.beginPath();
    this.moveTo(x + r, y);
    this.arcTo(x + w, y, x + w, y + h, r);
    this.arcTo(x + w, y + h, x, y + h, r);
    this.arcTo(x, y + h, x, y, r);
    this.arcTo(x, y, x + w, y, r);
    this.closePath();
    return this;
  }
}
function createCountryLabel(text, lat, lng) {
  const canvas = document.createElement('canvas');
  canvas.width = 3600;
  canvas.height = 1400;
  const ctx = canvas.getContext('2d');

  ctx.fillStyle = 'rgba(244, 168, 53, 0.95)';
  ctx.roundRect(0, 0, canvas.width, canvas.height, 100);
  ctx.fill();

  ctx.lineWidth = 15;
  ctx.strokeStyle = '#ffffff';
  ctx.roundRect(0, 0, canvas.width, canvas.height, 100);
  ctx.stroke();

  ctx.fillStyle = '#000000';
  ctx.font = 'bold 420px Cairo, sans-serif';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillText(text, canvas.width / 2, canvas.height / 2);

  const texture = new THREE.CanvasTexture(canvas);
  texture.needsUpdate = true;

  const material = new THREE.SpriteMaterial({ map: texture, transparent: true });
  const sprite = new THREE.Sprite(material);
  sprite.scale.set(18, 9, 1);

  const radius = globe.getGlobeRadius() * 1.13;

  const phi = (90 - lat) * Math.PI / 180;
  const theta = (lng+180) * Math.PI / 180;

  let x = radius * Math.sin(phi) * Math.cos(theta);
  let y = radius * Math.cos(phi);
  let z = radius * Math.sin(phi) * Math.sin(theta);


  const offsetDistance = 5;
  const direction = new THREE.Vector3(x, y, z).normalize();
  const pos = new THREE.Vector3(x, y, z).add(direction.multiplyScalar(offsetDistance));
  sprite.position.copy(pos);

  return sprite;
}


function showSaudiMessage() {
  const coords = globe.getScreenCoords(23.8859, 45.0792);
  if (!coords) return;

  const bubble = document.getElementById('saudi-bubble');
  const chat = document.getElementById('chat-message');

  const isMobile = window.innerWidth <= 768;

  if (isMobile) {
    bubble.style.left = `${coords.x - 40}px`;
    bubble.style.top = `${coords.y - 145}px`;

    chat.style.left = `${coords.x - 80}px`;
    chat.style.top = `${coords.y - 250}px`;
  } else {
    bubble.style.left = `${coords.x - 350}px`;
    bubble.style.top = `${coords.y - 30}px`;

    chat.style.left = `${coords.x - 370}px`;
    chat.style.top = `${coords.y - 130}px`;
  }

  bubble.style.display = 'block';
  bubble.style.animation = 'bubbleScalePulse 1.5s ease-in-out infinite';

  chat.style.display = 'block';
  chat.style.animation = 'fadeSlideIn 0.6s ease-out forwards';

  setTimeout(() => {
    chat.style.animation = 'fadeSlideOut 0.6s ease-in forwards';
    bubble.style.opacity = '0';
    setTimeout(() => {
      chat.style.display = 'none';
      bubble.style.display = 'none';
    }, 600);
  }, 3700);
}


</script>
