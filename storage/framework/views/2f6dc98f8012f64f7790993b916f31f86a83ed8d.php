<div class="row">
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Platform</label>
        <?php echo Form::select('platform_id', $platform_list, null, [
            'class' => 'form-select',
            'id' => 'parent_platform_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Platform',
            'data-parsley-errors-container' => '#platform-error',
        ]); ?>

        <div id="platform-error"></div>
    </div>
</div>

<div class="separator my-5"></div>

<div class="row">

    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Title</label>
        <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    
</div>


<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Status</label>
        <?php echo Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
</div>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/modes/_form.blade.php ENDPATH**/ ?>