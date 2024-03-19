<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(env('APP_NAME')); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="<?php echo e(asset('themes/front/images/favicon.png')); ?>" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="<?php echo e(asset('themes/admin/css/all.min.css')); ?>" rel="stylesheet" type="text/css" />


</head>


<body id="kt_body" class="auth-bg">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-center flex-column-fluid p-10">

            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>


    <script src="<?php echo e(asset('themes/admin/js/all.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/errors/admin/layout.blade.php ENDPATH**/ ?>