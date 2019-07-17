<section>
    <div class="wide collection">
        <h1>Поиск</h1>
        @if($data)
            <p>Результаты поиска по запросу <b>{{request()->get('q')}}</b></p>
        @else
            <p>Результаты поиска по запросу <b>{{request()->get('q')}}</b> не найдены</p>
        @endif

        <div class="collection-search-container">

            @foreach($data as $section)

                <h2>{{$section['parent']->name}}
                    {{--                <a href="{{$section['parent']->link}}"></a>--}}
                </h2>
                <div class="collection-search">
                    @foreach($section['collection'] as $item)
                        <div class="collection-search-item">
                            <a href="{{str_replace('{alias}',$item->alias,$section['menu']->link)}}">{{$item->name}}</a>
                            <p>
                                {!! $item->intro !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endforeach


        </div>
    </div>
</section>
