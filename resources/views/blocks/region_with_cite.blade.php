@extends('tpl.backend')
<section>
	<div>
		<div class="communication">
			<div class="communication-callback">
				<span>Найдите ваш регион</span>
				<select rel="region-links" class="simple inter">
					@foreach(\App\Admin\Controllers\SiteController::regions() as $region)
						<option  @if(is_numeric(strpos(request()->getHost(),$region->url))) selected @endif value="{{$region->url}}">{{$region['region']}}</option>
					@endforeach
				</select>

				<span>Или звоните: <em>{{REGION['phone']}}</em></span>
			</div>
			<div class="communication-feedback">
				<mark>
{{--					<span>Сергей Новиков г. Москва</span>--}}
					<cite>
						Сегодня чистота заведения и его уют - первое, что влияет на репутацию и лояльность
					</cite>

				</mark>
				<a class="btn" href="{{MENU[22]['link']}}"><span>Подробнее</span></a>
			</div>
			<div class="hr"></div>
		</div>
	</div>
</section>
