<?php $__env->startSection('page_name'); ?>
  Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
  <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <!-- Source Visit -->
        <div class="col-xl-4 col-md-6 order-2 order-lg-1">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <div class="card-title mb-0">
                <h5 class="mb-0">Martial Status</h5>
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" data-bs-toggle="modal" data-bs-target="#addNewStatus">
                  <i class="ti ti-plus ti-sm text-muted"></i> New
                </button>
              </div>
            </div>
            <div class="card-body">
              <ul class="p-0 m-0">
                <?php $__currentLoopData = $marital; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                  <div class="badge bg-label-success rounded p-2"><i class="ti ti ti-star ti-sm"></i></div>
                  <div class="d-flex justify-content-between w-100 flex-wrap">
                    <h6 class="mb-0 ms-3"><?php echo e($status->title); ?></h6>

                    <div class="modal fade" id="updateStatus<?php echo e($status->id); ?>" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                          <form action="<?php echo e(route('marital.update')); ?>" class="needs-validation" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="token" value="<?php echo e($status->id); ?>"/>
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">Update Status</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col">
                                  <label for="nameSmall" class="form-label">Title</label>
                                  <input type="text" id="nameSmall" name="title" class="form-control" value="<?php echo e($status->title); ?>" placeholder="Enter status" required="">
                                  <div class="invalid-feedback"> Please enter status. </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-dark">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="modal modal-top fade" id="deleteStatus<?php echo e($status->id); ?>" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                          <form action="<?php echo e(route('marital.delete')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="hidden" name="token" value="<?php echo e($status->id); ?>"/>
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">Are you sure to delete?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-dark">Yes, Delete</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex">
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                            class="ti ti-dots-vertical"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#updateStatus<?php echo e($status->id); ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteStatus<?php echo e($status->id); ?>"><i class="ti ti-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
        <!--/ Source Visit -->

        <!-- Laws Category table -->
        <div class="col-12 col-xl-8 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
          <div class="card">
          
          <div class="card-datatable table-responsive pt-0">
            <table class="datatables-laws table">
              <thead>
              <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
          </div>
        </div>
        <!--/ Projects table -->
      </div>
    </div>
  <!-- / Content -->

    <div class="modal fade" id="addNewStatus" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <form action="<?php echo e(route('marital.new')); ?>" class="needs-validation" method="POST">
            <?php echo csrf_field(); ?>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">Add New Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <label for="nameSmall" class="form-label">Title</label>
                  <input type="text" id="nameSmall" name="title" class="form-control" placeholder="Enter status" required="">
                  <div class="invalid-feedback"> Please enter status. </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-dark">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Small Modal -->
    <div class="modal fade" id="newCategory" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <form action="<?php echo e(route('lawcat.new')); ?>" class="needs-validation" method="POST">
              <?php echo csrf_field(); ?>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">New Law Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="nameSmall" class="form-label">Title</label>
                  <input type="text" id="nameSmall" name="title" class="form-control" placeholder="Enter here" required="">
                  <div class="invalid-feedback"> Please enter title. </div>
                </div>
              </div>
              <div class="row">
                <div class="col mb-0">
                  <label class="form-label" for="descr">Description</label>
                  <textarea name="description" class="form-control" id="descr" placeholder="description (optional)"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-dark">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="assets/vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<script>

"use strict";
$(function(){
    var e=$(".datatables-laws");
    e.length&&(e.DataTable({
        ajax:"api/lawcat",
        columns:[
            {data:"title"},
            {data:"description"},
            {data:""}
        ],
        columnDefs:[
            {
                className:"d-flex justify-content-end",
                targets:-1,
                searchable:!1,
                title:"&nbsp;",
                orderable:!1,
                render:function(e,a,t,r){
                    return'<div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div>'
                }
            }
        ],
        order:[[2,"desc"]],
        dom:'<"card-header pb-0 pt-sm-0"<"head-label text-center"><"d-flex justify-content-center justify-content-md-end"f>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',displayLength:7,
        lengthMenu:[7,10,25,50,75,100],
        responsive:{
            details:{
                display:$.fn.dataTable.Responsive.display.modal({
                    header:function(e){
                        return'Details of "'+e.data().title+'"'
                    }
                }),
                type:"column",
                renderer:function(e,a,t){
                    t=$.map(t,function(e,a){
                        return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""
                    }).join("");
                    return!!t&&$('<table class="table"/><tbody />').append(t)
                }
            }
        }
    }),
    $("div.head-label").html('<h5 class="card-title mb-0">Laws Category <button type="button" onclick="openCanva()" class="btn btn-icon btn-sm btn-label-github waves-effect ml-2"><i class="tf-icons ti ti-plus"></i></button></h5>')),
    setTimeout(()=>{
        $(".dataTables_filter .form-control").removeClass("form-control-sm"),
        $(".dataTables_length .form-select").removeClass("form-select-sm")
    },300)
});

function openCanva(){
  var myModal = new bootstrap.Modal(document.getElementById('newCategory'), {
    keyboard: false
  });
  myModal.show()

}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rba\resources\views/settings.blade.php ENDPATH**/ ?>