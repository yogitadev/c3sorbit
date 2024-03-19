<div class="tab-pane fade show active mt-5" id="tab_update_vista">
    <?php echo Form::model($item, ['route' => ['lead-update-vista', $item->unique_id],'method' => 'post','class' => 'form w-100 module_form', 'autocomplete' => 'off', 'data-parsley-validate' => true, 'files' => true , 'data-token' => csrf_token() ]); ?>

   
        <div class="row">
            <div class="col-md-6 mb-5 position-relative select-2-field">
                <label class="form-label fs-6 required">Purpose</label>
                <?php echo Form::select('purpose_id', $purpose_list, null, [
                    'class' => 'form-select',
                    'id' => 'parent_purpose_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select Purpose',
                    'data-parsley-errors-container' => '#purpose-error',
                ]); ?>

                <div id="purpose-error"></div>
            </div>
            <div class="col-md-6 mb-5 position-relative select-2-field">
                <label class="form-label fs-6 required">Result</label>
                <?php echo Form::select('result_id', $result_list, null, [
                    'class' => 'form-select',
                    'id' => 'parent_result_id',
                    'required' => true,
                    'data-control' => 'select2',
                    'placeholder' => 'Please select result',
                    'data-parsley-errors-container' => '#result-error',
                ]); ?>

                <div id="result-error"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-5 position-relative select-2-field">
                <label class="form-label fs-6 ">Selected Employee</label>
                <?php echo Form::select('employee_id', $employee_list, null, [
                    'class' => 'form-select',
                    'id' => 'parent_employee_id',
                    'data-control' => 'select2',
                    'placeholder' => 'Please select employee',
                    'data-parsley-errors-container' => '#employee-error',
                ]); ?>

                <div id="employee-error"></div>
            </div>
            <div class="col-6">
                <label class="form-label fs-6">Set Reminder</label>
                <?php echo Form::input('dateTime-local','reminder_timestamp', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label required fs-6">Remarks</label>
                <?php echo Form::textarea('remark', null, ['class' => 'form-control ckeditor']); ?>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 mb-5 position-relative select-2-field">
                <label class="form-label fs-6">Subject Type</label>
                <?php echo Form::select('subject_type_id', $subject_type_list, null, [
                    'class' => 'form-select',
                    'id' => 'parent_subject_type_id',
                    'data-control' => 'select2',
                    'placeholder' => 'Please select subject type',
                    'data-parsley-errors-container' => '#subject_type-error',
                ]); ?>

                <div id="subject_type-error"></div>
            </div>
            <div class="col-6">
                <label class="form-label fs-6">Subject Text</label>
                <?php echo Form::text('subject_text', null, ['class' => 'form-control']); ?>

            </div>
        </div>
        <div class="row" id="row0">
            <div class="col-md-6 mb-5 position-relative select-2-field">
                <label class="form-label fs-6">Attachment Type</label>
                <?php echo Form::select('attachment_type_id', $attachment_type_list, null, [
                    'class' => 'form-select',
                    'id' => 'parent_attachment_type_id',
                    'name' => 'attachment_type_id[]',
                    'data-control' => 'select2',
                    'placeholder' => 'Please select attachment type',
                    'data-parsley-errors-container' => '#attachment_type-error',
                    'name' => 'attachment_type_id[]',
                ]); ?>

                <div id="attachment_type-error"></div>
            </div>
            <div class="col-6">
                <label class="form-label fs-3">Attachment File</label>
                <?php echo Form::file('attachment_file', ['class' => 'form-control','name' => 'attachment_file[]','multiple' => true]); ?>

                <span class="d-flex">
                    <a type="button" name="add" id="add"><i class="fas fa fa-plus"></i></a> 
                </span>
            </div>
        </div>
        <div id="dynamic_field"></div>
        <div class="my-9">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    <?php echo Form::close(); ?>

</div>
<?php $__env->startPush('page_js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(document.body).on("change","#parent_purpose_id",function(){
                var purpose_id = this.value;
                $.ajax({
                        type: 'GET',
                        url: '<?php echo e(route('student-list')); ?>'+'?purpose=true&purpose_id='+purpose_id,
                        
                        success: function(e) {
                            $('#parent_result_id')
                                .find("option").remove().end().append($('<option value = "">Please select result</option>'));  
                            $.each(e, function(key, value) {   
                                $('#parent_result_id')
                                    .append($('<option>', { value : key })
                                    .text(value)); 
                            });
                        },
                    });
            });
            $(document).ready(function(){
                var i=0;
                tt = "add"+i; 
               // console.log(tt);
               var jqueryarray = <?php echo json_encode($attachment_type_list); ?>;
                $(document).on('click','.btn_add', function(){
                    var i =0;
                    var j = 0;
                       // console.log($(this).attr('id'));
                        var inputs = $('.items');
                        var ans = $(this).attr('id').split('add')[1];
                        //console.log(ans);
                        i = parseInt(ans);
                        //console.log(i);
                        j = i+1;
                        $('#row'+i).after('<div id="row'+j+'" class="row"><div class="col-6"><select id="attachment_type'+j+'" class="form-select" data-control="select2" name="attachment_type_id[]"></select></div><div class="col-6"><input type="file" name="attachment_file[]" value="" class="items form-control" multiple><span><a type="button" id="add'+j+'" class="btn_add"><i class="fas fa fa-plus"></i></a><a type="button" class="btn_remove" name="remove" id="'+ j +'"><i class="fas fa fa-trash"></i></a></span></div></div>');
                    $('#attachment_type'+j).append($('<option value = "">Please select attachemnt type</option>')); 
                    $.each(jqueryarray, function(key, value) {   
                            $('#attachment_type'+j)
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                });
                $('#add').click(function() {
                    var i=0;
                    var append_row = '';
                    //alert(i);
                    // Get inputs created (if any)
                    var inputs = $('.items');
                    // Verify if there are 7 or more inputs
                    if(inputs.length >= 7) {
                        console.log('Only seven inputs allowed');
                        return;
                    }
                    // Get last input to avoid duplicated IDs / names
                    if(inputs.last().length > 0) {
                        // Split name to get only last part of name, the numeric one
                        //console.log(inputs.last()[0].name);
                        i = parseInt(inputs.last()[0].name.split('_')[1]);
                   }
                    i++;
                    var jqueryarray = <?php echo json_encode($attachment_type_list); ?>;
                    //console.log(jqueryarray);
                    if(i==1)
                    appdend_row = 'row0';
                   else 
                   appdend_row = 'row'+(i-1);
                    $('#'+appdend_row).after('<div id="row'+i+'" class="row"><div class="col-6"><select id="attachment_type'+i+'" class="form-select" data-control="select2" name="attachment_type_id[]"></select></div><div class="col-6"><input type="file" name="attachment_file[]" value="" class="items form-control"><span><a type="button" id="add'+i+'" class="btn_add"><i class="fas fa fa-plus"></i></a><a type="button" class="btn_remove" name="remove" id="'+ i +'"><i class="fas fa fa-trash"></i></a></span></div></div>');
                    $('#attachment_type'+i).append($('<option value = "">Please select attachemnt type</option>')); 
                    $.each(jqueryarray, function(key, value) {   
                            $('#attachment_type'+i)
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });

                });
                
                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    //console.log(button_id);
                    $('#row' + button_id + '').remove();
                });
            });
        });
    </script>
    <script type="text/javascript" src="<?php echo e(asset('themes/admin/third_party/ckeditor5/build/ckeditor.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/editor.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/lead_vista/tabs/_update_vista.blade.php ENDPATH**/ ?>