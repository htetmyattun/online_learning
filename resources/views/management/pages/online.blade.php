@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')
@include('management.partials.modal')
 

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
                                <a class="nav-link active" href="/management/online" ><i class="fas fa-users"></i>Online Registered Students<span class="badge badge-success">6</span></a> 
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
                                <a class="nav-link" href="/management/add_new_student" ><i class="fas fa-plus"></i>Add New Students<span class="badge badge-success">6</span></a> 
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
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Registred Online Students</a></li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names or emails.." title="Type in a name" class="form-control" style="margin-bottom: 30px;">

            <table class="table" id="myTable">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Father's Name</th>
                    <th>NRC Number</th>
                    <th></th>
                </tr>
            @isset($students)
            @foreach($students as $student)
<tr style="color:black">
    <td>{{$student->name}}</td>
    <td>{{$student->email}}</td>
    <td>{{$student->phone_no}}</td>
    <td>{{$student->father_name}}</td>
    <td>{{$student->nrc_no}}</td>
    <td>
        <div class="dd-nodrag btn-group ml-auto">
            
            <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#deleteModal_{{$student->id}}"> <i class="far fa-trash-alt text-danger"></i></a>
        </div>
    </td>
</tr>

@endforeach
@endisset


   </table>   

                          
        </div>

    </div>
    @include('lecturer.partials.footer')
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue,txtValue1,td1;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {

    td = tr[i].getElementsByTagName("td")[0];
    td1 = tr[i].getElementsByTagName("td")[1];
    if (td&&td1) {
      txtValue = td.textContent || td.innerText;
       txtValue1 = td1.textContent || td1.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue1.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }  

  }
}
</script>

    @endsection