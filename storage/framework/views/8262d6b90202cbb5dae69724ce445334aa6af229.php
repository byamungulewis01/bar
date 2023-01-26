<?php if(Session::has('success')): ?>
<div style="position: absolute;" class="bs-toast toast fade show bg-light" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="ti ti-bell ti-xs me-2 text-secondary"></i>
      <div class="me-auto fw-semibold">RBA Notify</div>
      <small class="text-muted">momment ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-warning">
      <?php echo e(Session::get('success')); ?>

    </div>
  </div>
<?php endif; ?>
<?php /**PATH C:\Users\HP\Documents\Lewis\bar\resources\views/layouts/flash_message.blade.php ENDPATH**/ ?>