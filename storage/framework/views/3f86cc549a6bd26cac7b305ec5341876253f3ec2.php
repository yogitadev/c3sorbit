<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Name</label>
        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => true,'data-parsley-maxlength' => 254,'maxlength'=>254]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Short Name</label>
        <?php echo Form::text('short_name', null, ['class' => 'form-control', 'required' => true,'data-parsley-maxlength' => 254,'maxlength'=>254]); ?>

    </div>
</div>
<div class="separator my-5"></div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Status</label>
        <?php echo Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
</div>


<?php $__env->startPush('page_js'); ?>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/iam/roles/_form.blade.php ENDPATH**/ ?>