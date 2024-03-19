<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($student_item['name']); ?><br>
    Your Student Application moved to Edfyops Successfully. <br>
    Your Reference Number : <b> <?php echo e($student_item['v_reference_no']); ?></b>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/front/student_move_edfyed_mail.blade.php ENDPATH**/ ?>