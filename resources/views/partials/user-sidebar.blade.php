<a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
    <i class="fas fa-bars me-2"></i>Dashboard Navigation
</a>
<div class="collapse" id="MobNav">
    <div class="goodup-dashboard-nav sticky-top">
        <div class="goodup-dashboard-inner">
            @if(auth()->user()->is_partner)
            <ul data-submenu-title="Business Dashboard">
                <li class="{{ request()->is('user-dashboard') ? 'active' : '' }}"><a href="{{route('user.user-dashboard')}}"><i class="lni lni-dashboard me-2"></i>Dashboard</a></li>
                <li class="{{ (request()->is('user-dashboard/products') || request()->is('user-dashboard/products/*/edit')) ? 'active' : '' }}"><a href="{{route('user.products.index')}}"><i class="lni lni-files me-2"></i>My Products</a></li>
                <li class="{{ request()->is('user-dashboard/products/create') ? 'active' : '' }}"><a href="{{ route("user.products.create") }}"><i class="lni lni-add-files me-2"></i>Add Products</a></li>
                <li class="{{ request()->is('user-dashboard/pending-products') ? 'active' : '' }}"><a href="{{ route("user.pending-products") }}"><i class="lni lni-bookmark me-2"></i>Pending Products</a></li>
                <li class="{{ request()->is('user-dashboard/business-profile') ? 'active' : '' }}"><a href="{{ route("user.business-profile") }}"><i class="lni lni-restaurant me-2"></i>Business Profile</a></li>
                <li class=""><a href="{{(isset(auth()->user()->business_slug) && auth()->user()->business_slug != '')?route('single-business', auth()->user()->business_slug):route("user.business-profile")}}"><i class="lni lni-restaurant me-2"></i>View Business</a></li>
            </ul>
            @endif
            <ul data-submenu-title="My Accounts">
                <li class="{{ request()->is('user-dashboard/profile') ? 'active' : '' }}"><a href="{{route('user.profile')}}"><i class="lni lni-user me-2"></i>My Profile </a></li>
                <li class="{{ request()->is('user-dashboard/change-password') ? 'active' : '' }}"><a href="{{route('user.change-password')}}"><i class="lni lni-lock-alt me-2"></i>Change Password</a></li>
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><i class="lni lni-power-switch me-2"></i>Log Out</a></li>
            </ul>
            
        </div>					
    </div>
</div>