    @extends('student.layouts.default')
    @section('title','Online Learning System : KBTC')
    @section('content')
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       @isset($course)
        <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <div class="nav-left-sidebar sidebar-dark">
                        <div class="menu-list">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 last-item">
                                        <div class="section-block">
                                            <h3 >Course Content </h3>
                                            <a href="/student/course-resource/{{$course->id}}"><h4 class="text-primary"><span class="fas fa-download"></span> Course Resources</h4></a>
                                        </div>
                                        <div class="accrodion-regular">
                                            @isset($sections)
                                            @foreach ($sections as $section)
                                            <div class="card mb-2">
                                                <div class="card-header" id="heading{{$section->id}}">
                                                    <h5 class="mb-0">
                                                       <button class="btn btn-link" data-toggle="collapse" data-target="#{{$section->id}}" aria-expanded="false" aria-controls="{{$section->id}}">
                                                         <span class="fas fa-angle-down mr-3"></span>{{ $section->title}}
                                                     </button>       </h5>
                                                </div>
                                                <div id="{{$section->id}}" class="collapse" aria-labelledby="heading{{$section->id}}" data-parent="#accordion3">
                                                    <div class="list-group">

                                                    @isset($course_content)
                                                    @foreach ($course_contents as $temp)
                                                        @if ($temp->section_id == $section->id)
                                                        @if ($temp->video_url)
                                                        <a href="{{$section->course_id}}&{{$temp->id}}" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox green">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-play-circle"></span>
                                                                12 mins
                                                            </p> 
                                                        </a>
                                                        @elseif ($temp->assignment_url)
                                                        <a href="{{$temp->assignment_url}}" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                {{$temp->id}}.pdf
                                                            </p> 
                                                        </a>
                                                        @elseif ($temp->presentation_url)
                                                        <a href="{{$temp->presentation_url}}" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                {{$temp->id}}.pptx
                                                            </p> 
                                                        </a>
                                                        @endif
                                                    @endif
                                                    @endforeach
                                                    @endisset
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </nav>
            </div>
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper-1">
            <div class="container course">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">{{$course->name}} </h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{$course->name}}</a></li>
                                        <li class="breadcrumb-item"><a href="/student/course-resource/{{$course->id}}" class="breadcrumb-link">
                                            {{$course_content->sec_tit}}
                                        </a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{$course_content->title}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9 m-b-60">
                        @if (!empty($course_content->video_url))
                        <video width="100%" controls>
                          <source src="{{ asset($course_content->video_url)}}" type="video/mp4">
                          <source src="{{ asset($course_content->video_url)}}" type="video/ogg">
                          Your browser does not support HTML5 video.
                        </video>
                        <p></p>
                        <a href="" class="btn btn-outline-primary">Previous</a>
                        <a href="" class="btn btn-primary" style="float: right;">Next</a>
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 m-b-60">
                        <form >
                        <textarea class="note" placeholder="note here..." ></textarea>
                        <input type="submit" name="" value="Save" class="btn btn-primary">
                    </form>
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
                                    <ul class="list-unstyled arrow">
                                        <li>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                        <li>Donec ut elit sodales, dignissim elit et, sollicitudin nulla.</li>
                                        <li>Donec at leo sed nisl vestibulum fermentum.
                                        </li>
                                    </ul>
                                    <h3>Exam Infomation</h3>
                                    <p>{{$course->exam_information}}</p>
                                    <h3>Careers</h3>
                                    <ul class="list-unstyled arrow">
                                        <li>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                        <li>Donec ut elit sodales, dignissim elit et, sollicitudin nulla.</li>
                                        <li>Donec at leo sed nisl vestibulum fermentum.
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                    <div class="review-block">
                                        <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
                                        <div class="rating-star mb-4">
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star" ></i>
                                        </div>
                                        <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
                                    </div>
                                    <div class="review-block border-top mt-3 pt-3">
                                        <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                        <div class="rating-star mb-4">
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star" ></i>
                                        </div>
                                        <span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute"> (Company name)</small>
                                    </div>
                                    <div class="review-block  border-top mt-3 pt-3">
                                        <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                        <div class="rating-star mb-4">
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star checked" ></i>
                                            <i class="las la-star" ></i>
                                        </div>
                                        <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
                
            </div>
        </div>
            
        </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer-1">
                <div class="container-fluid">
                    
                    <div class="row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2020 Concept. All rights reserved. Dashboard by <a href="">Knowledge Lab Software Solution</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    @endsection