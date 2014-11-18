@extends('ZagrosCore::layouts.user.main')

@section('title')
    {{trans('ZagrosCore::layout.admin')}} - {{trans('ZagrosCore::layout.users')}}
@stop

@section('admin-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{trans('ZagrosCore::layout.users')}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        <div class="col-md-12">
            {{Form::open(array('action' => 'AdminController@getUsersList', 'method' => 'get'))}}
                <input name="q" value="{{Input::get('q')}}" type="search" class="form-control" placeholder="Search...">
            {{Form::close()}}
            <hr>
        </div>
        @forelse ($users as $user)
            <div class="col-md-12">
                <h4>
                    {{Helper::getAvatar($user['email'])}}
                    {{$user['name']}}
                    @if ($user['admin'])
                        <small><span class="text-success">({{trans('ZagrosCore::layout.admin')}})</span></small>
                    @endif
                    <a href="{{action('AdminController@getUpdateUser', $user['user_id'])}}" class="btn btn-warning btn-pulled pull-right">{{trans('ZagrosCore::layout.edit')}}</a>
                    @if (Auth::id() != $user['user_id'])
                        <a href="{{action('AdminController@getDeleteUser', $user['user_id'])}}" class="btn btn-danger btn-pulled pull-right">{{trans('ZagrosCore::layout.delete')}}</a>
                    @endif
                </h4>
                <p><small><b>{{trans('ZagrosCore::layout.email')}} </b>{{$user['email']}}</small></p>
                <p><small><b>{{trans('ZagrosCore::layout.admin_projects')}}</b> {{ ( ! empty( $user['admin_projects'] ) ) ? implode(', ', $user['admin_projects']) : '-' }}</small></p>
                <p><small><b>{{trans('ZagrosCore::layout.writer_projects')}}</b> {{ ( ! empty( $user['writer_projects'] ) ) ? implode(', ', $user['writer_projects']) : '-' }}</small></p>
                <p><small><b>{{trans('ZagrosCore::layout.reader_projects')}}</b> {{ ( ! empty( $user['reader_projects'] ) ) ? implode(', ', $user['reader_projects']) : '-' }}</small></p>
                <hr>
            </div>
        @empty
            <h4 class="text-center">{{trans('ZagrosCore::messages.nfu')}}</h4>
        @endforelse
        {{$paginate->links()}}
    </div>
@stop
