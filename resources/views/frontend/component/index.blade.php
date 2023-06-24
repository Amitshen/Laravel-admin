@extends('frontend.layouts.app')
@section('content')
<!-- Banner Section Start -->
<div class="rs-banner main-home pt-100 pb-100  md-pt-80 md-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 pr-140 md-mb-140 md-pr-15">
                <div class="content-wrap">
                    <h1 class="it-title">IT Consulting Services For Your Business</h1>
                    <div class="description">
                        <p class="desc">
                            We are leading technology solutions providing company all over the world doing over 40
                            years.
                        </p>
                    </div>
                    <div class="rs-videos">
                        <div class="animate-border main-home">
                            <a class="popup-border popup-videos" href="https://www.youtube.com/watch?v=FMvA5fyZ338">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 pl-70 md-pl-15">
                <div class="rs-contact">
                    <div class="contact-wrap">
                        <div class="content-part mb-25">
                            <h2 class="title mb-15">Schedule Your Appointment</h2>
                            <p class="desc">We here to help you 24/7 with experts</p>
                        </div>
                        <div id="appointment-messages"></div>
                        <form id="appointment-form" method="post"
                            action="https://rstheme.com/products/html/braintech/appointment.php">
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 mb-15">
                                        <input class="from-control" type="text" id="appointment_name"
                                            name="appointment_name" placeholder="Name" required="">
                                    </div>
                                    <div class="col-lg-12 mb-15">
                                        <input class="from-control" type="text" id="appointment_email"
                                            name="appointment_email" placeholder="E-Mail" required="">
                                    </div>
                                    <div class="col-lg-12 mb-15">
                                        <input class="from-control" type="text" id="appointment_phone"
                                            name="appointment_phone" placeholder="Phone Number" required="">
                                    </div>
                                    <div class="col-lg-12 mb-25">
                                        <input class="from-control" type="text" id="appointment_website"
                                            name="appointment_website" placeholder="Your Website" required="">
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <input class="submit-btn" type="submit" value="Submit Now">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- About Section Start -->
<div id="rs-about" class="rs-about style1 pt-130 pb-190 md-pt-80 md-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 md-mb-50">
                <div class="rs-animation-shape">
                    <div class="pattern">
                        <img src="{{url('frontend/assets/images/about/main-home/about-part-1.png')}}" alt="">
                    </div>
                    <div class="middle">
                        <img class="dance" src="{{url('frontend/assets/images/about/main-home/about-part-2.png')}}" alt="">
                    </div>
                    <div class="bottom-shape">
                        <img class="dance2" src="{{url('frontend/assets/images/about/main-home/about-part-3.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 pl-40 md-pl-15 md-pt-200 sm-pt-0">
                <div class="sec-title mb-30">
                    <div class="sub-text">About Us</div>
                    <h2 class="title pb-20">
                        We Are Increasing Business Success With Technology
                    </h2>
                    <div class="desc pr-90 md-pr-0">
                        Over 25 years working in IT services developing software applications and mobile apps for
                        clients all over the world.
                    </div>
                </div>
                <!-- Skillbar Section Start -->
                <div class="row">
                    <div class="col-lg-10">
                        <div class="rs-skillbar style1">
                            <div class="cl-skill-bar">
                                <!-- Start Skill Bar -->
                                <span class="skillbar-title">Software Development</span>
                                <div class="skillbar" data-percent="92">
                                    <p class="skillbar-bar"></p>
                                    <span class="skill-bar-percent"></span>
                                </div>
                                <!-- Start Skill Bar -->
                                <span class="skillbar-title">Cyber Security</span>
                                <div class="skillbar" data-percent="80">
                                    <p class="skillbar-bar"></p>
                                    <span class="skill-bar-percent"></span>
                                </div>
                                <!-- Start Skill Bar -->
                                <span class="skillbar-title">Artificial Intelligence</span>
                                <div class="skillbar" data-percent="95">
                                    <p class="skillbar-bar"></p>
                                    <span class="skill-bar-percent"></span>
                                </div>
                                <!-- Start Skill Bar -->
                                <span class="skillbar-title">Web Development</span>
                                <div class="skillbar" data-percent="78">
                                    <p class="skillbar-bar"></p>
                                    <span class="skill-bar-percent"></span>
                                </div>
                                <div class="btn-part mt-55">
                                    <a class="readon learn-more" href="contact.html">Learn-More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Skillbar Section End -->
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Services Section Start -->
<div class="rs-services main-home gray-color pt-120 pb-120 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title2 text-center mb-45">
            <span class="sub-text">Services</span>
            <h2 class="title">
                We Are Offering All Kinds of IT Solutions Services
            </h2>
            <div class="heading-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-25">
                <div class="services-item">
                    <div class="services-icon">
                        <div class="image-part">
                            <img src="{{url('frontend/assets/images/services/main-home/icons/1.png')}}" alt="">
                        </div>
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="services-title"><a href="software-development.html">Software Development</a></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for
                                managing database.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-25">
                <div class="services-item">
                    <div class="services-icon">
                        <div class="image-part">
                            <img src="{{url('frontend/assets/images/services/main-home/icons/2.png')}}" alt="">
                        </div>
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="services-title"><a href="web-development.html">Web Development</a></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for
                                managing database.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-25">
                <div class="services-item">
                    <div class="services-icon">
                        <div class="image-part">
                            <img src="{{url('frontend/assets/images/services/main-home/icons/3.png')}}" alt="">
                        </div>
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="services-title"><a href="case-studies-single.html">Analytic Solutions</a></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for
                                managing database.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 md-mb-25">
                <div class="services-item">
                    <div class="services-icon">
                        <div class="image-part">
                            <img src="{{url('frontend/assets/images/services/main-home/icons/4.png')}}" alt="">
                        </div>
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="services-title"><a href="cloud-and-devops.html">Clould & DevOps</a></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for
                                managing database.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sm-mb-25">
                <div class="services-item">
                    <div class="services-icon">
                        <div class="image-part">
                            <img src="{{url('frontend/assets/images/services/main-home/icons/5.png')}}" alt="">
                        </div>
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="services-title"><a href="product-design.html">Product & Design</a></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for
                                managing database.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <div class="services-icon">
                        <div class="image-part">
                            <img src="{{url('frontend/assets/images/services/main-home/icons/6.png')}}" alt="">
                        </div>
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="services-title"><a href="data-center.html">Data Center</a></h3>
                        </div>
                        <div class="services-desc">
                            <p>
                                At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio data center for
                                managing database.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services Section End -->

<!-- Call Us Section Start -->
<div class="rs-call-us bg1 pt-120 md-pt-70 md-pb-80">
    <div class="container">
        <div class="row rs-vertical-middle">
            <div class="col-lg-6">
                <div class="image-part">
                    <img src="{{url('frontend/assets/images/call-us/contact-here.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="rs-contact-box text-center">
                    <div class="address-item mb-25">
                        <div class="address-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="sec-title3">
                        <span class="sub-text">CALL US 24/7</span>
                        <h2 class="title">(+123) 456-9989</h2>
                        <p class="desc">Have any idea or project for in your mind call us or schedule a appointment. Our
                            representative will reply you shortly.</p>
                    </div>
                    <div class="btn-part mt-40">
                        <a class="readon lets-talk" href="contact.html">Let's Talk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call Us Section Start -->

<!-- Counter Section Start -->
<div class="rs-counter">
    <div class="counter-top-area text-center bg2">
        <div class="row">
            <div class="col-md-4">
                <div class="counter-list">
                    <div class="counter-text">
                        <div class="count-number">
                            <span class="rs-count k">80</span>
                        </div>
                        <h3 class="title">Happy Clients</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sm-mt-40 sm-mb-40">
                <div class="counter-list">
                    <div class="counter-text">
                        <div class="count-number">
                            <span class="rs-count plus">50</span>
                        </div>
                        <h3 class="title">Companies</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="counter-list">
                    <div class="counter-text">
                        <div class="count-number">
                            <span class="rs-count plus">230</span>
                        </div>
                        <h3 class="title">Projects Done</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->

