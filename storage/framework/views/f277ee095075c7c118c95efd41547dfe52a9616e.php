<div class="row">
    <div class="col-md-3">
        <b><?php echo e($student_payment->student->v_reference_no); ?></b> <br>
        <b><?php echo e($student_payment->student->name); ?></b>
    </div>
    <div class="col-md-2">
        <b>Couse Code:</b> <br>
        <?php echo e($student_payment->student->programcode->program_code); ?>

    </div>
    <div class="col-md-3">
        <b>Payment type:</b><br>
        <?php echo e($student_payment->payment_id); ?>

    </div>
    <div class="col-md-2">
        <b>Amount: </b> <br>
        &#8364; <?php echo e($student_payment->amount); ?>

    </div>
    <div class="col-md-2">
        <b>Payment Date: </b> <br>
        <?php echo e($student_payment->payment_date); ?>

    </div>
</div>
<div class="row mt-5">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Registration Fees (RF) (&#8364;)</label>
        <?php echo Form::number('rf', isset($item) && !is_null($item->rf) ? null : 0, ['class' => 'form-control','required' => true, 'step' => 'any', 'id' => 'rf']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Sender Bank Charges (RFSBC) (&#8364;)</label>
        <?php echo Form::number('rfsbc', isset($item) && !is_null($item->rfsbc) ? null : 0, ['class' => 'form-control','required' => true, 'step' => 'any']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Receiver Bank Charges(RFRBC) (&#8364;)</label>
        <?php echo Form::number('rfrbc', isset($item) && !is_null($item->rfrbc) ? null : 0, ['class' => 'form-control','required' => true, 'step' => 'any']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Tuition Fees For Diploma (TF) (&#8364;)</label>
        <?php echo Form::number('tf', isset($item) && !is_null($item->tf) ? null : 0, ['class' => 'form-control','required' => true, 'step' => 'any', 'id' => 'tf']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Sender Bank Charges (TFSBC) (&#8364;)</label>
        <?php echo Form::number('tfsbc', isset($item) && !is_null($item->tfsbc) ? null : 0, ['class' => 'form-control','required' => true, 'step' => 'any']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Receiver Bank Charges(TFRBC) (&#8364;)</label>
        <?php echo Form::number('tfrbc', isset($item) && !is_null($item->tfrbc) ? null : 0, ['class' => 'form-control','required' => true, 'step' => 'any']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">English Proficiency Course Fees</label>
        <?php echo Form::number('eng_course_fee', isset($item) && !is_null($item->eng_course_fee) ? null : 0, ['class' => 'form-control','required' => true, 'step' => 'any']); ?>

    </div>
    <div class="col-md-8 mb-5">
        <label class="form-label fs-6">Notes by Finance</label>
        <?php echo Form::textarea('notes_finance', null, ['class' => 'form-control','rows' => '2', 'placeholder' => 'Enter Notes by Finance Here']); ?>

    </div>
    Remarks From Sales Coordinator : 
    <?php echo e($student_payment->remarks); ?>

</div>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            var student_payment = <?php echo json_encode($student_payment);?>;
           if(student_payment['payment_id'] == 'Registration Fees') {
                $('#rf').attr('max',student_payment['amount']);
           } else if (student_payment == 'Reg. Fees + Education Fees') {
                $('#tf').attr('max',student_payment['amount']);
                $('#rf').attr('max',student_payment['amount']);
           } else {
                $('#tf').attr('max',student_payment['amount']);
           }
        });
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/payment/primary_confirmation/_form_approve.blade.php ENDPATH**/ ?>