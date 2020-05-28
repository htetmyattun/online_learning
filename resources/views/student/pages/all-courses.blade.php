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
			
			
			<div class="container-mobile course1">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="single category">
                            <h3 class="side-title">Category</h3>
                            @isset($cate_count)
                            <ul class="list-unstyled">
                                <li><a href="/student/all-courses" title=""  class="text-primary">All Courses <span class="pull-right">{{$cate_count['count']}}</span></a></li>
                                <li><a href="/student/all-courses/1" title="">Software Engineering <span class="pull-right">{{$cate_count['SE']}}</span></a></li>
                                <li><a href="/student/all-courses/2" title="">Networking <span class="pull-right">{{$cate_count['Net']}}</span></a></li>
                                <li><a href="/student/all-courses/3" title="">Cyber Security <span class="pull-right">{{$cate_count['Cyber']}}</span></a></li>
                                <li><a href="/student/all-courses/4" title="">Embedded System <span class="pull-right">{{$cate_count['Emb']}}</span></a></li>
                                <li><a href="/student/all-courses/5" title="">Business IT <span class="pull-right">{{$cate_count['Bus']}}</span></a></li>
                                <li><a href="" title="">Web Development <span class="pull-right">13</span></a></li>
                                
                            </ul>
                            @endisset
                        </div>
                        <br>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                             @isset($courses)
							<h4>All Courses</h4>
							<div class="row">

                               
								@foreach ($courses as $course)
								<div class="col-lg-4 col-md-6">
									<div class="product-thumbnail text-center">
										<div class="product-img-head">
											<div class="product-img">
												<img src="{{ $course->photo}}" alt="" class="img-fluid"></div>
                                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
										</div>
										<div class="product-content">
											<div class="product-content-head">
                                                    <h3 class="product-title">{{$course->cname}}</h3>
                                                    <p><em>Tr. {{$course->lecturer_name}}</em></p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">{{number_format($course->discount_price)}} Kyats
                                                        <del class="product-del">{{number_format($course->price)}} Kyats</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    @if($course->sid=='')
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#enrollModal_{{$course->id}}">Enroll Now</a>
                                                    @elseif($course->access==0)
                                                    <a href="" class="btn btn-light">Please Wait</a>
                                                    @else
                                                    <a href="/student/course-resource/{{$course->id}}" class="btn btn-secondary">Go to course</a>
                                                    @endif
                                                    <a href="/student/detail-course/{{$course->id}}" class="btn btn-outline-light">Details</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
										</div>
									</div>
								</div>
								@endforeach
                                @endisset
                                @isset($cate_course)
                                <h4>{{$cate}}</h4>
                                <div class="row">
                                @foreach($cate_course as $course)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-thumbnail text-center">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ $course->photo}}" alt="" class="img-fluid"></div>
                                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                    <h3 class="product-title">{{$course->cname}}</h3>
                                                    <p><em>Tr. {{$course->lecturer_name}}</em></p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">{{number_format($course->discount_price)}} Kyats
                                                        <del class="product-del">{{number_format($course->price)}} Kyats</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    @if($course->sid=='')
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#enrollModal_{{$course->id}}">Enroll Now</a>
                                                    @elseif($course->access==0)
                                                    <a href="" class="btn btn-light">Please Wait</a>
                                                    @else
                                                    <a href="/student/course-resource/{{$course->id}}" class="btn btn-secondary">Go to course</a>
                                                    @endif
                                                    <a href="/student/detail-course/{{$course->id}}" class="btn btn-outline-light">Details</a>
                                                    <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                                @isset($search_courses)
                                <h4>{{$name}}</h4>
                                <div class="row">
                                @foreach($search_courses as $course)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-thumbnail text-center">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ $course->photo}}" alt="" class="img-fluid"></div>
                                                <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                    <h3 class="product-title">{{$course->cname}}</h3>
                                                    <p><em>Tr. {{$course->lecturer_name}}</em></p>
                                                    <div class="product-rating d-inline-block">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <div class="product-price">{{number_format($course->discount_price)}} Kyats
                                                        <del class="product-del">{{number_format($course->price)}} Kyats</del>
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    @if($course->sid=='')
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#enrollModal_{{$course->id}}">Enroll Now</a>
                                                    @elseif($course->access==0)
                                                    <a href="" class="btn btn-light">Please Wait</a>
                                                    @else
                                                    <a href="/student/course-resource/{{$course->id}}" class="btn btn-secondary">Go to course</a>
                                                    @endif
                                                    <a href="/student/detail-course/{{$course->id}}" class="btn btn-outline-light">Details</a>
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
				
			</div>

		</div>
		@include('student.partials.footer')
	</div>
	<!-- ============================================================== -->
	<!-- end main wrapper  -->
	<!-- ============================================================== -->
	

@endsection