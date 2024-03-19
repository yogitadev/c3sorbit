<div class="row">

    
    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Institution</label>
        <?php echo Form::select('institution_id', $institution_list, null, [
            'class' => 'form-select',
            'id' => 'parent_institution_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Institution',
            'data-parsley-errors-container' => '#institution-error',
        ]); ?>

        <div id="institution-error"></div>
    </div>

    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6">Campus</label>
        <?php echo Form::select('campus_id', $campus_list, null, [
            'class' => 'form-select',
            'id' => 'parent_campus_id',
            'required' => false,
            'data-control' => 'select2',
            'placeholder' => 'Please select Campus',
            'data-parsley-errors-container' => '#campus-error',
        ]); ?>

        <div id="campus-error"></div>
    </div>

    <div class="col-md-6 mb-5 position-relative select-2-field">
        <label class="form-label fs-6 required">Platform</label>
        <?php echo Form::select('platform_id', $platform_list, null, [
            'class' => 'form-select',
            'id' => 'parent_platform_id',
            'required' => true,
            'data-control' => 'select2',
            'placeholder' => 'Please select Platform',
            'data-parsley-errors-container' => '#platform-error',
        ]); ?>

        <div id="platform-error"></div>
    </div>

    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Original Campaign ID</label>
        <?php echo Form::text('original_campaign_id', null, ['class' => 'form-control','placeholder']); ?>

    </div>

</div>
<div class="separator my-5"></div>

<h3 class="mb-5">Location</h3>

<div class="row">
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Target Locations</label>
        <?php echo Form::text('target_location', null, ['class' => 'form-control', 'required' => true]); ?>


    </div>
</div>

<div class="separator my-5"></div>
<h3 class="mb-5">Details Of Campaign</h3>

<div class="row">
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Details Of Campaign</label>
        <?php echo Form::textarea('details_campaign', null, ['class' => 'form-control h-100px','required' => 'true','placeholder' => 'Mention Additional Criraties used while generating the Origal Campaign on the platform Like: Age Critaria, Additional Filters etc....']); ?>


    </div>
</div>

<div class="separator my-5"></div>
<h3 class="mb-5">Planning</h3>

<div class="row">
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Duration From</label>
        <?php echo Form::date('duration_from', null, ['class' => 'form-control','required' => 'true','min' => date("Y-m-d")]); ?>


    </div>
    <div class="col-md-6 mb-5">

        <label class="form-label fs-6">Duration To</label>
        <?php echo Form::date('duration_to', null, ['class' => 'form-control', 'min' => date("Y-m-d")]); ?>


    </div>
</div>

<div class="separator my-5"></div>
<h3 class="mb-5">Attachment</h3>

<div class="row">
    <div class="col-md-6 mb-5">

        <label class="form-label fs-6">Attachment</label>
        <?php echo Form::file('media', ['class' => 'form-control','accept' => '.png, .jpg, .jpeg, .pdf']); ?>


        <?php if(isset($item) && !is_null($item) && !is_null($item->media)): ?>
            <div class="thumb">
                <a data-fancybox href="<?php echo e($item->media->getUrl()); ?>">
                    <img src="<?php echo e($item->media->fitThumbUrl()); ?>" class="img-thumbnail" class="clearfix" />
                </a>
            </div>
        <?php endif; ?>

    </div>
    <div class="col-md-6 mb-5">

        <label class="form-label fs-6">Budget</label>
        <?php echo Form::number('budget', null, ['class' => 'form-control']); ?>


    </div>
    <div class="col-md-6 mb-5">

        <label class="form-label fs-6">Landing Page Url</label>
        <?php echo Form::text('landing_page_url', null, ['class' => 'form-control']); ?>


    </div>
</div>


<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6 required">Status</label>
        <?php echo Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, [
            'class' => 'form-select',
            'required' => true,
        ]); ?>

    </div>
</div>
<?php $__env->startPush('page_js'); ?>
<script type="text/javascript">
    $(function() {
        $(document.body).on("change","#parent_institution_id",function(){
            var insti_id = this.value;
            $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('campaign-list')); ?>'+'?institute=true&institution_id='+insti_id,
                    
                    success: function(e) {
                        $('#parent_campus_id')
                            .find("option").remove().end().append($('<option value = "">Please select Campus</option>'));  
                        $.each(e, function(key, value) {   
                            $('#parent_campus_id')
                                .append($('<option>', { value : key })
                                .text(value)); 
                        });
                    },
                });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/front/campaign/campaigns/_form.blade.php ENDPATH**/ ?>