    @extends('student.layouts.default')
    @section('title','Online Learning System : KBTC')
    @section('content')
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="myclassroom alert alert-info">
                <div class="page-header text-center" id="top">
                    <h1 class="text-dark">My Classroom </h1>

                    <p>A card is a flexible and extensible content container. It includes options for headers and footers, a wide variety of content, contextual background colors, and powerful display options.</p>
                </div>
            </div>
            
            <div class="container course1">
                <div class="page-header" id="top">
                    <h2>My Assignments </h2>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                         <ul class="list-group" style="background-color: white;">
                             <li class="list-group-item-2">
                                <label class="custom-control custom-checkbox green">
                                    <input type="checkbox" checked=""  class="custom-control-input"><span class="custom-control-label text-dark">Assignment 1   </span>
                                    <a href=""><span class="fa fa-upload text-secondary"></span></a>
                                    <br>
                                    Submitted at <span class="text-primary">12 March</span>
                                </label> 
                                <div class="marking text-success">---</div>
                                <span class="marking text-dark">
                                    <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#commentModal">Comments</a>
                                </span>
                            </li>
                            <li class="list-group-item-2 ">
                                <label class="custom-control custom-checkbox green">
                                    <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 2  </span>
                                    <a href=""><span class="fa fa-upload text-secondary"></span></a>
                                    <br>
                                    Submitted at <span class="text-primary">12 March</span>
                                </label> 
                                <div class="marking text-success">93 marks</div>
                                <span class="marking text-dark">
                                    <a href="" class="btn btn-outline-light" >Comments</a>
                                </span>
                            </li>
                            <li class="list-group-item-2">
                                <label class="custom-control custom-checkbox green">
                                    <input type="checkbox"  class="custom-control-input"><span class="custom-control-label text-dark">Assignment 3   </span>
                                    <a href=""><span class="fa fa-upload text-primary"></span></a>
                                    <br>
                                    <span class="text-muted">Upload your assignment.</span>
                                </label> 
                                <div class="marking text-success">---</div>
                                <span class="marking text-dark">
                                    <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#savemarkModal">Comments</a>
                                </span>
                            </li>
                            <li class="list-group-item-2">
                                <label class="custom-control custom-checkbox green">
                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label text-dark">Assignment 4   </span>
                                    <a href=""><span class="fa fa-upload text-primary"></span></a>
                                    <br>
                                    <span class="text-muted">Upload your assignment.</span>
                                </label> 
                                <div class="marking text-success">---</div>
                                <span class="marking text-dark">
                                    <a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#savemarkModal">Comments</a>
                                </span>
                            </li>
                         </ul>
                        
                    </div>
                </div>
            </div>
            
            
        </div>
     
      @include('student.partials.footer')
    </div>
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Comments from lecturer</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-1">
                                    <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
                                </div>
                                <div class="col-10" style="top:5px;">
                                    <p>No comments yet! </p>
                                </div>                                
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin: 1rem;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
                                <p >By <span class="text-primary">Yamone Oo</span></p>                              
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            <a href="" class="btn btn-secondary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    

@endsection