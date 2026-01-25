<a href="{{route('all-workers')}}" class="newOrderBtn">
    <i class="fa fa-file-plus fa-xl"></i>
    <p class="mb-0 fw-bold">{{ __('frontend.New Recruitment Request') }}</p>
</a>

@if (isset($currentOrders) && count($currentOrders) > 0)
    <input type="hidden" value="{{$current_page}}" id="current_page_orders">

    <div class="row" id="current_orders_section_to_append">
        @include('frontend.pages.profile.parts.current_order_component')
    </div>

    <div style="{{ $currentOrders->currentPage() == $currentOrders->lastPage() ? 'display:none!important' : '' }}"
         class="d-flex align-items-center justify-content-center py-5">
        <button id="load_more_current_orders_button" class="loadMoreBtn">
            {{ __('frontend.load more') }}
            <i class="fa fa-left-long ms-2"><span></span></i>
        </button>
    </div>
@else
    <div class="d-flex align-items-center justify-content-center">
        <img src="{{ asset('frontend/img/no-order.png') }}"
             alt="no data for current orders"
             style="width: 500px; height: 500px; object-fit: contain;">
    </div>
@endif
