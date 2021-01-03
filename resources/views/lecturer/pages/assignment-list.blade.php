@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
    @include('lecturer.partials.sidebar')

    <div class="dashboard-wrapper-1 container course">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
                <div class="page-header">
                    <h2 class="pageheader-title">Check Assignments</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">My Classes</li>                                
                            </ol>
                        </nav>
                    </div>     
                       
                 </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <div class="accrodion-regular">
                    <div>
                        @isset($courses)
                        @foreach($courses as $course)
                        <div class="card mb-2">
                            <div class="card-header">
                                <h5 class="mb-0">
                                   <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lead" aria-expanded="false" aria-controls="lead">
                                    <a href="/lecturer/assignment-list/{{$course->id}}">
                                     <span class="fas fa-angle-right mr-3"></span>
                                     {{$course->cname}}
                                     </a>
                                 </button></h5>
                            </div>
                        </div>
                        @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
      

    @endsection