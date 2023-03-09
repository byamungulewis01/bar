

<?php $__env->startSection('page_name'); ?>
Meetings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



  <!-- Users List Table -->
  <div class="card h-100">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Meetings <a href="" data-bs-toggle="modal" data-bs-target="#meeting"
          class="btn btn-dark text-white pull-left float-end"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
            class="d-none d-sm-inline-block">New Meeting</span></a></h5>

    </div>
    <div class="modal fade" id="meeting" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="mb-2">Add New Meeting</h3>
            </div>
            <form method="POST" class="row g-3" action="<?php echo e(route('meetings.store')); ?>">
              <?php echo csrf_field(); ?>
              <div class="col-12">
                <label for="title" class="form-label">Title</label>
                <input required type="text" name="title" class="form-control" id="title">
              </div>
              <div class="col-md-6">

                <label for="date" class="form-label">Date and Start time</label>
                <input required type="text" class="form-control" id="date" name="date" placeholder="Month DD, YYYY H:i">
              </div>
              <div class="col-md-6">
                <label for="end" class="form-label">End time</label>
                <input required type="text" class="form-control" id="end" name="end" placeholder="H:i">
              </div>
              <div class="col-9">
                <label for="venue" class="form-label">Venue</label>
                <input required type="text" name="venue" class="form-control" id="venue">
              </div>
              <div class="col-3">
                <label for="venue" class="form-label">Credit</label>
                <input required type="text" name="credits" id="credit" class="form-control">
              </div>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content" for="published1">
                    <input required name="published" class="form-check-input" type="radio" value="1" id="published1">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Published</span>
                      <span class="text-muted"></span>
                    </span>
                    <span class="custom-option-body">
                      <small>Every user will get this meeting on their meeting list</small>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="published2">
                    <input required name="published" class="form-check-input" type="radio" value="0" id="published2"
                      checked="">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Not Published</span>
                      <span class="text-muted"></span>
                    </span>
                    <span class="custom-option-body">
                      <small>Only the invited users will get this meeting on their list</small>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Meeting</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card-datatable table-responsive" style="min-height: 500px;">
      <table class="datatables-users table">
        <thead>
          <tr>
            <th>#</th>
            <th>Meeting</th>
            <th>Date</th>
            <th>From</th>
            <th>To</th>
            <th>Venue</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php
          $count = 1;
          ?>
          <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <tr>
            <td><?php echo e($count); ?></td>
            <td><?php echo e($meeting->title); ?> <br>
              <span>
                <strong>credit</strong> <span class="badge bg-label-warning me-2"><?php echo e($meeting->credits); ?></span>
              </span>

            </td>
            <td><?php echo e(\Carbon\Carbon::parse($meeting->date)->locale('fr')->format('F j, Y')); ?></td>
            <td>
              <?php echo e($meeting->start); ?>

            </td>
            <td><?php echo e($meeting->end); ?></td>
            <td><?php echo e($meeting->venue); ?></td>
            <td>
              <?php if($meeting->published == 1): ?>
              <span class="badge bg-label-warning me-2">Published</span>

              <?php else: ?>
              <span class="badge bg-label-info me-2">Not Published</span>
              <?php endif; ?>

            </td>

            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary">Action</button>
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split"
                  data-bs-toggle="dropdown"></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?php echo e(route('meetings.show',$meeting->id)); ?>">Invite</a>
                  <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#notify-me<?php echo e($meeting->id); ?>"
                    href="">Notify</a>

                  
                  <div class="dropdown-divider"></div>
                  <a data-bs-toggle="modal" data-bs-target="#edit<?php echo e($meeting->id); ?>" class="dropdown-item"
                    href="javascript:void(0)">Edit</a>


                  <a data-bs-toggle="modal" data-bs-target="#delete<?php echo e($meeting->id); ?>" class="dropdown-item"
                    href="javascript:void(0)">Remove</a>
                </div>
              </div>
              <div class="modal fade" id="notify-me<?php echo e($meeting->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2">Send Notification Messages</h3>
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                          <p><strong>Opps Something went wrong</strong></p>
                          <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>* <?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        </div>
                        <?php endif; ?>
                      </div>
                      <form method="POST" class="row g-3" action="<?php echo e(route('meetings.notify')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($meeting->id); ?>">
                        <div class="col-md mb-md-0 mb-2">
                          <div class="form-check custom-option custom-option-basic checked">
                            <label class="form-check-label custom-option-content" for="published3">
                              <input name="recipients" class="form-check-input" type="radio" checked="" value="1"
                                id="published3">
                              <span class="custom-option-header" id="published3">
                                <span class="h6 mb-0">Invited</span>
                                <span class="text-muted"></span>
                              </span>

                            </label>
                          </div>
                        </div>
                        <div class="col-md">
                          <div class="form-check custom-option custom-option-basic">
                            <label class="form-check-label custom-option-content" for="published4">
                              <input name="recipients" class="form-check-input" type="radio" value="2" id="published4">
                              <span class="custom-option-header" id="published4">
                                <span class="h6 mb-0">Attended</span>
                                <span class="text-muted"></span>
                              </span>

                            </label>
                          </div>
                        </div>

                        <div class="col-12">
                          <label class="switch">
                            <span class="switch-label">Subject <span class="text-danger">include in Email
                                only</span></span>
                          </label>
                          <input required type="text" name="subject" class="form-control" id="subject"
                            value="<?php echo e($meeting->title); ?> ">

                        </div>
                        <div class="col-12">
                          <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                          <textarea required name="message" class="form-control" id="exampleFormControlTextarea1"
                            rows="3">
                          </textarea>
                        </div>
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="sent[]" type="checkbox" value="SMS"
                              id="defaultCheck3" />
                            <label class="form-check-label" for="defaultCheck3">SMS (Uncheck if "NO")
                            </label>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" checked name="sent[]" type="checkbox" value="EMAIL"
                              id="defaultCheck4" />
                            <label class="form-check-label" for="defaultCheck4">EMAIL (Uncheck if "NO")
                            </label>
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="switch mb-2">
                            <span class="switch-label text-warning">Attache files (5 Max):</span>
                          </label>

                          <input type="file" name="attachments[]" class="form-control" placeholder="Files" multiple
                            max="5">
                        </div>
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                          <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="edit<?php echo e($meeting->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2">Edit Meeting</h3>
                      </div>
                      <form method="POST" class="row g-3" action="<?php echo e(route('meetings.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="col-12">
                          <label for="title" class="form-label">Title</label>
                          <input type="hidden" name="meeting" value="<?php echo e($meeting->id); ?>">
                          <input required type="text" name="title" class="form-control" id="title"
                            value="<?php echo e($meeting->title); ?>">
                        </div>
                        <div class="col-md-6">

                          <label for="date" class="form-label">Date and Start time</label>
                          <input required type="text" class="form-control" id="date1" name="date"
                            value="<?php echo e($meeting->date); ?>">
                        </div>
                        <div class="col-md-6">
                          <label for="end" class="form-label">End time</label>
                          <input required type="text" class="form-control" id="end1" name="end"
                            value="<?php echo e($meeting->end); ?>">
                        </div>
                        <div class="col-9">
                          <label for="venue" class="form-label">Venue</label>
                          <input required type="text" name="venue" class="form-control" id="venue1"
                            value="<?php echo e($meeting->venue); ?>">
                        </div>
                        <div class="col-3">
                          <label for="venue" class="form-label">Credit</label>
                          <input required type="text" name="credits" id="credit1" class="form-control"
                            value="<?php echo e($meeting->credits); ?>">
                        </div>
                        <?php
                        if($meeting->published == 0)
                        {
                        $check = 'checked';
                        }
                        if($meeting->published == 1)
                        {
                        $check = 'checked';
                        }
                        ?>
                        <div class="col-md mb-md-0 mb-2">
                          <div class="form-check custom-option custom-option-basic checked">
                            <label class="form-check-label custom-option-content" for="published1">
                              <input required name="published" class="form-check-input" type="radio" value="1"
                                id="published1" <?php if($meeting->published == 1): ?>
                              checked=""
                              <?php endif; ?>>
                              <span class="custom-option-header">
                                <span class="h6 mb-0">Published</span>
                                <span class="text-muted"></span>
                              </span>
                              <span class="custom-option-body">
                                <small>Every user will get this meeting on their meeting list</small>
                              </span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md">
                          <div class="form-check custom-option custom-option-basic">
                            <label class="form-check-label custom-option-content" for="published2">
                              <input required name="published" class="form-check-input" type="radio" value="0"
                                id="published2" <?php if($meeting->published == 0): ?>
                              checked=""
                              <?php endif; ?>>
                              <span class="custom-option-header">
                                <span class="h6 mb-0">Not Published</span>
                                <span class="text-muted"></span>
                              </span>
                              <span class="custom-option-body">
                                <small>Only the invited users will get this meeting on their list</small>
                              </span>
                            </label>
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary waves-effect waves-light">Save Meeting</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>


          <?php
          $count++
          ?>


          <div class="modal modal-top fade" id="delete<?php echo e($meeting->id); ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <form action="<?php echo e(route('meeting.delete')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <input type="hidden" name="meeting" value="<?php echo e($meeting->id); ?>" />
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Are you sure to delete
                      <strong><?php echo e($meeting->title); ?></strong> Meeting?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </tbody>
      </table>
    </div>

  </div>

</div>

</div>


<!-- / Content -->

<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />

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
<script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/forms-file-upload.js')); ?>"></script>

<script>
  "use strict";
  $(function () {
    var dtt = document.querySelector("#date"),
      dte = document.querySelector("#end");
    dtt && dtt.flatpickr({
      enableTime: !0,
      altInput: !0,
      altFormat: "F j, Y H:i",
      dateFormat: "Y-m-d H:i",
      minDate: 'today'
    })
    dte && dte.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })
  $(function () {
    var dtt1 = document.querySelector("#date1"),
      dte1 = document.querySelector("#end1");
    dtt1 && dtt1.flatpickr({
      enableTime: !0,
      altInput: !0,
      altFormat: "F j, Y H:i",
      dateFormat: "Y-m-d H:i",
      minDate: 'today'
    })
    dte1 && dte1.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })

  $(document).ready(function () {
    $("#credit").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
    $("#credit1").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
  });

  <?php if($errors->any()): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php
  $data = 'Error Accurs';
  ?>
  $(document).ready(function () {
    $.toast({
      heading: 'Error',
      text: '<?php echo e($error); ?>',
      showHideTransition: 'fade',
      icon: 'error',
      position: 'top-right',
      hideAfter: 5000,
    });
  });
  <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/meetings/index.blade.php ENDPATH**/ ?>