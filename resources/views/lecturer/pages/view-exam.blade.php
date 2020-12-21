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
				 <div class="card-body">
					@isset($id)
					<form id="form_add_section" action="{{route('lecturer_add_content')}}" method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="section_id" value="{{$id}}">
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Enter Title *</label>
							<div class="col-9 col-lg-8 col-xs-12">
								<input id="inputtext2" type="text" required="" name="title" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Enter File *</label>
							<div class="col-9 col-lg-8 col-xs-12">
								<input id="fileUp" type="file" required="" name="file" class="form-control"  >
								<input type="hidden" name="length" id="infos" value="0"><br />
								<div class="progress">
									<div class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
										0%
									</div>
								</div>
								<br />
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choose Type *</label>
							<div class="col-9 col-lg-8 col-xs-12">
								<div class="custom-controls-stacked">
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="type" checked="" class="custom-control-input" value="1"><span class="custom-control-label">Video File</span>
									</label>
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="type" value="2" class="custom-control-input"><span class="custom-control-label">Assignment File</span>
									</label>
									<label class="custom-control custom-radio custom-control-inline">
										<input type="radio" name="type" value="3" class="custom-control-input"><span class="custom-control-label">Presentation File</span>
									</label>
								</div>
							</div>
						</div>
						<div class="col-sm-6 pl-0">
							<p class="text-right">
								<button type="submit" class="btn btn-space btn-primary" name="add_section">Add</button>
								<button class="btn btn-space btn-secondary">Cancel</button>
							</p>
						</div>
					</form>
					
					@endisset
				</div>
			</div>
		</div>
	</div>
	@include('lecturer.partials.footer')
</div>


@endsection