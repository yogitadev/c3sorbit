<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('content'); ?>
    <img src="<?php echo e(asset('themes/admin/assets/media/illustrations/sketchy-1/18.png')); ?>" alt=""
        class="mw-100 mb-10 h-lg-450px" />
    <h1 class="fw-bold mb-10" style="color: #A3A3C7">Admin Seems there is nothing here</h1>
    <a href="<?php echo e(route('admin-dashboard')); ?>" class="btn btn-primary">Return Home</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors.admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/errors/admin/404.blade.php ENDPATH**/ ?>