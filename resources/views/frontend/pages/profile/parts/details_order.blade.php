@extends('frontend.layouts.layout')
@section('title')
    {{__('frontend.profile')}}
@endsection
@section('styles')
<style>
body, html {
  background: #FFF; /* Lighter, modern background */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
  scroll-behavior: smooth;
  line-height: 1.6; /* Improved readability */
}

/* User Header Styling */
.userHeader {
  background: linear-gradient(135deg, #ff8c00, #ffc870); /* Vibrant orange gradient */
  border-radius: 15px !important; /* More pronounced rounded corners */
  padding: 35px 50px; /* Increased padding */
  color: #fff !important; /* White text for better contrast */
  box-shadow: 0 15px 40px rgba(255,140,0,0.25); /* Deeper, more noticeable shadow */
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight:bold !important;
  margin-bottom: 50px; /* More space below header */
  flex-wrap: wrap;
  position: relative;
  overflow: hidden;
  animation: slideInDown 0.8s ease-out forwards; /* Initial animation */
}

.userHeader::before { /* More refined background pattern */
  content: '';
  position: absolute;
  top: -20px;
  right: -20px;
  width: 120px;
  height: 120px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  filter: blur(15px);
  pointer-events: none;
  animation: float 6s ease-in-out infinite alternate;
}
.userHeader::after { /* Another subtle background pattern */
  content: '';
  position: absolute;
  bottom: -30px;
  left: -30px;
  width: 100px;
  height: 100px;
  background: rgba(255, 255, 255, 0.08);
  border-radius: 50%;
  filter: blur(10px);
  pointer-events: none;
  animation: float 7s ease-in-out infinite alternate-reverse;
}

.userInfo {
  z-index: 1; /* Ensure text is above pseudo-elements */
  display: flex; /* Flexbox for user info to align name and phone */
  flex-direction: column;
  order: 1; /* Default order for user info (right side in LTR) */
  margin-left: auto;
}
.userInfo h3 {
  font-size: 36px; /* Even larger font size for name */
  font-weight: 900; /* Ultra bold */
  margin-bottom: 8px; /* Reduced margin for tighter look */
  letter-spacing: 0.8px;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
}
.userInfo p {
  margin: 0;
  font-size: 19px;
  opacity: 0.95;
  font-weight: 500;
  text-shadow: 0.5px 0.5px 2px rgba(0,0,0,0.05);
}
.userHeader .control {
  order: 2; /* Logout icon on the left */
  /* Pushes the logout icon to the left */
}
.userHeader .control a {
  color: #fff;
  font-size: 28px; /* Larger, more prominent icon */
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); /* Smoother animation */
  background-color: rgba(255, 255, 255, 0.2); /* Lighter, more subtle background */
  border-radius: 50%;
  width: 55px; /* Larger click area */
  height: 55px; /* Larger click area */
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.userHeader .control a:hover {
  transform: scale(1.18) rotate(8deg); /* More dynamic hover */
  background-color: rgba(255, 255, 255, 0.35); /* More opaque on hover */
  box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

/* --- routeNav --- */
.routeNav {
  margin: 35px 0 30px 0;
  background: #fff; /* White background for a cleaner look */
  border-radius: 35px; /* More rounded */
  padding: 15px 30px; /* Increased padding */
  box-shadow: 0 8px 25px rgba(0,0,0,0.08); /* Softer, broader shadow */
  display: flex;
  align-items: center;
  gap: 25px; /* Increased gap */
  animation: fadeIn 1s ease forwards;
}

.routeNav .Back {
  background: #ff8c00; /* Consistent primary color */
  border: none;
  padding: 10px 18px; /* Larger button */
  border-radius: 50%;
  color: white;
  font-size: 24px; /* Larger icon */
  cursor: pointer;
  box-shadow: 0 6px 15px rgba(255,140,0,0.4);
  transition: all 0.3s ease-in-out;
}
.routeNav .Back:hover {
  background: #e67e00; /* Darker orange on hover */
  transform: translateY(-2px); /* Slight lift */
  box-shadow: 0 8px 20px rgba(255,140,0,0.6);
}

.routeNav .Back i{
 font-size:20px
}

.routeNav ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  gap: 30px; /* Increased gap for menu items */
  font-weight: 600;
  font-size: 19px; /* Slightly larger font */
}

.routeNav ul li a {
  color: #ff8c00;
  text-decoration: none;
  padding: 8px 18px; /* Larger clickable area */
  border-radius: 35px;
  transition: all 0.3s ease;
}

.routeNav ul li a.active,
.routeNav ul li a:hover {
  background: #ff8c00;
  color: white;
  box-shadow: 0 6px 18px rgba(255,140,0,0.6);
  transform: translateY(-2px);
}

/* --- status (Tracking Timeline) --- */
.status {
  margin-bottom: 40px;
  padding: 25px 20px; /* More padding */
  background: #fff; /* White background for the card */
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08); /* Softer shadow */
  position: relative;
  overflow: hidden; /* To contain pseudo-elements if any */
}

.status ol {
  display: flex;
  justify-content: space-between;
  padding: 0;
  margin: 0;
  list-style: none;
  font-weight: 600;
  font-size: 15px; /* Slightly larger font */
  color: #aaa; /* Softer gray for inactive steps */
  user-select: none;
  position: relative;
  z-index: 1; /* Ensure steps are above the line */
}

.status ol::before { /* Progress line */
  content: '';
  position: absolute;
  top: 35px; /* Adjust based on li::before position */
  left: 10%; /* Start after the first circle */
  right: 10%; /* End before the last circle */
  height: 4px;
  background: #eee; /* Light gray for incomplete line */
  z-index: 0;
  border-radius: 2px;
}

.status ol li {
  position: relative;
  width: calc(100% / 7); /* Distribute evenly */
  text-align: center;
  padding-top: 40px; /* Space for the circle above */
  padding-bottom: 10px; /* Space for text below */
  transition: color 0.4s ease;
  flex-shrink: 0; /* Prevent shrinking on smaller screens */
}

.status ol li.completed {
  color: #ff8c00; /* Vibrant orange for completed steps */
  font-weight: 700;
}

.status ol li::before { /* Step circle */
  content: ""; /* Default empty content */
  position: absolute;
  top: 0; /* Position at the top of the padding-top */
  left: 50%;
  transform: translateX(-50%);
  background: #ddd; /* Light gray for incomplete circles */
  color: white;
  width: 30px; /* Larger circle */
  height: 30px; /* Larger circle */
  font-size: 18px; /* Larger tick */
  border-radius: 50%;
  line-height: 30px; /* Vertically center tick */
  display: flex; /* For centering the checkmark */
  align-items: center;
  justify-content: center;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  transition: all 0.4s ease;
  border: 2px solid #ddd; /* Border for circles */
}

.status ol li.completed::before {
  content: "✓"; /* Checkmark for completed */
  background: #ff8c00; /* Orange for completed circles */
  border-color: #ff8c00;
  box-shadow: 0 4px 12px rgba(255,140,0,0.5);
}

.status ol li.active-step::before { /* Current active step - if you want to highlight it */
    background: #ffa500; /* A slightly different shade of orange */
    border-color: #ffa500;
    box-shadow: 0 5px 15px rgba(255,165,0,0.6);
    animation: pulseActive 1.5s infinite alternate;
}

