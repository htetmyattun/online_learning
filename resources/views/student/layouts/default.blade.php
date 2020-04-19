<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('student.partials.header')
</head>

<body>
	@include('student.partials.menu')
	@yield('content')
	@include('student.partials.js')
	
</body>
</html>