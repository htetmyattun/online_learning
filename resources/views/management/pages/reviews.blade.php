@extends('management.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
	@include('management.partials.sidebar')
    <div class="dashboard-wrapper-1 container course">
    	<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Manage Reviews</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Manage</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                            </ol>
                        </nav>
                    </div> 
                                
                 </div>

            </div>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names or emails.." title="Type in a name" class="form-control" style="margin-bottom: 30px;">

            <table class="table" id="myTable">
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Rating</th>
                    <th>Review</th> 
                    <th></th> 
                </tr>
            @isset($reviews)
            @foreach($reviews as $review)
<tr style="color:black">
    <td>{{$review->sname}}</td>
    <td>{{$review->name}}</td>
    <td>{{$review->stars}} <i class="fas fa-star"></i></td>
    <td>{{$review->review}}</td>
    <td>
        <div class="dd-nodrag btn-group ml-auto">
            
            <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#delete_review_Modal_{{$review->rid}}"> <i class="far fa-trash-alt text-danger"></i></a>
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