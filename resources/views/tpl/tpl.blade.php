<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="{{ asset('less/style.css') }}" rel="stylesheet">


    @isset($seo['title'])
        <title> @isset($seo['title']){{$seo['title']}}@endisset </title>
        <meta name="keywords" content="@isset($seo['keywords']){{$seo['keywords']}}@endisset ">

        <meta name="description" content="@isset($seo['description']){{$seo['description']}}@endisset">
    @endisset
    @isset($data->seo_title)
        <title>{{$data->seo_title}}</title>
        <meta name="keywords" content="{{$data->seo_key}}">
        <meta name="description" content="{{$data->seo_desc}}">
    @endisset
</head>
<body>
<header>
    <div>
        <div class="header">
            <a class="header-call-btn" href="tel:{{REGION['phone_href']}}"></a>
            <div class="header-logo">
                <a href="{{MENU[1]['link']}}">
                    <img src="{{asset('img/logo.jpg')}}" alt="logo"/>
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
                    <a href="mailto:{{REGION['email']}}"><span>{{REGION['email']}}</span></a>

                    <input  type="checkbox" id="mobileSearchSwitcher"/>
                    <label for="mobileSearchSwitcher"><span>Поиск</span>

                        <form class="mobile-search-top" action="{{MENU[6]['link']}}" method="get">
                            <label>
                                <input type="search" name="q" value=""/>
                            </label>
                            <button type="submit"><em>Поиск</em></button>
                        </form>
                    </label>

                    <a href="{{MENU[28]['link']}}"><span>Контакты</span></a>
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


@yield('content')


<section class="linker">
	<div>
		<div class="linker-items">
			<div class="linker-watsapp">
                <a title="Whatsapp" href="whatsapp://send?phone={{REGION['whatsapp']}}">
                    <img src="/img/wasend.png" alt="watsapp send"/>
                </a>
            </div>

			<div class="linker-callback">
                <a href="javascript:" rel="modal">
                    <span>оставить заявку</span>
                </a>
            </div>
		</div>
	</div>
</section>


<footer>

    <div class="footer">
        <div class="footer-box">
            <div class="footer-links">
                <div class="footer-links_media">
                    <h5>SESTEAM</h5>
                    <ul>
                        <li>
                            <a href="{{MENU[7]['link']}}"><span>{{MENU[7]['name']}}</span></a>
                        </li>
                        <li>
                            <a href="{{MENU[26]['link']}}"><span>{{MENU[26]['name']}}</span></a>
                        </li>
                        <li>
                            <a href="{{MENU[27]['link']}}"><span>{{MENU[27]['name']}}</span></a>
                        </li>
                    </ul>
                </div>

                <div class="footer-links_socials">
                    <h5>Мы в соц.сетях</h5>

                    <ul>
                        @foreach(\App\Models\Statics\Share::all() as $item)
                            <li>
                                <a rel="nofollow" href="{{$item->link}}" class="{{$item->name}}" target="_blank">facebook</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer-links_other">
                    <h5>Поддержка</h5>
                    <ul>
                        <li>
                            <a href="{{MENU[28]['link']}}"><span>{{MENU[28]['name']}}</span></a>
                        </li>
                        <li>
                            <a href="{{MENU[22]['link']}}"><span>{{MENU[22]['name']}}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyrights">
                <p>© {{date ( 'Y' )}} Ses Team</p>
            </div>
            <div class="footer-terms">
                <a href="{{MENU[31]['link']}}">Условия пользования</a>
                <em>|</em>
                <a href="{{MENU[30]['link']}}">Политика конфедициальности</a>
            </div>
        </div>
    </div>
    <section class="modal">
    	<div>
    		<div class="modal-wrapper">
                <div class="modal-content">
                    <a href="javascript:;" class="modal-close"></a>
                    <div class="callback-form form">
                        <form action="javascript:" id="callback">
                            {{--FORM--}}
                            <input type="hidden" name="action" value="callback"/>
                            <input type="hidden" name="discount" value="без скидки">
                            <label><input type="hidden" name="page" value="{{request()->fullUrl()}}"/></label>
                            <label><input type="text" name="name" placeholder="Ваше имя"/></label>
                            <label><input type="tel" name="phone" placeholder="Ваш телефон"/></label>
                            <label><input type="submit" value="Отправить"/></label>
                        </form>
                    </div>
                </div>
    		</div>
    	</div>
    </section>
</footer>

<script src="{{ asset('js/jq.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
