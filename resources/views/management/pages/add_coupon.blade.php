@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

 

<div class="dashboard-main-wrapper">
	@include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Add Coupon</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Coupon</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Add Coupon</li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
                       
        </div>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        
        <div class="from">
            <form action="{{route('management_save_coupon')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-header">
                <p>Please enter your information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">

                    <input class="form-control form-control-lg" type="text" name="code" required="" placeholder="Coupon Code" autocomplete="off">
                </div>
                <div class="form-group">
                    
                    <input class="form-control form-control-lg" id="inputtext2" type="date" required="" name="expired_date" class="form-control">
                
                    </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="number" name="amount" required="" placeholder="Amount" autocomplete="off">
                </div>
                
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Save</button>
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