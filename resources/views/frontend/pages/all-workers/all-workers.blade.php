@extends('frontend.layouts.layout')

@section('title')
    @php
        $title = match (true) {
            request()->routeIs('transferService') => 'نقل خدمات',
            request()->routeIs('services-single') => 'خدمات فردية',
            default => 'إرسال طلب',
        };
    @endphp
    {{ $title }}
@endsection

@section('styles')
 <link rel="stylesheet" href="{{asset('frontend/css/all_workers_style.css')}}" />
@endsection

@section('content')
<div class="banner">
    <h1>
        @if(isset($transfer)) طلب نقل خدمات
        @elseif(isset($rental)) خدمات فردية
        @else طلب استقدام
        @endif
    </h1>
    <ul>
        <li><a href="{{route('home')}}">الرئيسية</a></li>
        <li><a href="#" class="active">@if(isset($transfer)) نقل خدمات @elseif(isset($rental)) خدمات فردية @else استقدام @endif</a></li>
    </ul>
</div>

 <div id="mobileFilterSidebar" class="mobile-filter-sidebar d-lg-none">
    <div class="mobile-filter-header d-flex justify-content-between align-items-center mb-3 px-3 pt-3">
        <h5 class="fw-bold">فلترة متقدمة</h5>
        <button class="close-filter-btn" id="closeFilterBtn">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="side-bar px-3 pb-4">

        <form id="filterForm" action="{{ request()->routeIs('transferService') ? route('transferService') : (request()->routeIs('services-single') ? route('services-single') : route('all-workers')) }}" method="get">
            @csrf


            @if(count($nationalities) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#nationalityFilter">

                        <span>{{__('frontend.Nationality')}}</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="nationalityFilter" class="collapse show">
                        @foreach($nationalities as $key=> $nationalitie)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="nationality" id="nationality1{{$key+1}}" value="{{$nationalitie->id}}">
                                <label class="form-check-label" for="nationality1{{$key+1}}">{{trans($nationalitie->title)}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif


            @if(count($jobs) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#jobFilter">
                        <span>{{__('frontend.Job')}}</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="jobFilter" class="collapse show">
                        @foreach($jobs as $key=> $job)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="job" id="job1{{$key+1}}" value="{{$job->id}}">
                                <label class="form-check-label" for="job1{{$key+1}}">{{trans($job->title)}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(count($ages) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#ageFilter">
                         <span>العمر</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="ageFilter" class="collapse show">
                        @foreach($ages as $key=>$age)
                            <div class="form-check">
                                <input class="form-check-input" value="{{$age->id}}" type="radio" name="age" id="age1{{$key+1}}">
                                <label class="form-check-label" for="age1{{$key+1}}"> من {{$age->from}} إلى {{$age->to}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif


            @if(count($religions) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#religionFilter">
                         <span>الديانة</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="religionFilter" class="collapse show">
                        @foreach($religions as $key => $religion)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="religion" id="religion1{{$key+1}}" value="{{ $religion->id }}">
                                <label class="form-check-label" for="religion1{{$key+1}}">{{ trans($religion->title) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif


            @if(count($social_types) > 0)
                <div class="mb-4">
                    <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#socialFilter">
                         <span>الحالة الاجتماعية</span>
                        <span class="toggle-icon ms-auto">−</span>
                    </button>
                    <div id="socialFilter" class="collapse show">
                        @foreach($social_types as $key => $social)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="social" id="social1{{$key+1}}" value="{{ $social->id }}">
                                <label class="form-check-label" for="social1{{$key+1}}">{{ trans($social->title) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif


            @if(!isset($transfer) && !isset($rental))
            <div class="mb-4">
                <button class="accordionButton d-flex justify-content-between align-items-center w-100" type="button" data-bs-toggle="collapse" data-bs-target="#experienceFilter">
                     <span>الخبرة العملية</span>
                        <span class="toggle-icon ms-auto">−</span>
                </button>
                <div id="experienceFilter" class="collapse show">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_of_experience" id="exp11" value="new">
                        <label class="form-check-label" for="exp11">قادم جديد</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type_of_experience" id="exp21" value="with_experience">
                        <label class="form-check-label" for="exp21">لديه خبرة سابقة</label>
                    </div>
                </div>
            </div>
            @endif


            <div class="d-flex justify-content-between">
                <button class="btn clear resetFilterBtn" type="button" style="display:none;">
                    مسح
                </button>
                <button class="btn confirm searchWorkerBtn" type="submit">
                    تأكيد
                </button>
            </div>
        </form>

    </div>
</div>

{{-- Desktop Horizontal Filter --}}
<div class="container-fluid d-none d-lg-block mb-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="filter-wrapper">
            <form id="desktopFilterForm" class="horizontal-filter" method="get"
                action="{{ request()->routeIs('transferService') ? route('transferService') : (request()->routeIs('services-single') ? route('services-single') : route('all-workers')) }}">

                <div class="row g-3 align-items-end">

                    {{-- Nationality --}}
                    <div class="col">
                        <label class="filter-label">الجنسية</label>
                        <div class="select-wrapper">
                            <select name="nationality" class="form-select">
                                <option value="">الكل</option>
                                @foreach($nationalities as $n)
                                    <option value="{{ $n->id }}"
                                        {{ request('nationality') == $n->id ? 'selected' : '' }}>
                                        {{ trans($n->title) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Job --}}
                    <div class="col">
                        <label class="filter-label">المهنة</label>
                        <div class="select-wrapper">
                            <select name="job" class="form-select">
                                <option value="">الكل</option>
                                @foreach($jobs as $j)
                                    <option value="{{ $j->id }}"
                                        {{ request('job') == $j->id ? 'selected' : '' }}>
                                        {{ trans($j->title) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Age --}}
                    <div class="col">
                        <label class="filter-label">العمر</label>
                        <div class="select-wrapper">
                            <select name="age" class="form-select">
                                <option value="">الكل</option>
                                @foreach($ages as $age)
                                    <option value="{{ $age->id }}"
                                        {{ request('age') == $age->id ? 'selected' : '' }}>
                                        من {{ $age->from }} إلى {{ $age->to }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Religion --}}
                    <div class="col">
                        <label class="filter-label">الديانة</label>
                        <div class="select-wrapper">
                            <select name="religion" class="form-select">
                                <option value="">الكل</option>
                                @foreach($religions as $r)
                                    <option value="{{ $r->id }}"
                                        {{ request('religion') == $r->id ? 'selected' : '' }}>
                                        {{ trans($r->title) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Social --}}
                    <div class="col">
                        <label class="filter-label">الحالة الاجتماعية</label>
                        <div class="select-wrapper">
                            <select name="social" class="form-select">
                                <option value="">الكل</option>
                                @foreach($social_types as $s)
                                    <option value="{{ $s->id }}"
                                        {{ request('social') == $s->id ? 'selected' : '' }}>
                                        {{ trans($s->title) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Experience --}}
                    @if(!isset($transfer) && !isset($rental))
                    <div class="col">
                        <label class="filter-label">الخبرة</label>
                        <div class="select-wrapper">
                            <select name="type_of_experience" class="form-select">
                                <option value="">الكل</option>
                                <option value="new"
                                    {{ request('type_of_experience') == 'new' ? 'selected' : '' }}>
                                    قادم جديد
                                </option>
                                <option value="with_experience"
                                    {{ request('type_of_experience') == 'with_experience' ? 'selected' : '' }}>
                                    خبرة سابقة
                                </option>
                            </select>
                        </div>
                    </div>
                    @endif

                    {{-- Buttons --}}
                    <div class="col-auto">
                        <button type="submit" class="btn btn-confirm btn-filter">
                            تأكيد
                        </button>
                    </div>

                    <div class="col-auto">
                        <button type="button" class="btn btn-clear btn-filter" id="desktopReset">
                            مسح
                        </button>
                    </div>

                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<section class="workers-section">
    <div class="container-fluid">

        <div class="d-block d-lg-none px-3 mb-3">
            <button class="btn w-100 text-white fw-bold py-3" id="openFilterBtn"
                style="border-radius: 20px; background-color: #f4a835; font-size: 16px; box-shadow: 0 8px 18px rgba(244, 168, 53, 0.4);">
                <i class="fa fa-sliders-h me-2"></i> فلترة النتائج
            </button>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="workers-list" id="hereWillDisplayAllWorker">
                    @include('frontend.pages.all-workers.worker.workers_page', ['cvs' => $cvs])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js')

<script>
    var loader_html = `
        <div class="col-sm-6 col-md-6 col-lg-4 p-2 loader_html">
            <div class="wrapper">
                <div class="wrapper-cell row">
                    <div class="col-12"><div class="image"></div></div>
                    <div class="col-12">
                        <div class="text">
                            <div class="text-line"></div>
                            <div class="text-line price"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `.repeat(6);

    var new_page = 1;

    @php
        $ajaxUrl = route('all-workers');
        if (request()->routeIs('transferService')) {
            $ajaxUrl = route('transferService');
        } elseif (request()->routeIs('services-single')) {
            $ajaxUrl = route('services-single');
        }
    @endphp

    var link_only = '{{ $ajaxUrl }}';

    var urlSegments = window.location.pathname.split('/').filter(s => s.length > 0);
    var nationalityIdFromUrl = urlSegments[1] || '';

    function getNationalityFromUrl() {
        const segments = window.location.pathname.split('/').filter(Boolean);
        return segments.length > 1 ? segments[segments.length - 1] : '';
    }

    $(document).ready(function () {
        const nationalityFromUrl = getNationalityFromUrl();

        if (nationalityFromUrl) {

            // Desktop select
            $('select[name="nationality"]').val(nationalityFromUrl);

            // Mobile & sidebar radios
            $('input[name="nationality"][value="' + nationalityFromUrl + '"]').prop('checked', true);
        }
    });

    function getFilters() {
        const nationalityFromUrl = getNationalityFromUrl();

        return {
            age: $('input[name="age"]:checked, select[name="age"]').val() || '',
            job: $('input[name="job"]:checked, select[name="job"]').val() || '',
            nationality:
                $('input[name="nationality"]:checked, select[name="nationality"]').val()
                || nationalityFromUrl
                || '',
            religion: $('input[name="religion"]:checked, select[name="religion"]').val() || '',
            social: $('input[name="social"]:checked, select[name="social"]').val() || '',
            type_of_experience: $('input[name="type_of_experience"]:checked, select[name="type_of_experience"]').val() || ''
        };
    }

    function buildUrl(page) {
        const filters = getFilters();
        let nationalityId = filters.nationality || nationalityIdFromUrl || '';
        return link_only + "?page=" + page +
            "&age=" + filters.age +
            "&job=" + filters.job +
            "&nationality=" + nationalityId +
            "&religion=" + filters.religion +
            "&social=" + filters.social +
            "&type_of_experience=" + filters.type_of_experience;
    }

    function loadWorkers(page = 1) {
        $.ajax({
            url: buildUrl(page),
            type: 'GET',
            beforeSend: function () {
                $("#hereWillDisplayAllWorker").html(loader_html);
                $('.searchWorkerBtn').attr('disabled', true).html(`<i class='fa fa-spinner fa-spin'></i>`);
            },
            success: function (data) {
                setTimeout(() => {
                    $("#hereWillDisplayAllWorker").html(data.html);
                    $('.searchWorkerBtn').attr('disabled', false).html(`تأكيد`);
                    if (data.last_page == data.current_page) {
                        $("#load_more_button").remove();
                    } else {
                        $("#buttonOfFilter").html(`
                            <button id="load_more_button" class="animatedLink" type="button">
                                {{ __('frontend.load more') }}
                                <i class="fa-regular fa-left-long ms-2"><span></span></i>
                            </button>`);
                    }
                }, 500);
            },
            error: function () {
                $('.searchWorkerBtn').attr('disabled', false).html(`تأكيد`);
            }
        });
    }

    $(document).ready(function () {
        checkResetButtonVisibility();


        $(document).on('change', 'input[name="age"], input[name="job"], input[name="nationality"], input[name="religion"], input[name="social"], input[name="type_of_experience"]', function () {
            checkResetButtonVisibility();
        });


        $(document).on('click', '.searchWorkerBtn', function (e) {
            e.preventDefault();
            new_page = 1;
            loadWorkers(new_page);
        });


        $(document).on('click', '#load_more_button', function (e) {
            e.preventDefault();
            ++new_page;
            loadMoreData(new_page);
        });

        function loadMoreData(page) {
            $.ajax({
                url: buildUrl(page),
                type: 'GET',
                beforeSend: function () {
                    $('#hereWillDisplayAllWorker').append(loader_html);
                    $('#load_more_button').html(`<div class="spinner-border mt-1 mb-2" role="status"></div>`);
                },
                success: function (data) {
                    setTimeout(() => {
                        $(".loader_html").remove();
                        $('#hereWillDisplayAllWorker').append(data.html);
                        $('#load_more_button').html("{{ __('frontend.load more') }}");
                        if (data.last_page == data.current_page) {
                            $("#load_more_button").remove();
                        }
                    }, 300);
                },
                error: function () {
                    alert('حدث خطأ أثناء تحميل المزيد.');
                }
            });
        }


        $(document).on('click', '.resetFilterBtn', function (e) {
            e.preventDefault();
            const btn = $(this);
            btn.html(`<i class='fa fa-spinner fa-spin'></i>`);

            $('input[name="age"], input[name="job"], input[name="nationality"], input[name="religion"], input[name="social"], input[name="type_of_experience"]').prop('checked', false);

            setTimeout(() => {
                btn.html(`مسح`);
                checkResetButtonVisibility();
                $('.searchWorkerBtn').trigger('click');
            }, 300);
        });

        function checkResetButtonVisibility() {
            const filters = getFilters();
            const hasAnyFilter = Object.values(filters).some(value => value !== '');
            if (hasAnyFilter) {
                $('.resetFilterBtn').show();
            } else {
                $('.resetFilterBtn').hide();
            }
        }


        $('#openFilterBtn').click(function () {
            $('#mobileFilterSidebar').addClass('active');
            $('body').css('overflow', 'hidden');
        });

        $('#closeFilterBtn').click(function () {
            $('#mobileFilterSidebar').removeClass('active');
            $('body').css('overflow', 'auto');
        });

        $(document).on('click', '.mobile-filter-overlay', function () {
            $('#mobileFilterSidebar').removeClass('active');
            $(this).removeClass('active');
        });


        $('label').click(function() {
            var forAttr = $(this).attr('for');
            if (forAttr) {
                $('#' + forAttr).prop('checked', true).trigger('change');
            }
        });

    });

    $('label').on('click', function(e) {
        var forId = $(this).attr('for');
        if (forId) {
            e.preventDefault();
            var radioInput = $('#' + forId);
            if (radioInput.length) {
                radioInput.prop('checked', true).trigger('change');
            }
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const updateIcons = () => {
        document.querySelectorAll('.accordionButton').forEach(button => {
            const targetId = button.getAttribute('data-bs-target');
            const collapseEl = document.querySelector(targetId);
            const icon = button.querySelector('.toggle-icon');

            if (collapseEl && icon) {
                if (collapseEl.classList.contains('show')) {
                    icon.textContent = '−';
                } else {
                    icon.textContent = '+';
                }
            }
        });
    };


    updateIcons();


    document.querySelectorAll('.collapse').forEach(collapse => {
        collapse.addEventListener('shown.bs.collapse', updateIcons);
        collapse.addEventListener('hidden.bs.collapse', updateIcons);
    });
});

$('#desktopReset').on('click', function () {
    $('#desktopFilterForm select').val('');
    $('.searchWorkerBtn').trigger('click');
});
document.querySelectorAll('.select-wrapper select').forEach(select => {
    select.addEventListener('focus', () => {
        select.parentElement.classList.add('open');
    });
    select.addEventListener('blur', () => {
        select.parentElement.classList.remove('open');
    });
});

</script>



@endsection
