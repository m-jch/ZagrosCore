<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
    @include('ZagrosCore::layouts.guest.head')
    <body>
        <div class="container-fluid">
            <div id="header">
                <div class="row">
                    <div class="col-md-12">
                        <h1><strong>{{trans('ZagrosCore::layout.zagros')}}</strong></h1>
                        <small>{{trans('ZagrosCore::layout.bts')}}</small>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="@yield('login-navbar')"><a href="{{URL::action('UserController@getLogin')}}">{{trans('ZagrosCore::layout.login')}}</a></li>
                            <li class="@yield('register-navbar')"><a href="{{URL::action('UserController@getRegister')}}">{{trans('ZagrosCore::layout.register')}}</a></li>
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
