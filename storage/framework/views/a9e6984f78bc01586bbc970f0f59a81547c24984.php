<?php if($backend): ?>
    <link href="<?php echo e(asset('less/style.css'), false); ?>" rel="stylesheet">
<?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>
<?php if($backend): ?>
    <script src="<?php echo e(asset('js/jq.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/script.js'), false); ?>"></script>
<?php endif; ?>
<?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/tpl/backend.blade.php ENDPATH**/ ?>