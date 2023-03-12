

<?php $__env->startSection('page_name'); ?>
New Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
      <h4 class="mb-1 pt-2">Create new password</h4>
      <p class="text-muted">Your new password must be different from previous</p>
      <form id="formAuthentication" class="<?php if($errors->any()): ?> was-validated <?php endif; ?>" novalidate="" class="mb-3" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Confirm Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <button class="btn btn-dark d-grid w-100" type="submit">Reset Password</button>
        </div>
      </form>
      <div class="text-center">
        <a href="<?php echo e(route('login')); ?>" class="d-flex align-items-center justify-content-center text-dark">
          <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
          Back to login
        </a>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rba\resources\views/auth/reset.blade.php ENDPATH**/ ?>