@extends('tpl.backend')
<section>
    <div class="wide">
        <div class="wide-box bb origin">
            <a rel="modal" class="pest-menu-callback btn scrolled" href="javascript:;"><span>обратный звонок</span></a>
            <div class="pest-menu-items">
                @if($data)
                    @foreach($data as $item)
                        <a href="{{$item->link}}" class="pest-menu-item">
                            <img src="/storage/{{$item->img}}" alt="img">
                            <span>{!! $item->name !!}</span>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

