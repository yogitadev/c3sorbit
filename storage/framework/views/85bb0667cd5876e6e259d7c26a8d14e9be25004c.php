<?php if(isset($item) && !is_null($item) && !is_null($item->student_id)): ?>
    <h4 class="mb-5"><?php echo e($item->student->v_reference_no ?? '-'); ?> | <?php echo e($item->student->name ?? '-'); ?></h4>
<?php else: ?>
    <h3 class="mb-5">Payment Details : </h3>
    <div class="row">
        <div class="col-md-12 mb-5 position-relative select-2-field">
            <label class="form-label fs-6 required">Student</label>
            <?php echo Form::select('student_id', $student_item, null, [
                'class' => 'form-select student_id',
                'id' => 'parent_student_id',
                'required' => true,
                'data-control' => 'select2',
                'placeholder' => 'Please select student',
                'data-parsley-errors-container' => '#student-error',
            ]); ?>

            <div id="student-error"></div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Payment For</label>
        <?php echo Form::select('payment_id', [NULL => 'Select Payment','Registration Fees' => 'Registration Fees', 'Tution Fees Instalment' => 'Tution Fees Instalment', 'Document Translation Fees' => 'Document Translation Fees', 'Reg. Fees + Education Fees' => 'Reg. Fees + Education Fees'], null, [
            'class' => 'form-select',
            'required' => true,
            'id' => 'parent_payment_id',
        ]); ?>

    </div>
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Bank</label>
        <?php echo Form::select('bank_id', $bank_item, null, [
            'class' => 'form-select',
            'id' => 'parent_bank_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select bank',
            'data-parsley-errors-container' => '#bank-error',
        ]); ?>

        <div id="bank-error"></div>
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Amount (&#8364;)</label>
        <?php echo Form::number('amount', null, ['class' => 'form-control','required' => true, 'step' => 'any','id' => 'amount']); ?>

        <p class="mt-2" >
            Note: Enter value less than or equal to <span id="total_amount"></span>.  
        </p>
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Payment Date</label>
        <?php echo Form::date('payment_date', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Remarks</label>
        <?php echo Form::textarea('remarks', null, ['class' => 'form-control','rows' => '2', 'placeholder' => 'Kindly Mention the Account Holder Name and the Other Identifiers of the Payment if available.']); ?>

    </div>
    <?php if(!isset($item)): ?>
        <div class="col-md-6 mb-5">
            <br>
            <h3 class="text-danger">Current Intake: <br> <span class="intake"></span></h3>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            
            $(document.body).on("change","#parent_student_id",function(){
                var student_id = this.value;
                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('create-student-payment')); ?>'+'?course=true&student_id='+student_id,
                    
                    success: function(e) {
                        $(".intake").html(e);
                    },
                });
            });
            $(document.body).on("change","#parent_payment_id",function(){
                var payment = this.value;
                var student_id = $(".student_id").val();
                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('create-student-payment')); ?>'+'?payment='+payment+'&student_id='+student_id,
                    
                    success: function(e) {
                        $("#total_amount").html(e);
                        $("#amount").attr('max',e);
                    },
                });
            });
        });
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/payment/primary_confirmation/_form.blade.php ENDPATH**/ ?>