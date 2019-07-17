@extends('tpl.backend')
<section>
    <div class="schedule">
        <div class="schedule-header">
            <p>Свяжитесь с нашим специалистом: <a href="tel:{{REGION['phone_href']}}">{{REGION['phone']}}</a></p>
        </div>
        <div class="schedule-body">
            <legend>Бесплатная консультация:</legend>
            <form class="schedule-form" action="javascript:" id="specialist">
                <input type="hidden" name="action" value="specialist"/>
                <label for="schedule-branch">
                    <select id="schedule-branch" class="simple" name="branch">
                        <option value="Select Industry">Сфера бизнеса</option>
                        @isset($data)
                            @foreach($data as $item)
                                <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        @endisset
                    </select>
                </label>
                <input type="text" placeholder="Имя" name="name"/>
                <input type="tel" placeholder="Телефон" name="phone"/>
                <button class="black" type="submit"><span>Отправить</span></button>
            </form>

        </div>
        <div class="schedule-footer"></div>
    </div>
</section>
