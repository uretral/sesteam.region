@extends('tpl.backend')
<section class="eee">
    <div class="wide banner">
        <div class="wide-box origin">
            <img src="/storage/{{$data->img}}" alt="banner"/>
			<div class="banner-slogan">
				<cite>
					{!! $data->cite !!}
				</cite>
			</div>
{{--

			@if($data->timer)
				<div id="clock">
					<div>
						Оставьте заявку в течении
						<span class="minutes"></span> :
						<span class="seconds"></span>
						и получите скидку <span>15%</span>
					</div>
				</div>
			@endif
--}}

		</div>
	</div>
</section>
{{--@php
$uu = \App\Models\Category::root(4)
@endphp
@dump($uu)
@dump(\App\Models\Category::all()->keyBy('id')->toArray())--}}
{{--@dump(\App\Models\Category::root(4))--}}
