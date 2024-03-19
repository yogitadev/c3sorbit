<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
    <i class="fas fa-map-marker-alt"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">6/10</span></div>
        <h3>Location</h3>
    </div>
</div>   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::model($item, ['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>

    <div class="row">
        <div class="col-md-12 mb-5">
            <?php echo Form::checkbox('same_passport_add', null,false,['class' => 'form-check-input', 'id' => 'same_passport_add']); ?>

                <label class="form-label fs-6">  	Same As Passport Address</label>

        </div>
    </div>
    <div class="hidediv">
        <div class="row">
            <div class="col-md-12 mb-5">
                <label class="form-label required fs-6">Street 1</label>
                <?php echo Form::text('location_street1', null, ['class' => 'form-control hideattr','required' => 'true']); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">Country</label>
                <?php echo Form::select('location_country_id', $country_list, null, [
                    'class' => 'form-select hideattr',
                    'id' => 'parent_location_country_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select country',
                    'data-parsley-errors-container' => '#country-error',
                ]); ?>

                <div id="country-error"></div>
            </div>
            <div class="col-md-4 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">State</label>
                <?php echo Form::select('location_state_id', $state_list, null, [
                    'class' => 'form-select hideattr',
                    'id' => 'parent_location_state_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select state',
                    'data-parsley-errors-container' => '#state-error',
                ]); ?>

                <div id="state-error"></div>
            </div>
            <div class="col-md-4 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">City</label>
                <?php echo Form::select('location_city_id', $city_list, null, [
                    'class' => 'form-select hideattr',
                    'id' => 'parent_location_city_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select city',
                    'data-parsley-errors-container' => '#city-error',
                ]); ?>

                <div id="city-error"></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('application-contact', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
$(function() {
    $(document.body).on("change","#parent_location_country_id",function(){
        var location_country_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('application-location',['unique_id' => $unique_id])); ?>'+'?location_country_id='+location_country_id,
                success: function(e) {
                    $('#parent_location_state_id')
                        .find("option").remove().end().append($('<option value = "">Please select state</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_location_state_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $(document.body).on("change","#parent_location_state_id",function(){
        var location_state_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('application-location',['unique_id' => $unique_id])); ?>'+'?location_state_id='+location_state_id,
                
                success: function(e) {
                    $('#parent_location_city_id')
                        .find("option").remove().end().append($('<option value = "">Please select city</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_location_city_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $("input[name='same_passport_add']").on("click", function() {
        var val = $(this).prop('checked');
        if(val == true) {
            $('.hidediv').hide();
            $('.hideattr').attr("required", false);
        } else {
            $('.hidediv').show();
            $('.hideattr').attr("required", true);
        }
    });
    var arr = <?php echo json_encode($item);?>;
    if(arr['same_passport_add'] == "ON") {
        $("input[name='same_passport_add']").prop('checked',true);
        $('.hidediv').hide();
        $('.hideattr').attr("required", false);
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_location.blade.php ENDPATH**/ ?>