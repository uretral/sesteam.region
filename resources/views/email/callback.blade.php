
<html>
<head></head>
<body>

@if($sender->action == 'callback')

<div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
    <div style="display: table-cell; vertical-align: middle;">Новое сообщение от клиента {{ $sender->name }}!</div>
</div>
<div>
    <div style="width: 50%; padding: 40px 25%; text-align: center;"> Страница: {!! $sender->page !!}</div>
</div>
<div>
    <div style="width: 50%; padding: 40px 25%; text-align: center;">{!! $sender->phone !!}</div>
</div>
@elseif($sender->action == 'aside_form')
    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;">Новое сообщение от клиента {{ $sender->name }}!</div>
    </div>

    <div>
        <div style="width: 50%; padding: 40px 25%; text-align: center;">{!! $sender->phone !!}</div>
    </div>

    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;">E-mail для связи: {{ $sender->email }}</div>
    </div>
@elseif($sender->action == 'specialist')
    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;">Новое сообщение от клиента {{ $sender->name }}!</div>
    </div>

    <div>
        <div style="width: 50%; padding: 40px 25%; text-align: center;">{!! $sender->phone !!}</div>
    </div>

    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;">Сфера деятельности: {{ $sender->branch }}</div>
    </div>
@elseif($sender->action == 'feedback')

    <div style="display: table; width: 100%; text-align: center; height: 40px; background: #68A4C4; color: #fff; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; font-weight: bold;">
        <div style="display: table-cell; vertical-align: middle;">Подпишитесь на наши новости  {{ $sender->feedback }}!</div>
    </div>
@endif
</body>
</html>
