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

    <?php echo $__env->yieldContent('css'); ?>

    <!-- Form Validation -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
</head>

<body>

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">
    <?php if(auth()->guard('admin')->user()): ?>
    <?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
    <?php elseif(auth()->guard('web')->user()): ?>
    <?php if (isset($component)) { $__componentOriginalc962264fccb141affa90279e6325115965d3bebf = $component; } ?>
<?php $component = App\View\Components\UserSidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc962264fccb141affa90279e6325115965d3bebf)): ?>
<?php $component = $__componentOriginalc962264fccb141affa90279e6325115965d3bebf; ?>
<?php unset($__componentOriginalc962264fccb141affa90279e6325115965d3bebf); ?>
<?php endif; ?>
    <?php endif; ?>
    <!-- Layout container -->
    <div class="layout-page">

    <?php if (isset($component)) { $__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c = $component; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Navbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c)): ?>
<?php $component = $__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c; ?>
<?php unset($__componentOriginal08d9d46900ea68d5dc06d8728734a2fd47ca153c); ?>
<?php endif; ?>


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <?php echo $__env->yieldContent('contents'); ?>

        <!-- Footer -->
        <?php if (isset($component)) { $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf = $component; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf)): ?>
<?php $component = $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf; ?>
<?php unset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf); ?>
<?php endif; ?>
        <!-- / Footer -->

          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    
    
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    
  </div>
  <!-- / Layout wrapper -->


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

  <?php echo $__env->make('layouts.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
  <?php echo $__env->yieldContent('js'); ?>

  <!-- Vendors JS -->
  <script src="<?php echo e(asset('assets/vendor/libs/toastr/toastr.js')); ?>"></script>

  <?php if(session('success')): ?>

  <?php elseif(session('error')): ?>
  <?php endif; ?>
  
</body>


</html>

<!-- beautify ignore:end -->

<?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/layouts/app.blade.php ENDPATH**/ ?>