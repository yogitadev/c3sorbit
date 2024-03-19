<?php $__env->startSection('page_title', 'Create Role'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
        $breadcrumb_arr = [
            'IAM' => '',
            'Roles' => 'route(role-list)',
            'Create' => ''
        ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Create Role',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.iam.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="kt_app_content_container" class="app-container container-fluid">
    <?php echo Form::open(['class' => 'form w-100 module_form','id' => 'kt_create_form', 'autocomplete' => 'off', 'data-parsley-validate' => true,]); ?>    
        <div class="card mb-5 mb-xl-5">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Create</h3>
                </div>
                <div class="card-toolbar m-0">
                    <a href="<?php echo e(route('role-list')); ?>" class="btn btn-danger"><i class="fas fa-angle-left fs-4 me-2"></i> Go
                        Back</a>
                </div>
            </div>
            <div class="card-body border-top p-9">
                <?php echo $__env->make('admin.iam.roles._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Create</span>
                </button>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/iam/roles/create.blade.php ENDPATH**/ ?>