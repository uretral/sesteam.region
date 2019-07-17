@extends('tpl.tpl')
<section>
    <div class="wide banner">
        <div class="wide-box origin">
            <img src="/storage/{{$data->banner}}" alt="banner"/>
{{--            <div class="banner-slogan"><cite>{!! $bannerCite !!}</cite></div>--}}
{{--            <div id="clock">
                <div>
                    Оставьте заявку в течении
                    <span class="minutes"></span> :
                    <span class="seconds"></span>
                    и получите скидку <span>15%</span>
                </div>
            </div>--}}
        </div>
    </div>
</section>
{!! \App\Models\Statics\Breadcrumbs::resource($data->name) !!}
{!! \App\Models\Statics\Share::block() !!}

<main>
    <div>
        <div class="wide">
            <div class="wide-content">
                <h1>{{$data->utp}}</h1>
                <h3>{!! $data->intro !!}</h3>

                <div class="wide-boxes">
                    <div class="wide-boxes-img">
                        @isset($data->gallery)
                            @foreach($data->gallery as $key => $img)
                                @if($key == 1 || $key == 2)
                                    <div class="wide-boxes-img-frame" style="background-image: url('/storage/{{$img->img}}') ">

                                    </div>
                                @else
                                    <img src="/storage/{{$img->img}}" alt="img"/>
                                @endif
                            @endforeach
                        @endisset

                    </div>
                    <div class="wide-boxes-text">
                        {!! $data->desc !!}


{{--                        @dump($data->prices)--}}

                        @foreach($data->prices as $price)
                            <div class="price">
                                <div class="price-header">
                                   <p> {!! $price->name !!}</p>
                                </div>
                                <div class="price-body">
                                    {!! $price->price !!}
                                </div>
                                <div class="price-footer"></div>
                            </div>
                            <br/>
                        @endforeach

