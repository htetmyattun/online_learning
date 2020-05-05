@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')
<div style="margin-top: 6rem;">
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-9">
                <div class="page-header">
                    <h2 class="pageheader-title">Edit Profile</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/lecturer/profile" class="breadcrumb-link">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
        </div>
            <form id="form" action="{{route('lecturer_edit_profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-2 col-lg-2"></div>
                    <div class="col-9 col-lg-7 col-xs-12">
                                <div class="profile-img">
                                    <img src="{{ asset(Auth::user()->photo)}}" id="profile" alt=""/>
                                    <div class="file btn btn-lg btn-primary">
                                        Change Photo
                                        <input type="file" name="photo" id="imgInp"/>
                                    </div>
                                </div>
                            </div>
                </div> 
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Name </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="name" class="form-control" value="{{Auth::user()->name}}">
                    </div>
                </div>    
                <div class="form-group row">
                    <label  class="col-3 col-lg-3 col-form-label text-right">Email </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Phone No </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input type="text" required="" name="phoneno" class="form-control" value="{{Auth::user()->phone_no}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Education </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input  type="text" required="" name="education" class="form-control" value="{{Auth::user()->education}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Profession </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <input  type="text" required="" name="description" class="form-control" value="{{Auth::user()->description}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-lg-3 col-form-label text-right">Short story </label>
                    <div class="col-9 col-lg-7 col-xs-12">
                        <textarea required="" name="short_story" class="form-control">{{Auth::user()->short_story}}</textarea>
                    </div>
                </div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary" name="add_section">Update</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                    </p>
                </div>
            </form>
    </div>
</div>
        @endsection