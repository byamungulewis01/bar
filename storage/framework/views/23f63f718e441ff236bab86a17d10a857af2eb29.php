<!DOCTYPE html>
<!-- beautify ignore:start -->

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="<?php echo e(asset('assets')); ?>/" data-template="vertical-menu-template">

  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $__env->yieldContent('page_name'); ?> | RBA MIS</title>
    
    <meta name="description" content="Rwanda Bar Association Management Information System" />
    <meta name="keywords" content="RBA MIS, Rwanda Bar Association dashboard, RBA System, RBA Informations">


    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon/favicon.ico')); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="<?php echo e(asset('assets/fonts/googleapis.com/index.html')); ?>">
    <link rel="preconnect" href="<?php echo e(asset('assets/fonts/gstatic.com/index.html')); ?>" crossorigin>
    <link href="<?php echo e(asset('assets/fonts/googleapis.com/css28ebe.css?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap')); ?>" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/tabler-icons.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/flag-icons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css')); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/toastr/toastr.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
    <!-- Helpers -->
    <script src="<?php echo e(asset('assets/vendor/js/helpers.js')); ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?php echo e(asset('assets/vendor/js/template-customizer.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/toast/css/jquery.toast.css')); ?>">

    <!-- Form Validation -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
</head>

<body>

    <div class="container mt-4">
        
        <br>
        <br>
        <div class="row">
          <?php $__empty_1 = true; $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="col-md-4 p-2 m-2 border">
            <h6 class="fw-semibold">RWANDA BAR ASSOCIATION (R.B.A)</h6>
          <span class="fw-semibold"><u>ATTENDANCE VOUCHER</u></span>
          <div class="pt-1">
            <span>Date:</span>
            <span class="fw-semibold"><?php echo e($voucher->attendanceDay); ?></span>
          </div>
          <div class="pt-1">
            <span>Vouncher Number:</span>
            <span class="fw-semibold"><?php echo e($voucher->voucherNumber); ?></span>
          </div>
          <div class="pt-1">
            <span>Trainee:</span>
            <span class="fw-semibold"><?php echo e($voucher->user->name); ?></span>
          </div>
        </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <h6>Empty </h6>
          <?php endif; ?>
           
        </div>
    </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/js/bootstrap.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.js')); ?>"></script>
  
  <script src="<?php echo e(asset('assets/vendor/libs/hammer/hammer.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/i18n/i18n.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.js')); ?>"></script>
  
  <script src="<?php echo e(asset('assets/vendor/js/menu.js')); ?>"></script>
  <!-- endbuild -->

  <!-- Main JS -->
  <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/toast/js/jquery.toast.js')); ?>"></script>

  <!-- Vendors JS -->
  <script src="<?php echo e(asset('assets/vendor/libs/toastr/toastr.js')); ?>"></script>

</body>


</html>

<!-- beautify ignore:end --><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/training/attendancevourcher.blade.php ENDPATH**/ ?>