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
                                        <h4 class="text-danger"><span class="fas fa-download"></span> Course Resources</h4>
                                    </div>

                                    <div class="accrodion-regular">
                                        <div id="accordion3">
                                            <div class="card mb-2">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                       <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lead" aria-expanded="false" aria-controls="lead">
                                                         <span class="fas fa-angle-down mr-3"></span>Section 1
                                                     </button>       </h5>
                                                </div>
                                                <div id="lead" class="collapse" aria-labelledby="headingOne" data-parent="#accordion3">
                                                    <div class="list-group">
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox green">
                                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Video 1</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-play-circle"></span>
                                                                12 mins
                                                            </p> </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" class="custom-control-input" ><span class="custom-control-label text-dark">Assignment 1</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Video 2</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-play-circle"></span>
                                                                12 mins
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 2</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Video 3</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-play-circle"></span>
                                                                12 mins
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 3</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                       <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                         <span class="fas fa-angle-down mr-3"></span>Section 2
                                                       </button>
                                                      </h5>
                                                </div>
                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion3">
                                                    <div class="list-group">
                                                        <a href="#" class="list-group-item list-group-item-action bg-light">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">Video 1</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-play-circle"></span>
                                                                12 mins
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 1</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">Video 2</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-play-circle"></span>
                                                                12 mins
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 2</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">Video 3</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-play-circle"></span>
                                                                12 mins
                                                            </p> 
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <label class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 3</span>
                                                            </label>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-2">
                                                <div class="card-header " id="headingThree">
                                                    <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                     <span class="fas fa-angle-down mr-3"></span>Section 3
                                                     </button>
                                                               </h5>
                                                </div>
                                                <div id="collapseNine" class="collapse" aria-labelledby="headingThree" data-parent="#accordion3">
                                                    <div class="card-body">
                                                        Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-tabhetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                            <h2 class="pageheader-title">Course Name</h2>
                                        
                         </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7" style="margin-bottom:2rem;">
                        <ul id="myUL">
                            <li><span class="caret text-dark">Course Resourse</span>
                                <ul class="nested active">
                                    <li><span class="caret">Section 1</span>
                                        <ul class="nested active">
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Presentation file 1</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Presentation file 2</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Video 1</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Assignment 1</a><a href="" class="upload"><span class="fas fa-upload text-danger"></span> Upload Your Assignment Here</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Video 2</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Assignment 2</a><a href="" class="upload"><span class="fas fa-upload text-danger"></span> Upload Your Assignment Here</a></li>
                                        </ul>
                                    </li>  
                                    <li><span class="caret">Section 2</span>
                                        <ul class="nested">
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Presentation file 1</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Presentation file 2</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Video 1</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Assignment 1</a><a href="" class="upload"><span class="fas fa-upload text-danger"></span> Upload Your Assignment Here</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Video 2</a></li>
                                            <li><a href=""><span class="fas fa-download text-primary"></span> Assignment 2</a><a href="" class="upload"><span class="fas fa-upload text-danger"></span> Upload Your Assignment Here</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>            
                </div>
                <div class="">
                    <a href="" class="btn btn-primary">Continue Course</a>
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
