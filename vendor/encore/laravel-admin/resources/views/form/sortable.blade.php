<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-8">


        <div class="dd dd-wide">
            <ol class="dd-list">
                @isset($value)
                    @foreach(json_decode($value) as $val)
                        <li
                            id="{{$val->nr}}"
                            class="dd-item dd3-item"
                            data-name="{{$val->name}}"
                            data-url="{{$val->url}}"
                            data-nr="{{$val->nr}}"
                            data-controller="{{$val->controller}}"
                            data-model="{{$val->model}}"
                            data-id="{{$val->id}}"
                            data-title="{{$val->title}}"
                            data-static="{{$val->static}}"

                        >
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">
                                {{$val->name}} ({{$val->title}})
                                <a

                                    href="javascript:"
                                    @if($val->static)
                                    class="static_delete danger"
                                    rel="/admin/static/{{$val->url}}?parent={{$res}}&nr={{$val->nr}}"
                                    @else
                                    class="block_delete danger"
                                    rel="/admin/block/{{$val->url}}/{{$val->id}}"
                                    @endif
                                    data-code="{{$val->nr}}"
                                    title="Удалить"> Удалить</a>
                                <a
                                    class="block_view"
                                    @if($val->static)
                                    rel="/blocks/{{$val->url}}/{{$res}}/{{$val->static}}/1"
                                    @else
                                    rel="/blocks/{{$val->url}}/{{$val->id}}/{{$val->static}}/1"
                                    @endif

                                    data-code="{{$val->nr}}"
                                    href="javascript:"
                                    title="Посмотреть"> Просмотр </a>
                                @if(!$val->static)
                                <a
                                    class="block_edit"
                                    data-name="{{$val->name}}"
                                    rel="/admin/block/{{$val->url}}/{{$val->id}}/edit?parent={{$res}}&nr={{$val->nr}}"
                                    href="javascript:"
                                    title="Редактировать"> Редактировать </a>
                                <a target="_blank" href="/blocks/{{$val->url}}/{{$val->id}}/1"> >> </a>
                                @endif


                            </div>
                            <div class="dd3-view" id="nest_{{$val->nr}}"></div>

                        </li>
                    @endforeach
                @endisset

            </ol>
        </div>
        @include('admin::form.error')
        <input type="hidden" id="blocks_json" name="{{$name}}" value="{{$value}}"/>
        @include('admin::form.help-block')


        <data id="block_target" rel="{{$res}}"></data>


        <span class="grid-expand" data-toggle="modal" data-target="#grid-modal-22">
   <a href="javascript:void(0)"></a>
</span>

        <div class="modal fade" id="grid-modal-22" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        {$html}
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
