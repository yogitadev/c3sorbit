<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">First Name</label>
        <?php echo Form::text('first_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Last Name </label>
        <?php echo Form::text('last_name', null, ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Gender </label>
        <div class="form-check form-check-inline">
            <?php echo Form ::radio('gender','Male',true,['class' => 'form-check-input']); ?>

            <label class="form-check-label" for="Male">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <?php echo Form ::radio('gender','Female',false,['class' => 'form-check-input']); ?>

            <label class="form-check-label" for="Female">Female</label>
        </div>
        <div class="form-check form-check-inline">
            <?php echo Form ::radio('gender','Not Prefer',false,['class' => 'form-check-input']); ?>

            <label class="form-check-label" for="Not Prefer">Not Prefer</label>
        </div>
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Date of Birth</label>
            <?php echo Form::date('dob', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Email</label>
            <?php echo Form::text('email', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Mobile No.</label>
            <?php echo Form::text('mobile_number', null, ['class' => 'form-control','required' => 'true']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label  fs-6">Alternative Email</label>
            <?php echo Form::text('altenative_email', null, ['class' => 'form-control']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Alternative Mobile No.</label>
            <?php echo Form::text('alternative_mobile_number', null, ['class' => 'form-control']); ?>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">User Name</label>
        <?php echo Form::text('username', null, ['class' => isset($item) && !is_null($item->email) ? 'form-control bg-light' : 'form-control', 'required' => true, 'readonly' => isset($item) && !is_null($item->username) ? true : false]); ?>

    </div>
    <?php if(!isset($item)): ?>
    <div class="col-md-6 mb-5">
        <label class="form-label required fs-6">Password</label>
        <?php echo Form::text('password', null , ['class' => 'form-control', 'required' => true]); ?>

    </div>
    <?php endif; ?>
</div>

<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Profile Picture</label>
        <?php echo Form::file('media', ['class' => 'form-control','accept' => '.png, .jpg, .jpeg, .pdf']); ?>


        <?php if(isset($item) && !is_null($item) && !is_null($item->media)): ?>
                <?php if($item->media->file_extension == 'pdf'): ?>
                    <a href="<?php echo e($item->media->getUrl()); ?>" target="_blank">
                        Click to view
                    </a>
                <?php else: ?>
                    <div class="thumb mt-5">
                        <a data-fancybox href="<?php echo e($item->media->getUrl()); ?>">
                            <img src="<?php echo e($item->media->fitThumbUrl()); ?>" class="img-thumbnail" class="clearfix" />
                        </a>
                    </div>
                <?php endif; ?>
        <?php endif; ?>

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
       
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/person/faculties/_form.blade.php ENDPATH**/ ?>