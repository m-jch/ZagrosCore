@extends('ZagrosCore::layouts.user.main')

@section('title')
    {{trans('ZagrosCore::layout.admin')}} - {{trans('ZagrosCore::layout.cnp')}}
@stop

@section('admin-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{trans('ZagrosCore::layout.cnp')}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        {{Form::open(array('class' => 'form-horizontal', 'role' => 'form'))}}
            <div class="form-group">
                {{Form::label('name', trans('ZagrosCore::layout.name'), array('class' => 'col-sm-3 control-label'))}}
                <div class="col-sm-8">
                    {{Form::text('name', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.name'), 'id' => 'name'))}}
                    {{$errors->first('name', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('name', trans('ZagrosCore::layout.repo_url'), array('class' => 'col-sm-3 control-label'))}}
                <div class="col-sm-8">
                    {{Form::text('repository', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.repo_url'), 'id' => 'repository'))}}
                    {{$errors->first('repository', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('desc', trans('ZagrosCore::layout.desc'), array('class' => 'col-sm-3 control-label'))}}
                <div class="col-sm-8">
                    {{Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.desc'), 'id' => 'description'))}}
                    {{$errors->first('description', '<small class="text-warning">:message</small><br>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('admins', trans('ZagrosCore::layout.admins'), array('class' => 'col-sm-3 control-label'))}}
                <div class="col-sm-8">
                    <input type="text" name="admins[]" id="admins" class="form-control" placeholder="{{trans('ZagrosCore::layout.admins')}}">
                    {{$errors->first('admins', '<small class="text-warning">:message</small><br>')}}
                    <small class="text-info">{{trans('ZagrosCore::messages.new_project_admins')}}</small>
                </div>
            </div>
            <div class="form-group">
                {{Form::label('writers', trans('ZagrosCore::layout.writers'), array('class' => 'col-sm-3 control-label'))}}
                <div class="col-sm-8">
                    <input type="text" name="writers[]" id="writers" class="form-control" placeholder="{{trans('ZagrosCore::layout.writers')}}">
                    {{$errors->first('writers', '<small class="text-warning">:message</small><br>')}}
                    <small class="text-info">{{trans('ZagrosCore::messages.new_project_writers')}}</small>
                </div>
            </div>
            <div class="form-group">
                {{Form::label('readers', trans('ZagrosCore::layout.readers'), array('class' => 'col-sm-3 control-label'))}}
                <div class="col-sm-8">
                    <input type="text" name="readers[]" id="readers" class="form-control" placeholder="{{trans('ZagrosCore::layout.readers')}}">
                    {{$errors->first('readers', '<small class="text-warning">:message</small><br>')}}
                    <small class="text-info">{{trans('ZagrosCore::messages.new_project_readers')}}</small>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    {{Form::submit(trans('ZagrosCore::layout.cnp'), array('class' => 'btn btn-primary'))}}
                </div>
            </div>
        {{Form::close()}}
    </div>
@stop

@section('footer')
    <script>
        $(function() {
            var admins = $('#admins, #writers, #readers').magicSuggest({
                data: '{{URL::action('AdminController@postUsers')}}',
                valueField: 'user_id',
                displayField: 'name',
                mode: 'remote',
                allowFreeEntries: false,
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
