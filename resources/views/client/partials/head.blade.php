<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="{{asset('administrator/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('administrator/css/swiper.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('administrator/css/simplelightbox.css') }}" rel="stylesheet" type="text/css" />
@stack('css')
<link href="{{asset('administrator/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('administrator/css/sumoselect.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('administrator/css/jquery-ui-1.12.1.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('administrator/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('administrator/img/favicon.ico')}}"/>
<link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i%7CPlayfair+Display+SC:900" rel="stylesheet">
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">