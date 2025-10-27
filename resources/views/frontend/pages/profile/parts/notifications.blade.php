@if(isset($notifications) && count($notifications) > 0)

    <div class="notifications" >
        <ul id="notifications_section_to_append">
           @include('frontend.pages.profile.parts.notifications-component')
        </ul>
    </div>
    <input type="hidden" value="{{$current_page}}" id="current_page_notifications">

    <div style="{{$last_page == $current_page ?"display:none!important":""}}" class="d-flex align-items-center justify-content-center py-5 row" >


        <button id="load_more_notifications_button" class="animatedLink">
                {{__('frontend.load more')}}
                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
         </button>

    </div>
@else
    <div class="d-flex align-items-center justify-content-center row">
        <img style="width: 500px;height: 500px ; object-fit: contain;" src="{{asset('frontend')}}/img/no-notifications.png" alt="no notification ">
    </div>
@endif
