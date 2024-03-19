<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Name</label>
        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Email</label>
        <?php echo Form::text('email', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Mobile Number</label>
        <?php echo Form::text('mobile_number', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Website Url</label>
        <?php echo Form::text('website_url', null, ['class' => 'form-control']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Logo</label>
        <?php echo Form::file('media', ['class' => 'form-control','accept' => '.png, .jpg, .jpeg, .pdf','required' => isset($item) && !is_null($item->media) ? false : true ]); ?>


        <?php if(isset($item) && !is_null($item) && !is_null($item->media)): ?>
            <div class="thumb">
                <a data-fancybox href="<?php echo e($item->media->getUrl()); ?>">
                    <img src="<?php echo e($item->media->fitThumbUrl()); ?>" class="img-thumbnail" class="clearfix" />
                </a>
            </div>
        <?php endif; ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Facebook Url</label>
        <?php echo Form::text('facebook_url', null, ['class' => 'form-control']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Instagram Url</label>
        <?php echo Form::text('instagram_url', null, ['class' => 'form-control']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Linkedin Url</label>
        <?php echo Form::text('linkedin_url', null, ['class' => 'form-control']); ?>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Youtube Url</label>
        <?php echo Form::text('youtube_url', null, ['class' => 'form-control']); ?>

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
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/campaign/institutions/_form.blade.php ENDPATH**/ ?>