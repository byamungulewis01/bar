<?php $__env->startSection('page_name'); ?>
Organizations
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            

            <!-- Users List Table -->
            <div class="card">
              <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Users Organization <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newOrg"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add Organization</span></a></h5>
                
              </div>
              <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                  <thead>
                    <tr>
                      <th>Tin</th>
                      <th>Name</th>
                      <th>Company Type</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- New User Modal -->
            <div class="modal fade" id="newOrg" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                      <h3 class="mb-2">New Organization Information</h3>
                      <?php if($errors->any()): ?>
                      <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul class="p-0 m-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      </div>
                        <?php endif; ?>
                    </div>
                    <form id="newOrgForm" class="row g-3" method="post"  enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="John" value="<?php echo e(old('name')); ?>"/>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="tin">TIN</label>
                        <input type="text" id="tin" name="tin" class="form-control number-mask" placeholder="xxx xxx xxxx"  value="<?php echo e(old('tin')); ?>"/>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="example@domain.com"  value="<?php echo e(old('email')); ?>"/>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="phone">Phone Number</label>
                        <div class="input-group">
                          <span class="input-group-text">RW (+250)</span>
                          <input type="text" id="phone" name="phone" class="form-control number-mask" maxLength="10" placeholder="xxx xxx xxxx"  value="<?php echo e(old('phone')); ?>"/>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="type">Type</label>
                        <select id="type" name="type" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option <?php if(old('gender')=="Male"): ?> selected <?php endif; ?> value="Male">Male</option>
                          <option <?php if(old('gender')=="Male"): ?> selected <?php endif; ?> value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Physical Address" value="<?php echo e(old('address')); ?>"/>
                      </div>
                      <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--/ New User Modal -->
            </div>
            
            

          </div>
          <!-- / Content -->
            
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>

<script>
"use strict";
    document.addEventListener("DOMContentLoaded",function(e){
    {
        const o=document.querySelector("#newOrgForm"),
        p=document.querySelector("#editOrgForm"),
        t=document.querySelector("#phone"),
        v=document.querySelector("#tin");
        t&&new Cleave(t,{
            phone:!0,
            phoneRegionCode:"RW"
        });
        v&&new Cleave(v,{
            phone:!0,
            phoneRegionCode:"RW"
        });
        const s=(o&&FormValidation.formValidation(o,{
            fields:{
              name:{
                    validators:{
                        notEmpty:{
                            message:"Please enter organization name "
                        }
                    }
                },
                email:{
                    validators:{
                        notEmpty:{
                            message:"Please enter your email"
                        },
                        emailAddress:{
                            message:"The value is not a valid email address"
                        }
                    }
                },
                phone:{
                    validators:{
                        notEmpty:{
                            message:"Please enter phone number"
                        },
                    }
                },
                type:{
                    validators:{
                        notEmpty:{
                            message:"Select company type"
                        }
                    }
                },
                address:{
                    validators:{
                        notEmpty:{
                            message:"Please enter organization address"
                        }
                    }
                },
                tin:{
                    validators:{
                        notEmpty:{
                            message:"Please enter TIN Number"
                        }
                    }
                },
            },
            plugins:{
                trigger:new FormValidation.plugins.Trigger,
                bootstrap5:new FormValidation.plugins.Bootstrap5(
                    {
                        eleValidClass:"",
                        rowSelector:".col-md-6"
                    }
                ),
                submitButton:new FormValidation.plugins.SubmitButton,
                defaultSubmit:new FormValidation.plugins.DefaultSubmit,
                autoFocus:new FormValidation.plugins.AutoFocus
            },
            init:e=>{
                e.on("plugins.message.placed",function(e){
                    e.element.parentElement.classList.contains("input-group")&&e.element.parentElement.insertAdjacentElement("afterend",e.messageElement)
                })
            }
        }));
        const u=(p&&FormValidation.formValidation(p,{
            fields:{
                
              name:{
                    validators:{
                        notEmpty:{
                            message:"Please enter organization name "
                        }
                    }
                },
                email:{
                    validators:{
                        notEmpty:{
                            message:"Please enter your email"
                        },
                        emailAddress:{
                            message:"The value is not a valid email address"
                        }
                    }
                },
                phone:{
                    validators:{
                        notEmpty:{
                            message:"Please enter phone number"
                        },
                    }
                },
                type:{
                    validators:{
                        notEmpty:{
                            message:"Select company type"
                        }
                    }
                },
                address:{
                    validators:{
                        notEmpty:{
                            message:"Please enter organization address"
                        }
                    }
                },
                tin:{
                    validators:{
                        notEmpty:{
                            message:"Please enter TIN Number"
                        }
                    }
                },
            },
            plugins:{
                trigger:new FormValidation.plugins.Trigger,
                bootstrap5:new FormValidation.plugins.Bootstrap5(
                    {
                        eleValidClass:"",
                        rowSelector:".col-md-6"
                    }
                ),
                submitButton:new FormValidation.plugins.SubmitButton,
                defaultSubmit:new FormValidation.plugins.DefaultSubmit,
                autoFocus:new FormValidation.plugins.AutoFocus
            },
            init:e=>{
                e.on("plugins.message.placed",function(e){
                    e.element.parentElement.classList.contains("input-group")&&e.element.parentElement.insertAdjacentElement("afterend",e.messageElement)
                })
            }
        }));
      }
      <?php if($errors->any()): ?>
        var myModal = new bootstrap.Modal(document.getElementById('newUser'), {
          keyboard: false
        })
        myModal.show()
      <?php endif; ?>
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rwa\resources\views/users/organization.blade.php ENDPATH**/ ?>