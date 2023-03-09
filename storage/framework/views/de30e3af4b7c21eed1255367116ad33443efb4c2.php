

<?php $__env->startSection('page_name'); ?>
Disciplene info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-2">
        <span class="text-muted fw-light">Disciplinary case /</span> Profile
    </h4>


    <?php echo $__env->make('myprofile.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-7 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="card-datatable table-responsive">
                        <table class="datatables table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trainings</th>
                                    <th>Descriptions</th>
                                </tr>
                            </thead>
                            <?php
                            $count = 1;
                            ?>
                            <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr>
                                    <td><span class="badge bg-label-danger me-2"><?php echo e($count); ?></span></td>
                                    <td><strong><?php echo e($training->title); ?></strong><br>
                                        <span class="badge bg-label-info me-2">Credit</span><?php echo e($training->credits); ?>

                                        <span class="badge bg-label-info me-2">Price</span><?php echo e($training->price); ?> Rwf
                                    </td>
                                    <td>
                                        <strong>Venue :</strong> <?php echo e($training->venue); ?><br>
                                        Start on <u class="text-primary"><?php echo e($training->starton); ?></u> |
                                        End on <u class="text-primary"><?php echo e($training->endon); ?></u>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-bullhorn"></i>
                                    </td>
                                    <td colspan="2">
                                        <h6><span class="badge bg-label-warning me-2">Warning </span>
                                            Early Registration Deadline <u
                                                class="text-danger"><?php echo e($training->early_deadline); ?></u> And Late
                                            Registration Deadline
                                            ( <span class="text-warning">with <?php echo e($training->rate); ?>% increase </span> )
                                            <u class="text-danger"><?php echo e($training->late_deadline); ?></u>
                                            <?php
                                            $databaseDate = $training->late_deadline;
                                            $today = \Carbon\Carbon::now();
                                            // $ratedate = \Carbon\Carbon::parse($databaseDate);
                                            ?>
                                            <?php if(in_array($training->id, $booked)): ?>

                                            <?php else: ?>
                                            <?php if($today->lte(\Carbon\Carbon::parse($databaseDate))): ?>
                                            <a class="btn btn-sm btn-dark text-white pull-left float-end"
                                                data-bs-toggle="modal"
                                                data-bs-target="#book<?php echo e($training->id); ?>">Book</a>
                                            <?php else: ?>

                                            <?php endif; ?>

                                            <?php endif; ?>

                                            <div class="modal modal-top fade" id="book<?php echo e($training->id); ?>" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="<?php echo e(route('training_book')); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="training"
                                                                value="<?php echo e($training->id); ?>" />
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel2">
                                                                    Do you want to Go with <b
                                                                        class="text-info"><?php echo e($training->title); ?></b>
                                                                    Trainings ?
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">no</button>
                                                                <button type="submit"
                                                                    class="btn btn-warning">Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </h6>


                                    </td>

                                </tr>
                            </tbody>
                            <?php
                            $count++
                            ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-5 col-md-8 col-12 mb-md-0 mb-4">
            <?php echo $__env->make('myprofile.extra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rba\resources\views/myprofile/trainings.blade.php ENDPATH**/ ?>