<!-- Process Section Start -->
<div class="rs-process pt-180 pb-120 md-pt-70 md-pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4  md-mb-40">
                <div class="process-wrap bg3">
                    <div class="sec-title mb-30">
                        <div class="sub-text new">Working Process</div>
                        <h2 class="title white-color">
                            Our Working Process - How We Work For Our Customers
                        </h2>
                    </div>
                    <div class="btn-part mt-40">
                        <a class="readon learn-more contact-us" href="contact.html">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pl-30 md-pl-15">
                <div class="row">
                    <div class="col-md-6 mb-40">
                        <div class="rs-addon-number">
                            <div class="number-text">
                                <div class="number-area">
                                    1.
                                </div>
                                <div class="number-title">
                                    <h3 class="title"> Discovery</h3>
                                </div>
                                <p class="number-txt"> Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac
                                    nibh luctus, in porttitor theo lacus egestas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-40">
                        <div class="rs-addon-number">
                            <div class="number-text">
                                <div class="number-area">
                                    2.
                                </div>
                                <div class="number-title">
                                    <h3 class="title">Planning</h3>
                                </div>
                                <p class="number-txt">Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac
                                    nibh luctus, in porttitor theo lacus egestas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 sm-mb-40">
                        <div class="rs-addon-number">
                            <div class="number-text">
                                <div class="number-area">
                                    3.
                                </div>
                                <div class="number-title">
                                    <h3 class="title">Execute</h3>
                                </div>
                                <p class="number-txt">Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac
                                    nibh luctus, in porttitor theo lacus egestas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rs-addon-number">
                            <div class="number-text">
                                <div class="number-area">
                                    4.
                                </div>
                                <div class="number-title">
                                    <h3 class="title">Deliver</h3>
                                </div>
                                <p class="number-txt">Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac
                                    nibh luctus, in porttitor theo lacus egestas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Process Section End -->

<!-- Project Section Start -->
<div class="rs-project bg5 style1 pt-110 md-pt-80">
    <div class="container">
        <div class="sec-title2 text-center mb-45 md-mb-30">
            <span class="sub-text white-color">Project</span>
            <h2 class="title white-color">
                We Are Offering All Kinds of IT Solutions Services
            </h2>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
            data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
            data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
            data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2"
            data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true"
            data-md-device-dots="false">
            <div class="project-item">
                <div class="project-img">
                    <a href="case-studies-single.html"><img src="{{url('frontend/assets/images/project/main-home/1.jpg')}}"
                            alt="images"></a>
                </div>
                <div class="project-content">
                    <h3 class="title"><a href="case-studies-single.html">Product Design</a></h3>
                    <span class="category"><a href="case-studies-single.html">IT Technology</a></span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-img">
                    <a href="case-studies-single.html"><img src="{{url('frontend/assets/images/project/main-home/2.jpg')}}"
                            alt="images"></a>
                </div>
                <div class="project-content">
                    <h3 class="title"><a href="case-studies-single.html">Product Engineering</a></h3>
                    <span class="category"><a href="case-studies-single.html">IT Technology</a></span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-img">
                    <a href="case-studies-single.html"><img src="{{url('frontend/assets/images/project/main-home/3.jpg')}}"
                            alt="images"></a>
                </div>
                <div class="project-content">
                    <h3 class="title"><a href="case-studies-single.html">Analytic Solutions</a></h3>
                    <span class="category"><a href="case-studies-single.html">IT Technology</a></span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-img">
                    <a href="case-studies-style1-2.html"><img src="{{url('frontend/assets/images/project/main-home/4.jpg')}}"
                            alt="images"></a>
                </div>
                <div class="project-content">
                    <h3 class="title"><a href="case-studies-single.html">Growth Strategies</a></h3>
                    <span class="category"><a href="case-studies-single.html">IT Technology</a></span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-img">
                    <a href="case-studies-single.html"><img src="{{url('frontend/assets/images/project/main-home/5.jpg')}}"
                            alt="images"></a>
                </div>
                <div class="project-content">
                    <h3 class="title"><a href="case-studies-single.html">Platform Integration</a></h3>
                    <span class="category"><a href="case-studies-single.html">IT Technology</a></span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-img">
                    <a href="case-studies-style1-2.html"><img src="{{url('frontend/assets/images/project/main-home/6.jpg')}}"
                            alt="images"></a>
                </div>
                <div class="project-content">
                    <h3 class="title"><a href="case-studies-single.html">Innovative Interfaces</a></h3>
                    <span class="category"><a href="case-studies-single.html">IT Technology</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Section End -->

