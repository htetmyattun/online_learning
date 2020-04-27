@extends('student.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')
<div style="margin-top: 6rem;">
   
    <div class="dashboard-wrapper container course">
        <div class="row">
            <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-1 col-md-1"></div>
                            <div class="col-7 col-md-9">
                                <div class="profile-head">
                                            <h3>
                                                {{ Auth::user()->name}}
                                            </h3>
                                            <br>
                                            <h6>Your Enroll Courses</h6>
                                            <a href="/student/edit-profile"><span class="badge badge-pill badge-primary">Web Development</span></a>
                                            <a href="/student/edit-profile"><span class="badge badge-pill badge-secondary">Android Development</span></a>
                                            <br>
                                            <br>
                                            <br>
                                            
                                            
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-1 col-md-1">
                                <a href="/student/edit-profile"><span class="badge badge-pill badge-light">Edit Profile</span></a>
                            </div>
                            <div class="col-1 col-md-1"></div>
                            <div class="col-1 col-md-1">
                                
                            </div>
                            <div class="col-8 col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                               
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->name}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Father Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->father_name}}</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->email}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->phone_no}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>NRC Number</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->nrc_no}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label>NRC Photo</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="profile-img">
                                                            <img src="{{ asset(Auth::user()->nrc_photo)}}" id="profile" alt=""/>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>           
                </div>
            </div>
        </div>
    </div>
        @endsection