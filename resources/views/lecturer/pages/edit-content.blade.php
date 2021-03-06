@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
    @include('lecturer.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header">
                    <h2 class="pageheader-title">Dashboard</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item"><a onclick="history.back(-1)" class="breadcrumb-link">Add Content</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Content</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header">
                    <h4>Section 1 </h4>
                                
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <ul class="list-group">
                    @isset($course_contents)
                    @foreach($course_contents as $course_content)
                    <li class="list-group-item ">
                        @if($course_content->video_url!="")
                        <span class="fa fa-play-circle"></span>&nbsp;<a href="">{{$course_content->title}}</a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="/lecturer/edit-content/{{$course_content->id}}" class="btn btn-outline-light">Edit</a>
                                <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#content_deleteModal"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span> 
                        @elseif($course_content->assignment_url!="")
                        <span class="fa fa-paperclip"></span>&nbsp;<a href="">{{$course_content->title}}</a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="/lecturer/edit-content/{{$course_content->id}}" class="btn btn-outline-light">Edit</a>
                                <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#content_deleteModal"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span> 
                        @elseif($course_content->presentation_url!="")
                        <span class="fa fa-file"></span>&nbsp;<a href="">{{$course_content->title}}</a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="/lecturer/edit-content/{{$course_content->id}}" class="btn btn-outline-light">Edit</a>
                                <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#content_deleteModal"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span> 
                        @elseif($course_content->quiz="1")
                        <span class="fa fa-file"></span>&nbsp;<a href="/lecturer/add-quiz/{{$course_content->id}}">{{$course_content->title}}</a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="" data-toggle="modal" data-target="#editquizModal_{{$course_content->id}}" class="btn btn-outline-light">Edit</a>
                                <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#content_deleteModal_{{$course_content->id}}"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span>
                        @endif
                        
                        
                    </li>
                    @endforeach
                    @endisset
                 </ul>
                 <div class="card-body">
                                     @isset($edit_contents)
                                     @foreach($edit_contents as $edit_content)
                                    <form id="form_add_section" action="{{route('lecturer_edit_content')}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$edit_content->id}}">
                                        <input type="hidden" name="section_id" value="{{$edit_content->section_id}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Content Title *</label>
                                            <div class="col-9 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="title" class="form-control" value="{{$edit_content->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Content File *</label>
                                            <div class="col-9 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="file" required="" name="file" class="form-control">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                        0%
                                                    </div>
                                                </div>
                                                <br />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Content Type *</label>
                                            <div class="col-9 col-lg-8 col-xs-12">
                                                <div class="custom-controls-stacked">

                        @if($edit_content->video_url=="")
                        <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="type"  class="custom-control-input" value="1"><span class="custom-control-label">Video File</span>
                                                    </label>
                        @else
                        <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="type" checked=""  class="custom-control-input" value="1"><span class="custom-control-label">Video File</span>
                                                    </label>
                        @endif

                        @if($edit_content->assignment_url=="")
                        <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="type" class="custom-control-input" value="2"><span class="custom-control-label">Assignment File</span>
                                                    </label>
                        @else
                        <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="type" checked="" class="custom-control-input" value="2"><span class="custom-control-label">Assignment File</span>
                                                    </label>
                        @endif

                        @if($edit_content->presentation_url=="")
                        <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="type" class="custom-control-input" value="3"><span class="custom-control-label">Presentation File</span>
                                                    </label>
                        @else
                        <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="type" checked="" class="custom-control-input" value="3"><span class="custom-control-label">Presentation File</span>
                                                    </label>
                        @endif


                                                    
                                                    
                                                    
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
                                        @endforeach
                                        @endisset
                                        </div> 
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection