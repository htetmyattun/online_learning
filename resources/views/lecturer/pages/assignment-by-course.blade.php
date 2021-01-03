@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
    @include('lecturer.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header">
                    <h2 class="pageheader-title">Check Assignments</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Assignment Lists</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <div class="accrodion-regular">
                    <div id="accordion3">
                        @isset($sections)
                        @isset($course_contents)
                        @foreach ($sections as $section)
                        @foreach ($course_contents as $temp)
                        @if ($temp->section_id == $section->id)
                        @if ($temp->assignment_url)
                        <div class="card mb-2">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                   <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lead" aria-expanded="false" aria-controls="lead">
                                    <a href="/lecturer/check-assignment/{{$temp->id}}&{{$section->course_id}}">
                                     <span class="fas fa-angle-right mr-3"></span>
                                     {{$temp->title}}
                                     </a>
                                 </button></h5>
                            </div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                        @endforeach
                        @endisset
                        @endisset
                        
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection