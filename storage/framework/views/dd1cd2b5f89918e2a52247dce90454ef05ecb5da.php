<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Name</label>
        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Purpose</label>
        <?php echo Form::select('purpose_id', $purpose_list, null, [
            'class' => 'form-select',
            'id' => 'parent_platform_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Purpose',
            'data-parsley-errors-container' => '#purpose-error',
        ]); ?>

        <div id="purpose-error"></div>
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
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/vista_update_management/results/_form.blade.php ENDPATH**/ ?>