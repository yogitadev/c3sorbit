<div class="row">
    <div class="col-md-6 mb-5">
        <label class="radio inline">
            <?php echo Form ::radio('type','Country',true,['class' => 'form_control']); ?>

            Country 
        </label>
        <label class="radio inline">
            <?php echo Form ::radio('type','Region',false,['class' => 'form_control']); ?>

                Region
        </label>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Intake</label>
        <?php echo Form::select('intake_id', $intake_list, null, [
            'class' => 'form-select',
            'id' => 'parent_intake_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Intake',
            'data-parsley-errors-container' => '#intake-error',
        ]); ?>

        <div id="country-error"></div>
    </div>
    <div class="col-md-6 mb-5 position-relative select-2-field hidecountry">
        <label class="form-label fs-6 required">Country</label>
        <?php echo Form::select('country_id', $country_list, null, [
            'class' => 'form-select hidecountryattr',
            'id' => 'parent_country_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select country',
            'data-parsley-errors-container' => '#country-error',
        ]); ?>

        <div id="country-error"></div>
    </div>
    <div class="col-md-6 mb-5 position-relative select-2-field hideregion">
        <label class="form-label fs-6 required">Region</label>
        <?php echo Form::select('region_id', $region_list, null, [
            'class' => 'form-select hideregionattr',
            'id' => 'parent_region_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select region',
            'data-parsley-errors-container' => '#region-error',
        ]); ?>

        <div id="region-error"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Employee</label>
        <?php echo Form::select('employee_id', $employee_list, null, [
            'class' => 'form-select',
            'id' => 'parent_employee_id',
            'required' => false,
            'data-control' => 'select2',
            'placeholder' => 'Please select employee',
            'data-parsley-errors-container' => '#employee-error',
        ]); ?>

        <div id="employee-error"></div>
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Enter your target</label>
        <?php echo Form::text('target_name', null, ['class' => 'form-control', 'required' => true]); ?>

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
        $(document).ready(function(){
            var radios = $('input:radio[name=type]').val();
        
            if(radios == 'Country') {
                $('.hideregion').hide();
                $('.hideregionattr').attr('required',false);
                $('.hidecountry').show();
                $('.hidecountryattr').attr("required", true);
            } else {
                $('.hidecountry').hide();
                $('.hidecountryattr').attr('required',false);
                $('.hideregion').show();
                $('.hideregionattr').attr("required", true);
            }
        
            $("input[name='type']").on("click", function() {
                var val = $(this).val();
                if(val == "Country") {
                    $('.hideregion').hide();
                    $('.hideregionattr').attr('required',false);
                    $('.hidecountry').show();
                    $('.hidecountryattr').attr("required", true);
                } else {
                    $('.hidecountry').hide();
                    $('.hidecountryattr').attr('required',false);
                    $('.hideregion').show();
                    $('.hideregionattr').attr("required", true);
                }
            });

            var js_array =<?php if(isset($item)){echo json_encode($item);}?>;
    
            if(js_array['type'] == 'Region') {
                $('.hidecountry').hide();
                $('.hidecountryattr').attr('required',false);
                $('.hideregion').show();
                $('.hideregionattr').attr("required", true);
            } else {
                $('.hideregion').hide();
                $('.hideregionattr').attr('required',false);
                $('.hidecountry').show();
                $('.hidecountryattr').attr("required", true);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/target_managers/_form.blade.php ENDPATH**/ ?>