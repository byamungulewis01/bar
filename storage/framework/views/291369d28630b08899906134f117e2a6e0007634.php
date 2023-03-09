

<?php $__env->startSection('page_name'); ?>
Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            

            <!-- Users List Table -->
            <div class="card">
              <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Deactivated Users </h5>
                
              </div>
              <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                  <thead>
                    <tr>
                      <th></th>
                      <th>User</th>
                      <th>Roll Number</th>
                      <th>Phone</th>
                      <th>District</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

            <div class="modal modal-top fade" id="deleteStatus" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <form method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="express" id="is"/>
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">Are you sure to activate <span id="username"></span>?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Abort</button>
                      <button type="submit" class="btn btn-dark">Yes, activate</button>
                    </div>
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
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/vendor/libs/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>

<script>

"use strict";
$(function(){
    let t,a,s;
    s=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,n=$(".datatables-users"),i=$(".select3"),r="/profile/",o={
        1:{
            title:"Advocate",
            class:"bg-label-info"
        },
        2:{
            title:"Intern Advocate",
            class:"bg-label-success"
        },
        3:{
            title:"Support Staff",
            class:"bg-label-secondary"
        },
        4:{
            title:"Technical Staff",
            class:"bg-label-primary"
        }
    };
    i.length&&(i=i).wrap('<div class="position-relative"></div>').select2({
        placeholder:"Select District",
        dropdownParent:i.parent()
    }),
    n.length&&(e=n.DataTable({
        ajax:"/api/users/deactiveApi",
        columns:[
            {data:""},
            {data:"name"},
            {data:"regNumber"},
            {data:"phone"},
            {data:"district"},
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
                    var n=a.name, i=a.email, o=a.photo, j=a.id;
                    return'<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">'+(o?'<img src="'+assetsPath+"img/avatars/"+o+'" alt="Avatar" class="rounded-circle">':'<span class="avatar-initial rounded-circle bg-label-'+["success","danger","warning","info","primary","secondary"][Math.floor(6*Math.random())]+'">'+(o=(((o=(n=a.name).match(/\b\w/g)||[]).shift()||"")+(o.pop()||"")).toUpperCase())+"</span>")+'</div></div><div class="d-flex flex-column"><a href="javascript:;" class="text-body text-truncate"><span class="fw-semibold">'+n+'</span></a><small class="text-muted">'+i+"</small></div></div>"
                }
            },
            {
                targets:3,
                render:function(e,t,a,s){
                    a=a.phone;
                    return'<span class="fw-semibold">'+a[0].phone+"</span>"
                    }
                },
                {
                    targets:4,
                    render:function(e,t,a,s){
                        return'<span class="fw-semibold">'+a.district+"</span>"
                    }
                },
                {
                    targets:5,
                    render:function(e,t,a,s){
                        a=a.status;
                        return'<span class="badge '+o[a].class+'" text-capitalized>'+o[a].title+"</span>"
                    }
                },
                {
                    targets:-1,
                    title:"Actions",
                    searchable:!1,
                    orderable:!1,
                    render:function(e,t,a,s){
                        return'<div class="d-flex align-items-center"><a href="javascript:;" class="text-body delete-record '+a.id+'"><i class="ti ti-check ti-sm mx-2"></i>Activate</a></div></div>'
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
                return fetch('/api/users/individual/'+id,  {
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
            document.getElementById('is').value = id;
            var myModal = new bootstrap.Modal(document.getElementById('deleteStatus'), {
                keyboard: false
            })
            myModal.show()
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
                diploma:{
                    validators:{
                        notEmpty:{
                            message:"Upload diploma"
                        }
                    }
                },
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

    })
   
    
    

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\Lewis\bar\resources\views/users/deactive.blade.php ENDPATH**/ ?>