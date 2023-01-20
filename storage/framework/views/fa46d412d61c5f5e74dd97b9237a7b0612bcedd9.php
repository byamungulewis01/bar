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
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-profile.css')); ?>" />

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
              <form method="GET" action="<?php echo e(route('search')); ?>">
                <div class="d-flex flex-row rounded pt-2" style="background: none">
                  
                <?php echo csrf_field(); ?>
                  <div class="input-wrapper input-group input-group-lg rounded-pill input-group-merge align-self-center">
                    <span class="input-group-text" id="basic-addon1"><i class="ti ti-search"></i></span>
                    <input type="text" class="form-control form-control-lg prefetch border-left-0 rounded-0  bg-white" value="<?php echo e($user->name); ?>" aria-label="Search" aria-describedby="basic-addon1" name="search" />
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
            <div class="col-md-10 p-md-4">
            <h4 class="fw-bold py-3 mb-5">
              <span class="text-muted fw-light">Roll Membership</span> Information
            </h4>
            <!-- Header -->
              <div class="row">
                <div class="col-12 mt-4">
                  <div class="card mb-4 mt-5">
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                      <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="<?php echo e(asset('assets/img/avatars/')); ?>/<?php echo e($user->photo); ?>" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                      </div>
                      <div class="flex-grow-1 mt-5 pt-5 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                          <div class="user-profile-info mt-3">
                            <h4><?php echo e($user->name); ?></h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                              <li class="list-inline-item">
                                <i class='ti ti-id'></i> ROLL NUMBER: <span class="fw-bold"><?php echo e($user->regNumber); ?></span>
                              </li>
                              <li class="list-inline-item">
                                <i class='ti ti-map-pin'></i> DISTRICT: <span class="fw-bold"><?php echo e($user->district); ?></span>
                              </li>
                              <li class="list-inline-item">
                                <i class='ti ti-sitemap'></i> CATEGORY: <span class="fw-bold"><?php echo e(userCategory($user->status)); ?></span></li>
                            </ul>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-<?php echo e(badge($user->practicing)); ?>">
                            STATUS:  <?php echo e(userStatus($user->practicing)); ?> <i class="ti ti-<?php echo e(icon($user->practicing)); ?> ps-2"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-body">
                      <p class="card-text text-uppercase">Phone Numbers</p>
                      <ul class="list-unstyled mb-0">
                        <?php $__currentLoopData = $user->phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-phone"></i><span class="fw-bold mx-2"><?php echo e($phone->name); ?>:</span> <span><?php echo e($phone->phone); ?></span></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-body">
                      <p class="card-text text-uppercase">Address</p>
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-bold mx-2">E-mail:</span> <span><?php echo e($user->email); ?></span></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card mb-4">
                    <div class="card-body">
                      <p class="card-text text-uppercase">Areas of practice</p>
                      <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center">
                          
                          <?php if($user->areas->count()): ?><i class="ti ti-gavel"></i><?php endif; ?>
                          <?php $__currentLoopData = $user->areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ares): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge bg-label-dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" data-bs-original-title="<?php echo e($area->description); ?>"><?php echo e($area->title); ?></span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <?php if(!$user->areas->count()): ?>
                            Not Specified
                          <?php endif; ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>                

              </div>
              <!--/ Header -->
              <div class="row justify-content-center">
                <div class="col-12 text-center mb-4  mt-4">
                  <h2 class="my-2">About RBA</h2>
                  <div class="row">
                    <div class="col-md-4 mb-md-0 mb-4">
                      <div class="card border shadow-none">
                        <div class="card-body text-start">
                          
                          <p class="mb-2"> The Bar Association in Rwanda is a Legal Professional Organization that was created by an Act of Parliament in 1997 (Law N° 03/97).</p>
                          <p class="mb-3"> This law was amended by Law No 83/2013 of 11/09/2013, the law establishing the Bar Association in Rwanda, determining its Organization and Functioning.</p>
                          <p class="mb-3"> 
                            The Rwanda Bar Association is mainly comprised by the following organs:<br>
                            <ul class="ps-3 my-4 pt-2">
                              <li class="mb-2">The General Assembly</li>
                              <li class="mb-2">Governing Council</li>
                              <li class="mb-0">The President of the Bar</li>
                            </ul>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 mb-md-0 mb-4">
                      <div class="card border shadow-none">
                        <div class="card-body">
                          

                          <h4 class="my-2 text-center">RBA Services</h4>
                            <ul class="ps-3 my-4 text-start">
                              <li>
                                <span class="fw-bold text-info">Services to Roll Members:</span>
                                <ul class="ps-3 my-1 text-start">
                                  The Rwanda Bar Association provides the following services to its membership:<br>
                                  <li class="mt-3 mb-1">Training Programmes for Advocates</li>
                                  <li class="mb-1">CAPA (Certificat d’Aptitude a la Profession d’Avocat) Certification</li>
                                  <li class="mb-1">Medical Insurance for RBA members and their dependants</li>
                                  <li class="mb-1">Providing Towhom it may concern document / Recommendation letter.</li>
                                  <li class="mb-0">Issuing Advocate Cards</li>
                                </ul>
                              </li>
                            </ul>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 mb-md-0 mb-4">
                      <div class="card border shadow-none">
                        <div class="card-body text-center">
                          <img src="<?php echo e(asset('assets/logo/logo-simplified.png')); ?>" class="mt-1" alt="RBA Logo" width="170">
                          <ul class="ps-3 my-4 text-start">
                            <li>
                              <span class="fw-bold text-success">Service to General Public:</span>
                              <ul class="ps-3 my-1 text-start">
                              The Rwanda Bar Association provides the following services:<br>
                                <li class="mt-3 mb-1">Providing information to the public</li>
                                <li class="mb-1">Handling complains between advocates and the public.</li>
                                <li class="mb-1">Providing legal information, advice, orientation, mediation, and legal assistance & representation to indigent and vulnerable people free of charge.</li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
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

<?php /**PATH C:\xampp\htdocs\bar\resources\views/search/profile.blade.php ENDPATH**/ ?>