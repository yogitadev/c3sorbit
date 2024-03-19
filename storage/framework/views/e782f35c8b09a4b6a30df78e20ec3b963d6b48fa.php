<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $__env->yieldContent('page_title'); ?> | <?php echo e(env('APP_NAME')); ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="<?php echo e(asset('themes/front/css/all.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
        <?php echo $__env->yieldContent('page_css'); ?>
        <!--end::Global Stylesheets Bundle-->
        <link rel="shortcut icon" href="<?php echo e(asset('themes/front/images/favicon.ico')); ?>" type="image/x-icon" />
    </head>
    <body>
        <div class="container">
            <h2>Application Form</h2>
            <div class="row">
                <div class="separator my-5"></div>
                    <?php echo $__env->yieldContent('sub_header'); ?>
                <div class="separator my-5"></div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                <span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                            transform="rotate(90 13 6)" fill="currentColor" />
                        <path
                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        <!--end::Scrolltop-->
        <script src="<?php echo e(asset('themes/front/js/all.min.js')); ?>"></script>

        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
        <script>
            Fancybox.bind("[data-fancybox]", {
                // Your options go here
            });
        </script>


        <script src="https://kit.fontawesome.com/d440512e1c.js" crossorigin="anonymous"></script>

        
        <?php echo $__env->yieldPushContent('page_js'); ?>

    </body>
</html><?php /**PATH /home/hp/projects/edfyed/resources/views/front/lead_management/students/form_applications/layouts/layout.blade.php ENDPATH**/ ?>