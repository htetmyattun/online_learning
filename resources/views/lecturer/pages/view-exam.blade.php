@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
	@include('lecturer.partials.sidebar')
	<div class="dashboard-wrapper-1 container course">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
				<div class="page-header">
					<h2 class="pageheader-title">View Exam</h2>
					<div class="page-breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">Exam</a></li>
								<li class="breadcrumb-item active" aria-current="page">View Exam</li>
							</ol>
						</nav>
					</div>
				 </div>
			</div>
			
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				 <ul class="list-group">
					@isset($exams)
					@foreach($exams as $exam)
					<li class="list-group-item ">
						
						@if($exam->assignment_url!="")
						<span class="fa fa-paperclip"></span>&nbsp;&nbsp;
						<span class="text-primary">{{$exam->title}}</span>
						<span class="text-secondary">({{$exam->subject}})</span>
						<span>- Assignment</span>
						<span class="social-sales-count text-dark">
							<div class="dd-nodrag btn-group ml-auto">
								
								<a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#exam_deleteModal_{{$exam->id}}"> <i class="far fa-trash-alt"></i></a>
							</div>
						</span>
						
						@elseif($exam->quiz=1)

						<span class="fa fa-file"></span>&nbsp;&nbsp;<a href="/lecturer/add-exam-quiz/{{$exam->id}}">
							<span class="text-primary">{{$exam->title}}</span>
							<span class="text-secondary">({{$exam->subject}})</span>
						<span>- Quiz</span>
						</a>
						
						<span class="social-sales-count text-dark">
							<div class="dd-nodrag btn-group ml-auto">
								
								<a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#exam_deleteModal_{{$exam->id}}"> <i class="far fa-trash-alt"></i></a>
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
	@include('lecturer.partials.footer')
</div>


@endsection