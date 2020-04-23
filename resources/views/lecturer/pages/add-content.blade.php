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
                                <a class="nav-link active " href="/lecturer/home"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/lecturer/add-course" ><i class="fas fa-plus-square"></i>Add Course <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/lecturer/assignment-list"><i class="fas fa-tag"></i>Check Assignments<span class="badge badge-success">6</span></a>
                                
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
                                <li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
                                <li class="breadcrumb-item"><a href="/lecturer/add-section" class="breadcrumb-link">Section 1</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Content</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header">
                    <h4>Section 1 </h4>
                                
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <ul class="list-group">
                    <li class="list-group-item ">
                        <span class="fa fa-file"></span>&nbsp;<a href="">Presentation 1 Title</a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="edit-content" class="btn btn-outline-light">Edit</a>
                                <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#deleteModal"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span> 
                    </li>
                    <li class="list-group-item ">
                        <span class="fas fa-play-circle"></span>&nbsp;<a href="">Video 1 Title</a>
                        <span class="social-sales-count text-dark">
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="" class="btn btn-outline-light">Edit</a>
                                <a href="" class="btn btn-outline-light"> <i class="far fa-trash-alt"></i></a>
                            </div>
                        </span> 
                    </li>
                 </ul>
                 <div class="card-body">
                                    <form id="form" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Enter Title *</label>
                                            <div class="col-9 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="text" required="" name="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Enter File *</label>
                                            <div class="col-9 col-lg-8 col-xs-12">
                                                <input id="inputtext2" type="file" required="" name="file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choose Type *</label>
                                            <div class="col-9 col-lg-8 col-xs-12">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radio-inline" checked="" class="custom-control-input"><span class="custom-control-label">Video File</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radio-inline" class="custom-control-input"><span class="custom-control-label">Assignment File</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="radio-inline" class="custom-control-input"><span class="custom-control-label">Presentation File</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary" name="add_section">Add</button>
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