/* Connect the lines */
.status ol li:not(:last-child)::after {
  content: '';
  position: absolute;
  top: 15px; /* Aligns with the center of the circle */
  left: 50%;
  width: calc(100% - 30px); /* Adjust width to connect circles accurately */
  height: 4px;
  background: #eee;
  z-index: -1;
  transform: translateX(-50%);
  border-radius: 2px;
  transition: background 0.4s ease;
}

.status ol li.completed:not(:last-child)::after {
  background: linear-gradient(to right, #ff8c00, #ffc870); /* Gradient for completed line segments */
}


/* --- order (Card Style) --- */
.order {
  background: white;
  padding: 30px 35px; /* More padding */
  border-radius: 20px; /* Consistent rounded corners */
  box-shadow: 0 15px 40px rgba(0,0,0,0.08); /* Deeper, softer shadow */
  animation: fadeInUp 1s ease forwards;
  margin-bottom: 40px; /* Space below the order card */
}

.order .swiper {
  border-radius: 18px; /* Slightly more rounded */
  overflow: hidden;
  box-shadow: 0 8px 25px rgba(0,0,0,0.15); /* Softer shadow for slider */
}

.order .swiper-slide img {
  width: 100%;
  height: 250px; /* Fixed height for consistency */
  object-fit: cover;
  border-radius: 15px; /* Rounded corners for images */
  transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
  cursor: pointer;
}

.order .swiper-slide img:hover {
  transform: scale(1.08); /* More noticeable zoom */
}

/* --- info list --- */
.info {
  list-style: none;
  padding: 0;
  margin: 0;
}

.info li {
  margin-bottom: 22px; /* Increased margin for better spacing */
  display: flex; /* Align items */
  align-items: flex-start;
  gap: 10px;
}

.info h6 {
  font-weight: 700;
  font-size: 17px; /* Slightly larger */
  color: #ff8c00; /* Consistent primary color */
  margin-bottom: 0; /* Remove default margin */
  flex-shrink: 0; /* Prevent shrinking */
  width: 120px; /* Fixed width for labels */
}

.info p {
  font-size: 16px; /* Slightly larger */
  color: #555;
  margin: 0;
  flex-grow: 1; /* Allow text to take remaining space */
}

/* --- selectedCustomerInfo (Card Style) --- */
.selectedCustomerInfo {
  margin-top: 30px;
  padding: 25px 30px; /* More padding */
  background: #fff; /* White background for the card */
  border-radius: 20px;
  box-shadow: 0 12px 35px rgba(0,0,0,0.1); /* Softer, broader shadow */
}

.selectedCustomerInfo .info {
  display: flex;
  align-items: center;
  gap: 20px; /* Increased gap */
  margin-bottom: 25px; /* More space below contact person info */
}

.selectedCustomerInfo .info img {
  width: 70px; /* Larger avatar */
  border-radius: 15px; /* Consistent rounded corners */
  box-shadow: 0 6px 18px rgba(0,0,0,0.15);
  transition: transform 0.3s ease;
}

.selectedCustomerInfo .info img:hover {
  transform: scale(1.15) rotate(-3deg); /* More dynamic hover */
}

.selectedCustomerInfo .text h5 {
  font-weight: 800; /* Bolder name */
  font-size: 22px; /* Larger name */
  color: #ff8c00; /* Consistent primary color */
  margin: 0;
}

.selectedCustomerInfo .text p {
  font-size: 15px;
  color: #777;
  margin: 0;
}

/* --- contact links --- */
.contact {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 12px; /* Slightly larger gap */
  font-weight: 600;
  color: #ff8c00; /* Consistent primary color */
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  padding: 10px 0; /* Add some padding for click area */
}

.contact i {
  font-size: 24px; /* Larger icons */
  min-width: 24px; /* Ensure icon doesn't shrink */
}

.contact p {
  margin: 0;
  font-size: 16px; /* Slightly larger text */
}

.contact:hover {
  color: #e67e00; /* Darker orange on hover */
  transform: translateX(5px); /* Slight movement on hover */
}

/* --- selectedCustomer (Delivery Time) --- */
.selectedCustomer {
  margin-top: 35px; /* More space above */
  font-weight: 700;
  font-size: 18px; /* Larger font */
  color: #333; /* Darker text for importance */
  text-align: center;
  background: #fffbe6; /* Light yellow/orange background for highlight */
  padding: 15px 20px;
  border-radius: 15px;
  border: 1px solid #ffe0b3; /* Subtle border */
  animation: pulse 2.5s infinite;
}
.selectedCustomer h6 span {
    color: #ff8c00; /* Highlight the number of days */
    font-weight: 900;
    font-size: 20px;
    display: inline-block;
    margin: 0 5px;
}


@keyframes slideInDown {
  0% {opacity: 0; transform: translateY(-50px);}
  100% {opacity: 1; transform: translateY(0);}
}

@keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
}

@keyframes fadeInUp {
  0% {opacity: 0; transform: translateY(30px);}
  100% {opacity: 1; transform: translateY(0);}
}

@keyframes pulse {
  0%, 100% {transform: scale(1); opacity: 1;}
  50% {transform: scale(1.02); opacity: 0.9;}
}
@keyframes pulseActive { /* Specific pulse for active status */
  0%, 100% {box-shadow: 0 5px 15px rgba(255,165,0,0.6);}
  50% {box-shadow: 0 8px 25px rgba(255,165,0,0.8);}
}
@keyframes float {
  0% { transform: translateY(0px) rotate(0deg); }
  100% { transform: translateY(-10px) rotate(5deg); }
}


/****************** */
/* --- status (Tracking Timeline) --- */
.status {
    margin-bottom: 40px;
    padding: 25px 20px; /* More padding */
    background: #fff; /* White background for the card */
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08); /* Softer shadow */
    position: relative;
    overflow: hidden; /* To contain pseudo-elements if any */
}

.status ol {
    display: flex;
    justify-content: space-between;
    padding: 0;
    margin: 0;
    list-style: none;
    font-weight: 600;
    font-size: 15px; /* Slightly larger font */
    color: #aaa; /* Softer gray for inactive steps */
    user-select: none;
    position: relative;
    z-index: 1; /* Ensure steps are above the line */
}

.status ol::before { /* Progress line */
    content: '';
    position: absolute;
    top: 35px; /* Adjust based on li::before position */
    left: 10%; /* Start after the first circle */
    right: 10%; /* End before the last circle */
    height: 4px;
    background: #eee; /* Light gray for incomplete line */
    z-index: 0;
    border-radius: 2px;
}

.status ol li {
    position: relative;
    width: calc(100% / 7); /* Distribute evenly */
    text-align: center;
    padding-top: 40px; /* Space for the circle above */
    padding-bottom: 10px; /* Space for text below */
    transition: color 0.4s ease, transform 0.3s ease-out, box-shadow 0.3s ease-out; /* Added transform and box-shadow */
    flex-shrink: 0; /* Prevent shrinking on smaller screens */
    cursor: pointer; /* Indicate interactivity */
}

.status ol li:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    color: #ff8c00; /* Highlight text on hover */
    /* box-shadow: 0 8px 20px rgba(255,140,0,0.2); Remove this, as the circle will have its own shadow */
}

.status ol li.completed {
    color: #ff8c00; /* Vibrant orange for completed steps */
    font-weight: 700;
}

.status ol li::before { /* Step circle */
    content: ""; /* Default empty content */
    position: absolute;
    top: 0; /* Position at the top of the padding-top */
    left: 50%;
    transform: translateX(-50%);
    background: #ddd; /* Light gray for incomplete circles */
    color: white;
    width: 30px; /* Larger circle */
    height: 30px; /* Larger circle */
    font-size: 18px; /* Larger tick */
    border-radius: 50%;
    line-height: 30px; /* Vertically center tick */
    display: flex; /* For centering the checkmark */
    align-items: center;
    justify-content: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: all 0.4s ease;
    border: 2px solid #ddd; /* Border for circles */
}

.status ol li.completed::before {
    content: "✓"; /* Checkmark for completed */
    background: #ff8c00; /* Orange for completed circles */
    border-color: #ff8c00;
    box-shadow: 0 4px 12px rgba(255,140,0,0.5);
    animation: fadeInScale 0.5s ease forwards; /* Animation for completion */
}

.status ol li.active-step::before { /* Current active step - if you want to highlight it */
    background: #ffa500; /* A slightly different shade of orange */
    border-color: #ffa500;
    box-shadow: 0 5px 15px rgba(255,165,0,0.6);
    animation: pulseActive 1.5s infinite alternate, bounceIn 0.6s ease-out forwards; /* Combined animations */
}

/* Connect the lines */
.status ol li:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 15px; /* Aligns with the center of the circle */
    left: 50%;
    width: calc(100% - 30px); /* Adjust width to connect circles accurately */
    height: 4px;
    background: #eee;
    z-index: -1;
    transform: translateX(-50%);
    border-radius: 2px;
    transition: background 0.4s ease;
}

.status ol li.completed:not(:last-child)::after {
    background: linear-gradient(to right, #ff8c00, #ffc870); /* Gradient for completed line segments */
}

/* New Animations */
@keyframes fadeInScale {
    0% { opacity: 0; transform: translateX(-50%) scale(0.5); }
    100% { opacity: 1; transform: translateX(-50%) scale(1); }
}

@keyframes bounceIn {
    0% { transform: translateX(-50%) scale(0.1); opacity: 0; }
    60% { transform: translateX(-50%) scale(1.1); opacity: 1; }
    80% { transform: translateX(-50%) scale(0.9); }
    100% { transform: translateX(-50%) scale(1); }
}

/* Update pulseActive to be less aggressive or combine with another */
@keyframes pulseActive { /* Specific pulse for active status */
    0%, 100% {box-shadow: 0 5px 15px rgba(255,165,0,0.6), 0 0 0 0 rgba(255,165,0,0.3);}
    50% {box-shadow: 0 8px 25px rgba(255,165,0,0.8), 0 0 0 10px rgba(255,165,0,0);}
}

/* --- تجاوب --- */
@media (max-width: 991px) { /* Adjust breakpoint for larger tablets */
    .userHeader {
        flex-direction: column;
        align-items: flex-start; /* Align items to the start */
        padding: 30px;
    }
    .userHeader .control {
        margin-left: auto; /* Push logout icon to right for better flow in column */
        margin-right: 0;
        margin-bottom: 15px; /* Add space below logout icon */
    }
    .userInfo {
        order: 1; /* Place user info first */
        margin-bottom: 15px; /* Space between user info and logout icon */
    }
    .userInfo h3 {
        font-size: 28px;
    }
    .userInfo p {
        font-size: 16px;
    }

    .routeNav {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
        padding: 15px 20px;
    }
    .routeNav ul {
        flex-wrap: wrap;
        gap: 12px;
        font-size: 16px;
    }
    .routeNav ul li a {
        padding: 6px 12px;
    }
    .routeNav .Back {
        font-size: 20px;
        width: 45px;
        height: 45px;
    }

    .status ol {
        flex-wrap: wrap;
        justify-content: center; /* Center the circles */
        font-size: 13px;
        padding-bottom: 0; /* Adjust padding */
    }
    .status ol::before { /* Hide line on small screens as it breaks layout */
        display: none;
    }
    .status ol li {
        width: 33%; /* 3 items per row */
        margin-bottom: 30px; /* Space between rows */
        padding-top: 30px;
    }
    .status ol li::before {
        top: 0; /* Adjust position for wrapped layout */
        width: 25px;
        height: 25px;
        font-size: 14px;
    }
     .status ol li:not(:last-child)::after {
        display: none; /* Hide connecting lines */
    }

    .order {
        padding: 20px;
    }
    .order .swiper-slide img {
        height: 200px;
    }
    .info li {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
        margin-bottom: 15px;
    }
    .info h6 {
        width: auto; /* Remove fixed width */
        margin-bottom: 5px;
        font-size: 15px;
    }
    .info p {
        font-size: 14px;
    }

    .selectedCustomerInfo {
        padding: 20px;
    }
    .selectedCustomerInfo .info img {
        width: 55px;
    }
    .selectedCustomerInfo .text h5 {
        font-size: 18px;
    }
    .selectedCustomerInfo .text p {
        font-size: 13px;
    }
    .contact i {
        font-size: 20px;
    }
    .contact p {
        font-size: 14px;
    }
    .selectedCustomer {
        font-size: 16px;
        padding: 12px 15px;
    }
    .selectedCustomer h6 span {
        font-size: 18px;
    }
}

@media (max-width: 576px) { /* Further adjustments for small mobiles */
    .userHeader {
        padding: 20px;
    }
    .userInfo h3 {
        font-size: 24px;
    }
    .userInfo p {
        font-size: 14px;
    }
    .userHeader .control a {
        width: 45px;
        height: 45px;
        font-size: 22px;
    }

    .routeNav {
        padding: 10px 15px;
    }
    .routeNav ul {
        gap: 10px;
        font-size: 15px;
    }
    .routeNav ul li a {
        padding: 5px 10px;
    }

    .status ol li {
        width: 50%; /* 2 items per row on very small screens */
        margin-bottom: 20px;
    }

    .order {
        padding: 15px;
    }
    .order .swiper-slide img {
        height: 180px;
    }

    .selectedCustomerInfo {
        padding: 15px;
    }
    .selectedCustomerInfo .info {
        gap: 15px;
    }
    .selectedCustomerInfo .info img {
        width: 50px;
    }
    .selectedCustomerInfo .text h5 {
        font-size: 16px;
    }
    .contact p {
        font-size: 13px;
    }
    .selectedCustomer {
        font-size: 14px;
    }
    .selectedCustomer h6 span {
        font-size: 16px;
    }
}
/* --- selectedCustomerInfo (Card Style) --- */
.selectedCustomerInfo {
    margin-top: 30px;
    padding: 25px 30px; /* More padding */
    background: #fff; /* White background for the card */
    border-radius: 20px;
    box-shadow: 0 12px 35px rgba(0,0,0,0.1); /* Softer, broader shadow */
    /* No changes needed here, as the row inside will handle flex */
}

/* Ensure the Bootstrap row aligns items to stretch by default */
.selectedCustomerInfo .row {
    display: flex; /* Ensure flexbox is active for the row */
    align-items: stretch; /* This is Bootstrap's default, but good to be explicit */
}

/* Apply consistent styling to the direct children of the columns
   that you want to appear as cards. These are the .info and .contact elements. */
.selectedCustomerInfo .col-md-6 > .info, /* The customer service info block */
.selectedCustomerInfo .col-md-3 > .contact { /* The contact links */
    display: flex;
    flex-direction: column; /* Stack items vertically inside each card/link */
    align-items: center; /* Center horizontally within each card */
    justify-content: center; /* Center vertically within each card */
    height: 100%; /* Make them fill the height of their parent column */
    background: #fff; /* Give them a background so they appear as distinct cards */
    border-radius: 15px; /* Add some border-radius for card look */
    padding: 20px; /* Add padding to the "card" content */
    box-shadow: 0 8px 20px rgba(0,0,0,0.05); /* Lighter shadow for individual cards */
    text-align: center; /* Center text within these elements */
    transition: all 0.3s ease; /* Add transition for hover effect */
}

.selectedCustomerInfo .col-md-6 > .info:hover,
.selectedCustomerInfo .col-md-3 > .contact:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    box-shadow: 0 12px 25px rgba(0,0,0,0.1); /* Slightly stronger shadow on hover */
}


