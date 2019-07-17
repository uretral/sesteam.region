
<div class="header-space"></div>
{!! \App\Models\Statics\Breadcrumbs::resource($data->name) !!}
{!! \App\Models\Statics\Share::block() !!}

<main>
    <div>
        <div class="detail">
            <aside class="aside">
                @include('tpl.aside')
            </aside>
            <div class="detail-content">
                <h1>{!! $data->name !!}</h1>

                <p>
                    {!! $data->text !!}
                </p>

                <address>
                    <p>{{$data->address}}</p>
                </address>
                <div class="phones">
                    <div class="phones-name">Оформить заказ</div>
                    <div class="phones-space"></div>
                    <div class="phones-phone"><a href="tel:{{$data->phone_href}}">{{$data->phone}}</a></div>
                </div>

                @empty(!$data->phones)
                    @foreach($data->phones as $item)
                        <div class="phones">
                            <div class="phones-name">{{$item->name}}</div>
                            <div class="phones-space"></div>
                            <div class="phones-phone">{{$item->phone}}</div>
                        </div>
                    @endforeach
                @endempty

                <map>
                    <script type="text/javascript" charset="utf-8" async src="{!! $data->map !!}"></script>
                </map>
                @include('forms.feedback')

            </div>
        </div>
    </div>
</main>



