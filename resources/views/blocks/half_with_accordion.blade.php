@extends('tpl.backend')
<section>
    <div class="half">
        <div class="half-bg">
            <div class="half-bg-img @if($data->to_right) right @endif">
                <img src="/storage/{{$data->img}}" alt=""/>
            </div>

        </div>
        <div class="half-items">
            <div class="half-item @if($data->to_right) covered @endif">
                @if($data->to_right)
                    <div class="accordion">
                        @isset($data->helpers)
                            @foreach($data->helpers as $k => $helper)
                                <input type="radio" id="{{$data->nr}}-{{$helper->id}}" @if($k == 0) checked @endif  name="{{$data->nr}}">
                                <label for="{{$data->nr}}-{{$helper->id}}">{{$helper->name}}</label>
                                <div>
                                    <p>{{$helper->h_text}}</p>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                @else
                    <div class="shadow-txt">
                        @isset($data->heading)
                            <h2>{{$data->heading}}</h2>
                        @endisset
                        @isset($data->text)
                            {!! $data->text !!}
                        @endisset
                    </div>
                @endif
            </div>
            <div class="half-item @if(!$data->to_right) covered @endif">
                @if(!$data->to_right)
                    <div class="accordion">
                        @isset($data->helpers)
                            @foreach($data->helpers as $k => $helper)
                                <input type="radio" id="{{$data->nr}}-{{$helper->id}}" @if($k == 0) checked @endif  name="{{$data->nr}}">
                                <label for="{{$data->nr}}-{{$helper->id}}">{{$helper->name}}</label>
                                <div>
                                    <p>{{$helper->h_text}}</p>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                @else
                    <div class="shadow-txt">
                        @isset($data->heading)
                            <h2>{{$data->heading}}</h2>
                        @endisset
                        @isset($data->text)
                            {!! $data->text !!}
                        @endisset
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
