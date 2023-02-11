

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
        <div class="col-xl-8 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <h4 class="fw-semibold mb-2"><?php echo e($training->title); ?></h4>
                            
                            <p>It has Credit: <?php echo e($training->credits); ?>. Venue: <strong><?php echo e($training->venue); ?></strong>,
                                Starting on <u class="text-danger"><?php echo e($training->starton); ?> </u> to End on <u
                                    class="text-danger"><?php echo e($training->endon); ?> </u></p>
                            <hr>

                            <div class="demo-inline-spacing mt-3">
                                <div class="list-group list-group-horizontal-md text-md-center">
                                    <a class="list-group-item list-group-item-action active" id="home-list-item"
                                        data-bs-toggle="list" href="#horizontal-home">Training Topic</a>
                                    <a class="list-group-item list-group-item-action" id="profile-list-item"
                                        data-bs-toggle="list" href="#horizontal-profile">Training Materials</a>
                                </div>
                                <div class="tab-content px-0 mt-0">
                                    <div class="tab-pane fade show active" id="horizontal-home">
                                        <div class="card-header border-bottom">
                                            <h5 class="card-title mb-0">Training Topic </h5>

                                        </div>
                                        <div class="row p-4">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th style="width: 200px">Topic</th>
                                                            <th style="width: 150px">Start At</th>
                                                            <th style="width: 110px">End At</th>
                                                            <th style="width: 100px">Trainer</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $count = 1;
                                                    ?>

                                                    <tbody>
                                                        <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td><?php echo e($count); ?></td>
                                                            <td><?php echo e($topic->topic); ?></td>
                                                            <td><?php echo e($topic->startAt); ?></td>
                                                            <td><?php echo e($topic->endAt); ?></td>
                                                            <td><?php echo e($topic->trainer); ?></td>
                                                       
                                                        </tr>
                                                        <?php
                                                        $count++;
                                                        ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="4"><span class="text-warning">No Topic
                                                                    Specified</span></td>

                                                        </tr>
                                                        <?php endif; ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="horizontal-profile">
                                        <div class="card-header border-bottom">
                                            <h5 class="card-title mb-0">Training Materials
                                              
                                            </h5>

                                        </div>
                                        <div class="row p-4">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Files</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $count = 1;
                                                    ?>
                                                    <tbody>
                                                        <?php $__empty_1 = true; $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td><?php echo e($count); ?></td>
                                                            <td><?php echo e($material->title); ?></td>
                                                            <td><a
                                                                    href="<?php echo e(route('userDownload',$material->file )); ?>">Download</a>
                                                            </td>
                                                          
                                                        </tr>
                                                        <?php
                                                        $count++;
                                                        ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="4"><span class="text-warning">No Material
                                                                    Specified</span></td>

                                                        </tr>
                                                        <?php endif; ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>


                </div>
                <hr class="my-0" />


            </div>
        </div>
        <div class="col-xl-4 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card mb-2">
                <div class="card-body">
                    <h6>Active Enrolments</h6>
                    <div class="card-datatable table-responsive">
                        <table class="datatables table">
                            <thead>
                                <tr>
                                    <th style="width: 3px;">#</th>
                                    <th>Trainings</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            $count = 1;
                            ?>
                            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr>
                                    <td><?php echo e($count); ?></td>
                                    <td><strong><?php echo e($booking->trains->title); ?></strong><br>
                                        <span class="badge bg-label-info me-2">Price</span><?php echo e($booking->trains->price); ?>

                                        Rwf
                                    </td>
                                    <td>
                                        <?php if($booking->confirm): ?>
                                        <a href="<?php echo e(route('mytraings_detail' , $booking->training)); ?>" class="btn btn-sm btn-primary"><i class='ti-xs ti ti-list me-1'></i></a>
                                       
                                        <?php else: ?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#payee<?php echo e($booking->id); ?>"
                                            class="text-info">payee</a>
                                            <div class="modal fade" id="payee<?php echo e($booking->id); ?>" tabindex="-1"
                                                aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                    <div class="modal-content p-3 p-md-5">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                            <div class="text-center mb-4">
                                                                <h3 class="mb-2">Pay <span
                                                                        class="text-danger"><?php echo e($booking->trains->price); ?>

                                                                        Rwf </span> To be Enrolled in
                                                                    <span
                                                                        class="text-primary"><?php echo e($booking->trains->title); ?></span>
                                                                </h3>
                                                            </div>
                                                            <form method="POST" class="row g-3"
                                                                action="<?php echo e(route('paytraining')); ?>">
    
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>
                                                                <input type="hidden" name="id" value="<?php echo e($booking->id); ?>">
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary waves-effect waves-light">Make
                                                                        payment</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <a href="" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#removetraion<?php echo e($booking->id); ?>"><i
                                                    class='ti-xs ti ti-trash me-1'></i></a>
                                            <div class="modal modal-top fade" id="removetraion<?php echo e($booking->id); ?>"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="<?php echo e(route('book_remove')); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <input type="hidden" name="id" value="<?php echo e($booking->id); ?>" />
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel2">Are you
                                                                    sure you want Remove this ?</h5>
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
                                        <?php endif; ?>
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
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <h4>Attendence List</h4>
                            <p>Please choose Training Day to generate eAttendance List for <strong>
                                </strong></p>

                        </div>

                    </div>


                </div>
                <hr class="my-0" />


            </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/myprofile/trainings-details.blade.php ENDPATH**/ ?>