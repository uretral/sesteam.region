
<ul class="main_nav">

    <li class="root">
        <a class="{{MENU[8]['active']}}" href="javascript:"><span>Сферы бизнеса</span></a>
        <ul class="sub-menu">

            <li>
                <ul class="sub-menu-level">
                    @foreach(MENU[10]['child'] as $branchKey => $branch)
                        @if(($branchKey % 2) == 0)
                            <li>
                                <a class="{{$branch['active']}}" href="{{$branch['link']}}">{{$branch['name']}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            <li>
                <ul class="sub-menu-level">
                    @foreach(MENU[10]['child'] as $branchKey => $branch)
                        @if(($branchKey % 2) != 0)
                            <li>
                                <a class="{{$branch['active']}}" href="{{$branch['link']}}">{{$branch['name']}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

        </ul>
    </li>

    <li class="root">
        <a class="{{MENU[9]['active']}}" href="javascript:"><span>Наши услуги</span></a>
        <ul class="sub-menu">
            @php
                $arPos = [];
                foreach (MENU[21]['child'] as $position){
                $arPos[$position['menu_position']][] = $position;
                }
                ksort($arPos)
            @endphp

            @foreach($arPos as $posKey => $servicesCategories)
                <li>
                    <ul class="sub-menu-level">

                @foreach($servicesCategories as $category)
                                @php
                                    $arChild = [];
                                    foreach (MENU[11]['child'] as $child)
                                    if($child['parent'] == $category['id']){
                                    $arChild[] = $child;
                                    }
                                @endphp

                            <h4>{{$category['name']}}</h4>
                                <li class="underlined">
                            <li class="sub-menu-double">
                                <ul class="sub-menu-vertical">

                                    @foreach($arChild as $k => $service)
                                        @if($service['parent'] == $category['id'])
                                            <li>
                                                <a class="{{$service['active']}}" href="{{$service['link']}}">
                                                    @isset($service['name_short'])
                                                        {{$service['name_short']}}
                                                    @endisset
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>

                @endforeach
                    </ul>
                </li>
            @endforeach

        </ul>

    </li>


    <li class="root">
        <a class="{{MENU[22]['active']}}" href="{{MENU[22]['link']}}"><span>{{MENU[22]['name']}}</span></a>

        <ul class="sub-menu">
            <li>
                <ul class="sub-menu-level">
                    <h4>Стикер SESTEAM</h4>
                    @foreach(MENU as  $sticker)
                        @if($sticker['parent']  == 22)
                            <li>
                                <a class="{{$sticker['active']}}" href="{{$sticker['link']}}">{{$sticker['name']}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
        </ul>
    </li>


    <li>
        <a class="{{MENU[12]['active']}}" href="{{MENU[12]['link']}}"><span>{{MENU[12]['name']}}</span></a>
    </li>
{{--    <li>--}}
{{--        <a href="{{\App\Menu::root(7)}}"><span>Библиотека</span></a>--}}
{{--    </li>--}}
    <li>
        <a class="{{MENU[7]['active']}}" href="{{MENU[7]['link']}}"><span>{{MENU[7]['name']}}</span></a>
    </li>
</ul>
