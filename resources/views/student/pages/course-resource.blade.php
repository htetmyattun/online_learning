    @extends('student.layouts.default')
    @section('title','Online Learning System : KBTC')
    @section('content')
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       
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
                                <h4 class="text-danger">
                                <img src="https://img.icons8.com/color/20/000000/books.png"/> Course Resources</h4>
                            </div>
                            <div class="accrodion-regular">
                                <div id="accordion3">
                                    @isset($sections)
                                    @isset($course_contents)
                                    @foreach ($sections as $section)
                                    <div class="card">
                                        <div class="card-header" id="heading{{$section->id}}">
                                            <h5 class="mb-0">
                                               <label class="aaa btn-link" data-toggle="collapse" data-target="#{{$section->id}}" aria-expanded="false" aria-controls="{{$section->id}}">
                                                 <span class="fas fa-angle-down mr-3"></span>{{ $section->title}}
                                             </label>       </h5>
                                        </div>
                                        <div id="{{$section->id}}" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion3">
                                            <div class="list-group">
                                                @foreach ($course_contents as $temp)
                                                @if ($temp->section_id == $section->id)
                                                @if ($temp->video_url)
                                                <a href="/student/course-content/{{$section->course_id}}&{{$temp->id}}" class="list-group-item list-group-item-action">
                                                    <label class="custom-control custom-checkbox green">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                    </label>    
                                                    <p class="course-content-title">
                                                        
                                                        <i class="far fa-play-circle" style="color: #3a77e0"></i>  12 mins
                                                    </p> 
                                                </a>
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
            <div class="container course">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                        <div class="page-header">
                            <br>
                            @isset($course_info)
                            <h2>{{$course_info->name}} Course</h2>
                         </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:2rem;">
                        <p><em>Welcome to our<b> {{$course_info->name}} Course</b>. You can download all resourses need in this course.</em>
                           
                        </p>
                        <ul id="myUL">
                            <li class="text-dark"><img src="https://img.icons8.com/color/22/000000/books.png"/> Course Resourses</span>
                                @isset($sections)
                                @isset($course_contents)
                                <ul class="nested active">
                                    @foreach ($sections as $section)
                                    <li><i class="fas fa-folder-open" style="color: #78670e;"></i> <span class="caret ">{{$section->title}}</span>
                                        <ul class="nested active">
                                        @foreach ($course_contents as $temp)
                                        @if ($temp->section_id == $section->id)
                                            
                                            @if ($temp->presentation_url)
                                            <li><a href=""><i class="fas fa-arrow-circle-down" style="color: #3a77e0"></i> Presentation file 2</a></li>  

                                            @elseif ($temp->assignment_url)
                                            <li>
                                                <a href="{{$temp->assignment_url}}"><i class="fas fa-arrow-circle-down" style="color: #3a77e0"></i> {{$temp->title}}</a>
                                                @if($temp->assignment_url_posted)
                                                <a href="{{$temp->assignment_url_posted}}" class="upload"><i class="fas fa-arrow-circle-down" style="color: #3a77e0"></i> Posted Assignment</a>
                                                @else
                                                <a href="#" class="upload" data-toggle="modal" data-target="#assignmentModal_{{$temp->id}}"><i class="fas fa-arrow-circle-up" style="color: green"></i> Upload Your Assignment Here</a>
                                                @endif
                                            </li>
                                            @endif
                                        @endif
                                        @endforeach
                                       
                                        </ul>
                                    </li> 
                                    @endforeach                                    
                                </ul>
                            </li>
                        </ul>            
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <a href="" class="btn btn-primary">Continue Course</a>
                </div>
                @endisset
                @endisset
                @endisset
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
