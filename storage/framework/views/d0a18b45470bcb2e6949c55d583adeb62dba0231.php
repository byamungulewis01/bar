

<?php $__env->startSection('page_name'); ?>
Contribution
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Users List Table -->
    <div class="card h-100">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Contributions <a href="" data-bs-toggle="modal" data-bs-target="#contribution"
                    class="btn btn-dark text-white pull-left float-end"><i
                        class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New
                        Contribution</span></a></h5>

        </div>
        <div class="modal fade" id="contribution" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Define New Contribution</h3>
                            <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>* <?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <form method="POST" class="row g-3" action="<?php echo e(route('contribution.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="col-12">
                                <label for="title" class="form-label">Name</label>
                                <input required type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6">

                                <label for="date" class="form-label">Period Start</label>
                                <input required type="text" class="form-control" id="start_period" name="start_period"
                                    placeholder="Month DD, YYYY">
                            </div>
                            <div class="col-md-6">
                                <label for="end" class="form-label">Period End</label>
                                <input required type="text" class="form-control" id="end_period" name="end_period"
                                    placeholder="Month DD, YYYY">
                            </div>
                            <div class="col-4">
                                <label for="venue" class="form-label">Deadline</label>
                                <input required type="text" name="deadline" class="form-control" id="deadline"
                                    placeholder="Month DD, YYYY">
                            </div>
                            <div class="col-4">
                                <label for="venue" class="form-label">Amount</label>
                                
                                <input type="text" id="numeral-mask" name="amount" class="form-control numeral-mask"
                                    placeholder="Enter Amount" />
                            </div>
                            <div class="col-4">
                                <label for="venue" class="form-label">Fine Percentage</label>
                                <input required type="text" name="percentage" id="percentage" class="form-control">
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="1"
                                        id="Advocate" />
                                    <label class="form-check-label" for="Advocate">
                                        Concerns Advocate
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="3"
                                        id="Support" />
                                    <label class="form-check-label" for="Support">
                                        Concerns Support Staff
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="2"
                                        id="interns" />
                                    <label class="form-check-label" for="interns">
                                        Concerns interns
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="4"
                                        id="Technical" />
                                    <label class="form-check-label" for="Technical">
                                        Technical Staff
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive" style="min-height: 500px;">
            <table class="datatables-users table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Contribution type</th>
                        <th>Period</th>
                        <th>Dealine</th>
                        <th>Amount</th>
                        <th>Fine Parcentage</th>
                        <th>Concerned</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                   <?php $__empty_1 = true; $__currentLoopData = $contributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $contribution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                       <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td> <?php echo e($contribution->name); ?> </td>
                        <td> <?php echo e($contribution->start_period); ?> <span class="text-danger">to</span> <?php echo e($contribution->end_period); ?></td>
                        <td><?php echo e($contribution->deadline); ?></td>
                        <td><?php echo e($contribution->amount); ?></td>
                        <td><?php echo e($contribution->percentage); ?></td>
                        <td>
                                <?php
                                    $values = explode(',', $contribution->concern);
                                ?>
                                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    switch ($value) {
                                        case 1:
                                            $concern = 'Concerns Advocate';
                                            break;
                                        case 2:
                                            $concern = 'Concerns interns';
                                            break;
                                        case 3:
                                            $concern = 'Concerns Support Staff';
                                            break;
                                        case 4:
                                            $concern = 'Technical Staff';
                                            break;
                                        
                                        default:
                                             $concern = '';
                                            break;
                                    }
                                ?>
                                  <li><?php echo e($concern); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <a href="" ><i class="ti ti-pencil me-0 me-sm-1 ti-xs"></i></a>
                            <a href=""><i class="ti ti-mail me-0 me-sm-1 ti-xs"></i></a>
                        </td>
                       </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                   <tbody>
                    <tr>
                        <td>
                            <i class="fas fa-bullhorn"></i>
                        </td>
                        <td colspan="4">
                            <h6><span class="badge bg-label-warning me-2">Comminique </span> No record found
                            </h6>

                        </td>


                    </tr>
                </tbody>
                   <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

</div>


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
<script src="<?php echo e(asset('assets/js/forms-file-upload.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-extras.js')); ?>"></script>

<script>
    "use strict";
    $(function () {
        var start_period = document.querySelector("#start_period"),
            end_period = document.querySelector("#end_period"),
            deadline = document.querySelector("#deadline");

        start_period.flatpickr({
            autoclose:!0,
            enableTime: !0,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            autoclose:!0,
        });
        end_period.flatpickr({
            autoclose:!0,
            enableTime: !0,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            autoclose:!0,
        });
        deadline.flatpickr({
            autoclose:!0,
            enableTime: !0,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",     
        });
    })


    $(document).ready(function () {
        $("#amount").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#percentage").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
    });


    <?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php
    $data = 'Error Accurs';
    ?>
    $(document).ready(function () {
        $.toast({
            heading: 'Error',
            text: '<?php echo e($error); ?>',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right',
            hideAfter: 5000,
        });
    });
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/finance/index.blade.php ENDPATH**/ ?>