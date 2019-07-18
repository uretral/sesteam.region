@extends('tpl.tpl')
@section('content')
<div class="header-space"></div>
{!! \App\Models\Statics\Breadcrumbs::resource($data->name) !!}
{!! \App\Models\Statics\Share::block() !!}
<main>
    <div>
        <div class="wide">
            <div class="wide-content">
                <h1>{{$data->name}}</h1>
                {!! $data->introtext !!}
                    @foreach($data->tables as $table)
                    <div class="table">
                        <div class="table-header">
                            <div class="table-link">
                                <a href="{{$table->link}}">{{$table->name}}</a>
                            </div>
                        </div>
                        <div class="table-col imaged" style="background-image: url('/storage/{{$table->img}}')">
{{--                            <img src="/storage/{{$table->img}}" alt="img"/>--}}
                        </div>
                        <div class="table-col">
                            <div class="table-txt">{!! $table->col_1 !!}</div>
                        </div>
                        <div class="table-col">
                            <div class="table-txt">{!! $table->col_2 !!}</div>
                        </div>
                        <div class="table-col">
                            <div class="table-txt">{!! $table->col_3 !!}</div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</main>
@include('blocks.region_search_with_phone')
@endsection
