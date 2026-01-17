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
      z-index: 10000;
      line-height: 1.4;
      user-select: none;
      cursor: default;
      animation: fadeSlideIn 0.5s ease-out forwards;
      opacity: 0;
      pointer-events: none;
    }

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

                <div id="sphere-wrapper" style="width:600px; max-width:100%; aspect-ratio:1/1; margin:auto;">
                    <canvas id="sphere-canvas" width="600" height="600"
                            style="width:100%; height:100%; display:block; background:transparent;"></canvas>
                </div>

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
</section>
@else


    <section class="mainSection">


        {{--@if (count($sliders)>0)--}}

        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7 order-md-2" style="box-shadow: none !important;">

                    <div id="sphere-wrapper" style="width:600px; max-width:100%; aspect-ratio:1/1; margin:auto;">
                        <canvas id="sphere-canvas" width="600" height="600"
                                style="width:100%; height:100%; display:block; background:transparent;"></canvas>
                    </div>

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
    </section>
@endif

<script>
const canvas = document.getElementById('sphere-canvas');
const ctx = canvas.getContext('2d');

const W = canvas.width;
const H = canvas.height;
const R = Math.min(W, H) * 0.45;

let angleY = 0;

const latSteps = 24;
const lonSteps = 48;

/* =======================
   نقاط الشبكة
======================= */
const points = [];
for (let i = 0; i <= latSteps; i++) {
  const theta = i * Math.PI / latSteps;
  for (let j = 0; j <= lonSteps; j++) {
    const phi = j * 2 * Math.PI / lonSteps;
    points.push({ theta, phi });
  }
}

/* =======================
   إسقاط 3D → 2D
======================= */
function projectPoint(p) {
  const x = R * Math.sin(p.theta) * Math.cos(p.phi + angleY);
  const y = R * Math.cos(p.theta);
  const z = R * Math.sin(p.theta) * Math.sin(p.phi + angleY);
  return {
    x: W / 2 + x,
    y: H / 2 + y,
    z
  };
}

/* =======================
   تحويل Lat/Lon
======================= */
function latLonToThetaPhi(lat, lon) {
  return {
    theta: (90 - lat) * Math.PI / 180,
    phi: lon * Math.PI / 180
  };
}

/* =======================
   بيانات القارات (مبسطة)
======================= */
const continents = [
  // Africa
  [[37,-17],[30,10],[15,40],[-10,50],[-35,28],[-35,-17],[5,-10],[37,-17]],

  // Europe
  [[70,-10],[60,40],[50,60],[40,30],[45,0],[55,-10],[70,-10]],

  // Asia
  [[70,40],[60,100],[40,140],[10,120],[0,90],[20,60],[50,40],[70,40]],

  // North America
  [[70,-160],[60,-100],[40,-80],[20,-100],[30,-140],[60,-160],[70,-160]],

  // South America
  [[10,-80],[-10,-60],[-30,-55],[-55,-70],[-40,-80],[10,-80]],

  // Australia
  [[-10,110],[-20,150],[-45,150],[-45,110],[-10,110]]
];

/* =======================
   رسم القارات
======================= */
function drawContinent(shape) {
  ctx.beginPath();
  shape.forEach((pt, i) => {
    const p = latLonToThetaPhi(pt[0], pt[1]);
    const proj = projectPoint(p);
    if (proj.z < 0) return; // إخفاء اللي ورا الكرة
    if (i === 0) ctx.moveTo(proj.x, proj.y);
    else ctx.lineTo(proj.x, proj.y);
  });
  ctx.strokeStyle = 'rgba(0,255,180,0.9)';
  ctx.lineWidth = 1.3;
  ctx.stroke();
}

/* =======================
   الرسم
======================= */
function draw() {
  ctx.clearRect(0, 0, W, H);

  // خطوط الطول
  for (let j = 0; j <= lonSteps; j++) {
    ctx.beginPath();
    for (let i = 0; i <= latSteps; i++) {
      const p = points[i * (lonSteps + 1) + j];
      const proj = projectPoint(p);
      if (i === 0) ctx.moveTo(proj.x, proj.y);
      else ctx.lineTo(proj.x, proj.y);
    }
    ctx.strokeStyle = 'rgba(244,168,53,0.35)';
    ctx.lineWidth = 0.5;
    ctx.stroke();
  }

  // خطوط العرض
  for (let i = 0; i <= latSteps; i++) {
    ctx.beginPath();
    for (let j = 0; j <= lonSteps; j++) {
      const p = points[i * (lonSteps + 1) + j];
      const proj = projectPoint(p);
      if (j === 0) ctx.moveTo(proj.x, proj.y);
      else ctx.lineTo(proj.x, proj.y);
    }
    ctx.strokeStyle = 'rgba(244,168,53,0.35)';
    ctx.lineWidth = 0.8;
    ctx.stroke();
  }

  // القارات
  continents.forEach(drawContinent);

  angleY += 0.002;
  requestAnimationFrame(draw);
}

draw();
</script>
