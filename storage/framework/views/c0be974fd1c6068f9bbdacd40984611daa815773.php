<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($student_item['name']); ?><br>
    You Successfully Student Application form completed. <br>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/front/student_complete_application_mail.blade.php ENDPATH**/ ?>