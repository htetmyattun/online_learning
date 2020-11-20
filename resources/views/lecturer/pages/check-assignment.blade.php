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
                                
                                <li class="breadcrumb-item"><a href="/lecturer/assignment-list/{{$course_id}}" class="breadcrumb-link">Assignment Lists</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Check Assignment</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <ul class="list-group" style="background-color: white;">
                    @isset($assignments)
                    @foreach ($assignments as $temp)
                    @isset($temp->assignment_url_posted)
                    @empty($temp->marks)
                    <li class="list-group-item-2">
                        <label class="custom-control custom-checkbox green">
                            <input type="checkbox"  class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                            <a href=""><span class="fa fa-download text-secondary"></span></a>
                            <br>
                            By <span class="text-primary">{{$temp->name}}</span>
                        </label>
                        <div class="marking text-success">---</div>
                        <span class="marking text-dark">
                            <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#savemarkModal_{{$temp->assignment_id}}">Save Mark</a>
                        </span>
                    </li>
                    <!-- <li class="list-group-item-2 ">
                        <label class="custom-control custom-checkbox green">
                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 1</span>
                            <a href=""><span class="fa fa-download text-secondary"></span></a>
                            <br>
                            By <span class="text-primary">He lan Ai</span>
                        </label> 
                        <div class="marking text-success">93 marks</div>
                        <span class="marking text-dark">
                            <a href="n" class="btn btn-outline-light" >Save Mark</a>
                        </span>
                    </li> -->
                    @endempty
                    @endisset
                    @endforeach
                    @foreach ($assignments as $temp)
                    @isset($temp->assignment_url_posted)
                    @isset($temp->marks)
                    <li class="list-group-item-2">
                        <label class="custom-control custom-checkbox green">
                            <input type="checkbox"  class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                            <a href=""><span class="fa fa-download text-secondary"></span></a>
                            <br>
                            By <span class="text-primary">{{$temp->name}}</span>
                        </label>
                        <div class="marking text-success">{{$temp->marks}}</div>
                    </li>
                    @endisset
                    @endisset
                    @endforeach
                    
                    @endisset
                 </ul>
                
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection