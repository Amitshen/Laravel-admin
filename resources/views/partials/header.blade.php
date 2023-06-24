<!-- Start Navigation -->
<div class="header header-light head-shadow dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header"> 
                <a class="nav-brand" href="{{url('/')}}">
                    <img src="{{url('assets/logo/'.(isset($siteSetting['logo'])?$siteSetting['logo']:''))}}" class="logo" alt="" />
                    <span style="font-size: 16px;">{{isset($siteSetting['site_title'])?$siteSetting['site_title']:''}}</span>
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="theme-cl fs-lg">
                                <i class="lni lni-user"></i>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="add-listing.html" class="crs_yuo12 w-auto text-white theme-bg">
                                <span class="embos_45"><i class="fas fa-plus me-2"></i>Add Listing</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu" style="float:right;">
                    {{-- <li class="{{(request()->is('/'))?'active':''}}"><a href="{{url('/')}}">Home</a></li> --}}
                    {{-- <li class="{{(request()->is('listings'))?'active':''}}"><a href="{{route('listings')}}">Listings</a></li> --}}
                    <li class="{{(request()->is('page/about-us'))?'active':''}}"><a href="{{route('single-page','about-us')}}">About Us</a></li>
                    <li class="{{(request()->is('page/contact-us'))?'active':''}}"><a href="{{route('contact-us')}}">Contact Us</a></li>
                </ul>

                {{-- <ul class="nav-menu nav-menu-social align-to-right">
                    @if (Route::has('login'))
                    @auth
                    <li>
                        @if(request()->is('user-dashboard/*'))
                        <a href="/#logout" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>
                        @else 
                        <a href="{{ (auth()->user()->is_partner)?url('/user-dashboard'):url('/user-dashboard/profile') }}">{{(auth()->user()->is_partner)?'Dashboard':'My Account'}}</a>
                        @endif
                    </li> 
                    @else
                    <li>
                        <a href="{{ route('user-login') }}" class="ft-bold">
                            <i class="fas fa-sign-in-alt me-1 theme-cl"></i>Sign In
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif 
                    @endauth
                    @endif
                    <li class="add-listing">
                        @auth
                        <a href="{{ (auth()->user()->is_partner)?route("user.products.create"):route("user.business-profile") }}">
                            <i class="fas fa-plus me-2"></i>Add Listing
                        </a>
                        @else
                        <a href="{{ route("user-login") }}">
                            <i class="fas fa-plus me-2"></i>Add Listing
                        </a>
                        @endauth
                    </li> 
                </ul> --}}
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->