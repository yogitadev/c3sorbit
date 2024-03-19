<?php $__env->startSection('page_title', 'Forget Password'); ?>


<?php $__env->startSection('content'); ?>

    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

        <?php echo Form::open(['class' => 'form w-100', 'id' => 'kt_sign_in_form', 'autocomplete' => 'off', 'data-parsley-validate' => true]); ?>


        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">Forget Password <?php echo e(config('env.app_name')); ?></h1>
        </div>
        <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label required fw-bolder text-dark fs-6 mb-0">Email</label>
            </div>
            <?php echo Form::text('email', null, ['class' => 'form-control form-control-lg form-control-solid', 'autocomplete' => 'off', 'required' => true, 'autofocus' => true]); ?>

        </div>

        <div class="text-center">

            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Send Password Reset Link</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <?php echo Form::close(); ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/auth/login/forget_password.blade.php ENDPATH**/ ?>