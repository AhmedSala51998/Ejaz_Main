<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>ايجاز للاستقدام - اختر مدينتك</title>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body{
  font-family:'Poppins',sans-serif;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  flex-direction:column;
  background:linear-gradient(135deg,rgba(255,126,95,0.15),rgba(254,180,123,0.15));
  color:#fff;
  padding:20px;
  overflow-x:hidden;
}
h1{
  font-size:3rem;
  margin-bottom:50px;
  text-align:center;
  text-shadow:2px 2px 15px rgba(0,0,0,0.4);
  letter-spacing:1px;
}
.cards{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
  gap:30px;
  width:100%;
  max-width:1000px;
  perspective:1000px;
}
.card{
  background:rgba(255,255,255,0.08);
  border-radius:25px;
  padding:35px 25px;
  text-align:center;
  font-size:1.3rem;
  font-weight:600;
  cursor:pointer;
  transition:transform 0.6s cubic-bezier(0.4,0,0.2,1),box-shadow 0.6s ease,background 0.5s ease;
  box-shadow:0 12px 30px rgba(0,0,0,0.25);
  backdrop-filter:blur(12px);
  border:2px solid rgba(255,255,255,0.15);
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
  position:relative;
}
.card i{
  font-size:60px;
  margin-bottom:18px;
  transition:transform 0.6s ease,color 0.5s ease;
}
.card:hover{
  transform:rotateY(10deg) translateY(-12px) scale(1.08);
  box-shadow:0 25px 60px rgba(0,0,0,0.45);
}
.jeddah{border-color:#1e90ff;color:#1e90ff;}
.jeddah:hover{background:#1e90ff;color:#fff;}
.yanbu{border-color:#32cd32;color:#32cd32;}
.yanbu:hover{background:#32cd32;color:#fff;}
.riyadh{border-color:#ff4500;color:#ff4500;}
.riyadh:hover{background:#ff4500;color:#fff;}
.location{border-color:#ff9800;color:#ff9800;position:relative;overflow:hidden;}
.location:hover{background:#ff9800;color:#000;}
.location-icon{animation:bounce 1.5s infinite;}
@keyframes bounce{0%,100%{transform:translateY(0);}50%{transform:translateY(-15px);}}
.card::before{
  content:'';
  position:absolute;
  width:100%;height:100%;
  top:0;left:0;
  border-radius:25px;
  background:linear-gradient(135deg,rgba(255,255,255,0.1),rgba(255,255,255,0));
  opacity:0;transition:opacity 0.5s ease;z-index:0;
}
.card:hover::before{opacity:1;}
@media(max-width:768px){
  .cards{grid-template-columns:1fr;gap:20px;}
  h1{font-size:2.5rem;margin-bottom:35px;}
  .card{padding:28px 20px;font-size:1.1rem;}
  .card i{font-size:50px;margin-bottom:15px;}
}

/* ✅ اللودر داخل كارت الموقع */
.loader-inside{
  width:40px;
  height:40px;
  border:4px solid rgba(0,0,0,0.1);
  border-top:4px solid #ff9800;
  border-radius:50%;
  animation:spin 1s linear infinite;
  display:none;
}
@keyframes spin{
  to{transform:rotate(360deg);}
}
.loading .loader-inside{
  display:block;
}
.loading .location-icon,
.loading span{
  display:none;
}
.city-title {
  font-family: 'Poppins', 'Tajawal', sans-serif;
  font-weight: 700;
  font-size: 2.4rem;
  text-align: center;
  line-height: 1.6;
  color: #222;
  background: linear-gradient(135deg, #ff7e00, #ffb347);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 3px 8px rgba(0,0,0,0.15);
  margin-bottom: 40px;
  animation: fadeInDown 1.2s ease both;
}

.city-title span {
  color: #ff7e00;
  background: linear-gradient(90deg, #ff6a00, #ffa233);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: 800;
  letter-spacing: 1px;
}

.city-title small {
  display: block;
  font-size: 1.2rem;
  font-weight: 500;
  color: #555;
  margin-top: 8px;
  letter-spacing: 0.5px;
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* للشاشات الصغيرة */
@media (max-width: 768px) {
  .city-title {
    font-size: 1.8rem;
  }
  .city-title small {
    font-size: 1rem;
  }
}
/* نص جاري تحديد الموقع */
/* اللودر داخل الكارت */
.loader-inside {
  width: 40px;
  height: 40px;
  border: 4px solid rgba(0,0,0,0.1);
  border-top: 4px solid #ff9800;
  border-radius: 50%;
  animation: spin 1s linear infinite;
  display: none;
  margin: 10px auto 0; /* اجعلها تحت الأيقونة */
}

/* النص أسفل اللودر */
.location .loading-text {
  display: none;
  margin-top: 8px;  /* مسافة فوق النص */
  color: #ff9800;
  font-weight: 600;
  font-size: 1.3rem;
  text-align: center;
}

/* عند الضغط تظهر اللودر والنص وتختفي الأيقونة والكلمة */
.loading .loader-inside {
  display: block;
}
.loading .location-icon,
.loading span {
  display: none;
}
.loading .loading-text {
  display: block;
}

/* دوران اللودر */
@keyframes spin {
  to { transform: rotate(360deg); }
}


.card {
  position: relative;
  background: rgba(255, 140, 0, 0.18); /* برتقالي شفاف */
  color: #ff6a00;
  border: 2px solid rgba(255, 140, 0, 0.4);
  border-radius: 25px;
  padding: 35px 25px;
  text-align: center;
  font-size: 1.2rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.4s ease;
  box-shadow: 0 6px 15px rgba(255, 106, 0, 0.15);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  backdrop-filter: blur(8px);
  overflow: hidden;
}

/* ✨ تأثير اللمعة الزجاجية */
.card::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 25px;
  background: linear-gradient(145deg, rgba(255,255,255,0.25), rgba(255,255,255,0.05));
  pointer-events: none;
  transition: opacity 0.4s ease;
  opacity: 0.7;
}

/* عند المرور بالفأرة */
.card:hover {
  background: rgba(255, 140, 0, 0.25);
  transform: translateY(-6px) scale(1.04);
  box-shadow: 0 10px 25px rgba(255, 106, 0, 0.3);
}

.card:hover::before {
  opacity: 1;
}

/* 🔸 كرت "استكشف موقعي" */
.location {
  position: relative;
}

/* اللودر */
.loader-inside {
  width: 40px;
  height: 40px;
  border: 3px solid rgba(255,255,255,0.3);
  border-top: 3px solid #ff6a00;
  border-radius: 50%;
  animation: spin 1s linear infinite;
  display: none;
  margin-bottom: 10px;
}

/* نص جاري تحديد موقعك */
.loading-text {
  font-size: 1rem;
  font-weight: 600;
  color: #ff6a00;
  display: none;
  text-shadow: 0 0 6px rgba(255, 106, 0, 0.3);
}

/* عند الضغط */
.location.loading .loader-inside {
  display: block;
}
.location.loading .loading-text {
  display: block;
}
.location.loading i,
.location.loading span {
  display: none;
}

/* حركة الدوران */
@keyframes spin {
  to { transform: rotate(360deg); }
}


</style>
</head>
<body>

<h1 class="city-title">
  مرحبًا بك في <span>إيجاز للاستقدام</span><br>
  <small>اختر مدينتك لعرض العمالة الأقرب إليك</small>
</h1>
<div class="cards">
  <div class="card jeddah" onclick="chooseCity('jeddah')"><i class="fas fa-city"></i> جدة</div>
  <div class="card yanbu" onclick="chooseCity('yanbu')"><i class="fas fa-water"></i> ينبع</div>
  <div class="card riyadh" onclick="chooseCity('riyadh')"><i class="fas fa-building"></i> الرياض</div>
  <div class="card location" id="locationCard" onclick="detectLocation()">
    <i class="fas fa-map-marker-alt location-icon"></i>
    <span>استكشف موقعي</span>
    <div class="loader-inside"></div>
    <div class="loading-text">جاري تحديد موقعك...</div>
  </div>
</div>

<script>
// --- Helpers ---
function setCookie(name, value){
  const expires = new Date('2090-12-31T23:59:59Z').toUTCString();
  document.cookie = `${name}=${value}; path=/; expires=${expires}`;
}
function getCookie(name){
  const v = document.cookie.match('(^|;) ?'+name+'=([^;]*)(;|$)') || [];
  return v[2] || null;
}

// --- اختيار المدينة ---
function chooseCity(branch){
  axios.post('{{ route('detect.location.ajax') }}', {branch}, {
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'}
  }).then(res=>{
    localStorage.setItem('branch', branch);
    setCookie('branch', branch);
    const redirectPath = localStorage.getItem('redirectAfterBranch') || '/';
    localStorage.removeItem('redirectAfterBranch');
    window.location.href = redirectPath;
  }).catch(err=>{
    localStorage.setItem('branch', branch);
    setCookie('branch', branch);
    const redirectPath = localStorage.getItem('redirectAfterBranch') || '/';
    localStorage.removeItem('redirectAfterBranch');
    window.location.href = redirectPath;
  });
}

// --- استكشاف الموقع ---
function detectLocation(){
  const card = document.getElementById('locationCard');
  card.classList.add('loading');

  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(
      pos => sendCoords(pos.coords.latitude,pos.coords.longitude),
      err => { card.classList.remove('loading'); fallbackLocation(); },
      {enableHighAccuracy:true, timeout:15000}
    );
  } else {
    card.classList.remove('loading');
    fallbackLocation();
  }
}

function sendCoords(lat,lng){
  axios.post('{{ route('detect.location.ajax') }}',{lat,lng},{
    headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}
  }).then(res=>{
    const closestCity = res.data.closestCity;
    localStorage.setItem('branch', closestCity);
    setCookie('branch', closestCity);
    const redirectPath = localStorage.getItem('redirectAfterBranch') || '/';
    localStorage.removeItem('redirectAfterBranch');
    window.location.href = redirectPath;
  }).catch(err=>{
    document.getElementById('locationCard').classList.remove('loading');
    fallbackLocation();
  });
}

function fallbackLocation(){
  chooseCity('yanbu');
}

// --- حفظ الصفحة المطلوبة قبل التحويل ---
const branch = localStorage.getItem('branch') || getCookie('branch');
if(!branch && window.location.pathname !== '/'){
  localStorage.setItem('redirectAfterBranch', window.location.pathname);
  window.location.href = '/';
}
</script>
</body>
</html>