<!-- Pricing section start -->
<div class="rs-pricing pt-255 pb-145 md-pb-80 white-bg">
    <div class="container">
        <div class="sec-title2 text-center mb-45">
            <span class="sub-text">Pricing</span>
            <h2 class="title">
                Our Pricing Plan
            </h2>
            <div class="heading-line">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 md-mb-50">
                <div class="pricing-table">
                    <div class="pricing-badge">
                        Silver
                    </div>
                    <div class="pricing-icon">
                        <img src="{{url('frontend/assets/images/pricing/main-home/icons/1.png')}}" alt="">
                    </div>
                    <div class="pricing-table-price">
                        <div class="pricing-table-bags">
                            <span class="pricing-currency">$</span>
                            <span class="table-price-text">29.99</span>
                            <span class="table-period">Monthly Package</span>
                        </div>
                    </div>
                    <div class="pricing-table-body">
                        <ul>
                            <li><i class="fa fa-check"></i><span>Powerful Admin Panel</span></li>
                            <li><i class="fa fa-check"></i><span>1 Native Android App</span></li>
                            <li><i class="fa fa-close"></i><span>Multi-Language Support</span></li>
                            <li><i class="fa fa-check"></i><span>Support via E-mail and Phone</span></li>
                        </ul>
                    </div>
                    <div class="btn-part">
                        <a class="readon buy-now" href="shop-single.html">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 md-mb-50">
                <div class="pricing-table primary-bg">
                    <div class="pricing-badge white-color-bg">
                        Gold
                    </div>
                    <div class="pricing-icon">
                        <img src="{{url('frontend/assets/images/pricing/main-home/icons/2.png')}}" alt="">
                    </div>
                    <div class="pricing-table-price">
                        <div class="pricing-table-bags">
                            <span class="pricing-currency">$</span>
                            <span class="table-price-text">39.99</span>
                            <span class="table-period">Monthly Package</span>
                        </div>
                    </div>
                    <div class="pricing-table-body">
                        <ul>
                            <li><i class="fa fa-check"></i><span>Powerful Admin Panel</span></li>
                            <li><i class="fa fa-check"></i><span>2 Native Android App</span></li>
                            <li><i class="fa fa-check"></i><span>Multi-Language Support</span></li>
                            <li><i class="fa fa-check"></i><span>Support via E-mail and Phone</span></li>
                        </ul>
                    </div>
                    <div class="btn-part">
                        <a class="readon buy-now" href="shop-single.html">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pricing-table">
                    <div class="pricing-badge">
                        Platinum
                    </div>
                    <div class="pricing-icon">
                        <img src="{{url('frontend/assets/images/pricing/main-home/icons/3.png')}}" alt="">
                    </div>
                    <div class="pricing-table-price">
                        <div class="pricing-table-bags">
                            <span class="pricing-currency">$</span>
                            <span class="table-price-text">79.99</span>
                            <span class="table-period">Monthly Package</span>
                        </div>
                    </div>
                    <div class="pricing-table-body">
                        <ul>
                            <li><i class="fa fa-check"></i><span>Powerful Admin Panel</span></li>
                            <li><i class="fa fa-check"></i><span>3 Native Android App</span></li>
                            <li><i class="fa fa-check"></i><span>Multi-Language Support</span></li>
                            <li><i class="fa fa-check"></i><span>Support via E-mail and Phone</span></li>
                        </ul>
                    </div>
                    <div class="btn-part">
                        <a class="readon buy-now" href="shop-single.html">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing section end -->

