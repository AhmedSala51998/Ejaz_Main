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

    /* فقاعة شفافة دائرية فوق السعودية */
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
      overflow: visible; /* لازم عشان يظهر الموجات */
    }

    /* الحلقات الدائرية (الموجات) */
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

    /* سهم ذيل الفقاعة متجه لأسفل */
    #saudi-bubble::after {
      content: '';
      position: absolute;
      top: -18px; /* تحت الفقاعة */
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      border-left: 15px solid transparent;
      border-right: 15px solid transparent;
      border-top: 18px solid rgba(244, 168, 53, 0.25);
      filter: drop-shadow(0 0 5px rgba(244, 168, 53, 0.4));
    }

    /* حركة نبض الفقاعة */
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

    /* ستايل رسالة الـ chat (خلفية برتقالية + ظل) */
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

    /* سهم الرسالة (الذي يشير للفقاعة) */
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

    /* أنيميشن الدخول والخروج للرسالة */
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
    left: calc(50% + 7px);      /* زودنا 10px يمين عشان نزيحها من ناحية الشمال */
    transform: translateX(-50%);
    margin-top: -5px;             /* رفع الكرة شوي */
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







@php
$countryMap = [
    231 => ['iso' => 'et', 'revealed' => false],
    800 => ['iso' => 'ug', 'revealed' => false],
    50  => ['iso' => 'bd', 'revealed' => false],
    608 => ['iso' => 'ph', 'revealed' => false],
    404 => ['iso' => 'ke', 'revealed' => false],
    356 => ['iso' => 'in', 'revealed' => false],
    144 => ['iso' => 'lk', 'revealed' => false],
    108 => ['iso' => 'bi', 'revealed' => false],
    682 => ['iso' => 'sa', 'revealed' => true],
];
@endphp


@endif
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

const emphasizedCountries = {
@foreach($countryMap as $fixedId => $info)
    {{ $fixedId }}: {
        id: {{ $fixedId }},
        iso: "{{ $info['iso'] }}",
        name: "{{ $countries->firstWhere('id', $fixedId)->country_name ?? '' }}",
        price: {{ $fixedId == 682 ? 'null' : '"' . ($countries->firstWhere('id', $fixedId)->price ?? '') . '"' }},
        revealed: {{ $info['revealed'] ? 'true' : 'false' }}
    },
@endforeach
};

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
          loader.style.display = 'flex'; // ⬅️ إظهار اللودر

          fetch(`/get-nationality-id?name=${encodeURIComponent(info.name)}`)
            .then(res => res.json())
            .then(data => {
              if (data?.id) {
                setTimeout(() => {
                  window.location.href = `/all-workers/${data.id}`;
                }, 800); // ⏳ يعطي وقت صغير لرؤية اللودر
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

            // تدوير الكرة أولاً إلى موقع الدولة
            globe.pointOfView({ lat, lng, altitude: 1.7 }, 1600);

            // بعد التوجيه، أضف اللافتة
            setTimeout(() => {
              if (!countryLabels[cid]) {
                const label = createCountryLabel(labelText, lat, lng);
                globe.scene().add(label);
                countryLabels[cid] = label;
              } else {
                globe.scene().add(countryLabels[cid]);
              }

              countryDisplayIndex++;
              setTimeout(revealNextCountry, displayDelay); // عرض الدولة التالية بعد قليل
            }, 1700); // بعد انتهاء دوران الكرة

          } else {
            // في حال لم نجد معلومات الدولة
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

// إضافة دعم roundRect إذا غير موجود (لأنه مش مدعوم في كل المتصفحات)
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

  // التحويل الصحيح للنظام الكروي حسب globe.gl
  const phi = (90 - lat) * Math.PI / 180;
  const theta = (lng+180) * Math.PI / 180;

  let x = radius * Math.sin(phi) * Math.cos(theta);
  let y = radius * Math.cos(phi);
  let z = radius * Math.sin(phi) * Math.sin(theta);


  // إزاحة اللافتة قليلاً للخارج لتكون ظاهرة فوق السطح
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
  const sound = document.getElementById('chat-sound');

  const isMobile = window.innerWidth <= 768;

  if (isMobile) {
    // موضع الفقاعة في الموبايل
    bubble.style.left = `${coords.x - 40}px`;
    bubble.style.top = `${coords.y - 145}px`;

    // موضع الرسالة في الموبايل
    chat.style.left = `${coords.x - 80}px`;
    chat.style.top = `${coords.y - 250}px`;
  } else {
    // موضع الفقاعة في الديسكتوب
    bubble.style.left = `${coords.x - 350}px`;
    bubble.style.top = `${coords.y - 30}px`;

    // موضع الرسالة في الديسكتوب
    chat.style.left = `${coords.x - 370}px`;
    chat.style.top = `${coords.y - 130}px`;
  }

  // إظهار الفقاعة والرسالة
  bubble.style.display = 'block';
  bubble.style.animation = 'bubbleScalePulse 1.5s ease-in-out infinite';

  chat.style.display = 'block';
  chat.style.animation = 'fadeSlideIn 0.6s ease-out forwards';

  // تشغيل الصوت
  sound.currentTime = 0;
  sound.play();

  // إخفاء بعد 3.7 ثانية
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
