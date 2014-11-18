@extends('ZagrosCore::layouts.project.main')

@section('title')
    {{$project->name}} - {{trans('ZagrosCore::layout.cnm')}}
@stop

@section('admin-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{trans('ZagrosCore::layout.cnm')}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        {{Form::open(array('action' => array('ProjectController@postCreate', $project->url), 'class' => 'form-horizontal', 'role' => 'form'))}}
            <div class="form-group">
                {{Form::label('codename', trans('ZagrosCore::layout.codename'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text('codename', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.codename'), 'id' => 'codename'))}}
                    {{$errors->first('codename', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('version', trans('ZagrosCore::layout.version'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text('version', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.version'), 'id' => 'version'))}}
                    {{$errors->first('version', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('release-date', trans('ZagrosCore::layout.release_date'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::text('release_date', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.release_date'), 'id' => 'release-date'))}}
                    {{$errors->first('release_date', '<small class="text-warning">:message</small><br>')}}
                    <small class="text-info">Leave empty if not released yet.</small>
                </div>
            </div>
            <div class="form-group">
                {{Form::label('desc', trans('ZagrosCore::layout.desc'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.desc'), 'id' => 'desc'))}}
                    {{$errors->first('description', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    {{Form::submit(trans('ZagrosCore::layout.create'), array('class' => 'btn btn-primary'))}}
                </div>
            </div>
        {{Form::close()}}
    </div>
@stop
