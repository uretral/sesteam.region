@extends('tpl.backend')
{{--@dump($data)--}}
<section>
    <div class="triple both">
        <div class="triple-header">
            @isset($data->sign)
                <div class="count">
                    <div class="count-info">
                        <span><em>{{$data->sign}}</em></span>
                    </div>
                </div>
            @endisset
            @isset($data->title)
                    <h2 class="tall">
                        {!! $data->title !!}
                    </h2>
            @endisset
        </div>
        <div class="triple-items">
            <div class="triple-item border">
                @isset($data->col_1_name)
                    <h3>{!! $data->col_1_name !!}</h3>
                @endisset
                @isset($data->col_1_text)
                    <p>{!! $data->col_1_text !!}</p>
                @endisset
                @isset($data->col_1_link)
                        <a href="{!! $data->col_1_link !!}">Больше информации</a>
                @endisset
            </div>
            <div class="triple-item border">
                @isset($data->col_2_name)
                    <h3>{!! $data->col_2_name !!}</h3>
                @endisset
                @isset($data->col_2_text)
                    <p>{!! $data->col_2_text !!}</p>
                @endisset
                @isset($data->col_2_link)
                    <a href="{!! $data->col_2_link !!}">Больше информации</a>
                @endisset
            </div>
            <div class="triple-item border">
                @isset($data->col_3_name)
                    <h3>{!! $data->col_3_name !!}</h3>
                @endisset
                @isset($data->col_3_text)
                    <p>{!! $data->col_3_text !!}</p>
                @endisset
                @isset($data->col_3_link)
                    <a href="{!! $data->col_3_link !!}">Больше информации</a>
                @endisset
            </div>
        </div>
    </div>
</section>
