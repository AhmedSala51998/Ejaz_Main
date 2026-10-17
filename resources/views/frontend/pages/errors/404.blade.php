@extends('frontend.layouts.layout')

@section('title')
    @if (!empty($countryTemporarilyUnavailable))
        الاستقدام من {{ $countryNameAr }} متوقف مؤقتًا | إيجاز للاستقدام
    @else
        الصفحة غير موجودة | إيجاز للاستقدام
    @endif
@endsection

@section('meta_description')
    @if (!empty($countryTemporarilyUnavailable))
        الاستقدام من {{ $countryNameAr }} غير متاح حاليًا لدى شركة إيجاز للاستقدام.
        يمكنك تصفح العمالة المتاحة من الدول الأخرى.
    @else
        الصفحة المطلوبة غير متاحة. تصفح العمالة ودول الاستقدام المتاحة لدى شركة إيجاز للاستقدام.
    @endif
@endsection

@section('styles')
    <style>
        .ejaz-error-page {
            min-height: 65vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 70px 20px;
            direction: rtl;
            background:
                radial-gradient(circle at top right, #ffe7c2, transparent 50%),
                #fffaf3;
        }

        .ejaz-error-card {
            width: 100%;
            max-width: 640px;
            padding: 50px 30px;
            text-align: center;
            background: #fff;
            border: 1px solid #fbe4c3;
            border-radius: 28px;
            box-shadow: 0 20px 65px rgba(160, 100, 20, 0.09);
        }

        .ejaz-error-code {
            margin-bottom: 20px;
            color: #f4a835;
            font-size: clamp(100px, 20vw, 160px);
            font-weight: 900;
            line-height: 1;
            direction: ltr;
            letter-spacing: 6px;
        }

        .ejaz-error-card h1 {
            margin: 0 0 16px;
            color: #333;
            font-size: clamp(24px, 5vw, 34px);
            font-weight: 700;
        }

        .ejaz-error-card p {
            max-width: 450px;
            margin: 0 auto;
            color: #666;
            font-size: 17px;
            line-height: 1.9;
        }

        .ejaz-error-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
        }

        .ejaz-error-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 48px;
            padding: 12px 24px;
            border: 1px solid #f4a835;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s;
        }

        .ejaz-error-button-primary {
            color: #382400;
            background: #f4a835;
        }

        .ejaz-error-button-primary:hover {
            color: #382400;
            background: #e99a25;
            transform: translateY(-2px);
        }

        .ejaz-error-button-secondary {
            color: #885409;
            background: #fff;
        }

        .ejaz-error-button-secondary:hover {
            color: #885409;
            background: #fff4e4;
            transform: translateY(-2px);
        }

        .ejaz-error-button:focus-visible {
            outline: 3px solid #885409;
            outline-offset: 4px;
        }

        @media (max-width: 480px) {
            .ejaz-error-page {
                padding: 40px 15px;
            }

            .ejaz-error-card {
                padding: 36px 20px;
            }

            .ejaz-error-actions {
                flex-direction: column;
            }

            .ejaz-error-button {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <section class="ejaz-error-page" aria-labelledby="error-page-title">
        <div class="ejaz-error-card">
            @if (!empty($countryTemporarilyUnavailable))
                <div class="ejaz-error-code" aria-hidden="true">
                    <i class="fa fa-clock-o"></i>
                </div>

                <h1 id="error-page-title">
                    الاستقدام من {{ $countryNameAr }} متوقف مؤقتًا
                </h1>

                <p>
                    خدمة الاستقدام من هذه الدولة غير متاحة حاليًا.
                    عند إعادة تفعيلها، ستظهر العمالة المتاحة تلقائيًا عند زيارة
                    هذه الصفحة مجددًا أو تحديثها.
                    يمكنك الآن تصفّح العمالة من الدول الأخرى.
                </p>
            @else
                <div class="ejaz-error-code" aria-hidden="true">404</div>

                <h1 id="error-page-title">الصفحة غير موجودة</h1>

                <p>
                    عذرًا، الصفحة التي تبحث عنها غير موجودة أو تم تغيير رابطها.
                    يمكنك العودة للرئيسية أو تصفّح العمالة المتاحة.
                </p>
            @endif

            <div class="ejaz-error-actions">
                <a href="{{ route('home') }}"
                   class="ejaz-error-button ejaz-error-button-primary">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    العودة للرئيسية
                </a>

                <a href="{{ url('/all-workers') }}"
                   class="ejaz-error-button ejaz-error-button-secondary">
                    تصفّح العمالة المتاحة
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
