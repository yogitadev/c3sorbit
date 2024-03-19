<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
    <i class="fab fa-readme"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">9/10</span></div>
        <h3>Remarks</h3>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::model($item, ['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>

    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="form-label fs-6">Remarks</label>
            <?php echo Form::textarea('remark', null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5 position-relative select-2-field">
        <label class="form-label required fs-6">Prefered Program</label>
            <?php echo Form::select('programcode_id', $program_list, null, [
                'class' => 'form-select',
                'id' => 'parent_programcode_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select preferred program',
                'data-parsley-errors-container' => '#program-error',
            ]); ?>

            <div id="program-error"></div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4 mb-5 position-relative select-2-field">
            <label class="form-label required fs-6">Intake</label>
            <?php echo Form::select('intake_id', $intake_list, null, [
                'class' => 'form-select',
                'id' => 'parent_intake_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select intake',
                'data-parsley-errors-container' => '#intake-error',
            ]); ?>

            <div id="intake-error"></div>
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('application-attachment', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_remark.blade.php ENDPATH**/ ?>