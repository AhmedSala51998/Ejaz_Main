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


<style>
.notification-wrapper {
    padding: 20px;
}

.notification-card {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    background: rgba(255, 255, 255, 0.06);
    backdrop-filter: blur(18px);
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    animation: slideFade 0.5s ease-in-out forwards;
    transform: translateY(20px);
    opacity: 0;
    width: 100%;
    max-width: 100%;
    transition: all 0.3s ease-in-out;
}

.notification-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(244, 168, 53, 0.3);
}

@keyframes slideFade {
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.notification-icon {
    background: linear-gradient(135deg, #f4a835, #ffcc70);
    width: 70px;
    height: 70px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 15px #f4a83588;
    font-size: 30px;
    color: white;
    flex-shrink: 0;
}

.notification-body {
    flex: 1;
}

.notification-title {
    font-size: 22px;
    font-weight: 700;
    color: #f4a835;
    margin-bottom: 15px;
}

.notification-desc {
    font-size: 17px;
    color: #000;
    line-height: 1.8;
    margin-bottom: 20px;
}

.notification-footer {
    display: flex;
    justify-content: flex-start;
    gap: 20px;
    color: #ccc;
    font-size: 15px;
    flex-wrap: wrap;
}


</style>