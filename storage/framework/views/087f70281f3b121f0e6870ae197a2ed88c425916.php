<?php if($paginator->hasPages()): ?>
 <div class="demo-inline-spacing">
     <nav aria-label="Page navigation">
         <ul class="pagination pagination-sm">
                
                <?php if($paginator->onFirstPage()): ?>
                <li class="page-item prev disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                    <a class="page-link" href="javascript:void(0);"><i class="tf-icon fs-6 ti ti-chevrons-left"></i></a>
                </li>
            <?php else: ?>
                <li class="page-item prev">
                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>"><i class="tf-icon fs-6 ti ti-chevrons-left"></i></a>
                </li>
            <?php endif; ?>

             
             <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             
             <?php if(is_string($element)): ?>
                 <li class="page-link disabled" aria-disabled="true">
                    <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($element); ?></a>
                </li>
             <?php endif; ?>

             
             <?php if(is_array($element)): ?>
                 <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($page == $paginator->currentPage()): ?>
                         <li class="page-item active" aria-current="page">
                            <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                        </li>
                     <?php else: ?>
                         <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                     <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
            <?php if($paginator->hasMorePages()): ?>
            <li class="page-item next">
                <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>"><i class="tf-icon fs-6 ti ti-chevrons-right"></i></a>
            </li>
            <?php else: ?>
                <li class="page-item next disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    <a class="page-link" aria-hidden="true" href="javascript:void(0);"><i class="tf-icon fs-6 ti ti-chevrons-right"></i></a>
                </li>
            <?php endif; ?>

         </ul>
     </nav>

 </div>
 <?php endif; ?><?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>