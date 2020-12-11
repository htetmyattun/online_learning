@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
    @include('lecturer.partials.sidebar')
    <div class="dashboard-wrapper-1 container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header course">
                    <h2 class="pageheader-title">Add Exam </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Exam</li>
                            </ol>
                        </nav>
                    </div>             
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <p>Please enter your information.</p>
                                </div>
                                <div class="card-body">
                                 
                                        <form action="{{route('lecturer_add_exam')}}" method="post" enctype="multipart/form-data">
                                         @csrf
                                        <div class="form-group row">
                                            <label for="" class="col-5 col-lg-3 col-form-label text-right">Exam Title *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="" type="text" required="" name="exam_title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Subject *</label>
                                            <div class="col-sm-6">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="subject" checked="" class="custom-control-input" value="Software Engineering"><span class="custom-control-label">Software Engineering</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="subject" class="custom-control-input" value="Networking"><span class="custom-control-label">Networking</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="subject" class="custom-control-input" value="Cyber Security"><span class="custom-control-label">Cyber Security</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="subject" class="custom-control-input" value="Embedded System"><span class="custom-control-label">Embedded System</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="subject" class="custom-control-input" value="Business IT"><span class="custom-control-label">Business IT</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Exam type *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <select class="form-control" name="exam_type">
                                                    <option value="1">Quiz</option>
                                                    <option value="2">Assignment</option>
                                                </select>
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