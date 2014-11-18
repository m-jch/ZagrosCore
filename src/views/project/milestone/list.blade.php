@extends('ZagrosCore::layouts.project.main')

@section('title')
    {{$project->name}} - {{trans('ZagrosCore::layout.milestones')}}
@stop

@section('milestones-navbar')active @stop

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">{{trans('ZagrosCore::layout.milestones')}}</h2>
        @if (Session::has('message'))
            <p class="text-info text-center">{{Session::get('message')}}</p>
        @endif
        @forelse ($project->milestones as $milestone)
            <div>
                <h4>
                    <a href="{{URL::action('MilestoneController@getIndex', array($project->url, $milestone->url))}}">{{$milestone->codename}}</a>
                    @if (!empty($milestone->release_date))
                        <small>({{$milestone->release_date}})</small>
                    @else
                        <small>(Not yet released)</small>
                    @endif
                    @if (Auth::user()->is_admin)
                        <small class="pull-right"> <a href="{{URL::action('ProjectController@getEdit', $project->url, $milestone->milestone_id)}}/{{$milestone->milestone_id}}">Edit</a></small>
                    @endif
                </h4>
                <small>{{$milestone->description}}</small>
                <hr>
            </div>
        @empty
            <h4 class="text-info text-center">{{trans('ZagrosCore::messages.no_milestone')}}</h4>
        @endforelse
    </div>
@stop
