

<?php $__env->startSection('page_name'); ?>
Pro Bono Cases
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            

            <!-- Users List Table -->
            <div class="card">
              <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Pro Bono Cases <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newCase"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New Case</span></a><a class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editmeetings"></a></h5>
                
              </div>
              <div class="card-datatable table-responsive">
                <table class="datatables-probono table border-top">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Concerned</th>
                      <th>Referrer/Category</th>
                      <th>Case Number</th>
                      <th>Nature</th>
                      <th>Status</th>
                      <th>Hearing Day</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
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
$(function(){  
  let t,a,s,o;
  s=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
  var e,n=$(".datatables-probono"),r="/profile/";
  n.length&&(e=n.DataTable({
      ajax:"/api/probono",
      columns:[
          {data:""},
          {data:"seeker"},
          {data:"referrer"},
          {data:"number"},
          {data:"nature"},
          {data:"status"},
          {data:"hearing"},
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
                  var n=a.name, i=a.email, j=a.id;
                  return'<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3"><span class="avatar-initial rounded-circle bg-label-'+["success","danger","warning","info","primary","secondary"][Math.floor(6*Math.random())]+'">'+(o=(((o=(n=a.name).match(/\b\w/g)||[]).shift()||"")+(o.pop()||"")).toUpperCase())+'</span></div></div><div class="d-flex flex-column"><a href="'+r+j+'" class="text-body text-truncate"><span class="fw-semibold">'+n+'</span></a><small class="text-muted">'+i+"</small></div></div>"
              }
          },
          {
              targets:3,
              render:function(e,t,a,s){
                  a=a.type;
                  return'<span class="badge '+oo[a].class+'" text-capitalized>'+oo[a].title+"</span>"
              }
          },
          {
            targets:4,
            render:function(e,t,a,s){
              return'<span class="fw-semibold">'+a.phone+"</span>"
            }
          },
          {
              targets:5,
              render:function(e,t,a,s){
                  return'<span class="fw-semibold">'+a.address+"</span>"
              }
          },
          {
              targets:6,
              render:function(e,t,a,s){
                  a=a.blocked;
                  return'<span class="badge '+oo[a].class+'" text-capitalized>'+oo[a].title+"</span>"
              }
          },
          {
              targets:-1,
              title:"Actions",
              searchable:!1,
              orderable:!1,
              render:function(e,t,a,s){
                  return'<div class="d-flex align-items-center"><a href="javascript:;" class="text-body edit-record "><i class="ti ti-edit ti-sm me-2" data-id="'+a.id+'" data-name="'+a.name+'" data-tin="'+a.tin+'" data-phone="'+a.phone+'" data-email="'+a.email+'" data-type="'+a.type+'" data-address="'+a.address+'" data-status="'+a.blocked+'"></i></a><a href="'+r+a.id+'" class="text-body"><i class="ti ti-eye ti-sm mx-2"></i></a><a href="javascript:;" class="text-body delete-record '+a.id+'"><i class="ti ti-trash ti-sm mx-2"></i></a></div></div>'
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
                      return""!==e.name?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.name+":</td> <td>"+e.data+"</td></tr>":""
                  }).join("");
                  return!!a&&$('<table class="table"/><tbody />').append(a)
              }
          }
      },
              
  })),
  $(".datatables-probono tbody").on("click",".delete-record",function(event){
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
          return fetch('/api/users/meetingsanization/'+id,  {
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
            text:'meetingsanization has been deleted.',
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
  $(".datatables-probono tbody").on("click",".edit-record",function(event){
    let a = event.target;
    let id = a.getAttribute('data-id'),name = a.getAttribute('data-name'),email = a.getAttribute('data-email'),phone = a.getAttribute('data-phone'),tin = a.getAttribute('data-tin'),type = a.getAttribute('data-type'),status = a.getAttribute('data-status'),address = a.getAttribute('data-address'),edit=document.getElementById('edit');
    $("#is").val(id),$("#updateName").val(name),$("#updateEmail").val(email);$("#updatePhone").val(phone);$("#updateTin").val(tin);$("#updateType").val(type);$("#updateStatus").val(status);$("#updateAddress").val(address);
    let ee=document.getElementById("updatedAvatar");
    let f=document.getElementById("updatedDiploma");
    
    edit.click();
  }),
  setTimeout(()=>{
      $(".dataTables_filter .form-control").removeClass("form-control-sm"),
      $(".dataTables_length .form-select").removeClass("form-select-sm")
  },300)
})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Documents\Lewis\bar\resources\views/probono/index.blade.php ENDPATH**/ ?>