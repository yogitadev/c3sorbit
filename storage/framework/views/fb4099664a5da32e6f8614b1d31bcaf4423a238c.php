<?php $__env->startSection('page_title', 'Module Permission'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
        $breadcrumb_arr = [
            'IAM' => '',
            'Modules' => 'route(module-list)',
            $module_item->unique_id => '',
            'Permission' => '',
        ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Modules',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.iam.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="kt_app_content_container" class="app-container container-fluid">

        <?php echo Form :: open (['class' => 'form w-100 module_form','id' => 'kt_create_form','autocomplete' => 'off','data-parsley-validate' => true,]); ?>


        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h3 class="fw-bolder m-0">Set Module Permission for (<?php echo e($module_item->title); ?>)</h3>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <a href="<?php echo e(route('module-list')); ?>" class="btn btn-dark"><i class="fas fa-arrow-left fs-4 me-1"></i>
                            Back to Modules</a>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <?php if(!is_null($module_permissions) && $module_permissions->count() > 0): ?>
                    <div class="row">
                        <?php $__currentLoopData = $module_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_permission_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 mb-10">
                                <label class="form-label fs-6"><?php echo e($module_permission_item->title); ?></label>

                                <?php echo Form::select('permission_list[' . $module_permission_item->id . '][]', $role_list,$module_permission_item->selected_roles, ['multiple'=>'multiple','class' => 'form-select form-select-solid fw-bolder',
                                'data-control' => 'select2',
                                'multiple' => true,   
                                    ]); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Update Permission</span>
                </button>
            </div>

            <?php echo Form::close(); ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/iam/modules/permission.blade.php ENDPATH**/ ?>