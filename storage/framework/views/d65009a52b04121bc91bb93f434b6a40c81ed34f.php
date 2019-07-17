<section>
	<div>
		<div class="communication">
			<div class="communication-callback">
				<span>Найдите ваш регион</span>
				<select rel="region-links" class="simple inter">
					<?php $__currentLoopData = \App\Admin\Controllers\SiteController::regions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option  <?php if(is_numeric(strpos(request()->getHost(),$region->url))): ?> selected <?php endif; ?> value="<?php echo e($region->url, false); ?>"><?php echo e($region['region'], false); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<span>Или звоните: <em><?php echo e(REGION['phone'], false); ?></em></span>
			</div>
			<div class="communication-feedback">
				<mark>

					<cite>
						Сегодня чистота заведения и его уют - первое, что влияет на репутацию и лояльность
					</cite>

				</mark>
				<a class="btn" href="<?php echo e(MENU[22]['link'], false); ?>"><span>Подробнее</span></a>
			</div>
			<div class="hr"></div>
		</div>
	</div>
</section>

<?php echo $__env->make('tpl.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/blocks/region_with_cite.blade.php ENDPATH**/ ?>