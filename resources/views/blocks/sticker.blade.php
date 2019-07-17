
<div class="header-space"></div>{!! \App\Models\Statics\Breadcrumbs::resource($data->name) !!}{!! \App\Models\Statics\Share::block() !!}


<main>
    <div>
        <div class="detail">
            <aside class="aside sticker">
                @include('tpl.aside_sticker')
            </aside>
            <div class="detail-content">
                <h1>{!! $data->intro !!}</h1>

                @empty(!$data->table)
                    <img src="/storage/{{$data->img}}" alt="image"/>
                @endempty
                @empty(!$data->table)

                    <div class="detail-contrast">
                        @empty(!$data->table_heading)
                        <div class="detail-contrast-header">
                            <p>{{$data->table_heading}}</p>
                        </div>
                        @endempty
                        <div class="detail-contrast-body">
                            {!! $data->table !!}
                        </div>
                        <div class="detail-contrast-footer"></div>
                    </div>

                @endempty

                {!! $data->content !!}

                {!! \App\Models\Forms\FormFeedback::block() !!}
            </div>
        </div>
    </div>
</main>


{{--@include('tpl.footer')--}}
