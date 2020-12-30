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

			
			<div class="container course1">
				<div class="page-header" id="top">
					<h2>Exam</h2>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<ul class="list-group">
							@isset($exams)
							@foreach($exams as $exam)
							<li class="list-group-item ">
								
								@if($exam->assignment_url!="")
								<span class="fa fa-paperclip"></span>&nbsp;&nbsp;
								<span class="text-primary">{{$exam->title}}</span>
								<span class="text-secondary">({{$exam->subject}})</span>
								<span style="font-weight: bold;">By {{$exam->name}}</span>
								<span>- Assignment</span>
								<span class="social-sales-count text-dark">
									<div class="dd-nodrag btn-group ml-auto">
										
										
									</div>
								</span>
								
								@elseif($exam->quiz=1)

								<span class="fa fa-file"></span>&nbsp;&nbsp;<a href="/student/exam-quiz/{{$exam->eid}}">
									<span class="text-primary">{{$exam->title}}</span>
									<span class="text-secondary">({{$exam->subject}})</span>
									<span style="font-weight: bold;">By {{$exam->name}}</span>

								<span>- Quiz</span>
								</a>

								<span class="social-sales-count text-dark">

									<div class="dd-nodrag btn-group ml-auto">
										
									</div>
								</span>
								@endif
								 
							</li>
							@endforeach
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