@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
	@include('lecturer.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Dashboard</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                            </ol>
                        </nav>
                    </div>   
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Edit Form</h5>
                                <div class="card-body">
                                 @isset($courses)
                                 @foreach($courses as $course)
                                        <form id="form" action="{{route('lecturer_edit_course')}}" method="post" enctype="multipart/form-data">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$course->id}}">
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Course Name *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="course_name" class="form-control" value="{{$course->cname}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Price *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="price" class="form-control" value="{{$course->price}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Discount Price *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="discount_price" class="form-control" value="{{$course->discount_price}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Description *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <textarea  id="inputtext2" required="" name="description" class="form-control" >{{$course->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Entry Requirements *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <textarea id="inputtext2" required="" name="entry_req" class="form-control">{{$course->entry_requirements}}</textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Start Date *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="date" required="" name="start_date" class="form-control" 

                                                value="{{date('yy-m-d', strtotime($course->start_date))}}">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Duration *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="duration" class="form-control" value="{{$course->duration}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Preview Video *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="file"  name="preview_video" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Course Photo *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">

                                                <input id="inputtext2" type="file"  name="course_photo" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Category *</label>
                                            <div class="col-sm-6">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        @if($course->category=="Software Engineering")
                                                        <input type="radio" name="radioinline" checked="" class="custom-control-input" value="Software Engineering"><span class="custom-control-label">Software Engineering</span>
                                                        @else
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Software Engineering"><span class="custom-control-label">Software Engineering</span>
                                                        @endif
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        @if($course->category=="Networking")
                                                        <input type="radio" name="radioinline" checked="" class="custom-control-input" value="Networking"><span class="custom-control-label">Networking</span>
                                                        @else
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Networking"><span class="custom-control-label">Networking</span>
                                                        @endif
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        @if($course->category=="Cyber Security")
                                                        <input type="radio" name="radioinline" checked="" class="custom-control-input" value="Cyber Security"><span class="custom-control-label">Cyber Security</span>
                                                        @else
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Cyber Security"><span class="custom-control-label">Cyber Security</span>
                                                        @endif
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        @if($course->category=="Embedded System")
                                                        <input type="radio" name="radioinline" checked="" class="custom-control-input" value="Embedded System"><span class="custom-control-label">Embedded System</span>
                                                        @else
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Embedded System"><span class="custom-control-label">Embedded System</span>
                                                        @endif
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        @if($course->category=="Business IT")
                                                        <input type="radio" name="radioinline" checked="" class="custom-control-input" value="Business IT"><span class="custom-control-label">Business IT</span>
                                                        @else
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Business IT"><span class="custom-control-label">Business IT</span>
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Career *</label>
                                            <div class="col-7 col-lg-8  col-xs-12">
                                                <textarea id="inputtext2" required="" name="career" class="form-control">{{$course->career}}</textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Exam Information *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <textarea id="inputtext2" required="" name="exam_info" class="form-control">{{$course->exam_information}}</textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Live ID</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input type="text" id="inputtext2" name="live_id" class="form-control" value="{{$course->live_id}}"> 
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Update</button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
@endforeach
@endisset
    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection