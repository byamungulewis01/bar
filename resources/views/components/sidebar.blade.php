<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <img src="{{ asset('assets/logo/logo-simplified.png') }}" class="mt-1" alt="RBA Logo" width="170">
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>
    <!-- Dashboard -->
    <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
      <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <!-- Users -->
    <li class="menu-item {{ Request::routeIs('users.ind') ? 'open' : (Request::routeIs('users.org') ? 'open' : '') }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Users">Users</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ Request::routeIs('users.ind') ? 'active' : '' }}">
          <a href="{{ route('users.ind') }}" class="menu-link">
            <div data-i18n="Individuals">Individuals</div>
          </a>
        </li>
        <li class="menu-item {{ Request::routeIs('users.org') ? 'active' : '' }}">
          <a href="{{ route('users.org') }}" class="menu-link">
            <div data-i18n="Organizations">Organizations</div>
          </a>
        </li>
        <li class="menu-item {{ Request::routeIs('deactivated') ? 'active' : '' }}">
          <a href="{{ route('deactivated') }}" class="menu-link">
            <div data-i18n="Inactive Users">Inactive Users</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Meetings -->
    <li class="menu-item {{ Request::routeIs('meetings.index') || Request::routeIs('meetings.create') ? 'active' : '' }}">
      <a href="{{ route('meetings.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-brand-zoom"></i>
        <div data-i18n="Meetings">Meetings</div>
      </a>
    </li>

    <!-- Disciplinary Cases -->
    <li class="menu-item {{ Request::routeIs('cases.index') ? 'active' : '' }}">
      <a href="{{ route('cases.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-dislike"></i>
        <div data-i18n="Disciplinary Cases">Disciplinary Cases</div>
      </a>
    </li>

    <!-- Probono Cases -->
    <li class="menu-item {{ Request::routeIs('probono.index') ? 'active' : '' }}">
      <a href="{{ route('probono.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-gavel"></i>
        <div data-i18n="Pro Bono Cases">Pro Bono Cases</div>
      </a>
    </li>

    <!-- Finance -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon tf-icons ti ti-report-money"></i>
        <div data-i18n="Finance">Finance</div>
      </a>
    </li>

    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Extra</span>
    </li>
    <li class="menu-item">
      <a href="{{ route('roles') }}" class="menu-link">
        <i class='menu-icon tf-icons ti ti-settings'></i>
        <div data-i18n="Roles & Permissions">Roles & Permissions</div>
      </a>
    </li>
    <!-- System settings -->
    <li class="menu-item {{ Request::routeIs('settings') ? 'active' : '' }}">
      <a href="{{ route('settings') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-adjustments"></i>
        <div data-i18n="System settings">System settings</div>
      </a>
    </li>
  </ul>
  
  

</aside>
<!-- / Menu -->
