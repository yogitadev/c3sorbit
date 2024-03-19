<h3 class="mb-5">Job Details : </h3>
<div class="row">
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
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Type</label>
        <?php echo Form::select('type_id', $type_list, null, [
            'class' => 'form-select',
            'id' => 'parent_type_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select type',
            'data-parsley-errors-container' => '#type-error',
        ]); ?>

        <div id="type-error"></div>
    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Job StartDate </label>
        <?php echo Form::date('job_start_date', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Qualification</label>
        <?php echo Form::select('qualification_id', $qualification_list, null, [
            'class' => 'form-select',
            'id' => 'parent_qualification_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select qualification',
            'data-parsley-errors-container' => '#qualification-error',
        ]); ?>

        <div id="qualification-error"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Designation </label>
        <?php echo Form::select('designation_id', $designation_list, null, [
            'class' => 'form-select',
            'id' => 'parent_designation_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select designation',
            'data-parsley-errors-container' => '#designation-error',
        ]); ?>

        <div id="designation-error"></div>
    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Department</label>
        <?php echo Form::select('department_id', $department_list, null, [
            'class' => 'form-select',
            'id' => 'parent_department_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select department',
            'data-parsley-errors-container' => '#department-error',
        ]); ?>

        <div id="department-error"></div>
    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">JobType</label>
        <?php echo Form::select('job_type_id', $job_type_list, null, [
            'class' => 'form-select',
            'id' => 'parent_job_type_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select job type',
            'data-parsley-errors-container' => '#job-type-error',
        ]); ?>

        <div id="job-type-error"></div>
    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label fs-6 required">Interviewer </label>
        <?php echo Form::select('interviewer', ['Yes' => 'Yes', 'No' => 'No'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label fs-6 ">Region </label>
        <?php echo Form::select('region_id', $region_list, null, [
            'class' => 'form-select',
            'id' => 'parent_region_id',
            'data-control' => 'select2',
            'placeholder' => 'Please select region',
            'data-parsley-errors-container' => '#region-error',
        ]); ?>

    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Personal Details : </h3>
<div class="row">
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">First Name</label>
        <?php echo Form::text('first_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Last Name</label>
        <?php echo Form::text('last_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label fs-6 required">Gender </label>
        <?php echo Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Date Of Birth </label>
        <?php echo Form::date('dob', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Passport No / Social Security No</label>
        <?php echo Form::text('passport_no', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Nationality</label>
        <?php echo Form::select('nationality_id', $country_list, null, [
            'class' => 'form-select',
            'id' => 'parent_nationality_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select nationality',
            'data-parsley-errors-container' => '#nationality-error',
        ]); ?>

        <div id="nationality-error"></div>
    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Contact Details :</h3>
<div class="row">
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Email Address</label>
        <?php echo Form::text('email', null, ['class' => isset($item) && !is_null($item->email) ? 'form-control bg-light' : 'form-control', 'required' => true,'readonly' => isset($item) && !is_null($item->email) ? true : false]); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Mobile</label>
        <?php echo Form::text('mobile_no', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Phone</label>
        <?php echo Form::text('phone_no', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Home Address : </h3>
<div class="row">
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Country</label>
        <?php echo Form::select('home_country_id', $country_list, null, [
            'class' => 'form-select',
            'id' => 'parent_home_country_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select country',
            'data-parsley-errors-container' => '#country-error',
        ]); ?>

        <div id="country-error"></div>
    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">State</label>
        <?php echo Form::select('home_state_id', $state_list, null, [
            'class' => 'form-select',
            'id' => 'parent_home_state_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select state',
            'data-parsley-errors-container' => '#state-error',
        ]); ?>

        <div id="state-error"></div>
    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">City</label>
        <?php echo Form::select('home_city_id', $city_list, null, [
            'class' => 'form-select',
            'id' => 'parent_home_city_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select city',
            'data-parsley-errors-container' => '#city-error',
        ]); ?>

        <div id="city-error"></div>
    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label fs-6">Street 1</label>
        <?php echo Form::text('home_street_1', null, ['class' => 'form-control']); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label fs-6">Street 2</label>
        <?php echo Form::text('home_street_2', null, ['class' => 'form-control']); ?>

    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Current Address : </h3>
<div class="row">
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Country</label>
        <?php echo Form::select('current_country_id', $country_list, null, [
            'class' => 'form-select',
            'id' => 'parent_current_country_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select country',
            'data-parsley-errors-container' => '#country-error',
        ]); ?>

        <div id="country-error"></div>
    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">State</label>
        <?php echo Form::select('current_state_id', $state_list, null, [
            'class' => 'form-select',
            'id' => 'parent_current_state_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select state',
            'data-parsley-errors-container' => '#state-error',
        ]); ?>

        <div id="state-error"></div>
    </div>
    <div class="col-md-3 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">City</label>
        <?php echo Form::select('current_city_id', $city_list, null, [
            'class' => 'form-select',
            'id' => 'parent_current_city_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select city',
            'data-parsley-errors-container' => '#city-error',
        ]); ?>

        <div id="city-error"></div>
    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label fs-6">Street 1</label>
        <?php echo Form::text('current_street_1', null, ['class' => 'form-control']); ?>

    </div>
    <div class="col-md-3 mb-5">
        <label class="form-label fs-6">Street 2</label>
        <?php echo Form::text('current_street_2', null, ['class' => 'form-control']); ?>

    </div>
</div>
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
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Upload Signature</label>
        <?php echo Form::file('media', ['class' => 'form-control','accept' => '.png, .jpg, .jpeg, .pdf']); ?>


        <?php if(isset($item) && !is_null($item) && !is_null($item->media)): ?>
                <?php if($item->media->file_extension == 'pdf'): ?>
                    <a href="<?php echo e($item->media->getUrl()); ?>" target="_blank">
                        Click to view
                    </a>
                <?php else: ?>
                    <div class="thumb">
                        <a data-fancybox href="<?php echo e($item->media->getUrl()); ?>">
                            <img src="<?php echo e($item->media->fitThumbUrl()); ?>" class="img-thumbnail" class="clearfix" />
                        </a>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
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

<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/iam/personnel/_form.blade.php ENDPATH**/ ?>