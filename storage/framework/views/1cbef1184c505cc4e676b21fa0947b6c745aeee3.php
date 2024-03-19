<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
        <i class="fas fa-user fa-lg"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">1/10</span></div>
        <h3>Personal Information</h3>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::model($item,['method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>

    <div class="row">
        <div class="col-md-6 mb-5">

            <label class="form-label required fs-6">Have you entered EU before?</label>
            <?php echo Form::select('entered_eu_before', ['No' => 'No', 'Yes' => 'Yes'], null, [
                'class' => 'form-select',
                'required' => true,
            ]); ?>


        </div>
        <div class="col-md-6 mb-5">

            <label class="form-label required fs-6">Previously Enrolled At C3S?</label>
            <?php echo Form::select('pre_enroll', ['No' => 'No', 'Yes' => 'Yes'], null, [
                'class' => 'form-select',
                'required' => true,
            ]); ?>


        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">

            <label class="form-label fs-6">Do You have passport?</label>
            <label class="radio inline">
                <?php echo Form ::radio('has_passport','Yes',true,['class' => 'form_control']); ?>

                Yes 
            </label>
                <label class="radio inline">
                    <?php echo Form ::radio('has_passport','No',false,['class' => 'form_control']); ?>

                    No
                </label>

        </div>
    </div>
    <div class="row nopassport">
        <div class="col-md-6 mb-5">
            <label class="radio inline">
                <?php echo Form ::radio('applied_passport','Yes',true,['class' => 'form_control']); ?>

                I've Applied for Passport 
            </label>
                <label class="radio inline">
                    <?php echo Form ::radio('applied_passport','No',false,['class' => 'form_control']); ?>

                    I will apply for passport
                </label>

        </div>
    </div>
    <div class="row hidediv">
        <div class="col-md-12 mb-5">
            <label class="form-label required fs-6">Passport number</label>
            <?php echo Form::text('passport_number', null, ['class' => 'form-control hideattr','required' => 'true']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-5">
            <label class="form-label required fs-6">Title</label>
            <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => 'true']); ?>

        </div>
        <div class="col-md-4 mb-5">
            <label class="form-label required fs-6">First Name</label>
            <?php echo Form::text('first_name', null, ['class' => 'form-control','required' => 'true']); ?>

        </div>
        <div class="col-md-4 mb-5">
            <label class="form-label fs-6">Last Name</label>
            <?php echo Form::text('last_name', null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-5">
            <label class="form-label required fs-6">Date of Birth</label>
            <?php echo Form::date('dob', null, ['class' => 'form-control','required' => 'true']); ?>

        </div>
        <div class="col-md-3 mb-5">
            <label class="form-label required fs-6">Gender</label>
            <?php echo Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, [
                'class' => 'form-select',
                'required' => true,
            ]); ?>

        </div>
        <div class="col-md-3 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">Country Of Birth</label>
            <?php echo Form::select('birth_country_id', $country_list, null, [
                'class' => 'form-select',
                'id' => 'parent_birth_country_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select country of birth',
                'data-parsley-errors-container' => '#birth-country-error',
            ]); ?>

            <div id="birth-country-error"></div>
        </div>
        <div class="col-md-3 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">Nationality</label>
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
    <div class="row">
        <div class="col-md-4 mb-5">
            <label class="form-label fs-6">National ID No/Citizenship</label>
            <?php echo Form::text('citizenship', null, ['class' => 'form-control']); ?>

        </div>
        <div class="col-md-4 mb-5">
            <label class="form-label required fs-6">Country Of Issue</label>
            <?php echo Form::select('country_issue_id', $country_list, null, [
                'class' => 'form-select',
                'id' => 'parent_country_issue_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select country of issue',
                'data-parsley-errors-container' => '#country-issue-error',
            ]); ?>

            <div id="country-issue-error"></div>

        </div>
        <div class="col-md-4 mb-5">
            <label class="form-label required fs-6">Valid Till</label>
                <?php echo Form::date('vaild_till', null, ['class' => 'form-control','required' => 'true']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="form-label required fs-6">Street 1</label>
            <?php echo Form::text('street_1', null, ['class' => 'form-control','required' => 'true']); ?> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-5 position-relative select-2-field">
        <label class="form-label required fs-6">Country</label>
            <?php echo Form::select('country_id', $country_list, null, [
                'class' => 'form-select',
                'id' => 'parent_country_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select country',
                'data-parsley-errors-container' => '#country-error',
            ]); ?>

            <div id="country-error"></div>
        </div>
        <div class="col-md-4 mb-5 position-relative select-2-field">
        <label class="form-label required fs-6">State</label>
            <?php echo Form::select('state_id', $state_list, null, [
                'class' => 'form-select',
                'id' => 'parent_state_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select state',
                'data-parsley-errors-container' => '#state-error',
            ]); ?>

            <div id="state-error"></div>
        </div>
        <div class="col-md-4 mb-5 position-relative select-2-field">
        <label class="form-label required fs-6">City</label>
            <?php echo Form::select('city_id', $city_list, null, [
                'class' => 'form-select',
                'id' => 'parent_city_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select city',
                'data-parsley-errors-container' => '#city-error',
            ]); ?>

            <div id="city-error"></div>
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
$(function() {
    $(document.body).on("change","#parent_country_id",function(){
        var country_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('student-application',['unique_id' => $unique_id])); ?>'+'?country_id='+country_id,
                success: function(e) {
                    $('#parent_state_id')
                        .find("option").remove().end().append($('<option value = "">Please select state</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_state_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $(document.body).on("change","#parent_state_id",function(){
        var state_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('student-application',['unique_id' => $unique_id])); ?>'+'?state_id='+state_id,
                
                success: function(e) {
                    $('#parent_city_id')
                        .find("option").remove().end().append($('<option value = "">Please select city</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_city_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $(document).ready(function(){
        $("input[name='has_passport']").on("click", function() {
            var val = $(this).val();
            if(val == "No") {
                $('.hidediv').hide();
                $('.hideattr').attr("required", false);
                $('.nopassport').show();
            } else {
                $('.hidediv').show();
                $('.hideattr').attr("required", true);
                $('.nopassport').hide();
            }
        });
        var arr = <?php echo json_encode($item);?>;
        if(arr != null && arr['has_passport'] == "No") {
            $('.hidediv').hide();
            $('.hideattr').attr("required", false);
            $('.nopassport').show();
        }
        if(arr != null && arr['has_passport'] == "Yes") {
            $('.hidediv').show();
            $('.hideattr').attr("required", true);
            $('.nopassport').hide();
        }
        if(arr == null) {
            $('<input>').attr({ type: 'hidden', id: 'action', name: 'action'}).appendTo('form').val('add');
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/student_application.blade.php ENDPATH**/ ?>