

<?php $__env->startSection('page_name'); ?>
Legal Edication
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Legal Edication
                <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal"
                    data-bs-target="#training"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                        class="d-none d-sm-inline-block">New Training</span></a><a class="d-none" id="edit"
                    data-bs-toggle="modal" data-bs-target="#editmeetings"></a></h5>

            <div class="modal fade" id="training" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">New Training</h3>
                            </div>
                            <form method="POST" class="row g-3" action="<?php echo e(route('trainings.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input required type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                                <div class="col-12">
                                    <label for="category" class="form-label">Training Category</label>
                                    <select required id="category" name="category" class="form-select">
                                        <option value="" selected>Choose one </option>
                                        <option <?php if(old('category')=="CLE" ): ?> selected <?php endif; ?> value="CLE">CLE</option>
                                        <option <?php if(old('category')=="Publication" ): ?> selected <?php endif; ?>
                                            value="Publication">Publication</option>
                                        <option <?php if(old('category')=="Legal Workshop" ): ?> selected <?php endif; ?>
                                            value="Legal Workshop">Legal Workshop</option>
                                        <option <?php if(old('category')=="Meeting (Credit)" ): ?> selected <?php endif; ?>
                                            value="Meeting (Credit)">Meeting (Credit)</option>
                                        <option <?php if(old('category')=="Lecture" ): ?> selected <?php endif; ?> value="Lecture">Lecture
                                        </option>
                                        <option <?php if(old('category')=="Others" ): ?> selected <?php endif; ?> value="Others">Others
                                        </option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="venue" class="form-label">Venue</label>
                                    <input required type="text" name="venue" class="form-control" id="venue">
                                </div>
                                <div class="col-3">
                                    <label for="venue" class="form-label">Credit</label>
                                    <input required type="text" name="credits" id="credit" class="form-control">
                                </div>
                                <div class="col-3">
                                    <label for="venue" class="form-label">Price</label>
                                    <input required type="text" name="price" id="price" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label for="starton" class="form-label">Start on</label>
                                    <input required type="text" class="form-control" id="starton" name="starton"
                                        placeholder="Month DD, YYYY">
                                </div>
                                <div class="col-md-6">
                                    <label for="endon" class="form-label">End on</label>
                                    <input required type="text" class="form-control" id="endon" name="endon"
                                        placeholder="Month DD, YYYY">
                                </div>

                                <div class="col-md-6">
                                    <label for="early_deadline" class="form-label">Early Registration Deadline</label>
                                    <input required type="text" class="form-control" id="early_deadline"
                                        name="early_deadline" placeholder="Month DD, YYYY">
                                </div>
                                <div class="col-md-6">
                                    <label for="late_deadline" class="form-label">Late Registration Deadline</label>
                                    <input required type="text" class="form-control" id="late_deadline"
                                        name="late_deadline" placeholder="Month DD, YYYY">
                                </div>
                                <div class="col-md-6">
                                    <label for="rate" class="form-label">Late Registration Rate</label>
                                    <input required type="text" class="form-control" id="rate" name="rate"
                                        placeholder="10">
                                </div>

                                <div class="col-md-6">
                                    <label for="seats" class="form-label">Number Of Seats</label>
                                    <input required type="text" class="form-control" id="seats" name="seats"
                                        placeholder="50">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" name="publish" type="checkbox" value="1"
                                            id="defaultCheck2" />
                                        <label class="form-check-label" for="defaultCheck2">
                                            Published ? (Uncheck if "NO")
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        Training</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables table border-top">
              <thead>
                <tr>
                  <th>#</th>
                  <th style="width: 25%">Training title</th>
                  <th>Start on</th>
                  <th>End on</th>
                  <th>Venue</th>
                  <th>Booked</th>
                  <th>Confirmed</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <?php
              $count = 1;
              ?>
              <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tbody>
                <tr>
                <td><span class="badge bg-label-danger me-2"><?php echo e($count); ?></span></td>
                <td><strong><?php echo e($training->title); ?></strong><br>
                <span class="badge bg-label-info me-2">Credit</span><?php echo e($training->credits); ?>

                <span class="badge bg-label-info me-2">Price</span><?php echo e($training->price); ?> Rwf
                </td>
                <td><?php echo e($training->starton); ?></td>
                <td><?php echo e($training->endon); ?></td>
                <td><?php echo e($training->venue); ?></td>
                <td><?php echo e($training->booking); ?> <a href="" ><i class="ti ti-eye ti-sm mx-2"></i></a></td>
                <td><?php echo e($training->confirm); ?> / <?php echo e($training->seats); ?> <a href="" ><i class="ti ti-eye ti-sm mx-2"></i></td>
                <td> <a href="<?php echo e(route('trainings.details' , $training->id)); ?>" class="btn btn-primary btn-sm text-white"><i class="ti ti-pencil me-0 me-sm-1 ti-xs"></i><span
                        class="d-none d-sm-inline-block">Details</span></a></td>
                </tr>
                <tr>
                    <td>
                      <i class="fas fa-bullhorn"></i>
                    </td>
                    <td colspan="6"><h6><span class="badge bg-label-warning me-2">Warning </span>
                        Early Registration Deadline <u class="text-danger"><?php echo e($training->early_deadline); ?></u> And  Late Registration Deadline 
                        ( <span class="text-warning">with <?php echo e($training->rate); ?>% increase </span> ) 
                        <u class="text-danger"><?php echo e($training->late_deadline); ?></u>
                      </h6>
                    </td>
                 
                  </tr>
              </tbody>  
              <?php
              $count++
              ?>
        
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
            </table>
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
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />

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
<script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
<script>
    "use strict";
    $(function () {
        var dtt = document.querySelector("#starton");
        dtt && dtt.flatpickr({
            enableTime: false,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            minDate: 'today'
        })
    });
    $(function () {
        var dtt = document.querySelector("#endon");
        dtt && dtt.flatpickr({
            enableTime: false,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            minDate: 'today'
        })
    });
    $(function () {
        var dtt = document.querySelector("#early_deadline");
        dtt && dtt.flatpickr({
            enableTime: false,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        })
    });
    $(function () {
        var dtt = document.querySelector("#late_deadline");
        dtt && dtt.flatpickr({
            enableTime: false,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        })
    });


    $(document).ready(function () {
        $("#credit").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#price").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#price").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#seats").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#rate").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/training/index.blade.php ENDPATH**/ ?>