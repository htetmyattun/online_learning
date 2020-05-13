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
            <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="{{ asset(Auth::user()->photo)}}" alt=""/>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                            <h4>
                                                {{ Auth::user()->name}}
                                            </h4>
                                            <h6>
                                                {{ Auth::user()->description}}
                                            </h6>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a href="/lecturer/edit-profile"><span class="badge badge-pill badge-light">Edit Profile</span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                               
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->name}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->email}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->phone_no}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Education</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->education}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Profession</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->description}}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Short story</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>{{ Auth::user()->short_story}}</p>
                                                    </div>
                                                </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>           
                </div>
            </div>
        </div>
    </div>
        @endsection