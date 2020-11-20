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
                                <li class="breadcrumb-item active" aria-current="page">Add Content</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <ul class="list-group">
                    @isset($sections)
                    @foreach($sections as $section)
                     <li class="list-group-item ">
                        <i class="fas fa-angle-double-right"></i><a href="/lecturer/add-content/{{$section->id}}">  {{$section->title}} </a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="/lecturer/edit-section/{{$section->id}}" class="btn btn-outline-light">Edit Name</a>
                                <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#deleteModal_{{$section->id}}"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span>
                    </li>
                    
                    @endforeach
                    @endisset
                    
                 </ul>
                 <div class="card-body">
                    @isset($id)
                                    <form id="form" action="{{route('lecturer_add_section')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{$id}}">
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Enter Section Name *</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="section_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary" name="add_section">Submit</button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </form>
                                        @endisset
                                        </div> 
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection