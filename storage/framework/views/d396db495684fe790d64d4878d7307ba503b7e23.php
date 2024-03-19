<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
    <i class="fas fa-address-card"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">5/10</span></div>
        <h3>Contact Details</h3>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::model($item, ['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>


    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="form-label required fs-6">Email</label>
                <?php echo Form::text('email_id', null, ['class' => 'form-control','required' => 'true']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <label class="form-label fs-6">Skype ID</label>
            <?php echo Form::text('skype_id', null, ['class' => 'form-control']); ?> 
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label required fs-6">Mobile</label>
            <?php echo Form::number('mobile_no', null, ['class' => 'form-control','required' => 'true']); ?> 
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('application-employment-history', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_contact.blade.php ENDPATH**/ ?>