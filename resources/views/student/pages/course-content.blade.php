    @extends('student.layouts.default')
    @section('title','Online Learning System : KBTC')
    @section('content')
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="message-floating">
            <a href="/student/chat"><svg id="Capa_1" enable-background="new 0 0 512 512" height="70" viewBox="0 0 512 512" width="70" xmlns="http://www.w3.org/2000/svg"><g><g><g><g><g><g><g><g><g><circle cx="256" cy="256" fill="#ffce00" r="256"/></g></g></g></g></g></g></g></g><path d="m405.672 203.688-2.177 3.667-84.438-85.768-213.128 195.496 191.571 191.57c105.536-17.203 189.397-98.936 209.762-203.376z" fill="#ffa300"/><g><path d="m213.276 77c-71.35 0-129.191 46.884-129.191 104.717 0 21.573 8.049 41.623 21.844 58.284v77.082l47.36-42.597c17.926 7.631 38.334 11.95 59.987 11.95 71.35 0 129.191-46.884 129.191-104.717s-57.841-104.719-129.191-104.719z" fill="#fe6a16"/></g><g><path d="m213.276 77c-.177 0-.352.005-.529.005v209.423c.177.001.352.007.529.007 71.35 0 129.191-46.884 129.191-104.717s-57.841-104.718-129.191-104.718z" fill="#f24500"/></g><g><path d="m305.809 165.407c71.35 0 129.191 46.884 129.191 104.717 0 21.573-8.049 41.623-21.844 58.284v77.082l-47.359-42.597c-17.926 7.631-38.334 11.949-59.987 11.949-71.35 0-129.191-46.884-129.191-104.717s57.84-104.718 129.19-104.718z" fill="#fff"/></g><g><path d="m305.809 165.407c-.299 0-.595.008-.894.009v209.417c.298.002.595.009.894.009 21.653 0 42.061-4.318 59.987-11.949l47.36 42.597v-77.082c13.795-16.661 21.844-36.71 21.844-58.284 0-57.834-57.841-104.717-129.191-104.717z" fill="#e9edf5"/></g><g><g><circle cx="244.886" cy="270.027" fill="#cdd2e1" r="20.027"/></g><g><circle cx="366.732" cy="270.027" fill="#afb4c8" r="20.027"/></g></g><g><circle cx="305.809" cy="270.027" fill="#cdd2e1" r="20.027"/></g><g><path d="m305.809 250c-.302 0-.595.032-.894.045v39.964c.299.013.592.045.894.045 11.061 0 20.027-8.966 20.027-20.027s-8.966-20.027-20.027-20.027z" fill="#afb4c8"/></g></g></svg>
            </a>
        </div>
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
                                            <a href="/student/course-resource/{{$course->id}}"><h4 class="text-primary"><img src="https://img.icons8.com/color/20/000000/books.png"/> Course Resources</h4></a>
                                        </div>
                                        <div class="accrodion-regular">
                                            @isset($sections)
                                            @isset($course_content)
                                            @foreach ($sections as $section)
                                            <div class="card mb-2">
                                                <div class="card-header" id="heading{{$section->id}}">
                                                    <h5 class="mb-0">
                                                       <label class="aaa btn-link" data-toggle="collapse" data-target="#{{$section->id}}" aria-expanded="false" aria-controls="{{$section->id}}">
                                                         <span class="fas fa-angle-down mr-3"></span>{{ $section->title}}
                                                     </label>       </h5>
                                                </div>
                                                @if($course_content->section_id==$section->id)
                                                <div id="{{$section->id}}" class="collapse show" aria-labelledby="heading{{$section->id}}" data-parent="#accordion3">
                                                @else
                                                <div id="{{$section->id}}" class="collapse" aria-labelledby="heading{{$section->id}}" data-parent="#accordion3">
                                                @endif
                                                    <div class="list-group">

                                                    
                                                    @foreach ($course_contents as $temp)
                                                        @if ($temp->section_id == $section->id)
                                                        @if ($temp->video_url)
                                                        @if($course_content->id==$temp->id)
                                                        <a href="{{$section->course_id}}&{{$temp->id}}&2" class="list-group-item list-group-item-action video-active">
                                                            <label class="custom-control custom-checkbox green">
                                                            @if(!is_null($temp->status)) 
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   checked="checked" disabled="disabled">
                                                           @else
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   disabled="disabled">
                                                            @endif

                                                            <span class="custom-control-label text-dark">{{$temp->title}}{{$course_content->status}}</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <i class="far fa-play-circle" style="color: #3a77e0"></i>
                                                                {{$temp->length}} mins
                                                            </p> 
                                                        </a>
                                                        @else
                                                        <a href="{{$section->course_id}}&{{$temp->id}}&2" class="list-group-item list-group-item-action">
                                                <label class="custom-control custom-checkbox green">
                                                    @if(!is_null($temp->status)) 
                                                           <input type="checkbox" class="custom-control-input"   checked="checked"  disabled="disabled" name="chk[]">
                                                           @else
                                                           <input type="checkbox" class="custom-control-input"  disabled="disabled" name="chk[]">
                                                            @endif
                                                    <span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <i class="far fa-play-circle" style="color: #3a77e0"></i>
                                                                {{(int)($temp->length/60)}} mins
                                                            </p> 
                                                        </a>
                                                        @endif
                                                        @elseif ($temp->assignment_url)
                                                        <a href="{{$temp->assignment_url}}" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <i class="far fa-file-pdf text-secondary"></i>
                                                                {{$temp->id}}.pdf
                                                            </p> 
                                                        </a>
                                                        @endif
                                                    @endif
                                                    @endforeach
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endisset
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
            <div class="container course" style="margin-top: 3rem;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2>{{$course->name}} Course</h2>
                           
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
                        <h4>{{$course_content->title}}</h4>
                        <video width="100%" height="350" controls>
                          <source src="{{ asset($course_content->video_url)}}" type="video/mp4">
                          <source src="{{ asset($course_content->video_url)}}" type="video/ogg">
                          Your browser does not support HTML5 video.
                        </video>
                        <p></p>
                        @isset($videos)
                        @foreach ($videos as $key => $video)
                        @if($course_content -> id == $video -> cc_id)
                        @unless ($loop->first)
                        <a href="{{$course -> id}}&{{$videos[$key-1] -> cc_id}}&0" class="btn btn-outline-primary">Previous</a>
                        @endunless
                        @unless ($loop->last)
                        <a href="{{$course -> id}}&{{$videos[$key+1] -> cc_id}}&1" class="btn btn-primary" style="float: right;">Next</a>
                        @endunless
                        @endif
                        @endforeach
                        @endisset
                        @endif
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 m-b-60">
                        <form action="{{route('student_save_note')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ccid" value="{{$course_content->id}}">
                            <input type="hidden" name="cid" value="{{$course_content->course_id}}">
                            <h4>Notes</h4>
                            <input type="hidden" name="nid" value="{{$course_content->nid}}">
                        <textarea class="note" name="note" placeholder="note here..." value="">{{$course_content->note}}</textarea>
                        <p></p>
                        <button type="submit" name="save_note" class="btn btn-outline-primary" ><i class="far fa-sticky-note"></i> Save Note</button>
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
                                    {{$course->entry_requirements}}
                                    <h3>Exam Infomation</h3>
                                    <p>{{$course->exam_information}}</p>
                                    <h3>Careers</h3>
                                    {{$course->career}}
                                    
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