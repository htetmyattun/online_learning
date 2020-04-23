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
                                <a class="nav-link " href="home"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="add-course" ><i class="fas fa-plus-square"></i>Add Course <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="assignment-list"><i class="fas fa-tag"></i>Check Assignments<span class="badge badge-success">6</span></a>
                                
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
                                <li class="breadcrumb-item"><a href="home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Check Assignment</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <ul class="list-group" style="background-color: white;">
                     <li class="list-group-item-2">
                        <label class="custom-control custom-checkbox green">
                            <input type="checkbox"  class="custom-control-input"><span class="custom-control-label text-dark">Assignment 1 </span>
                            <a href=""><span class="fa fa-download text-secondary"></span></a>
                            <br>
                            By <span class="text-primary">Yamone Oo</span>
                        </label> 
                        <div class="marking text-success">---</div>
                        <span class="marking text-dark">
                            <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#savemarkModal">Save Mark</a>
                        </span>
                    </li>
                    <li class="list-group-item-2 ">
                        <label class="custom-control custom-checkbox green">
                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 1</span>
                            <a href=""><span class="fa fa-download text-secondary"></span></a>
                            <br>
                            By <span class="text-primary">He lan Ai</span>
                        </label> 
                        <div class="marking text-success">93 marks</div>
                        <span class="marking text-dark">
                            <a href="n" class="btn btn-outline-light" >Save Mark</a>
                        </span>
                    </li>
                 </ul>
                
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection