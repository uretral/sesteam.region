@extends('tpl.backend')

{{--@dump($data->branch)--}}


<section>
    <div class="wide">
        <div class="wide-content">
            <h1>{{$data->name}}</h1>

            {!! $data->intro !!}

            @foreach($data->resource as $branch)
                @if(!$branch->children->isEmpty())
                    <div class="browse">
                        <h2>{{$branch->name}}</h2>
                        <div class="browse-items carousel">
                            @foreach($branch->children as $client)
                                <div class="browse-item">
                                    <div class="browse-item-img">
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
                    </div>
                @endif
            @endforeach
        </div>

    </div>

</section>




