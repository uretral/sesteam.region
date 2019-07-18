@extends('tpl.tpl')
@section('content')
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
                @include('forms.feedback')

            </div>
        </div>
    </div>
</main>
@endsection
