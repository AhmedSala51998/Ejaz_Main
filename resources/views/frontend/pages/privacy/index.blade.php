@extends('frontend.layouts.layout')

@section('title')
سياسة الخصوصية - شركة إيجاز للاستقدام
@endsection

@section('meta_description')
سياسة الخصوصية والأحكام والشروط الخاصة بشركة إيجاز للاستقدام داخل المملكة العربية السعودية.
@endsection

@section('styles')
<style>
body {
    background-color: #FFF;
    font-family: 'Tajawal', sans-serif;
}

.banner {
    background: linear-gradient(135deg, #f4a835, #fff1db);
    padding: 60px 20px;
    text-align: center;
    border-radius: 0 0 50px 50px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    color: #333;
    position: relative;
    overflow: hidden;
}

.banner::before {
    content: '';
    position: absolute;
    top: -100px;
    left: -100px;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    z-index: 0;
}

.banner h1 {
    font-size: 3rem;
    font-weight: bold;
    z-index: 1;
    position: relative;
}

.banner ul {
    list-style: none;
    padding: 0;
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 20px;
    z-index: 1;
    position: relative;
}

.banner ul li a {
    color: #333;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
}

.banner ul li a.active,
.banner ul li a:hover {
    color: #fff;
    background: #f4a835;
    padding: 6px 14px;
    border-radius: 12px;
}
:root {
    --orange: #D89835;
    --orange-dark: #c8812a;
    --gray-dark: #5F5F5F;
    --text-main: #212121;
    --card-bg: rgba(255, 255, 255, 0.25);
    --border-color: rgba(255, 255, 255, 0.25);
}

/* Grid */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

@media (max-width: 992px) {
    .blog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .blog-grid {
        grid-template-columns: 1fr;
    }
}

/* Blog Card */
.blog-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 22px;
    overflow: visible;
    backdrop-filter: blur(12px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    position: relative;
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 38px rgba(216,152,53,0.45);
}

/* Image */
.blog-image {
    height: 200px;
    overflow: hidden;
    position: relative;
    border-radius: 22px 22px 0 0;
}

.blog-image img {
    width: 100%;
    height: 100%;
    transition: transform .6s ease;
    border-radius: 22px 22px 0 0;
}

.blog-card:hover .blog-image img {
    transform: scale(1.08);
}

/* Category badge */
.blog-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--orange);
    color: #fff;
    padding: 6px 14px;
    font-size: 0.8rem;
    border-radius: 50px;
    font-weight: 600;
}

/* Content */
.blog-content {
    padding: 25px 20px 30px;
    text-align: right;
}

.blog-content h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-main);
    margin-bottom: 10px;
    line-height: 1.5;
}

.blog-content p {
    font-size: 0.95rem;
    color: var(--gray-dark);
    min-height: 60px;
    margin-bottom: 18px;
}

.blog-content h3 {
    color: #212121 !important;
}

.blog-content p {
    color: #555 !important;
}


/* Meta */
.blog-meta {
    font-size: 0.8rem;
    color: #888;
    margin-bottom: 15px;
}

/* Button */
.blog-content a {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--orange);
    color: #fff;
    font-weight: 600;
    padding: 10px 24px;
    border-radius: 50px;
    font-size: 0.9rem;
    text-decoration: none;
    transition: background .3s ease;
}

.blog-content a:hover {
    background: var(--orange-dark);
}

/* Intro */
.blog-intro{
    margin-top:-30px
}
.blog-intro h2{
    font-size:2.4rem;
    font-weight:900;
    color:#1f1f1f;
    margin-bottom:12px;
    text-align:center;
}
.blog-intro p{
    color:#666;
    max-width:620px;
    margin:0 auto;
    line-height:1.9;
    text-align:center;
}

