@section('title','Lecturer Signup')

@include('lecturer.partials.header')
<style>
    body{
        width: 100%;
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
<form class="splash-container" method="post" action="{{route('lecturer_signup')}}" enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Lecturer Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="name" required="" placeholder="Your name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" name="password" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="phoneno" required="" placeholder="Phone No" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input class="form-control form-control-lg" type="file" required="" name="photo" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="education" required="" placeholder="Education" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="description" required="" placeholder="description" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="short_story" required="" placeholder="short story" autocomplete="off">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
                
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="login" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
    @include('lecturer.partials.js')