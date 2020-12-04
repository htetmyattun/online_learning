@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
    @include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Add Certificate</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Certificate</li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Certificate</th>
                    <th>Date</th>
                </tr>
            @isset($certificate)
            @foreach($certificate as $c)

<tr style="color:black">
    <td>{{$c->sname}}</td>
    <td>{{$c->email}}</td>
    <td>{{$c->cname}}</td>
    <td><a href="" class="btn btn-danger" data-toggle="modal" data-target="#certificateModal_{{$c->cid}}"> Add</a></td>
    <td>-</td>

</tr>

@endforeach
@endisset
@isset($certificate1)
@foreach($certificate1 as $c1)

<tr style="color:black">
    <td>{{$c1->sname}}</td>
    <td>{{$c1->email}}</td>
    <td>{{$c1->cname}}</td>
    <td class="thampnail_img"><a href="{{asset($c1->certificate_photo)}}"><img src="{{asset($c1->certificate_photo)}}"></a></td>
    <td>{{date('d-m-Y',strtotime($c1->updated_at))}}</td>
</tr>

@endforeach
@endisset


   </table>                   
                            
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection