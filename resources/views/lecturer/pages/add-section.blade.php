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
                                <a class="nav-link active " href="home"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="add-course" ><i class="fas fa-plus-square"></i>Add Course <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#"><i class="fas fa-tag"></i>Check Assignments<span class="badge badge-success">6</span></a>
                                
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
                    <h2 class="pageheader-title">Dashboard</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Content</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <ul class="list-group">
                     <li class="list-group-item ">
                        <i class="fas fa-angle-double-right"></i><a href="add-content">  Section 1 </a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="" class="btn btn-outline-light">Edit Name</a>
                                <a href="" class="btn btn-outline-light"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span>
                    </li>
                    <li class="list-group-item ">
                        <i class="fas fa-angle-double-right"></i><a href="">  Section 2 </a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="" class="btn btn-outline-light">Edit Name</a>
                                <a href="" class="btn btn-outline-light"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span>
                    </li>
                 </ul>
                 <div class="card-body">
                                    <form id="form" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Enter Section Name</label>
                                            <div class="col-7 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="section_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary" name="add_section">Submit</button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </form>
                                        </div> 
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection