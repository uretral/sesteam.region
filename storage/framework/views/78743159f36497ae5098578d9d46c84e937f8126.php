<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="favicon.ico" />
    <link href="<?php echo e(asset('less/style.css'), false); ?>" rel="stylesheet">
    <title></title>
</head>
<body>

<header>
    <div>
        <div class="header">
            <a class="header-call-btn" href="tel:<?php echo e(REGION['phone_href'], false); ?>"></a>
            <div class="header-logo">
                <a href="<?php echo e(MENU[1]['link'], false); ?>">
                    <img src="<?php echo e(asset('img/logo.jpg'), false); ?>" alt="logo"/>
                </a>
            </div>
            <input type="checkbox" id="topMenuSwitcher"/>
            <label for="topMenuSwitcher">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="header-nav">
                <div class="header-nav-info">
                    <a href="tel:<?php echo e(REGION['phone_href'], false); ?>"><span>Тел: <?php echo e(REGION['phone'], false); ?></span></a>
                    <a href="mailto:<?php echo e(REGION['email'], false); ?>"><span><?php echo e(REGION['email'], false); ?></span></a>

                    <input  type="checkbox" id="mobileSearchSwitcher"/>
                    <label for="mobileSearchSwitcher"><span>Поиск</span>

                        <form class="mobile-search-top" action="<?php echo e(MENU[6]['link'], false); ?>" method="get">
                            <label>
                                <input type="search" name="q" value=""/>
                            </label>
                            <button type="submit"><em>Поиск</em></button>
                        </form>
                    </label>

                    <a href="<?php echo e(MENU[28]['link'], false); ?>"><span>Контакты</span></a>
                </div>
                <div class="header-nav-main">
                    <div class="header-nav-menu">
                        <div class="header-nav-menu_top">
                            <?php if(strpos(url()->current(),'business')): ?>
                                <a href="<?php echo e(MENU[1]['link'], false); ?>">Для дома</a>
                                <a class="<?php echo e(MENU[4]['active'], false); ?>" href="<?php echo e(MENU[4]['link'], false); ?>">Для бизнеса</a>
                            <?php else: ?>
                                <a class="<?php echo e(MENU[1]['active'], false); ?>" href="<?php echo e(MENU[1]['link'], false); ?>">Для дома</a>
                                <a href="<?php echo e(MENU[4]['link'], false); ?>">Для бизнеса</a>
                            <?php endif; ?>
                        </div>
                        <div class="header-nav-menu_main">
                            <input type="checkbox" id="searchSwitcher"/>
                            <label for="searchSwitcher"></label>
                            <form class="search-top" action="<?php echo e(MENU[6]['link'], false); ?>">
                                <label>
                                    <input type="search" name="q" value=""/>
                                </label>
                                <button type="submit"><em>Поиск</em></button>
                            </form>
                            <?php if(strpos(url()->current(),'business')): ?>
                                <?php echo $__env->make('tpl.menu_business', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <?php echo $__env->make('tpl.menu_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="header-nav-callback">
                        <a href="javascript:" class="red-callback" rel="modal" data-action="callback" >Оставить<span>Заявку</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>




<?php echo $__env->yieldContent('content'); ?>


<section class="linker">
	<div>
		<div class="linker-items">
			<div class="linker-watsapp">
                <a title="Whatsapp" href="whatsapp://send?phone=<?php echo e(REGION['whatsapp'], false); ?>">
                    <img src="/img/wasend.png" alt="watsapp send"/>
                </a>
            </div>

			<div class="linker-callback">
                <a href="javascript:" rel="modal">
                    <span>оставить заявку</span>
                </a>
            </div>
		</div>
	</div>
</section>


<footer>

    <div class="footer">
        <div class="footer-box">
            <div class="footer-links">
                <div class="footer-links_media">
                    <h5>SESTEAM</h5>
                    <ul>
                        <li>
                            <a href="<?php echo e(MENU[7]['link'], false); ?>"><span><?php echo e(MENU[7]['name'], false); ?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(MENU[26]['link'], false); ?>"><span><?php echo e(MENU[26]['name'], false); ?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(MENU[27]['link'], false); ?>"><span><?php echo e(MENU[27]['name'], false); ?></span></a>
                        </li>
                    </ul>
                </div>

                <div class="footer-links_socials">
                    <h5>Мы в соц.сетях</h5>

                    <ul>
                        <?php $__currentLoopData = \App\Models\Statics\Share::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a rel="nofollow" href="<?php echo e($item->link, false); ?>" class="<?php echo e($item->name, false); ?>" target="_blank">facebook</a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="footer-links_other">
                    <h5>Поддержка</h5>
                    <ul>
                        <li>
                            <a href="<?php echo e(MENU[28]['link'], false); ?>"><span><?php echo e(MENU[28]['name'], false); ?></span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(MENU[22]['link'], false); ?>"><span><?php echo e(MENU[22]['name'], false); ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyrights">
                <p>© <?php echo e(date ( 'Y' ), false); ?> Ses Team</p>
            </div>
            <div class="footer-terms">
                <a href="<?php echo e(MENU[31]['link'], false); ?>">Условия пользования</a>
                <em>|</em>
                <a href="<?php echo e(MENU[30]['link'], false); ?>">Политика конфедициальности</a>
            </div>
        </div>
    </div>
    <section class="modal">
    	<div>
    		<div class="modal-wrapper">
                <div class="modal-content">
                    <a href="javascript:;" class="modal-close"></a>
                    <div class="callback-form form">
                        <form action="javascript:" id="callback">
                            
                            <input type="hidden" name="action" value="callback"/>
                            <input type="hidden" name="discount" value="без скидки">
                            <label><input type="hidden" name="page" value="<?php echo e(request()->fullUrl(), false); ?>"/></label>
                            <label><input type="text" name="name" placeholder="Ваше имя"/></label>
                            <label><input type="tel" name="phone" placeholder="Ваш телефон"/></label>
                            <label><input type="submit" value="Отправить"/></label>
                        </form>
                    </div>
                </div>
    		</div>
    	</div>
    </section>
</footer>

<script src="<?php echo e(asset('js/jq.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/owl.carousel.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/jquery.inputmask.bundle.min.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/script.js'), false); ?>"></script>
</body>
</html>
<?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/tpl/tpl.blade.php ENDPATH**/ ?>