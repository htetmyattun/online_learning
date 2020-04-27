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
                    <h2>My Courses </h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                                <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="{{ asset('/images/c1.jpg')}}" alt="" class="img-fluid"></div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title">Course 4</h3>
                                                    <p>Ms.Yamone Oo</p>
                                                    <div class="progress mb-3">
                                                        <div class="progress-bar progress-bar-striped bg-info text-dark" role="progressbar" style="width: 50%" aria-valuenow="50"aria-valuenow="50" aria-valuemax="100">50%</div>
                                                    </div>
                                                    
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <a href="" data-toggle="modal" data-target="#exampleModal"><span class="badge badge-pill badge-light">Edit</span></a>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title " id="exampleModalLabel">Rate this course</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                        <form id="form"   action="">
                                                        @csrf
                                                            <div class="modal-body text-center">
                                                               
                                                                    <fieldset class="rate">
                                                                        <input type="radio" id="rating6" name="rating" value="5" /><label for="rating6" title="5 stars"></label>
                                                                        <input type="radio" id="rating5" name="rating" value="4" /><label for="rating5" title="4 stars"></label>
                                                                        <input type="radio" id="rating4" name="rating" value="3" /><label for="rating4" title="3 stars"></label>
                                                                        <input type="radio" id="rating3" name="rating" value="2" /><label for="rating3" title="2 stars"></label>
                                                                        <input type="radio" id="rating2" name="rating" value="1" /><label for="rating2" title="1 star"></label>
                                                                        <input type="radio" id="rating1" name="rating" value="0" />
                                                                    </fieldset>
                                                                <textarea  name="discount_price" class="form-control" placeholder="Write a review"></textarea> 
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                <a href="#" class="btn btn-primary">Save changes</a>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="product-btn">
                                                    <a href="/student/course-content" class="btn btn-primary">Go to course</a>
                                                    <a href="/student/assignment" class="btn btn-outline-light">Assignments</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="product-thumbnail">
                                            <div class="product-img-head">
                                                <div class="product-img">
                                                    <img src="{{ asset('/images/c2.jpg')}}" alt="" class="img-fluid"></div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-content-head">
                                                    <h3 class="product-title">Course 4</h3>
                                                    <p>Ms.Yamone Oo</p>
                                                    <div class="progress mb-3">
                                                        <div class="progress-bar progress-bar-striped bg-info text-dark" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemax="100">0%</div>
                                                    </div>
                                                    
                                                    <a href="" data-toggle="modal" data-target="#exampleModal"><span class="badge badge-pill badge-light">Rate this course</span></a>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title " id="exampleModalLabel">Rate this course</h5>
                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </a>
                                                            </div>
                                                        <form id="form"   action="">
                                                        @csrf
                                                            <div class="modal-body text-center">
                                                               
                                                                    <fieldset class="rate">
                                                                        <input type="radio" id="rating6" name="rating" value="5" /><label for="rating6" title="5 stars"></label>
                                                                        <input type="radio" id="rating5" name="rating" value="4" /><label for="rating5" title="4 stars"></label>
                                                                        <input type="radio" id="rating4" name="rating" value="3" /><label for="rating4" title="3 stars"></label>
                                                                        <input type="radio" id="rating3" name="rating" value="2" /><label for="rating3" title="2 stars"></label>
                                                                        <input type="radio" id="rating2" name="rating" value="1" /><label for="rating2" title="1 star"></label>
                                                                        <input type="radio" id="rating1" name="rating" value="0" />
                                                                    </fieldset>
                                                                <textarea  name="discount_price" class="form-control" placeholder="Write a review"></textarea> 
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                                <a href="#" class="btn btn-primary">Save changes</a>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="product-btn">
                                                    <a href="#" class="btn btn-light">Please wait...</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                </div>
            </div>
            
            
        </div>
     
      @include('student.partials.footer')
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    

@endsection