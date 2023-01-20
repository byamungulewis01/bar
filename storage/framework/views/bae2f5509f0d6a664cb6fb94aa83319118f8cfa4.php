<?php $__env->startSection('page_name'); ?>
Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
  <h4 class="mb-1 pt-2">Forgot Password? 🔒</h4>
  <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
  <form id="formAuthentication" class="mb-3" action="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/vertical-menu-template/auth-reset-password-basic.html" method="POST">
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
    </div>
    <button class="btn btn-dark d-grid w-100">Send Reset Link</button>
  </form>
  <div class="text-center">
    <a href="<?php echo e(route('login')); ?>" class="d-flex align-items-center justify-content-center text-dark">
      <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
      Back to login
    </a>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/k20/Documents/Projects/Laravel/rba/resources/views/auth/forgetPassword.blade.php ENDPATH**/ ?>