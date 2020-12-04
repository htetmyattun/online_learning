@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
    @include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">All Coupons</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Coupon</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View All Coupons</li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            <table class="table">
                <tr>
                    <th>Code</th>
                    <th>Expired Date</th>
                    <th>Amount</th>
                    <th></th>
                    
                </tr>
            @isset($coupons)
            @foreach($coupons as $coupon)

<tr style="color:black">
    <td>{{$coupon->code}}</td>
   <td>{{$coupon->expired_date}}</td>
   <td>{{number_format($coupon->amount)}}</td>
   <td>
    <a href="/management/delete-coupon/{{$coupon->id}}" class="btn btn-danger">Delete</a>
 
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