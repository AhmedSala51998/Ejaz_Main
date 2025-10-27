<!-- زر إضافة طلب جديد -->
<a href="{{route('all-workers')}}" class="newOrderBtn d-inline-flex align-items-center gap-2 mb-4">
    <i class="fa-duotone fa-file-plus fa-xl"></i>
    <p class="mb-0 fw-bold">{{ __('frontend.New Recruitment Request') }}</p>
</a>

<!-- الطلبات الحالية -->
@if (isset($currentOrders) && count($currentOrders) > 0)
    <input type="hidden" value="{{$current_page}}" id="current_page_orders">

    <div class="row" id="current_orders_section_to_append">
        @include('frontend.pages.profile.parts.current_order_component')
    </div>

    <!-- زر تحميل المزيد -->
    <div style="{{ $currentOrders->currentPage() == $currentOrders->lastPage() ? 'display:none!important' : '' }}"
         class="d-flex align-items-center justify-content-center py-5">
        <button id="load_more_current_orders_button" class="loadMoreBtn">
            {{ __('frontend.load more') }}
            <i class="fa-regular fa-left-long ms-2"><span></span></i>
        </button>
    </div>
@else
    <!-- في حال عدم وجود طلبات -->
    <div class="d-flex align-items-center justify-content-center">
        <img src="{{ asset('frontend/img/no-order.png') }}"
             alt="no data for current orders"
             style="width: 500px; height: 500px; object-fit: contain;">
    </div>
@endif
<style>
    /* زر الطلب الجديد */
.newOrderBtn {
    background: #f4a835;
    color: #fff;
    padding: 12px 20px;
    border-radius: 12px;
    font-size: 16px;
    text-decoration: none;
    transition: 0.3s ease;
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
}
.newOrderBtn:hover {
    background-color: #e69e24;
    color: #fff;
    transform: translateY(-2px);
}

/* زر تحميل المزيد */
.loadMoreBtn {
    background: transparent;
    border: 2px solid #f4a835;
    color: #f4a835;
    padding: 10px 25px;
    font-weight: bold;
    border-radius: 30px;
    transition: 0.3s ease;
    font-size: 16px;
}
.loadMoreBtn:hover {
    background-color: #f4a835;
    color: #fff;
    transform: scale(1.03);
}

.newOrderBtn {
    display: inline-flex;
    justify-content: center; /* يوسّط النص والأيقونة أفقياً */
    align-items: center;
    gap: 10px;
    width: 100%;         /* يعرض كامل عرض الحاوية */
    max-width: 650px;    /* ممكن تحدد أقصى عرض حسب الرغبة */
    padding: 14px 30px;
    border-radius: 50px; /* لي شكل كير جدا */
    font-size: 18px;
    font-weight: 700;
    background: #f4a835;
    color: #fff;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(0,0,0,0.12);
    transition: 0.3s ease;
    user-select: none;
    margin-top:-10px

}
.newOrderBtn:hover {
    background-color: #e69e24;
    color: #fff;
    transform: translateY(-3px);
}


</style>
