<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Admin Type</label>
        <?php echo Form::select('admin_type', ['Super Admin' => 'Super Admin', 'Admin' => 'Admin'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
    
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Role</label>
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
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">First Name</label>
        <?php echo Form::text('first_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Last Name</label>
        <?php echo Form::text('last_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Email</label>
        <?php echo Form::text('email', null, ['class' => isset($item) && !is_null($item->email) ? 'form-control bg-light' : 'form-control', 'required' => true,'readonly' => isset($item) && !is_null($item->email) ? true : false]); ?>

    </div>
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

<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Status</label>
        <?php echo Form::select('status', ['Pending' => 'Pending', 'Active' => 'Active', 'Inactive' => 'Inactive', 'Deleted' => 'Deleted'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
</div>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/profession/users/_form.blade.php ENDPATH**/ ?>