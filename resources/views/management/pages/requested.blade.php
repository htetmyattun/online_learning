@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
	@include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Requested Students</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Requested Students</li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Course's Name</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Phone Number</th>
                    <th>Coupon Code</th>
                    <th>Payment Photo</th>
                    <th></th>
                </tr>
            @isset($requests)
            @foreach($requests as $request)

<tr style="color:black">
    <td>{{date('d/m/Y', strtotime($request->date))}}</td>
    <td>{{$request->name}}</td>
   <td>{{$request->cname}}</td>
   <td>{{$request->payment_method}}</td>
   <td>{{$request->amount}}</td>
     <td>
    {{$request->phno}}
</td>
<td>
    {{$request->coupon}}
</td>
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