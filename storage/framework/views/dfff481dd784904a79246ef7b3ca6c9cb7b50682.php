<h2 class="mb-5"><?php echo e($student_data->title ?? ''); ?> <?php echo e($student_data->first_name  ?? ''); ?> <?php echo e($student_data->last_name ?? '-'); ?> | COL REQUEST | <?php echo e($student_data->programcode->program_code ?? '-'); ?></h2>
<div class="row">
    <div class="col-md-12 mb-5">
        <p class="text-danger text-decoration-underline">
            OrbitTip#10
        </p>
        <p class="text-danger">
            If this student is already enrolled the current status is Enrolled/Enrolled with Outstanding.<br>
            You might be able to process the OL Request, but compliance team will not be able to produces the next level offer letter till the time the renewal is not processed via Orbit.
        </p>
        <p class="text-danger">
        Else if the student is enrolling for DL5 from the beginning, then please choose DL4 and mention your requirement in Comment section that you.. "need DL5 OL directly as this is the fresh student directly applying to DL5"
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Course</label>
        <?php echo Form::select('course_id', $programcode_list, null, [
            'class' => 'form-select',
            'id' => 'parent_course_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select program code',
            'data-parsley-errors-container' => '#programcode-error',
        ]); ?>

        <div id="programcode-error"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Admission Year</label>
        <?php $year = (int) filter_var($student_data->intake->name, FILTER_SANITIZE_NUMBER_INT);
        ?>
        <?php echo Form::text('year', $year, ['class' => 'form-control','readonly'=>true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <?php $month = preg_replace('/[^a-zA-Z\s]/', '', $student_data->intake->name);?>
        <label class="form-label fs-6">Intake </label>
        <?php echo Form::text('month', $month, ['class' => 'form-control','readonly'=>true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label  fs-6">Discount (<i class="fas fa-euro-sign"></i>)</label>
        <?php echo Form::text('discount', null, ['class' => 'form-control','placeholder' => 0]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label class="form-label fs-6">Remarks </label>
        <?php echo Form::textarea('remarks', null, ['class' => 'form-control']); ?>

    </div>
</div>
    


<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/screen_management/processes/_form.blade.php ENDPATH**/ ?>