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
                                                        @if($course_content->id==$temp->cid)
                                                        <a href="/student/course-content/{{$section->course_id}}&{{$temp->cid}}&2" class="list-group-item list-group-item-action video-active">
                                                            <label class="custom-control custom-checkbox green">
                                                            @if(!is_null($temp->status)) 
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   checked="checked" disabled="disabled">
                                                           @else
                                                           <input type="checkbox" class="custom-control-input" name="chk[]"   disabled="disabled">
                                                            @endif

                                                            <span class="custom-control-label text-dark">{{$temp->title}}</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <i class="far fa-play-circle" style="color: #3a77e0"></i>
                                                                {{(int)($temp->length/60)}} mins
                                                            </p> 
                                                        </a>
                                                        @else
                                                        <a href="/student/course-content/{{$section->course_id}}&{{$temp->cid}}&2" class="list-group-item list-group-item-action">
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
                                                                {{$temp->cid}}.pdf
                                                            </p> 
                                                        </a>
                                                        @elseif ($temp->quiz)
                                                        @if($course_content->id==$temp->cid)
                                                        <a href="/student/quiz/{{$section->course_id}}&{{$temp->cid}}" class="list-group-item list-group-item-action video-active">
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

                                                        @else

                                                        <a href="/student/quiz/{{$section->course_id}}&{{$temp->cid}}" class="list-group-item list-group-item-action ">
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
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                    @if($flag!=0) 
                        @isset($quiz_mark)
                        <div class="card card-body">
                            <h3><i class="fas fa-question-circle text-info"></i> {{$course_content->title}}</h3>
                            <h1>{{($quiz_mark->marks/$course_content->no_quiz)*100}}%</h1>
                            <div>
                               <i class="fas fa-check text-success"></i>
                              {{$quiz_mark->marks}} correct answers
                            </div>
                            <div>
                                <i class="fas fa-times text-danger"></i>
                              {{$quiz_mark->marks-$course_content->no_quiz}} incorrect answers
                            </div>
                            <div>
                                <i class="fas fa-chart-bar text-primary"></i>
                                {{$quiz_mark->marks}}
                                out of
                                {{$course_content->no_quiz}} points
                            </div>

                        </div>
                        <button class="btn btn-success">Complete</button>
                        
                        @endisset
                    @else
                    @isset($quiz)
                    <form method="post" action="{{route('student_answer_quiz')}}">
                    @csrf

                    <ol>
                        @foreach($quiz as $q)
                        
                    
                        <li class="">
                            {{$q->question}}

                            <label class="custom-control custom-radio">
                                <input type="radio" name="answer_{{$q->id}}"class="custom-control-input" value="1"><span class="custom-control-label">{{$q->choice_1}}</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="answer_{{$q->id}}" class="custom-control-input" value="2"><span class="custom-control-label">{{$q->choice_2}}</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="answer_{{$q->id}}" class="custom-control-input"value="3" ><span class="custom-control-label">{{$q->choice_3}}</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="answer_{{$q->id}}" class="custom-control-input"  value="4"><span class="custom-control-label">{{$q->choice_4}}</span>
                            </label>
                        </li>
                        <br>
                        
                        @endforeach

                        </ol>
                        <input type="hidden" name="course_content_id" value="{{$course_content->id}}">
                        <div class="float-right">
                            <input type="submit" name="submit" class="btn btn-success" value="Submit">
                            <input type="reset" name="cancel" class="btn btn-outline-light" value="Cancel">
                        </div>
                        
                    </form>
                    @endisset
                    @endif
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