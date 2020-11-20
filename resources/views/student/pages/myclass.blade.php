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
					@foreach ($student_courses as $student_course)
					<div class="col-lg-4 col-md-6">
						<div class="product-thumbnail">
							<div class="product-img-head">
								<div class="product-img">
									<img src="{{$student_course->photo}}" alt="" class="img-fluid"></div>
							</div>
							<div class="product-content">
								<div class="product-content-head">
									<h3 class="product-title">{{$student_course->cname}}</h3>
									<p>{{$student_course->lecturer_name}}</p>
									@php
										$per=0
										@endphp

										@if($student_course->finish1!=0)
										@php
										$per=(int)(($student_course->finish/$student_course->finish1)*100)
										@endphp
										@endif
									<div class="progress mb-3">
										
										<div class="progress-bar progress-bar-striped bg-info text-dark" role="progressbar" style="width: {{$per}}%" aria-valuenow="{{$per}}" aria-valuemax="100">{{$per}}%</div>

									</div>
									<div class="product-rating d-inline-block float-right">
                                                @if($student_course->avg==5)
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                @elseif($student_course->avg==4)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @elseif($student_course->avg==3)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @elseif($student_course->avg==2)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @else
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                @endif
                                            </div>
									<a href="" data-toggle="modal" data-target="#exampleModal"><span class="badge badge-pill badge-light">Rate this course</span></a>
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title " id="exampleModalLabel">Rate this course</h5>
													<a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
												</div>
												<form id="form" action="{{route('student_review')}}" method="post">
												@csrf
												<input type="hidden" name="course_id" value="{{$student_course->id}}">
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
														<button type="submit" class="btn btn-primary">Save Changes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="product-btn">
									@if($student_course->access==0)
                                    <a href="" class="btn btn-light">Please Wait</a>
                                    <a href="/student/detail-course/{{$student_course->id}}" class="btn btn-outline-light">Details</a>
                                    @else
                                    <a href="/student/course-resource/{{$student_course->id}}" class="btn btn-secondary btn-lg">Go to course</a>
									<a href="/student/assignment/{{$student_course->course_id}}" class="btn btn-outline-light">Assignments</a>
                                    @endif						
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@include('student.partials.footer')
	</div>
	<!-- ============================================================== -->
	<!-- end main wrapper  -->
	<!-- ============================================================== -->
	

@endsection