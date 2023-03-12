<?php $__env->startComponent('mail::message'); ?>
# Hello,<br><br> 
You have reset your password and an email has been sent to you to reset it. Click the button below to complete resetting your password.<br>

<?php $__env->startComponent('mail::button', ['url' => route('password.check', 'key='.$key.'&userId='.$email)]); ?>
    Reset Password
<?php echo $__env->renderComponent(); ?>

If you have not requested password reset, please ignore and delete this email.<br><br>


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\rba\resources\views/emails/resetPassword.blade.php ENDPATH**/ ?>