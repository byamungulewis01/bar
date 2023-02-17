

<?php $__env->startSection('page_name'); ?>
Active user
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Active users<a class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editUser"></a></h5>
                
              </div>
              <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Roll Number</th>
                      <th>Phone</th>
                      <th>District</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
           <!-- Edit User Modal -->
           <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
              <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="text-center mb-4">
                    <h3 class="mb-2">Update User Information</h3>
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
                  <form id="editUserForm" class="row g-3 needs-validation <?php if($errors->any()): ?> validated <?php endif; ?>" novalidate="" method="post"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" id="is" name="express" value="<?php echo e(old('express')); ?>"/>
                    <div class="col-12 col-md-6">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?php echo e(asset('assets/img/avatars/placeholder.jpg')); ?>" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="updatedAvatar" />
                        <div class="button-wrapper">
                          <label for="updateAvatar" class="btn btn-sm btn-primary me-2 mb-3" tabindex="0">
                            <i class="ti ti-upload"></i>
                            <input type="file" id="updateAvatar" name="profile" class="user-avatar-updated" hidden accept="image/png, image/jpeg" />
                          </label>
                          <button type="button" class="btn btn-sm btn-label-secondary updated-avatar-reset mb-3 waves-effect">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          <div class="text-muted">Profile Picture</div>
                          <div class="text-muted d-none">Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?php echo e(asset('assets/img/avatars/diploma.jpg')); ?>" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="updatedDiploma" />
                        <div class="button-wrapper">
                          <label for="updateDiploma" class="btn btn-sm  btn-primary me-2 mb-3" tabindex="0">
                            <i class="ti ti-upload"></i>
                            <input type="file" id="updateDiploma" name="diploma" class="user-diploma-updated" hidden accept="image/png, image/jpeg" />
                          </label>
                          <button type="button" class="btn btn-sm btn-label-secondary updated-diploma-reset mb-3 waves-effect">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          <div class="text-muted">Diploma</div>
                          <div class="text-muted d-none">Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                      </div> 
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updateName">Full Name</label>
                      <input type="text" id="updateName" name="name" class="form-control" placeholder="John" value="<?php echo e(old('name')); ?>"/>
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updateEmail">Email</label>
                      <input type="text" id="updateEmail" name="email" class="form-control" placeholder="example@domain.com"  value="<?php echo e(old('email')); ?>"/>
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updatePhone">Phone Number</label>
                      <div class="input-group">
                        <span class="input-group-text">RW (+250)</span>
                        <input type="text" id="updatePhone" name="phone" class="form-control phone-number-mask" maxLength="10" placeholder="xxx xxx xxxx"  value="<?php echo e(old('phone')); ?>"/>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updateGender">Gender</label>
                      <select id="updateGender" name="gender" class="form-select">
                        <option value="" selected> - Select - </option>
                        <option <?php if(old('gender')=="Male"): ?> selected <?php endif; ?> value="Male">Male</option>
                        <option <?php if(old('gender')=="Male"): ?> selected <?php endif; ?> value="Female">Female</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updateMarital">Martial Status</label>
                      <select id="updateMarital" name="marital" class="form-select">
                        <option value="">Select</option>
                        <?php $__currentLoopData = $marital; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(old('marital')==$status->id): ?> selected <?php endif; ?> value="<?php echo e($status->id); ?>"><?php echo e($status->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                   
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updateDistrict">District</label>
                      <select id="updateDistrict" name="district" class="select2 form-select" data-allow-clear="true">
                        <option value="">Select</option>
                        <option value="Bugesera" <?php if(old('district')=="Bugesera"): ?> selected <?php endif; ?>>Bugesera</option>
                        <option value="Burera" <?php if(old('district')=="Burera"): ?> selected <?php endif; ?>>Burera</option>
                        <option value="Gakenke" <?php if(old('district')=="Gakenke"): ?> selected <?php endif; ?>>Gakenke</option>
                        <option value="Gasabo" <?php if(old('district')=="Gasabo"): ?> selected <?php endif; ?>>Gasabo</option>
                        <option value="Gatsibo" <?php if(old('district')=="Gatsibo"): ?> selected <?php endif; ?>>Gatsibo</option>
                        <option value="Gicumbi" <?php if(old('district')=="Gicumbi"): ?> selected <?php endif; ?>>Gicumbi</option>
                        <option value="Gisagara" <?php if(old('district')=="Gisagara"): ?> selected <?php endif; ?>>Gisagara</option>
                        <option value="Huye" <?php if(old('district')=="Huye"): ?> selected <?php endif; ?>>Huye</option>
                        <option value="Kamonyi" <?php if(old('district')=="Kamonyi"): ?> selected <?php endif; ?>>Kamonyi</option>
                        <option value="Karongi" <?php if(old('district')=="Karongi"): ?> selected <?php endif; ?>>Karongi</option>
                        <option value="Kayonza" <?php if(old('district')=="Kayonza"): ?> selected <?php endif; ?>>Kayonza</option>
                        <option value="Kicukiro" <?php if(old('district')=="Kicukiro"): ?> selected <?php endif; ?>>Kicukiro</option>
                        <option value="Kirehe" <?php if(old('district')=="Kirehe"): ?> selected <?php endif; ?>>Kirehe</option>
                        <option value="Muhanga" <?php if(old('district')=="Muhanga"): ?> selected <?php endif; ?>>Muhanga</option>
                        <option value="Musanze" <?php if(old('district')=="Musanze"): ?> selected <?php endif; ?>>Musanze</option>
                        <option value="Ngoma" <?php if(old('district')=="Ngoma"): ?> selected <?php endif; ?>>Ngoma</option>
                        <option value="Ngororero" <?php if(old('district')=="Ngororero"): ?> selected <?php endif; ?>>Ngororero</option>
                        <option value="Nyabihu" <?php if(old('district')=="Nyabihu"): ?> selected <?php endif; ?>>Nyabihu</option>
                        <option value="Nyagatare" <?php if(old('district')=="Nyagatare"): ?> selected <?php endif; ?>>Nyagatare</option>
                        <option value="Nyamagabe" <?php if(old('district')=="Nyamagabe"): ?> selected <?php endif; ?>>Nyamagabe</option>
                        <option value="Nyamasheke" <?php if(old('district')=="Nyamasheke"): ?> selected <?php endif; ?>>Nyamasheke</option>
                        <option value="Nyanza" <?php if(old('district')=="Nyanza"): ?> selected <?php endif; ?>>Nyanza</option>
                        <option value="Nyarugenge" <?php if(old('district')=="Nyarugenge"): ?> selected <?php endif; ?>>Nyarugenge</option>
                        <option value="Nyaruguru" <?php if(old('district')=="Nyaruguru"): ?> selected <?php endif; ?>>Nyaruguru</option>
                        <option value="Rubavu" <?php if(old('district')=="Rubavu"): ?> selected <?php endif; ?>>Rubavu</option>
                        <option value="Ruhango" <?php if(old('district')=="Ruhango"): ?> selected <?php endif; ?>>Ruhango</option>
                        <option value="Rulindo" <?php if(old('district')=="Rulindo"): ?> selected <?php endif; ?>>Rulindo</option>
                        <option value="Rusizi" <?php if(old('district')=="Rusizi"): ?> selected <?php endif; ?>>Rusizi</option>
                        <option value="Rutsiro" <?php if(old('district')=="Rutsiro"): ?> selected <?php endif; ?>>Rutsiro</option>
                        <option value="Rwamagana" <?php if(old('district')=="Rwamagana"): ?> selected <?php endif; ?>>Rwamagana</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updateStatus">Administration Status</label>
                      <select id="updateStatus" name="category" class="form-select">
                        <option value="" selected> - Select - </option>
                        <option <?php if(old('category')=="Advocate"): ?> selected <?php endif; ?> value="Advocate">Advocate</option>
                        <option <?php if(old('category')=="Staff"): ?> selected <?php endif; ?> value="Staff">Staff</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="flatpickr-date-up">Admission Date</label>
                      <input type="text" id="flatpickr-date-up" name="date" value="<?php echo e(old('date')); ?>" placeholder="Month DD, YYYY" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updateCategory">Admission Status</label>
                      <select id="updateCategory" name="status" class="form-select">
                        <option value="" selected> - Select - </option>
                        <option <?php if(old('status')=="1"): ?> selected <?php endif; ?> value="1">Advocate</option>
                        <option <?php if(old('status')=="2"): ?> selected <?php endif; ?> value="2">Intern Advocate</option>
                        <option <?php if(old('status')=="3"): ?> selected <?php endif; ?> value="3">Support Staff</option>
                        <option <?php if(old('status')=="4"): ?> selected <?php endif; ?> value="4">Technical Staff</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="updatePracticing">Practicing</label>
                      <select id="updatePracticing" name="practicing" class="form-select">
                        <option value="" selected> - Select - </option>
                        <option <?php if(old('practicing')=="2"): ?> selected <?php endif; ?> value="2">Active</option>
                        <option <?php if(old('practicing')=="3"): ?> selected <?php endif; ?> value="3">Inactive</option>
                        <option <?php if(old('practicing')=="4"): ?> selected <?php endif; ?> value="4">Suspended</option>
                        <option <?php if(old('practicing')=="5"): ?> selected <?php endif; ?> value="5">Struck Off</option>
                      </select>
                    </div>
                    <div class="col-12 text-center">
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--/ Edit User Modal -->

                      </div>
                      <!-- / Content -->
            
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
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
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>

<script>

"use strict";
$(function(){
    var dtt=document.querySelector("#flatpickr-date"),dtu=document.querySelector("#flatpickr-date-up");
    dtt&&dtt.flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today'}),
    dtu&dtu.flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today'})
    let t,a,s;
    s=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,n=$(".datatables-users"),i=$(".select3"),r="/profile/",o={
        1:{
            title:"n/a",
            class:"bg-label-info"
        },
        2:{
            title:"Active",
            class:"bg-label-success"
        },
        3:{
            title:"Inactive",
            class:"bg-label-primary"
        },
        4:{
            title:"Suspended",
            class:"bg-label-warning"
        },
        5:{
            title:"Struck Off",
            class:"bg-label-danger"
        },
        6:{
            title:"Deceased",
            class:"bg-label-secondary"
        }
    };
    i.length&&(i=i).wrap('<div class="position-relative"></div>').select2({
        placeholder:"Select District",
        dropdownParent:i.parent()
    }),
    n.length&&(e=n.DataTable({
        ajax:"/api/users/active",
        columns:[
            {data:"name"},
            {data:"regNumber"},
            {data:"phone"},
            {data:"district"},
            {data:"gender"},
            {data:"practicing"},
            {data:"action"}
        ],
        columnDefs:[
          
            {
                targets:0,
                responsivePriority:4,
                render:function(e,t,a,s){
                    var n=a.name, i=a.email, o=a.photo, j=a.id;
                    return'<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">'+(o?'<img src="'+assetsPath+"img/avatars/"+o+'" alt="Avatar" class="rounded-circle">':'<span class="avatar-initial rounded-circle bg-label-'+["success","danger","warning","info","primary","secondary"][Math.floor(6*Math.random())]+'">'+(o=(((o=(n=a.name).match(/\b\w/g)||[]).shift()||"")+(o.pop()||"")).toUpperCase())+"</span>")+'</div></div><div class="d-flex flex-column"><a href="'+r+j+'" class="text-body text-truncate"><span class="fw-semibold">'+n+'</span></a><small class="text-muted">'+i+"</small></div></div>"
                }
            },
            {
                targets:2,
                render:function(e,t,a,s){
                    a=a.phone;
                    return'<span class="fw-semibold">'+a[0].phone+"</span>"
                    }
                },
                {
                    targets:3,
                    render:function(e,t,a,s){
                        return'<span class="fw-semibold">'+a.district+"</span>"
                    }
                },
                {
                    targets:5,
                    render:function(e,t,a,s){
                        a=a.practicing;
                        return'<span class="badge '+o[a].class+'" text-capitalized>'+o[a].title+"</span>"
                    }
                },
                {
                    targets:6,
                    title:"Actions",
                    searchable:!1,
                    orderable:!1,
                    render:function(e,t,a,s){
                        return'<div class="d-flex align-items-center"><a href="javascript:;" class="text-body edit-record "><i class="ti ti-edit ti-sm me-2" data-id="'+a.id+'" data-name="'+a.name+'" data-photo="'+a.photo+'" data-diplome="'+a.diplome+'" data-phone="'+a.phone[0].phone+'" data-email="'+a.email+'" data-district="'+a.district+'" data-gender="'+a.gender+'" data-marital="'+a.marital+'" data-regNumber="'+a.regNumber+'" data-status="'+a.status+'" data-practicing="'+a.practicing+'" data-category="'+a.category+'"  data-date="'+a.date+'"></i></a><a href="'+r+a.id+'" class="text-body"><i class="ti ti-eye ti-sm mx-2"></i></a><a href="javascript:;" class="text-body delete-record '+a.id+'"><i class="ti ti-trash ti-sm mx-2"></i></a></div></div>'
                    }
                }
            ],
            order:[
                [1,"desc"]
            ],
            dom:'<"row me-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language:{
                sLengthMenu:"_MENU_",
                search:"",
                searchPlaceholder:"Search.."
            },
            buttons:[
                {
                    extend:"collection",
                    className:"btn btn-label-secondary dropdown-toggle mx-3",
                    text:'<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
                    buttons:[
                        {
                            extend:"print",
                            text:'<i class="ti ti-printer me-2" ></i>Print',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),s="",$.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                        }),s)
                                    }
                                }
                            },
                            customize:function(e){
                                $(e.document.body).css("color",s)
                                .css("border-color",t)
                                .css("background-color",a),
                                $(e.document.body).find("table").addClass("compact")
                                .css("color","inherit")
                                .css("border-color","inherit")
                                .css("background-color","inherit")
                            }
                        },
                        {
                            extend:"csv",
                            text:'<i class="ti ti-file-text me-2" ></i>Csv',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),s="",
                                        $.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                        }),s)
                                    }
                                }
                            }
                        },
                        {
                            extend:"excel",
                            text:'<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),
                                        s="",
                                        $.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                        }),s)
                                    }
                                }
                            }
                        },
                        {
                            extend:"pdf",
                            text:'<i class="ti ti-file-code-2 me-2"></i>Pdf',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),
                                        s="",
                                        $.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText}),s)
                                        }
                                    }
                                }
                            },
                            {
                                extend:"copy",
                                text:'<i class="ti ti-copy me-2" ></i>Copy',
                                className:"dropdown-item",
                                exportOptions:{
                                    columns:[1,2,3,4,5],
                                    format:{
                                        body:function(e,t,a){
                                            var s;
                                            return e.length<=0?e:(e=$.parseHTML(e),
                                            s="",
                                            $.each(e,function(e,t){
                                                void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                            }),s)
                                        }
                                    }
                                }
                            }
                        ]
                    },
                    
                ],
                // responsive:{
                //     details:{
                //         display:$.fn.dataTable.Responsive.display.modal({
                //             header:function(e){
                //                 return"Details of "+e.data().name
                //             }
                //         }),
                //         type:"column",
                //         renderer:function(e,t,a){
                //             a=$.map(a,function(e,t){
                //                 return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""
                //             }).join("");
                //             return!!a&&$('<table class="table"/><tbody />').append(a)
                //         }
                //     }
                // },
                initComplete:function(){
                  this.api().columns(2).every(function(){
                    var t=this,
                    a=$('<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>').appendTo(".user_role")
                    .on("change",function(){
                        var e=$.fn.dataTable.util.escapeRegex($(this).val());
                        t.search(e?"^"+e+"$":"",!0,!1).draw()
                    });
                    t.data().unique().sort().each(function(e,t){
                        a.append('<option value="'+e+'">'+e+"</option>")
                    })
                  }),
                  this.api().columns(3).every(function(){
                      var t=this,
                      a=$('<select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Plan </option></select>').appendTo(".user_plan")
                      .on("change",function(){
                          var e=$.fn.dataTable.util.escapeRegex($(this).val());
                          t.search(e?"^"+e+"$":"",!0,!1).draw()
                      });
                      t.data().unique().sort().each(function(e,t){
                          a.append('<option value="'+e+'">'+e+"</option>")
                      })
                  }),
                  this.api().columns(5).every(function(){
                      var t=this,a=$('<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option></select>').appendTo(".user_status")
                      .on("change",function(){
                          var e=$.fn.dataTable.util.escapeRegex($(this).val());
                          t.search(e?"^"+e+"$":"",!0,!1).draw()
                      });
                      t.data().unique().sort().each(function(e,t){
                          a.append('<option value="'+o[e].title+'" class="text-capitalize">'+o[e].title+"</option>")
                      })
                  })
                }
        })),
        $(".datatables-users tbody").on("click",".suspend-record",function(event){
            let id = event.currentTarget.classList[2];
            Swal.fire({
              title:"Are you sure?",
              text:"",
              icon:"warning",
              showCancelButton:!0,
              confirmButtonText:"Yes, suspend!",
              customClass:{
                confirmButton:"btn btn-primary me-3",
                cancelButton:"btn btn-label-secondary"
              },
              buttonsStyling:!1,
              showLoaderOnConfirm: true,
              preConfirm: () => {
                return fetch('/api/users/active/'+id,  {
                    method: 'PUT'
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
                Swal.fire(
                  'Deleted!',
                  'User has been deleted.',
                  'success'
                )
                e.row($(this).parents("tr")).remove().draw()
              }
            })
        }),
        $(".datatables-users tbody").on("click",".delete-record",function(event){
            let id = event.currentTarget.classList[2];
            Swal.fire({
              title:"Are you sure?",
              text:"You won't be able to revert this!",
              icon:"warning",
              showCancelButton:!0,
              confirmButtonText:"Yes, delete it!",
              customClass:{
                confirmButton:"btn btn-danger me-3",
                cancelButton:"btn btn-label-secondary"
              },
              buttonsStyling:!1,
              showLoaderOnConfirm: true,
              preConfirm: () => {
                return fetch('/api/users/individual/'+id,  {
                    method: 'DELETE',
                    headers: new Headers({
                      'Accept' : 'application/json',
                      'Content-Type':'application/json; charset=UTF-8',
                      'X-CSRF-Token' : "<?php echo csrf_token() ?>"
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
                  title:'Deleted!',
                  text:'User has been deleted.',
                  icon:'success',
                  showCancelButton:0,
                  confirmButtonText:"Close",
                  customClass:{
                    confirmButton:"btn btn-label-secondary",
                    cancelButton:"btn btn-label-secondary d-none"
                  },
                  buttonsStyling:!1,
                })
                e.row($(this).parents("tr")).remove().draw()
              }
            })
        }),
        $(".datatables-users tbody").on("click",".edit-record",function(event){
          let a = event.target;
          let id = a.getAttribute('data-id'),name = a.getAttribute('data-name'),email = a.getAttribute('data-email'),phone = a.getAttribute('data-phone'),district = a.getAttribute('data-district'),gender = a.getAttribute('data-gender'),marital = a.getAttribute('data-marital'),photo = a.getAttribute('data-photo'),diplome = a.getAttribute('data-diplome'),regNumber = a.getAttribute('data-regNumber'),status = a.getAttribute('data-status'),practicing = a.getAttribute('data-practicing'),category = a.getAttribute('data-category'),date = a.getAttribute('data-date'),edit=document.getElementById('edit');
          $("#is").val(id),$("#updateName").val(name),$("#updateEmail").val(email);$("#updatePhone").val(phone);$("#updateDistrict").val(district);$("#updateGender").val(gender);$("#updateMarital").val(marital);$("#updateStatus").val(category);$("#updateCategory").val(status);$("#updatePracticing").val(practicing);document.querySelector("#flatpickr-date-up").flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today'}).setDate(new Date(date.split('-')[0],parseInt(date.split('-')[1])-1,date.split('-')[2].split('T')[0]));
          let ee=document.getElementById("updatedAvatar");
          let f=document.getElementById("updatedDiploma");
          const l=document.querySelector(".user-avatar-updated"),m=document.querySelector(".user-diploma-updated"),c=document.querySelector(".updated-avatar-reset"),d=document.querySelector(".updated-diploma-reset");
          if(ee){
            const r = ee.src = assetsPath+"img/avatars/"+photo;
            l.onchange=()=>{
              l.files[0]&&(ee.src=window.URL.createObjectURL(l.files[0]))
            },
            c.onclick=()=>{
                l.value="",
                ee.src=r
            }
          }
          if(f){
              const s= f.src = assetsPath+"img/diploma/"+diplome;
              m.onchange=()=>{
                m.files[0]&&(f.src=window.URL.createObjectURL(m.files[0]))
              },
              d.onclick=()=>{
                  l.value="",
                  f.src=s
              }
          }
          edit.click();
        }),
        setTimeout(()=>{
            $(".dataTables_filter .form-control").removeClass("form-control-sm"),
            $(".dataTables_length .form-select").removeClass("form-select-sm")
        },300)

        let ee=document.getElementById("uploadedAvatar");
        let f=document.getElementById("uploadedDiploma");
        const l=document.querySelector(".user-avatar-input"),m=document.querySelector(".user-diploma-input"),c=document.querySelector(".user-avatar-reset"),d=document.querySelector(".user-diploma-reset");
        if(ee){
          const r=ee.src;
          l.onchange=()=>{
              l.files[0]&&(ee.src=window.URL.createObjectURL(l.files[0]))
          },
          c.onclick=()=>{
              l.value="",
              ee.src=r
          }
        }
        if(f){
            const s=f.src;
            m.onchange=()=>{
                m.files[0]&&(f.src=window.URL.createObjectURL(m.files[0]))
            },
            d.onclick=()=>{
                l.value="",
                f.src=s
            }
        }
    }),
    //   function(){
    //     var e=document.querySelectorAll(".phone-mask"),
    //     t=document.getElementById("addNewUserForm");
    //     e&&e.forEach(function(e){
    //         new Cleave(e,{
    //             phone:!0,phoneRegionCode:"EN"
    //         })
    //     }),
    //     FormValidation.formValidation(t,{
    //         fields:{
    //             userFullname:{
    //                 validators:{
    //                     notEmpty:{
    //                         message:"Please enter fullname "
    //                     }
    //                 }
    //             },
    //             userEmail:{
    //                 validators:{
    //                     notEmpty:{
    //                         message:"Please enter your email"
    //                     },
    //                     emailAddress:{
    //                         message:"The value is not a valid email address"
    //                     }
    //                 }
    //             }
    //         },
    //         plugins:{
    //             trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({
    //                 eleValidClass:"",
    //                 rowSelector:function(e,t){
    //                     return".mb-3"
    //                 }
    //             }),
    //             submitButton:new FormValidation.plugins.SubmitButton,
    //             autoFocus:new FormValidation.plugins.AutoFocus
    //         }
    //     })
      
    // }();

    document.addEventListener("DOMContentLoaded",function(e){
    {
        const o=document.querySelector("#newUserForm"),
        p=document.querySelector("#editUserForm"),
        t=document.querySelector("#phone");
        t&&new Cleave(t,{
            phone:!0,
            phoneRegionCode:"RW"
        });
        const s=(o&&FormValidation.formValidation(o,{
            fields:{
              profile:{
                    validators:{
                        notEmpty:{
                            message:"Upload profile picture"
                        }
                    }
                },
                // diploma:{
                //     validators:{
                //         notEmpty:{
                //             message:"Upload diploma"
                //         }
                //     }
                // },
                name:{
                    validators:{
                        notEmpty:{
                            message:"Please enter full name"
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
                gender:{
                    validators:{
                        notEmpty:{
                            message:"Select gender"
                        }
                    }
                },
                marital:{
                    validators:{
                        notEmpty:{
                            message:"Select martial status"
                        }
                    }
                },
                district:{
                    validators:{
                        notEmpty:{
                            message:"Select district"
                        }
                    }
                },
                category:{
                    validators:{
                        notEmpty:{
                            message:"Select user category"
                        }
                    }
                },
                practicing:{
                    validators:{
                        notEmpty:{
                            message:"Select practicing status"
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
                            message:"Please enter full name"
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
                gender:{
                    validators:{
                        notEmpty:{
                            message:"Select gender"
                        }
                    }
                },
                marital:{
                    validators:{
                        notEmpty:{
                            message:"Select martial status"
                        }
                    }
                },
                district:{
                    validators:{
                        notEmpty:{
                            message:"Select district"
                        }
                    }
                },
                category:{
                    validators:{
                        notEmpty:{
                            message:"Select user category"
                        }
                    }
                },
                practicing:{
                    validators:{
                        notEmpty:{
                            message:"Select practicing status"
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
        var myModal = new bootstrap.Modal(document.getElementById('editUser'), {
          keyboard: false
        })
        myModal.show()
      <?php endif; ?>
    })
   
    
    

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/users/active.blade.php ENDPATH**/ ?>