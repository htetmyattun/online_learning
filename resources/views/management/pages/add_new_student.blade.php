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
                                Students
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/management/home"><i class="fa fa-fw fa-user-circle"></i>All Students<span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/management/online" ><i class="fas fa-users"></i>Online Registered Students<span class="badge badge-success">6</span></a> 
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/management/college" ><i class="fas fa-university"></i>College Registered Students<span class="badge badge-success">6</span></a> 
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/management/view-request" ><i class="fas fa-plus-square"></i>Requested<span class="badge badge-success">6</span></a> 
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/management/attended_students" ><i class="fas fa-list"></i>Attended Students<span class="badge badge-success">6</span></a>
                                
                            </li>
                        <li class="nav-item ">
                                <a class="nav-link active" href="/management/add_new_student" ><i class="fas fa-plus"></i>Add New Students<span class="badge badge-success">6</span></a> 
                            </li>
                              <li class="nav-item ">
                                <a class="nav-link" href="/management/add-coupon" ><i class="fas fa-plus-square"></i>Add Coupon<span class="badge badge-success">6</span></a> 
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="/management/all-coupons" ><i class="fa fa-credit-card"></i>All Coupons<span class="badge badge-success">6</span></a> 
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
                    <h2 class="pageheader-title">Management</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Add New Student</a></li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            

               

                          
        </div>
        <div class="from">
            <form action="{{route('management_save_new_student')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Student Registrations Form</h3>
                <p>Please enter your student information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="name" required="" placeholder="Your name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="fathername" required="" placeholder="Father Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" name="password" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="phoneno" required="" placeholder="Phone No" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="nrcno" required="" placeholder="NRC No" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>NRC Photo</label>
                    <input class="form-control form-control-lg" type="file" required="" name="nrcphoto" autocomplete="off">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
               
                
            </div>
            <div class="card-footer bg-white">
               
            </div>
        </div>
    </form>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>


    @endsection