{{--                        <div class="price">--}}
{{--                            <div class="price-header">--}}
{{--                                {!! $data->price_head !!}--}}
{{--                            </div>--}}
{{--                            <div class="price-body">--}}
{{--                                {!! $data->price_body !!}--}}
{{--                            </div>--}}
{{--                            <div class="price-footer"></div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('blocks.form_home_services')


@empty($data->steps)
    <section>
        <div class="half @if(!$data->mobile_img) no-image @endif">
            <div class="half-bg">
                <div class="half-bg-img">
                    <img src="/storage/{{$data->steps_img}}" alt=""/>
                </div>
            </div>
            <div class="half-items">
                <div class="half-item covered">
                    <div class="accordion">
                        @foreach($data->steps as $l => $step)
                            @if($l == 0)
                                <input type="radio" id="type14569_{{$l}}" checked name="type_0980"/>
                            @else
                                <input type="radio" id="type14569_{{$l}}" name="type_0980"/>
                            @endif
                            <label for="type14569_{{$l}}">{!! $step->title !!}</label>
                            <div>
                                <p>{!! $step->text !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="half-item text">
                    <div class="shadow-txt">
                        {!! $data->steps_text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endempty


<section>
    <div>
        @empty(!$data->video_img)
            <div class="video">
                @empty(!$data->video_img)
                    <div class="video-video">
                        {{--                <iframe  src="https://www.youtube.com/embed/{{$data['video_video']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}

                        @isset($data->video_img)
                            <img src="/storage/{{$data->video_img}}" alt="image"/>
                        @endisset
                    </div>
                @endempty

                @empty(!$data->video_text)
                    <div class="video-text">
                        {!! $data->video_text !!}
                    </div>
                @endempty

            </div>
        @endempty
    </div>
</section>

<section>
    <div>
        <div class="quadro">
            <h2>{!! $data->libraries_h !!}</h2>
            <div class="quadro-items">
                @foreach($data->four as $libItem)
                    <div class="quadro-item">
                        <h4>{!! $libItem->name !!}</h4>
                        <p>
                            {!! Str::limit($libItem->intro, 150, '...') !!}
                            <a href="/articles/{{$libItem->alias}}"> Читать далее ></a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@empty(!$data->cite_text)
    <section>
        <div class="cite">
            <div class="cite-box">
                <h2>{!! $data->cite_heading !!}</h2>
                <cite>
                    {!! $data->cite_text !!}
                </cite>
            </div>
        </div>
    </section>
@endempty

@php
$texted = \App\Models\Blocks\HalfWithText::where('id',1)->first();
$acces = \App\Models\Blocks\HalfWithAccordion::where('id',4)->first();
@endphp
{!! \App\Models\Blocks\HalfWithText::block($texted,'') !!}
{!! \App\Models\Blocks\HalfWithAccordion::block($acces,'') !!}


{{--
<section>
    <div class="half">
        <div class="half-bg">
            <div class="half-bg-img">
                <img src="../img/guarantee (1).jpg" alt=""/>
            </div>
        </div>
        <div class="half-items">
            <div class="half-item covered">
                <div class="txt">
                    <h2>Мы принесем в ваш дом комфорт и спокойствие.</h2>
                    <ul>
                        <li>
                            <a href="javascript:">30-дневная гарантия возврата денег</a>
                        </li>
                        <li>
                            <a href="javascript:">Если вредители появятся, SESTEAM приедет без дополнительной оплаты
                            </a>
                        </li>
                        <li>
                            <a href="javascript:">Если мы не можем решить вашу проблему с вредителями, мы вернем вам последний платеж за обслуживание, пока вы являетесь нашим клиентом
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="half-item"></div>
        </div>
    </div>
</section>

<section>
    <div class="half">
        <div class="half-bg">
            <div class="half-bg-img">
                <img src="../img/tabbed-main.jpg" alt=""/>
            </div>
        </div>
        <div class="half-items">
            <div class="half-item text">
                <div class="shadow-txt">

                    <h2>Договор на обслуживание</h2>
                    <p>Наш сервис сочетает в себе самые передовые технологии и методы доступные сегодня. Это означает, что мы индивидуально разработаем для вас план по уничтожению вредителей, согласно особенности объекта.
                    </p>
                </div>
            </div>
            <div class="half-item covered">
                <div class="accordion">
                    <input type="radio" id="service-1" checked name="services"/>
                    <label for="service-1">ОБСЛЕДУЕМ</label>
                    <div>
                        <p>Мы проверим ваш дом сверху донизу, изнутри и снаружи, на наличие текущих или потенциальных проблем с вредителями
                        </p>
                    </div>
                    <input type="radio" id="service-2" name="services"/>
                    <label for="service-2">ЗАЩИТИМ</label>
                    <div>
                        <p>Мы обработаем периметр вашего сооружения сертифицированными препаратами, удалим все доступные паутины и осиные гнезда, а также используем самые безопасные доступные методы обработки
                        </p>
                    </div>
                    <input type="radio" id="service-3" name="services"/>
                    <label for="service-3">УКРЕПИМ</label>
                    <div>
                        <p>Мы сделаем все возможное, чтобы не пускать насекомых извне, запенить, затыкать и заделать пробелы и трещины

                        </p>
                    </div>
                    <input type="radio" id="service-4" name="services"/>
                    <label for="service-4">МОНИТОРИМ</label>
                    <div>
                        <p>Мы обработаем ваш дом и установим ловушки для отслеживания численности вредителей в критических областях, таких как кухня, ванная комната, подсобные помещения и в гараже

                        </p>
                    </div>
                    <input type="radio" id="service-5" name="services"/>
                    <label for="service-5">АКТ ВЫПОЛНЕННЫХ РАБОТ</label>
                    <div>
                        <p>Мы всегда предоставим подробный отчет об оказанных услугах и рекомендации, которые помогут вам избежать повторного появления вредителей
                        </p>
                    </div>
                    <input type="radio" id="service-6" name="services"/>
                    <label for="service-6">СЛУЖБА ПОДДЕРЖКИ</label>
                    <div>
                        <p>Круглосуточная горячая линия по неотложным потребностям наших клиентов с кем заключен договор обслуживания</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
--}}

<section>
    <div>
        <div class="links">
            <div class="links-faq">
                <h2>{!! $data->ask_h !!}</h2>
                <ul class="links-faqs">
                    @isset($data->faq)
                        @foreach($data->faq as $faqItem)
                            <li class="links-faqs-item">
                                <a href="/articles/{{$faqItem->alias}}">{!! $faqItem->name !!}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            @if($data->common->count())
                <div class="links-more">
                    <h2>{!! $data->lib_heading !!}</h2>
                    <ul class="links-items">
                        @isset($data->common)
                            @foreach($data->common as $other)
                                <li class="links-item">
                                    <a href="/articles/{{$other->alias}}">{!! $other->name !!}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>