/* Featured Editorial */
.editorial-feature{
    position:relative;
    height:420px;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 30px 60px rgba(0,0,0,.15);
    margin-bottom:60px;
}
.editorial-feature img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.6s ease;
}
.editorial-feature:hover img{
    transform:scale(1.05);
}
.feature-overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(to top, rgba(0,0,0,.75), rgba(0,0,0,.15));
    color:#fff;
    padding:40px;
    display:flex;
    flex-direction:column;
    justify-content:flex-end;
}
.feature-overlay span{
    background:#D89835;
    padding:6px 18px;
    border-radius:30px;
    font-size:.8rem;
    font-weight:800;
    width:max-content;
    margin-bottom:15px;
}
.feature-overlay h2{
    font-size:2.3rem;
    font-weight:900;
    margin-bottom:12px;
}
.feature-overlay p{
    max-width:520px;
    opacity:.95;
}

/* Magazine Grid */
.magazine-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(320px,1fr));
    gap:40px;
}
.mag-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    transition:.4s ease;
}
.mag-card:hover{
    transform:translateY(-10px);
    box-shadow:0 25px 50px rgba(216,152,53,.35);
}
.mag-card img{
    width:100%;
    height:230px;
    object-fit:cover;
}
.mag-content{
    padding:26px;
}
.mag-content span{
    font-size:.8rem;
    color:#999;
}
.mag-content h3{
    font-size:1.35rem;
    font-weight:800;
    margin:12px 0;
    line-height:1.6;
}
.mag-content p{
    color:#555;
    line-height:1.8;
    margin-bottom:20px;
}
.mag-content a{
    font-weight:800;
    color:#D89835;
    text-decoration:none;
}

/* Empty State */
.empty-blog{
    text-align:center;
    padding:80px 20px;
}
.empty-blog img{
    max-width:420px;
    margin-bottom:25px;
}
.empty-blog h3{
    font-size:1.7rem;
    font-weight:900;
    color:#333;
}
.empty-blog p{
    color:#777;
    margin-top:10px;
}

.mag-card {
    position: relative;
}

.mag-card .card-link {
    position: absolute;
    inset: 0;
    z-index: 5;
}

.mag-card a {
    text-decoration: none;
}

.mag-card:hover {
    transform: translateY(-4px);
}

.custom-pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    padding: 25px 0;
    flex-wrap: wrap;
}

.custom-pagination .page-item {
    transition: transform 0.2s ease;
}

.custom-pagination .page-item:hover {
    transform: translateY(-2px);
}

.custom-pagination .page-link {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid #f4a835;
    color: #f4a835;
    border-radius: 12px;
    padding: 10px 16px;
    font-weight: 600;
    font-size: 16px;
    /*box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);*/
    box-shadow: 0 16px 36px rgba(228, 147, 37, 0.45) !important;
    transition: all 0.3s ease;
}

.custom-pagination .page-link:hover {
    background: #f4a835;
    color: white;
    border-color: #f4a835;
}

.custom-pagination .active_ejaz .page-link {
    background-color: #f4a835 !important;
    color: white;
    border-color: #f4a835;
    pointer-events: none;
    box-shadow: 0 16px 36px rgba(228, 147, 37, 0.45) !important;
}
.custom-pagination .page-item.active_ejaz .page-link {
    box-shadow: none !important;
    filter: none !important;
    text-shadow: none !important;
    outline: none !important;
    border-bottom: none !important;
    border-image: none !important;
    border-style: solid !important;
    border-width: 1px !important;
}
.page-link {
    box-shadow: none !important;
}

