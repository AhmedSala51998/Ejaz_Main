<link rel="stylesheet" href="{{asset('frontend/css/our_slider_style.css')}}" />
@if (count($sliders)>0)
<section class="mainSection">


    {{--@if (count($sliders)>0)--}}
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-7 order-md-2" style="box-shadow: none !important;">
                <div id="sphere-wrapper" style="width:600px; max-width:100%; aspect-ratio:1/1; margin:auto;">
                    <canvas id="sphere-canvas"
                            width="600"
                            height="600"
                            style="width:100%; height:100%; display:block; background:transparent;">
                    </canvas>
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

                                        <i class="fa fa-arrow-left ms-2"><span></span></i>
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
                        <canvas id="sphere-canvas"
                                width="600"
                                height="600"
                                style="width:100%; height:100%; display:block; background:transparent;">
                        </canvas>
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
                                            <i class="fa fa-arrow-left ms-2"><span></span></i>
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
                                            <i class="fa fa-arrow-left ms-2"><span></span></i>
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
                                            <i class="fa fa-arrow-left ms-2"><span></span></i>
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
  "الهند" => 356,
  "بروندي" => 108,
  "الفلبين" => 608,
  "سريلانكا" => 144,
  "اثيوبيا" => 231,
  "اوغندا" => 800,
  "كينيا" => 404,
  "بنجلاديش" => 50,
];
@endphp
<script defer src="https://unpkg.com/topojson-client@3"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
const canvas = document.getElementById('sphere-canvas');
if (!canvas) return;
const ctx = canvas.getContext('2d');

function resizeCanvas() {
  const wrapper = canvas.parentElement;
  const size = Math.min(wrapper.clientWidth, 600);

  canvas.width  = size;
  canvas.height = size;

  W = canvas.width;
  H = canvas.height;
  R = Math.min(W, H) * 0.48;
}

  resizeCanvas();
  window.addEventListener('resize', resizeCanvas);

if (typeof topojson === "undefined") {
    console.error("TopoJSON not loaded");
    return;
}

let W, H, R;

let angleX = 0, angleY = 0;
const autoSpeed = 0.0006;
let isDragging = false, lastX = 0, lastY = 0;
let velocityX = 0, velocityY = 0;

const isMobile = window.innerWidth < 768;
const autoSpeed = isMobile ? 0.00025 : 0.0006;

let features = [];

const targetCountries = {};

@foreach($countries as $c)
  @if(isset($countryMap[$c->country_name]))
    targetCountries[{{ $countryMap[$c->country_name] }}] = {
      price: "{{ number_format($c->price,0) }} ريال",
      nameAr: "{{ $c->country_name }}"
    };
  @endif
@endforeach

let dataReady = false;

fetch("https://unpkg.com/world-atlas@2/countries-110m.json")
  .then(r => r.json())
  .then(world => {

    features = topojson.feature(world, world.objects.countries).features;

    features.forEach(f => {
      const id = +f.id;
      if (!targetCountries[id]) return;

      let coords;
      if (f.geometry.type === "Polygon")
        coords = f.geometry.coordinates[0];
      else
        coords = f.geometry.coordinates[0][0];

      const [lat, lon] = getCentroid(coords);
      targetCountries[id].lat = lat;
      targetCountries[id].lon = lon;
    });

    dataReady = true;
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

function drawArrowAttached(x, y, scale = 1, alpha = 1) {
  ctx.save();
  ctx.globalAlpha = alpha;

  const h = 28;
  const arrowGap = -5;

  ctx.translate(
    x,
    y + h * scale / 2 + arrowGap
  );

  ctx.scale(scale, scale);

  ctx.beginPath();
  ctx.moveTo(0, 0);
  ctx.lineTo(-7, -10);
  ctx.lineTo(7, -10);
  ctx.closePath();

  ctx.fillStyle = "rgba(0,0,0,0.65)";
  ctx.fill();

  ctx.restore();
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

  ctx.beginPath();
  ctx.moveTo(-w/2 + r, -h);
  ctx.lineTo(w/2 - r, -h);
  ctx.quadraticCurveTo(w/2, -h, w/2, -h + r);
  ctx.lineTo(w/2, -r);
  ctx.quadraticCurveTo(w/2, 0, w/2 - r, 0);
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
  if (!dataReady) return;
  ctx.clearRect(0,0,W,H);
  drawSphereOutline();

  ctx.strokeStyle='rgba(244,168,53,0.9)';
  ctx.lineWidth=0.6;
  features.forEach(f=>{
    if(f.geometry.type==="Polygon") f.geometry.coordinates.forEach(drawPolygon);
    else if(f.geometry.type==="MultiPolygon") f.geometry.coordinates.forEach(p=>p.forEach(drawPolygon));
  });

  const t = performance.now();
    Object.values(targetCountries).forEach(c => {
    if (!c.lat) return;

    const p = project(c.lat, c.lon);
    if (p.z < 0) return;

    drawWaterRipple(p.x, p.y, p.z, t);

    const float = (Math.sin(t * 0.002) + 1) / 2;
    const bubbleBaseY = p.y - 20;
    const bubbleY = bubbleBaseY - float * 14;

    const text = `${c.price} - ${c.nameAr}`;
    const scale = 0.95 + float * 0.05;
    const alpha = 0.95;

    drawChatBubble(p.x, bubbleY, text, alpha, scale);
    drawArrowAttached(p.x, bubbleY, scale, alpha);
    });

  if(!isDragging){
    velocityX *= 0.95;
    velocityY *= 0.95;
    angleY += autoSpeed + velocityY;
    angleX += velocityX;
  }

  requestAnimationFrame(draw);
}
});
</script>
