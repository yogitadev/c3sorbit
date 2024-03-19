<?php $__env->startSection('page_title', 'Lead Vista'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Students' => route('student-list'),
        $item->unqiue_id => '',
        'Edit' => '',
    ];
    ?>
    <?php echo $__env->make('front.layouts.sub_header', [
        'title' => 'Lead Vista',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('front.lead_management.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Lead Vista</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="<?php echo e(route('student-list')); ?>" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="card-body border-top p-9">
            <?php echo $__env->make('front.lead_management.students.lead_vista._student_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card-toolbar">
                <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-content">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.update_vista')): ?>
                    <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._update_vista', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_status')): ?>
                    <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._vista_status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.get_application')): ?>
                    <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._get_application', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_record')): ?>
                    <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._vista_records', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_attachment')): ?>
                    <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._vista_attachment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.application_document')): ?>
                    <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._application_document', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.vista_history')): ?>
                    <?php echo $__env->make('front.lead_management.students.lead_vista.tabs._vista_history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista.blade.php ENDPATH**/ ?>