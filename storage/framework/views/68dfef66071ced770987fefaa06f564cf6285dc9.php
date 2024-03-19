<div class="row">
    
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Institution</label>
        <?php echo Form::select('institution_id', $institution_list, null, [
            'class' => 'form-select',
            'id' => 'parent_institution_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Institution',
            'data-parsley-errors-container' => '#institution-error',
        ]); ?>

        <div id="institution-error"></div>
    </div>

    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Campus</label>
        <?php echo Form::select('campus_id', $campus_list, null, [
            'class' => 'form-select',
            'id' => 'parent_campus_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Campus',
            'data-parsley-errors-container' => '#campus-error',
        ]); ?>

        <div id="campus-error"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Course Name</label>
        <?php echo Form::text('program_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Course Name (Spanish) </label>
        <?php echo Form::text('program_name_spanish', null, ['class' => 'form-control']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Program Code</label>
        <?php echo Form::text('program_code', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Awarding Body </label>
        <?php echo Form::select('awarding_body_id', $awarding_body_list, null, [
            'class' => 'form-select',
            'id' => 'parent_awarding_body_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select awarding body',
            'data-parsley-errors-container' => '#awarding-body-error',
        ]); ?>

        <div id="awarding-body-error"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6 required">Course Duration</label>
        <?php echo Form::select('course_duration', $month_list, null, [
            'class' => 'form-select',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select duration',
            'data-parsley-errors-container' => '#duration-error',
        ]); ?>

        <div id="duration-error"></div>
    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">UK Credit</label>
        <?php echo Form::text('uk_credit', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">ECTS Credit</label>
        <?php echo Form::text('ects_credit', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">English Programme :</h3>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">English Programme </label>
        <?php echo Form::select('eng_program', ['Yes' => 'Yes', 'No' => 'No'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6 required">English Course Duration </label>
        <?php echo Form::select('eng_course_duration', $month_list, null, [
            'class' => 'form-select',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select duration',
            'data-parsley-errors-container' => '#eng-duration-error',
        ]); ?>

        <div id="eng-duration-error"></div>
    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">English Course Fees</label>
        <?php echo Form::text('eng_course_fees', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Course Fee :</h3>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">EU Total Tution Fees </label>
        <?php echo Form::text('eu_tution_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6 required">EU Application Fees </label>
        <?php echo Form::text('eu_app_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">EU Yearly Fees</label>
        <?php echo Form::text('eu_year_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Non-EU Total Tution Fees </label>
        <?php echo Form::text('non_eu_tutuion_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6 required">Non-EU Application Fees </label>
        <?php echo Form::text('non_eu_app_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Non-EU Yearly Fees</label>
        <?php echo Form::text('non_eu_year_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Online Total Tution Fees </label>
        <?php echo Form::text('online_tutuion_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6 required">Online Application Fees </label>
        <?php echo Form::text('online_app_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Online Yearly Fees</label>
        <?php echo Form::text('online_year_fee', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Guide</label>
        <?php echo Form::file('media', ['class' => 'form-control','accept' => '.png, .jpg, .jpeg, .pdf', 'required' => isset($item) && !is_null($item->media) ? false : true ]); ?>


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
        <?php echo Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
</div>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document.body).on("change","#parent_institution_id",function(){
            //console.log(this.value);
            var insti_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('programcode-list')); ?>'+'?institute=true&institution_id='+insti_id,
                    
                    success: function(e) {
                        //console.log(e);

                        $('#parent_campus_id')
                            .find("option").remove().end().append($('<option value = "">Please select Campus</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_campus_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    },
                });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/course/programcodes/_form.blade.php ENDPATH**/ ?>