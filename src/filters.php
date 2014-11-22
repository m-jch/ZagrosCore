<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('admin', function()
{
	if (!Auth::user()->admin)
	{
		return Redirect::to('/');
	}
});

Route::filter('valid-project-user', function($route)
{
	$project = Project::where('url', Route::input('project'))
						->where('admins', 'like', '%'.Auth::id().'%')
						->orWhere('writers', 'like', '%'.Auth::id().'%')
						->orWhere('readers', 'like', '%'.Auth::id().'%')
						->first();
	if (!$project)
	{
		return Redirect::to('/')->with('message', trans('ZagrosCore::messages.form_error'));
	}
});

Route::filter('valid-milestone', function($route)
{
	$project = Project::where('url', Route::input('project'))->with(array('milestone' => function($query)
	{
		$query->where('url', Route::input('milestone'));
	}))->first();

	if (!isset($project->milestone->milestone_id))
	{
		return Redirect::action('ProjectController@getIndex', $project->url)->with('message', trans('ZagrosCore::messages.form_error'));
	}
});

Route::filter('admin-project', function()
{
	if (!Auth::user()->is_admin)
	{
		return Redirect::action('ProjectController@getIndex', Route::input('project'))->with('message', trans('ZagrosCore::messages.form_error'));
	}
});

Route::filter('not-reader', function()
{
	if (Auth::user()->is_reader)
	{
		return Redirect::action('ProjectController@getIndex', Route::input('project'))->with('message', trans('ZagrosCore::messages.form_error'));
	}
});

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('user/login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
