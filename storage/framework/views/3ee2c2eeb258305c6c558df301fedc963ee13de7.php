<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Account Title</label>
        <?php echo Form::text('account_title', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Bank Name</label>
        <?php echo Form::text('bank_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Bank Address</label>
        <?php echo Form::text('bank_address', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">IBAN</label>
        <?php echo Form::text('iban', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">SWIFT / BIC</label>
        <?php echo Form::text('bic', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Nick Name</label>
        <?php echo Form::text('nick_name', null, ['class' => 'form-control', 'required' => true]); ?>

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
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/bank_accounts/_form.blade.php ENDPATH**/ ?>