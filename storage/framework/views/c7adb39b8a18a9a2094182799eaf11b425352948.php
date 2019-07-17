<ul class="main_nav">
    <?php $__currentLoopData = MENU[5]['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($popular['menu']): ?>
            <li>
                <a class="<?php echo e($popular['active'], false); ?>" href="<?php echo e($popular['link'], false); ?>"><span><?php echo e($popular['name'], false); ?></span></a>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <li class="root">
        <?php
            $class = '';
            foreach(MENU[5]['child'] as $i){
             if($i['active'] == 'active' && !$i['menu']){
             $class = 'active';
             break;
             }
            }
        ?>

        <a class="<?php echo e($class, false); ?>" href="javascript:"><span>Услуги</span></a>

        <ul class="sub-menu">
            <li>
                <h4>Уничтожение вредителей</h4>
                <ul class="sub-menu-level">
                    <li>
                        Насекомые
                    </li>
                    <li class="sub-menu-double">
                        <ul class="sub-menu-vertical">
                            <?php $__currentLoopData = MENU[5]['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(($k % 2) == 0 && $item['parent'] == 1 && !$item['menu']): ?>
                                    <li><a class="<?php echo e($item['active'], false); ?>" href="<?php echo e($item['link'], false); ?>"><?php echo e($item['name'], false); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <ul class="sub-menu-vertical">
                            <?php $__currentLoopData = MENU[5]['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(($k % 2) != 0 && $item['parent'] == 1 && !$item['menu']): ?>
                                    <li><a class="<?php echo e($item['active'], false); ?>" href="<?php echo e($item['link'], false); ?>"><?php echo e($item['name'], false); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <li>
                        Грызуны
                    </li>
                    <li class="sub-menu-double">
                        <ul class="sub-menu-vertical">
                            <?php $__currentLoopData = MENU[5]['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(($k % 2) == 0 && $item['parent'] == 2 && !$item['menu']): ?>
                                    <li><a class="<?php echo e($item['active'], false); ?>" href="<?php echo e($item['link'], false); ?>"><?php echo e($item['name'], false); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <ul class="sub-menu-vertical">
                            <?php $__currentLoopData = MENU[5]['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(($k % 2) != 0 && $item['parent'] == 2 && !$item['menu']): ?>
                                    <li><a class="<?php echo e($item['active'], false); ?>" href="<?php echo e($item['link'], false); ?>"><?php echo e($item['name'], false); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <span>&nbsp;</span>
                <ul class="sub-menu-level">
                    <?php $__currentLoopData = MENU[5]['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item['parent'] == 3 && !$item['menu']): ?>
                            <li><a class="<?php echo e($item['active'], false); ?>" href="<?php echo e($item['link'], false); ?>"><?php echo e($item['name'], false); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>














        </ul>

    </li>
    <li class="root ">
        <a href="<?php echo e(MENU[2]['link'], false); ?>"><span><?php echo e(MENU[2]['name'], false); ?></span></a>

        <ul class="sub-menu">
            <li>


                <ul class="sub-menu-level">
                    <?php $__currentLoopData = \App\Models\Resources\Library::orderBy('sort')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->menu_position == 1): ?>
                            <li>
                                <a href="<?php echo e($item->link, false); ?>"><?php echo e($item->name, false); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </li>
            <li>



                <ul class="sub-menu-level">
                    <?php $__currentLoopData = \App\Models\Resources\Library::orderBy('sort')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->menu_position == 2): ?>
                            <li>
                                <a href="<?php echo e($item->link, false); ?>"><?php echo e($item->name, false); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </li>
        </ul>
    </li>
    <li>
        <a class="<?php echo e(MENU[7]['active'], false); ?>" href="<?php echo e(MENU[7]['link'], false); ?>"><span><?php echo e(MENU[7]['name'], false); ?></span></a>
    </li>
</ul>
<?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/tpl/menu_home.blade.php ENDPATH**/ ?>