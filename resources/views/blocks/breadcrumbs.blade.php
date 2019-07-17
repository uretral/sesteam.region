@extends('tpl.backend')
<section>
	<div class="breadcrumbs">
		<div class="breadcrumbs-box">
			<a href="/">Главная</a>
			<em>»</em>
			@isset($data)
				@foreach($data as $link => $name)
					@if($link != 'last')
						<a href="{{$link}}">{{$name}}</a>
						<em>»</em>
					@else
						<span>{{$name}}</span>
					@endif
				@endforeach
			@endisset
		</div>
	</div>
</section>



