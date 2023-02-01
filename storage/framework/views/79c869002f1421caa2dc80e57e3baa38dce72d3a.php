

<?php $__env->startSection('page_name'); ?>
Pro Bono Cases
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Pro Bono Cases
        <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newCase"><i
            class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New case</span></a><a
          class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editmeetings"></a></h5>

    </div>
  <?php echo $__env->make('layouts.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card-datatable table-responsive">
      <table class="datatables-probono table border-top">
        <thead>
          <tr>
            <th>#</th>
            <th>Referrer</th>
            <th>Category</th>
            <th>Case Number</th>
            <th>Gender</th>
            <th>Nature</th>
            <th>Status</th>
            <th>Hearing Day</th>
            <th>Manage</th>
          </tr>
        </thead>
        <?php
        $count = 1;
    ?>
        <?php $__empty_1 = true; $__currentLoopData = $probonos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $probono): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
       
        <tbody>
          <tr>
        <td><?php echo e($count); ?></td>
        <td><?php echo e($probono->referral_name); ?></td>
        <td><?php echo e($probono->category); ?></td>
        <td><?php echo e($probono->referral_case_no); ?></td>
        <td><?php echo e($probono->referral_gender); ?></td>
        <td><?php echo e($probono->case_nature); ?></td>
        <td>
         <?php if($probono->case_status == 'OPEN'): ?>
             <span class="badge bg-label-info me-2"><?php echo e($probono->case_status); ?></span>
         <?php else: ?>
         <span class="badge bg-label-danger me-2"><?php echo e($probono->case_status); ?></span>
         <?php endif; ?>
          
        </td>
        <td><?php echo e($probono->hearing_date); ?></td>
        <td><a href="<?php echo e(route('probono.show',$probono->id)); ?>" class="btn btn-sm btn-info">( = )</button></td>
      </tr>
      </tbody>
      <?php
          $count++
      ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
        <?php endif; ?>
      </table>
    </div>
  </div>

</div>


  <!-- New User Modal -->
  <div class="modal fade" id="newCase" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">New Probono Case</h3>
        
          </div>
          <form accept="<?php echo e(route('probono.store')); ?>" class="row g-3" method="post"  enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="col-12 col-md-6">
              <label class="form-label" for="name">First Name</label>
              <input required type="text" name="fname" class="form-control" placeholder="John" value="<?php echo e(old('fname')); ?>"/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Last name</label>
              <input required type="text" name="lname" class="form-control" placeholder="doe"  value="<?php echo e(old('lname')); ?>"/>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label" for="gender">Gender</label>
              <select required id="gender" name="gender" class="form-select">
                <option value="" selected> - Select - </option>
                <option <?php if(old('gender')=="Male"): ?> selected <?php endif; ?> value="Male">Male</option>
                <option <?php if(old('gender')=="Male"): ?> selected <?php endif; ?> value="Female">Female</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Age</label>
              <input required type="number" min="1" name="age" class="form-control" placeholder="Age"  value="<?php echo e(old('age')); ?>"/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="phone">Phone Number</label>
              <div class="input-group">
                <span class="input-group-text">RW (+25)</span>
                <input required type="text"  pattern="[0-9]{10,}" title="Phone must have at least 10 Digits" name="phone" class="form-control phone-number-mask" minlength="10" maxLength="10" placeholder="xxx xxx xxxx"  value="<?php echo e(old('phone')); ?>"/>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Referral Case No</label>
              <input required type="text" name="referral_case_no" class="form-control" placeholder="RC 0004B77/2022/TB/009"  value="<?php echo e(old('referralcaseno')); ?>"/>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Jurisdiction</label>
              <input required type="text" name="jurisdiction" class="form-control" placeholder="Jurisdiction"  value="<?php echo e(old('referralcaseno')); ?>"/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="phone">Court</label>
              <div class="input-group">
                <input required type="text" id="phone" name="court" class="form-control phone-number-mask" placeholder="Court Name"  value="<?php echo e(old('phone')); ?>"/>
              </div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label" for="category">Case nature</label>
              <select required name="case_nature" class="form-select">
                <option value="" selected> - Select - </option>
                <option <?php if(old('nature')=="Criminal"): ?> selected <?php endif; ?> value="Criminal">Criminal</option>
                <option <?php if(old('nature')=="Civil"): ?> selected <?php endif; ?> value="Civil">Civil</option>
                <option <?php if(old('nature')=="Social"): ?> selected <?php endif; ?> value="Social">Social</option>
                <option <?php if(old('nature')=="Commercial"): ?> selected <?php endif; ?> value="Commercial">Commercial</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="flatpickr-date">Hearing Day</label>
              <input required type="date" name="hearing_date" placeholder="Month DD, YYYY" class="form-control" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="status">Category</label>
              <select required id="status" name="category" class="form-select">
                <option value="" selected> - Select - </option>
                <option <?php if(old('category')=="Case Agaist RBA"): ?> selected <?php endif; ?> value="Case Agaist RBA">Case Agaist RBA</option>
                <option <?php if(old('category')=="Legal Aid to General Public"): ?> selected <?php endif; ?> value="Legal Aid to General Public">Legal Aid to General Public</option>
                <option <?php if(old('category')=="Minors"): ?> selected <?php endif; ?> value="Minors">Minors</option>
                <option <?php if(old('category')=="Supreme count"): ?> selected <?php endif; ?> value="Supreme count">Supreme count</option>
                <option <?php if(old('category')=="Count"): ?> selected <?php endif; ?> value="count">Count</option>
                <option <?php if(old('category')=="Prosecutor"): ?> selected <?php endif; ?> value="Prosecutor">Prosecutor</option>
                <option <?php if(old('category')=="Police"): ?> selected <?php endif; ?> value="Police">Police</option>
                <option <?php if(old('category')=="Prison"): ?> selected <?php endif; ?> value="Prison">Prison</option>
                <option <?php if(old('category')=="Other"): ?> selected <?php endif; ?> value="Other">Other</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="practicing">Referrel Name</label>
              <select name="referrel" class="form-select">
                <option value="" disabled selected> - Select - </option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(old('referrel')=="<?php echo e($user->name); ?>"): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </select>
            </div>
            <div class="col-12 col-md-12">
              <div class="form-check">
                <input class="form-check-input" name="status" type="checkbox" value="1"
                    id="defaultCheck2" />
                <label class="form-check-label" for="defaultCheck2">
                  Auto Assign to Advocate ? (Uncheck if "NO")
                </label>
            </div>
            </div>
            
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ New User Modal -->
<!-- / Content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rba\resources\views/probono/index.blade.php ENDPATH**/ ?>