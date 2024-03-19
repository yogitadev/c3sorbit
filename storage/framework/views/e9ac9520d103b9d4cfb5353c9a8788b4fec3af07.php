<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $__env->yieldContent('page_title'); ?> | <?php echo e(env('APP_NAME')); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?php echo e(asset('themes/admin/css/all.min.css')); ?>" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldContent('page_css'); ?>
    <!--end::Global Stylesheets Bundle-->

    <link rel="shortcut icon" href="<?php echo e(asset('themes/admin/images/favicon.ico')); ?>" type="image/x-icon" /></head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" >
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root ">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(<?php echo e(asset('themes/admin/assets/media/illustrations/sketchy-1/14.png')); ?>">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20 text-center">
                <!--begin::Logo-->
                <a href="/" class="mb-12">
                    <img alt="Logo" src="<?php echo e(asset('themes/admin/images/logo.gif')); ?>" class="w-25"/>
                </a>
                <!--end::Logo-->


                <?php echo $__env->yieldContent('content'); ?>


            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->


    <script src="<?php echo e(asset('themes/admin/js/all.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('page_js'); ?>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/auth/layouts/layout.blade.php ENDPATH**/ ?>