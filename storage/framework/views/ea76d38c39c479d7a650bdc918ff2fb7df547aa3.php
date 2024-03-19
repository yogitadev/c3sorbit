<h3 class="mb-5">COL Request Details :</h3>
<div class="row">
    <div class="col-md-3">
        <span><b>Course</b></span><br>
        <span><?php echo e($student_item->programcode->program_name ?? '-'); ?></span>
    </div>
    <div class="col-md-3">
        <span><b>Intake</b></span><br>
        <span><?php echo e($student_item->intake->name ?? '-'); ?></span>
    </div>
    <div class="col-md-3">
        <span><b>Discount (&#8364;)</b></span><br>
        <span>&#8364;0</span>
    </div>
    <div class="col-md-3">
        <span><b>Remarks</b></span><br>
        <span>***</span>
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
        <?php echo Form::text('course_fee', null, ['class' => 'form-control', 'required' => true, 'id' => 'course_fee']); ?>

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

        <span><b>Total Registration Fees Approved: 0</b></span>
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

        <span><b>Total Tution Fees Approved: 0</b></span>
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
        <?php echo Form::textarea('tution_remark', null, ['class' => 'form-control','rows' => '2']); ?>

    </div>
    <div class="col-md-4 mb-5">
        <label class="form-label fs-6">First Year Fees Remark (&#8364;)</label>
        <?php echo Form::textarea('first_year_remark', null, ['class' => 'form-control','rows' => '2']); ?>

    </div>
</div>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
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
        });
    });



</script>
<?php $__env->stopPush(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/conditional_letters/_form.blade.php ENDPATH**/ ?>