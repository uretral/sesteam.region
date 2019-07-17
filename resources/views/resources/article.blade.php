@extends('tpl.tpl')
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
                <p>{!! $data->intro !!}</p>
                {!! $data->desc !!}
                {{--

                        @isset($data->partners)
                            <h2 class="inner">Наши партнеры</h2>
                            <div class="detail-clients">
                                @foreach($data->partners as $partner)
                                    <div class="detail-client">

                                        <strong>{{$partner->name}}</strong>

                                        <img src="/upload/{{$partner->img}}" alt=""/>
                                        {!! $partner->intro !!}
                                        <a href="{{$partner->link}}">Читать далее</a>
                                    </div>
                                @endforeach
                            </div>
                        @endisset

                        @isset($articles)
                            <h2 class="inner">Статьи</h2>
                            <div class="detail-articles">
                                @foreach($articles as $article)
                                    <div class="detail-article">
                                        <a href="{{$article->link}}" class="detail-article">{{$article->name}}</a>
                                    </div>
                                @endforeach
                            </div>
                        @endisset




                                        @isset($data->price)
                                            <div class="detail-contrast">
                                                <div class="detail-contrast-header">
                                                    <p>Прайс-лист</p>
                                                </div>
                                                <div class="detail-contrast-body">
                                                    {!! $data->price !!}
                                                </div>
                                                <div class="detail-contrast-footer"></div>
                                            </div>
                                        @endisset

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



                        --}}
                @include('forms.feedback')

            </div>
        </div>
    </div>
</main>
