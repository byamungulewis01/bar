

<?php $__env->startSection('page_name'); ?>
Discipline Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3><?php echo e($case->complaint); ?> <small class="card-text text-uppercase text-danger"><?php echo e($case->case_number); ?></small></h3>
                    <small class="card-text text-uppercase">About Discipline</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span
                                class="fw-bold mx-2">Status:</span> <span
                                class="badge bg-label-info"><?php echo e($case->status); ?></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span
                                class="fw-bold mx-2">Created:</span><?php echo e($case->created_at); ?></span></li>

                    </ul>
                    <small class="card-text text-uppercase">PLAINTIFF</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <?php if($case->case_type == 'advcate'): ?>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span> <?php echo e($case->name); ?><span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span> <?php echo e($case->email); ?></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-phone"></i><span
                                class="fw-bold mx-2">Mobile:</span> <span> <?php echo e($case->phone); ?></span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span><?php echo e($case->user->name); ?> <span><span
                                    class="badge bg-label-warning me-1">Advocate</span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span><?php echo e($case->user->email); ?> </span></li>
                        <?php endif; ?>

                    </ul>
                    <small class="card-text text-uppercase">DEFENDANT</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <?php if($case->case_type == 'advcate'): ?>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span><?php echo e($case->user->name); ?> <span><span
                                    class="badge bg-label-warning me-1">Advocate</span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span><?php echo e($case->user->email); ?> </span></li>
                        <?php else: ?>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span> <?php echo e($case->name); ?><span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span> <?php echo e($case->email); ?></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-phone"></i><span
                                class="fw-bold mx-2">Mobile:</span> <span> <?php echo e($case->phone); ?></span></li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
            <!--/ About User -->

            <!--/ Profile Overview -->
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">CREATED BY</h5>
                <div class="cord-body bg-light" style="padding: 2%">
                    <p>
                        <?php echo e($case->sammary); ?>

                    </p>
                </div>
            </div>

            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Participant</h5>
               
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-2">
                                        <img src="../../assets/img/icons/brands/react-label.png" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div class="me-2 ms-1">
                                        <h6 class="mb-0"><?php echo e($host->name); ?></h6>
                                        <small class="text-muted"><?php echo e($host->email); ?></small>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;"><span class="badge bg-label-danger">host</span></a>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-2">
                                        <img src="../../assets/img/icons/brands/support-label.png" alt="Avatar"
                                            class="rounded-circle" />
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
                                        <img src="../../assets/img/icons/brands/figma-label.png" alt="Avatar"
                                            class="rounded-circle" />
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
                       
                        <li class="text-center">
                            <a href="javascript:;">Add new</a>
                        </li>
                    </ul>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\Lewis\bar\resources\views/cases/detail.blade.php ENDPATH**/ ?>