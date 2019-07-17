
<div class="aside-call">
    @if($data->form == 1)
        <h3>Получить стикер</h3>
        <p class="tel">
            Позвоните нам: <span>{{REGION['phone']}}</span>
        </p>
        <p>
            Или отправьте нам заявку, мы перезвоним Вам в течение 5-ти минут:
        </p>

        <form action="javascript:" id="aside_form">
            <input type="hidden" name="action" value="aside_form_sticker_registration"/>
            <input type="text" name="name" placeholder="ваше имя"/>
            <input type="email" name="email" placeholder="ваш email"/>
            <label>
                <select class="simple default">
                    <option selected>Сфера деятельности</option>
                    @foreach(\App\Models\Resources\Branch::all() as $brunch)
                        <option value="{{$brunch->id}}">{{$brunch->name}}</option>
                    @endforeach
                </select>
            </label>

            <input type="tel" name="phone" placeholder="ваше телефон"/>


            <button class="sbt"><span>Отправить</span></button>
            <mark>
                Нажимая на кнопку "Отправить", я даю
                <a href="/agreement.html">согласие на обработку персональных данных</a>
                . Информация на сайте не является публичной
                <a href="/oferta.html">офертой</a>
            </mark>
        </form>
</div>
    @elseif($data->form == 2)
        <h3>Приостановили стикер?</h3>
        <p class="tel">
            Позвоните нам: <span>{{REGION['phone']}}</span>
        </p>
        <p>
            Или отправьте нам заявку, мы перезвоним Вам в течение 5ти минут:
        </p>

        <form action="javascript:" id="aside_form">
            <input type="hidden" name="action" value="aside_form_sticker_appeal"/>
            <input type="text" name="number" placeholder="Регистрационный номер"/>
            <button class="sbt"><span>Отправить</span></button>
            <mark>
                Нажимая на кнопку "Отправить", я даю
                <a href="/agreement.html">согласие на обработку персональных данных</a>
                . Информация на сайте не является публичной
                <a href="/oferta.html">офертой</a>
            </mark>
        </form>
        </div>
    @endif


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
<div class="aside-sticker">
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
