<?php $__env->startSection('page_name'); ?>
Organizations
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            

            <!-- Users List Table -->
            <div class="card">
              <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Users Organization <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span></a></h5>
                
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
              <!-- Offcanvas to add new user -->
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header">
                  <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add Organization</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                  <form class="pt-0 needs-validation" novalidate="" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Full Name</label>
                      <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe" required />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="add-user-email">Email</label>
                      <input type="email" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" required />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="add-user-contact">Contact</label>
                      <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+2507xxxxxxxxx" aria-label="john.doe@example.com" name="phone" required />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="country">District</label>
                      <select id="country" class="select2 form-select" name="districtrequired ">
                        <option value="">Select</option>

                        <option value="Bugesera">Bugesera</option>
                        <option value="Burera">Burera</option>
                        <option value="Gakenke">Gakenke</option>
                        <option value="Gasabo">Gasabo</option>
                        <option value="Gatsibo">Gatsibo</option>
                        <option value="Gicumbi">Gicumbi</option>
                        <option value="Gisagara">Gisagara</option>
                        <option value="Huye">Huye</option>
                        <option value="Kamonyi">Kamonyi</option>
                        <option value="Karongi">Karongi</option>
                        <option value="Kayonza">Kayonza</option>
                        <option value="Kicukiro">Kicukiro</option>
                        <option value="Kirehe">Kirehe</option>
                        <option value="Muhanga">Muhanga</option>
                        <option value="Musanze">Musanze</option>
                        <option value="Ngoma">Ngoma</option>
                        <option value="Ngororero">Ngororero</option>
                        <option value="Nyabihu">Nyabihu</option>
                        <option value="Nyagatare">Nyagatare</option>
                        <option value="Nyamagabe">Nyamagabe</option>
                        <option value="Nyamasheke">Nyamasheke</option>
                        <option value="Nyanza">Nyanza</option>
                        <option value="Nyarugenge">Nyarugenge</option>
                        <option value="Nyaruguru">Nyaruguru</option>
                        <option value="Rubavu">Rubavu</option>
                        <option value="Ruhango">Ruhango</option>
                        <option value="Rulindo">Rulindo</option>
                        <option value="Rusizi">Rusizi</option>
                        <option value="Rutsiro">Rutsiro</option>
                        <option value="Rwamagana">Rwamagana</option>

                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="gender">Gender</label>
                      <select id="gender" class="form-select" name="genderrequired ">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                   
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Diploma</label>
                      <input class="form-control" type="file" id="formFile" name="diploma" requirerequired d>
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                  </form>
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
$(function(){
    let t,a,s;
    s=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,n=$(".datatables-users"),i=$(".select2"),r="app-user-view-account.html",o={
        1:{
            title:"Pending",
            class:"bg-label-warning"
        },
        2:{
            title:"Active",
            class:"bg-label-success"
        },
        3:{
            title:"Inactive",
            class:"bg-label-secondary"
        }
    };
    i.length&&(i=i).wrap('<div class="position-relative"></div>').select2({
        placeholder:"Select Country",
        dropdownParent:i.parent()
    }),
    n.length&&(e=n.DataTable({
        ajax:"api/users/organization",
        columns:[
            {data:""},
            {data:"name"},
            {data:"phone"},
            {data:"district"},
            {data:"gender"},
            {data:"status"},
            {data:"action"}
        ],
        columnDefs:[
            {
                className:"control",
                searchable:!1,
                orderable:!1,
                responsivePriority:2,
                targets:0,
                render:function(e,t,a,s){
                    return""
                }
            },
            {
                targets:1,
                responsivePriority:4,
                render:function(e,t,a,s){
                    var n=a.name, i=a.email, o=a.avatar;
                    return'<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">'+(o?'<img src="'+assetsPath+"img/avatars/"+o+'" alt="Avatar" class="rounded-circle">':'<span class="avatar-initial rounded-circle bg-label-'+["success","danger","warning","info","primary","secondary"][Math.floor(6*Math.random())]+'">'+(o=(((o=(n=a.name).match(/\b\w/g)||[]).shift()||"")+(o.pop()||"")).toUpperCase())+"</span>")+'</div></div><div class="d-flex flex-column"><a href="'+r+'" class="text-body text-truncate"><span class="fw-semibold">'+n+'</span></a><small class="text-muted">'+i+"</small></div></div>"
                }
            },
            {
                targets:2,
                render:function(e,t,a,s){
                    a=a.phone;
                    return'<span class="fw-semibold">'+a.phone+"</span>"
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
                        a=a.status;return'<span class="badge '+o[a].class+'" text-capitalized>'+o[a].title+"</span>"
                    }
                },
                {
                    targets:-1,
                    title:"Actions",
                    searchable:!1,
                    orderable:!1,
                    render:function(e,t,a,s){
                        return'<div class="d-flex align-items-center"><a href="javascript:;" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="'+r+'" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div>'
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
                    {
                      text:'<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span>',
                      className:"add-new btn btn-primary",
                      attr:{
                          "data-bs-toggle":"offcanvas",
                          "data-bs-target":"#offcanvasAddUser"
                      }
                    }
                ],
                responsive:{
                    details:{
                        display:$.fn.dataTable.Responsive.display.modal({
                            header:function(e){
                                return"Details of "+e.data().name
                            }
                        }),
                        type:"column",
                        renderer:function(e,t,a){
                            a=$.map(a,function(e,t){
                                return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""
                            }).join("");
                            return!!a&&$('<table class="table"/><tbody />').append(a)
                        }
                    }
                },
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
        $(".datatables-users tbody").on("click",".delete-record",function(){
            e.row($(this).parents("tr")).remove().draw()
        }),
        setTimeout(()=>{
            $(".dataTables_filter .form-control").removeClass("form-control-sm"),
            $(".dataTables_length .form-select").removeClass("form-select-sm")
        },300)
    }),
    function(){
        var e=document.querySelectorAll(".phone-mask"),
        t=document.getElementById("addNewUserForm");
        e&&e.forEach(function(e){
            new Cleave(e,{
                phone:!0,phoneRegionCode:"RW"
            })
        }),
        FormValidation.formValidation(t,{
            fields:{
                userFullname:{
                    validators:{
                        notEmpty:{
                            message:"Please enter fullname "
                        }
                    }
                },
                userEmail:{
                    validators:{
                        notEmpty:{
                            message:"Please enter your email"
                        },
                        emailAddress:{
                            message:"The value is not a valid email address"
                        }
                    }
                }
            },
            plugins:{
                trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({
                    eleValidClass:"",
                    rowSelector:function(e,t){
                        return".mb-3"
                    }
                }),
                submitButton:new FormValidation.plugins.SubmitButton,
                autoFocus:new FormValidation.plugins.AutoFocus
            }
        })
    }();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rba\resources\views/users/organization.blade.php ENDPATH**/ ?>