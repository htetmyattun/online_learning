@extends('student.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')
<div style="margin-top: 6rem;">
   
    <div class="dashboard-wrapper container course">
        <div class="row">
            <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    @if(Auth::user()->profile=="/images/default-profile.png")
                                    <img src="{{ asset(Auth::user()->profile)}}" alt=""/>
                                    @else
                                    <img src="{{ asset(\App\Http\Controllers\studentController::show_image((string)Auth::user()->profile)) }}" alt=""/>
                                    @endif

                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="profile-head">
                                            <h3>
                                                {{ Auth::user()->name}}
                                            </h3>
                                            <br>
                                            <h6>Your Enroll Courses</h6>
                                            @isset($student_course)
                                            @foreach($student_course as $s_course)
                                            <a href="/student/detail-course/{{$s_course->c_id}}"><span class="badge badge-pill badge-info">{{$s_course->name}}</span></a>
                                            @endforeach
                                            @endisset
                                            <br>
                                            <br>
                                            <br>
                                            
                                            
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="my-nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        @if(isset($attendance))
                                        <li class="nav-item">
                                            <a class="my-nav-link" id="attendance-tab" data-toggle="tab" href="#attendance" role="tab" aria-controls="attendance" aria-selected="true">Attendance</a>
                                        </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="my-nav-link" id="certificate-tab" data-toggle="tab" href="#certificate" role="tab" aria-controls="certificate" aria-selected="true">Certificate</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-2 col-md-2">
                                <a href="/student/edit-profile"><span class="badge badge-pill badge-light">Edit Profile</span></a>
                            </div>
                            <div class="col-4">
                                
                            </div>
                            <div class="col-6">
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
                                                        <div class="profile-img1">
                                                            <img src="{{asset(\App\Http\Controllers\studentController::show_image((string)Auth::user()->nrc_photo))}}" id="profile" alt=""/>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    @if(isset($attendance))
                                    <div class="tab-pane fade show" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
                                            <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Date</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Total class sections</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Attended class sections</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Percentage</label>
                                                    </div>
                                                </div>
                                               @foreach($attendance as $a)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p>{{date('M',strtotime($a->attendance_date))}} ,
                                                        {{date('Y',strtotime($a->attendance_date))}}
                                                    </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>{{ $a->total}}</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>{{ $a->attendance}}</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        
                                                        <p>{{number_format((float)($a->attendance/$a->total)*100, 2, '.', '')}} %</p>
                                                    </div>
                                                </div>
                                                
                                                @endforeach
                                    </div>
                                    @endif
                                    <div class="tab-pane fade show" id="certificate" role="tabpanel" aria-labelledby="certificate-tab">
                                         <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Date</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Certificate</label>
                                                    </div>
                                                </div>
                                        @isset($certificate)
                                        @foreach($certificate as $c)
                                            <div class="row">
                                                    <div class="col-md-4">
                                                       {{date('d-m-Y',strtotime($c->updated_at))}}
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{$c->name}} Certificate
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{asset($c->certificate_photo)}}" class="text-danger">Download</a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endisset
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