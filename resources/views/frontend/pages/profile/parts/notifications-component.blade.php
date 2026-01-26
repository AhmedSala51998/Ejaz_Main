<div class="notification-wrapper">
    @foreach($notifications as $notification)
        <div class="notification-card">
            <div class="notification-icon">
                <i class="fas fa-bell"></i>
            </div>
            <div class="notification-body">
                <h4 class="notification-title">📢 إشعار جديد</h4>
                <p class="notification-desc">{{$notification->desc}}</p>
                <div class="notification-footer">
                    <span><i class="fas fa-calendar-alt me-1"></i> {{date("m/d/Y", strtotime($notification->created_at))}}</span>
                    <span><i class="far fa-clock me-1"></i> {{date("h:i A", strtotime($notification->created_at))}}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
<link rel="stylesheet" href="{{asset('frontend/css/notifications_component_style.css')}}" />
