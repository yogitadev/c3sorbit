<div class="row">
    <div class="col-md-2">
        <span><b>Student Type:</b></span><br>
        <span>-</span>
    </div>
    <div class="col-md-2">
        <span><b>Intake:</b></span><br>
        <span><?php echo e($student_item->intake->name ?? '-'); ?></span>
    </div>
    <div class="col-md-2">
        <span><b>Discount (&#8364;):</b></span><br>
        <span>&#8364;0</span>
    </div>
    <div class="col-md-2">
        <span><b>Local:</b></span><br>
        <span>No</span>
    </div>
    <div class="col-md-2">
        <span><b>Enrolment Type:</b></span><br>
        <span>Fresh Lead</span>
    </div>
    <div class="col-md-2">
        <span><b>Academic Intake:</b></span><br>
        <span><?php echo e($student_item->intake->name ?? '-'); ?></span>
    </div>
</div>
<div class="separator my-5"></div>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6 required">Admission Year</label>
        <?php echo Form::select('admission_year', ['Select Year' => 'Select Year', '2023' => '2023', '2024' => '2024', '2025' => '2025', '2026' => '2026', '2027' => '2027', '2028' => '2028', '2029' => '2029', '2030' => '2030', '2031' => '2031', '2032' => '2032', '2033' => '2033', '2034' => '2034', '2035' => '2035', '2036' => '2036', '2037' => '2037', '2038' => '2038', '2039' => '2039', '2040' => '2040', '2041' => '2041', '2042' => '2042'], null, [
            'class' => 'form-select',
            'required' => true,
            'id' =>'admission_year'
        ]); ?>

    </div>
    <div class="col-md-4 mb-5">
    <label class="form-label fs-6 required">Intake</label>
        <?php echo Form::select('intake', ['Select Intake' => 'Select Intake', 'February' => 'February', 'June' => 'June', 'July' => 'July', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December'], null, [
            'class' => 'form-select',
            'required' => true,
            'id' => 'intake',
        ]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Bank Account</label>
        <?php echo Form::select('bank_id', $bank_list, null, [
            'class' => 'form-select',
            'id' => 'parent_bank_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select bank',
            'data-parsley-errors-container' => '#bank-error',
        ]); ?>

        <div id="bank-error"></div>
    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Formal Program Name</label>
        <?php echo Form::text('formal_program_name', null, ['class' => 'form-control']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Full Period Of Study</label>
        <?php echo Form::number('period_of_study', null, ['class' => 'form-control', 'min' => '1']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Total Tuition Fees</label>
        <?php echo Form::number('total_tution_fee', null, ['class' => 'form-control', 'min' => '1']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Sales Remarks</label>
        <p><?php echo e($item->sales_remark ?? '-'); ?></p>
    </div>
    <div class="col-md-4 mb-5">
    <label class="form-label fs-6">Request Discount</label>
        <p>0</p>
    </div>
</div>
<div class="separator my-5"></div>
<div class="row">
    <div class="col-md-12 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Course</label>
        <?php echo Form::select('course_id', $course_list, null, [
            'class' => 'form-select',
            'id' => 'parent_course_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select course',
            'data-parsley-errors-container' => '#course-error',
        ]); ?>

        <div id="course-error"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Course Fee(&#8364;)</label>
        <?php echo Form::text('course_fee', null, ['class' => 'form-control bg-light', 'required' => true, 'id' => 'course_fee','readonly' => true]); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Discount (&#8364;)</label>
        <?php echo Form::text('course_discount', 0, ['class' => 'form-control','id' => 'course_discount']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Total Fee (&#8364;)</label>
        <?php echo Form::text('course_total_fee', null, ['class' => 'form-control', 'required' => true, 'id' => 'course_total_fee']); ?>

    </div>
</div>
<div class="separator my-5"></div>
<h3 class="mb-5">Application Fees :</h3>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Application Fees (&#8364;)</label>
        <?php echo Form::text('application_fee', null, ['class' => 'form-control', 'required' => true, 'id' => 'application_fee']); ?>

        <span><b>Total Registration Fees Approved: <?php echo e($student_item->student->registrationApprove($lead_id) ?? 0); ?></b></span>
    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Discount (&#8364;)</label>
        <?php echo Form::text('application_discount', 0, ['class' => 'form-control','id' => 'application_discount']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Total (&#8364;)</label>
        <?php echo Form::text('application_total', null, ['class' => 'form-control', 'required' => true, 'id' => 'application_total']); ?>

    </div>
</div>

<div class="separator my-5"></div>
<h3 class="mb-5">Tution Fee (First Installment Only) :</h3>
<div class="row">
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">First Installment (&#8364;)</label>
        <?php echo Form::text('first_installment', null, ['class' => 'form-control', 'required' => true, 'id' => 'first_installment']); ?>

        <span><b>Total Tution Fees Approved: <?php echo e($student_item->student->tusionApprove($lead_id) ?? 0); ?></b></span>
    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Discount (&#8364;)</label>
        <?php echo Form::text('tution_discount', 0, ['class' => 'form-control', 'id' => 'tution_discount']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label required fs-6">Total (&#8364;)</label>
        <?php echo Form::text('tution_total_fee', null, ['class' => 'form-control', 'required' => true, 'id' => 'tution_total_fee']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Total Tution Fees Remark (&#8364;)</label>
        <?php echo Form::textarea('tution_remark', null, ['class' => 'form-control mb-5', 'rows' => '2']); ?>

        <b>Student Name: </b><?php echo e($student_item->first_name); ?> <?php echo e($student_item->last_name); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">First Year Fees Remark (&#8364;)</label>
        <?php echo Form::textarea('first_year_remark', null, ['class' => 'form-control', 'rows' => '2']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">Waiver</label>
        <?php echo Form::text('waiver', 0, ['class' => 'form-control']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-5">
        <?php echo Form::checkbox('uol', null,false,['class' => 'form-check-input ', 'id' => 'uol',]); ?>

        <label class="form-label" for="uol">&nbsp; &nbsp;<b>Unconditional Offer Letter (UOL)</b> </label>
    </div>
</div>
<div class="hidediv">
    <div class="row">
        <div class="col-md-5 mb-5">
            <b>Conditions to be fulfilled: </b><br><br>
            <?php echo Form::checkbox('condition[]', 'Payment of Registration and Course fee',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;Payment of Registration and Course fee </label><br>
            <?php echo Form::checkbox('condition[]', 'Signed student contract',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;Signed student contract </label><br>
            <?php echo Form::checkbox('condition[]', 'Application form',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;Application form </label><br>
            <?php echo Form::checkbox('condition[]', 'All Academic Documents',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;All Academic Documents </label><br>
            <?php echo Form::checkbox('condition[]', 'Statement of purpose',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;Statement of purpose </label><br>
            <?php echo Form::checkbox('condition[]', 'Resume',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;Resume </label><br>
            <?php echo Form::checkbox('condition[]', 'Gap Clarification if any',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;Gap Clarification if any </label><br>
            <?php echo Form::checkbox('condition[]', 'Declaration Form',false,['class' => 'form-check-input ', ]); ?>

            <label class="form-label">&nbsp; &nbsp;Declaration Form </label><br>        
        </div>
    </div>
    <div class="row" id="row0">
        <div class="col-md-5 mb-5">
            <?php echo Form::text('remark[]', null, ['class' => 'form-control','name' => 'remark[]',]); ?>

            <span class="d-flex">
                <a type="button" name="add" id="add"><i class="fas fa fa-plus"></i></a> 
            </span>
        </div>
    </div>
    <div id="dynamic_field"></div>
</div>
<div class="row">
    <div class="col-md-5 mb-5">
        <b>Email Notifications: </b><br><br>
        <?php echo Form::checkbox('student_notification', null,false,['class' => 'form-check-input', 'id' => 'student_notification',]); ?>

        <label class="form-label" for="student_notification">&nbsp; &nbsp;Student</label><br>
        <?php echo Form::checkbox('sales_notification', null,false,['class' => 'form-check-input', 'id' => 'sales_notification',]); ?>

        <label class="form-label" for="sales_notification">&nbsp; &nbsp;Sales</label><br>
        <?php echo Form::checkbox('agent_notification', null,false,['class' => 'form-check-input ', 'id' => 'agent_notification',]); ?>

        <label class="form-label" for="agent_notification">&nbsp; &nbsp;Agent</label><br>
    </div>
</div>
<div class="separator my-5"></div>
<div class="row">
    <div class="col-md-5">
            <b>Registration Fee: </b>&#8364; 300 <br>
            <b>Total Tuition Fees: </b><span id="read_fees"></span> <br>
            <b>First Instalment: </b>&#8364; 0 + &#8364; 300 <br>
    </div>
</div>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            $('#read_fees').html("&#8364; "+($('#course_fee').val()));
            $('#admission_year').val(<?php echo json_encode($admission_year);?>);
            $('#intake').val(<?php echo json_encode($intake);?>);
            $(document.body).on("change", "#course_fee",function(e) {
                var course_fee = $('#course_fee').val();
                var discount = $('#course_discount').val();
                var total = course_fee - discount;
                $('#course_total_fee').val(total);
            });
            $('#course_discount').keyup(function(e) {
                var course_fee = $('#course_fee').val();
                var discount = $('#course_discount').val();
                var total = course_fee - discount;
                $('#course_total_fee').val(total);
            });
            $('#application_fee').keyup(function(e) {
                var application_fee = $('#application_fee').val();
                var discount = $('#application_discount').val();
                var total = application_fee - discount;
                $('#application_total').val(total);
            });
            $('#application_discount').keyup(function(e) {
                var application_fee = $('#application_fee').val();
                var discount = $('#application_discount').val();
                var total = application_fee - discount;
                $('#application_total').val(total);
            });
            $('#first_installment').keyup(function(e) {
                var first_installment = $('#first_installment').val();
                var discount = $('#tution_discount').val();
                var total = first_installment - discount;
                $('#tution_total_fee').val(total);
            });
            $('#tution_discount').keyup(function(e) {
                var first_installment = $('#first_installment').val();
                var discount = $('#tution_discount').val();
                var total = first_installment - discount;
                $('#tution_total_fee').val(total);
            });
            $(document.body).on("change","#parent_course_id",function(){
                //console.log(this.value);
                var course_id = this.value;
                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('create-studentCOL',['lead_id' => $student_item->lead_id])); ?>'+'?course=true&course_id='+course_id,
                    
                    success: function(e) {
                        $("#course_fee").val(e.eu_tution_fee);
                        $("#application_fee").val(300);
                    },
                });
            });
            $('#add').click(function() {
                var i=0;
                var append_row = '';
                // Get inputs created (if any)
                var inputs = $('.items');
                // Verify if there are 7 or more inputs
                if(inputs.length >= 15) {
                    console.log('Only 15 inputs allowed');
                    return;
                }
                // Get last input to avoid duplicated IDs / names
                if(inputs.last().length > 0) {
                    // Split name to get only last part of name, the numeric one
                    i = parseInt(inputs.last()[0].name.split('_')[1]);
                }
                i++;
               
                if(i==1)
                appdend_row = 'row0';
                else 
                appdend_row = 'row'+(i-1);
            
            
                $('#'+appdend_row).after('<div id="row'+i+'" class="row"><div class="col-md-5 mb-5"><input type="text" name="remark[]" value="" class="items form-control"><span><a type="button" id="add'+i+'" class="btn_add"><i class="fas fa fa-plus"></i></a><a type="button" class="btn_remove" name="remove" id="'+ i +'"><i class="fas fa fa-trash"></i></a></span></div></div>');
            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            $(document).on('click','.btn_add', function(){
                var i =0;
                var j = 0;
                var inputs = $('.items');
                var ans = $(this).attr('id').split('add')[1];
                i = parseInt(ans);
                j = i+1;
            
                $('#row'+i).after('<div id="row'+j+'" class="row"><div class="col-md-5 mb-5"><input type="text" name="remark[]" value="" class="items form-control" multiple><span><a type="button" id="add'+j+'" class="btn_add"><i class="fas fa fa-plus"></i></a><a type="button" class="btn_remove" name="remove" id="'+ j +'"><i class="fas fa fa-trash"></i></a></span></div></div>');
                    
            });
            $("input[name='uol']").on("click", function() {
                var val = $(this).prop('checked');
                if(val == true) {
                    $('.hidediv').hide();
                } else {
                    $('.hidediv').show();
                }
            });
        });
    });



</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/conditional_letters/_letter_form.blade.php ENDPATH**/ ?>