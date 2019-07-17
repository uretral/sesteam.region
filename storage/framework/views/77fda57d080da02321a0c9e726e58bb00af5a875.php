<section>
    <div class="half <?php if(!$data->mobile_img): ?> no-image <?php endif; ?>">
        <div class="half-bg">
            <div class="half-bg-img <?php if($data->to_right): ?> right <?php endif; ?>">
                <img src="/storage/<?php echo e($data->img, false); ?>" alt=""/>
            </div>
        </div>
        <div class="half-items">
            <div class="half-item <?php if($data->to_right): ?> covered <?php endif; ?>">
                <div class="<?php if($data->to_right): ?> txt <?php else: ?> shadow-txt <?php endif; ?>">
                    <?php if(isset($data->left_heading)): ?>
                        <h2><?php echo e($data->left_heading, false); ?></h2>
                    <?php endif; ?>
                    <?php if(isset($data->left_text)): ?>
                        <?php echo $data->left_text; ?>

                    <?php endif; ?>
                </div>

            </div>
            <div class="half-item <?php if(!$data->to_right): ?> covered <?php endif; ?>">
                <div class="<?php if(!$data->to_right): ?> txt <?php else: ?> shadow-txt <?php endif; ?>">
                    <?php if(isset($data->right_heading)): ?>
                        <h2><?php echo e($data->right_heading, false); ?></h2>
                    <?php endif; ?>
                    <?php if(isset($data->right_text)): ?>
                        <?php echo $data->right_text; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('tpl.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/blocks/half_with_text.blade.php ENDPATH**/ ?>