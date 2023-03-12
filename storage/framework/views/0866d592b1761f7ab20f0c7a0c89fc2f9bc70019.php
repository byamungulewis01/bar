

<?php $__env->startSection('page_name'); ?>
Pro Bono Cases
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Pro Bono Cases
        <a class="btn btn-dark text-white pull-left float-end" href="<?php echo e(route('probono.report')); ?>"><span
            class="d-none d-sm-inline-block">Data</span></a>

        <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newCase"><i
            class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New case</span></a><a
          class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editmeetings"></a>
      </h5>

    </div>

    <div class="card-datatable table-responsive">
      <table class="datatables-probono table border-top">
        <thead>
          <tr>
            <th>#</th>
            <th style="width: 20%">Legal Aids Seeker</th>
            <th>Referrer</th>
            <th>Case Number</th>
            <th>Case Nature</th>
            <th>Case Status</th>
            <th>Hearing Day</th>
            <th>Manage</th>
          </tr>
        </thead>
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
              <?php switch($probono->status):
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
            <td>
              <?php echo e(\Carbon\Carbon::parse($probono->hearing_date)->locale('fr')->format('F j, Y')); ?>

            </td>
            <td>
              <a href="javascript:" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                data-bs-target="#addNewAddress<?php echo e($probono->id); ?>">Edit </a>
              <a href="javascript:" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                data-bs-target="#delete<?php echo e($probono->id); ?>">Delete</a>
              <div class="modal modal-top fade" id="delete<?php echo e($probono->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <form action="<?php echo e(route('probono.delete')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <input type="hidden" name="probono" value="<?php echo e($probono->id); ?>" />
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Are you sure to delete</h5>
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
              <!-- Add New Address Modal -->
              <div class="modal fade" id="addNewAddress<?php echo e($probono->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Edit Probono Case</h3>
                        <p class="text-muted address-subtitle">change New Probono case Desciption in case you make
                          mistakes </p>
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                          <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        </div>
                        <?php endif; ?>

                      </div>
                      <form action="<?php echo e(route('probono.update')); ?>" class="row g-3" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="hidden" name="id" value="<?php echo e($probono->id); ?>">
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="name">First Name</label>
                          <input required type="text" name="fname" class="form-control" value="<?php echo e($probono->fname); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Last name</label>
                          <input required type="text" name="lname" class="form-control" value="<?php echo e($probono->lname); ?>" />
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="gender">Gender</label>
                          <select required id="gender" name="gender" class="form-select">
                            <option value="<?php echo e($probono->gender); ?>" selected><?php echo e($probono->gender); ?></option>
                            <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Male">Male</option>
                            <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Female">Female</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Age</label>
                          <input required type="number" min="1" max="170" name="age" class="form-control"
                            value="<?php echo e($probono->age); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="phone">Phone Number</label>
                          <div class="input-group">
                            <span class="input-group-text">RW (+25)</span>
                            <input required type="text" pattern="[0-9]{10,}" title="Phone must have at least 10 Digits"
                              name="phone" class="form-control phone-number-mask" minlength="10" maxLength="10"
                              value="<?php echo e($probono->phone); ?>" />
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Referral Case No</label>
                          <input required type="text" name="referral_case_no" class="form-control"
                            value="<?php echo e($probono->referral_case_no); ?>" />
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Jurisdiction</label>
                          <input required type="text" name="jurisdiction" class="form-control"
                            value="<?php echo e($probono->jurisdiction); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="phone">Court</label>
                          <div class="input-group">
                            <input required type="text" id="phone" name="court" class="form-control phone-number-mask"
                              value="<?php echo e($probono->court); ?>" />
                          </div>
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="category">Case nature</label>
                          <select required name="case_nature" class="form-select">
                            <option value="<?php echo e($probono->case_nature); ?>" selected><?php echo e($probono->case_nature); ?></option>
                            <option <?php if(old('nature')=="Criminal" ): ?> selected <?php endif; ?> value="Criminal">Criminal</option>
                            <option <?php if(old('nature')=="Civil" ): ?> selected <?php endif; ?> value="Civil">Civil</option>
                            <option <?php if(old('nature')=="Social" ): ?> selected <?php endif; ?> value="Social">Social</option>
                            <option <?php if(old('nature')=="Commercial" ): ?> selected <?php endif; ?> value="Commercial">Commercial
                            </option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="flatpickr-date">Hearing Day</label>
                          <input required type="text" class="form-control" id="date1" name="hearing_date"
                            class="form-control" value="<?php echo e($probono->hearing_date); ?>" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="status">Category</label>
                          <select required id="status" name="category" class="form-select">
                            <option value="<?php echo e($probono->category); ?>" selected> <?php echo e($probono->category); ?> </option>
                            <option <?php if(old('category')=="Case Agaist RBA" ): ?> selected <?php endif; ?> value="Case Agaist RBA">
                              Case Agaist RBA
                            </option>
                            <option <?php if(old('category')=="Legal Aid to General Public" ): ?> selected <?php endif; ?>
                              value="Legal Aid to General Public">Legal Aid to General Public</option>
                            <option <?php if(old('category')=="Minors" ): ?> selected <?php endif; ?> value="Minors">Minors</option>
                            <option <?php if(old('category')=="Supreme count" ): ?> selected <?php endif; ?> value="Supreme count">Supreme
                              count
                            </option>
                            <option <?php if(old('category')=="Count" ): ?> selected <?php endif; ?> value="count">Count</option>
                            <option <?php if(old('category')=="Prosecutor" ): ?> selected <?php endif; ?> value="Prosecutor">Prosecutor
                            </option>
                            <option <?php if(old('category')=="Police" ): ?> selected <?php endif; ?> value="Police">Police</option>
                            <option <?php if(old('category')=="Prison" ): ?> selected <?php endif; ?> value="Prison">Prison</option>
                            <option <?php if(old('category')=="Other" ): ?> selected <?php endif; ?> value="Other">Other</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="practicing">Referrel Name</label>
                          <input required type="text" name="referrel" class="form-control"
                            value="<?php echo e($probono->referrel); ?>" />
                        </div>
                        <div class="col-12 col-md-12">
                          <label class="form-label" for="status">Advocate</label>
                          <select required name="advocate" class="form-select">
                            <option value="">No Advocate Assigned</option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" <?php if($user->id == $probono->advocate): ?> selected <?php endif; ?>>
                              <?php echo e($user->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </select>
                        </div>
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Add New Address Modal -->
            </td>
          </tr>
          <tr>
            <td>
              <i class="menu-icon tf-icons ti ti-gavel"></i>
            </td>
            <td colspan="3">
              <h6 class="text-warning">
                You can upload defferent documents regarding this case for advocate

              </h6>

            </td>
            <td colspan="3">
              <a href="<?php echo e(route('probono.show' , $probono->id)); ?>" type="button"
                class="btn btn-sm btn-label-secondary text-nowrap d-inline-block">
                Upload files
                <span class="badge bg-danger text-white badge-notifications"><?php echo e($probono->probono_files); ?></span>
              </a>
            </td>
            <td>
              <a href="javascript:" data-bs-toggle="modal" data-bs-target="#addNewCCModal<?php echo e($probono->id); ?>"
                class="btn btn-info btn-sm">Upload </a>
              <!-- Add New Credit Card Modal -->
              <div class="modal fade" id="addNewCCModal<?php echo e($probono->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md modal-simple modal-add-new-cc">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2">Upload Document Related to RC</h3>
                        <p class="text-muted"><?php echo e($probono->referral_case_no); ?></p>

                      </div>
                      <form class="row g-3" method="POST" action="<?php echo e(route('probono.file_store')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="probono_id" value="<?php echo e($probono->id); ?>">
                        <div class="col-12">
                          <label class="form-label w-100" for="title">File title</label>
                          <div class="input-group input-group-merge">
                            <input id="title" name="case_title" class="form-control" type="text"
                              placeholder="File title" value="<?php echo e(old('case_title')); ?>" />
                            <?php $__errorArgs = ['case_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger">
                              <?php echo e($message); ?>

                            </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="form-label w-100" for="type">File Type</label>
                          <div class="input-group input-group-merge">
                            <select required name="case_type" class="form-select">
                              <option value="" selected> - Select - </option>
                              <option <?php if(old('case_type')=="Letter" ): ?> selected <?php endif; ?> value="Letter">Letter</option>
                              <option <?php if(old('case_type')=="Assignation" ): ?> selected <?php endif; ?> value="Assignation">
                                Assignation</option>
                              <option <?php if(old('case_type')=="Imyanzuro" ): ?> selected <?php endif; ?> value="Imyanzuro">Imyanzuro
                              </option>
                              <option <?php if(old('case_type')=="Icyemezo" ): ?> selected <?php endif; ?> value="Icyemezo">Icyemezo
                              </option>
                              <option <?php if(old('case_type')=="Evidances" ): ?> selected <?php endif; ?> value="Evidances">Evidances
                              </option>
                              <option <?php if(old('case_type')=="Other" ): ?> selected <?php endif; ?> value="Other">Other</option>
                            </select>
                            <?php $__errorArgs = ['case_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger">
                              <?php echo e($message); ?>

                            </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="form-label w-100" for="title">Case File <span class="text-danger">
                              Upload Only PDF File </span></label>
                          <div class="input-group input-group-merge">
                            <input accept=".pdf" name="case_file" class="form-control" type="file" />
                            <?php $__errorArgs = ['case_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger">
                              <?php echo e($message); ?>

                            </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
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
              <!--/ Add New Credit Card Modal -->
            </td>
          </tr>
          <tr>
            <td>
              <i class="menu-icon tf-icons ti ti-gavel"></i>
            </td>
            <td colspan="6">
              <?php if($probono->advocate == NULL): ?>
              <h6 class="text-danger">
                Please assign this case to an advocate via Edit
              </h6>
              <?php else: ?>
              <h6 class="text-primary">
                Case assigned to <a href="<?php echo e(route('profile',$probono->advocate)); ?>"
                  class="text-dark"><?php echo e($probono->user->name); ?></a>
                <a href="javascript:" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                  data-bs-target="#notify<?php echo e($probono->advocate); ?>"> Notify </a>

                  <div class="modal fade" id="notify<?php echo e($probono->advocate); ?>" tabindex="-1" aria-hidden="true">
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
                          <form method="POST" class="row g-3" action="<?php echo e(route('probono.followup_notify')); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="phone" value="<?php echo e($probono->phone); ?>">
                            <input type="hidden" name="advocate" value="<?php echo e($probono->advocate); ?>">

                            <div class="col-12">
                              <div class="form-check">
                                <input class="form-check-input" name="refferal" type="checkbox" value="1"
                                  id="defaultCheck3" />
                                <label class="form-check-label" for="defaultCheck3">Include Refferal (Only for SMS)
                                </label>
                              </div>
                            </div>
    
                            <div class="col-12">
                              <label class="switch">
                                <span class="switch-label">Subject <span class="text-danger">include in Email
                                    only</span></span>
                              </label>
                              <input required type="text" name="subject" class="form-control" id="subject"
                                value="">
    
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
            
              </h6>
              <?php endif; ?>

            </td>
            <td>
              <a href="<?php echo e(route('probono.show_devs' , $probono->id)); ?>" type="button"
                class="btn btn-sm btn-label-secondary text-nowrap d-inline-block">
                Reported Events
                <span class="badge bg-danger text-white badge-notifications"><?php echo e($probono->probono_devs); ?></span>
              </a>
            </td>

          </tr>

        </tbody>

        <?php
        $count++
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tbody>
          <tr>

            <td colspan="3">
              <h6 class="text-warning">
                Empy No Probono Founds Case

              </h6>

            </td>

          </tr>

        </tbody>
        <?php endif; ?>

      </table>
    </div>
  </div>

</div>


<!-- New User Modal -->
<div class="modal fade" id="newCase" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-2">New Probono Case</h3>

        </div>
        <form accept="<?php echo e(route('probono.store')); ?>" class="row g-3" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <div class="col-12 col-md-6">
            <label class="form-label" for="name">First Name</label>
            <input required type="text" name="fname" class="form-control" placeholder="John"
              value="<?php echo e(old('fname')); ?>" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="email">Last name</label>
            <input required type="text" name="lname" class="form-control" placeholder="doe"
              value="<?php echo e(old('lname')); ?>" />
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label" for="gender">Gender</label>
            <select required id="gender" name="gender" class="form-select">
              <option value="" selected> - Select - </option>
              <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Male">Male</option>
              <option <?php if(old('gender')=="Male" ): ?> selected <?php endif; ?> value="Female">Female</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="email">Age</label>
            <input required type="number" min="1" max="170" name="age" class="form-control" placeholder="Age"
              value="<?php echo e(old('age')); ?>" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="phone">Phone Number</label>
            <div class="input-group">
              <span class="input-group-text">RW (+25)</span>
              <input required type="text" pattern="[0-9]{10,}" title="Phone must have at least 10 Digits" name="phone"
                class="form-control phone-number-mask" minlength="10" maxLength="10" placeholder="xxx xxx xxxx"
                value="<?php echo e(old('phone')); ?>" />
            </div>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="email">Referral Case No</label>
            <input required type="text" name="referral_case_no" class="form-control"
              placeholder="RC 0004B77/2022/TB/009" value="<?php echo e(old('referralcaseno')); ?>" />
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label" for="email">Jurisdiction</label>
            <input required type="text" name="jurisdiction" class="form-control" placeholder="Jurisdiction"
              value="<?php echo e(old('referralcaseno')); ?>" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="phone">Court</label>
            <div class="input-group">
              <input required type="text" id="phone" name="court" class="form-control phone-number-mask"
                placeholder="Court Name" value="<?php echo e(old('phone')); ?>" />
            </div>
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label" for="category">Case nature</label>
            <select required name="case_nature" class="form-select">
              <option value="" selected> - Select - </option>
              <option <?php if(old('nature')=="Criminal" ): ?> selected <?php endif; ?> value="Criminal">Criminal</option>
              <option <?php if(old('nature')=="Civil" ): ?> selected <?php endif; ?> value="Civil">Civil</option>
              <option <?php if(old('nature')=="Social" ): ?> selected <?php endif; ?> value="Social">Social</option>
              <option <?php if(old('nature')=="Commercial" ): ?> selected <?php endif; ?> value="Commercial">Commercial</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="flatpickr-date">Hearing Day</label>
            <input required type="text" class="form-control" id="date" name="hearing_date" placeholder="Month DD, YYYY"
              class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="status">Category</label>
            <select required id="status" name="category" class="form-select">
              <option value="" selected> - Select - </option>
              <option <?php if(old('category')=="Case Agaist RBA" ): ?> selected <?php endif; ?> value="Case Agaist RBA">Case Agaist RBA
              </option>
              <option <?php if(old('category')=="Legal Aid to General Public" ): ?> selected <?php endif; ?>
                value="Legal Aid to General Public">Legal Aid to General Public</option>
              <option <?php if(old('category')=="Minors" ): ?> selected <?php endif; ?> value="Minors">Minors</option>
              <option <?php if(old('category')=="Supreme count" ): ?> selected <?php endif; ?> value="Supreme count">Supreme count
              </option>
              <option <?php if(old('category')=="Count" ): ?> selected <?php endif; ?> value="count">Count</option>
              <option <?php if(old('category')=="Prosecutor" ): ?> selected <?php endif; ?> value="Prosecutor">Prosecutor</option>
              <option <?php if(old('category')=="Police" ): ?> selected <?php endif; ?> value="Police">Police</option>
              <option <?php if(old('category')=="Prison" ): ?> selected <?php endif; ?> value="Prison">Prison</option>
              <option <?php if(old('category')=="Other" ): ?> selected <?php endif; ?> value="Other">Other</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="practicing">Referrel Name</label>
            <input required type="text" name="referrel" class="form-control" placeholder="Referrel Name"
              value="<?php echo e(old('referrel')); ?>" />
          </div>
          <div class="col-12 col-md-12">
            <div class="form-check">
              <input class="form-check-input" name="status" type="checkbox" value="1" id="defaultCheck2" />
              <label class="form-check-label" for="defaultCheck2">
                Auto Assign to Advocate ? (Uncheck if "NO")
              </label>
            </div>
          </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
              aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ New User Modal -->
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
<script>
  "use strict";
  $(function () {
    var dtt = document.querySelector("#date"),
      dte = document.querySelector("#end");
    dtt && dtt.flatpickr({
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
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
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/probono/index.blade.php ENDPATH**/ ?>