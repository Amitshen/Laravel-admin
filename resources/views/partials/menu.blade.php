<div class="app-brand demo">
    <a href="{{url('/dashboard')}}" class="app-brand-link">
        {{-- <span class="app-brand-logo demo"></span> --}}
        <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ trans('panel.site_title') }}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>
<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a href="{{ route("dashboard.home") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="{{ trans('global.dashboard') }}">{{ trans('global.dashboard') }}</div>
        </a>
    </li>

    {{-- <li
        class="menu-item {{ request()->is('dashboard/products') || request()->is('dashboard/products/*') ? 'active' : '' }}">
        <a href="{{ route(" dashboard.products.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-package"></i>
            <div data-i18n="{{ trans('global.products') }}">{{ trans('global.products') }}</div>
        </a>
    </li>

    <li
        class="menu-item {{ request()->is('dashboard/categories') || request()->is('dashboard/categories/*') ? 'active' : '' }}">
        <a href="{{ route(" dashboard.categories.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-briefcase"></i>
            <div data-i18n="{{ trans('global.categories') }}">{{ trans('global.categories') }}</div>
        </a>
    </li>

    <li
        class="menu-item {{ request()->is('dashboard/attribute-values') || request()->is('dashboard/attribute-values/*') || request()->is('dashboard/attributes') || request()->is('dashboard/attributes/*') ? 'active' : '' }}">
        <a href="{{ route(" dashboard.attributes.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-grid"></i>
            <div data-i18n="{{ trans('global.attributes') }}">{{ trans('global.attributes') }}</div>
        </a>
    </li>

    <li
        class="menu-item {{ request()->is('dashboard/brands') || request()->is('dashboard/brands/*') ? 'active' : '' }}">
        <a href="{{ route(" dashboard.brands.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
            <div data-i18n="{{ trans('global.brands') }}">{{ trans('global.brands') }}</div>
        </a>
    </li>

    <li
        class="menu-item {{ request()->is('dashboard/cities') || request()->is('dashboard/cities/*') ? 'active' : '' }}">
        <a href="{{ route(" dashboard.cities.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-city"></i>
            <div data-i18n="{{ trans('global.cities') }}">{{ trans('global.cities') }}</div>
        </a>
    </li>

    <li
        class="menu-item {{ request()->is('dashboard/business') || request()->is('dashboard/business/*') ? 'active' : '' }}">
        <a href="{{ route(" dashboard.business.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-business"></i>
            <div data-i18n="{{ trans('global.business_types') }}">{{ trans('global.business') }}</div>
        </a>
    </li> --}}


    <li class="menu-item {{ request()->is('dashboard/pages') || request()->is('dashboard/pages/*') ? 'active' : '' }}">
        <a href="{{ route("dashboard.pages.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="{{ trans('global.pages') }}">{{ trans('global.pages') }}</div>
        </a>
    </li>

    <li
        class="menu-item {{ request()->is('dashboard/clients') || request()->is('dashboard/clients/*') ? 'active' : '' }}">
        <a href="{{ route("dashboard.clients.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-message-dots"></i>
            <div data-i18n="{{ trans('global.enquiries') }}">Clients</div>
        </a>
    </li>

    <li
        class="menu-item {{ request()->is('dashboard/projects') || request()->is('dashboard/projects/*') ? 'active' : '' }}">
        <a href="{{ route("dashboard.projects.index") }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-message-dots"></i>
            <div data-i18n="{{ trans('global.enquiries') }}">Projects</div>
        </a>
    </li>

    @can('user_management_access')
    <li
        class="menu-item {{ request()->is('dashboard/permissions*') || request()->is('dashboard/users*')? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="{{ trans('cruds.userManagement.title') }}">{{ trans('cruds.userManagement.title') }}</div>
        </a>
        <ul class="menu-sub">
            {{-- @can('permission_access')
            <li
                class="menu-item {{ request()->is('dashboard/permissions') || request()->is('dashboard/permissions/*') ? 'active' : '' }}">
                <a href="{{ route(" dashboard.permissions.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('cruds.permission.title') }}">{{ trans('cruds.permission.title') }}</div>
                </a>
            </li>
            @endcan
            @can('role_access')
            <li
                class="menu-item {{ request()->is('dashboard/roles') || request()->is('dashboard/roles/*') ? 'active' : '' }}">
                <a href="{{ route(" dashboard.roles.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('cruds.role.title') }}">{{ trans('cruds.role.title') }}</div>
                </a>
            </li>
            @endcan --}}
            @can('user_access')
            <li
                class="menu-item {{ request()->is('dashboard/users') || request()->is('dashboard/users/*') ? 'active' : '' }}">
                <a href="{{ route("dashboard.users.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('cruds.user.title') }}">{{ trans('cruds.user.title') }}</div>
                </a>
            </li>
            @endcan

        </ul>
    </li>
    @endcan

    @can('can_client_dashboard baje')
    <li
        class="menu-item {{ request()->is('dashboard/permissions*') || request()->is('dashboard/users*')? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="{{ trans('cruds.userManagement.title') }}">Way to jumboo and kasmir</div>
        </a>
        <ul class="menu-sub">
            {{-- @can('permission_access')
            <li
                class="menu-item {{ request()->is('dashboard/permissions') || request()->is('dashboard/permissions/*') ? 'active' : '' }}">
                <a href="{{ route(" dashboard.permissions.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('cruds.permission.title') }}">{{ trans('cruds.permission.title') }}</div>
                </a>
            </li>
            @endcan
            @can('role_access')
            <li
                class="menu-item {{ request()->is('dashboard/roles') || request()->is('dashboard/roles/*') ? 'active' : '' }}">
                <a href="{{ route(" dashboard.roles.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('cruds.role.title') }}">{{ trans('cruds.role.title') }}</div>
                </a>
            </li>
            @endcan --}}
            @can('user_access')
            <li
                class="menu-item {{ request()->is('dashboard/users') || request()->is('dashboard/users/*') ? 'active' : '' }}">
                <a href="{{ route("dashboard.users.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('cruds.user.title') }}">{{ trans('cruds.user.title') }}</div>
                </a>
            </li>
            @endcan

        </ul>
    </li>
    @endcan

    <li
        class="menu-item {{ request()->is('dashboard/settings') || request()->is('dashboard/mails-template') || request()->is('dashboard/mails-template/*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cog"></i>
            <div data-i18n="{{ trans('global.settings') }}">{{ trans('global.settings') }}</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->is('dashboard/settings') ? 'active' : '' }}">
                <a href="{{ route("dashboard.settings.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('global.settings') }}">{{ trans('global.settings') }}</div>
                </a>
            </li>
            <li
                class="menu-item {{ request()->is('dashboard/mails-template') || request()->is('dashboard/mails-template/*') ? 'active' : '' }}">
                <a href="{{ route("dashboard.mails-template.index") }}" class="menu-link">
                    <div data-i18n="{{ trans('global.mail-templates') }}">{{ trans('global.mail-templates') }}</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-item">
        <a href="#" class="menu-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="menu-icon tf-icons bx bx-log-out"></i>
            <div data-i18n="Basic">{{ trans('global.logout') }}</div>
        </a>
    </li>

</ul>