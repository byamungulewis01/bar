

<?php $__env->startSection('page_name'); ?>
Trainings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-8 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <h4 class="fw-semibold mb-2"><?php echo e($training->title); ?> <a href="" data-bs-toggle="modal"
                                    data-bs-target="#training"><i class="ti ti-edit ti-sm me-2"></i></a></h4>
                            <div class="modal fade" id="training" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                    <div class="modal-content p-3 p-md-5">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="text-center mb-4">
                                                <h3 class="mb-2">Edit Training</h3>
                                            </div>
                                            <form method="POST" class="row g-3"
                                                action="<?php echo e(route('trainings.update')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="col-12">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="hidden" name="id" value="<?php echo e($training->id); ?>">
                                                    <input required type="text" name="title" class="form-control"
                                                        value="<?php echo e($training->title); ?>">
                                                </div>
                                                <div class="col-12">
                                                    <label for="category" class="form-label">Training Category</label>
                                                    <select required id="category" name="category" class="form-select">
                                                        <option <?php if($training->category == "CLE" ): ?> selected <?php endif; ?>
                                                            value="CLE">CLE</option>
                                                        <option <?php if($training->category == "Publication" ): ?> selected
                                                            <?php endif; ?>
                                                            value="Publication">Publication</option>
                                                        <option <?php if($training->category == "Legal Workshop" ): ?> selected
                                                            <?php endif; ?>
                                                            value="Legal Workshop">Legal Workshop</option>
                                                        <option <?php if($training->category == "Meeting (Credit)" ): ?> selected
                                                            <?php endif; ?>
                                                            value="Meeting (Credit)">Meeting (Credit)</option>
                                                        <option <?php if($training->category == "Lecture" ): ?> selected <?php endif; ?>
                                                            value="Lecture">Lecture
                                                        </option>
                                                        <option <?php if($training->category == "Others" ): ?> selected <?php endif; ?>
                                                            value="Others">Others
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label for="venue" class="form-label">Venue</label>
                                                    <input required type="text" name="venue" class="form-control"
                                                        id="venue" value="<?php echo e($training->venue); ?>">
                                                </div>
                                                <div class="col-3">
                                                    <label for="venue" class="form-label">Credit</label>
                                                    <input required type="text" name="credits" id="credit"
                                                        class="form-control" value="<?php echo e($training->credits); ?>">
                                                </div>
                                                <div class="col-3">
                                                    <label for="venue" class="form-label">Price</label>
                                                    <input required type="text" name="price" id="price"
                                                        class="form-control" value="<?php echo e($training->price); ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="starton" class="form-label">Start on</label>
                                                    <input required type="text" class="form-control" id="starton"
                                                        name="starton" value="<?php echo e($training->starton); ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="endon" class="form-label">End on</label>
                                                    <input required type="text" class="form-control" id="endon"
                                                        name="endon" value="<?php echo e($training->endon); ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="early_deadline" class="form-label">Early Registration
                                                        Deadline</label>
                                                    <input required type="text" class="form-control" id="early_deadline"
                                                        name="early_deadline" value="<?php echo e($training->early_deadline); ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="late_deadline" class="form-label">Late Registration
                                                        Deadline</label>
                                                    <input required type="text" class="form-control" id="late_deadline"
                                                        name="late_deadline" value="<?php echo e($training->late_deadline); ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rate" class="form-label">Late Registration Rate</label>
                                                    <input required type="text" class="form-control" id="rate"
                                                        name="rate" value="<?php echo e($training->rate); ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="seats" class="form-label">Number Of Seats</label>
                                                    <input required type="text" class="form-control" id="seats"
                                                        name="seats" value="<?php echo e($training->seats); ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="publish" type="checkbox"
                                                            value="1" id="defaultCheck2" <?php if($training->publish == 1): ?>
                                                        checked
                                                        <?php endif; ?>/>
                                                        <label class="form-check-label" for="defaultCheck2">
                                                            Published ? (Uncheck if "NO")
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-center">
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Edit
                                                        Training</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>It has Credit: <?php echo e($training->credits); ?>. Venue: <strong><?php echo e($training->venue); ?></strong>,
                                Starting on <u class="text-danger"><?php echo e($training->starton); ?> </u> to End on <u
                                    class="text-danger"><?php echo e($training->endon); ?> </u></p>
                            <hr>
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-md-4 col-12 mb-3 mb-md-0">
                                        <div class="list-group">
                                            <a class="list-group-item list-group-item-action active" id="list-home-list"
                                                data-bs-toggle="list" href="#list-home">Training Topic</a>
                                            <a class="list-group-item list-group-item-action" id="list-profile-list"
                                                data-bs-toggle="list" href="#list-profile">Training Materials</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="tab-content p-0">
                                            <div class="tab-pane fade show active" id="list-home">
                                                <div class="card-header border-bottom">
                                                    <h5 class="card-title mb-0">Training Topic <a href=""
                                                            data-bs-toggle="modal" data-bs-target="#topic"
                                                            class="btn btn-dark text-white pull-left float-end"><i
                                                                class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                                                                class="d-none d-sm-inline-block">training
                                                                topic</span></a>
                                                        <div class="modal fade" id="topic" tabindex="-1"
                                                            aria-hidden="true">
                                                            <div
                                                                class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                                <div class="modal-content p-3 p-md-5">
                                                                    <div class="modal-body">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                        <div class="text-center mb-4">
                                                                            <h3 class="mb-2">Add Training Topic</h3>
                                                                        </div>
                                                                        <form method="POST" class="row g-3"
                                                                            action="<?php echo e(route('trainings.update')); ?>">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('PUT'); ?>
                                                                            <div class="col-12">
                                                                                <label for="title"
                                                                                    class="form-label">Topic</label>
                                                                                <input required type="text" name="topic"
                                                                                    class="form-control"
                                                                                    placeholder="Topic to cover">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="starton"
                                                                                    class="form-label">Start At</label>
                                                                                <input required type="text"
                                                                                    class="form-control" id="startAt"
                                                                                    name="startAt" placeholder="H:i">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="endon"
                                                                                    class="form-label">End At</label>
                                                                                <input required type="text"
                                                                                    class="form-control" id="endAt"
                                                                                    name="endAt" placeholder="H:i">
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label for="title"
                                                                                    class="form-label">Trainer</label>
                                                                                <input required type="text" name="trainer"
                                                                                    class="form-control"
                                                                                    placeholder="Trainer Name">
                                                                            </div>


                                                         
                                                                            <div
                                                                                class="col-12 d-flex justify-content-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary waves-effect waves-light">Add topic
                                                                                    </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h5>

                                                </div>
                                                <div class="row p-4">
                                                    <div class="table-responsive">
                                                        <table class="table m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Topic</th>
                                                                    <th style="width: 400px;">Start & End At</th>
                                                                    <th>Trainer</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            $count = 1;
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo e($count); ?></td>
                                                                    <td>Title</td>
                                                                    <td>Title Title Title Title</td>
                                                                    <td>Title</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="list-profile">
                                                <div class="card-header border-bottom">
                                                    <h5 class="card-title mb-0">Training Materials <a href=""
                                                            data-bs-toggle="modal" data-bs-target="#invite"
                                                            class="btn btn-dark text-white pull-left float-end"><i
                                                                class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                                                                class="d-none d-sm-inline-block">Materials</span></a>
                                                    </h5>

                                                </div>
                                                <div class="row p-4">
                                                    <div class="table-responsive">
                                                        <table class="table m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Title</th>
                                                                    <th>Files</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            $count = 1;
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo e($count); ?></td>
                                                                    <td>Title</td>
                                                                    <td>Title</td>
                                                                    <td>Title</td>

                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>


                </div>
                <hr class="my-0" />


            </div>
        </div>
        <div class="col-xl-4 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <h4> Attendence</h4>
                            <p>Please Add all Advocates who succesffully completed <strong>
                                    <?php echo e($training->title); ?></strong></p>

                        </div>
                    </div>


                </div>
                <hr class="my-0" />


            </div>
        </div>
    </div>

</div>



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
        var startAt = document.querySelector("#startAt");
        var endAt = document.querySelector("#endAt");
   
        startAt.flatpickr({
            enableTime: !0,
          noCalendar: !0
         }),
         endAt.flatpickr({
            enableTime: !0,
          noCalendar: !0
         }),

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/training/details.blade.php ENDPATH**/ ?>