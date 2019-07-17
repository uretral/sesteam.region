
<div class="header-space"></div>{!! \App\Models\Statics\Breadcrumbs::resource($data->name) !!}{!! \App\Models\Statics\Share::block() !!}
<main>
    <div>
        <div class="detail">
            <aside class="aside">
                @include('tpl.aside')
            </aside>
            <div class="detail-content">
                <h1>{!! $data->intro !!}</h1>

                {!! $data->content !!}

                {!! \App\Models\Forms\FormFeedback::block() !!}
            </div>
        </div>
    </div>
</main>
