@extends('tpl.tpl')
<div class="header-space"></div>{!! \App\Models\Statics\Breadcrumbs::resource($data->name) !!}{!! \App\Models\Statics\Share::block() !!}
<main>
    <div>
        <div class="detail">
            <aside class="aside">
                @include('tpl.aside')
            </aside>
            <div class="detail-content">
                <h1>{!! $data->longtitle !!}</h1>
                {!! \App\Models\Forms\FormSticker::block() !!}

                @if(count($data->sticker))
                    <div class="detail-sticker">
                        <h2>{{$data->sticker_heading}}</h2>
                        @foreach($data->stickerData as $sticker)
                            @isset($sticker['name'])
                                <h3>{{$sticker['name']}}</h3>
                            @endisset
                            @isset($sticker['services'])
                                @foreach($sticker['services'] as $item)
                                    <p>
                                        <a href="{{MENU[9]['link']}}/{{$item->alias}}">{{$item->name}}</a> -

                                        @if(key_exists('text',$sticker))
                                            {{$sticker['text']}}
                                        @else
                                            {{$item->intro}}
                                        @endif

                                    </p>
                                @endforeach
                            @endisset
                        @endforeach
                    </div>
                @endif
                <p>{!! $data->intro !!}</p>

                {!! $data->desc !!}
                @if($data->clients->count())
                    <h2 class="inner">Наши партнеры</h2>
                    <div class="detail-clients">

                        @foreach($data->clients as $partner)


                            <div class="detail-client">

                                <div class="detail-client-img">
                                    <div class="detail-client-portrait">
                                        <img src="/storage/{{$partner->img}}" alt=""/>
                                    </div>
                                </div>

                                <b>{{$partner->name}}</b>
                                {{Str::limit($partner->intro, 100, '...')}}
                                <a href="{{MENU['12']['link']}}/{{$partner->alias}}">Читать далее</a>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if($data->art->count())
                    <h2 class="inner">Статьи</h2>
                    <div class="detail-articles">
                        @foreach($data->art as $article)
                            <div class="detail-article">
                                <a href="{{MENU[15]['link']}}/{{$article->alias}}" class="detail-article">{{$article->name}}</a>
                            </div>
                        @endforeach
                    </div>
                @endif
                @empty(!$data->prices)
                    @foreach($data->prices as $prices)
                        <div class="detail-contrast">
                            <div class="detail-contrast-header">
                                <p>{{$prices->name}}</p>
                            </div>
                            <div class="detail-contrast-body">
                                {!! $prices->text !!}
                            </div>
                            <div class="detail-contrast-footer"></div>
                        </div>
                    @endforeach
                @endempty



                @isset($data->warranty)
                    <div class="detail-contrast">
                        <div class="detail-contrast-header">
                            <p>Гарантия</p>
                        </div>
                        <div class="detail-contrast-body">
                            {!! $data->warranty !!}
                        </div>
                        <div class="detail-contrast-footer"></div>
                    </div>
                @endisset

                @isset($data->aim_heading)
                    <div class="detail-aim">
                        <div class="detail-aim-img">
                            <img src="/storage/{{$data->aim_img}}" alt="img"/>
                        </div>
                        <div class="detail-aim-text">
                            <h2>{!! $data->aim_heading !!}</h2>
                            {!! $data->aim_text !!}
                        </div>
                    </div>
                @endisset
                {!! \App\Models\Forms\FormFeedback::block() !!}
            </div>
        </div>
    </div>
</main>
