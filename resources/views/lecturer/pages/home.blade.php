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
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">My Classes</a></li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            @isset($courses)
            @foreach($courses as $course)
            <div class="col-lg-6 col-sm-12 col-12">
                <div class="product-thumbnail">
                <div class="product-img-head">
                    <div class="product-img">

                        <img src="{{ asset(\App\Http\Controllers\lecturerController::show_image((string)$course->photo)) }}" alt="" class="img-fluid">
                   
                        
                    </div>
                    
                </div>
                <div class="product-content">
                    <div class="product-content-head">
                        <h3 class="product-title">{{$course->cname}}</h3>
                        <p>{{$course->lecturer_name}}</p>
                        <div class="product-rating d-inline-block">
                            <i class="las la-star checked" ></i>
                            <i class="las la-star checked" ></i>
                            <i class="las la-star checked" ></i>
                            <i class="las la-star checked" ></i>
                            <i class="las la-star" ></i>
                        </div>
                        <div class="product-price">
                            {{$course->discount_price}} Kyats &nbsp;
                            <del class="product-del">{{$course->price}} Kyats &nbsp;</del>
                        </div>
                    </div>
                    <div class="product-btn">
                        <a href="view-course/{{$course->id}}" class="btn btn-primary">View Course</a>
                        <a href="add-section/{{$course->id}}" class="btn btn-outline-light">Add Content</a>
                        <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                    </div>
                </div>
            </div>
        </div>

@endforeach
@endisset


                      
                            
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection