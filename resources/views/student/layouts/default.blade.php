<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('student.partials.header')
</head>

<body>
	@yield('content')
	@include('student.partials.js')

</body>
</html>