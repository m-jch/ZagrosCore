<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
    @include('ZagrosCore::layouts.guest.head')
    <body>
        <div class="container-fluid">
            <div id="header">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{$project->name}}</h1>
                        <small>{{$project->description}}</small>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="@yield('projects-navbar')"><a href="{{URL::to('/')}}">{{trans('ZagrosCore::layout.projects')}}</a></li>
                            <li class="@yield('milestones-navbar')"><a href="{{URL::action('ProjectController@getIndex', $project->url)}}">{{trans('ZagrosCore::layout.milestones')}}</a></li>
                            <li class="@yield('milestone-navbar')"><a href="{{URL::action('MilestoneController@getIndex', array($project->url, $project->milestone->url))}}">{{$project->milestone->codename}}</a></li>
                            @yield('menu-mid')
                            @if (Auth::user()->is_admin)
                                <li class="@yield('blueprint-navbar')"><a href="{{URL::action('MilestoneController@getCreateBlueprint', array($project->url, $project->milestone->url))}}">{{trans('ZagrosCore::layout.new_blueprint')}}</a></li>
                            @endif
                            @if (!Auth::user()->is_reader)
                                <li class="@yield('bug-navbar')"><a href="{{URL::action('MilestoneController@getCreateBug', array($project->url, $project->milestone->url))}}">{{trans('ZagrosCore::layout.new_bug')}}</a></li>
                            @endif
                            <li class="@yield('user-navbar')">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('ZagrosCore::layout.user')}} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">{{trans('ZagrosCore::layout.settings')}}</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{URL::action('UserController@getLogout')}}">{{trans('ZagrosCore::layout.logout')}}</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('ZagrosCore::layouts.guest.footer-includes')
    </body>
</html>
