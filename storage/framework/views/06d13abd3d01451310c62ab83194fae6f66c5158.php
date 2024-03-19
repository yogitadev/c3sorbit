<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($data['first_name']); ?> <?php echo e($data['last_name']); ?><br>
    You Successfully Register Your Id in Edfyed. <br>
    Your username & password mention below <br>
    <b>Username: </b> <?php echo e($data['username']); ?> <br>
    <b>Password: </b> <?php echo e($password); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/admin/user_create_mail.blade.php ENDPATH**/ ?>