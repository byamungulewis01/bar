

<?php $__env->startSection('page_name'); ?>
Disciplinary Cases
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Disciplinary Cases
                <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal"
                    data-bs-target="#twoFactorAuth">
                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                    <span class="d-none d-sm-inline-block">New Case</span></a></h5>

            <!-- Two Factor Auth Modal -->

            <div class="modal fade" id="twoFactorAuth" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-simple">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">New Discipline case</h3>
                                <p class="text-muted">You also need to select a method by which the proxy authenticates
                                    to the directory serve.</p>
                            </div>
                            <div class="form-check custom-option custom-option-basic mb-3">
                                <label class="form-check-label custom-option-content ps-3" for="customRadioTemp1"
                                    data-bs-target="#twoFactorAuthOne" data-bs-toggle="modal">
                                    <input name="customRadioTemp" class="form-check-input d-none" type="radio" value=""
                                        id="customRadioTemp1" />
                                    <div class="d-flex align-items-start">
                                        <i class="ti ti-settings ti-xl me-3"></i>
                                        <div>
                                            <span class="custom-option-header">
                                                <span class="h4 mb-2">Citizen / Advocates</span>
                                            </span>
                                            <span class="custom-option-body">
                                                <p class="mb-0">Get code from an app like Google Authenticator or
                                                    Microsoft Authenticator.</p>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content ps-3" for="customRadioTemp2"
                                    data-bs-target="#twoFactorAuthTwo" data-bs-toggle="modal">
                                    <input name="customRadioTemp" class="form-check-input d-none" type="radio" value=""
                                        id="customRadioTemp2" />
                                    <div class="d-flex align-items-start">
                                        <i class="ti ti-message ti-xl me-3"></i>
                                        <div>
                                            <span class="custom-option-header">
                                                <span class="h4 mb-2">Advocates / Citizen </span>
                                            </span>
                                            <span class="custom-option-body">
                                                <p class="mb-0">We will send a code via SMS if you need to use your
                                                    backup login method.</p>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Authentication App -->
            <div class="modal fade" id="twoFactorAuthOne" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add New Case</h3>
                                <p class="text-muted">Add new card to complete payment</p>
                            </div>
                            <form method="POST" class="row g-3" action="<?php echo e(route('cases.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="col-12">
                                    <label class="form-label w-100" for="modalAddCard">Name</label>
                                    <div class="input-group input-group-merge">
                                        <input id="modalAddCard" name="name" value="<?php echo e(old('name')); ?>"
                                            class="form-control credit-card-mask" type="text" placeholder="John Doe" />
                                        <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                                class="card-type"></span></span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label" for="modalAddCardExpiryDate">Email</label>
                                    <input type="email" id="modalAddCardExpiryDate" name="email"
                                        value="<?php echo e(old('email')); ?>" class="form-control expiry-date-mask"
                                        placeholder="johndoe@gmail.com" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalAddCardName">Mobile Number</label>
                                    <input type="number" name="phone" value="<?php echo e(old('phone')); ?>" id="modalAddCardName"
                                        class="form-control" placeholder="000 0000 000" />
                                </div>

                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Advocate defendant</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-label w-100" for="modalAddCard">Name</label>
                                    <div class="input-group input-group-merge">
                                        <select id="user" name="advcate_id" class="form-select">
                                            <option value="" selected> - Select - </option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(old('user')==$user->name): ?> selected <?php endif; ?>
                                                value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardName">complaint</label>
                                    <input type="text" value="<?php echo e(old('complaint')); ?>" name="complaint"
                                        id="modalAddCardName" class="form-control" placeholder="Subject here" />
                                    <input type="hidden" name="case_type" value="advcate" />
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                    <textarea name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3">
                                        <?php echo e(old('sammary')); ?>

                                    </textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary btn-reset"
                                        data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Authentication via SMS -->
            <div class="modal fade" id="twoFactorAuthTwo" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add New Case</h3>
                                <p class="text-muted">Add new card to complete payment</p>
                            </div>
                            <form method="POST" class="row g-3" action="<?php echo e(route('cases.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="col-12">
                                    <label class="form-label w-100" for="modalAddCard">Name</label>
                                    <div class="input-group input-group-merge">
                                        <select id="user" name="advcate_id" class="form-select">
                                            <option value="" selected> - Select - </option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(old('user')==$user->name): ?> selected <?php endif; ?>
                                                value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Civilian defendant</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-label w-100" for="modalAddCard">Name</label>
                                    <div class="input-group input-group-merge">
                                        <input id="modalAddCard" name="name" value="<?php echo e(old('name')); ?>"
                                            class="form-control credit-card-mask" type="text" placeholder="John Doe" />
                                        <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                                class="card-type"></span></span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label" for="modalAddCardExpiryDate">Email</label>
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                        id="modalAddCardExpiryDate" class="form-control expiry-date-mask"
                                        placeholder="johndoe@gmail.com" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalAddCardName">Mobile Number</label>
                                    <input type="number" name="phone" value="<?php echo e(old('phone')); ?>" id="modalAddCardName"
                                        class="form-control" placeholder="000 0000 000" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardName">Subject</label>
                                    <input type="text" name="complaint" value="<?php echo e(old('complaint')); ?>"
                                        id="modalAddCardName" class="form-control" placeholder="Subject here" />
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                    <textarea name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3">
                                        <?php echo e(old('sammary')); ?>

                                    </textarea>
                                    <input type="hidden" name="case_type" value="civilian">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary btn-reset"
                                        data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Two Factor Auth Modal -->




        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-cases table border-top">
                <thead>
                    <tr>
                        <th>Case Number</th>
                        <th>Complaint</th>
                        <th>Plaintiff</th>
                        <th>Defendant</th>
                        <th>Authority</th>
                        <th>Status</th>
                        <th>Next Sitting</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $__empty_1 = true; $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tbody>
                    <tr>

                        <td><?php echo e($case->case_number); ?></td>
                        <td><?php echo e($case->complaint); ?></td>
                        <td>
                            <?php if($case->case_type == 'advcate'): ?>
                            <?php echo e($case->name); ?>

                            <?php else: ?>
                            <?php echo e($case->user->name); ?> <span class="badge bg-label-warning me-1">Advocate</span>
                            <?php endif; ?>
                        </td>
                        <td> <?php if($case->case_type == 'advcate'): ?>
                            <?php echo e($case->user->name); ?> <span class="badge bg-label-warning me-1">Advocate</span>
                            <?php else: ?>
                            <?php echo e($case->name); ?>

                            <?php endif; ?>
                        </td>
                        <td></td>
                        <td>
                            <?php if($case->status == 'open'): ?>
                            <span class="badge bg-label-info me-2"><?php echo e($case->status); ?></span>
                            <?php else: ?>
                            <span class="badge bg-label-danger me-2"><?php echo e($case->status); ?></span>
                            <?php endif; ?>
                        </td>
                        <td></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(route('cases.show',$case->id)); ?>"><i
                                            class="ti ti-pencil me-2"></i> Edit</a>
                                    <?php if($case->status == 'open'): ?>
                                    <a data-bs-toggle="modal" data-bs-target="#casestatus<?php echo e($case->id); ?>" class="dropdown-item text-warning" href="">
                                        close case </a>
                                    <?php else: ?>
                                    <a data-bs-toggle="modal" data-bs-target="#casestatus<?php echo e($case->id); ?>" class="dropdown-item text-warning" href="">
                                        Open Case </a>
                                        
                                    <?php endif; ?></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                
<div class="modal modal-top fade" id="casestatus<?php echo e($case->id); ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form action="<?php echo e(route('cases.status')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <input type="hidden" name="case_id" value="<?php echo e($case->id); ?>">
          <input type="hidden" name="status" value="<?php echo e($case->status); ?>">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Are you sure you want to do this?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Yes change</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- / Content -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tbody>
                    <tr>
                        <td></td>
                        <td>No record Found</td>

                    </tr>
                </tbody>
                <?php endif; ?>

            </table>
        </div>
    </div>

</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\Lewis\bar\resources\views/cases/index.blade.php ENDPATH**/ ?>