<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{HTML::style('packages/mohsen/zagros-core/styles/bootstrap.min.css')}}
    {{HTML::style('packages/mohsen/zagros-core/styles/bootstrap-theme.min.css')}}
    {{HTML::style('packages/mohsen/zagros-core/styles/style.css')}}
    {{HTML::style('packages/mohsen/zagros-core/styles/'.Config::get('app.locale').'/fonts.css')}}
    {{HTML::style('packages/mohsen/zagros-core/styles/'.Config::get('app.locale').'/style.css')}}
    {{HTML::style('packages/mohsen/zagros-core/styles/magicsuggest-min.css')}}
    {{HTML::style('packages/mohsen/zagros-core/styles/font-awesome.min.css')}}
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head')
</head>
