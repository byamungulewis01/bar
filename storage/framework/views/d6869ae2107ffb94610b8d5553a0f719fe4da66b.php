<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        <li class="nav-item"><a class="nav-link <?php echo e(Request::routeIs('profile') ? 'active' : ''); ?>" href="<?php echo e(route('profile',$user->id)); ?>"><i class='ti-xs ti ti-user-check me-1'></i> General Info</a></li>
        <li class="nav-item"><a class="nav-link <?php echo e(Request::routeIs('user.discipline') ? 'active' : ''); ?>" href="<?php echo e(route('user.discipline' ,$user->id)); ?>"><i class='ti-xs ti ti-users me-1'></i> Disciplinary Records</a></li>
        <li class="nav-item"><a class="nav-link" href="pages-profile-projects.html"><i class='ti-xs ti ti-layout-grid me-1'></i> R.B.A Meetings</a></li>
        <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i class='ti-xs ti ti-link me-1'></i> Legal Education</a></li>
        <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i class='ti-xs ti ti-gavel me-1'></i> Pro Bono Publico</a></li>
      </ul>
    </div>
  </div>
  <!--/ Navbar pills --><?php /**PATH C:\Users\HP\Documents\Lewis\bar\resources\views/users/navigation.blade.php ENDPATH**/ ?>