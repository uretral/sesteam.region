@extends('tpl.backend')
<section>
    <div>
        <div class="expertise">
            <div class="expertise-box">
                <h2>{{$data->name}}</h2>
                <p>{{$data->intro}}</p>
                <ul class="expertise-items">
                    @foreach($data->resourceData as $item)
                        <li>
                            <a href="{{$data->link}}/{{$item->alias}}">
                                @if($item->img)
                                    <img src="/storage/{{$item->img}}" alt="img">
                                    <span>{{$item->name}}</span>
                                @else
                                    {{$item->alias}}
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
