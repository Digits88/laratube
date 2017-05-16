<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel Tube @yield('title')</title>
<!-- Bootstrap -->
{{Html::style('css/app.css')}}
{{-- <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"> --}}
{{Html::style('css/style.css')}}
<!-- Font Icons -->
<link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/material-design-iconic-font.min.css')}}" rel="stylesheet">

<!-- animate css -->
<link href="{{asset('css/animate.css')}}" rel="stylesheet" />

<!-- Waves-effect -->
<link href="{{asset('css/waves-effect.css')}}" rel="stylesheet">

<!-- sweet alerts -->
<link href="{{asset('assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

<!-- Custom Files -->
<link href="{{asset('css/helper.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />


@yield('stylesheets')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
