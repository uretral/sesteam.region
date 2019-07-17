@extends('tpl.tpl')
<div class="header-space"></div>{!! \App\Models\Statics\Breadcrumbs::resource($data->name) !!}{!! \App\Models\Statics\Share::block() !!}

<main>
    <div>
        <div class="detail">
            <aside class="aside">
                @include('tpl.aside')
            </aside>
            <div class="detail-content">
                <h1>{!! $data->name !!}</h1>

                <div class="listing">
                    @foreach($data->resourceData as $client)
                        <div class="listing-item">
                            <div class="listing-item-img">
                                <div class="browse-item-portrait">
                                    @if($client->img)
                                        <img src="/storage/{{$client->img}}" alt="img"/>
                                    @endif
                                </div>
                            </div>
                            <b>{{$client->name}}</b>
                            <p>
                                {{Str::limit($client->intro, 100, '...')}}
                            </p>

                            <a href="{{MENU[$data->parent]['link']}}/{{$client->alias}}">Узнать больше ...</a>
                        </div>
                    @endforeach
                </div>

                {!! \App\Models\Forms\FormFeedback::block() !!}
            </div>
        </div>
    </div>
</main>

