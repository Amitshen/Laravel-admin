<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('frontend.includes.header')
</head>

<body class="defult-home">

    <!--Preloader area start here-->
    <div id="loader" class="loader">
        <div class="loader-container"></div>
    </div>
    <!--Preloader area End here-->

    <!-- Main content Start -->
    <div class="main-content">
        <!--Full width header Start-->
        <div class="full-width-header">
            @include('frontend.includes.navbar')
        </div>
        @yield('content')
    </div>
    @include('frontend.includes.footer')
</body>

</html>