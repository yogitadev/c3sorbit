<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($request_item['name']); ?> <br>
    You Successfully applyed <?php echo e($request_item['action']); ?> . <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/admin/student_ol_request_mail.blade.php ENDPATH**/ ?>