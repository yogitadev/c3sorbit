<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class="row">
    <div class="col-md-1">
        <i class="fas fa-user-tie"></i>
    </div>
    <div class="col-md-3">
        <div class="step-counter-row">Step <span class="step-number">4/10</span></div>
        <h3>Employment history</h3>
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::model($item, ['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true, 'id' => 'education_application']); ?>

    <div class="d-flex justify-content-start py-6">
        <button type="button" class="btn btn-primary addMoreRow">Add More</button>
    </div>
    <?php if(count($employment_history_list)>0): ?>
        <?php $__currentLoopData = $employment_history_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <h4><?php echo e($item->designation); ?></h4>
                <div class="col-md-6 d-flex justify-content-start">
                    <p><?php echo e($item->from_date); ?></p>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                <i class="fa fa-edit mx-3" onclick="editEmploymentHistory('<?php echo e($k); ?>');"></i>
                    <a href="<?php echo e(route('delete-application-employment-history', ['unique_id' => $item->unique_id])); ?>" data-token="<?php echo e(csrf_token()); ?>" class="menu-link delete-item-btn" >
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </div>
            <div class="separator my-5"></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
   
    <div class="maindiv " style="display: none;">
        <?php if(count($employment_history_list) > 0): ?>
            <div class="d-flex justify-content-end">
                <i class="fa fa-trash" onclick="deleteRow();"></i>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">From Date</label>
                <?php echo Form::date('from_date', null, ['class' => 'form-control', 'required' => 'true',  'id' => 'from_date' ]); ?> 
            </div>
            <div class="col-md-6 mb-5 hidediv">
                <label class="form-label required fs-6">To Date</label>
                <?php echo Form::date('to_date', null, ['class' => 'form-control hideattr', 'required' => 'true', 'id' => 'to_date']); ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <?php echo Form::checkbox('is_working', null,false,['class' => 'form-check-input', 'id' => 'is_working']); ?>

                <label class="form-label fs-6">  I'm Currently working here</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Company</label>
                <?php echo Form::text('company', null, ['class' => 'form-control', 'required' => 'true','id' => 'company']); ?> 
            </div>
            
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Designation</label>
                <?php echo Form::text('designation', null, ['class' => 'form-control','required' => 'true', 'id' => 'designation']); ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-5 position-relative select-2-field">
                <label class="form-label required fs-6">Country</label>
                <?php echo Form::select('country_id', $country_list, null, [
                    'class' => 'form-select',
                    'id' => 'parent_country_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select country',
                    'data-parsley-errors-container' => '#country-error',
                ]); ?>

                <div id="country-error"></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('application-education', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
		<input type="hidden" name="action" id="action" value="nodata">
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    function editEmploymentHistory(id){
        $('.maindiv').show();
        var js_array =<?php echo json_encode($employment_history_list);?>;
        $('#from_date').val(js_array['data'][id]['from_date']);
        $('#to_date').val(js_array['data'][id]['to_date']);
        if(js_array['data'][id]['is_working'] == 'ON') {
            $('.hidediv').hide();
            $('.hideattr').attr("required", false);
            $('#is_working').prop('checked',true);
        } else {
            $('.hidediv').show();
            $('.hideattr').attr("required", true);
        }
        $('#is_working').val(js_array['data'][id]['is_working']);
        $('#company').val(js_array['data'][id]['company']);
        $('#designation').val(js_array['data'][id]['designation']);
        $("#parent_country_id").select2("val", ""+js_array['data'][id]['country_id']+"");
        $('<input>').attr({ type: 'hidden', id: 'edit_id', name: 'edit_id'}).appendTo('form').val(js_array['data'][id]['unique_id']);
		$('<input>').attr({ type: 'hidden', id: 'action', name: 'action'}).appendTo('form').val('edit');
    }
    function deleteRow() {
        $('.form-control, .form-select').attr('required',false);
        $('.maindiv').hide();
        $('<input>').attr({ type: 'hidden', id: 'action', name: 'action'}).appendTo('form').val('delete');
    }
    $(function() {
        $(document).ready(function(){
            $('.form-control, .form-select').attr('required',false);
            $('#parent_country_id').prepend('<option selected=""></option>').select2({placeholder: "Please select country"});
            $('.addMoreRow').click(function(){
                $('.maindiv').show();
                $('.form-control, .form-select').attr('required',true);
                $('#action').val('create');
            }); 
            $("input[name='is_working']").on("click", function() {
                var val = $(this).prop('checked');
                if(val == true) {
                    $('.hidediv').hide();
                    $('.hideattr').attr("required", false);
                } else {
                    $('.hidediv').show();
                    $('.hideattr').attr("required", true);
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_employment_history.blade.php ENDPATH**/ ?>