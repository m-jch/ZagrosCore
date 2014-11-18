@extends('ZagrosCore::layouts.guest.main')

@section('title')
    {{trans('ZagrosCore::layout.zagros')}}::{{trans('ZagrosCore::layout.login')}}
@stop

@section('login-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{trans('ZagrosCore::layout.login')}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        {{Form::open(array('class' => 'form-horizontal', 'role' => 'form'))}}
            <div class="form-group">
                {{Form::label('email', trans('ZagrosCore::layout.email'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::email('email', '', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.email'), 'id' => 'email'))}}
                    {{$errors->first('email', '<small class="text-warning">:message</small>')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('password', trans('ZagrosCore::layout.password'), array('class' => 'col-sm-2 control-label'))}}
                <div class="col-sm-10">
                    {{Form::password('password', array('class' => 'form-control', 'placeholder' => trans('ZagrosCore::layout.password'), 'id' => 'password'))}}
                    {{$errors->first('password', '<small class="text-warning">:message</small><br>')}}
                    <small><a href="">{{trans('ZagrosCore::layout.recover_pw')}}</a></small>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            {{Form::checkbox('remember', 'on')}} {{trans('ZagrosCore::layout.remember')}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{Form::submit(trans('ZagrosCore::layout.sign_in'), array('class' => 'btn btn-default'))}}
                </div>
            </div>
        {{Form::close()}}
    </div>
@stop
