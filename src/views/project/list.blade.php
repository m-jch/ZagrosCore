@extends('ZagrosCore::layouts.user.main')

@section('title')
    {{trans('ZagrosCore::layout.prjs_list')}}
@stop

@section('projects-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3 list">
        <h2 class="text-center">{{trans('ZagrosCore::layout.projects')}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        @forelse ($projects as $project)
            <div>
                <h3>
                    <a href="{{URL::action('ProjectController@getIndex', $project->url)}}">{{$project->name}}</a>
                    @if (Auth::user()->admin)
                        <small class="pull-right"> <a href="{{URL::action('AdminController@getUpdateProject', $project->project_id)}}">{{trans('ZagrosCore::layout.edit')}}</a></small>
                    @endif
                </h3>
                <small>{{$project->description}}</small>
                <hr>
            </div>
        @empty
            <h4 class="text-info text-center">{{trans('ZagrosCore::messages.no_project')}}</h4>
        @endforelse
    </div>
@stop
