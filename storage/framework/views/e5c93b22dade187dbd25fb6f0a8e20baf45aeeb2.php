<section class="eee">
    <div class="wide banner">
        <div class="wide-box origin">
            <img src="/storage/<?php echo e($data->img, false); ?>" alt="banner"/>
			<div class="banner-slogan">
				<cite>
					<?php echo $data->cite; ?>

				</cite>
			</div>


		</div>
	</div>
</section>



<?php echo $__env->make('tpl.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s/sesteam/region.sesteam.ru/resources/views/blocks/banner.blade.php ENDPATH**/ ?>