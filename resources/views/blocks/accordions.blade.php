@extends('tpl.backend')
<section>
    <div class="double top">
        <div class="double-header">
            <h2>{{$data->name}}</h2>
            <p>
                {{$data->introtext}}
            </p>
        </div>

        <div class="double-items ">
            <div class="double-item bottom">
                <div class="accordion">

                    @php $left = 0   @endphp
                    @foreach($data->accordion as $k => $item)
                        @if(key_exists('position',$item))
                            <input type="radio" id="{{$data->id}}-accordion-{{$k}}" name="{{$data->id}}-accordion-left" @if($left == 0 ) checked @endif>
                            <label for="{{$data->id}}-accordion-{{$k}}">{{$item['name']}}</label>
                            <div>
                                <p>{{$item['text']}}</p>
                                @if(key_exists('link',$item))
                                    <a href="{{$item['link']}}">Узнать больше &gt;</a>
                                @endif
                            </div>
                            @php $left++ @endphp
                        @endif
                    @endforeach
                    @php  unset($left)  @endphp
                </div>
            </div>
            <div class="double-item bottom">
                <div class="accordion">
                    @php $right = 0   @endphp
                    @foreach($data->accordion as $k => $item)
                        @if(!key_exists('position',$item))
                            <input type="radio" id="{{$data->id}}-accordion-{{$k}}" name="{{$data->id}}-accordion-right" @if($right == 0 ) checked @endif>
                            <label for="{{$data->id}}-accordion-{{$k}}">{{$item['name']}}</label>
                            <div>
                                <p>{{$item['text']}}</p>
                                @if(key_exists('link',$item))
                                    <a href="{{$item['link']}}">Узнать больше &gt;</a>
                                @endif
                            </div>
                            @php $right++ @endphp
                        @endif

                    @endforeach
                    @php  unset($right)  @endphp
                </div>
            </div>
        </div>
    </div>
</section>
