

<?php $__env->startSection('page_name'); ?>
Disciplene info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-2">
    <span class="text-muted fw-light">Disciplinary case /</span> Profile
  </h4>


  <?php echo $__env->make('myprofile.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- User Profile Content -->
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Pro Bono Cases
        <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newCase"><i
            class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New case</span></a><a
          class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editmeetings"></a></h5>
      <!-- New User Modal -->
      <div class="modal fade" id="newCase" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3 class="mb-2">New Probono Case</h3>

              </div>
              <form action="<?php echo e(route('probono-store')); ?>" class="row g-3" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="name">First Name</label>
                  <input required type="text" name="fname" class="form-control" placeholder="John"
                    value="<?php echo e(old('fname')); ?>" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Last name</label>
                  <input required type="text" name="lname" class="form-control" placeholder="doe"
                    value="<?php echo e(old('lname')); ?>" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="gender">Gender</label>
                  <select required id="gender" name="gender" class="form-select">
                    <option value="" selected> - Select - </option>
                    <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Male">Male</option>
                    <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Female">Female</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Age</label>
                  <input required type="number" min="1" max="170" name="age" class="form-control" placeholder="Age"
                    value="<?php echo e(old('age')); ?>" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="phone">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text">RW (+25)</span>
                    <input required type="text" id="number" title="Phone must have at least 10 Digits" name="phone"
                      class="form-control phone-number-mask" minlength="10" maxLength="10" placeholder="xxx xxx xxxx"
                      value="<?php echo e(old('phone')); ?>" />
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Referral Case No</label>
                  <input required type="text" name="referral_case_no" class="form-control"
                    placeholder="RC 0004B77/2022/TB/009" value="<?php echo e(old('referralcaseno')); ?>" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Jurisdiction</label>
                  <input required type="text" name="jurisdiction" class="form-control" placeholder="Jurisdiction"
                    value="<?php echo e(old('referralcaseno')); ?>" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="phone">Court</label>
                  <div class="input-group">
                    <input required type="text" name="court" class="form-control phone-number-mask"
                      placeholder="Court Name" value="<?php echo e(old('phone')); ?>" />
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="category">Case nature</label>
                  <select required name="case_nature" class="form-select">
                    <option value="" selected> - Select - </option>
                    <option <?php if(old('nature')=="Criminal" ): ?> selected <?php endif; ?> value="Criminal">Criminal</option>
                    <option <?php if(old('nature')=="Civil" ): ?> selected <?php endif; ?> value="Civil">Civil</option>
                    <option <?php if(old('nature')=="Social" ): ?> selected <?php endif; ?> value="Social">Social</option>
                    <option <?php if(old('nature')=="Commercial" ): ?> selected <?php endif; ?> value="Commercial">Commercial</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="flatpickr-date">Hearing Day</label>
                  <input required type="text" class="form-control" id="date" name="hearing_date"
                    placeholder="Month DD, YYYY" class="form-control" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="status">Category</label>
                  <select required id="status" name="category" class="form-select">
                    <option value="" selected> - Select - </option>
                    <option <?php if(old('category')=="Case Agaist RBA" ): ?> selected <?php endif; ?> value="Case Agaist RBA">Case Agaist
                      RBA
                    </option>
                    <option <?php if(old('category')=="Legal Aid to General Public" ): ?> selected <?php endif; ?>
                      value="Legal Aid to General Public">Legal Aid to General Public</option>
                    <option <?php if(old('category')=="Minors" ): ?> selected <?php endif; ?> value="Minors">Minors</option>
                    <option <?php if(old('category')=="Supreme count" ): ?> selected <?php endif; ?> value="Supreme count">Supreme count
                    </option>
                    <option <?php if(old('category')=="Count" ): ?> selected <?php endif; ?> value="count">Count</option>
                    <option <?php if(old('category')=="Prosecutor" ): ?> selected <?php endif; ?> value="Prosecutor">Prosecutor</option>
                    <option <?php if(old('category')=="Police" ): ?> selected <?php endif; ?> value="Police">Police</option>
                    <option <?php if(old('category')=="Prison" ): ?> selected <?php endif; ?> value="Prison">Prison</option>
                    <option <?php if(old('category')=="Other" ): ?> selected <?php endif; ?> value="Other">Other</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="practicing">Referrel Name</label>
                  <input required type="text" name="referrel" class="form-control" placeholder="Referrel Name"
                    value="<?php echo e(old('referrel')); ?>" />
                </div>
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                  <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                    aria-label="Close">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th style="width: 20%">Legal Aids Seeker</th>
            <th>Referrer</th>
            <th>Case Number</th>
            <th>Case Nature</th>
            <th>Case Status</th>
            <th>Hearing Day</th>
            <th>Manage</th>
          </tr>
        </thead>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php
          $count = 1;
          ?>
          <?php $__empty_1 = true; $__currentLoopData = $probonos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $probono): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tbody>
          <tr>
            <td><span class="badge bg-label-danger me-2"><?php echo e($count); ?></span></td>
            <td><?php echo e($probono->fname); ?> <?php echo e($probono->lname); ?> <br>
              <span class="badge bg-label-info me-2">Phone</span><?php echo e($probono->phone); ?>

            </td>
            <td><?php echo e($probono->referrel); ?> <br>
              <span class="badge bg-label-primary me-2">Category</span><?php echo e($probono->category); ?>

            </td>
            <td><?php echo e($probono->referral_case_no); ?></td>
            <td><?php echo e($probono->case_nature); ?></td>
            <td>
              <?php switch($probono->status):
              case ('OPEN'): ?>
              <span class="badge bg-label-primary me-2"><?php echo e($probono->status); ?></span>
              <?php break; ?>
              <?php case ('WON'): ?>
              <span class="badge bg-label-success me-2"><?php echo e($probono->status); ?></span>
              <?php break; ?>
              <?php case ('LOST'): ?>
              <span class="badge bg-label-warning me-2"><?php echo e($probono->status); ?></span>
              <?php break; ?>
              <?php default: ?>
              <span class="badge bg-label-danger me-2"><?php echo e($probono->status); ?></span>
              <?php endswitch; ?>

            </td>
            <td>
              <?php echo e(\Carbon\Carbon::parse($probono->hearing_date)->locale('fr')->format('F j, Y')); ?>

            </td>
            <td>
              <?php if (! ($probono->register == NULL)): ?>
              <a class="btn btn-sm btn-primary" href="<?php echo e(route('probono-details',$probono->id)); ?>"><i
                  class="ti ti-eye me-0 me-sm-1 ti-xs"></i>Details</a>

              <?php else: ?>
              <a href="<?php echo e(route('probono-details',$probono->id)); ?>"><i class="ti ti-eye me-0 me-sm-1 ti-xs"></i></a>
              <a href="" data-bs-toggle="modal" data-bs-target="#edit<?php echo e($probono->id); ?>" class="text-primary"><i
                  class="ti ti-edit me-0 me-sm-1 ti-xs"></i></a>
              <a href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo e($probono->id); ?>" class="text-danger"><i
                  class="ti ti-trash me-0 me-sm-1 ti-xs"></i></a>
              <div class="modal modal-top fade" id="delete<?php echo e($probono->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <form action="<?php echo e(route('probono-delete')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <input type="hidden" name="probono" value="<?php echo e($probono->id); ?>" />
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Are you sure to delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Add New Address Modal -->
              <div class="modal fade" id="edit<?php echo e($probono->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Edit Probono Case</h3>
                        <p class="text-muted address-subtitle">change New Probono case Desciption in case you make
                          mistakes </p>
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                          <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        </div>
                        <?php endif; ?>

                      </div>
                      <form action="<?php echo e(route('probono-update')); ?>" class="row g-3" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="hidden" name="id" value="<?php echo e($probono->id); ?>">
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="name">First Name</label>
                          <input required type="text" name="fname" class="form-control" value="<?php echo e($probono->fname); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Last name</label>
                          <input required type="text" name="lname" class="form-control" value="<?php echo e($probono->lname); ?>" />
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="gender">Gender</label>
                          <select required id="gender" name="gender" class="form-select">
                            <option value="<?php echo e($probono->gender); ?>" selected><?php echo e($probono->gender); ?></option>
                            <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Male">Male</option>
                            <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Female">Female</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Age</label>
                          <input required type="number" min="1" max="170" name="age" class="form-control"
                            value="<?php echo e($probono->age); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="phone">Phone Number</label>
                          <div class="input-group">
                            <span class="input-group-text">RW (+25)</span>
                            <input required type="text" pattern="[0-9]{10,}" title="Phone must have at least 10 Digits"
                              name="phone" id="number_update" class="form-control phone-number-mask" minlength="10" maxLength="10"
                              value="<?php echo e($probono->phone); ?>" />
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Referral Case No</label>
                          <input required type="text" name="referral_case_no" class="form-control"
                            value="<?php echo e($probono->referral_case_no); ?>" />
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Jurisdiction</label>
                          <input required type="text" name="jurisdiction" class="form-control"
                            value="<?php echo e($probono->jurisdiction); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="phone">Court</label>
                          <div class="input-group">
                            <input required type="text" id="phone" name="court" class="form-control phone-number-mask"
                              value="<?php echo e($probono->court); ?>" />
                          </div>
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="category">Case nature</label>
                          <select required name="case_nature" class="form-select">
                            <option value="<?php echo e($probono->case_nature); ?>" selected><?php echo e($probono->case_nature); ?></option>
                            <option <?php if(old('nature')=="Criminal" ): ?> selected <?php endif; ?> value="Criminal">Criminal</option>
                            <option <?php if(old('nature')=="Civil" ): ?> selected <?php endif; ?> value="Civil">Civil</option>
                            <option <?php if(old('nature')=="Social" ): ?> selected <?php endif; ?> value="Social">Social</option>
                            <option <?php if(old('nature')=="Commercial" ): ?> selected <?php endif; ?> value="Commercial">Commercial
                            </option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="flatpickr-date">Hearing Day</label>
                          <input required type="text" class="form-control" id="date1" name="hearing_date"
                            class="form-control" value="<?php echo e($probono->hearing_date); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="status">Category</label>
                          <select required id="status" name="category" class="form-select">
                            <option value="<?php echo e($probono->category); ?>" selected> <?php echo e($probono->category); ?> </option>
                            <option <?php if(old('category')=="Case Agaist RBA" ): ?> selected <?php endif; ?> value="Case Agaist RBA">
                              Case Agaist RBA
                            </option>
                            <option <?php if(old('category')=="Legal Aid to General Public" ): ?> selected <?php endif; ?>
                              value="Legal Aid to General Public">Legal Aid to General Public</option>
                            <option <?php if(old('category')=="Minors" ): ?> selected <?php endif; ?> value="Minors">Minors</option>
                            <option <?php if(old('category')=="Supreme count" ): ?> selected <?php endif; ?> value="Supreme count">Supreme
                              count
                            </option>
                            <option <?php if(old('category')=="Count" ): ?> selected <?php endif; ?> value="count">Count</option>
                            <option <?php if(old('category')=="Prosecutor" ): ?> selected <?php endif; ?> value="Prosecutor">Prosecutor
                            </option>
                            <option <?php if(old('category')=="Police" ): ?> selected <?php endif; ?> value="Police">Police</option>
                            <option <?php if(old('category')=="Prison" ): ?> selected <?php endif; ?> value="Prison">Prison</option>
                            <option <?php if(old('category')=="Other" ): ?> selected <?php endif; ?> value="Other">Other</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="practicing">Referrel Name</label>
                          <input required type="text" name="referrel" class="form-control"
                            value="<?php echo e($probono->referrel); ?>" />
                        </div>

                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Add New Address Modal -->
              <?php endif; ?>

            </td>
          </tr>
        </tbody>
        <?php
        $count++
        ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td>
            No Probono Case Assigned
          </td>
        </tr>
        <?php endif; ?>

        </tbody>
      </table>
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
  $(function () {
    var dtt = document.querySelector("#date"),
      dte = document.querySelector("#end");
    dtt && dtt.flatpickr({
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      minDate: 'today'
    })
    dte && dte.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })
  $(function () {
    var dtt1 = document.querySelector("#date1"),
      dte1 = document.querySelector("#end1");
    dtt1 && dtt1.flatpickr({
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      minDate: 'today'
    })
    dte1 && dte1.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })

  $(document).ready(function () {
    $("#number").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
    $("#number_update").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/myprofile/probono.blade.php ENDPATH**/ ?>