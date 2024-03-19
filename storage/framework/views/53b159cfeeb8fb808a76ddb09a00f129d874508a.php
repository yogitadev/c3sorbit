<?php $__env->startSection('content'); ?> 

Hello, <br>
    
Trouble signing in? <br>

Resetting your password is easy. <br>

Just press the button below and follow the instructions. We’ll have you up and running in no time. <br>
    <a href="<?php echo e($password_setup_link); ?>" class="btn btn-primary">Reset Password</a> <br>

If you did not make this request then please ignore this email.
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/admin/user_password_reset_mail.blade.php ENDPATH**/ ?>