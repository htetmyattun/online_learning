@extends('student.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')
<div style="margin-top: 6rem;">
    
    <div class="dashboard-wrapper container course">
      
        <div class="container emp-profile">
            <div class="page-header">
                    <h2 class="pageheader-title">Edit Profile</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/student/profile" class="breadcrumb-link">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            <form id="form" action="{{route('student_edit_profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-2 col-lg-2"></div>
                    <div class="col-9 col-lg-7 col-xs-12">
                                <div class="profile-img-user">
                                    <img src="{{asset(\App\Http\Controllers\studentController::show_image((string)Auth::user()->profile))}}" id="profile" alt=""/>
                                    <div class="file btn btn-lg btn-primary">
                                        Change Photo
                                        <input type="file" name="profile" id="imgInp"/>
                                    </div>
                                </div>
                            </div>
                </div> 
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Name </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="name" class="form-control" value="{{Auth::user()->name}}">
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Father Name </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="father_name" class="form-control" value="{{Auth::user()->father_name}}">
                    </div>
                </div> 

                <div class="form-group row">
                    <label  class="col-3 col-lg-3 col-form-label text-right">Email </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Phone No </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="phoneno" class="form-control" value="{{Auth::user()->phone_no}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">NRC Number </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="nrc_no" class="form-control" value="{{Auth::user()->nrc_no}}">
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">NRC Photo </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                                <div class="profile-img1">
                                    <img src="{{ asset(\App\Http\Controllers\studentController::show_image((string)Auth::user()->nrc_photo))}}" id="nrc" alt=""/>
                                    <div class="file btn btn-lg btn-primary">
                                        Change Photo
                                    <input type="file" name="nrc_photo" id="imgInp1"/>
                                    </div>
                                </div>
                            </div>
                </div> 
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary" name="add_section">Update</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
        @endsection