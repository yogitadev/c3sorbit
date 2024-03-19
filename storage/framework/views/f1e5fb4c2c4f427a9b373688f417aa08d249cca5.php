<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($student_item['name']); ?><br>
    You Successfully Register Your Lead in Edfyed. <br>
    <b>Lead Date: </b> <?php echo e($student_item['lead_date']); ?> <br>
    <b>Lead Time: </b> <?php echo e($student_item['lead_time']); ?> <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/front/student_create_mail.blade.php ENDPATH**/ ?>