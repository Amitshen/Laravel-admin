
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{(isset($siteSetting['favicon']))?url('assets/favicon/'.$siteSetting['favicon']):''}}">
			
		<!-- Custom CSS -->
		<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
        @yield('styles')
    </head>

<body>

    <div class="preloader"></div>
    <div id="main-wrapper">
        @include('partials.header')
        <div class="clearfix"></div>

        <div class="bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="text-light">Home</a></li>
                                <li class="breadcrumb-item active theme-cl" aria-current="page">Error Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <section>
            <div class="container">
            
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                        <!-- Icon -->
                        <div class=""><img src="{{url('assets/img/404.png')}}" class="img-fluid" alt=""></div>
                        <!-- Heading -->
                        <h1 class="mb-3 ft-bold">@yield('code')</h1>
                        <!-- Text -->
                        <h5 class="ft-medium fs-md mb-5">@yield('message')</h5>
                        <!-- Button -->
                        <a class="btn rounded theme-bg text-light" href="#">Go To Home Page</a>
                    </div>
                </div>
                
            </div>
        </section>

        @include('partials.footer')

    </div>

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
