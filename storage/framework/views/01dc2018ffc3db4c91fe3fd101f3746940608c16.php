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

    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Mode</label>
        <?php echo Form::select('mode_id', $mode_list, null, [
            'class' => 'form-select',
            'id' => 'parent_mode_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select mode',
            'data-parsley-errors-container' => '#mode-error',
        ]); ?>

        <div id="mode-error"></div>
    </div>

    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Campaign Id</label>
        <?php echo Form::select('campaign_id', $campaign_list, null, [
            'class' => 'form-select',
            'id' => 'parent_campaign_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select campaign',
            'data-parsley-errors-container' => '#campaign-error',
        ]); ?>

        <div id="campaign-error"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Lead Date</label>
        <?php echo Form::date('lead_date', null, ['class' => 'form-control','required' => 'true']); ?>


    </div>
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Lead Time</label>
        <?php echo Form::time('lead_time', null, ['class' => 'form-control','required' => 'true']); ?>


    </div>
</div>
<div class="separator my-5"></div>

<h3 class="mb-5">Information</h3>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Student Name</label>
        <?php echo Form::text('name', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5 position-relative select-2-field">
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
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Country ISD Code </label>
        <?php echo Form::text('country_code', null, ['id' => 'country_code','required' => 'true','readonly' => isset($item) && !is_null($item->country_code) ? true : false, 'class' => isset($item) && !is_null($item->country_code) ? 'form-control bg-light' : 'form-control']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Mobile Number </label>
        <?php echo Form::text('mobile_number', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Email Id</label>
        <?php echo Form::text('email_id', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
</div>

<div class="separator my-5"></div>
<h3 class="mb-5">Applying For</h3>

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
        <label class="form-label required fs-6">Campus</label>
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
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label required fs-6">Program Applied for</label>
        <?php echo Form::select('programcode_id', $programcode_list, null, [
            'class' => 'form-select',
            'id' => 'parent_programcode_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select programcode',
            'data-parsley-errors-container' => '#programcode-error',
        ]); ?>

        <div id="programcode-error"></div>
    </div>
</div>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document.body).on("change","#parent_platform_id",function(){
            var platform_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('student-list')); ?>'+'?platform=true&platform_id='+platform_id,
                    
                    success: function(e) {
                        console.log(e);
                        $('#parent_mode_id')
                            .find("option").remove().end().append($('<option value = "">Please select mode</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_mode_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    },
                });
        });
        $(document.body).on("change","#parent_country_id",function(){
            var country_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('student-list')); ?>'+'?country=true&country_id='+country_id,
                    
                    success: function(e) {
                        $('#country_code').addClass("bg-light").attr("readonly", true).val(e);
                    },
                });
        });
        $(document.body).on("change","#parent_institution_id",function(){
            var insti_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('student-list')); ?>'+'?institute=true&institution_id='+insti_id,
                    
                    success: function(e) {
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
        $(document.body).on("change","#parent_campus_id",function(){
            var campus_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('student-list')); ?>'+'?campus=true&campus_id='+campus_id,
                    
                    success: function(e) {
                        $('#parent_programcode_id')
                            .find("option").remove().end().append($('<option value = "">Please select programcode</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_programcode_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    },
                });
        });
        
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/_form.blade.php ENDPATH**/ ?>