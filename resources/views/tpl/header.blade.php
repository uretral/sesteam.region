<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="favicon.ico" />
    <link href="{{ asset('less/style.css') }}" rel="stylesheet">
    <title></title>
</head>
<body>

<header>
    <div>
        <div class="header">
            <a class="header-call-btn" href="javascript:"></a>
            <div class="header-logo">
                <a href="{{MENU[1]['link']}}">
                    <img src="{{asset('img/logo.jpg')}}" alt="logo" style="    width: 70%;    margin: 0 auto;    display: block;"/>
                </a>
            </div>
            <input type="checkbox" id="topMenuSwitcher"/>
            <label for="topMenuSwitcher">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="header-nav">
                <div class="header-nav-info">
                    <a href="tel:{{REGION['phone_href']}}"><span>Тел: {{REGION['phone']}}</span></a>
                    <input type="checkbox" id="regionsSwitcher"/>
                    <label for="regionsSwitcher"><span>Регионы</span>
                        <div class="regions-top">
                            <div rel="region"></div>
                            <select class="simple wider">
                                @foreach(\App\Admin\Controllers\SiteController::regions() as $region)
                                    <option @if(request()->root() == $region->url) selected @endif value="{{$region->url}}">{{$region['region']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>
                    <input  type="checkbox" id="mobileSearchSwitcher"/>
                    <label for="mobileSearchSwitcher"><span>Поиск</span>

                        <form class="mobile-search-top" action="{{MENU[6]['link']}}" method="get">
                            <label>
                                <input type="search" name="q" value=""/>
                            </label>
                            <button type="submit"><em>Поиск</em></button>
                        </form>
                    </label>

                    <a href="javascript:"><span>поддержка</span></a>
                </div>
                <div class="header-nav-main">
                    <div class="header-nav-menu">
                        <div class="header-nav-menu_top">
                            @if(strpos(url()->current(),'business'))
                                <a href="{{MENU[1]['link']}}">Для дома</a>
                                <a class="{{MENU[4]['active']}}" href="{{MENU[4]['link']}}">Для бизнеса</a>
                            @else
                                <a class="{{MENU[1]['active']}}" href="{{MENU[1]['link']}}">Для дома</a>
                                <a href="{{MENU[4]['link']}}">Для бизнеса</a>
                            @endif
                        </div>
                        <div class="header-nav-menu_main">
                            <input type="checkbox" id="searchSwitcher"/>
                            <label for="searchSwitcher"></label>
                            <form class="search-top" action="{{MENU[6]['link']}}">
                                <label>
                                    <input type="search" name="q" value=""/>
                                </label>
                                <button type="submit"><em>Поиск</em></button>
                            </form>
                            @if(strpos(url()->current(),'business'))
                                @include('tpl.menu_business')
                            @else
                                @include('tpl.menu_home')
                            @endif
                        </div>
                    </div>
                    <div class="header-nav-callback">
                        <a href="javascript:" class="red-callback" rel="modal" data-action="callback" >Оставить<span>Заявку</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
