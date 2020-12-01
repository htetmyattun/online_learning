@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

 

<div class="dashboard-main-wrapper">
	@include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Add New College Student</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New College Student</li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
                      
        </div>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        
        <div class="from">
            <form action="{{route('management_save_new_student')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Student Registrations Form</h3>
                <p>Please enter your student information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="name" required="" placeholder="Your name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="fathername" required="" placeholder="Father Name" autocomplete="off">
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
                    <input class="form-control form-control-lg" type="text" name="nrcno" required="" placeholder="NRC No" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>NRC Photo</label>
                    <input class="form-control form-control-lg" type="file" required="" name="nrcphoto" autocomplete="off">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
               
                
            </div>
            <div class="card-footer bg-white">
               
            </div>
        </div>
    </form>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>


    @endsection