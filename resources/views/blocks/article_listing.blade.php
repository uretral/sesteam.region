
<section>
    <div>
        <div class="wide">
            <div class="wide-content">
                <h2>{{$data->name}}</h2>
                <p>{{$data->intro}}</p>
                <ul class="wide-category">
                    @foreach($res as $item)
                        @if(!$item->children->isEmpty())
                            <li>
                                <span>{{$item->name}}</span>
                                <ul class="wide-category-item">
                                    @foreach($item->children as $child)
                                        <li>
                                            <a href="{{$link}}/{{$child->alias}}">{{$child->name}}</a>
                                            <p>{{$child->intro}}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