.page-item.active .page-link::after,
.page-item.active .page-link::before {
    display: none !important;
    box-shadow: none !important;
}
.custom-pagination .page-item.active_ejaz .page-link {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;
    box-shadow: none !important;
    filter: none !important;
    outline: none !important;
    border-bottom: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link::before,
.custom-pagination .page-item.active_ejaz .page-link::after {
    display: none !important;
    content: none !important;
    box-shadow: none !important;
}

.custom-pagination .page-item.actiactive_ejazve .page-link,
.custom-pagination .page-link:focus {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;

    box-shadow: none !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;

    outline: none !important;
    filter: none !important;
    text-shadow: none !important;
}
.custom-pagination .page-item.active_ejaz .page-link,
.custom-pagination .page-item.active_ejaz .page-link:focus,
.custom-pagination .page-item.active_ejaz .page-link:active,
.custom-pagination .page-link:focus,
.custom-pagination .page-link:active {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;

    box-shadow: none !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    text-shadow: none !important;
    outline: none !important;
    filter: none !important;
}

.custom-pagination .page-item.active_ejaz span.page-link {
    background-color: #f4a835 !important;
    color: white !important;
    border: 1px solid #f4a835 !important;
    border-radius: 12px !important;

    box-shadow: none !important;
    outline: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link {
    box-shadow: none !important;
    outline: none !important;
    background-clip: padding-box !important;
    background-origin: border-box !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link:focus-visible,
.custom-pagination .page-item.active_ejaz .page-link:focus-within {
    outline: none !important;
    box-shadow: none !important;
}

.custom-pagination .page-item.active_ejaz .page-link {
    border-radius: 12px !important;
    background-color: #f4a835 !important;
    border: 1px solid #f4a835 !important;
    color: white !important;
    box-shadow: none !important;

}
</style>
@endsection

@section('content')

<div class="banner">
    <h1>سياسة الخصوصية</h1>
    <ul>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a class="active">سياسة الخصوصية</a></li>
    </ul>
</div>

<section class="blog-section py-5">
    <div class="container">

        <div class="blog-intro mb-5">
            <h2>سياسة الخصوصية والأحكام والشروط</h2>
            <p>
                توضح هذه الصفحة سياسة الخصوصية والأحكام والشروط الخاصة بخدمات الاستقدام المقدمة من شركة إيجاز.
            </p>
        </div>

        <div class="mag-card">
            <div class="mag-content" style="text-align:right; line-height:2">

                <h3>مقدمة</h3>
                <p>
                    تحترم شركة إيجاز للاستقدام خصوصية عملائها، وتلتزم بحماية جميع المعلومات الشخصية التي يتم جمعها
                    من خلال موقعنا الإلكتروني أو من خلال وسائل التواصل المختلفة. توضح هذه السياسة كيفية جمع
                    المعلومات واستخدامها وحمايتها.
                </p>

                <h3>أولاً: المعلومات التي نقوم بجمعها</h3>
                <p>
                    عند استخدامك لموقعنا أو طلب خدماتنا، قد نقوم بجمع المعلومات التالية:
                    الاسم الكامل، رقم الجوال، البريد الإلكتروني، العنوان، معلومات طلب الاستقدام،
                    ومعلومات الدفع عبر القنوات المعتمدة. ويتم جمع هذه المعلومات فقط لغرض تقديم
                    خدمات الاستقدام بشكل نظامي.
                </p>

                <h3>ثانياً: كيفية استخدام المعلومات</h3>
                <p>
                    نستخدم المعلومات التي يتم جمعها للأغراض التالية:
                    تنفيذ طلبات الاستقدام، إصدار العقود والفواتير، التواصل مع العميل بخصوص الطلب،
                    إرسال الإشعارات المتعلقة بالخدمة، تحسين جودة الخدمات المقدمة، والالتزام
                    بالأنظمة والقوانين في المملكة العربية السعودية، وقد يتم مشاركة البيانات مع
                    منصة مساند أو الجهات الحكومية لإتمام إجراءات الاستقدام.
                </p>

                <h3>ثالثاً: حماية المعلومات</h3>
                <p>
                    تلتزم شركة إيجاز بحماية معلومات العملاء، ونتخذ جميع الإجراءات الأمنية اللازمة
                    لمنع الوصول غير المصرح به أو التعديل أو الإفصاح عن المعلومات أو إتلافها.
                </p>

                <h3>رابعاً: مشاركة المعلومات</h3>
                <p>
                    نحن لا نقوم ببيع أو تأجير أو مشاركة المعلومات الشخصية مع أي طرف ثالث، باستثناء
                    الجهات ذات العلاقة بإجراءات الاستقدام مثل منصة مساند، وزارة الموارد البشرية،
                    أو مكاتب التوظيف الخارجية، وذلك فقط لإتمام إجراءات الاستقدام.
                </p>

                <h3>خامساً: ملفات تعريف الارتباط (Cookies)</h3>
                <p>
                    قد يستخدم موقعنا ملفات تعريف الارتباط (Cookies) لتحسين تجربة المستخدم ومعرفة
                    الصفحات الأكثر زيارة وتحسين أداء الموقع.
                </p>

                <h3>سادساً: حقوق العميل</h3>
                <p>
                    يحق للعميل طلب الاطلاع على بياناته أو طلب تعديلها أو طلب حذفها بعد انتهاء
                    التعاقد، كما يحق له الاعتراض على استخدام البيانات في الأغراض التسويقية.
                </p>

                <h3>سابعاً: التعديلات على سياسة الخصوصية</h3>
                <p>
                    تحتفظ الشركة بالحق في تعديل سياسة الخصوصية في أي وقت، وسيتم نشر التحديثات
                    على هذه الصفحة.
                </p>

                <hr>

                <h2>الأحكام والشروط</h2>

                <h3>أولاً: محل العقد</h3>
                <p>
                    بموجب هذا العقد يلتزم الطرف الأول (شركة الاستقدام) بإنهاء كافة الإجراءات
                    اللازمة لاستقدام العامل المنزلي المتفق عليه، وتوقيع عقد العمل في بلد
                    الاستقدام، ويجوز للشركة تفويض مكتب توظيف خارجي مع بقاء مسؤوليتها قائمة،
                    كما تلتزم بوصول العامل خلال مدة لا تتجاوز 90 يوم من تاريخ توقيع العقد.
                </p>

                <h3>ثانياً: الجوانب المالية</h3>
                <p>
                    يلتزم الطرف الثاني (العميل) بدفع تكاليف الاستقدام المتفق عليها عبر القنوات
                    الإلكترونية المعتمدة في منصة مساند أو الوسائل المعتمدة من وزارة الموارد
                    البشرية، ويعد العقد ساريًا من تاريخ توقيعه.
                </p>

                <h3>ثالثاً: مسؤوليات شركة الاستقدام</h3>
                <p>
                    تلتزم شركة الاستقدام بإشعار العميل قبل وصول العامل بـ 24 ساعة مع تزويده
                    ببيانات الرحلة وموعد الوصول، وإشعاره بوصول العامل خلال 24 ساعة، وتسليم
                    العامل للعميل خلال مدة لا تتجاوز 48 ساعة من وصوله للمملكة.
                </p>

                <h3>رابعاً: الاستبدال والاسترجاع</h3>
                <p>
                    يتم الاستبدال أو الاسترجاع وفقًا للائحة حقوق وواجبات العملاء المعتمدة في
                    منصة مساند ووزارة الموارد البشرية والتنمية الاجتماعية.
                </p>

                <h3>خامساً: إلغاء العقد</h3>
                <p>
                    في حال إلغاء العقد من قبل العميل أو الشركة يتم تطبيق سياسة الإلغاء
                    والاسترجاع حسب أنظمة مساند.
                </p>

                <h3>سادساً: النظام المطبق</h3>
                <p>
                    تخضع هذه الاتفاقية لأنظمة وقوانين المملكة العربية السعودية، وتكون
                    الجهات القضائية داخل المملكة هي المختصة في حال حدوث أي نزاع.
                </p>

                <p style="margin-top:40px; font-weight:bold;">
                    آخر تحديث: {{ date('Y-m-d') }}
                </p>

            </div>
        </div>

    </div>
</section>

@endsection
