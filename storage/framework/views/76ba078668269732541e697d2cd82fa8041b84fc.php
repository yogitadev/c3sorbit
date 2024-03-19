<?php $__env->startSection('page_title', 'Settings'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Settings' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', ['title' => 'Settings', 'breadcrumb_arr' => $breadcrumb_arr], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.settings.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="d-flex flex-column flex-lg-row">





        <div class="clearfix"></div>
        <?php echo Form::open(['class' => 'form w-100', 'id' => 'kt_account_profile_details_form', 'autocomplete' => 'off', 'data-parsley-validate' => true]); ?>

        <div class="card mb-5 mb-xl-5">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Setting Menagement</h3>
                </div>
            </div>
            <div class="card-body border-top p-9">
                <?php if(!is_null($setting_list) && $setting_list->count() > 0): ?>
                    <?php $__currentLoopData = $setting_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mb-5">
                            <label
                                class="col-lg-2 col-form-label fw-bold fs-6 <?php echo e($setting_item->setting_required == 'Yes' ? 'required' : ''); ?>"><?php echo e($setting_item->setting_title); ?></label>
                            <div class="col-lg-10">
                                <?php if($setting_item->setting_type == 'Input'): ?>
                                    <?php echo Form::text($setting_item->setting_name, $setting_item->setting_value, ['class' => 'form-control form-control-lg form-control-solid mb-3 mb-lg-0', 'autocomplete' => 'off', 'required' => $setting_item->setting_required == 'Yes' ? true : false, 'autofocus' => true]); ?>

                                <?php else: ?>
                                    <?php echo Form::textarea($setting_item->setting_name, $setting_item->setting_value, ['class' => 'form-control h-100px', 'required' => $setting_item->setting_required == 'Yes' ? true : false]); ?>

                                <?php endif; ?>
                                <?php if(!is_null($setting_item->setting_help_text) && $setting_item->setting_help_text != ''): ?>
                                    <div class="form-text">
                                        <?php echo $setting_item->setting_help_text; ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <i class="fas fa-exclamation-circle fs-1 me-4 text-warning"></i>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="text-warning mb-0 fw-normal">No Setting Found</h4>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
        <?php echo Form::close(); ?>




    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>