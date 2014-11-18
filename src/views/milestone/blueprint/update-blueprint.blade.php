@extends('ZagrosCore::layouts.milestone.main')

@section('title')
    {{$project->name}} - {{$project->milestone->codename}} - {{trans('ZagrosCore::layout.update_blueprint')}}
@stop

@section('menu-mid')
    <li class="active"><a>{{trans('ZagrosCore::layout.update_blueprint')}}</a></li>
@stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{trans('ZagrosCore::layout.update_blueprint')}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        {{Form::open(array('action' => array('MilestoneController@postCreateBlueprint', $project->url, $project->milestone->url), 'class' => 'form-horizontal', 'role' => 'form'))}}
            <div class="form-group">
                {{Form::label('title', trans('ZagrosCore::layout.title'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text('title', $project->milestone->blueprint->title, array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.title'), 'id' => 'title'))}}
                    {{$errors->first('title', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('status', trans('ZagrosCore::layout.status'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::select('status', Helper::getBlueprintStatus(), $project->milestone->blueprint->status, array('class' => 'form-control'))}}
                    {{$errors->first('status', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('importance', trans('ZagrosCore::layout.importance'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::select('importance', Helper::getBlueprintImportance(), $project->milestone->blueprint->importance, array('class' => 'form-control'))}}
                    {{$errors->first('importance', '<small class="text-warning">:message</small><br>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('desc', trans('ZagrosCore::layout.desc'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::textarea('description', str_replace('<br />', '', $project->milestone->blueprint->description), array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.desc'), 'id' => 'desc'))}}
                    {{$errors->first('description', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <hr>
            <div class="form-group">
                {{Form::label('assign', trans('ZagrosCore::layout.assign'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    <input type="text" name="user_id_assigned" id="assign" class="form-control" placeholder="{{trans('ZagrosCore::layout.assign')}}">
                    {{$errors->first('user_id_assigned', '<small class="text-warning">:message</small><br>')}}
                </div>
            </div>
            <hr>
            <div class="form-group">
                {{Form::label('des-update', trans('ZagrosCore::layout.desc_update'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::textarea('description_update', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.desc_update'), 'id' => 'desc_update'))}}
                    {{$errors->first('description_update', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    {{Form::hidden('update', 'true')}}
                    {{Form::hidden('blueprint_id', $project->milestone->blueprint->blueprint_id)}}
                    {{Form::submit(trans('ZagrosCore::layout.update'), array('class' => 'btn btn-primary'))}}
                    @if (Auth::user()->is_admin)
                        <a href="{{URL::action('MilestoneController@getDeleteBlueprint', array($project->url, $project->milestone->url, $project->milestone->blueprint->blueprint_id))}}?_token={{csrf_token()}}" class="btn btn-danger"
                            onclick="if(!confirm('{{trans('ZagrosCore::messages.delete')}}')) return event.preventDefault();">{{trans('ZagrosCore::layout.delete_blueprint')}}</a>
                    @endif
                </div>
            </div>
        {{Form::close()}}
    </div>
@stop

@section('footer')
    <script>
        $(function() {
            var admins = $('#assign').magicSuggest({
                data: '{{URL::action('MilestoneController@postUsers', array($project->url, $project->milestone->url))}}',
                @if (isset($project->milestone->blueprint->user_assigned->user_id))
                    value: [{user_id: "{{$project->milestone->blueprint->user_assigned->user_id}}", name: "{{$project->milestone->blueprint->user_assigned->name}}"}],
                @endif
                valueField: 'user_id',
                displayField: 'name',
                mode: 'remote',
                allowFreeEntries: false,
                maxSelection: 1,
                renderer: function(data){
                    return '<div class="users">' +
                            '<div class="name">' + data.name + '</div>' +
                           '</div>';
                },
                resultAsString: true,
                selectionRenderer: function(data){
                    return '<div class="name">' + data.name + '</div>';
                }
            });
        });
    </script>
@stop
