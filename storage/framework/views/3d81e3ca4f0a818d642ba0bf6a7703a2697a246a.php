<div class="row">
    <div class="col-md-6 mb-5">

        <label class="form-label required fs-6">Title</label>
        <?php echo Form::text('title', null, ['class' => 'form-control bg-light', 'required' => false, 'readonly' => true]); ?>


    </div>

    <div class="col-md-6 mb-5">

        <label class="form-label fs-6">Sub Title</label>
        <?php echo Form::text('sub_title', null, ['class' => 'form-control']); ?>


    </div>
</div>



<div class="separator my-5"></div>

<div class="row">
    <div class="col-md-12 mb-5">

        <label class="form-label fs-6">Short Content</label>
        <?php echo Form::textarea('short_content', null, ['class' => 'form-control h-100px']); ?>


    </div>
    <div class="col-md-12 mb-5">

        <label class="form-label fs-6">Content</label>
        <?php echo Form::textarea('content', null, ['class' => 'form-control ckeditor']); ?>

    </div>

</div>


<div class="separator my-5"></div>

<h3 class="mb-5">Meta Information</h3>

<div class="row">
    <div class="col-md-6 mb-5">

        <label class="form-label fs-6">Meta Title</label>
        <?php echo Form::text('meta_title', null, ['class' => 'form-control']); ?>


    </div>
    <div class="col-md-6 mb-5">

        <label class="form-label fs-6">Meta Keywords</label>
        <?php echo Form::text('meta_keywords', null, ['class' => 'form-control']); ?>


    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-5">

        <label class="form-label fs-6">Meta Content</label>
        <?php echo Form::textarea('meta_content', null, ['class' => 'form-control h-100px']); ?>


    </div>
</div>

<div class="separator my-5"></div>

<div class="row">
    <?php if(!isset($item) || (isset($item) && $item->name != 'homepage')): ?>
        <div class="col-md-6 mb-5">
            <label class="form-label fs-6">Banner</label>
            <?php echo Form::file('banner', ['class' => 'form-control mb-2', 'accept' => '.png, .jpg, .jpeg']); ?>


            <?php if(isset($item) && !is_null($item) && !is_null($item->banner)): ?>
                <div class="thumb">
                    <a data-fancybox href="<?php echo e($item->banner->getUrl()); ?>">
                        <img src="<?php echo e($item->banner->fitThumbUrl()); ?>" class="img-thumbnail" class="clearfix" />
                    </a>
                    <a href="<?php echo e(route('delete-media', ['unique_id' => $item->banner->unique_id])); ?>"
                        data-token="<?php echo e(csrf_token()); ?>" class="badge badge-danger text-white delete-media-btn"><i
                            class="fas fa-times text-white"></i></a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>


    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Media</label>
        <?php echo Form::file('media', ['class' => 'form-control mb-2', 'accept' => '.png, .jpg, .jpeg']); ?>


        <?php if(isset($item) && !is_null($item) && !is_null($item->media)): ?>
            <div class="thumb">
                <a data-fancybox href="<?php echo e($item->media->getUrl()); ?>">
                    <img src="<?php echo e($item->media->fitThumbUrl()); ?>" class="img-thumbnail" class="clearfix" />
                </a>
                <a href="<?php echo e(route('delete-media', ['unique_id' => $item->media->unique_id])); ?>"
                    data-token="<?php echo e(csrf_token()); ?>" class="badge badge-danger text-white delete-media-btn"><i
                        class="fas fa-times text-white"></i></a>
            </div>
        <?php endif; ?>
    </div>

    <?php if(!isset($item) || (isset($item) && $item->name == 'homepage')): ?>
    <div class="col-md-6 mb-5">
        <label class="form-label fs-6">Brochure</label>
        <?php echo Form::file('about_media', ['class' => 'form-control mb-2', 'accept' => '.pdf']); ?>


        <?php if(isset($item) && !is_null($item) && !is_null($item->about_media)): ?>
            <div class="thumb">
                <a data-fancybox href="<?php echo e($item->about_media->getUrl()); ?>">
                    <img src="<?php echo e(asset('/themes/admin/images/pdf-icon.jpg')); ?>" class="img-thumbnail" width='70' />
                </a>
                <a href="<?php echo e(route('delete-media', ['unique_id' => $item->about_media->unique_id])); ?>"
                    data-token="<?php echo e(csrf_token()); ?>" class="badge badge-danger text-white delete-media-btn"><i
                        class="fas fa-times text-white"></i></a>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>


<?php $__env->startPush('page_js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('themes/admin/third_party/ckeditor5/build/ckeditor.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/admin/editor.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/cms/pages/_form.blade.php ENDPATH**/ ?>