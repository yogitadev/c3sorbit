<?php $__env->startSection('page_title', 'View Role Permission'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
        $breadcrumb_arr = [
            'IAM' => '',
            'Roles' => route('role-list'),
            $role_item->unique_id => route('view-role', ['unique_id' => $role_item->unique_id]),
            'Permissions' => '',
        ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'View Role Permission',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.iam.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <?php echo $__env->make('admin.iam.roles.show.includes._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="fw-bolder m-0">Permissions</h3>
                        </div>
                    </div>

                    <?php echo Form::open(['class' => 'module_form']); ?>

                    <div class="card-body">
                        <?php if(isset($module_categories) && !is_null($module_categories) > 0): ?>

                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 custom-tab" role="tablist">
                                <?php $__currentLoopData = $module_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $module_category_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e($loop->first ? 'active' : ''); ?> " data-bs-toggle="tab"
                                            href="#tab_<?php echo e($loop->index); ?>" role="tab"
                                            ><?php echo e($module_category_item->title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>

                            <div class="tab-content">
                                <?php $__currentLoopData = $module_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $module_category_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane <?php echo e($k == 0 ? 'active' : ''); ?>" id="tab_<?php echo e($k); ?>"
                                        role="tabpanel">
                                        <div class="row">
                                            <?php if(!is_null($module_category_item->modules)): ?>
                                                <?php $__currentLoopData = $module_category_item->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $permissions = Spatie\Permission\Models\Permission::where('module_id', $module_item->id)->get(); ?>
                                                    <?php if(!is_null($permissions)): ?>
                                                        <div class="col-md-3 mb-5">
                                                            <h5 class="mb-4"><?php echo e($module_item->title); ?></h5>


                                                            <div class="kt-checkbox-list">

                                                                <div class="form-check mb-4">
                                                                    <input class="form-check-input chk_all" type="checkbox"
                                                                        id="chk_all_<?php echo e($module_item->id); ?>" />
                                                                    <label class="form-check-label"
                                                                        for="chk_all_<?php echo e($module_item->id); ?>">
                                                                        All
                                                                    </label>
                                                                </div>


                                                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="form-check mb-4">
                                                                        <input
                                                                            <?php echo e(is_array($current_permissions) && in_array($permission_item->id, $current_permissions) ? 'checked="checked"' : ''); ?>

                                                                            class="form-check-input chk_item"
                                                                            type="checkbox" name="permissions[]"
                                                                            value="<?php echo e($permission_item->id); ?>"
                                                                            id="chk_<?php echo e($permission_item->id); ?>" />
                                                                        <label class="form-check-label"
                                                                            for="chk_<?php echo e($permission_item->id); ?>">
                                                                            <?php echo e(ucwords(str_replace('_', ' ', $permission_item->title))); ?>

                                                                        </label>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                        <?php endif; ?>
                    </div>
                    <div class="card-footer d-flex justify-content-end">

                        <button type="submit" class="btn btn-primary">Update Permissions</button>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $('.chk_all').click(function() {
            $(this).closest('.kt-checkbox-list').find('input').prop('checked', $(this).is(':checked'));
        });
      
  
        // console.log($('.chk_all').closest('.kt-checkbox-list').find('.chk_item').length );
        // var tt = $('.chk_all').closest('.kt-checkbox-list').find('.chk_item');
        // console.log($('.chk_all').closest('.kt-checkbox-list').find('.chk_item:checked').length);
        // if ($('.chk_all').closest('.kt-checkbox-list').find('.chk_item').length == $('.chk_all').closest('.kt-checkbox-list').find('.chk_item:checked').length ) {
        //     $('.chk_all').prop('checked',true);
        // }
       // console.log($('.chk_item:checked').length);
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/iam/roles/show/permission.blade.php ENDPATH**/ ?>