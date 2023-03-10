

<?php $__env->startSection('page_name'); ?>
Meetings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-12 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="row p-4">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Reg No</th>
                                    <th>Attended</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($invitation->name); ?></td>
                                    <td><?php echo e($invitation->regNumber); ?></td>
                                    <td>
                                        <?php if($invitation->status == 1): ?>
                                        Not Attend
                                        <?php else: ?>
                                        Attended
                                        <?php endif; ?>
                                    </td>
                               
                                </tr>
                              
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <h4>No invitation <a href="" data-bs-toggle="modal"
                                                data-bs-target="#invite">invite</a></h4>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <?php endif; ?>
                            </tbody>
                          
                        </table>
                        <div class="col-lg-4">
                            <?php echo e($invitations->links('vendor.pagination.custom')); ?>

                           
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /Invoice -->
    <div class="modal fade" id="invite" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Invite Advocate to Meeting</h3>
                    </div>
                    <form method="POST" class="row g-3" action="<?php echo e(route('meetings.invite')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <input type="hidden" name="meeting" value="<?php echo e($meeting->id); ?>">
                            <select required name="user[]" multiple class="form-select" id="exampleFormControlSelect2"
                                aria-label="Multiple select example">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>


                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Invite</button>
                        </div>
                    </form>
                </div>
            </div>
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
<script>
let searchInput = document.querySelector('#search');
let resultsDiv = document.querySelector('#results');

searchInput.addEventListener('input', function() {
    let query = searchInput.value;
    let meeting = '<?php echo e($meeting->id); ?>'; 
    if (query.length >= 2) {
        fetch('<?php echo e(route('users.search')); ?>?query=' + query)
            .then(response => response.json())
            .then(users => {
                resultsDiv.innerHTML = '';
                for (let user of users) {
                    let userDiv = document.createElement('div');
                    userDiv.innerHTML = user.name + ' (' + user.regNumber + ') <a href="/meetings/attends/'+ meeting +'/'+ user.id + '" class="btn btn-sm btn-success text-white"><i class="ti ti-check me-0 me-sm-1 ti-xs"></i></a>';
                    resultsDiv.appendChild(userDiv);
                }
            });
    } else {
        resultsDiv.innerHTML = '';
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/meetings/attendance.blade.php ENDPATH**/ ?>