<?php $__env->startSection('page_title', 'Dashboard'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Dashboard' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', ['title' => 'Dashboard', 'breadcrumb_arr' => $breadcrumb_arr], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.dashboard.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="card-px text-center pt-15 pb-15">
                <h2 class="fs-2x fw-bolder mb-0">Welcome <?php echo e(Auth::user()->getFullName()); ?>,</h2>
                <p class="text-gray-400 fs-4 fw-bold py-7">Check out all of the options in the left menu to manage your content
                </p>
            </div>
            <div class="text-center pb-15 px-5">
                <img src="<?php echo e(asset('themes/admin/assets/media/illustrations/sketchy-1/2.png')); ?>" alt=""
                    class="mw-100 h-200px h-sm-325px" />
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>