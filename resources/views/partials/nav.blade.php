<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item @yield('dashboardActive')">
                <a href="{{ route('dashboard.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            </li>
            @if (Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
                <li class="menu-item @yield('companyActive')">
                    <a href="{{ route('company.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-building"></i>
                        <div data-i18n="Company">Company</div>
                    </a>
                </li>
            @endif
            <li class="menu-item @yield('employeeActive')">
                <a href="{{ route('employee.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Employees">Employees</div>
                </a>
            </li>
            @if (Auth::user()->role_id == 2)
                <li class="menu-item @yield('subscriptionActive')">
                    <a href="{{ route('company.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                        <div data-i18n="Subscriptions">Subscriptions</div>
                    </a>
                </li>
                <li class="menu-item @yield('templateActive')">
                    <a href="{{ route('template.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                        <div data-i18n="Card Templates">Card Templates</div>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
                <li class="menu-item @yield('cardActive')">
                    <a href="{{ route('card.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-id-card"></i>
                        <div data-i18n="Cards">Cards</div>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
<!-- / Menu -->
