<div class="card mb-2">
    <div class="card-body">
        <h5>Active Enrolments</h5>
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
                            <?php if(in_array($booking->status, [2,3,4])): ?>
                            <a href="<?php echo e(route('mytraings_detail' , $booking->training)); ?>"
                                class="btn btn-sm btn-primary"><i class='ti-xs ti ti-list me-1'></i></a>

                            <?php else: ?>
                            <a href="" data-bs-toggle="modal" data-bs-target="#payee<?php echo e($booking->id); ?>"
                                class="text-info">payee</a>
                            <div class="modal fade" id="payee<?php echo e($booking->id); ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                    <div class="modal-content p-3 p-md-5">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="text-center mb-4">
                                                <h3 class="mb-2">Pay <span
                                                        class="text-danger"><?php echo e($booking->trains->price); ?>

                                                        Rwf </span> To be Enrolled in
                                                    <span class="text-primary"><?php echo e($booking->trains->title); ?></span>
                                                </h3>
                                            </div>
                                            <form method="POST" class="row g-3" action="<?php echo e(route('paytraining')); ?>">

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
                            <div class="modal modal-top fade" id="removetraion<?php echo e($booking->id); ?>" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo e(route('book_remove')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="id" value="<?php echo e($booking->id); ?>" />
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Are you
                                                    sure you want Remove this ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
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
        <h5>Attendances</h5>
        <div class="card-datatable table-responsive">
            <table class="datatables table">
                <thead>
                    <tr>
                        <th style="width: 3px;">#</th>
                        <th>Training & Attandance day</th>
                        <th style="width: 3px;"></th>
                    </tr>
                </thead>
                <?php
                $count = 1;
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tbody>
                    <tr>
                        <td><?php echo e($count); ?></td>
                        <td><strong><?php echo e($attendance->trains->title); ?></strong><br>
                            <?php echo e(\Carbon\Carbon::parse($attendance->attendanceDay)->locale('fr')->format('F j, Y')); ?>

                        </td>
                        <td>
                            <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#makeAttendence<?php echo e($attendance->id); ?>"><i
                                    class='ti-xs ti ti-check me-1'></i></a>
                                    <div class="modal fade" id="makeAttendence<?php echo e($attendance->id); ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <div class="text-center mb-4">
                                                        <h3 class="mb-2">Make Attandance </h3>
                                                    </div>
                                                    <form method="POST" class="row g-3" action="<?php echo e(route('makeAttendence')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <input type="hidden" name="training" value="<?php echo e($attendance->training); ?>">
                                                        <div class="col-12">
                                                            <label class="form-label">Provide Your Voucher Number</label>
                                                            <input required type="number" name="voucher" class="form-control"
                                                                placeholder="01234567" />
                                                        </div>    
                                                        <div class="col-12 d-flex justify-content-center">
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </td>

                    </tr>

                </tbody>
                <?php
                $count++
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tbody>
                    <tr>
                        <td>

                        </td>
                        <td>
                            There is no Attandance list
                        </td>
                    </tr>
                </tbody>
                <?php endif; ?>

            </table>
        </div>
    </div>
</div><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/myprofile/extra.blade.php ENDPATH**/ ?>