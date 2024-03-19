<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($interview_item['name']); ?> <br>
    You Successfully <?php echo e($interview_item['action']); ?> your interview. <br>
    Your interview date & time mention below <br>
    <b>Date: </b> <?php echo e($interview_item['interview_date']); ?> <br>
    <b>Time: </b> <?php echo e($interview_item['interview_time']); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/admin/student_schedule_interview_mail.blade.php ENDPATH**/ ?>