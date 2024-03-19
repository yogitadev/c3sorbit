<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Region Name</label>
        <?php echo Form::text('region_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-10">
        <label class="form-label required fs-6">Country</label>

        <?php 
            if(isset($item)) {
                $selected_ids = explode(',',$item->country_ids); 
            } else {
                $selected_ids = [];
            }
        ?>

        <?php echo Form::select('country_ids[]', $country_list, $selected_ids, ['class' => 'form-select form-select-solid fw-bolder', 'multiple', 'required' => 'true','data-control' => 'select2','data-parsley-errors-container' => '#country-error',]); ?>

        <div id="country-error"></div>
    </div>
</div>
<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Status</label>
        <?php echo Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
</div>
<?php $__env->startPush('page_js'); ?>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/region_managers/_form.blade.php ENDPATH**/ ?>