

<?php $__env->startSection('page_name'); ?>
Disciplene info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
        <span class="text-muted fw-light">Disciplinary case /</span> Profile
    </h4>


    <?php echo $__env->make('profile.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- User Profile Content -->
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Case number</th>
                        <th>Complaint</th>
                        <th>Plaintiff</th>
                        <th>Defendant</th>
                        <th>Authority</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php
                $count = 1;
                ?>
                <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody class="table-border-bottom-0">

                    <tr>

                        <td><?php echo e($count); ?></td>
                        <td><a
                                href="<?php echo e(route('user.discipline_details',[$user_id,$case->id])); ?>"><?php echo e($case->case_number); ?></a>
                        </td>
                        <td><?php echo e($case->complaint); ?></td>
                        <td><?php echo e($case->p_name); ?> <br>
                            <?php if($case->case_type != 1): ?>
                            <span class="badge bg-label-warning me-2">Advocate</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($case->d_name); ?> <br>
                            <?php if($case->case_type != 2): ?>
                            <span class="badge bg-label-warning me-2">Advocate</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($case->authority); ?></td>
                        <td>
                            <?php if($case->case_status == 'OPEN'): ?>
                            <span class="badge bg-label-info me-2"><?php echo e($case->case_status); ?></span>
                            <?php else: ?>
                            <span class="badge bg-label-danger me-2"><?php echo e($case->case_status); ?></span>
                            <?php endif; ?>
                        </td>

                    </tr>
                </tbody>

                <?php
                $count++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\Lewis\bar\resources\views/profile/discipline.blade.php ENDPATH**/ ?>