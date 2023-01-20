<?php $__env->startComponent('mail::message'); ?>
# Welcome to <?php echo e(config('app.name')); ?>


Your new RBA MIS account have been created, credential are:

Email: <?php echo e($email); ?>

Password: <?php echo e($password); ?>


If this looks irrelevant to you, Please Ignore this email.

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\rba\resources\views/emails/newAccount.blade.php ENDPATH**/ ?>