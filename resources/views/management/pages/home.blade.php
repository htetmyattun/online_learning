@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')
<div class="dashboard-main-wrapper">
	@include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">All Students</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Students</li>
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