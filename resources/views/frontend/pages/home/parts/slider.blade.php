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
@php
$countryMap = [
    "الهند" => "India",
    "بروندي" => "Burundi",
    "الفلبين" => "Philippines",
    "سريلانكا" => "Sri Lanka",
    "اثيوبيا" => "Ethiopia",
    "اوغندا" => "Uganda",
    "كينيا" => "Kenya",
    "بنجلاديش" => "Bangladesh",
];
@endphp
<script src="https://unpkg.com/topojson-client@3"></script>
<script>
const canvas = document.getElementById('sphere-canvas');
const ctx = canvas.getContext('2d');

const W = canvas.width;
const H = canvas.height;
const R = Math.min(W, H) * 0.48;

let angleX = 0, angleY = 0;
const autoSpeed = 0.0006;
let isDragging = false, lastX = 0, lastY = 0;
let velocityX = 0, velocityY = 0;

let features = [];

const targetCountries = {};
const arabicNames = {};

@foreach($countries as $c)
    @if(isset($countryMap[$c->country_name]))
        targetCountries["{{ $countryMap[$c->country_name] }}"] = {
            price: "{{ number_format($c->price,0) }} ريال"
        };

        arabicNames["{{ $countryMap[$c->country_name] }}"] = "{{ $c->country_name }}";
    @endif
@endforeach

fetch("https://unpkg.com/world-atlas@2/countries-110m.json")
  .then(r => r.json())
  .then(world => {
    features = topojson.feature(world, world.objects.countries).features;

    features.forEach(f => {
      const name = f.properties.name;
      if (!targetCountries[name]) return;

      let coords;
      if (f.geometry.type === "Polygon") coords = f.geometry.coordinates[0];
      else coords = f.geometry.coordinates[0][0];

      const [lat, lon] = getCentroid(coords);
      targetCountries[name].lat = lat;
      targetCountries[name].lon = lon;
    });

    requestAnimationFrame(draw);
  });

function getCentroid(coords) {
  let x = 0, y = 0, count = 0;
  coords.forEach(c => { x += c[0]; y += c[1]; count++; });
  return [y / count, x / count];
}

function project(lat, lon) {
  const latR = lat * Math.PI / 180;
  const lonR = lon * Math.PI / 180;

  let x = R * Math.cos(latR) * Math.sin(lonR);
  let y = -R * Math.sin(latR);
  let z = R * Math.cos(latR) * Math.cos(lonR);

  let y1 = y * Math.cos(angleX) - z * Math.sin(angleX);
  let z1 = y * Math.sin(angleX) + z * Math.cos(angleX);

  let x2 = x * Math.cos(angleY) + z1 * Math.sin(angleY);
  let z2 = -x * Math.sin(angleY) + z1 * Math.cos(angleY);

  return { x: W/2 + x2, y: H/2 + y1, z: z2 };
}

function drawSphereOutline() {
  ctx.beginPath();
  ctx.arc(W/2, H/2, R, 0, Math.PI * 2);
  ctx.strokeStyle = 'rgba(244,168,53,0.25)';
  ctx.lineWidth = 0.8;
  ctx.stroke();
}

function drawPolygon(coords) {
  ctx.beginPath();
  coords.forEach((c,i)=>{
    const [lon, lat] = c;
    const p = project(lat, lon);
    if(i===0) ctx.moveTo(p.x,p.y); else ctx.lineTo(p.x,p.y);
  });
  ctx.stroke();
}

function drawWaterRipple(x, y, z, t) {
  if (z < 0) return;

  const base = (Math.sin(t * 0.004) + 1) / 2;

  for (let i = 0; i < 3; i++) {
    const r = 6 + base * 6 + i * 4;
    ctx.beginPath();
    ctx.arc(x, y, r, 0, Math.PI * 2);
    ctx.strokeStyle = `rgba(244,168,53,${0.35 - i * 0.1})`;
    ctx.lineWidth = 1;
    ctx.stroke();
  }
}

function drawChatBubble(x, y, text, alpha = 1, scale = 1) {
    ctx.save();
    ctx.globalAlpha = alpha;
    ctx.translate(x, y);
    ctx.scale(scale, scale);

    ctx.font = "bold 14px Arial";
    const padding = 10;
    const textWidth = ctx.measureText(text).width;
    const w = textWidth + padding * 2;
    const h = 28;
    const r = 14;
    const arrowH = 12;
    const arrowW = 14;

    ctx.beginPath();
    ctx.moveTo(-w/2 + r, -h);
    ctx.lineTo(w/2 - r, -h);
    ctx.quadraticCurveTo(w/2, -h, w/2, -h + r);
    ctx.lineTo(w/2, 0);
    ctx.quadraticCurveTo(w/2, 0, w/2 - r, 0);
    ctx.lineTo(arrowW/2, 0);
    ctx.lineTo(0, arrowH);
    ctx.lineTo(-arrowW/2, 0);
    ctx.lineTo(-w/2 + r, 0);
    ctx.quadraticCurveTo(-w/2, 0, -w/2, -r);
    ctx.lineTo(-w/2, -h + r);
    ctx.quadraticCurveTo(-w/2, -h, -w/2 + r, -h);
    ctx.closePath();

    ctx.fillStyle = "rgba(0,0,0,0.65)";
    ctx.shadowColor = "rgba(0,0,0,0.45)";
    ctx.shadowBlur = 8;
    ctx.fill();

    ctx.shadowBlur = 0;
    ctx.fillStyle = "#fff";
    ctx.textAlign = "center";
    ctx.fillText(text, 0, -h/2 + 5);

    ctx.restore();
}


canvas.addEventListener('mousedown', e=>{ isDragging=true; lastX=e.clientX; lastY=e.clientY; });
window.addEventListener('mouseup', ()=>isDragging=false);
window.addEventListener('mousemove', e=>{
  if(!isDragging) return;
  const dx = e.clientX - lastX;
  const dy = e.clientY - lastY;
  angleY += dx*0.005;
  angleX += dy*0.005;
  velocityY = dx*0.0004;
  velocityX = dy*0.0004;
  lastX=e.clientX; lastY=e.clientY;
});

function draw(){
  ctx.clearRect(0,0,W,H);
  drawSphereOutline();

  ctx.strokeStyle='rgba(244,168,53,0.9)';
  ctx.lineWidth=0.6;
  features.forEach(f=>{
    if(f.geometry.type==="Polygon") f.geometry.coordinates.forEach(drawPolygon);
    else if(f.geometry.type==="MultiPolygon") f.geometry.coordinates.forEach(p=>p.forEach(drawPolygon));
  });

  const t = performance.now();
  Object.keys(targetCountries).forEach(name => {
    const c = targetCountries[name];
    if(!c.lat) return;
    const p = project(c.lat,c.lon);
    if (p.z < 0) return;

    drawWaterRipple(p.x, p.y, p.z, t);

    const float = (Math.sin(t * 0.002) + 1) / 2;
    const bubbleBaseY = p.y - 20;
    const bubbleY = bubbleBaseY - float * 14;

    drawArrow(p.x, bubbleBaseY - 2);

    const text = `${c.price} - ${arabicNames[name]}`;
    drawChatBubble(
        p.x,
        bubbleY,
        text,
        0.95,
        0.95 + float * 0.05
    );
  });

  if(!isDragging){
    velocityX *= 0.95;
    velocityY *= 0.95;
    angleY += autoSpeed + velocityY;
    angleX += velocityX;
  }

  requestAnimationFrame(draw);
}
</script>
