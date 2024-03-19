<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
    <i class="fas fa-money-check-alt"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">7/10</span></div>
        <h3>Financial Resources</h3>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::model($item, ['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>

    
    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="form-label required fs-6">Who is going to sponsor your studies?</label>
            <?php echo Form::text('sponsor_name', null, ['class' => 'form-control','required' => 'true']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="form-label required fs-6">What are your financial sponsors (parent’s) occupation?</label>
            <?php echo Form::text('sponsor_occupation', null, ['class' => 'form-control','required' => 'true']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <h4 class="title" for="">Are you applying for visa from home country ?</h4>
            <label class="radio inline">
                <?php echo Form ::radio('is_visa_home_country','Yes',true,['class' => 'form_control']); ?>

                Yes 
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('is_visa_home_country','No',false,['class' => 'form_control']); ?>

                    No
            </label>
        </div>
    </div>
    <div class="hidediv">
        <div class="row">
            <div class="col-md-6 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">Country</label>
                <?php echo Form::select('visa_country_id', $country_list, null, [
                    'class' => 'form-select hideattr',
                    'id' => 'parent_visa_country_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select country',
                    'data-parsley-errors-container' => '#country-error',
                ]); ?>

                <div id="country-error"></div>
            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label fs-6 required">Vista Status</label>
                    <?php echo Form::select('vista_status', ['Student Visa' => 'Student Visa', 'Visitor Visa' => 'Visitor Visa', 'Work Permit' => 'Work Permit', 'Residence' => 'Residence', 'Asylum' => 'Asylum'], null, [
                        'class' => 'form-select hideattr',
                        'required' => true,
                    ]); ?>

            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('application-location', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            $("input[name='is_visa_home_country']").on("click", function() {
                var val = $(this).val();
                if(val == "Yes") {
                    $('.hidediv').hide();
                    $('.hideattr').attr("required", false);
                } else {
                    $('.hidediv').show();
                    $('.hideattr').attr("required", true);
                }
            });
            var arr = <?php echo json_encode($item);?>;
            if(arr['is_visa_home_country'] == "Yes") {
                $('.hidediv').hide();
                $('.hideattr').attr("required", false);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_financial.blade.php ENDPATH**/ ?>