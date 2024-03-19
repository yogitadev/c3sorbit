<div class="row">
    <div class="col-md-2">
        <span><b>Student Type</b></span><br>
        <span>Non EU</span>
    </div>
    <div class="col-md-2">
        <span><b>Intake</b></span><br>
        <span><?php echo e($student_item->student_application->intake->name ?? '-'); ?></span>
    </div>
    <div class="col-md-2">
        <span><b>Discount (&#8364;)</b></span><br>
        <span>&#8364;<?php echo e($student_item->discount($student_item->id) ?? 0); ?></span>
    </div>
    <div class="col-md-2">
        <span><b>Local</b></span><br>
        <span>No</span>
    </div>
    <div class="col-md-2">
        <span><b>Enrolment type:</b></span><br>
        <span>Fresh Lead</span>
    </div>
    <div class="col-md-2">
        <span><b>Academic Intake:</b></span><br>
        <span>***</span>
    </div>
</div>
<div class="separator my-5"></div>
<div class="row mb-5">
    <div class="col-md-6">
        <b>Student Name: </b> <?php echo e($student_item->name); ?> | <?php echo e($student_item->v_reference_no ?? '-'); ?> | 
        <?php if($student_item->student_col_offer != null ): ?>
            <?php
            if($student_item->student_col_offer->media_id != null)
            $data = $student_item->student_col_offer_archieve;
            $count = count($data);

            $path = \Storage::url('uploads/media/offer_letter/'.$student_item->student_col_offer_archieve[$count-1]->media->original_file_name);
        
            ?>
            <?php if($student_item->student_col_offer->media_id != null) { ?>
                <a href="<?php echo e($path); ?>" target="_blank"> <?php echo e($student_item->programcode->program_name ?? '-'); ?> </a>
            <?php } else { ?>
                -
            <?php } ?>
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <b>Total Fees Paid: </b> Registration: &#8364;<?php echo e($student_item->registrationApprove($student_item->id) ?? 0); ?>, Tution: &#8364;<?php echo e($student_item->tusionApprove($student_item->id) ?? 0); ?>, English Course Fee: &#8364;
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Diploma Program Start Date </label>
        <?php echo Form::date('start_date', null, ['class' => 'form-control', 'required' => true,'min' => date('Y-m-d'), 'id' => 'start_date']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Diploma Program End Date</label>
        <?php echo Form::date('end_date', null, ['class' => 'form-control', 'required' => true, 'id' => 'end_date']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo Form::checkbox('eng_proficiency', null,false,['class' => 'form-check-input', 'id' => 'eng_proficiency']); ?>

            <label class="form-label fs-6">  English Proficiency Letter</label>
        <br>
        <?php echo Form::checkbox('regenerate_ext', null,false,['class' => 'form-check-input', 'id' => 'regenerate_ext']); ?>

            <label class="form-label fs-6">  ReGenerate Extension</label>
        <br>
        <?php echo Form::checkbox('eng_version', null,false,['class' => 'form-check-input', 'id' => 'eng_version']); ?>

            <label class="form-label fs-6">  Generate English Version As Well</label>
        <br>
        <?php echo Form::checkbox('solo_carta', null,false,['class' => 'form-check-input', 'id' => 'solo_carta']); ?>

            <label class="form-label fs-6">  Solo carta de admisión</label>
        <br>
        <?php echo Form::checkbox('carta_rebica', null,false,['class' => 'form-check-input', 'id' => 'carta_rebica']); ?>

            <label class="form-label fs-6">  Carta De Admision + Recibo De Pago</label>
        
    </div>
</div>
<div class="row mb-5">
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Credits</label>
        <?php echo Form::number('credits', null, ['class' => 'form-control']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">ECTS</label>
        <?php echo Form::number('ects', null, ['class' => 'form-control']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-5">
        <h4 class="">Email Notificaion: </h4>
        <?php echo Form::checkbox('student_notification', null,false,['class' => 'form-check-input', 'id' => 'student_notification']); ?>

            <label class="form-label fs-6">  Student</label>
        <?php echo Form::checkbox('sales_notification', null,false,['class' => 'form-check-input', 'id' => 'sales_notification']); ?>

            <label class="form-label fs-6">  Sales</label>
        <?php echo Form::checkbox('agent_notification', null,false,['class' => 'form-check-input', 'id' => 'agent_notification']); ?>

            <label class="form-label fs-6">  Agent</label>
    </div>
</div>
<input type="hidden" name="action" value="">
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            
            $('#start_date').change(function(e) {
               var thisDate = $(this).val();
               $("#end_date").attr({ min : thisDate});
            });
        });
    });



</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/visa_letters/_form.blade.php ENDPATH**/ ?>