<div class="card invoice-preview-card mb-1">
    <div class="card-body">
        <div
            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

            <div>
                <h4> Attendence</h4>
                <p>Please Add all Advocates who succesffully completed <strong>
                        <?php echo e($training->title); ?></strong></p>
                <a href="" data-bs-toggle="modal" data-bs-target="#Addpart" class="btn btn-sm btn-success"><i class="ti ti-user ti-sm me-2"></i>Add
                    Participants</a>
                    <?php if(Request::routeIs('trainings.manage')): ?>
                        
                    <?php else: ?>
                    <a href="<?php echo e(route('trainings.manage' ,$training->id)); ?>" class="btn btn-sm btn-info"><i class="ti ti-edit ti-sm me-2"></i>Participants</a>
                    <?php endif; ?>
            
            </div>

        </div>


    </div>
    <hr class="my-0" />


</div>
<div class="card invoice-preview-card">
    <div class="card-body">
        <div
            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

            <div>
                <h4>Attendence List</h4>
                <p>Please choose Training Day to generate eAttendance List for <strong>
                        <?php echo e($training->title); ?></strong></p>

            </div>

        </div>


    </div>
    <hr class="my-0" />


</div>

<div class="modal fade" id="Addpart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Add Advocate to Training </h3>
                </div>
                <form method="POST" class="row g-3" action="<?php echo e(route('trainings.addParticipant')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="col-12">
                        <input type="hidden" name="id" value="<?php echo e($training->id); ?>">
                        <select required name="user[]" multiple class="form-select" id="exampleFormControlSelect2"
                            aria-label="Multiple select example">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/training/extra.blade.php ENDPATH**/ ?>