<div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Login Role </label>
        <?php echo Form::select('role_id', $role_list, null, [
            'class' => 'form-select',
            'id' => 'parent_role_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select role',
            'data-parsley-errors-container' => '#role-error',
        ]); ?>

        <div id="role-error"></div>
    </div>
<h3 class="mb-5">Personal Details : </h3>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">First Name</label>
        <?php echo Form::text('first_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Last Name</label>
        <?php echo Form::text('last_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Contact Details :</h3>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Email Address</label>
        <?php echo Form::text('email', null, ['class' => isset($item) && !is_null($item->email) ? 'form-control bg-light' : 'form-control', 'required' => true,'readonly' => isset($item) && !is_null($item->email) ? true : false]); ?>

    </div>
</div>
<div class="separator my-5"></div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">User Name</label>
        <?php echo Form::text('username', null, ['class' => isset($item) && !is_null($item->email) ? 'form-control bg-light' : 'form-control', 'required' => true, 'readonly' => isset($item) && !is_null($item->username) ? true : false]); ?>

    </div>
    <?php if(!isset($item)): ?>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Password</label>
        <?php echo Form::text('password', null , ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <?php endif; ?>
</div>


<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/iam/personnel/_form.blade.php ENDPATH**/ ?>