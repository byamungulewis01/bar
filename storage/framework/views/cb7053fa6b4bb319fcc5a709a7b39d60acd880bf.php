<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        <li class="nav-item"><a class="nav-link <?php echo e(Request::routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>"><i class='ti-xs ti ti-user-check me-1'></i> General Info</a></li>
        <li class="nav-item"><a class="nav-link <?php echo e(Request::routeIs('mydiscipline') ? 'active' : ''); ?> <?php echo e(Request::routeIs('discipline_delails') ? 'active' : ''); ?>" href="<?php echo e(route('mydiscipline')); ?>"><i class='ti-xs ti ti-users me-1'></i> Disciplinary Records</a></li>
        <li class="nav-item"><a class="nav-link <?php echo e(Request::routeIs('mymeetings') ? 'active' : ''); ?>" href="<?php echo e(route('mymeetings')); ?>"><i class='ti-xs ti ti-layout-grid me-1'></i> R.B.A Meetings</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class='ti-xs ti ti-link me-1'></i> Legal Education</a></li>
        <li class="nav-item"><a class="nav-link <?php echo e(Request::routeIs('myprobono') ? 'active' : ''); ?> <?php echo e(Request::routeIs('probono-details') ? 'active' : ''); ?>" href="<?php echo e(route('myprobono')); ?>"><i class='ti-xs ti ti-gavel me-1'></i> Pro Bono Publico</a></li>
      </ul>
    </div>
  </div>
  <!--/ Navbar pills --><?php /**PATH C:\xampp\htdocs\rba\resources\views/myprofile/navigation.blade.php ENDPATH**/ ?>