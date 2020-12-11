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
							@isset($sections)
							@isset($course_contents)
							@foreach ($sections as $section)
							@foreach ($course_contents as $temp)
							@if ($temp->section_id == $section->sec_id)
							@if ($temp->assignment_url)
							<li class="list-group-item-2">
								@if($temp->assignment_url_posted)
								<label class="custom-control custom-checkbox green">
									<input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}  </span>
									<a href="{{$temp->assignment_url}}" class="upload"><span class="fa fa-download text-primary"></span></a>
									<br>
									Submitted at <span class="text-primary">{{date('d/m/y  h:i A', strtotime($temp->assignment_url_posted_at))}}</span>
								</label>
								@else
								<label class="custom-control custom-checkbox green">
									<input type="checkbox"  class="custom-control-input"><span class="custom-control-label text-dark">{{$temp->title}}  </span>
									<a href="#" class="upload" data-toggle="modal" data-target="#assignmentModal_{{$temp->id}}"><span class="fas fa-upload text-danger"></span> </a> <br>
									<span class="text-muted">Upload your assignment.</span>
								</label>
								@endif
								
								<div class="marking text-success">{{$temp->marks ? $temp->marks: '---'}}
								{{$temp->marks ? "marks": ''}}
							</div>
								
								<span class="marking text-dark">
									<a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#comment_{{$temp->assignment_id}}">Comments</a>
								</span>
								<div class="modal fade" id="comment_{{$temp->assignment_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title " id="exampleModalLabel">Comments from lecturer</h5>
												<a href="#" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</a>
											</div>
											@if($temp->comment)
											<div class="modal-body">
												<div class="row" style="margin: 1rem;">
													<p>{{$temp->comment}}</p>
												</div>
												<p >By <span class="text-primary">{{$section->lecturer_name}}</span></p>
											</div>
											@else
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
											@endif
											<div class="modal-footer">
												<a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
												<!-- <a href="" class="btn btn-secondary">Delete</a> -->
											</div>
										</div>
									</div>
								</div>
								
							</li>
							@endif
							@endif
							@endforeach
							@endforeach
							@endisset
							@endisset
							
						 </ul>
						
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