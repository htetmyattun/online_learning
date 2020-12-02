@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

 

<div class="dashboard-main-wrapper">
	@include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Add Attendance</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Students </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Add Attendance</li>
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
            <form action="{{route('management_save_attendance')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-header">
                <p>Please enter your information.</p>
            </div>
            <div class="card-body">
                @isset($college_students)
                <div class="form-group">
                    <label>Student Email :</label>

                    <input list="myid" class="form-control form-control-lg" name="student_email" placeholder="example@gmail.com">


                    <datalist id="myid" >
                        @foreach($college_students as $c)
                        <option value="{{$c->email}}">
                        @endforeach
                    </datalist>
                </div>
                @endisset
                <div class="form-group">
                    <label>Attendance Date :</label>
                    <input class="form-control form-control-lg" id="inputtext2" type="month" required="" name="attendance_date" class="form-control" >
                    
                    </div>
                <div class="form-group">
                    <label>Total class sections :</label>
                    <input class="form-control form-control-lg" type="number" name="total" required="" placeholder="Enter total class sections..." autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Attended class sections :</label>
                    <input class="form-control form-control-lg" type="number" name="attendance" required="" placeholder="Enter attended class sections ..." autocomplete="off">
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
    
</div>
@include('lecturer.partials.footer')

@endsection