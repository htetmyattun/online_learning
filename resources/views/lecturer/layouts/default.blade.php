<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('lecturer.partials.header')
</head>

<body>
	@include('lecturer.partials.menu')
	@yield('content')
	@include('lecturer.partials.js')
	
</body>
</html>