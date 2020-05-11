<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('student.partials.header')
</head>

<body>
	@include('sweetalert::alert')
	@include('student.partials.menu')
	@yield('content')
	@include('student.partials.js')
	
	@include('student.partials.modal')
	
</body>
</html>