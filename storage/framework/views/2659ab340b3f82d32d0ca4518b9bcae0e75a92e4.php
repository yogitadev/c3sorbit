<div class="alert alert-danger error">
    <div class="alert-text">
        <p>Please change Interview Date & Interview Time No Interviewer Available.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-5">
        <label class="form-label required fs-6">Interview Date </label>
        <?php echo Form::date('interview_date', null, ['class' => 'form-control','required' => 'true','id' => 'interview_date']); ?>

    </div>
</div>
<div class="maindiv">
    <div class="separator my-5"></div>
    <h3>Available Slot</h3>
    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','8:00',false,['class' => 'form_control']); ?>

                8:00 
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','9:00',false,['class' => 'form_control']); ?>

                    9:00
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','10:00',false,['class' => 'form_control']); ?>

                    10:00
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','11:00',false,['class' => 'form_control']); ?>

                    11:00
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','12:00',false,['class' => 'form_control']); ?>

                    12:00
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','13:00',false,['class' => 'form_control']); ?>

                    13:00
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','14:00',false,['class' => 'form_control']); ?>

                    14:00
            </label>
            <label class="radio inline">
                <?php echo Form ::radio('interview_time','15:00',false,['class' => 'form_control']); ?>

                    15:00
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-5 position-relative select-2-field">
            <label class="form-label fs-6 required">Preference Program</label>
            <?php echo Form::select('preference_course_id', $programcode_list, null, [
                'class' => 'form-select',
                'id' => 'parent_preference_course_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select program code',
                'data-parsley-errors-container' => '#programcode-error',
            ]); ?>

            <div id="programcode-error"></div>
        </div>
        <div class="col-md-4 mb-5 position-relative select-2-field">
            <label class="form-label fs-6 required">Interviewer</label>
            <?php echo Form::select('employee_id', $employee_list, null, [
                'class' => 'form-select',
                'id' => 'parent_employee_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select employee',
                'data-parsley-errors-container' => '#employee-error',
            ]); ?>

            <div id="employee-error"></div>
        </div>
        <div class="col-md-4 mb-5 position-relative select-2-field">
            <label class="form-label fs-6 required">Interview Mode</label>
            <?php echo Form::select('interview_mode_id', $interviewmode_list, null, [
                'class' => 'form-select',
                'id' => 'parent_interview_mode_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select interview mode',
                'data-parsley-errors-container' => '#interviewmode-error',
            ]); ?>

            <div id="interviewmode-error"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <label class="form-label fs-6">Notes</label>
            <?php echo Form::textarea('notes', null, ['class' => 'form-control', 'id' => 'notes']); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <h4 class="">Email Notificaion</h4>
            <?php echo Form::checkbox('student_notification', null,false,['class' => 'form-check-input', 'id' => 'student_notification']); ?>

                <label class="form-label fs-6">  Student</label>
            <?php echo Form::checkbox('employee_notification', null,false,['class' => 'form-check-input', 'id' => 'employee_notification']); ?>

                <label class="form-label fs-6">  Sales</label>
            <?php echo Form::checkbox('consultant_notification', null,false,['class' => 'form-check-input', 'id' => 'consultant_notification']); ?>

                <label class="form-label fs-6">  Agent</label>
            <?php echo Form::checkbox('interviewer_notification', null,false,['class' => 'form-check-input', 'id' => 'interviewer_notification']); ?>

                <label class="form-label fs-6">  Interview</label>
        </div>
    </div>
</div>

<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/screen_management/interviews/_form.blade.php ENDPATH**/ ?>