/* Adjust specific styles within the customer service info to make it align well */
.selectedCustomerInfo .info { /* This is for the customer service card */
    /* Keep its existing flex properties for img and text alignment */
    align-items: center; /* Align avatar and text vertically */
    gap: 20px;
    margin-bottom: 0; /* Remove bottom margin here since the parent .info now has padding */
    flex-direction: row; /* Keep content in a row (image and text) */
    justify-content: center; /* Center the image and text horizontally within the card */
}

/* If you need to make the customer service image and text align at the top, change justify-content: flex-start */
/* .selectedCustomerInfo .info {
    justify-content: flex-start;
} */


/* Adjust the .contact styles slightly as they are now children of the new card-like structure */
.contact {
    /* Remove redundant display, align-items, justify-content if they conflict with the parent .col-md-3 > .contact styles */
    /* Re-evaluate these for optimal appearance within the new card structure */
    /* Example adjustments: */
    width: 100%; /* Make the contact link fill its parent's width */
    text-decoration: none; /* Ensure no underline */
    color: #ff8c00; /* Keep consistent color */
    /* The padding from the `.col-md-3 > .contact` rule above will provide the clickable area. */
    /* This rule itself might not need padding: 10px 0; anymore if the parent is providing it. */
    padding: 0; /* Remove padding here if handled by parent */
    /* margin: 0; */ /* Ensure no extra margin */
}

.contact i {
    font-size: 32px; /* Slightly larger icons for prominence */
    margin-bottom: 8px; /* Space between icon and text */
}

.contact p {
    margin: 0; /* Remove default margin */
    font-size: 17px; /* Slightly larger text */
    font-weight: 600;
}

/* Media query adjustments for the new card structure */
@media (max-width: 767px) { /* On small screens, stack the contact cards */
    .selectedCustomerInfo .col-md-6,
    .selectedCustomerInfo .col-md-3 {
        width: 100%; /* Make each column full width */
        flex: none; /* Disable flex growth */
        max-width: 100%; /* Ensure no max-width constraints */
        padding: 5px; /* Adjust padding for small screens */
    }
    .selectedCustomerInfo .col-md-6 > .info,
    .selectedCustomerInfo .col-md-3 > .contact {
        margin-bottom: 15px; /* Add space between stacked cards */
    }
    .selectedCustomerInfo .info {
        flex-direction: column; /* Stack image and text vertically on small screens */
        justify-content: center;
    }
    .selectedCustomerInfo .info img {
        margin-bottom: 10px; /* Space below image when stacked */
    }
}

/* New CSS for the Employee Card structure (conceptual, based on existing styles) */
.employee-card {
    background: #ffffff; /* Clean white background */
    border-radius: 25px; /* More rounded corners for a softer, premium feel */
    box-shadow: 0 20px 50px rgba(0,0,0,0.1); /* Deeper, more diffused shadow for strong visual presence */
    padding: 30px; /* Increased padding for more breathing room */
    margin-bottom: 40px; /* More space between cards */
    display: flex;
    flex-direction: column; /* Stack image and details vertically */
    align-items: center; /* Center content horizontally */
    transition: transform 0.4s ease-out, box-shadow 0.4s ease-out; /* Smoother transitions */
    overflow: hidden; /* Ensures nothing spills out of rounded corners */
    position: relative; /* For potential pseudo-elements or subtle patterns */
}

.employee-card::before { /* Subtle background overlay/pattern */
    content: '';
    position: absolute;
    top: -30px;
    left: -30px;
    width: 100px;
    height: 100px;
    background: rgba(255, 140, 0, 0.05); /* Light orange tint */
    border-radius: 50%;
    filter: blur(20px);
    pointer-events: none;
    z-index: 0;
    animation: float 8s ease-in-out infinite alternate;
}

.employee-card::after { /* Another subtle background pattern */
    content: '';
    position: absolute;
    bottom: -40px;
    right: -40px;
    width: 120px;
    height: 120px;
    background: rgba(255, 140, 0, 0.03); /* Even lighter orange tint */
    border-radius: 50%;
    filter: blur(25px);
    pointer-events: none;
    z-index: 0;
    animation: float 9s ease-in-out infinite alternate-reverse;
}

.employee-card:hover {
    transform: translateY(-12px); /* More pronounced lift effect */
    box-shadow: 0 35px 70px rgba(0,0,0,0.2); /* Stronger shadow on hover */
}

.employee-image-wrapper {
    width: 90%; /* Occupy most of the card width */
    max-width: 350px; /* Max width for consistency */
    margin-bottom: 30px; /* Increased space between image and details */
    position: relative;
    z-index: 1; /* Ensure image is above pseudo-elements */
}

.employee-image-wrapper img {
    width: 100%;
    height: 350px; /* Adjusted height for a more prominent image */
    object-fit: cover; /* **Changed to 'cover' for a filled look, adjust if you prefer 'contain'** */
    border-radius: 20px; /* Consistent with card, slightly less than outer card */
    box-shadow: 0 10px 30px rgba(0,0,0,0.1); /* Subtle shadow for the image itself */
    padding: 0; /* Remove internal padding if object-fit: cover is used */
    background-color: #f8f9fa; /* Light background behind image */
    border: 3px solid #ff8c00; /* Thin, elegant border matching accent color */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.employee-image-wrapper img:hover {
    transform: scale(1.05); /* Subtle zoom on image hover */
    box-shadow: 0 15px 45px rgba(0,0,0,0.2); /* Stronger shadow on image hover */
}

.employee-details {
    width: 100%;
    z-index: 1; /* Ensure details are above pseudo-elements */
}

.employee-details .info {
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
    text-align: right; /* Adjust for RTL */
}

.employee-details .info li {
    margin-bottom: 20px; /* Increased spacing between info items */
    display: flex; /* Use flexbox for key-value alignment */
    align-items: center; /* Vertically align items */
    justify-content: flex-end; /* Align content to the right for RTL */
    gap: 15px; /* Space between key and value */
    padding-bottom: 10px; /* Space before the border */
    border-bottom: 1px dashed #eee; /* Light, dashed separator for clean look */
}

.employee-details .info li:last-child {
    margin-bottom: 0;
    border-bottom: none; /* No border for the last item */
}

.employee-details .info h6 {
    font-size: 20px; /* Larger font size for labels */
    font-weight: 700;
    color: #ff8c00; /* Prominent accent color */
    margin: 0; /* Remove default margin */
    flex-shrink: 0; /* Prevent label from shrinking */
    min-width: 150px; /* Ensure labels have enough space */
    text-align: right; /* Ensure labels are right-aligned */
}

