

<?php $__env->startSection('page_name'); ?>
Probono Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>`Probono Case Information</h5>
                    
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>Case Number</td>
                                    <td><?php echo e($probono->referral_case_no); ?></td>
                                </tr>

                                <tr>
                                    <td>Created On</td>
                                    <td><?php echo e($probono->created_at); ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td> <?php switch($probono->status):
                                        case ('OPEN'): ?>
                                        <span class="badge bg-label-primary me-2"><?php echo e($probono->status); ?></span>
                                        <?php break; ?>
                                        <?php case ('WON'): ?>
                                        <span class="badge bg-label-success me-2"><?php echo e($probono->status); ?></span>
                                        <?php break; ?>
                                        <?php case ('LOST'): ?>
                                        <span class="badge bg-label-warning me-2"><?php echo e($probono->status); ?></span>
                                        <?php break; ?>
                                        <?php default: ?>
                                        <span class="badge bg-label-danger me-2"><?php echo e($probono->status); ?></span>
                                        <?php endswitch; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hearing day </td>
                                    <td><?php echo e($probono->hearing_date); ?></td>
                                </tr>
                                <tr>
                                    <td>Case Nature</td>
                                    <td><?php echo e($probono->case_nature); ?></td>
                                </tr>
                                <tr>
                                    <td>Jurisdiction</td>
                                    <td><?php echo e($probono->jurisdiction); ?></td>
                                </tr>
                                <tr>
                                    <td>Court</td>
                                    <td><?php echo e($probono->court); ?> </td>
                                </tr>
                                <tr>
                                    <td>LEGAL AIDS SEEKER</td>
                                    <td><strong><?php echo e($probono->fname); ?> <?php echo e($probono->lname); ?> </strong><br>
                                        <span class="badge bg-label-info me-2">Phone</span><?php echo e($probono->phone); ?></td>
                                </tr>
                                <tr>
                                    <td>REFERRER</td>
                                    <td><?php echo e($probono->referrel); ?></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Probono Case Files</h5>

                </div>
                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>File</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $count = 1;
                                ?>
                                <?php $__empty_1 = true; $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($count); ?></td>
                                    <td><?php echo e($file->case_title); ?></td>
                                    <td><?php echo e($file->case_type); ?></td>
                                    <td><a href="<?php echo e(route('Download-files',$file->case_file)); ?>">Download</a></td>
                                    <td> <a href="" data-bs-toggle="modal" data-bs-target="#delete<?php echo e($file->id); ?>"
                                            class="text-danger"><i class="ti ti-trash me-0 me-sm-1 ti-xs"></i></a>
                                        <div class="modal modal-top fade" id="delete<?php echo e($file->id); ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="<?php echo e(route('probono.DeleteFile')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($file->id); ?>" />
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel2">Are you
                                                                sure you want Delete this?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-label-secondary"
                                                                data-bs-dismiss="modal">no</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                <?php
                                $count++
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td>No file uploaded</td>
                                </tr>

                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!--/ Teams -->
            </div>
        </div>
    </div>

</div>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/probono/details.blade.php ENDPATH**/ ?>