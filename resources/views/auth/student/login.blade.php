<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Login </p>
<form method="post" action="{{ route('login') }}">
	@csrf
<input type="email" name="email">
<input type="password" name="password">
<input type="submit" name="" value="Login">
</form>
</body>
</html>