.employee-details .info p {
    font-size: 18px; /* Larger font size for values */
    color: #444; /* Slightly darker text for better readability */
    margin: 0; /* Remove default margin */
    flex-grow: 1; /* Allow value to take remaining space */
    text-align: right; /* Ensure values are right-aligned */
    font-weight: 500;
}

/* Responsive adjustments for the new card structure */
@media (max-width: 767px) {
    .employee-card {
        padding: 20px;
        border-radius: 20px;
    }
    .employee-card::before,
    .employee-card::after {
        display: none; /* Hide complex patterns on smaller screens */
    }
    .employee-image-wrapper {
        width: 100%;
        max-width: 300px;
        margin-bottom: 25px;
    }
    .employee-image-wrapper img {
        height: 280px;
        border-radius: 15px;
        border-width: 2px; /* Slightly thinner border */
    }
    .employee-details .info li {
        flex-direction: column; /* Stack key-value pairs vertically on small screens */
        align-items: flex-end; /* Align to the right */
        gap: 5px;
        margin-bottom: 15px;
        padding-bottom: 8px;
    }
    .employee-details .info h6 {
        font-size: 17px;
        min-width: auto; /* Remove min-width when stacked */
    }
    .employee-details .info p {
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .employee-card {
        padding: 15px;
    }
    .employee-image-wrapper img {
        height: 220px;
    }
    .employee-details .info h6 {
        font-size: 16px;
    }
    .employee-details .info p {
        font-size: 15px;
    }
}

/* General Styling for the Order Details Card */
.order-details-card {
    background-color: #ffffff;
    border-radius: 12px; /* Soft rounded corners */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); /* Subtle shadow for depth */
    overflow: hidden; /* Ensures rounded corners are applied correctly */
    margin-bottom: 30px;
    border: 1px solid #e0e0e0; /* Light border */
}

/* Image Section Styling */
.order-image-section {
    padding: 20px; /* Adjust padding as needed */
    background-color: #f8f9fa; /* Light background for image section */
    display: flex;
    align-items: center;
    justify-content: center;
}

.workerCvSlider {
    width: 100%; /* Ensure slider takes full width */
    max-width: 450px; /* Optional: Limit max width of slider */
}

.workerCvSlider .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 250px; /* Adjust height as needed */
}

.workerCvSlider img {
    width: 100%;
    height: auto;
    object-fit: contain; /* Ensures the entire image is visible without cropping */
    max-height: 400px; /* Max height for images */
    transition: transform 0.3s ease-in-out;
}

.workerCvSlider img:hover {
    transform: scale(1.02); /* Slight zoom on hover */
}

/* Swiper Navigation and Pagination */
.swiper-button-next,
.swiper-button-prev {
    color: #FF8C00; /* Primary orange color for navigation arrows */
    font-size: 24px;
}

.swiper-pagination-bullet {
    background: #cccccc;
    opacity: 0.7;
}

.swiper-pagination-bullet-active {
    background: #FF8C00; /* Active bullet color (orange) */
    opacity: 1;
}


/* Information Section Styling */
.order-info-section {
    padding: 25px 35px; /* More generous padding for text */
    display: flex;
    flex-direction: column;
    justify-content: center; /* Vertically center content */
}

.order-title {
    font-family: 'Arial', sans-serif; /* A clear, professional font */
    font-weight: 700;
    color: #333333;
    font-size: 1.8rem;
    border-bottom: 2px solid #FF8C00; /* Underline effect for title (orange) */
    padding-bottom: 10px;
    margin-bottom: 25px !important;
    display: inline-block; /* To make the border-bottom only as wide as the text */
}

.info-list {
    margin-top: 20px;
}

.info-list li {
    display: flex; /* Use flexbox for label and value alignment */
    align-items: baseline; /* Align text baselines */
    margin-bottom: 15px; /* Spacing between list items */
    font-size: 1.1rem;
}

.info-label {
    font-weight: 600; /* Bolder for labels */
    color: #555555;
    flex-shrink: 0; /* Prevent label from shrinking */
    min-width: 150px; /* Ensure labels have consistent width for alignment */
    text-align: start; /* Align labels to start */
    margin-inline-end: 10px; /* Space between label and value */
}

.info-value {
    color: #333333;
    font-weight: 400;
    flex-grow: 1; /* Allow value to take up remaining space */
}

.info-status .badge {
    padding: 8px 12px;
    border-radius: 20px; /* More rounded badges */
    font-size: 0.95rem;
    font-weight: 600;
    text-transform: capitalize; /* Capitalize the first letter of the status */
}

