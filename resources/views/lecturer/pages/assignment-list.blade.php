@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

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
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/lecturer/home"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/lecturer/add-course" ><i class="fas fa-plus-square"></i>Add Course <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="/lecturer/assignment-list"><i class="fas fa-tag"></i>Check Assignments<span class="badge badge-success">6</span></a>
                                
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
                </nav>
            </div>
    <div class="dashboard-wrapper-1 container course">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header">
                    <h2 class="pageheader-title">Check Assignments</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Check Assignment</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <div class="accrodion-regular">
                                        <div id="accordion3">
                                            <div class="card mb-2">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                       <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lead" aria-expanded="false" aria-controls="lead">
                                                         <span class="fas fa-angle-down mr-3"></span>Course 1
                                                     </button>       </h5>
                                                </div>
                                                <div id="lead" class="collapse" aria-labelledby="headingOne" data-parent="#accordion3">
                                                    <div class="list-group">
                                                        
                                                        <a href="check-assignment" class="list-group-item list-group-item-action">
                                                            <span class="text-dark">Assignment 1</span>    
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <span class="text-dark">Assignment 2</span> 
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <span class="text-dark">Assignment 3</span>   
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
                                                         <span class="fas fa-angle-down mr-3"></span>Course 2
                                                       </button>
                                                      </h5>
                                                </div>
                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion3">
                                                    <div class="list-group">
                                                        
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <span class="text-dark">Assignment 1</span>   
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <span class=" text-dark">Assignment 2</span>   
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                        
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <span class="text-dark">Assignment 3</span>   
                                                            <p class="course-content-title">
                                                                <span class="fas fa-file"></span>
                                                                Filename.txt
                                                            </p> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection