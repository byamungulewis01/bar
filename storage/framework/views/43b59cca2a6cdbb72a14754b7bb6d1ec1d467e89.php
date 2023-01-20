<!DOCTYPE html>
<!-- beautify ignore:start -->

<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo e(asset('assets')); ?>/" data-template="vertical-menu-template">

  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $__env->yieldContent('page_name'); ?> | RBA MIS</title>
    
    <meta name="description" content="Rwanda Bar Association Management Information System" />
    <meta name="keywords" content="RBA MIS, Rwanda Bar Association dashboard, RBA System, RBA Informations">

    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('/assets/img/favicon/favicon.ico')); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="<?php echo e(asset('/assets/fonts/googleapis.com/index.html')); ?>">
    <link rel="preconnect" href="<?php echo e(asset('/assets/fonts/gstatic.com/index.html')); ?>" crossorigin>
    <link href="<?php echo e(asset('/assets/fonts/googleapis.com/css28ebe.css?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap')); ?>" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/fonts/tabler-icons.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/fonts/flag-icons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/css/rtl/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/css/rtl/theme-default.css')); ?>" class="template-customizer-theme-css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/node-waves/node-waves.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/typeahead-js/typeahead.css')); ?>" />
    <!-- Vendor -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/vendor/css/pages/page-auth.css')); ?>">
    <!-- Helpers -->
    <script src="<?php echo e(asset('/assets/vendor/js/helpers.js')); ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?php echo e(asset('/assets/vendor/js/template-customizer.js')); ?>"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('/assets/js/config.js')); ?>"></script>
</head>

<body>

  
  <!-- Content -->

    <div class="container-xxl">
      
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-4 mt-2">
                <a href="index.html" class="app-brand-link gap-2">
                  <img src="<?php echo e(asset('/assets/logo/bar-logo.png')); ?>" alt="RBA Logo" height="90">
                </a>
              </div>
              <!-- /Logo -->
              <?php echo $__env->yieldContent('contents'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- / Content -->
  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo e(asset('/assets/vendor/libs/jquery/jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/libs/popper/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/js/bootstrap.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/libs/node-waves/node-waves.js')); ?>"></script>
  
  <script src="<?php echo e(asset('/assets/vendor/libs/hammer/hammer.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/libs/i18n/i18n.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/libs/typeahead-js/typeahead.js')); ?>"></script>
  
  <script src="<?php echo e(asset('/assets/vendor/js/menu.js')); ?>"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo e(asset('/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>

  <!-- Main JS -->
  <script src="<?php echo e(asset('/assets/js/main.js')); ?>"></script>

  <!-- Page JS -->
  <script src="<?php echo e(asset('/assets/js/pages-auth.js')); ?>"></script>
  
</body>


</html>

<!-- beautify ignore:end -->

<?php /**PATH C:\Users\HP\Documents\Lewis\bar\resources\views/layouts/auth.blade.php ENDPATH**/ ?>