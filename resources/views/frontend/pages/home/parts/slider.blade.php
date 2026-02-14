<link rel="stylesheet" href="{{asset('frontend/css/our_slider_style.css')}}" />
@if (count($sliders)>0)
<section class="mainSection">


    {{--@if (count($sliders)>0)--}}
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-7 order-md-2" style="box-shadow: none !important;">
                @php
                    $isMobile = request()->header('User-Agent') && preg_match(
                    '/Android|iPhone|iPad|iPod|Mobile/i',
                    request()->header('User-Agent')
                    );
                    @endphp

                    @if(!$isMobile)
                        {{-- DESKTOP ONLY --}}
                        <div id="sphere-wrapper" style="width:600px; max-width:100%; aspect-ratio:1/1; margin:auto;">
                            <canvas id="sphere-canvas"
                                    width="600"
                                    height="600"
                                    style="width:100%; height:100%; display:block; background:transparent;">
                            </canvas>
                        </div>
                    @else
                    @endif

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
                    @php
                        $isMobile = request()->header('User-Agent') && preg_match(
                        '/Android|iPhone|iPad|iPod|Mobile/i',
                        request()->header('User-Agent')
                        );
                        @endphp

                        @if(!$isMobile)
                            {{-- DESKTOP ONLY --}}
                            <div id="sphere-wrapper" style="width:600px; max-width:100%; aspect-ratio:1/1; margin:auto;">
                                <canvas id="sphere-canvas"
                                        width="600"
                                        height="600"
                                        style="width:100%; height:100%; display:block; background:transparent;">
                                </canvas>
                            </div>
                        @else
                        @endif

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
@if(!$isMobile)
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

if (typeof topojson === "undefined") {
    console.error("TopoJSON not loaded");
    return;
}

const W = canvas.width;
const H = canvas.height;
const R = Math.min(W, H) * 0.48;

let angleX = 0, angleY = 0;
const autoSpeed = 0.0006;
let isDragging = false, lastX = 0, lastY = 0;
let velocityX = 0, velocityY = 0;

let features = [];
const targetCountries = {};
const countryMarkers = [];

@foreach($countries as $c)
  @if(isset($countryMap[$c->country_name]))
    targetCountries[{{ $countryMap[$c->country_name] }}] = {
      price: "{{ number_format($c->price,0) }} ريال",
      nameAr: "{{ $c->country_name }}",
      lat: null,
      lon: null
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

    // إضافة العلامة
    countryMarkers.push({
      id: id,
      x: 0,
      y: 0,
      radius: 5, // حجم العلامة
      hovered: false
    });
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

// رسم العلامة
function drawMarker(x, y, hovered) {
  ctx.save();
  ctx.beginPath();
  ctx.arc(x, y, 5, 0, Math.PI*2);
  ctx.fillStyle = hovered ? "orange" : "yellow";
  ctx.shadowColor = "rgba(255,140,0,0.6)";
  ctx.shadowBlur = 10;
  ctx.fill();
  ctx.restore();
}

// رسم فقاعة عند Hover
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

  ctx.fillStyle = "rgba(255,140,0,0.92)";
  ctx.shadowColor = "rgba(255,140,0,0.6)";
  ctx.shadowBlur = 15;
  ctx.fill();

  ctx.shadowBlur = 0;
  ctx.fillStyle = "#fff";
  ctx.textAlign = "center";
  ctx.fillText(text, 0, -h/2 + 5);

  ctx.restore();

  // رسم السهم
  ctx.save();
  ctx.translate(x, y);
  ctx.beginPath();
  ctx.moveTo(0, 0);
  ctx.lineTo(-7, -10);
  ctx.lineTo(7, -10);
  ctx.closePath();
  ctx.fillStyle = "rgba(255,140,0,0.92)";
  ctx.fill();
  ctx.restore();
}

canvas.addEventListener('mousemove', e => {
  const rect = canvas.getBoundingClientRect();
  const mx = e.clientX - rect.left;
  const my = e.clientY - rect.top;

  countryMarkers.forEach(m => {
    const dx = mx - m.x;
    const dy = my - m.y;
    m.hovered = Math.sqrt(dx*dx + dy*dy) < m.radius + 3;
  });
});

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

function draw() {
  if (!dataReady) return;
  ctx.clearRect(0,0,W,H);

  // رسم الكرة والدول
  drawSphereOutline();
  ctx.strokeStyle='rgba(244,168,53,0.9)';
  ctx.lineWidth=0.6;
  features.forEach(f=>{
    if(f.geometry.type==="Polygon") f.geometry.coordinates.forEach(drawPolygon);
    else if(f.geometry.type==="MultiPolygon") f.geometry.coordinates.forEach(p=>p.forEach(drawPolygon));
  });

  // تحديث مواقع العلامات
  countryMarkers.forEach(m => {
    const c = targetCountries[m.id];
    if(!c.lat) return;
    const p = project(c.lat, c.lon);
    if(p.z < 0) return;
    m.x = p.x;
    m.y = p.y;
  });

  // رسم العلامات
  countryMarkers.forEach(m => drawMarker(m.x, m.y, m.hovered));

  // رسم الفقاعة إذا hovered
  countryMarkers.forEach(m => {
    if(m.hovered) {
      const c = targetCountries[m.id];
      drawChatBubble(m.x, m.y - 20, `${c.price} - ${c.nameAr}`, 1, 1);
    }
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
@endif
