@extends('tpl.backend')

<section>
    <div class="half @if(!$data->mobile_img) no-image @endif">
        <div class="half-bg">
            <div class="half-bg-img @if($data->to_right) right @endif">
                <img src="/storage/{{$data->img}}" alt=""/>
            </div>
        </div>
        <div class="half-items">
            <div class="half-item @if($data->to_right) covered @endif">
                <div class="@if($data->to_right) txt @else shadow-txt @endif">
                    @isset($data->left_heading)
                        <h2>{{$data->left_heading}}</h2>
                    @endisset
                    @isset($data->left_text)
                        {!! $data->left_text !!}
                    @endisset
                </div>

            </div>
            <div class="half-item @if(!$data->to_right) covered @endif">
                <div class="@if(!$data->to_right) txt @else shadow-txt @endif">
                    @isset($data->right_heading)
                        <h2>{{$data->right_heading}}</h2>
                    @endisset
                    @isset($data->right_text)
                        {!! $data->right_text !!}
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>
