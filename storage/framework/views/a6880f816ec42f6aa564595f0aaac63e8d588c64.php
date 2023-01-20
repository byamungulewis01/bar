;

<?php $__env->startSection('page_name'); ?>
New Meeting
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container-xxl flex-grow-1 container-p-y">

<div class="row justify-content-center">
  <!-- Basic Custom Radios -->
  <div class="col-xl-6 mb-4">
    <div class="card">
      <h5 class="card-header">New Meeting</h5>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-12">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title">
          </div>
          <div class="col-md-6">
            <label for="date" class="form-label">Date and Start time</label>
            <input type="text" class="form-control" id="date" name="date" placeholder="Month DD, YYYY H:i">
          </div>
          <div class="col-md-6">
            <label for="end" class="form-label">End time</label>
            <input type="text" class="form-control" id="end" name="end" placeholder="H:i">
          </div>
          <div class="col-12">
            <label for="venue" class="form-label">Venue</label>
            <input type="text" class="form-control" id="venue">
          </div>
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-basic checked">
              <label class="form-check-label custom-option-content" for="published1">
                <input name="published" class="form-check-input" type="radio" value="1" id="published1" checked="">
                <span class="custom-option-header">
                  <span class="h6 mb-0">Published</span>
                  <span class="text-muted"></span>
                </span>
                <span class="custom-option-body">
                  <small>Every user will get this meeting on their meeting list</small>
                </span>
              </label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-basic">
              <label class="form-check-label custom-option-content" for="published2">
                <input name="published" class="form-check-input" type="radio" value="0" id="published2">
                <span class="custom-option-header">
                  <span class="h6 mb-0">Not Published</span>
                  <span class="text-muted"></span>
                </span>
                <span class="custom-option-body">
                  <small>Only the invited users will get this meeting on their list</small>
                </span>
              </label>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-center">
            <button type="button" class="btn btn-primary waves-effect waves-light">Save Meeting</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Basic Custom Radios -->
</div>

<script>
// Check selected custom option
window.Helpers.initCustomOptionCheck();
</script>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>

<script>
  "use strict";
  $(function(){
    var dtt=document.querySelector("#date"),dte=document.querySelector("#end");
    dtt&&dtt.flatpickr({enableTime:!0, altInput:!0,altFormat:"F j, Y H:i",dateFormat:"Y-m-d H:i", minDate: 'today'})
    dte&&dte.flatpickr({enableTime:!0,noCalendar:!0})
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\bar\resources\views/meetings/create.blade.php ENDPATH**/ ?>