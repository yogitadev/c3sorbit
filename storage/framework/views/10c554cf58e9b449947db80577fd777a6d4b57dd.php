<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
    <i class="fas fa-file-upload"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">8/10</span></div>
        <h3>Attachments</h3>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::model($item, ['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true]); ?>


    <?php if($item->has_passport == "Yes"): ?>
        <div class="row">
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-3">Passport Front</label>
                    <?php echo Form::file('passport_front', ['class' => 'form-control','name' => 'passport_front','required' => 'true']); ?>

            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-3">Passport Back</label>
                    <?php echo Form::file('passport_back', ['class' => 'form-control','name' => 'passport_back','required' => 'true']); ?>

            </div>
        </div>
    <?php endif; ?>
    <?php if($item->has_passport == "No" && $item->applied_passport == "Yes"): ?>
        <div class="row">
            <div class="col-md-12 mb-5">
                <label class="form-label required fs-3">Passport Application Conformation</label>
                    <?php echo Form::file('passport_application_conformation', ['class' => 'form-control','name' => 'passport_application_conformation','required' => 'true']); ?>

            </div>
        </div>
    <?php endif; ?>
    <?php if($item->eng_test_taken == "Yes"): ?>
       <div class="col-md-12 mb-5">
            <label class="form-label required fs-3">English Proficiency Doc</label>
                <?php echo Form::file('ep_doc', ['class' => 'form-control','name' => 'ep_doc','required' => 'true']); ?>

        </div>
        </div><div class="row">
     
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="form-label required fs-3">Visa Copy</label>
                <?php echo Form::file('visa_copy', ['class' => 'form-control','name' => 'visa_copy','required' => 'true']); ?>

        </div>
    </div>
    <?php if(count($education_list) > 0): ?>
        <div class="row">
            <?php $__currentLoopData = $education_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-5">
                    <label class="form-label required fs-3"><?php echo e($education); ?></label>
                        <?php echo Form::file($education, ['class' => 'form-control','name' => $education,'required' => 'true']); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <?php if(count($employment_history_list) > 0): ?>
        <div class="row">
            <?php $__currentLoopData = $employment_history_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-5">
                    <label class="form-label required fs-3"><?php echo e($history); ?></label>
                        <?php echo Form::file($history, ['class' => 'form-control','name' => $history,'required' => 'true']); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('application-financial', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_attachment.blade.php ENDPATH**/ ?>