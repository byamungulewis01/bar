<!DOCTYPE html>
<!-- beautify ignore:start -->

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="<?php echo e(asset('assets/')); ?>" data-template="vertical-menu-template">

  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>RBA MIS</title>
    
    <meta name="description" content="Rwanda bar association management information system" />
    <meta name="keywords" content="rba, rwanda bar association, rba mis, rba management information system">

    
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
    

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="<?php echo e(asset('assets/vendor/js/helpers.js')); ?>"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>


</head>

<body>  
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar layout-without-menu">
  <div class="layout-container">

    <!-- Layout container -->
    <div class="layout-page">

      <!-- Content wrapper -->
      <div class="content-wrapper" style="z-index:10">

        <!-- Content -->
        <div class="container-xxl container-p-y ">
          <div class="row border-bottom pb-md-3">
            <div class="col-md-2 col-sm-2 text-center">
              <a href="<?php echo e(route('search')); ?>"><img src="<?php echo e(asset('assets/logo/bar-logo.png')); ?>" class="me-md-2" alt="RBA Logo" style="width:100%; max-width:150px"></a>
            </div>
            <div class="col-md-7 col-sm-8">
              <form method="GET">
                <div class="d-flex flex-row rounded pt-2" style="background: none">
                <?php echo csrf_field(); ?>
                  <div class="input-wrapper input-group input-group-lg rounded-pill input-group-merge align-self-center">
                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-search"></i></span>
                    <input type="text" class="form-control form-control-lg prefetch border-left-0 rounded-0  bg-white" value="<?php echo e($search); ?>" aria-label="Search" aria-describedby="basic-addon1" name="search" />
                    <button type="submit" class="btn btn-label-dark waves-effect">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-3 col-sm-2 text-end">
              <?php if(auth()->guard()->guest()): ?>
              <a href="<?php echo e(route('login')); ?>" class="btn btn-dark waves-effect align-self-end waves-light" style="z-index:10">Sign In</a>
              <?php endif; ?>
              <?php if(auth()->guard()->check()): ?>
              <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-dark waves-effect align-self-end waves-light" style="z-index:10">Go to dashboard</a>
              <?php endif; ?>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-2 col-sm-12">&nbsp;</div>
            <div class="col-md-7 col-sm-10 p-md-4">
              <span class="text-muted fst-italic d-block mb-3">
                About <?php echo e($count); ?> <?php echo e(Str::plural('result', $count)); ?> were found
              </span> 
              <?php if(!$count): ?>
              <div>
                <span class="d-block">Your search - <span class="fw-bold"><?php echo e($search); ?></span> - did not match any record </span>
                <span class="d-block mt-2">Suggestions:  </span>
                <ul class="ms-2 g-2 my-2">
                  <li class="mb-2">Make sure that all words are spelled correctly.</li>
                  <li class="mb-2">Try different keywords</li>
                  <li class="mb-2">Try more general keywords</li>
                  <li>Try fewer keywords</li>
                </ul>
              </div>
              <?php else: ?>
              <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class=" text-body card bg-transparent shadow-none my-2">
                <div class="card-body p-0">
                  <div class="d-flex align-items-center mb-3">
                    <a href="<?php echo e(route('result', $user->id)); ?>" class="d-flex align-items-center">
                      <div class="avatar me-2">
                        <img src="<?php echo e(asset('assets/img/avatars/')); ?>/<?php echo e($user->photo); ?>" alt="Avatar" class="rounded">
                      </div>
                      <div class="me-2 text-body ms-1">
                        <h5 class="mb-0"><?php echo e($user->name); ?></h5>
                        <div class="client-info"><strong>Status: </strong><span class="badge bg-<?php echo e(badge($user->practicing)); ?>"><?php echo e(userStatus($user->practicing)); ?></span></div>
                      </div>
                    </a>
                  </div>
                  <a href="<?php echo e(route('result', $user->id)); ?>" class="mb-3 text-body">
                    based in <?php echo e($user->district); ?> distict, <?php echo e($user->name); ?> have roll number of <?php echo e($user->regNumber); ?> and was admitted on <?php echo e($user->date->format('d/m/Y')); ?>  click to view more
                    
                  </a>
                  <div class="d-flex align-items-center pt-1">
                    <div class="ms-auto">
                      <span class="me-2 h6">Area of Practice:</span>
                      <?php $__currentLoopData = $user->areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="javascript:;" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" data-bs-original-title="<?php echo e($area->laws->description); ?>"><span class="badge bg-label-dark"><?php echo e($area->laws->title); ?></span></a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php if(!$user->areas->count()): ?>
                        <span class="fst-italic">Not Specified</span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
            <div class="col-md-3 col-sm-10 align-self-end">
              <div class="card card-action my-2">
                <div class="card-header align-items-center">
                  <h5 class="card-action-title mb-0">Status definitions</h5>
                </div>
                <div class="card-body pb-0">
                  <ul class="timeline ms-1 mb-0">
                    <li class="timeline-item timeline-item-transparent">
                      <span class="timeline-point timeline-point-success"></span>
                      <div class="timeline-event pe-0">
                        <div class="timeline-header">
                          <h6 class="mb-0">ACTIVE</h6>
                        </div>
                        <p class="mb-2">The advocate is certified to practice</p>
                      </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent">
                      <span class="timeline-point timeline-point-primary"></span>
                      <div class="timeline-event pe-0">
                        <div class="timeline-header">
                          <h6 class="mb-0">Inactive / Unknown</h6>
                        </div>
                        <p class="mb-0">The advocate is not certified to practice for the indicated year</p>
                      </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent">
                      <span class="timeline-point timeline-point-warning"></span>
                      <div class="timeline-event pe-0">
                        <div class="timeline-header">
                          <h6 class="mb-0">Suspended</h6>
                        </div>
                        <p class="mb-2">The advocate is temporarily not permitted to practice</p>
                        
                      </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent">
                      <span class="timeline-point timeline-point-danger"></span>
                      <div class="timeline-event pe-0">
                        <div class="timeline-header">
                          <h6 class="mb-0">Struck Off</h6>
                        </div>
                        <p class="mb-0">The Advocate is STRUCK OFF the advocates' roll and is not permitted to practice</p>
                      </div>
                    </li>
                    <li class="timeline-item timeline-item-transparent border-0">
                      <span class="timeline-point timeline-point-secondary"></span>
                      <div class="timeline-event pe-0">
                        <div class="timeline-header">
                          <h6 class="mb-0">Deceased</h6>
                        </div>
                        <p class="mb-0">The Advocate has passed on (Died)</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- / Content -->
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
        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>
  
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
  <script src="<?php echo e(asset('assets/vendor/libs/bloodhound/bloodhound.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/js/menu.js')); ?>"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  
  

  <!-- Main JS -->
  <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

  <!-- Page JS -->
  <script>
    "use strict";
    $(function(){
      $(".prefetch").typeahead(
        {
          hint:!isRtl,
          highlight:!0,
          minLength:1
        },
        {
          name:"states",
          source:new Bloodhound({
            datumTokenizer:Bloodhound.tokenizers.whitespace,
            queryTokenizer:Bloodhound.tokenizers.whitespace,
            prefetch:"http://localhost:8000/api/search"
          })
        }
      )
    });
  </script>
  
  
</body>

</html>

<!-- beautify ignore:end -->

<?php /**PATH C:\xampp2\htdocs\bar\resources\views/search/result.blade.php ENDPATH**/ ?>