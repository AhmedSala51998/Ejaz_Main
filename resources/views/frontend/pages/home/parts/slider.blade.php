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
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

const W = canvas.width;
const H = canvas.height;
const R = Math.min(W, H) * 0.48;

let angleX = 0, angleY = 0;
const autoSpeed = 0.0006;
let isDragging = false, lastX = 0, lastY = 0;
let velocityX = 0, velocityY = 0;

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

    let coords = f.geometry.type==="Polygon"? f.geometry.coordinates[0] : f.geometry.coordinates[0][0];
    const [lat, lon] = coords.reduce(([sy,sx], [x,y], i) => [sy+y, sx+x], [0,0]);
    const count = f.geometry.type==="Polygon"? coords.length : coords[0].length;
    targetCountries[id].lat = sy/count;
    targetCountries[id].lon = sx/count;
  });

  dataReady = true;
  requestAnimationFrame(draw);
});

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

// تقدر تستخدم نفس دوال drawSphereOutline, drawPolygon, drawWaterRipple, drawArrowAttached, drawChatBubble

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

// دعم اللمس على الموبايل
canvas.addEventListener('touchstart', e => {
  if(e.touches.length===1){
    isDragging=true; lastX=e.touches[0].clientX; lastY=e.touches[0].clientY;
  }
});
canvas.addEventListener('touchend', e => isDragging=false);
canvas.addEventListener('touchmove', e => {
  if(!isDragging) return;
  const dx = e.touches[0].clientX - lastX;
  const dy = e.touches[0].clientY - lastY;
  angleY += dx*0.005;
  angleX += dy*0.005;
  velocityY = dx*0.0004;
  velocityX = dy*0.0004;
  lastX=e.touches[0].clientX; lastY=e.touches[0].clientY;
  e.preventDefault();
}, { passive:false });

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

  Object.values(targetCountries).forEach(c => {
    if (!c.lat) return;
    const p = project(c.lat, c.lon);
    if (p.z < 0) return;
    drawWaterRipple(p.x, p.y, p.z, performance.now());
    const float = (Math.sin(performance.now() * 0.002) + 1)/2;
    drawChatBubble(p.x, p.y - 20 - float*14, `${c.price} - ${c.nameAr}`, 1, 0.9 + p.z/R*0.2);
    drawArrowAttached(p.x, p.y - 20 - float*14, 0.9 + p.z/R*0.2, 1);
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
