<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  
  <div class="app-brand demo ">
    <a href="<?php echo e(route('dashboard')); ?>" class="app-brand-link">
      <img src="<?php echo e(asset('assets/logo/logo-simplified.png')); ?>" class="mt-1" alt="RBA Logo" width="170">
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
      <span class="menu-header-text">My Data</span>
    </li>
    <!-- Dashboard -->
    <li class="menu-item <?php echo e(Request::routeIs('myProfile') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('myProfile')); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="My Profile">My Profile</div>
      </a>
    </li>
    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>
    <!-- Dashboard -->
    <li class="menu-item <?php echo e(Request::routeIs('dashboard') ? 'active' : ''); ?>">
      <a href="<?php echo e(route('dashboard')); ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <!-- Users -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-users')): ?><li class="menu-item <?php echo e(Request::routeIs('users') ? 'open' : (Request::routeIs('users.org') ? 'open' : '')); ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div data-i18n="Users">Users</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?php echo e(Request::routeIs('users') ? 'active' : ''); ?>">
          <a href="<?php echo e(route('users.ind')); ?>" class="menu-link">
            <div data-i18n="Individuals">Individuals</div>
          </a>
        </li>
        <li class="menu-item <?php echo e(Request::routeIs('users.org') ? 'active' : ''); ?>">
          <a href="<?php echo e(route('users.org')); ?>" class="menu-link">
            <div data-i18n="Organizations">Organizations</div>
          </a>
        </li>
        <li class="menu-item <?php echo e(Request::routeIs('deactivated') ? 'active' : ''); ?>">
          <a href="<?php echo e(route('deactivated')); ?>" class="menu-link">
            <div data-i18n="Inactive Users">Inactive Users</div>
          </a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
    <!-- Disciplinary Cases -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-dislike"></i>
        <div data-i18n="Disciplinary Cases">Disciplinary Cases</div>
      </a>
    </li>

    <!-- Probono Cases -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link">
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
  </ul>
  
  

</aside>
<!-- / Menu -->
<?php /**PATH C:\xampp\htdocs\rwandabar\resources\views/components/user-sidebar.blade.php ENDPATH**/ ?>