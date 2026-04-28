<div class="container">
    <section class="app-download-section">
        <div class="row align-items-center">

            <div class="col-lg-6 order-lg-2">
                <div class="phones-wrapper">
                    <img src="frontend/img/mobile-app.webp" class="phone-img main-phone">
                    <img src="frontend/img/mobile-app2.webp" class="phone-img second-phone">
                </div>
            </div>

            <div class="col-lg-6 order-lg-1">
                <div class="download-content">
                    <h2>حمّل تطبيق شركة ايجاز</h2>
                    <p>
                        ابحث، قارن واحجز خدمات الاستقدام بسهولة مع أفضل الحلول المتاحة.
                        قدّم طلبك خلال دقائق وتابع خطواتك أولاً بأول بكل سهولة وراحة.
                    </p>

                    <div class="store-buttons">
                        <a href="https://apps.apple.com/eg/app/ejaz-%D8%A7%D9%8A%D8%AC%D8%A7%D8%B2/id6761459722" class="store-btn">
                            <span>App Store</span>
                            <img src="https://cdn-icons-png.flaticon.com/512/888/888841.png">
                        </a>

                        <a href="https://play.google.com/store/apps/details?id=com.app.ejaz" class="store-btn">
                            <span>Google Play</span>
                            <img src="https://cdn-icons-png.flaticon.com/512/888/888857.png">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<style>
.app-download-section{
    background:rgba(216,152,53,0.12);
    border-radius:22px;
    padding:5px 55px;
    margin:20px 0;
    overflow:hidden;
    position:relative;
}

.app-download-section::before{
    content:"";
    position:absolute;
    width:320px;
    height:320px;
    background:rgba(216,152,53,0.15);
    border-radius:50%;
    top:-100px;
    left:-100px;
    filter:blur(25px);
}

.download-content{
    text-align:right;
}

.download-content h2{
    color:#222;
    font-size:52px;
    font-weight:800;
    margin-bottom:20px;
}

.download-content p{
    color:#444;
    font-size:23px;
    line-height:2;
    margin-bottom:35px;
}

.store-buttons{
    display:flex;
    gap:18px;
    justify-content:flex-end;
    flex-wrap:wrap;

    margin-top:45px;
}

.store-btn{
    background:#fff;
    border-radius:12px;
    padding:14px 20px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:12px;
    text-decoration:none;
    width:220px;
    height:64px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.store-btn:hover{
    transform:translateY(-5px);
}

.store-btn img{
    width:28px;
    height:28px;
}

.store-btn span{
    color:#333;
    font-size:22px;
    font-weight:700;
}

.phones-wrapper{
    position:relative;
    min-height:470px;
    padding-bottom:60px;
}

.phone-img{
    max-width:250px;
    border-radius:35px;
    box-shadow:0 20px 40px rgba(0,0,0,.18);
}

.main-phone{
    position:absolute;
    left:40px;
    top:20px;
    z-index:2;
}

.second-phone{
    position:absolute;
    left:220px;
    top:70px;
    z-index:1;
}

@media(max-width:991px){

    .app-download-section{
        padding:45px 20px;
    }

    .download-content{
        text-align:center;
        margin-top:30px;
    }

    .download-content h2{
        font-size:34px;
    }

    .download-content p{
        font-size:18px;
        line-height:1.9;
    }

    .store-buttons{
        justify-content:center;
        flex-direction:column;
        align-items:center;
        gap:12px;
    }

    .store-btn{
        width:100%;
        max-width:260px;
    }

    .phones-wrapper{
        min-height:320px;
        padding-bottom:25px;
        margin-bottom:20px
    }

    .main-phone{
        position:absolute;
        left:50%;
        transform:translateX(-70%);
        top:0;
        max-width:160px;
    }

    .second-phone{
        position:absolute;
        left:50%;
        transform:translateX(5%);
        top:35px;
        max-width:160px;
    }
}
@media(min-width: 992px){

    .store-buttons{
        justify-content: flex-end;
        width: 100%;
    }
}
@media(min-width: 992px){

    .store-buttons{
        justify-content: flex-start;
        width: fit-content;
        margin-left: auto;
    }

    .download-content{
        text-align: right;
    }
}
</style>
