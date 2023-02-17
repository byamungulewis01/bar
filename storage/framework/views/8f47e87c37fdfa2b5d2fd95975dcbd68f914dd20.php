
<?php $__env->startSection('contents'); ?>
    <?php if(session('sentEmail')): ?>
        <!-- /Logo -->
        <h4 class="mb-1 pt-2">Verify your email ✉️</h4>
        <p class="text-start mb-4">
          Password reset link have been sent to your email address: <?php echo e(session('sentEmail')); ?> Please follow the link inside to continue.
        </p>
        <a class="btn btn-primary w-100 mb-3" href="<?php echo e(route('login')); ?>">
          Skip for now
        </a>
        <p class="text-center mb-0">Didn't get the mail?
          <a href="javascript:void(0);">
            Resend
          </a>
        </p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/auth/sent.blade.php ENDPATH**/ ?>