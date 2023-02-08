

<?php $__env->startSection('page_name'); ?>
Disciplene info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
        <span class="text-muted fw-light">Disciplinary case /</span> Profile
    </h4>


    <?php echo $__env->make('myprofile.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <!-- User Profile Content -->
     <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-5">
       
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Case Information</h5>
                <?php $__currentLoopData = $sittings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sitting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>Disciplinary Case Number</td>
                                    <td><?php echo e($case->case_number); ?></td>
                                </tr>
                                <tr>
                                    <td>Created By</td>
                                    <td><?php echo e($case->admin->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Created On</td>
                                    <td><?php echo e($case->created_at); ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?php if($case->case_status =='OPEN'): ?>
                                        <span class="badge bg-label-info"><?php echo e($case->case_status); ?></span>
                                        <?php else: ?>
                                        <span class="badge bg-label-danger"><?php echo e($case->case_status); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Authority</td>
                                    <td><?php echo e($case->authority); ?></td>
                                </tr>
                                <tr>
                                    <td>Complaint</td>
                                    <td><?php echo e($case->complaint); ?></td>
                                </tr>
                                <tr>
                                    <td>Next Sitting Day</td>
                                    <td><?php echo e($sitting->sittingDay); ?></td>
                                </tr>
                                <tr>
                                    <td>Next Sitting Time</td>
                                    <td><?php echo e($sitting->sittingTime); ?></td>
                                </tr>

                                <tr>
                                    <td>Plaintiff</td>
                                    <td><?php echo e($case->p_name); ?>


                                        <?php if($case->case_type == 1): ?>

                                        <?php elseif($case->case_type == 2): ?>
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        <?php else: ?>
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Defendant</td>
                                    <td><?php echo e($case->d_name); ?>

                                        <?php if($case->case_type == 1): ?>
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        <?php elseif($case->case_type == 2): ?>

                                        <?php else: ?>
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              
                </div>


            </div>
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">Case Sammry</h5>
                <div class="cord-body bg-light" style="padding: 2%">
                    <p>
                        <?php echo e($case->sammary); ?>

                    </p>
                </div>

            </div>
       

            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Participant</h5>
                  
                </div>
                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Advocate</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($count); ?></td>
                                    <td><?php echo e($member->user->name); ?></td>
                                    <td><?php echo e($member->role); ?></td>
                              

                                </tr>
                                <?php
                                $count++
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--/ Teams -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Schedules</th>
                                    <th style="width: 700px;">Conclusions</th>
                                    <th style="width: 10px;"></th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $count = 1;
                                ?>
                                <?php $__currentLoopData = $sittings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sitting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sitting->sittingDay == 'NONE'): ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                               
                                </tr>
                                <?php else: ?>
                                <tr>
                                    <td><?php echo e($count); ?></td>
                                    <td>

                                        <li class="d-flex align-items-center"><span class="fw-bold mx-2"><span
                                                    class="badge bg-primary"><?php echo e($sitting['category']); ?></span>
                                        </li>
                                        <li class="d-flex align-items-center"><span class="fw-bold mx-2">Sitting
                                                Day:</span><?php echo e($sitting['sittingDay']); ?></span></li>
                                        <li class="d-flex align-items-center"><span class="fw-bold mx-2">Sitting
                                                Time:</span><?php echo e($sitting['sittingTime']); ?></span></li>
                                        <li class="d-flex align-items-center"></i><span
                                                class="fw-bold mx-2">Sitting
                                                Time:</span><?php echo e($sitting['sittingVenue']); ?></span></li>
                                        <li class="d-flex align-items-center"><span
                                                class="fw-bold mx-2">Scheduled
                                                by:</span><?php echo e($sitting->admin->name); ?></span></li>

                                    </td>
                                    <td>
                                        <li class="d-flex align-items-center mb-2"><span class="fw-bold mx-2"><span
                                            class="badge bg-danger"><?php echo e($sitting['decisionCategory']); ?></span>
                                </li>
                                <li class="d-flex align-items-center"><span class="fw-bold mx-2">
                                    <span class="badge bg-primary">Targeting:</span>
                                </span><?php echo e($sitting['targetedAdvocate']); ?></span></li>
                                
                                    <u>Comment</u> <br>
                                <?php echo e($sitting['comment']); ?>

    
                                    </td>
                                

                                </tr>
                                <?php endif; ?>

                                <?php
                                $count++;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <!--/ About User -->

        <!--/ Profile Overview -->
    </div>

</div>
<!--/ User Profile Content -->

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-profile.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/myprofile/discipline_delails.blade.php ENDPATH**/ ?>