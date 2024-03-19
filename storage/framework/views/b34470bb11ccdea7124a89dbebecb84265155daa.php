<?php $__env->startSection('page_title', 'Reschedule Interview'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Interviews' => route('screen-list'),
        $item->unqiue_id => '',
        'Edit' => '',
    ];
    ?>
    <?php echo $__env->make('front.layouts.sub_header', [
        'title' => 'Reschedule Interview',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.screen_management.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('front.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::model($item, ['method' => 'PUT', 'class' => 'form w-100 module_form','data-parsley-validate' => true,  'files' => true]); ?>


    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Reschedule</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="<?php echo e(route('screen-list')); ?>" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="card-body border-top p-9">
            <?php echo $__env->make('admin.screen_management.interviews._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Reschedule</button>
        </div>
    </div>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function(){
            $('.maindiv').hide();
            $('.error').hide();
            $('.form-control, .form-select').attr('required',false);
            $('#interview_date').attr('required',true);
            $('#interview_date').change(function(){
				$('.maindiv').show();
				$('.form-control, .form-select').attr('required',true);
                $('#notes').attr('required',false);
            });
            var arr = <?php echo json_encode($item);?>;
            
            if(arr['student_notification'] == 1) {
                $('#student_notification').prop('checked',true);
            }
            if(arr['employee_notification'] == 1) {
                $('#employee_notification').prop('checked',true);
            }
            if(arr['consultant_notification'] == 1) {
                $('#consultant_notification').prop('checked',true);
            }
            if(arr['interviewer_notification'] == 1) {
                $('#interviewer_notification').prop('checked',true);
            }
            $("input[name='interview_time']").on("click", function() {
            var date = $('#interview_date').val();
            var time = $(this).val();
            var lead_id = <?php echo $student_id;?>;
            
            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('edit-interview',['lead_id' => $student_id])); ?>'+'?date='+date+'&time='+time,
                success: function(e) {
                    if(e.length == 0) {
                        $('.error').show();
                    } else {
                        $('.error').hide();
                        $('#parent_employee_id')
                        .find("option").remove().end().append($('<option value = "">Please select employee</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_employee_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    }
                },
            });
        }); 
            
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/screen_management/interviews/edit.blade.php ENDPATH**/ ?>