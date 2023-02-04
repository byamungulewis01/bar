

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
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                 <tr>
                    <th>#</th>
                    <th style="width: 20%">Legal Aids Seeker</th>
                    <th>Referrer</th>
                    <th>Case Number</th>
                    <th>Case Nature</th>
                    <th>Case Status</th>
                    <th>Hearing Day</th>
                    <th></th>
                 </tr>
                </thead>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $count = 1;
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $probonos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $probono): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tbody>
                  <tr>
                    <td><span class="badge bg-label-danger me-2"><?php echo e($count); ?></span></td>
                    <td><?php echo e($probono->fname); ?> <?php echo e($probono->lname); ?> <br>
                      <span class="badge bg-label-info me-2">Phone</span><?php echo e($probono->phone); ?>

                    </td>
                    <td><?php echo e($probono->referrel); ?> <br>
                      <span class="badge bg-label-primary me-2">Category</span><?php echo e($probono->category); ?>

                    </td>
                    <td><?php echo e($probono->referral_case_no); ?></td>
                    <td><?php echo e($probono->case_nature); ?></td>
                    <td>
                      <?php if($probono->status == 'OPEN'): ?>
                      <span class="badge bg-label-info me-2"><?php echo e($probono->status); ?></span>
                      <?php else: ?>
                      <span class="badge bg-label-danger me-2"><?php echo e($probono->status); ?></span>
                      <?php endif; ?>
        
                    </td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($probono->hearing_date)->locale('fr')->format('F j, Y')); ?>

                    </td>
                    <td><a href="" class="btn btn-sm btn-primary">Details</a></td>
                  </tr>
                </tbody>
                <?php
                $count++
                ?>
    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td>
                     No Probono Case Assigned
                    </td>
                </tr>
                <?php endif; ?>
      
              </tbody>
            </table>
          </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/myprofile/probono.blade.php ENDPATH**/ ?>