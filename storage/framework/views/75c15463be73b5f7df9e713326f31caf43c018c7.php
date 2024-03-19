<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
        <i class="fas fa-flag-usa"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">2/10</span></div>
        <h3>English Preficiency</h3>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::model($item,['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>


    <div class="row">
        <div class="col-md-6 mb-5">
            <label class="form-label fs-6">English Proficiency test taken?</label>
            <label class="radio inline">
                <?php echo Form ::radio('eng_test_taken','Yes',true,['class' => 'form_control']); ?>

                Yes 
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('eng_test_taken','No',false,['class' => 'form_control']); ?>

                    No
            </label>
        </div>
    </div>
    <div class="row hidediv ">
        <div class="col-md-6 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">Test Name</label>
            <?php echo Form::select('testname_id', $testname_list, null, [
                'class' => 'form-select hideattr',
                'id' => 'parent_testname_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select test name',
                'data-parsley-errors-container' => '#test-name-error',
            ]); ?>

            <div id="test-name-error"></div>
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label required fs-6">Test Date</label>
                <?php echo Form::date('test_date', null, ['class' => 'form-control hideattr','required' => 'true']); ?>

        </div>
    </div>
    <div class="row hidediv ">
        <div class="col-md-2 mb-5">
            <label class="form-label required fs-6">L</label>
            <?php echo Form::number('l', null, ['class' => 'form-control hideattr', 'required' => 'true', 'step' => 'any']); ?> 
        </div>
        <div class="col-md-2 mb-5">
            <label class="form-label required fs-6">R</label>
            <?php echo Form::number('r', null, ['class' => 'form-control hideattr','required' => 'true','step' => 'any']); ?> 
        </div>
        <div class="col-md-2 mb-5">
            <label class="form-label required fs-6">W</label>
            <?php echo Form::number('w', null, ['class' => 'form-control hideattr','required' => 'true','step' => 'any']); ?> 
        </div>
        <div class="col-md-2 mb-5">
            <label class="form-label required fs-6">S</label>
            <?php echo Form::number('s', null, ['class' => 'form-control hideattr','required' => 'true','step' => 'any']); ?> 
        </div>
        <div class="col-md-3 mb-5">
            <label class="form-label required fs-6">Overall</label>
            <?php echo Form::number('overall', null, ['class' => 'form-control hideattr','required' => 'true','step' => 'any']); ?> 
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('student-application', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            $("input[name='eng_test_taken']").on("click", function() {
                var val = $(this).val();
                if(val == "No") {
                    $('.hidediv').hide();
                    $('.hideattr').attr("required", false);
                } else {
                    $('.hidediv').show();
                    $('.hideattr').attr("required", true);
                }
            });
            var arr = <?php echo json_encode($item);?>;
            if(arr['eng_test_taken'] == "No") {
                $('.hidediv').hide();
                $('.hideattr').attr("required", false); 
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/english_proficiency.blade.php ENDPATH**/ ?>