<footer class="light-footer skin-light-footer style-2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="footer_widget">
                        <img src="{{url('assets/logo/'.(isset($siteSetting['logo'])?$siteSetting['logo']:''))}}" class="img-footer small mb-2" alt="" />
                        
                        <div class="address mt-2">
                            {!! ($siteSetting['site_address'])??'' !!}
                        </div>
                        <div class="address mt-3">
                            {{($siteSetting['contact'])??''}}<br>{{($siteSetting['email'])??''}}
                        </div>
                        <div class="address mt-2">
                            <ul class="list-inline">
                                @isset($siteSetting['facebook'])<li class="list-inline-item"><a href="{{$siteSetting['facebook']}}" class="theme-cl"><i class="lni lni-facebook-filled"></i></a></li>@endisset
                                @isset($siteSetting['twitter'])<li class="list-inline-item"><a href="{{$siteSetting['twitter']}}" class="theme-cl"><i class="lni lni-twitter-filled"></i></a></li>@endisset
                                @isset($siteSetting['instagram'])<li class="list-inline-item"><a href="{{$siteSetting['instagram']}}" class="theme-cl"><i class="lni lni-instagram-filled"></i></a></li>@endisset
                                @isset($siteSetting['linked-in'])<li class="list-inline-item"><a href="{{$siteSetting['linked-in']}}" class="theme-cl"><i class="lni lni-linkedin-original"></i></a></li>@endisset
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">Main Navigation</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Explore Listings</a></li>
                            <li><a href="#">Browse Authors</a></li>
                            <li><a href="#">Submit Listings</a></li>
                            <li><a href="#">Shortlisted</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                        
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">Business Owners</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Browse Categories</a></li>
                            <li><a href="#">Payment Links</a></li>
                            <li><a href="#">Saved Places</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
        
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">About Company</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Who We'r?</a></li>
                            <li><a href="#">Our Mission</a></li>
                            <li><a href="#">Our team</a></li>
                            <li><a href="#">Packages</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">Helpful Topics</h4>
                        <ul class="footer-menu">
                            <li><a href="{{route('single-page','about-us')}}">About Us</a></li>
                            <li><a href="{{route('single-page','privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('single-page','terms-and-conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('single-page','faq')}}">FAQ's Page</a></li>
                            <li><a href="{{route('single-page','contact-us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom br-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">©  <script>
                        document.write(new Date().getFullYear());
                      </script>
                      All Rights Reserved | Developed by <a class="text-danger" href="https://inditechitsolution.com/">IndiTech IT Solution</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>