<?php $__env->startSection('page_title', 'Edit User'); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php
    $breadcrumb_arr = [
        'Users' => route('personnel-list'),
        $item->unqiue_id => '',
        'Edit' => '',
    ];
    ?>
    <?php echo $__env->make('admin.layouts.sub_header', [
        'title' => 'Edit User',
        'breadcrumb_arr' => $breadcrumb_arr,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-menu'); ?>
    <?php echo $__env->make('admin.iam.includes.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.includes.formErrors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo Form::model($item, ['method' => 'PUT', 'class' => 'form w-100 module_form','data-parsley-validate' => true,  'files' => true]); ?>


    <div class="card mb-5 mb-xl-5">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Edit</h3>
            </div>

            <div class="card-toolbar m-0">
                <a href="<?php echo e(route('personnel-list')); ?>" class="btn btn-danger"><i
                        class="fas fa-angle-left fs-4 me-2"></i> Go
                    Back</a>
            </div>
        </div>
        <div class="card-body border-top p-9">
            <?php echo $__env->make('admin.iam.personnel._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
$(function() {
    
    $(document.body).on("change","#parent_role_id",function(){
        var role_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('edit-personnel',['unique_id' => $item->unique_id])); ?>'+'?role_id='+role_id,
                success: function(e) {
                    console.log(e);
                    $('#parent_type_id')
                        .find("option").remove().end().append($('<option value = "">Please select type</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_type_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $(document.body).on("change","#parent_home_country_id",function(){
        var country_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('edit-personnel',['unique_id' => $item->unique_id])); ?>'+'?country_id='+country_id,
                success: function(e) {
                    console.log(e);
                    $('#parent_home_state_id')
                        .find("option").remove().end().append($('<option value = "">Please select state</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_home_state_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $(document.body).on("change","#parent_home_state_id",function(){
        var state_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('edit-personnel',['unique_id' => $item->unique_id])); ?>'+'?state_id='+state_id,
                
                success: function(e) {
                    $('#parent_home_city_id')
                        .find("option").remove().end().append($('<option value = "">Please select city</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_home_city_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $(document.body).on("change","#parent_current_country_id",function(){
        var country_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('edit-personnel',['unique_id' => $item->unique_id])); ?>'+'?country_id='+country_id,
                success: function(e) {
                    console.log(e);
                    $('#parent_current_state_id')
                        .find("option").remove().end().append($('<option value = "">Please select state</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_current_state_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
    $(document.body).on("change","#parent_current_state_id",function(){
        var state_id = this.value;
        $.ajax({
                type: 'GET',
                url: '<?php echo e(route('edit-personnel',['unique_id' => $item->unique_id])); ?>'+'?state_id='+state_id,
                
                success: function(e) {
                    $('#parent_current_city_id')
                        .find("option").remove().end().append($('<option value = "">Please select city</option>'));  
                    $.each(e, function(key, value) {   
                        $('#parent_current_city_id')
                            .append($('<option>', { value : key })
                            .text(value)); 
                    });
                },
            });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hp/projects/edfyed/resources/views/admin/iam/personnel/edit.blade.php ENDPATH**/ ?>