<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <div class="alert-text">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>
<?php /**PATH /home/hp/projects/c3sorbit/resources/views/admin/includes/formErrors.blade.php ENDPATH**/ ?>