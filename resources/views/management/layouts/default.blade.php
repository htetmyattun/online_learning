<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('management.partials.header')
</head>

<body>
	@include('management.partials.menu')
	@yield('content')
	@include('management.partials.modal')
	@include('management.partials.js')
	
</body>
</html>