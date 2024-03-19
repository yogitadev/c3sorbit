<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('content'); ?>
<section class="main-error text-center m-5">
    <div class="container">
        <div class="error-img m-5">
            <picture>
                <source srcset="<?php echo e(asset('themes/front/images/webp/404.webp')); ?>" type="image/webp">
                <source srcset="<?php echo e(asset('themes/front/images/404.jpg')); ?>" type="image/jpg">
                <img src="<?php echo e(asset('themes/front/images/404.jpg')); ?>" alt="Header Logo" title="Header Logo" height="600px" width="600px">
            </picture>
        </div>
        <p> The page you were looking for could not be found</p>
        
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/errors/404.blade.php ENDPATH**/ ?>