

<?php $__env->startSection('page_name'); ?>
  profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
        <!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
      <span class="text-muted fw-light">User Profile /</span> Profile
    </h4>
  
    <!-- Header -->
    <div class="row">
      <div class="col-12 mt-4">
        <div class="card mb-4 mt-5">
          <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
              <img src="<?php echo e(asset('assets/img/avatars/')); ?>/<?php echo e($user->photo); ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
            </div>
            <div class="flex-grow-1 mt-5 pt-5 mt-sm-5">
              <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                <div class="user-profile-info mt-3">
                  <h4><?php echo e($user->name); ?></h4>
                  <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                    <li class="list-inline-item">
                      <i class='ti ti-id'></i> ROLL NUMBER: <span class="fw-bold"><?php echo e($user->regNumber); ?></span>
                    </li>
                    <li class="list-inline-item">
                      <i class='ti ti-map-pin'></i> DISTRICT: <span class="fw-bold"><?php echo e($user->district); ?></span>
                    </li>
                    <li class="list-inline-item">
                      <i class='ti ti-sitemap'></i> CATEGORY: <span class="fw-bold"><?php echo e($user->category); ?></span></li>
                  </ul>
                </div>
                <a href="javascript:void(0)" class="btn btn-<?php echo e(badge($user->practicing)); ?>">
                  <?php echo e(userStatus($user->practicing)); ?> <i class="ti ti-<?php echo e(icon($user->practicing)); ?> ps-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Header -->

    
<!-- Navbar pills -->
<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class='ti-xs ti ti-user-check me-1'></i> General Info</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-teams.html"><i class='ti-xs ti ti-users me-1'></i> Disciplinary Records</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-projects.html"><i class='ti-xs ti ti-layout-grid me-1'></i> R.B.A Meetings</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i class='ti-xs ti ti-link me-1'></i> Legal Education</a></li>
      <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i class='ti-xs ti ti-gavel me-1'></i> Pro Bono Publico</a></li>
    </ul>
  </div>
</div>
<!--/ Navbar pills -->

