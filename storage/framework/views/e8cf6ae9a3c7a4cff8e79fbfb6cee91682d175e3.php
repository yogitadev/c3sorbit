<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($interview_item['name']); ?> <br>
    Your interview <b><?php echo e($interview_item['action']); ?></b>  && feedback mention below <br>
    <b>Feedback: </b> <?php echo $interview_item['feedback']; ?> <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/admin/student_interview_feedback_mail.blade.php ENDPATH**/ ?>