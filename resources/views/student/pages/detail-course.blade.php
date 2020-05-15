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
        @isset($course)
        <div class="dashboard-wrapper">
            <div class="container course1">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
                                <video width="100%" style="padding:0px 10px;" controls>
                                      <source src="{{ asset($course->preview)}}" type="video/mp4">
                                      <source src="{{ asset($course->preview)}}" type="video/ogg">
                                      Your browser does not support HTML5 video.
                                    </video>
                                    <p></p>
                                    <h3 class="text-center">Preview video</h3>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                                    <div class="product-details">
                                        <div class="border-bottom pb-3 mb-3">
                                            <h2 class="mb-3">{{$course->name}}</h2>
                                            <p><em>Tr.{{$course->lecturer_name}}</em></p>

                                            <div class="product-rating d-inline-block float-right">
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star" ></i>
                                            </div>
                                            <h3 class="mb-0 text-primary">{{number_format($course->discount_price)}}&nbsp;Kyats <del class="product-del">{{number_format($course->price)}}&nbsp;Kyats</del></h3>
                                            <p></p>
                                            
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
                                        
                                        <div class="product-description">
                                            <span class="text-danger">Start Date : {{$course->start_date}}</span>
                                            <p><em>Duration : {{$course->duration}} weeks</em></p>
                                          <!--  <p><span class="fa fa-play-circle"></span> 6 hrs 10 mins</p>
                                          -->
                                            <a href=""><span class="badge badge-pill badge-primary">Live ID : {{$course->live_id}}</span></a>
                                            
                                            <p></p>
                                            
                                            @if($course->sid=='')
                                            <a href="" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#enrollModal_{{$course->id}}">Enroll Now</a>
                                            @elseif($course->access==0)
                                            <a href="" class="btn btn-light btn-block btn-lg">Please Wait Our Confirmation</a>
                                            @else
                                            <a href="/student/course-resource/{{$course->id}}" class="btn btn-secondary btn-block btn-lg">Go to course</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                                    <div class="simple-card">
                                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Descriptions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Reviews</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent5">
                                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                                <h3>Course Brief</h3>
                                                <p>{{$course->description}}</p>
                                                <h3>Entry Requirements</h3>
                                                {{$course->entry_requirements}}
                                                <h3>Exam Infomation</h3>
                                                <p>{{$course->exam_information}}</p>
                                                <h3>Careers</h3>
                                                {{$course->career}}
                                            </div>
                                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                                <div class="review-block border-top mt-3 pt-3">
                                                    <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                                <div class="review-block  border-top mt-3 pt-3">
                                                    <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    @endisset
                    
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-10">
                                    <h3> Courses Recommanded for you</h3>
                                </div>
                                @isset($r_courses)
                                @foreach($r_courses as $r_course)
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ asset($r_course->photo)}}" alt="" class="img-fluid"></div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <h3 class="product-title">{{$r_course->cname}}</h3>
                                                <p><em>Tr. {{$r_course->lecturer_name}}</em></p>
                                                <div class="product-rating d-inline-block">
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star" ></i>
                                                </div>
                                                <div class="product-price">{{$r_course->discount_price}} Kyats
                                                    <del class="product-del">{{$r_course->price}} Kyats</del>
                                                </div>
                                            </div>
                                            <div class="product-btn">
                                                @if($r_course->sid=='')
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#enrollModal_{{$r_course->id}}">Enroll Now</a>
                                                    @elseif($r_course->access==0)
                                                    <a href="" class="btn btn-light">Please Wait</a>
                                                    @else
                                                    <a href="" class="btn btn-secondary">Go to course</a>
                                                    @endif
                                                <a href="/student/detail-course/{{$r_course->id}}" class="btn btn-outline-light">Details</a>
                                                <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                            </div>
                        </div>
                </div>
            @include('student.partials.footer')
      
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    @endsection