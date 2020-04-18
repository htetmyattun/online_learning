
@section('title','Lecturer Login')
@include('lecturer.partials.header')

<style type="text/css">
	body{
		background-image: url(/images/login-bg.jpg);
		background-size: cover;
		background-repeat: no-repeat;

        padding-top: 40px;
        padding-bottom: 40px;
	}
	.card{
		box-shadow: 0px 10px 30px;
	}
</style>

	<div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href=""><img class="logo-img" src="{{asset('/images/logo.png')}}" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="post" action="{{ route('lecturer_login') }}">
				@csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="email" id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" name="" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="signup" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
@include('lecturer.partials.js')