

<?php $__env->startSection('page_name'); ?>
Legal Education 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
        <span class="text-muted fw-light">Legal Education /</span> Profile
    </h4>


    <?php echo $__env->make('profile.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
  
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/profile/training.blade.php ENDPATH**/ ?>