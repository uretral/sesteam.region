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

                <h3>{!! $data->intro !!}</h3>

                {!! $data->desc !!}

                @foreach($data->prices as $price)
                    <div class="detail-contrast">
                        <div class="detail-contrast-header">
                            <p>{!! $price->name !!}</p>
                        </div>
                        <div class="detail-contrast-body">
                            {!! $price->price !!}
                        </div>
                        <div class="detail-contrast-footer"></div>
                    </div>
                @endforeach

                @if($data->show_sticker)
                    {!! \App\Models\Forms\FormSticker::block() !!}
                @endif

                @isset($data->branchesArray)
                    <h2 class="inner">Сферы бизнеса</h2>
                    <ul class="detail-branches">
                        @foreach($data->branchesArray as $branch)
                            <li class="detail-branches-links">
                                <a href="{{MENU[8]['link']}}/{{$branch->alias}}">
                                    <img src="/storage/{{$branch->img}}" alt="img">
                                    <span>{!! $branch->name !!}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
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

                @include('forms.feedback')

            </div>
        </div>
    </div>
</main>
