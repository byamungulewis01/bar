

<?php $__env->startSection('page_name'); ?>
Disciplinary Cases
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            

            <!-- Users List Table -->
            <div class="card">
              <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Disciplinary Cases <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newCase"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New Case</span></a><a class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editmeetings"></a></h5>
                
              </div>
              <div class="card-datatable table-responsive">
                <table class="datatables-cases table border-top">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Case Number</th>
                      <th>Complaint</th>
                      <th>Plaintiff</th>
                      <th>Defendant</th>
                      <th>Authority</th>
                      <th>Status</th>
                      <th>Next Sitting</th>
                      <th></th>
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
  var e,n=$(".datatables-cases");
  n.length&&(e=n.DataTable({
      ajax:"/api/cases",
      columns:[
          {data:""},
          {data:"number"},
          {data:"complaint"},
          {data:"plaintiff"},
          {data:"defendant"},
          {data:"authority"},
          {data:"status"},
          {data:"sitting"},
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
  setTimeout(()=>{
      $(".dataTables_filter .form-control").removeClass("form-control-sm"),
      $(".dataTables_length .form-select").removeClass("form-select-sm")
  },300)
})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\bar\resources\views/cases/index.blade.php ENDPATH**/ ?>