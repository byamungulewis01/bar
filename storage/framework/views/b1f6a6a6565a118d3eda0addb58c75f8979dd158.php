

<?php $__env->startSection('page_name'); ?>
Notify
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- User Content -->
        <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">

            <!-- Current Plan -->
            <div class="card mb-4">
                <h5 class="card-header">Current Plan</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <input type="hidden" name="meeting" value="">
                            <select row="6" required name="user[]" multiple class="form-select"
                                id="exampleFormControlSelect2" aria-label="Multiple select example">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>


                        </div>
                        <div class="col-12">
                            <label class="switch">
                                <span class="switch-label">Subject <span class="text-danger">include in Email
                                        only</span></span>
                            </label>
                            <input required type="text" name="subject" class="form-control" id="subject" value=" ">

                        </div>
                        <div class="col-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea required name="message" class="form-control" id="exampleFormControlTextarea1"
                                 rows="3">Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake.
                             </textarea>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" name="sent[]" type="checkbox" value="SMS"
                                    id="defaultCheck3" />
                                <label class="form-check-label" for="defaultCheck3">SMS (Uncheck if "NO")
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" checked name="sent[]" type="checkbox" value="EMAIL"
                                    id="defaultCheck4" />
                                <label class="form-check-label" for="defaultCheck4">EMAIL (Uncheck if "NO")
                                </label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /Current Plan -->

            </div>
            <!--/ User Content -->
        </div>
    </div>


    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">

    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('assets/vendor/libs/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')); ?>"></script>

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/form-wizard-numbered.js"></script>
    <script src="assets/js/form-wizard-validation.js"></script>

    <script>
        "use strict";

        $(document).ready(function () {
            var o = {
                1: {
                    title: "n/a",
                    class: "bg-label-info"
                },
                2: {
                    title: "Active",
                    class: "bg-label-success"
                },
                3: {
                    title: "Inactive",
                    class: "bg-label-primary"
                },
                4: {
                    title: "Suspended",
                    class: "bg-label-warning"
                },
                5: {
                    title: "Struck Off",
                    class: "bg-label-danger"
                },
                6: {
                    title: "Deceased",
                    class: "bg-label-secondary"
                }
            };
            $('.datatables-users').DataTable({
                ajax: '/api/users/individual',
                columns: [{
                        data: ''
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'regNumber'
                    },
                    {
                        data: 'district'
                    },
                    {
                        data: 'practicing'
                    },
                ],
                columnDefs: [{
                        target: 0,
                        render: function (e, t, a, s) {
                            return '<input type="checkbox" class="check form-check-input" value="' +
                                a.id + '">';
                        }
                    },
                    {
                        targets: 4,
                        render: function (e, t, a, s) {
                            a = a.practicing;
                            return '<span class="badge ' + o[a].class + '" text-capitalized>' +
                                o[a].title + "</span>"
                        }
                    },


                ],

            });

            $('#check_all').on('click', function () {
                $('.check').prop('checked', $(this).prop('checked'));
            });
        });

        function sendCheckedData() {
            var checked_data = $('.check:checked').map(function () {
                return $(this).val();
            }).get();

            $.ajax({
                url: '<?php echo e(route("send_notify")); ?>',
                type: 'POST',
                data: {
                    checked_data: checked_data
                },
                success: function (response) {
                    console.log(response);
                }
            });
        }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/notify.blade.php ENDPATH**/ ?>