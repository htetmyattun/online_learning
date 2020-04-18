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
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-plus-square"></i>Add Course <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-tag"></i>Check Assignments<span class="badge badge-success">6</span></a>
                                
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">My Classes </h2>
                                
                 </div>

            </div>
            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="{{ asset('/images/c5.jpg')}}" alt="" class="img-fluid"></div>
                                                
                                                <div class=""><a href="#" class="product-wishlist-btn active"><i class="fas fa-heart"></i></a></div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title">Course 4</h3>
                                                    <p>Ms.Yamone Oo</p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">$49.00
                                                        <del class="product-del">$69.00</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    <a href="#" class="btn btn-primary">View Course</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="col-lg-4  col-sm-12 col-12">
                                <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="{{ asset('/images/c5.jpg')}}" alt="" class="img-fluid"></div>
                                                
                                                <div class=""><a href="#" class="product-wishlist-btn active"><i class="fas fa-heart"></i></a></div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title">Course 4</h3>
                                                    <p>Ms.Yamone Oo</p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">$49.00
                                                        <del class="product-del">$69.00</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    <a href="#" class="btn btn-primary">View Course</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                               	<div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="{{ asset('/images/c5.jpg')}}" alt="" class="img-fluid"></div>
                                                
                                                <div class=""><a href="#" class="product-wishlist-btn active"><i class="fas fa-heart"></i></a></div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title">Course 4</h3>
                                                    <p>Ms.Yamone Oo</p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">$49.00
                                                        <del class="product-del">$69.00</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    <a href="#" class="btn btn-primary">View Course</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection