<div class="aside-region">
    <h3>Представители в регионах</h3>
    <p>Выберите ваш регион:</p>

    <select rel="region-links" class="simple">
        @foreach(\App\Admin\Controllers\SiteController::regions() as $region)
            <option  @if(is_numeric(strpos(request()->getHost(),$region->url))) selected @endif value="{{$region->url}}">{{$region['region']}}</option>
        @endforeach
    </select>
     <br/>
     <br/>
     <br/>
    <div rel="region"></div>
</div>
<div class="aside-call">
    @empty($data->aside_thing)
        <h3>Беспокоят насекомые?</h3>
    @endempty
    @empty(!$data->aside_thing)
        <h3>{{$data->aside_thing}}</h3>
    @endempty


    <p class="tel">
        Позвоните нам: <span>{{REGION['phone']}}</span>
    </p>
    <p>
        Или отправьте нам заявку, мы перезвоним Вам в течение 5ти минут:
    </p>

    <form action="javascript:" id="aside_form">
        <input type="hidden" name="action" value="aside_form"/>
        <input type="text" name="name" placeholder="ваше имя"/>
        <input type="email" name="email" placeholder="ваш email"/>
        <input type="tel" name="phone" placeholder="ваш телефон"/>
        <button class="sbt"><span>Отправить</span></button>
        <mark>
            Нажимая на кнопку "Отправить", я даю
            <a target="_blank" href="{{MENU[30]['link']}}">согласие на обработку персональных данных</a>
            . Информация на сайте не является публичной
            <a target="_blank" href="{{MENU[31]['link']}}">офертой</a>
        </mark>
    </form>
</div>

@if($data->aside_cite_text && $data->aside_cite_switcher)
    <div class="aside-info">
        <mark>
{!! $data->aside_cite_text !!}
        </mark>
    </div>
@elseif($data->aside_cite_switcher)
    <div class="aside-banner">
        @if($data->aside_cite_link)
            <a href="{{$data->aside_cite_link}}">
                <img src="/storage/{{$data->aside_cite_img}}" alt="img"/>
            </a>
            @else
            <img src="/storage/{{$data->aside_cite_img}}" alt="img"/>
        @endif
    </div>
@endif

@if($data->aside_advert_text && $data->aside_advert_switcher)
    <div class="aside-info">
        <mark>
            {!! $data->aside_advert_text !!}
        </mark>
    </div>
@elseif($data->aside_advert_switcher)
    <div class="aside-banner">
        @if($data->aside_advert_link)
            <a href="{{$data->aside_advert_link}}">
                <img src="/storage/{{$data->aside_advert_img}}" alt="img"/>
            </a>
        @else
            <img src="/storage/{{$data->aside_advert_img}}" alt="img"/>
        @endif
    </div>
@endif

<div class="aside-sticker-banner">
    <h3><a href="{{MENU[25]['link']}}">Узнать больше</a></h3>
    <img src="/img/sticker-shadowed.png" alt="sticker"/>
</div>