<!-- Testimonial Section Start -->
<div class="rs-testimonial main-home gray-color pt-120 pb-120 md-pt-80 md-pb-80">
    <div class="container">
        <div class="sec-title2 text-center mb-45">
            <span class="sub-text">Testimonial</span>
            <h2 class="title testi-title">
                What Saying Our Customers
            </h2>
            <div class="heading-line">

            </div>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false"
            data-nav-speed="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true"
            data-center-mode="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="true"
            data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-mobile-device="1"
            data-mobile-device-nav="false" data-mobile-device-dots="false">
            <div class="testi-item">
                <div class="author-desc">
                    <div class="desc"><img class="quote" src="{{url('frontend/assets/images/testimonial/main-home/quote2.png')}}"
                            alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                        test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology
                        immersion along the information highway.</div>
                    <div class="author-img">
                        <img src="{{url('frontend/assets/images/testimonial/main-home/1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="author-part">
                    <a class="name" href="#">Mariya Khan</a>
                    <span class="designation">CEO, Brick Consulting</span>
                </div>
            </div>
            <div class="testi-item">
                <div class="author-desc">
                    <div class="desc"><img class="quote" src="assets/images/testimonial/main-home/quote2.png"
                            alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                        test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology
                        immersion along the information highway.</div>
                    <div class="author-img">
                        <img src="{{url('frontend/assets/images/testimonial/main-home/2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="author-part">
                    <a class="name" href="#">Sonia Akhter</a>
                    <span class="designation">Graphic Designer</span>
                </div>
            </div>
            <div class="testi-item">
                <div class="author-desc">
                    <div class="desc"><img class="quote" src="assets/images/testimonial/main-home/quote2.png"
                            alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                        test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology
                        immersion along the information highway.</div>
                    <div class="author-img">
                        <img src="{{url('frontend/assets/images/testimonial/main-home/3.jpg')}}" alt="">
                    </div>
                </div>
                <div class="author-part">
                    <a class="name" href="#">Deluar Hossen</a>
                    <span class="designation">Web Developer</span>
                </div>
            </div>
            <div class="testi-item">
                <div class="author-desc">
                    <div class="desc"><img class="quote" src="assets/images/testimonial/main-home/quote2.png"
                            alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                        test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology
                        immersion along the information highway.</div>
                    <div class="author-img">
                        <img src="{{url('frontend/assets/images/testimonial/main-home/4.jpg')}}" alt="">
                    </div>
                </div>
                <div class="author-part">
                    <a class="name" href="#">Asif Ahmed</a>
                    <span class="designation">App Developer</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Section End -->

