<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ isset($title)?$title.' - '.(isset($siteSetting['site_title'])?$siteSetting['site_title']:trans('panel.site_title')):(isset($siteSetting['site_title'])?$siteSetting['site_title']:trans('panel.site_title')) }}</title>

		<!-- Favicon favicon-->
		<link rel="shortcut icon" type="image/x-icon" href="{{url('assets/favicon/'.(isset($siteSetting['favicon'])?$siteSetting['favicon']:''))}}">
			
		<!-- Custom CSS -->
		<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
        @yield('styles')
    </head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader"></div>

    <!-- ============================================================== -->
    <!-- Main wrapper -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        @include('partials.header')
        <div class="clearfix"></div>
        @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('danger'))
        <div class="alert alert-info">{{ Session::get('danger') }}</div>
        @endif
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        @yield('content')

        {{-- <!-- ======================= Newsletter Start ============================ -->
        <section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
            <div class="container py-5">
                
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="sec_title position-relative text-center mb-5">
                            <h6 class="text-light mb-0">Subscribr Now</h6>
                            <h2 class="ft-bold text-light">Get All Updates & Advance Offers</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
                        <form class="bg-white rounded p-1">
                            <div class="row no-gutters">
                                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="form-control b-0" placeholder="Enter Your Email Address">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                                    <div class="form-group mb-0 position-relative">
                                        <button class="btn full-width btn-height theme-bg text-light fs-md" type="button">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- ======================= Newsletter Start ============================ --> --}}

        <!-- ============================ Footer Start ================================== -->
        @include('partials.footer')
        <!-- ============================ Footer End ================================== -->
        
        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
            <div class="modal-dialog login-pop-form" role="document">
                <div class="modal-content" id="loginmodal">
                    <div class="modal-headers">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span class="ti-close"></span>
                        </button>
                        </div>
                
                    <div class="modal-body p-5">
                        <div class="text-center mb-4">
                            <h4 class="m-0 ft-medium">Login Your Account</h4>
                        </div>
                        
                        <form class="submit-form">				
                            <div class="form-group">
                                <label class="mb-1">User Name</label>
                                <input type="text" class="form-control rounded bg-light" placeholder="Username*">
                            </div>
                            
                            <div class="form-group">
                                <label class="mb-1">Password</label>
                                <input type="password" class="form-control rounded bg-light" placeholder="Password*">
                            </div>
                            
                            <div class="form-group">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="flex-1">
                                        <input id="dd" class="checkbox-custom" name="dd" type="checkbox" checked>
                                        <label for="dd" class="checkbox-custom-label">Remember Me</label>
                                    </div>	
                                    <div class="eltio_k2">
                                        <a href="#" class="theme-cl">Lost Your Password?</a>
                                    </div>	
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">Sign In</button>
                            </div>
                            
                            <div class="form-group text-center mb-0">
                                <p class="extra">Or login with</p>
                                <div class="option-log">
                                    <div class="single-log-opt"><a href="javascript:void(0);" class="log-btn"><img src="assets/img/c-1.png" class="img-fluid" alt="" />Login with Google</a></div>
                                    <div class="single-log-opt"><a href="javascript:void(0);" class="log-btn"><img src="assets/img/facebook.png" class="img-fluid" alt="" />Login with Facebook</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        
        <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.js') }}"></script> 
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>		
    <script src="{{ asset('assets/js/jQuery.style.switcher.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @yield('scripts')
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
</body>

</html>
