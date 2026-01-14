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

<script type="module">
import * as THREE from 'https://unpkg.com/three@0.152.2/build/three.module.js';
import Globe from 'https://unpkg.com/globe.gl/dist/globe.gl.js';
import { feature } from 'https://unpkg.com/topojson@3/dist/topojson.min.js';
import { geoCentroid } from 'https://unpkg.com/d3-geo@3/dist/d3-geo.min.js';

// بيانات الدول
const dbCountries = @json($countries->keyBy('country_name'));
const emphasizedCountries = @json($countryMap);

// ضبط الأسعار
Object.values(emphasizedCountries).forEach(c => {
  const key = c.name.trim();
  if (dbCountries[key]) c.price = dbCountries[key].price;
});

// Globe Setup
const globe = Globe()(document.getElementById('globe-container'))
  .globeImageUrl(null)
  .backgroundColor('white')
  .showAtmosphere(false)
  .globeMaterial(new THREE.MeshBasicMaterial({ color: 0xf4a835, transparent: true, opacity: 0.08 }))
  .pointAltitude(0.005)
  .pointRadius(0.08)
  .pointsData([]);

globe.controls().autoRotate = false;
globe.controls().autoRotateSpeed = 0.1;
globe.controls().enableZoom = false;

// Tooltip
const tooltip = document.getElementById('tooltip');
document.addEventListener('mousemove', e => {
  tooltip.style.left = `${e.pageX + 10}px`;
  tooltip.style.top = `${e.pageY + 10}px`;
});

const dots = [];
for (let lat = -85; lat <= 85; lat += 5) {
  for (let lng = -180; lng <= 180; lng += 5) {
    dots.push({ lat, lng });
  }
}
globe.pointsData(dots);

// Variables
let countriesGeoJson = [];
let countryDisplayIndex = 0;
const displayDelay = 700;
let countryLabels = {};
let backgroundSphere = null;
let globeBackgroundMaterial = null;
let currentCountryId = null;
const saudiInfo = emphasizedCountries[682];
let firstLoadDone = false;

fetch('https://unpkg.com/world-atlas/countries-110m.json')
  .then(res => res.json())
  .then(worldData => {
    countriesGeoJson = feature(worldData, worldData.objects.countries).features;
    const loader = new THREE.TextureLoader();

    globe
      .polygonsData(countriesGeoJson)
      .polygonCapMaterial(f => {
        const info = emphasizedCountries[f.id];
        if (info && info.revealed) {
          if (!info.texture) {
            info.texture = loader.load(`https://flagcdn.com/w160/${info.iso}.png`);
          }
          return new THREE.MeshBasicMaterial({ map: info.texture, transparent: true, opacity: 0.95, side: THREE.DoubleSide });
        }
        return new THREE.MeshBasicMaterial({ color: 'white', transparent: true, opacity: 0.01 });
      })
      .polygonStrokeColor(f => emphasizedCountries[f.id]?.revealed ? '#0a4aad' : '#999')
      .polygonAltitude(f => emphasizedCountries[f.id]?.revealed ? 0.03 : 0.001)
      .onPolygonHover(f => {
        if (f) {
          const info = emphasizedCountries[f.id];
          tooltip.innerText = info && info.revealed ? (info.price ? `${info.name} - ${info.price} ريال` : info.name) : '';
          tooltip.style.display = info && info.revealed ? 'block' : 'none';
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
                setTimeout(() => window.location.href = `/all-workers/${data.id}`, 800);
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
  });

function revealNextCountry() {
  const ids = Object.keys(emphasizedCountries).map(Number).filter(id => id !== saudiInfo.id);

  if (countryDisplayIndex >= ids.length) return;

  const cid = ids[countryDisplayIndex];
  const info = emphasizedCountries[cid];
  info.revealed = true;
  globe.polygonsData([...countriesGeoJson]);

  const geo = countriesGeoJson.find(c => parseInt(c.id) === cid);
  if (!geo) { countryDisplayIndex++; setTimeout(revealNextCountry, displayDelay); return; }

  let lat, lng;
  try { [lng, lat] = geoCentroid(geo); }
  catch (e) { lat = geo.bbox ? (geo.bbox[1]+geo.bbox[3])/2 : 0; lng = geo.bbox ? (geo.bbox[0]+geo.bbox[2])/2 : 0; }

  const labelText = info.price ? `${info.name} - ${info.price} ريال` : info.name;
  globe.pointOfView({ lat, lng, altitude: 1.7 }, 1600);

  setTimeout(() => {
    if (!countryLabels[cid]) {
      const label = createCountryLabel(labelText, lat, lng);
      globe.scene().add(label);
      countryLabels[cid] = label;
    } else globe.scene().add(countryLabels[cid]);

    countryDisplayIndex++;
    setTimeout(revealNextCountry, displayDelay);
  }, 1700);
}

function drawFlagSphere(iso, text) {
  const canvas = document.createElement('canvas');
  canvas.width = 1024; canvas.height = 512;
  const ctx = canvas.getContext('2d');

  const img = new Image();
  img.crossOrigin = 'anonymous';
  img.src = `https://flagcdn.com/w160/${iso}.png`;
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
    backgroundSphere = new THREE.Mesh(new THREE.SphereGeometry(globe.getGlobeRadius() * 1.01, 64, 64), globeBackgroundMaterial);
    globe.scene().add(backgroundSphere);
  };
}

function createCountryLabel(text, lat, lng) {
  const canvas = document.createElement('canvas');
  canvas.width = 1200; canvas.height = 500;
  const ctx = canvas.getContext('2d');
  ctx.fillStyle = 'rgba(244, 168, 53, 0.95)';
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  ctx.lineWidth = 8; ctx.strokeStyle = '#fff'; ctx.strokeRect(0, 0, canvas.width, canvas.height);
  ctx.fillStyle = '#000'; ctx.font = 'bold 140px Cairo, sans-serif';
  ctx.textAlign = 'center'; ctx.textBaseline = 'middle'; ctx.fillText(text, canvas.width/2, canvas.height/2);

  const texture = new THREE.CanvasTexture(canvas); texture.needsUpdate = true;
  const sprite = new THREE.Sprite(new THREE.SpriteMaterial({ map: texture, transparent: true }));
  sprite.scale.set(6, 2.5, 1);

  const radius = globe.getGlobeRadius() * 1.13;
  const phi = (90 - lat) * Math.PI / 180;
  const theta = (lng + 180) * Math.PI / 180;
  const x = radius * Math.sin(phi) * Math.cos(theta);
  const y = radius * Math.cos(phi);
  const z = radius * Math.sin(phi) * Math.sin(theta);
  sprite.position.copy(new THREE.Vector3(x, y, z).add(new THREE.Vector3(x,y,z).normalize().multiplyScalar(5)));

  return sprite;
}

function showSaudiMessage() {
  const coords = globe.getScreenCoords(23.8859, 45.0792);
  if (!coords) return;
  const bubble = document.getElementById('saudi-bubble');
  const chat = document.getElementById('chat-message');
  const isMobile = window.innerWidth <= 768;

  bubble.style.left = `${coords.x - (isMobile ? 40 : 350)}px`;
  bubble.style.top  = `${coords.y - (isMobile ? 145 : 30)}px`;
  chat.style.left   = `${coords.x - (isMobile ? 80 : 370)}px`;
  chat.style.top    = `${coords.y - (isMobile ? 250 : 130)}px`;

  bubble.style.display = 'block';
  bubble.style.animation = 'bubbleScalePulse 1.5s ease-in-out infinite';
  chat.style.display = 'block';
  chat.style.animation = 'fadeSlideIn 0.6s ease-out forwards';

  setTimeout(() => {
    chat.style.animation = 'fadeSlideOut 0.6s ease-in forwards';
    bubble.style.opacity = '0';
    setTimeout(() => { chat.style.display = 'none'; bubble.style.display = 'none'; }, 600);
  }, 3700);
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
        globe.controls().autoRotate = true;
        globe.controls().autoRotateSpeed = 0.5;
        revealNextCountry();
      }, 3000);
    }, 2000);
  }, 1000);
}
</script>
