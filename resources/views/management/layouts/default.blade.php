<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('management.partials.header')
</head>

<body>
	@include('management.partials.menu')
	@include('management.partials.modal')
	@yield('content')
	
	@include('management.partials.js')
	
</body>
</html>