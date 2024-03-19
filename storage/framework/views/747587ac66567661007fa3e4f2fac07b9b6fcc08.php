<?php $__env->startSection('content'); ?> 

Hello, <?php echo e($student_item['name']); ?><br>
<p>
        Outstanding work, The application link is sent to the student via email. To be proactive, you can also forward this link to the student. As soon as the student submits the form, this screen will be updated. This means that if you see this screen, the form from the student is still incomplete. You can check the progress of the form at any time and complete it on behalf of the student.
    </p> <br>
        <a href="<?php echo e(route('student-application', ['unique_id' => $str])); ?>" class="btn btn-primary">View Application Form</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mail.front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/mail/front/student_get_application_mail.blade.php ENDPATH**/ ?>