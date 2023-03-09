

<?php $__env->startSection('page_name'); ?>
Organizations
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Users Organization <a class="btn btn-dark text-white pull-left float-end"
          data-bs-toggle="modal" data-bs-target="#newOrg"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
            class="d-none d-sm-inline-block">Add Organization</span></a><a class="d-none" id="edit"
          data-bs-toggle="modal" data-bs-target="#editOrg"></a></h5>

    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-org table border-top">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Tin</th>
            <th>Company Type</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- New Org Modal -->
    <div class="modal fade" id="newOrg" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="mb-2">New Organization Information</h3>
              <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                <ul class="p-0 m-0">
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
              <?php endif; ?>
            </div>
            <form id="newOrgForm" class="row g-3" method="post">
              <?php echo csrf_field(); ?>
              <div class="col-12 col-md-6">
                <label class="form-label" for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Forbes"
                  value="<?php echo e(old('name')); ?>" />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="tin">TIN</label>
                <input type="text" id="tin" name="tin" class="form-control number-mask" maxLength="9"
                  placeholder="xxx xxx xxxx" value="<?php echo e(old('tin')); ?>" />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="example@domain.com"
                  value="<?php echo e(old('email')); ?>" />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="phone">Phone Number</label>
                <div class="input-group">
                  <span class="input-group-text">RW (+250)</span>
                  <input type="text" id="phone" name="phone" class="form-control number-mask" maxLength="10"
                    placeholder="xxx xxx xxxx" value="<?php echo e(old('phone')); ?>" />
                </div>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="type">Type</label>
                <select id="type" name="type" class="form-select">
                  <option value="" selected> - Select - </option>
                  <option <?php if(old('type')=="Lawfirm" ): ?> selected <?php endif; ?> value="Lawfirm">Lawfirm</option>
                  <option <?php if(old('type')=="Other" ): ?> selected <?php endif; ?> value="Other">Other</option>
                </select>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="status">Status</label>
                <select id="status" name="status" class="form-select">
                  <option value="" selected> - Select - </option>
                  <option <?php if(old('status')=="0" ): ?> selected <?php endif; ?> value="0">Active</option>
                  <option <?php if(old('status')=="1" ): ?> selected <?php endif; ?> value="1">Inactive</option>
                </select>
              </div>
              <div class="col-12 col-md-12">
                <label class="form-label" for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Physical Address"
                  value="<?php echo e(old('address')); ?>" />
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
    <!--/ New Org Modal -->

    <!-- Update Org Modal -->
    <div class="modal fade" id="editOrg" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="mb-2">Update Information</h3>
              <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                <ul class="p-0 m-0">
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
              <?php endif; ?>
            </div>
            <form id="newOrgForm" class="row g-3" method="post">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
              <input type="hidden" id="is" name="express" value="<?php echo e(old('express')); ?>" />
              <div class="col-12 col-md-6">
                <label class="form-label" for="updateName">Name</label>
                <input type="text" id="updateName" name="name" class="form-control" placeholder="Forbes"
                  value="<?php echo e(old('name')); ?>" />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="updateTin">TIN</label>
                <input type="text" id="updateTin" maxLength="9" name="tin" class="form-control number-mask"
                  placeholder="xxx xxx xxxx" value="<?php echo e(old('tin')); ?>" />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="updateEmail">Email</label>
                <input type="text" id="updateEmail" name="email" class="form-control" placeholder="example@domain.com"
                  value="<?php echo e(old('email')); ?>" />
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="updatePhone">Phone Number</label>
                <div class="input-group">
                  <span class="input-group-text">RW (+250)</span>
                  <input type="text" id="updatePhone" name="phone" class="form-control number-mask" maxLength="10"
                    placeholder="xxx xxx xxxx" value="<?php echo e(old('phone')); ?>" />
                </div>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="updateType">Type</label>
                <select id="updateType" name="type" class="form-select">
                  <option value="" selected> - Select - </option>
                  <option <?php if(old('type')=="Lawfirm" ): ?> selected <?php endif; ?> value="Lawfirm">Lawfirm</option>
                  <option <?php if(old('type')=="Other" ): ?> selected <?php endif; ?> value="Other">Other</option>
                </select>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label" for="updateStatus">Status</label>
                <select id="updateStatus" name="status" class="form-select">
                  <option value="" selected> - Select - </option>
                  <option <?php if(old('status')=="0" ): ?> selected <?php endif; ?> value="0">Active</option>
                  <option <?php if(old('status')=="1" ): ?> selected <?php endif; ?> value="1">Inactive</option>
                </select>
              </div>
              <div class="col-12 col-md-12">
                <label class="form-label" for="updateAddress">Address</label>
                <input type="text" id="updateAddress" name="address" class="form-control" placeholder="Physical Address"
                  value="<?php echo e(old('address')); ?>" />
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
  "use strict";
  $(function () {
      let t, a, s, o;
      s = (isDarkStyle ? (t = config.colors_dark.borderColor, a = config.colors_dark.bodyBg, config.colors_dark) : (
        t = config.colors.borderColor, a = config.colors.bodyBg, config.colors)).headingColor;
      var e, n = $(".datatables-org"),
        r = "/org-profile/",
        oo = {
          "Lawfirm": {
            title: "Lawfirm",
            class: "bg-label-info"
          },
          Other: {
            title: "Other",
            class: "bg-label-secondary"
          },
          0: {
            title: "Active",
            class: "bg-label-success"
          },
          1: {
            title: "Inactive",
            class: "bg-label-danger"
          }
        };
      n.length && (e = n.DataTable({
          ajax: "/api/users/organization",
          columns: [{
              data: ""
            },
            {
              data: "name"
            },
            {
              data: "tin"
            },
            {
              data: "type"
            },
            {
              data: "phone"
            },
            {
              data: "address"
            },
            {
              data: "blocked"
            },
            {
              data: "action"
            }
          ],
          columnDefs: [{
              className: "control",
              searchable: !1,
              orderable: !1,
              responsivePriority: 2,
              targets: 0,
              render: function (e, t, a, s) {
                return ""
              }
            },
            {
              targets: 1,
              responsivePriority: 4,
              render: function (e, t, a, s) {
                var n = a.name,
                  i = a.email,
                  j = a.id;
                return '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-' +
                  ["success", "danger", "warning", "info", "primary", "secondary"][Math.floor(6 * Math
                  .random())] + '">' + (o = (((o = (n = a.name).match(/\b\w/g) || []).shift() || "") + (o
                  .pop() || "")).toUpperCase()) +
                  '</span></div></div><div class="d-flex flex-column"><span class="fw-semibold">' + n +
                  '</span></a><small class="text-muted">' + i + "</small></div></div>"
              }
            },
            {
              targets: 3,
              render: function (e, t, a, s) {
                a = a.type;
                return '<span class="badge ' + oo[a].class + '" text-capitalized>' + oo[a].title + "</span>"
              }
            },
            {
              targets: 4,
              render: function (e, t, a, s) {
                return '<span class="fw-semibold">' + a.phone + "</span>"
              }
            },
            {
              targets: 5,
              render: function (e, t, a, s) {
                return '<span class="fw-semibold">' + a.address + "</span>"
              }
            },
            {
              targets: 6,
              render: function (e, t, a, s) {
                a = a.blocked;
                return '<span class="badge ' + oo[a].class + '" text-capitalized>' + oo[a].title + "</span>"
              }
            },
            {
              targets: -1,
              title: "Actions",
              searchable: !1,
              orderable: !1,
              render: function (e, t, a, s) {
                return '<div class="d-flex align-items-center"><a href="javascript:;" class="text-body edit-record "><i class="ti ti-edit ti-sm me-2" data-id="' +
                  a.id + '" data-name="' + a.name + '" data-tin="' + a.tin + '" data-phone="' + a.phone +
                  '" data-email="' + a.email + '" data-type="' + a.type + '" data-address="' + a.address +
                  '" data-status="' + a.blocked + '"></i></a><a href="javascript:;" class="text-body delete-record ' +
                  a.id + '"><i class="ti ti-trash ti-sm mx-2"></i></a></div></div>'
              }
            }
          ],
          order: [
            [1, "desc"]
          ],
          dom: '<"row me-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          language: {
            sLengthMenu: "_MENU_",
            search: "",
            searchPlaceholder: "Search.."
          },
          responsive: {
            details: {
              display: $.fn.dataTable.Responsive.display.modal({
                header: function (e) {
                  return "Details of " + e.data().name
                }
              }),
              type: "column",
              renderer: function (e, t, a) {
                a = $.map(a, function (e, t) {
                  return "" !== e.name ? '<tr data-dt-row="' + e.rowIndex + '" data-dt-column="' + e
                    .columnIndex + '"><td>' + e.name + ":</td> <td>" + e.data + "</td></tr>" : ""
                }).join("");
                return !!a && $('<table class="table"/><tbody />').append(a)
              }
            }
          },

        })),
        $(".datatables-org tbody").on("click", ".delete-record", function (event) {
          let id = event.currentTarget.classList[2];
          Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            customClass: {
              confirmButton: "btn btn-danger me-3",
              cancelButton: "btn btn-label-secondary"
            },
            buttonsStyling: !1,
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return fetch('/api/users/organization/' + id, {
                  method: 'DELETE',
                  headers: new Headers({
                    'Accept': 'application/json',
                    'Content-Type': 'application/json; charset=UTF-8',
                    'X-CSRF-Token': "<?php echo csrf_token() ?>"
                  })
                })
                .then(response => {
                  if (!response.ok) {
                    throw new Error(response.statusText)
                  }
                  return response.json()
                })
                .catch(error => {
                  Swal.showValidationMessage(
                    `Request failed: ${error}`
                  )
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: 'Deleted!',
                text: 'Organization has been deleted.',
                icon: 'success',
                showCancelButton: 0,
                confirmButtonText: "Close",
                customClass: {
                  confirmButton: "btn btn-label-secondary",
                  cancelButton: "btn btn-label-secondary d-none"
                },
                buttonsStyling: !1,
              })
              e.row($(this).parents("tr")).remove().draw()
            }
          })
        }),
        $(".datatables-org tbody").on("click", ".edit-record", function (event) {
          let a = event.target;
          let id = a.getAttribute('data-id'),
            name = a.getAttribute('data-name'),
            email = a.getAttribute('data-email'),
            phone = a.getAttribute('data-phone'),
            tin = a.getAttribute('data-tin'),
            type = a.getAttribute('data-type'),
            status = a.getAttribute('data-status'),
            address = a.getAttribute('data-address'),
            edit = document.getElementById('edit');
          $("#is").val(id), $("#updateName").val(name), $("#updateEmail").val(email);
          $("#updatePhone").val(phone);
          $("#updateTin").val(tin);
          $("#updateType").val(type);
          $("#updateStatus").val(status);
          $("#updateAddress").val(address);
          let ee = document.getElementById("updatedAvatar");
          let f = document.getElementById("updatedDiploma");

          edit.click();
        }),
        setTimeout(() => {
          $(".dataTables_filter .form-control").removeClass("form-control-sm"),
            $(".dataTables_length .form-select").removeClass("form-select-sm")
        }, 300)
    }),
    document.addEventListener("DOMContentLoaded", function (e) {
      {
        const o = document.querySelector("#newOrgForm"),
          p = document.querySelector("#editOrgForm"),
          t = document.querySelector("#phone"),
          v = document.querySelector("#tin");
        t && new Cleave(t, {
          phone: !0,
          phoneRegionCode: "RW"
        });
        v && new Cleave(v, {
          phone: !0,
          phoneRegionCode: "RW"
        });
        const s = (o && FormValidation.formValidation(o, {
          fields: {
            name: {
              validators: {
                notEmpty: {
                  message: "Please enter organization name "
                }
              }
            },
            email: {
              validators: {
                notEmpty: {
                  message: "Please enter your email"
                },
                emailAddress: {
                  message: "The value is not a valid email address"
                }
              }
            },
            phone: {
              validators: {
                notEmpty: {
                  message: "Please enter phone number"
                },
              }
            },
            tin: {
              validators: {
                notEmpty: {
                  message: "Please enter TIN Number"
                }
              }
            },
            status: {
              validators: {
                notEmpty: {
                  message: "Select Company Status"
                }
              }
            },
            type: {
              validators: {
                notEmpty: {
                  message: "Select company type"
                }
              }
            },
            address: {
              validators: {
                notEmpty: {
                  message: "Please enter organization address"
                }
              }
            },

          },
          plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap5: new FormValidation.plugins.Bootstrap5({
              eleValidClass: "",
              rowSelector: ".col-md-6"
            }),
            submitButton: new FormValidation.plugins.SubmitButton,
            defaultSubmit: new FormValidation.plugins.DefaultSubmit,
            autoFocus: new FormValidation.plugins.AutoFocus
          },
          init: e => {
            e.on("plugins.message.placed", function (e) {
              e.element.parentElement.classList.contains("input-group") && e.element.parentElement
                .insertAdjacentElement("afterend", e.messageElement)
            })
          }
        }));

      }
    })
</script>
<script>
    <?php if($errors->any()): ?>
           <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            $(document).ready(function() {
                $.toast({
                    heading: 'Error',
                    text:'<?php echo e($error); ?>' ,
                    showHideTransition: 'fade',
                    icon: 'error',
                    position : 'top-right',
                    hideAfter: 5000,
                });
            });
            <?php endif; ?> 
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/users/organization.blade.php ENDPATH**/ ?>