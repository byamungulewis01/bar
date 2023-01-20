

<?php $__env->startSection('page_name'); ?>
Role List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!-- Content -->
        
    <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="fw-semibold mb-4">Roles List</h4>
            
            <p class="mb-4">A role provided access to predefined menus and features so that depending on <br> assigned role an administrator can have access to what user needs.</p>
            <!-- Role cards -->
            <div class="row g-4">
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h6 class="fw-normal mb-2">Total <?php echo e($role->users->count()); ?> <?php echo e(Str::plural('user',$role->users->count())); ?></h6>
                      <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                        <?php $__currentLoopData = $role->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="<?php echo e($ru->name); ?>" class="avatar avatar-sm pull-up">
                          <img class="rounded-circle" src="<?php echo e(asset('assets/img/avatars/')); ?><?php echo e($ru->photo); ?>" alt="Avatar">
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1">
                      <div class="role-heading">
                        <h4 class="mb-1"><?php echo e($role->name); ?></h4>
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal">
                          <span data="<?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>permission[<?php echo e($permission->name); ?>],<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" ariaLabel="<?php echo e($role->name); ?>"  ariaHidden="<?php echo e($role->id); ?>">Edit Role</span>
                        </a>
                      </div>
                      <a href="javascript:void(0);" class="text-muted"><i data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Delete" class="ti ti-trash ti-md"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100">
                  <div class="row h-100">
                    <div class="col-sm-5">
                      <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                        <img src="<?php echo e(asset('assets/img/illustrations/add-new-roles.png')); ?>" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <div class="card-body text-sm-end text-center ps-sm-0">
                        <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-new-role">Add New Role</button>
                        <p class="mb-0 mt-1">Add role, if it does not exist</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Role cards -->
            
            <!-- Add Role Modal -->
            <!-- Add Role Modal -->
            <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                  <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-body">
                    <div class="text-center mb-4">
                      <h3 class="role-title mb-2">Add New Role</h3>
                      <p class="text-muted">Set role permissions</p>
                      <div class="row justify-content-center">
                        <div class="col-md-6">
                          <?php if($errors->any()): ?>
                          <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <span class="alert-icon text-danger me-2">
                              <i class="ti ti-ban ti-xs"></i>
                            </span>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="d-block"> <?php echo e($error); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>
                      
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-3" method="post">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" id="is" name="express"/>
                      <div class="col-12 mb-4">
                        <label class="form-label" for="modalRoleName">Role Name</label>
                        <input type="text" id="modalRoleName" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" value="<?php echo e(old('name')); ?>"/>
                      </div>
                      <div class="col-12">
                        <h5>Role Permissions</h5>
                        <!-- Permission table -->
                        <div class="table-responsive">
                          <table class="table table-flush-spacing">
                            <tbody>
                              <tr>
                                <td class="text-nowrap fw-semibold">Administrator Access <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                                <td>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll" />
                                    <label class="form-check-label" for="selectAll">
                                      Select All
                                    </label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-nowrap fw-semibold" rowspan="2">User Management</td>
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="userManagementRead" name="permission[create-users]"/>
                                      <label class="form-check-label" for="userManagementRead">
                                        Create
                                      </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="userManagementWrite" name="permission[edit-users]"/>
                                      <label class="form-check-label" for="userManagementWrite">
                                        Update
                                      </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="userManagementCreate" name="permission[delete-users]"/>
                                      <label class="form-check-label" for="userManagementCreate">
                                        Delete
                                      </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="contentManagementRead" name="permission[view-users]"/>
                                      <label class="form-check-label" for="contentManagementRead">
                                        View List
                                      </label>
                                    </div>
                                    <div class="form-check me-3">
                                      <input class="form-check-input" type="checkbox" id="contentManagementWrite" name="permission[user-profile]"/>
                                      <label class="form-check-label" for="contentManagementWrite">
                                        View Profiles
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="contentManagementCreate" name="permission[set-user-status]"/>
                                      <label class="form-check-label" for="contentManagementCreate">
                                        Set User Status
                                      </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-nowrap fw-semibold" rowspan="3">Meeting Management</td>
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="dispManagementRead" name="permission[create-meeting]"/>
                                      <label class="form-check-label" for="dispManagementRead">
                                        Create
                                      </label>
                                    </div>
                                    <div class="form-check me-3 ms-lg-2 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="dispManagementWrite" name="permission[edit-meeting]"/>
                                      <label class="form-check-label" for="dispManagementWrite">
                                        Update
                                      </label>
                                    </div>
                                    <div class="form-check me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="dispManagementCreate" name="permission[delete-meeting]"/>
                                      <label class="form-check-label" for="dispManagementCreate">
                                        Delete
                                      </label>
                                    </div>
                                    
                                  </div>
                                </td>
                              </tr>
                              <tr class="">
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="dbManagementRead" name="permission[view-meeting]" />
                                      <label class="form-check-label" for="dbManagementRead">
                                        View List
                                      </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-3">
                                      <input class="form-check-input" type="checkbox" id="dbManagementWrite" name="permission[view-attendance]" />
                                      <label class="form-check-label" for="dbManagementWrite">
                                        View Attended
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="dbManagementCreate" name="permission[make-attendance]" />
                                      <label class="form-check-label" for="dbManagementCreate">
                                        Make Attendance
                                      </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check me-3 me-lg-3">
                                      <input class="form-check-input" type="checkbox" id="finManagementRead" name="permission[send-invitation]" />
                                      <label class="form-check-label" for="finManagementRead">
                                        Send Invitation
                                      </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-3">
                                      <input class="form-check-input" type="checkbox" id="finManagementWrite" name="permission[notify-invitees]" />
                                      <label class="form-check-label" for="finManagementWrite">
                                        Notify invited
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="finManagementCreate" name="permission[upload-minutes]" />
                                      <label class="form-check-label" for="finManagementCreate">
                                        Upload Minutes
                                      </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-nowrap fw-semibold">Roles</td>
                                <td>
                                  <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="reportingView" name="permission[view-roles]" />
                                      <label class="form-check-label" for="reportingView">
                                        View
                                      </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="reportingCreate" name="permission[create-roles]" />
                                      <label class="form-check-label" for="reportingCreate">
                                        Create
                                      </label>
                                    </div>
                                    <div class="form-check me-3 me-lg-5">
                                      <input class="form-check-input" type="checkbox" id="reportingUpdate" name="permission[edit-roles]" />
                                      <label class="form-check-label" for="reportingUpdate">
                                        Update
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="reportingDelete" name="permission[delete-roles]" />
                                      <label class="form-check-label" for="reportingDelete">
                                        Delete
                                      </label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- Permission table -->
                      </div>
                      <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                      </div>
                    </form>
                    <!--/ Add role form -->
                  </div>
                </div>
              </div>
            </div>
            <!--/ Add Role Modal -->
            
            <!-- / Add Role Modal -->
                        
        </div>
        <!-- / Content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/app-access-roles.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/modal-add-role.js')); ?>"></script>
<script>
  <?php if($errors->any()): ?>
        var myModal = new bootstrap.Modal(document.getElementById('addRoleModal'), {
          keyboard: false
        })
        myModal.show()
      <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\bar\resources\views/roles.blade.php ENDPATH**/ ?>