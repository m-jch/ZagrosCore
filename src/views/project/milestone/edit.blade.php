@extends('ZagrosCore::layouts.project.main')

@section('title')
    {{$project->name}} - {{trans('ZagrosCore::layout.update_milestone')}}
@stop

@section('admin-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{trans('ZagrosCore::layout.update_milestone')}} {{$milestone->codename}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        {{Form::open(array('action' => array('ProjectController@postCreate', $project->url), 'class' => 'form-horizontal', 'role' => 'form'))}}
            <div class="form-group">
                {{Form::label('codename', trans('ZagrosCore::layout.codename'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text('codename', $milestone->codename, array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.codename'), 'id' => 'codename'))}}
                    {{$errors->first('codename', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('version', trans('ZagrosCore::layout.version'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text('version', $milestone->version, array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.version'), 'id' => 'version'))}}
                    {{$errors->first('version', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('release-date', trans('ZagrosCore::layout.release_date'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text('release_date', $milestone->release_date, array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.release_date'), 'id' => 'release-date'))}}
                    {{$errors->first('release_date', '<small class="text-warning">:message</small><br>')}}
                    <small class="text-info">Leave empty if not released yet.</small>
                </div>
            </div>
            <div class="form-group">
                {{Form::label('desc', trans('ZagrosCore::layout.desc'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::textarea('description', $milestone->description, array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.desc'), 'id' => 'desc'))}}
                    {{$errors->first('description', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    {{Form::hidden('update', 'true')}}
                    {{Form::hidden('milestone_id', $milestone->milestone_id)}}
                    {{Form::submit(trans('ZagrosCore::layout.update'), array('class' => 'btn btn-primary'))}}
                    <a href="{{URL::action('ProjectController@getDeleteMilestone', $project->url)}}/{{$milestone->milestone_id}}?_token={{csrf_token()}}" class="btn btn-danger"
                        onclick="if(!confirm('{{trans('ZagrosCore::messages.delete')}}')) return event.preventDefault();">{{trans('ZagrosCore::layout.delete_milestone')}}</a>
                </div>
            </div>
        {{Form::close()}}
    </div>
@stop
