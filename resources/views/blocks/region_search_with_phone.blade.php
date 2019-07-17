@extends('tpl.backend')
<section>
	<div class="zip">
		<div class="zip-box gray">
			<span>Найдите ваш регион</span>
{{--			<div class="communication-callback_col">
				<label>
					<input class="region-search" type="text" placeholder="Ваш регион...">
					<button class="region-sbt"><b>Да</b></button>
				</label>
				<ul class="regions-list"></ul>
			</div>--}}
			<select rel="region-links" class="simple wider">
                @foreach(\App\Admin\Controllers\SiteController::regions() as $region)
                    <option  @if(is_numeric(strpos(request()->getHost(),$region->url))) selected @endif value="{{$region->url}}">{{$region['region']}}</option>
                @endforeach
			</select>

			<span>Или позвоните: <em>{{REGION['phone']}}</em></span>
		</div>
	</div>
</section>
