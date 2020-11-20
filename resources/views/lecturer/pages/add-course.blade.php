@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
	@include('lecturer.partials.sidebar')
    <div class="dashboard-wrapper-1 container">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header course">
                    <h2 class="pageheader-title">Add Course </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                            </ol>
                        </nav>
                    </div>             
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add Form</h5>
                                <div class="card-body">
                                 
                                        <form id="form_add_course"   action="{{route('lecturer_add_course')}}" method="post" enctype="multipart/form-data">
                                         @csrf
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Course Name *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="course_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Price *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="price" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Discount Price *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="discount_price" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Description *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <textarea  id="inputtext2" required="" name="description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Entry Requirements *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <textarea id="inputtext2" required="" name="entry_req" class="form-control"></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Start Date *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="date" required="" name="start_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Duration *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="duration" class="form-control">
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Preview Video *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="file" required="" name="preview_video" class="form-control">
                                                <br />
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Course Photo *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="file" required="" name="course_photo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Category *</label>
                                            <div class="col-sm-6">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radioinline" checked="" class="custom-control-input" value="Software Engineering"><span class="custom-control-label">Software Engineering</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Networking"><span class="custom-control-label">Networking</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Cyber Security"><span class="custom-control-label">Cyber Security</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Embedded System"><span class="custom-control-label">Embedded System</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radioinline" class="custom-control-input" value="Business IT"><span class="custom-control-label">Business IT</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Career *</label>
                                            <div class="col-7 col-lg-8  col-xs-12">
                                                <textarea id="inputtext2" required="" name="career" class="form-control"></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Exam Information *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <textarea id="inputtext2" required="" name="exam_info" class="form-control"></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Live ID</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input type="text" id="inputtext2" name="live_id" class="form-control"> 
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection