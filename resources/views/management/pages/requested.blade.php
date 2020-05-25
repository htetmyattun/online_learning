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
                                <a class="nav-link" href="/management/home"><i class="fa fa-fw fa-user-circle"></i>Registred<span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="/management/view-request" ><i class="fas fa-plus-square"></i>Requested<span class="badge badge-success">6</span></a>
                                
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
                    <h2 class="pageheader-title">Dashboard</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Registred Students</a></li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Course's Name</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Photo</th>
                    <th></th>
                </tr>
            @isset($requests)
            @foreach($requests as $request)

<tr style="color:black">
    <td>{{$request->name}}</td>
   <td>{{$request->cname}}</td>
   <td>{{$request->payment_method}}</td>
   <td>{{$request->amount}}</td>
    <td class="thampnail_img">
        <a href="{{ asset($request->photo)}}" target="blank"><img src="{{ asset($request->photo)}}" alt="" class="img-fluid"></a>
    </td>
<td>
    <a href="/management/request/{{$request->id}}" class="btn btn-primary">Allow</a>
</td>
</tr>

@endforeach
@endisset


   </table>                   
                            
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection