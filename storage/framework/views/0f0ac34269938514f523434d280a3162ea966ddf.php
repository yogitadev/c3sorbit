<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Title</label>
        <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => true]); ?>

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
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/interview_modes/_form.blade.php ENDPATH**/ ?>