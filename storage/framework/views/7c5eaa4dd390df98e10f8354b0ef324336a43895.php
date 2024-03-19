<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($vl_request['name']); ?> <br>
    Your Visa Letter generated && <?php echo e($vl_request['type']); ?> letter attachment below <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/admin/student_vl_request_mail.blade.php ENDPATH**/ ?>