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
                                                <a href="/student/course-content/{{$section->course_id}}&{{$temp->id}}&2" class="list-group-item list-group-item-action">
                                                    <label class="custom-control custom-checkbox green">
                                                   @if(!is_null($temp->status)) 
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   checked="checked" disabled="disabled">
                                                           @else
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   disabled="disabled">
                                                            @endif
                                                    <span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                    </label>    
                                                    <p class="course-content-title">
                                                        
                                                        <i class="far fa-play-circle" style="color: #3a77e0"></i>  12 mins
                                                    </p> 
                                                </a>
                                                @elseif ($temp->assignment_url)
                                                <a href="{{$temp->assignment_url}}" class="list-group-item list-group-item-action">
                                                    <label class="custom-control custom-checkbox">
                                                    @if(!is_null($temp->status)) 
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   checked="checked" disabled="disabled">
                                                           @else
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   disabled="disabled">
                                                            @endif

                                                    <span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                    </label>    
                                                    <p class="course-content-title">
                                                        <i class="far fa-file-pdf text-secondary"></i>
                                                        {{$temp->id}}.pdf
                                                    </p> 
                                                </a>
                                                @elseif ($temp->quiz)
                                                <a href="/student/quiz/{{$section->course_id}}&{{$temp->id}}" class="list-group-item list-group-item-action">
                                                    <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                    </label>    
                                                    <p class="course-content-title">
                                                        <i class="far fa-question-circle text-danger"></i>
                                                        {{$temp->no_quiz}} 
                                                        @if($temp->no_quiz>1)
                                                        questions
                                                        @else
                                                        question
                                                        @endif
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