/* Specific badge colors (can be customized based on your design system) */
.info-status .badge.bg-danger { background-color: #dc3545 !important; color: #fff !important; } /* Red for canceled */
.info-status .badge.bg-warning { background-color: #ffc107 !important; color: #212529 !important; } /* Yellow for under_work */
.info-status .badge.bg-info { background-color: #0dcaf0 !important; color: #212529 !important; } /* Light blue for visa (can be changed to a different orange shade if desired, but info often works well) */
.info-status .badge.bg-primary { background-color: #FF8C00 !important; color: #fff !important; } /* Orange for musaned (primary changed to orange) */
.info-status .badge.bg-secondary { background-color: #6c757d !important; color: #fff !important; } /* Grey for traning */
.info-status .badge.bg-success { background-color: #28a745 !important; color: #fff !important; } /* Green for contract/finished */
.info-status .badge.bg-light { background-color: #f8f9fa !important; color: #212529 !important; border: 1px solid #e9ecef;}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .order-details-card .row {
        flex-direction: column; /* Stack columns vertically on small screens */
    }

    .order-image-section,
    .order-info-section {
        padding: 20px;
    }

    .info-list li {
        flex-direction: column; /* Stack label and value vertically on small screens */
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .info-label {
        min-width: auto;
        margin-inline-end: 0;
        margin-bottom: 5px; /* Space below label when stacked */
    }

    .order-title {
        font-size: 1.5rem;
    }
}

/* RTL Specific Adjustments (if your entire site is RTL, Bootstrap handles much of this, but for specific tweaks) */
body[dir="rtl"] .info-label {
    text-align: end; /* Align labels to end in RTL */
    margin-inline-start: 10px; /* Adjust margin for RTL */
    margin-inline-end: 0;
}
@media (max-width: 991px) { /* Adjust breakpoint for larger tablets */
    .userHeader {
        flex-direction: column;
        padding: 30px;
        justify-content: center;
        align-items: center;
    }
    .userHeader .control {
        position: absolute;
        left: 20px;
        right: unset;
        top: 20px;
        transform: none;
        margin: 0;
    }

    .userInfo {
        order: unset;
        margin-bottom: 0;
        margin-left: 0;
        align-items: center;
        text-align: center;
    }
    .userInfo h3 {
        font-size: 28px;
    }
    .userInfo p {
        font-size: 16px;
    }

}

@media (max-width: 576px) { /* Further adjustments for small mobiles */
    .userHeader {
        padding: 20px;
    }
    .userInfo h3 {
        font-size: 24px;
    }
    .userInfo p {
        font-size: 14px;
    }
    .userHeader .control {
        left: 15px;
        top: 15px;
        width: 40px;
        height: 40px;
        font-size: 20px;
    }
    .userHeader .control a {
        width: 40px;
        height: 40px;
        font-size: 20px;
    }

}
    .banner {
        background: linear-gradient(135deg, #f4a835, #fff1db);
        padding: 60px 20px;
        text-align: center;
        border-radius: 0 0 50px 50px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        color: #333;
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
        position: relative;
        z-index: 1;
    }

    .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 1;
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
        @media (max-width: 767.98px) {
        .banner h1 {
            font-size: 2rem;
        }
        .banner ul {
            flex-wrap: wrap; /* Allow navigation links to wrap */
            gap: 10px;
        }
        .banner {
            padding: 40px 15px;
            border-radius: 0 0 30px 30px;
        }
        .banner h1 {
            font-size: 1.8rem;
        }
    }
    /* ===== Pro User Header ===== */
    .userHeaderPro{
        background: linear-gradient(135deg,#f4a835,#ffd28a);
        border-radius:26px;
        padding:28px 32px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        box-shadow:0 25px 55px rgba(244,168,53,.35);
    }

    /* Left side */
    .userLeft{
        display:flex;
        align-items:center;
        gap:18px;
    }

    /* Avatar */
    .userHeaderPro .avatar{
        width:64px;
        height:64px;
        border-radius:50%;
        background:#fff;
        color:#f4a835;
        font-size:30px;
        font-weight:900;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 8px 20px rgba(0,0,0,.15);
    }

    /* Name + phone */
    .userHeaderPro .userMeta h3{
        margin:0;
        font-size:22px;
        font-weight:900;
        color:#FFF;
    }

    .userHeaderPro .userMeta span{
        font-size:14px;
        color:#FFF;
        font-weight:600;
    }

    /* Actions */
    .userActions{
        display:flex;
        align-items:center;
    }

    /* Logout Button */
    .logoutBtn{
        display:flex;
        align-items:center;
        gap:10px;
        background:rgba(255,255,255,.9);
        color:#92400e;
        padding:12px 18px;
        border-radius:14px;
        font-weight:800;
        transition:.3s ease;
        box-shadow:0 6px 18px rgba(0,0,0,.12);
    }

    .logoutBtn i{
        font-size:18px;
    }

    .logoutBtn:hover{
        background:#fff;
        transform:translateY(-2px);
    }
    @media(max-width:768px){
        .userHeaderPro{
            flex-direction:column;
            gap:20px;
            text-align:center;
        }
        .userLeft{
            justify-content:center;
        }
    }
</style>
@endsection
@section('content')
    <content>
    <div class="banner">
        <h1> حسابي الشخصي </h1>
        <ul>
            <li> <a href="{{route('home')}}">الرئيسية </a> </li>
            <li> <a href="#!" class="active"> تفاصيل الحجز </a> </li>
        </ul>
    </div>
    <section class="profile" style="margin-top:20px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 p-2">
                    <div class="col-lg-12 mb-3">
                        <div class="userHeaderPro">

                            <div class="userLeft">
                                <div class="avatar">
                                    {{ mb_substr($user->name,0,1) }}
                                </div>

                                <div class="userMeta">
                                    <h3>{{$user->name}}</h3>
                                    <span>{{$user->phone}}</span>
                                </div>
                            </div>

                            <div class="userActions">
                                <a href="{{route('auth.logout')}}" class="logoutBtn">
                                    <i class="fas fa-power-off"></i>
                                    <span>تسجيل الخروج</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class=" col-lg-12 p-2 profileContent"> <div class="routeNav">
                            <a href="{{route('auth.profile')}}" class="Back">
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('auth.profile')}}"> طلبات الاستقدام </a>
                                </li>
                                <li>
                                    <a href="#!" class="active"> تفاصيل الطلب </a>
                                </li>
                            </ul>
                        </div>
                        <div class="status">
                            <ol>
                                <li @if(in_array($order->status,['new','under_work','contract','musaned','traning','tfeez','finished'])) class="completed @if($order->status == 'new') active-step @endif" @endif >
                                    <p>اختيار العمالة </p>
                                </li>
                                <li @if(in_array($order->status,['under_work','contract','musaned','traning','visa','finished'])) class="completed @if($order->status == 'under_work') active-step @endif" @endif>
                                    <p>حجز السيره الذاتية </p>
                                </li>
                                <li @if(in_array($order->status,['contract','musaned','traning','visa','finished'])) class="completed @if($order->status == 'contract') active-step @endif" @endif>
                                    <p>ابرام التعاقد </p>
                                </li>
                                <li @if(in_array($order->status,['musaned','traning','visa','finished'])) class="completed @if($order->status == 'musaned') active-step @endif" @endif>
                                    <p> مساند </p>
                                </li>
                                <li @if(in_array($order->status,['traning','visa','finished'])) class="completed @if($order->status == 'traning') active-step @endif" @endif>
                                    <p> تحت الاجراءات </p>
                                </li>
                                <li @if(in_array($order->status,['visa','finished'])) class="completed @if($order->status == 'visa') active-step @endif" @endif>
                                    <p> تفييز العمالة </p>
                                </li>
                                <li @if(in_array($order->status,['finished'])) class="completed @if($order->status == 'finished') active-step @endif" @endif>
                                    <p>وصول العمالة </p>
                                </li>
                            </ol>
                        </div>

                        <div class="order-details-card">
                            <div class="row g-0"> <div class="col-md-6 order-image-section p-3">
                                    <div class="swiper workerCvSlider">
                                        <div class="swiper-wrapper">
                                            @foreach($order->biography->images as $image)
                                                <div class="swiper-slide">
                                                    <a data-fancybox="user{{$image->id}}-CV-{{$image->id}}" href="{{get_file($image->image)}}">
                                                        {{-- يفضل استخدام صورة السيرة الذاتية الفعلية بدلاً من صورة ثابتة للعرض --}}
                                                        <img src="{{ get_file($image->image) }}" alt="السيرة الذاتية" class="img-fluid rounded shadow-sm">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 order-info-section p-4">
                                    <h4 style="font-family:cairo" class="order-title mb-4">تفاصيل الطلب</h4> {{-- يمكن إضافة عنوان عام للقسم --}}
                                    <ul class="info-list list-unstyled">
                                        <li>
                                            <span class="info-label">{{__('frontend.Nationality')}} : </span>
                                            <span class="info-value">{{$order->biography->nationalitie?$order->biography->nationalitie->title:__('frontend.Not Available')}}</span>
                                        </li>
                                        <li>
                                            <span class="info-label">{{__('frontend.Occupation')}} : </span>
                                            <span class="info-value">{{$order->biography->job?$order->biography->job->title:__('frontend.Not Available')}}</span>
                                        </li>
                                        <li>
                                            <span class="info-label"> حالة الاستقدام : </span>
                                            <span class="info-status">
                                                @if ($order->status == "canceled")
                                                    <span class="badge bg-danger">{{__('frontend.orderCanceled')}}</span>
                                                @elseif ($order->status == "under_work")
                                                    <span class="badge bg-warning text-dark">تم حجز السيرة الذاتية</span>
                                                @elseif ($order->status == "visa")
                                                    <span class="badge bg-info text-dark">أصبح التعاقد الخاص بكم في مرحلة التفييز بنجاح</span>
                                                @elseif ($order->status == "musaned")
                                                    <span class="badge bg-primary">تم ربط العقد الخاص بكم في مساند بنجاح</span>
                                                @elseif ($order->status == "traning")
                                                    <span class="badge bg-secondary">أصبح التعاقد الخاص بكم في مرحلة الإجراءات بنجاح</span>
                                                @elseif ($order->status == "contract")
                                                    <span class="badge bg-success">تم قبول التعاقد الخاص بكم</span>
                                                @elseif($order->status == "finished")
                                                    <span class="badge bg-success">{{__('frontend.orderDone')}}</span>
                                                @else
                                                    <span class="badge bg-light text-dark">{{__('frontend.Unknown Status')}}</span>
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="selectedCustomerInfo">
                            <div class="row">
                                <div class="col-md-6 p-1">
                                    <div class="info">
                                        <img src="{{asset('frontend')}}/img/customer-service.png" alt="Customer Service Avatar">
                                        <div class="text">
                                            <h5> {{$order->admin->name}}  </h5>
                                            <p>خدمة العملاء</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 p-1">
                                    <a class="contact" href="https://api.whatsapp.com/send?phone={{$order->admin->whats_up_number}}" target="_blank">
                                        <i class="me-2 fa-brands fa-whatsapp-square"></i>
                                        <p>تواصل عبر الواتس اب</p>
                                    </a>
                                </div>
                                <div class="col-6 col-md-3 p-1">
                                    <a class="contact" href="tel:{{$order->admin->phone}}" target="_blank">
                                        <i class="me-2 fa-solid fa-square-phone"></i>
                                        <p>تواصل عبر الهاتف </p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="selectedCustomer">
                            <h6>سوف توصل العمالة فى خلال <span> 90 </span> يوم كحد اقصى </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</content>
@endsection
@section('js')
    <script>
        var  ProfileLoader = `<div class="linear-background3"></div>`;
        $(document).on('click',".change_part_of_profile",function (e) {
            e.preventDefault()
            //add
            $(".change_part_of_profile").removeClass('active');
            $(this).addClass('active');
            var link = $(this).attr('href');
            $.get(link, function(data) {
                $('#display_profile_part').empty();
                $('#display_profile_part').append(ProfileLoader)
                window.setTimeout(function() {
                    $('#display_profile_part').empty();
                    $('#display_profile_part').append(data['html']);
                    loadTimer()
                    $('.select2').select2();
                    $('.dropify').dropify();
                    $.validate({
                        ignore: 'input[type=hidden]',
                        modules : 'date, security',
                        lang:"{{ LaravelLocalization::getCurrentLocale() }}",
                    });
                }, 300);
            });
        })
    </script>
    <script>
        //load more current orders
        $(document).on('click','#load_more_current_orders_button',function (e){

            e.preventDefault()
            var current_orders_page = parseInt(document.getElementById("current_page_orders").value) + 1;
            loadMoreDataFormCurrentOrders(current_orders_page);
        })//end fun
        function loadMoreDataFormCurrentOrders(current_orders_page) {
            var url = '{{route('front.loadMoreCurrentOrders')}}?page=' + current_orders_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    //   $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_current_orders_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_current_orders_button").remove();
                    }
                    else {
                        document.getElementById("current_page_orders").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#current_orders_section_to_append').append(data.html);
                        loadTimer()
                        //   $(".spinner").hide()
                        $('#load_more_current_orders_button').html(
                            `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                         `
                        )
                    }, 20);
                },
                error: function (data) {
                    //$(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        //load more cases
        $(document).on('click','#load_more_notifications_button',function (e){
            e.preventDefault()
            var notifications_page = parseInt(document.getElementById("current_page_notifications").value) + 1;
            loadMoreDataFormNotification(notifications_page);
        })//end fun
        function loadMoreDataFormNotification(notifications_page) {
            var url = '{{route('profile.loadMoreNotifications')}}?page=' +notifications_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    //  $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_notifications_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_notifications_button").remove();
                    }
                    else {
                        document.getElementById("current_page_notifications").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#notifications_section_to_append').append(data.html);
                        // $(".spinner").hide()
                        $('#load_more_notifications_button').html(
                            `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                           `
                        )
                    }, 20);
                },
                error: function (data) {
                    // $(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        //load more current orders
        $(document).on('click','#load_more_history_orders_button',function (e){
            e.preventDefault()
            var history_orders_page = parseInt(document.getElementById("history_page_orders").value) + 1;
            loadMoreDataFormHistoryOrders(history_orders_page);
        })//end fun
        function loadMoreDataFormHistoryOrders(history_orders_page) {
            var url = '{{route('front.loadMoreOrdersHistory')}}?page=' + history_orders_page;
            $.ajax({
                url:url,
                type: 'GET',
                beforeSend: function(){
                    //   $(".spinner").show()
                    //$('#cases_section_to_append').append(loader_html);
                    $('#load_more_history_orders_button').html(`<div class="spinner-border mt-1 mb-2" role="status"> </div>`);
                },
                complete: function(){
                },
                success: function (data) {
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_history_orders_button").remove();
                    }
                    else {
                        document.getElementById("history_page_orders").value =  data.current_page;
                    }
                    setTimeout(function (){
                        // var elements = document.getElementsByClassName("loader_html");
                        // while (elements.length > 0) elements[0].remove();
                        $('#history_orders_section_to_append').append(data.html);
                        //   $(".spinner").hide()
                        $('#load_more_history_orders_button').html(
                            `
                            {{__('frontend.load more')}}
                            <i class="fa-regular fa-left-long ms-2"><span></span></i>
                         `
                        )
                    }, 20);
                },
                error: function (data) {
                    //$(".spinner").hide()
                    alert('Something went wrong.');
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        }//end fun
    </script>
    <script>
        var timeOfSendingCode = 0;
        // Add validator
        $.formUtils.addValidator({
            name : 'validatePhoneNumberOfSAR',
            validatorFunction : function(value, $el, config, language, $form) {
                return /^(5)(5|0|3|6|4|9|1|8|7|2)([0-9]{7})$/.test(value);
            },
            errorMessage : "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'validatePhoneNumberOfSAR'
        });
        $.formUtils.addValidator({
            name : 'repeatPassword',
            validatorFunction : function(value, $el, config, language, $form) {
                return value == $("#password").val()
            },
            errorMessage : "{{__('frontend.PasswordAndConfirmPasswordIsNotTheSame')}}",
            errorMessageKey: 'repeatPasswordKey'
        });
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $(document).on('click','.passwordEye',function(e) {
            $(this).find('.far').toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).closest('.passwordDiv').find('.passwordInput'));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        //update basic info of user
        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $("#Form").attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button').attr('disabled',true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    //$('#submit-button').prop('disabled', true);
                    window.setTimeout(function() {
                        //  $("#user_info_in_header").attr("src",data.user.logo_link);
                        $("#user_logo_in_profile").attr("src",data.user.logo_link);
                        $("#user_name_in_profile").html(data.user.name);
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_button').attr('disabled',false)
                        $('#submit_button').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_button').attr('disabled',false)
                    $('#submit_button').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 400) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the email is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
        //update password of user
        $(document).on('submit','form#FormPassword',function(e) {
            e.preventDefault();
            var myForm = $("#FormPassword")[0]
            var formData = new FormData(myForm)
            var url = $("#FormPassword").attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_buttonPassword').attr('disabled',true)
                    $('#submit_buttonPassword').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    //$('#submit-button').prop('disabled', true);
                    window.setTimeout(function() {
                        // $("#user_info_in_header").attr("src",data.user.logo_link);
                        // $("#user_info_in_profile").attr("src",data.user.logo_link);
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_buttonPassword').attr('disabled',false)
                        $('#submit_buttonPassword').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_buttonPassword').attr('disabled',false)
                    $('#submit_buttonPassword').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.there ar an error')}}",
                            timer: 3000
                        })
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
        var codeSentToMobile
        $(document).on('submit','form#ChangePhoneForm',function(e) {
            e.preventDefault();
            $("#phoneInCode").val($("#Phone").val())
            var myForm = $("#ChangePhoneForm")[0]
            var formData = new FormData(myForm)
            var url = $('#ChangePhoneForm').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button_for_phone_change').attr('disabled',true)
                    $('#submit_button_for_phone_change').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    window.setTimeout(function() {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.Code Is Sent to Your phone')}}",
                            timer: 3000
                        })
                        $('#submit_button_for_phone_change').attr('disabled',false)
                        $('#submit_button_for_phone_change').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)
                        codeSentToMobile = data
                        $("#registerForm").hide()
                        $("#CodeForm").show()
                        document.getElementById("vCodeIdFirst").focus();
                        timeOfSendingCode++
                    }, 2000);
                },
                error: function (data) {
                    $('#submit_button_for_phone_change').attr('disabled',false)
                    $('#submit_button_for_phone_change').html(`<p class="px-5">{{__('frontend.RegisterPage')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
    </script>
    <script>
        var vCode = (function () {
            //cache dom
            var $inputs = $("#vCode").find("input");
            //bind events
            $inputs.on('keyup', processInput);
            //define methods
            function processInput(e) {
                var x = e.charCode || e.keyCode;
                if ((x == 8 || x == 46) && this.value.length == 0) {
                    var indexNum = $inputs.index(this);
                    if (indexNum != 0) {
                        $inputs.eq($inputs.index(this) - 1).focus();
                    }
                }
                if (ignoreChar(e))
                    return false;
                else if (this.value.length == this.maxLength) {
                    $(this).next('input').focus();
                }
            }
            function ignoreChar(e) {
                var x = e.charCode || e.keyCode;
                if (x == 37 || x == 38 || x == 39 || x == 40)
                    return true;
                else
                    return false
            }
        })();
        $(document).on('submit','form#CompleteRegister',function(e) {
            e.preventDefault();
            const codeHere = [];
            var inputs = $(".vCode-input");
            for(var i = 0; i < inputs.length; i++){
                if ($(inputs[i]).val() == '' || $(inputs[i]).val() == null){
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.please , fill all input with correct code')}}",
                        timer: 3000
                    })
                    return 0
                }else{
                    codeHere.push($(inputs[i]).val());
                }
            }
            if (codeSentToMobile != codeHere.join('')){
                cuteToast({
                    type: "error", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.this code is wrong')}}",
                    timer: 3000
                })
                return 0;
            }
            $("#codeInCode").val(codeSentToMobile)
            var myForm = $("#CompleteRegister")[0]
            var formData = new FormData(myForm)
            var url = $('#CompleteRegister').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#CompleteRegisterButton').attr('disabled',true)
                    $('#CompleteRegisterButton').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){
                },
                success: function (data) {
                    window.setTimeout(function() {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#CompleteRegisterButton').attr('disabled',false)
                        $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                        location.reload()
                    }, 2000);
                },
                error: function (data) {
                    $('#CompleteRegisterButton').attr('disabled',false)
                    $('#CompleteRegisterButton').html(`<p class="px-5">{{__('frontend.confirm')}}</p> <span></span>`)
                    if (data.status === 403) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.the phone is already exists')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });//end ajax
        });//end submit
        $(document).on('click',"#registerAgain",function (e){
            e.preventDefault()
            $("#registerForm").show()
            $("#CodeForm").hide()
            document.getElementById("vCodeIdFirst").blur();
        })
        $(document).on('click',"#sendCodeAgain",function (e){
            e.preventDefault()
            if ( $("#sendCodeAgain").attr('attr-code-sent') == 'sent')
            {
                $('#sendCodeAgain').html(`<i class='fa fa-spinner fa-spin '></i>`)
                window.setTimeout(function() {
                    $("#codeReceiveOrNot").html("{{__('frontend.CodeIsSentAgain')}}")
                    $("#Form").submit()
                    countdown(1)
                    $("#sendCodeAgain").attr('attr-code-sent',"no_send")
                }, 1000);
            }else{
                cuteToast({
                    type: "error", // or 'info', 'error', 'warning'
                    message: "{{__('frontend.Please wait until the time is up')}}",
                    timer: 3000
                })
                return 0;
            }
        })
        var timeoutHandle;
        function countdown(minutes) {
            var seconds = 60;
            var mins = minutes
            var counter = document.getElementById("sendCodeAgain");
            var current_minutes = mins-1
            let interval = setInterval(() => {
                seconds--;
                counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
                // our seconds have run out
                if(seconds <= 0) {
                    // our minutes have run out
                    if(current_minutes <= 0) {
                        // we display the finished message and clear the interval so it stops.
                        counter.innerHTML = "{{__('frontend.ReSent')}}"
                        $("#codeReceiveOrNot").html("{{__('frontend.I did not receive the activation code')}}")
                        $("#sendCodeAgain").attr('attr-code-sent',"sent")
                        clearInterval(interval);
                    } else {
                        // otherwise, we decrement the number of minutes and change the seconds back to 60.
                        current_minutes--;
                        seconds = 60;
                    }
                }
                // we set our interval to a second.
            }, 1000);
        }


        function loadTimer()
        {
            $(document).find('.timer').each(function (index){
                var date = $(this).data('date')
                var id = $(this).data('id')
                var countDownDate = new Date(date).getTime();
                setInterval(function () {
                    var now = new Date().getTime();
                    var timeLeft = countDownDate - now;
                    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    // Result is output to the specific element
                    document.getElementById("days"+id).innerHTML = days + "<span> يوم </span>";
                    document.getElementById("hours"+id).innerHTML = hours + "<span> ساعة </span> "
                    document.getElementById("minutes"+id).innerHTML = minutes + " <span> دقيقة </span> "
                    document.getElementById("seconds"+id).innerHTML = seconds + "<span> ثانية </span> "
                }, 1000);
            })
        }
    </script>
    <script>
        $('#activeButton').click();

    </script>

    {{--<script>--}}
    {{--        var countDownDate = new Date("oct 25, 2022 16:00:00").getTime();--}}
    {{--        var myFunc = setInterval(function () {--}}
    {{--        var now = new Date().getTime();--}}
    {{--        var timeLeft = countDownDate - now;--}}
    {{--        var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));--}}
    {{--        var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));--}}
    {{--        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));--}}
    {{--        var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);--}}
    {{--        // Result is output to the specific element--}}
    {{--        document.getElementById("days").innerHTML = days + "<span> يوم </span>";--}}
    {{--        document.getElementById("hours").innerHTML = hours + "<span> ساعة </span> "--}}
    {{--        document.getElementById("minutes").innerHTML = minutes + " <span> دقيقة </span> "--}}
    {{--        document.getElementById("seconds").innerHTML = seconds + "<span> ثانية </span> "--}}
    {{--        }, 1000);--}}
    {{--    </script>--}}
@endsection











