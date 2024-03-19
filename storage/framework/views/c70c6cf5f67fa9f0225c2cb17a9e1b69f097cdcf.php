<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(env('APP_NAME')); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="<?php echo e(asset('themes/front/images/favicon.png')); ?>" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link rel="stylesheet" href="<?php echo e(asset('themes/front/')); ?>/css/all.min.css" />


</head>



<?php echo $__env->yieldContent('content'); ?>




<script src="<?php echo e(asset('themes/front/')); ?>/js/all.min.js"></script>

<script src="https://kit.fontawesome.com/cb9e169f93.js" crossorigin="anonymous"></script>
</body>

</html>
<?php /**PATH /home/hp/projects/edfyed/resources/views/errors/layout.blade.php ENDPATH**/ ?>