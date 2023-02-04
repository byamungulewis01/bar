
<?php if(session()->has('message')): ?>
<script>
$(document).ready(function() {
    $.toast({
        heading: 'Success',
        text: '<?php echo e(session()->get('message')); ?>',
        showHideTransition: 'fade',
        icon: 'success',
        position : 'top-right' 
    });
});
</script>
<?php endif; ?>
<?php if(session()->has('warning')): ?>
<script>
$(document).ready(function() {
    $.toast({
        heading: 'Message',
        text: '<?php echo e(session()->get('message')); ?>',
        showHideTransition: 'fade',
        icon: 'warning',
        position : 'top-right' 
    });
});
</script>
<?php endif; ?>
<?php if(session()->has('error')): ?>
<script>
$(document).ready(function() {
    $.toast({
        heading: 'Error',
        text: '<?php echo e(session()->get('error')); ?>',
        showHideTransition: 'fade',
        icon: 'error',
        position : 'top-right' 
    });
});
</script>
<?php endif; ?>

<?php /**PATH C:\Users\admin\Desktop\Lewis\rba\resources\views/layouts/flash_message.blade.php ENDPATH**/ ?>