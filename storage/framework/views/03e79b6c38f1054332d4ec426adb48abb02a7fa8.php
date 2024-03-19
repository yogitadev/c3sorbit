<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($student_item['name']); ?><br>
    Your Update Lead Vista in Edfyed. <br>
    <b>Purpose: </b> <?php echo e($lead_item->purpose->name ?? '-'); ?> <br>
    <b>Result: </b> <?php echo e($lead_item->result->name ?? '-'); ?> <br>
    <b>Remark: </b> <?php echo $lead_item['remark'] ?? '-'; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/front/student_vista_mail.blade.php ENDPATH**/ ?>