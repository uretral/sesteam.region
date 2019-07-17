<ul class="main_nav">
    @foreach(MENU[5]['child'] as $popular)
        @if($popular['menu'])
            <li>
                <a class="{{$popular['active']}}" href="{{$popular['link']}}"><span>{{$popular['name']}}</span></a>
            </li>
        @endif
    @endforeach
    <li class="root">
        @php
            $class = '';
            foreach(MENU[5]['child'] as $i){
             if($i['active'] == 'active' && !$i['menu']){
             $class = 'active';
             break;
             }
            }
        @endphp

        <a class="{{$class}}" href="javascript:"><span>Услуги</span></a>

        <ul class="sub-menu">
            <li>
                <h4>Уничтожение вредителей</h4>
                <ul class="sub-menu-level">
                    <li>
                        Насекомые
                    </li>
                    <li class="sub-menu-double">
                        <ul class="sub-menu-vertical">
                            @foreach(MENU[5]['child'] as $k => $item)
                                @if(($k % 2) == 0 && $item['parent'] == 1 && !$item['menu'])
                                    <li><a class="{{$item['active']}}" href="{{$item['link']}}">{{$item['name']}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <ul class="sub-menu-vertical">
                            @foreach(MENU[5]['child'] as $k => $item)
                                @if(($k % 2) != 0 && $item['parent'] == 1 && !$item['menu'])
                                    <li><a class="{{$item['active']}}" href="{{$item['link']}}">{{$item['name']}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        Грызуны
                    </li>
                    <li class="sub-menu-double">
                        <ul class="sub-menu-vertical">
                            @foreach(MENU[5]['child'] as $k => $item)
                                @if(($k % 2) == 0 && $item['parent'] == 2 && !$item['menu'])
                                    <li><a class="{{$item['active']}}" href="{{$item['link']}}">{{$item['name']}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <ul class="sub-menu-vertical">
                            @foreach(MENU[5]['child'] as $k => $item)
                                @if(($k % 2) != 0 && $item['parent'] == 2 && !$item['menu'])
                                    <li><a class="{{$item['active']}}" href="{{$item['link']}}">{{$item['name']}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <span>&nbsp;</span>
                <ul class="sub-menu-level">
                    @foreach(MENU[5]['child'] as $k => $item)
                        @if($item['parent'] == 3 && !$item['menu'])
                            <li><a class="{{$item['active']}}" href="{{$item['link']}}">{{$item['name']}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
{{--            <li>--}}
{{--                <h4>Страховой полис</h4>--}}
{{--                <ul class="sub-menu-level">--}}
{{--                    <li>--}}
{{--                        <a href="javascript:">Обслуживание 24/7</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="javascript:">Ежемесячный аудит</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="javascript:">Скидка по полису 20%</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>

    </li>
    <li class="root ">
        <a href="{{MENU[2]['link']}}"><span>{{MENU[2]['name']}}</span></a>

        <ul class="sub-menu">
            <li>
{{--                <h4>ПОПУЛЯРНЫЕ ВРЕДИТЕЛИ</h4>--}}

                <ul class="sub-menu-level">
                    @foreach(\App\Models\Resources\Library::orderBy('sort')->get() as $item)
                        @if($item->menu_position == 1)
                            <li>
                                <a href="{{$item->link}}">{{$item->name}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>

            </li>
            <li>

{{--                <span>&nbsp;</span>--}}

                <ul class="sub-menu-level">
                    @foreach(\App\Models\Resources\Library::orderBy('sort')->get() as $item)
                        @if($item->menu_position == 2)
                            <li>
                                <a href="{{$item->link}}">{{$item->name}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>

            </li>
        </ul>
    </li>
    <li>
        <a class="{{MENU[7]['active']}}" href="{{MENU[7]['link']}}"><span>{{MENU[7]['name']}}</span></a>{{--Почему мы--}}
    </li>
</ul>
