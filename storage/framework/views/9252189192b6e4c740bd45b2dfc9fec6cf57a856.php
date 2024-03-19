<?php $__env->startSection('page_title', 'Application Form'); ?>
<?php $__env->startSection('sub_header'); ?>
<div class=" row">
    <div class="col-md-1">
    <i class="fas fa-graduation-cap"></i>
    </div>
    <div class=" col-md-3">
        <div class="step-counter-row">Step <span class="step-number">3/10</span></div>
        <h3>Education Records</h3>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::model($item,['method' => 'post', 'class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true, 'id' => 'education_application']); ?>

    <div class="d-flex justify-content-start py-6">
        <button type="button" class="btn btn-primary addMoreRow">Add More</button>
    </div>
    <?php if(count($education_list)>0): ?>
        <?php $__currentLoopData = $education_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <h4><?php echo e($item->title); ?></h4>
                <div class="col-md-6 d-flex justify-content-start">
                    <p><?php echo e($item->year); ?></p>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                <i class="fa fa-edit mx-3" onclick="editEducation('<?php echo e($k); ?>');"></i>
                    <a href="<?php echo e(route('delete-education-application', ['unique_id' => $item->unique_id])); ?>" data-token="<?php echo e(csrf_token()); ?>" class="menu-link delete-item-btn" >
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </div>
            <div class="separator my-5"></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
   
    <div class="maindiv">
        <?php if(count($education_list)>0): ?>
            <div class="d-flex justify-content-end">
                <i class="fa fa-trash" onclick="deleteRow();"></i>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Year</label>
                <?php echo Form::number('year', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'YYYY', 'min' => 1950, 'max' =>  ((date("Y"))+1), 'id' => 'year' ]); ?> 
            </div>
            <div class="col-md-6 mb-5">
                <label class="form-label required fs-6">Title/Award</label>
                <?php echo Form::text('title', null, ['class' => 'form-control', 'required' => 'true', 'id' => 'title']); ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-5">
                <label class="form-label required fs-6"> Awarding Institution/School</label>
                <?php echo Form::text('awarding_school', null, ['class' => 'form-control', 'required' => 'true', 'id' => 'awarding_school']); ?> 
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 mb-5">
                <label class="form-label required fs-6">Language</label>
                <?php echo Form::text('language', null, ['class' => 'form-control', 'required' => 'true','id' => 'language']); ?> 
            </div>
            <div class="col-md-4 mb-5 position-relative select-2-field">
                <label class="form-label required fs-6">Country</label>
                <?php echo Form::select('country_id', $country_list, null, [
                    'class' => 'form-select hideattr',
                    'id' => 'parent_country_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select country',
                    'data-parsley-errors-container' => '#country-error',
                ]); ?>

                <div id="country-error"></div>
            </div>
            <div class="col-md-4 mb-5">
                <label class="form-label required fs-6">Percentage/Grades</label>
                <?php echo Form::text('grade', null, ['class' => 'form-control','required' => 'true', 'id' => 'grade']); ?> 
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end py-6 px-9">
        <a href="<?php echo e(route('english-proficiency', ['unique_id' => $unique_id])); ?>" class="btn btn-light back-button mx-3">back</a>
        <button type="submit" class="btn btn-primary">Save & Continue</button>
		<input type="hidden" name="action" id="action" value="create">
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    function editEducation(id){
        var js_array =<?php echo json_encode($education_list );?>;
        $('#year').val(js_array['data'][id]['year']);
        $('#title').val(js_array['data'][id]['title']);
        $('#awarding_school').val(js_array['data'][id]['awarding_school']);
        $('#language').val(js_array['data'][id]['language']);
        $("#parent_country_id").select2("val", ""+js_array['data'][id]['country_id']+"");
        $('#grade').val(js_array['data'][id]['grade']);
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
            $('#title').val("");
            $('#parent_country_id').prepend('<option selected=""></option>').select2({placeholder: "Please select country"});
            
            $('.addMoreRow').click(function(){
				$('.maindiv').show();
				$('.form-control, .form-select').attr('required',true);
            }); 
            
        });
    });
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('front.lead_management.students.form_applications.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/application_education.blade.php ENDPATH**/ ?>