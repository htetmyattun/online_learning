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
                                <li class="breadcrumb-item"><a href="/lecturer/view-exam" class="breadcrumb-link">Exam</a></li>
                                
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
                    
                    <li class="list-group-item-2">
                        <label>
                            
                            <span class="text-primary" style="margin-right: 10px">{{$temp->name}}</span>
                            <a href="{{asset(\App\Http\Controllers\lecturerController::show_image((string)$temp->assignment_url))}}" download=""><i class="fas fa-download text-secondary"></i></a>
                            <br>
                            Submitted at <span class="text-primary">{{date('d/m/y  h:i A', strtotime($temp->assignment_url_posted_at))}}</span>

                        </label>
                        
                        <div class="marking text-success">
                            
                            <a href=""  class="btn btn-danger"data-toggle="modal" data-target="#assignment_deleteModal_{{$temp->eid}}">Delete</a>
                        </div>
                    </li>
                    @endforeach
                    
                    @endisset
                 </ul>
                
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection