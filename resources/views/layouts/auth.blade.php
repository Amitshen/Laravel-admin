<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ isset($title)?$title.' - '.trans('panel.site_title'):trans('panel.site_title') }}</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{(isset($siteSetting['favicon']))?url('assets/favicon/'.$siteSetting['favicon']):''}}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('admin-assets/css/demo.css') }}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/pages/page-auth.css') }}" />
        <!-- Helpers -->
        <script src="{{ asset('admin-assets/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('admin-assets/js/config.js') }}"></script>

        @yield('styles')
    </head>
<body>

    <div class="container-xxl">
        @yield('content')
    </div>
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin-assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin-assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin-assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    
    @yield('scripts')
</body>

</html>
