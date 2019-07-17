<section>
    <div class="share">
        <div class="share-col">
            <div class="share-cell">
                <span>Поделиться:</span>
                @foreach($data as $i)
                    <a rel="nofollow" target="_blank" title="{{$i->name}}" href="{{$i->link}}:">
                        <img src="/storage/{{$i->img}}" alt="{{$i->name}}"/>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
