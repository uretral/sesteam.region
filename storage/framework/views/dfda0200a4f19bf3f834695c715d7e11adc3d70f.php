<section>
    <div class="half">
        <div class="half-bg">
            <div class="half-bg-img <?php if($data->to_right): ?> right <?php endif; ?>">
                <img src="/storage/<?php echo e($data->img, false); ?>" alt=""/>
            </div>

        </div>
        <div class="half-items">
            <div class="half-item <?php if($data->to_right): ?> covered <?php endif; ?>">
                <?php if($data->to_right): ?>
                    <div class="accordion">
                        <?php if(isset($data->helpers)): ?>
                            <?php $__currentLoopData = $data->helpers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $helper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="radio" id="<?php echo e($data->nr, false); ?>-<?php echo e($helper->id, false); ?>" <?php if($k == 0): ?> checked <?php endif; ?>  name="<?php echo e($data->nr, false); ?>">
                                <label for="<?php echo e($data->nr, false); ?>-<?php echo e($helper->id, false); ?>"><?php echo e($helper->name, false); ?></label>
                                <div>
                                    <p><?php echo e($helper->h_text, false); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="shadow-txt">
                        <?php if(isset($data->heading)): ?>
                            <h2><?php echo e($data->heading, false); ?></h2>
                        <?php endif; ?>
                        <?php if(isset($data->text)): ?>
                            <?php echo $data->text; ?>

                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="half-item <?php if(!$data->to_right): ?> covered <?php endif; ?>">
                <?php if(!$data->to_right): ?>
                    <div class="accordion">
                        <?php if(isset($data->helpers)): ?>
                            <?php $__currentLoopData = $data->helpers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $helper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="radio" id="<?php echo e($data->nr, false); ?>-<?php echo e($helper->id, false); ?>" <?php if($k == 0): ?> checked <?php endif; ?>  name="<?php echo e($data->nr, false); ?>">
                                <label for="<?php echo e($data->nr, false); ?>-<?php echo e($helper->id, false); ?>"><?php echo e($helper->name, false); ?></label>
                                <div>
                                    <p><?php echo e($helper->h_text, false); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="shadow-txt">
                        <?php if(isset($data->heading)): ?>
                            <h2><?php echo e($data->heading, false); ?></h2>
                        <?php endif; ?>
                        <?php if(isset($data->text)): ?>
                            <?php echo $data->text; ?>

                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('tpl.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/blocks/half_with_accordion.blade.php ENDPATH**/ ?>