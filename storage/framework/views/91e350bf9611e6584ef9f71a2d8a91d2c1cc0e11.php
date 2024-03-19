<div class="row">
    <div class="col-md-12 mb-5">
        <h4 class="">Email Notificaion: </h4>
        <?php echo Form::checkbox('student_notification', null,false,['class' => 'form-check-input', 'id' => 'student_notification']); ?>

            <label class="form-label fs-6">  Student</label>
        <br>
        <?php echo Form::checkbox('sales_notification', null,false,['class' => 'form-check-input', 'id' => 'sales_notification']); ?>

            <label class="form-label fs-6">  Sales</label>
        <br>
        <?php echo Form::checkbox('agent_notification', null,false,['class' => 'form-check-input', 'id' => 'agent_notification']); ?>

            <label class="form-label fs-6">  Agent</label>
        <br>
    </div>
</div>
<input type="hidden" name="action" value='e-stamp'>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/visa_letters/_form_estamp.blade.php ENDPATH**/ ?>