<!-- Blog Section Start -->
<div id="rs-blog" class="rs-blog pb-120 pt-120 md-pt-80 md-pb-80">
    <div class="container">
        <div class="sec-title2 text-center mb-45">
            <span class="sub-text">Blogs</span>
            <h2 class="title testi-title">
                Read Our Latest Tips & Tricks
            </h2>
            <div class="heading-line">

            </div>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
            data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
            data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
            data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2"
            data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false"
            data-md-device-dots="false">
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="blog-details.html"><img src="{{url('frontend/assets/images/blog/main-home/1.jpg')}}" alt=""></a>
                    <ul class="post-categories">
                        <li><a href="blog-details.html">Software Development</a></li>
                    </ul>
                </div>
                <div class="blog-content">
                    <ul class="blog-meta">
                        <li class="date"><i class="fa fa-calendar-check-o"></i> 16 Nov 2020</li>
                        <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                    </ul>
                    <h3 class="blog-title"><a href="blog-details.html">Necessity May Give Us Your Best Virtual Court
                            System</a></h3>
                    <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                    <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                </div>
            </div>
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="blog-details.html"><img src="{{url('frontend/assets/images/blog/main-home/2.jpg')}}" alt=""></a>
                    <ul class="post-categories">
                        <li><a href="blog-details.html"> Web Development</a></li>
                    </ul>
                </div>
                <div class="blog-content">
                    <ul class="blog-meta">
                        <li class="date"><i class="fa fa-calendar-check-o"></i> 20 December 2020</li>
                        <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                    </ul>
                    <h3 class="blog-title"><a href="blog-details.html">Tech Products That Makes Its Easier to Stay at
                            Home</a></h3>
                    <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                    <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                </div>
            </div>
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="blog-details.html"><img src="{{url('frontend/assets/images/blog/main-home/3.jpg')}}" alt=""></a>
                    <ul class="post-categories">
                        <li><a href="blog-details.html">It Services</a></li>
                    </ul>
                </div>
                <div class="blog-content">
                    <ul class="blog-meta">
                        <li class="date"><i class="fa fa-calendar-check-o"></i> 22 December 2020</li>
                        <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                    </ul>
                    <h3 class="blog-title"><a href="blog-details.html">Open Source Job Report Show More Openings
                            Fewer</a></h3>
                    <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                    <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                </div>
            </div>
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="blog-details.html"><img src="{{url('frontend/assets/images/blog/main-home/4.jpg')}}" alt=""></a>
                    <ul class="post-categories">
                        <li><a href="blog-details.html">Artifical Intelligence</a></li>
                    </ul>
                </div>
                <div class="blog-content">
                    <ul class="blog-meta">
                        <li class="date"><i class="fa fa-calendar-check-o"></i> 26 December 2020</li>
                        <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                    </ul>
                    <h3 class="blog-title"><a href="blog-details.html">Types of Social Proof What its Makes Them
                            Effective</a></h3>
                    <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                    <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                </div>
            </div>
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="blog-details.html"><img src="{{url('frontend/assets/images/blog/main-home/5.jpg')}}" alt=""></a>
                    <ul class="post-categories">
                        <li><a href="blog-details.html">Digital Technology</a></li>
                    </ul>
                </div>
                <div class="blog-content">
                    <ul class="blog-meta">
                        <li class="date"><i class="fa fa-calendar-check-o"></i> 28 December 2020</li>
                        <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                    </ul>
                    <h3 class="blog-title"><a href="blog-details.html">Tech Firms Support Huawei Restriction, Balk at
                            Cost</a></h3>
                    <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                    <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                </div>
            </div>
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="blog-details.html"><img src="{{url('frontend/assets/images/blog/main-home/6.jpg')}}" alt=""></a>
                    <ul class="post-categories">
                        <li><a href="blog-details.html">It Services</a></li>
                    </ul>
                </div>
                <div class="blog-content">
                    <ul class="blog-meta">
                        <li class="date"><i class="fa fa-calendar-check-o"></i> 30 December 2020</li>
                        <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                    </ul>
                    <h3 class="blog-title"><a href="blog-details.html">Servo Project Joins The Linux Foundation Fold
                            Desco</a></h3>
                    <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                    <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End -->

<!-- Partner Start -->
<div class="rs-partner pt-80 pb-70">
    <div class="container">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
            data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="2"
            data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3"
            data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2"
            data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5" data-md-device-nav="false"
            data-md-device-dots="false">
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/1.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/1.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/2.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/2.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/3.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/3.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/4.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/4.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/5.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/5.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/6.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/6.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/7.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/7.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/8.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/8.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="partner-item">
                <div class="logo-img">
                    <a href="https://rstheme.com/">
                        <img class="hover-logo" src="{{url('frontend/assets/images/partner/9.png')}}" alt="">
                        <img class="main-logo" src="{{url('frontend/assets/images/partner/9.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection