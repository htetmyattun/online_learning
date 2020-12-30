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
                                <li class="breadcrumb-item active" aria-current="page">View Course</li>
                            </ol>
                        </nav>
                    </div>   
                 </div>
            </div>
            @isset($courses)
            @foreach($courses as $course)

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="container">
                            <div class="text-right">
                                <a href="/lecturer/add-section/{{$course->id}}" class="btn btn-primary">Add Content</a>
                                <a href="/lecturer/edit-course/{{$course->id}}" class="btn btn-outline-dark">Edit Course</a>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
                                    <video width="100%" style="padding:0px 10px;" controls>
                                      <source src="{{ asset(\App\Http\Controllers\lecturerController::show_image((string)$course->preview)) }}" type="video/mp4">
                                      <source src="{{ asset(\App\Http\Controllers\lecturerController::show_image((string)$course->preview)) }}" type="video/ogg">
                                      Your browser does not support HTML5 video.
                                    </video>
                                    <p></p>
                                    <h3 class="text-center">Preview video</h3>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                                    <div class="product-details">
                                        <div class="border-bottom pb-3 mb-3">
                                            <h2 class="mb-3">{{$course->cname}}</h2>
                                            <p><em>{{$course->lecturer_name}}</em></p>

                                            <div class="product-rating d-inline-block float-right">
                                                @if($course->avg==5)
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                @elseif($course->avg==4)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @elseif($course->avg==3)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @elseif($course->avg==2)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @else
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @endif
                                            </div>
                                            <h3 class="mb-0 text-primary">{{$course->price-$course->discount_price}} Kyats <del class="product-del"> {{$course->discount_price}} Kyats</del></h3>
                                            <p></p>
                                            
                                            
                                            
                                        </div>
                                        
                                        <div class="product-description">
                                            <span class="text-danger">Start Date : {{$course->start_date}}</span>
                                            <p><em>Duration : {{$course->duration}} weeks</em></p>
                                            
                                            <a href=""><span class="badge badge-pill badge-primary">Live ID : {{$course->live_id}}</span></a>
                                            
                                            <p></p>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                                    <div class="simple-card">
                                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Descriptions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Reviews</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent5">
                                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                                <h3>Course Brief</h3>
                                                <p>{{$course->description}}</p>
                                                <h3>Entry Requirements</h3>
                                              <p>
                                                {{$course->entry_requirements}}
                                              </p>
                                                <h3>Exam Infomation</h3>
                                                <p>{{$course->exam_information}}</p>
                                                <h3>Careers</h3>
                                               <p>
                                                {{$course->exam_information}}
                                               </p>
                                            </div>
                                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                                @isset($reviews)
                                                @foreach($reviews as $review)
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“{{$review->review}}”</p>
                                                    <div class="rating-star mb-4">
                                                        @if($review->stars==5)
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        @elseif($review->stars==4)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($review->stars==3)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($review->stars==2)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @else
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @endif
                                                    </div>  
                                                    <span class="text-dark font-weight-bold">{{$review->name}}</span>
                                                </div>
                                                @endforeach
                                                @endisset
                                                @empty($review)
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“No Reviews Yet”</p>
                                                </div>
                                                @endempty
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="/lecturer/add-section/{{$course->id}}" class="btn btn-primary">Add Content</a>
                                <a href="/lecturer/edit-course/{{$course->id}}" class="btn btn-outline-dark">Edit Course</a>
                            </div>
                        </div>

                </div>
        </div>

    </div>
    @endforeach
    @endisset
    @include('lecturer.partials.footer')
</div>
      

    @endsection