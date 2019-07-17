<section>
    <div class="wide">
        <div class="wide-box bb origin">
            <a rel="modal" class="pest-menu-callback btn scrolled" href="javascript:;"><span>обратный звонок</span></a>
            <div class="pest-menu-items">
                <?php if($data): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item->link, false); ?>" class="pest-menu-item">
                            <img src="/storage/<?php echo e($item->img, false); ?>" alt="img">
                            <span><?php echo $item->name; ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php echo $__env->make('tpl.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/blocks/iconed_link.blade.php ENDPATH**/ ?>