<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <?php echo QrCode::size(200)->margin(0)->generate("$user->regNumber"); ?>

          </div>
        </div>
        <small class="card-text text-uppercase">About</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span> <span><?php echo e($user->name); ?></span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span> <span class="badge bg-label-<?php echo e(badge($user->practicing)); ?>"><?php echo e(userStatus($user->practicing)); ?></span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span> <span <?php if(!$user->getRoleNames()->count()): ?> class="fst-italic" <?php endif; ?>><?php echo e($user->getRoleNames()->count() == 0 ? 'No Role Assigned' : $user->getRoleNames()); ?></span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-flag"></i><span class="fw-bold mx-2">District:</span> <span><?php echo e($user->district); ?></span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-file-description"></i><span class="fw-bold mx-2">Admission Status:</span> <span><?php echo e(userCategory($user->practicing)); ?></span></li>
        </ul>
        <small class="card-text text-uppercase">Contacts</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span> <span><?php echo e($user->phone[0]->phone); ?></span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span> <span><?php echo e($user->email); ?></span></li>
        </ul>
        <small class="card-text text-uppercase"></small>
        <div class="d-flex justify-content-center">
          <a href="javascript:;" data-bs-target="#assignRole" data-bs-toggle="modal" class="btn btn-primary me-3 waves-effect waves-light">Assign Role</a>
          <a href="javascript:;" data-bs-target="#changeStatus" data-bs-toggle="modal"class="btn btn-label-danger suspend-user waves-effect">Change Status</a>
          <div class="modal fade" id="assignRole" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="text-center mb-4">
                    <h3 class="mb-2">Assign Role to <?php echo e($user->name); ?></h3>
                    <p class="text-muted"><?php echo e($user->name); ?> will have permissions according to role assigned to</p>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="roles" class="form-label">Select Roles to assign</label>
                      <input id="roles" name="roles" class="form-control" placeholder=" - Select Roles -" value="<?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($role); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="changeStatus" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="post">
                  <?php echo csrf_field(); ?>
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Change user status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php if($errors->any()): ?>
                      <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <span class="alert-icon text-danger me-2">
                          <i class="ti ti-ban ti-xs"></i>
                        </span>
                        <ul class="p-0 m-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      </div>
                    <?php endif; ?>
                    <div class="row">
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Name</label>
                        <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" disabled value="<?php echo e($user->name); ?>">
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="regNumber" class="form-label">Reg Number</label>
                        <input type="text" id="regNumber" class="form-control" value="<?php echo e($user->regNumber); ?>" disabled>
                      </div>
                      <div class="col mb-0">
                        <label for="date" class="form-label">Admission Date</label>
                        <input type="text" id="date" name="date" class="form-control" placeholder="Month day, Year">
                      </div>
                    </div>
                    <div class="row g-2 mt-2">
                      <div class="col mb-0">
                        <label for="status" class="form-label">Admission Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="" selected> - Select - </option>
                            <option <?php if($user->status=="1"): ?> selected <?php endif; ?> value="1">Advocate</option>
                            <option <?php if($user->status=="2"): ?> selected <?php endif; ?> value="2">Intern Advocate</option>
                            <option <?php if($user->status=="3"): ?> selected <?php endif; ?> value="3">Support Staff</option>
                            <option <?php if($user->status=="4"): ?> selected <?php endif; ?> value="4">Technical Staff</option>
                          </select>
                      </div>
                      <div class="col mb-0">
                        <label for="practicing" class="form-label">Practicing Status</label>
                        <select id="practicing" name="practicing" class="form-select">
                            <option value="" selected> - Select - </option>
                            <option <?php if($user->practicing=="1"): ?> selected <?php endif; ?> value="1">N/A</option>
                            <option <?php if($user->practicing=="2"): ?> selected <?php endif; ?> value="2">Active</option>
                            <option <?php if($user->practicing=="3"): ?> selected <?php endif; ?> value="3">Inactive</option>
                            <option <?php if($user->practicing=="4"): ?> selected <?php endif; ?> value="4">Suspended</option>
                            <option <?php if($user->practicing=="5"): ?> selected <?php endif; ?> value="5">Struck Off</option>
                            <option <?php if($user->practicing=="6"): ?> selected <?php endif; ?> value="6">Deceased</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-between">
                    <button type="button" data-bs-target="#deleteModal" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-danger waves-effect waves-light float-start">Deactivate User</button>
                    <div>
                      <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal fade" id="deleteModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Please confirm that you would like to deactivate this user?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary waves-effect" data-bs-target="#changeStatus" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes, Deactivate</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ About User -->
    <!-- Profile Overview -->
    <div class="card mb-4">
      <div class="card-body">
        <p class="card-text text-uppercase">Area Of Practice</p>
        <ul class="list-unstyled mb-0">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-bold mx-2">Task Compiled:</span> <span>13.5k</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-layout-grid"></i><span class="fw-bold mx-2">Projects Compiled:</span> <span>146</span></li>
          <li class="d-flex align-items-center"><i class="ti ti-users"></i><span class="fw-bold mx-2">Connections:</span> <span>897</span></li>
        </ul>
      </div>
    </div>
    <!--/ Profile Overview -->
  </div>
  <div class="col-xl-8 col-lg-7 col-md-7">
    <div class="card mb-4">
      <h5 class="card-header">Recent Devices</h5>
      <?php echo e($logs); ?>

      <div class="table-responsive">
        <table class="table border-top">
          <thead>
            <tr>
              <th class="text-truncate">Browser</th>
              <th class="text-truncate">IP Address</th>
              <th class="text-truncate">Log in success</th>
              <th class="text-truncate">Recent Activities</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="text-truncate"><i class="ti ti-brand-windows text-info ti-xs me-2"></i> <strong>Chrome on Windows</strong></td>
              <td class="text-truncate"><?php echo e($log->ip_address); ?></td>
              <td class="text-truncate"><span class="badge bg-label-<?php echo e($log->login_successful ? 'success' : 'danger'); ?>"><?php echo e($log->login_successful ? 'Success' : 'Failed'); ?></span></td>
              <td class="text-truncate"><?php echo e($log->login_at->format('d, M Y H:i')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <!-- Connections -->
      <div class="col-lg-12 col-xl-6">
        <div class="card card-action mb-4">
          <div class="card-header align-items-center">
            <h5 class="card-action-title mb-0">Phone Numbers</h5>
            <div class="card-action-element">
              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="javascript:void(0);">Share connections</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Cecilia Payne</h6>
                      <small class="text-muted">45 Connections</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <button class="btn btn-label-primary btn-icon btn-sm"><i class="ti ti-user-check ti-xs"></i></button>
                  </div>
                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Curtis Fletcher</h6>
                      <small class="text-muted">1.32k Connections</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <button class="btn btn-primary btn-icon btn-sm"><i class="ti ti-user-x ti-xs"></i></button>
                  </div>
                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/avatars/10.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Alice Stone</h6>
                      <small class="text-muted">125 Connections</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <button class="btn btn-primary btn-icon btn-sm"><i class="ti ti-user-x ti-xs"></i></button>
                  </div>
                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Darrell Barnes</h6>
                      <small class="text-muted">456 Connections</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <button class="btn btn-label-primary btn-icon btn-sm"><i class="ti ti-user-check ti-xs"></i></button>
                  </div>
                </div>
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/avatars/12.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Eugenia Moore</h6>
                      <small class="text-muted">1.2k Connections</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <button class="btn btn-label-primary btn-icon btn-sm"><i class="ti ti-user-check ti-xs"></i></button>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Connections -->
      <!-- Teams -->
      <div class="col-lg-12 col-xl-6">
        <div class="card card-action mb-4">
          <div class="card-header align-items-center">
            <h5 class="card-action-title mb-0">Address</h5>
            <div class="card-action-element">
              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical text-muted"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="javascript:void(0);">Share teams</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/icons/brands/react-label.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">React Developers</h6>
                      <small class="text-muted">72 Members</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                  </div>
                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/icons/brands/support-label.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Support Team</h6>
                      <small class="text-muted">122 Members</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <a href="javascript:;"><span class="badge bg-label-primary">Support</span></a>
                  </div>
                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/icons/brands/figma-label.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">UI Designers</h6>
                      <small class="text-muted">7 Members</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <a href="javascript:;"><span class="badge bg-label-info">Designer</span></a>
                  </div>
                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/icons/brands/vue-label.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Vue.js Developers</h6>
                      <small class="text-muted">289 Members</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <a href="javascript:;"><span class="badge bg-label-danger">Developer</span></a>
                  </div>
                </div>
              </li>
              <li class="mb-3">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-start">
                    <div class="avatar me-2">
                      <img src="../../assets/img/icons/brands/twitter-label.png" alt="Avatar" class="rounded-circle" />
                    </div>
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">Digital Marketing</h6>
                      <small class="text-muted">24 Members</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <a href="javascript:;"><span class="badge bg-label-secondary">Marketing</span></a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Teams -->
    </div>
  </div>
</div>
<!--/ User Profile Content -->

  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-profile.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>

<script>
  "use strict";
!function(){
    var a=(new Tagify(a),document.querySelector("#roles")),
    date='<?php echo e($user->date); ?>',
    dtt=document.querySelector("#date"),
    t=[<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo e($role); ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
    a=(new Tagify(a,{
        whitelist:t,
        maxTags:10,
        dropdown:{
            maxItems:20,
            classname:"tags-inline",
            enabled:0,
            closeOnSelect:!1
        }
    }));
    dtt&&dtt.flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today', defaultDate:new Date(date.split('-')[0],parseInt(date.split('-')[1])-1,date.split('-')[2].split(' ')[0])})
    <?php if($errors->any()): ?>
        var myModal = new bootstrap.Modal(document.getElementById('changeStatus'), {
          keyboard: false
        })
        myModal.show()
      <?php endif; ?>
  }();  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rba\resources\views/users/profile.blade.php ENDPATH**/ ?>