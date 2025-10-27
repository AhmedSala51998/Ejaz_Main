@if (isset($ordersHistory) && count($ordersHistory) > 0)
    <input type="hidden" value="{{$current_page}}" id="history_page_orders">

    <div class="row" id="history_orders_section_to_append">
        @include('frontend.pages.profile.parts.history_order_component')
    </div>

    <div style="{{$ordersHistory->currentPage() == $ordersHistory->lastPage() ?"display:none!important":""}}" class="d-flex align-items-center justify-content-center py-5 row" >


        <button id="load_more_history_orders_button" class="animatedLinkk loadMoreBtn">
                {{__('frontend.load more')}}
                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
        </button>

    </div>



@else
    <div class="d-flex align-items-center justify-content-center row">
        <img style="width: 500px;height: 500px ; object-fit: contain;" src="{{asset('frontend/img/no-order.png')}}" alt="no data for current orders">
    </div>
@endif
<style>
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
</style>
