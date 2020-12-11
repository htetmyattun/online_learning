@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
	@include('lecturer.partials.sidebar')
	<div class="dashboard-wrapper-1 container course">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-header">
					<h2 class="pageheader-title">Add Exam</h2>
					<div class="page-breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								
								<li class="breadcrumb-item"><a onclick="history.back(-1)"  class="breadcrumb-link">Add Exam</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Quiz</li>
							</ol>
						</nav>
					</div>
				 </div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

				 <h4>Edit quiz</h4>
				 @isset($question)
				 <div class="card card-body">

					<form id="" action="{{route('lecturer_update_exam_quiz')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Enter Question *</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<textarea name="question" class="form-control">{{$question -> question}}</textarea>
								
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 1*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" value="{{$question -> choice_1}}" name="choice_1" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 2*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" value="{{$question -> choice_2}}" name="choice_2" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 3*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" value="{{$question -> choice_3}}" name="choice_3" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 4*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" value="{{$question -> choice_4}}" name="choice_4" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Answer *</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<label class="custom-control custom-radio custom-control-inline">
	                            	<input type="radio" name="answer" {{$question -> answer == 1 ? 'checked=""' : ''}} class="custom-control-input" value="1"><span class="custom-control-label">Choice 1</span>
		                        </label>
		                        <label class="custom-control custom-radio custom-control-inline">
		                            <input type="radio" name="answer" {{$question -> answer == 2 ? 'checked=""' : ''}} class="custom-control-input" value="2"><span class="custom-control-label">Choice 2</span>
		                        </label>
		                        <label class="custom-control custom-radio custom-control-inline">
		                            <input type="radio" name="answer" {{$question -> answer == 3 ? 'checked=""' : ''}} class="custom-control-input" value="3"><span class="custom-control-label">Choice 3</span>
		                        </label>
		                        <label class="custom-control custom-radio custom-control-inline">
		                            <input type="radio" name="answer" {{$question -> answer == 4 ? 'checked=""' : ''}} class="custom-control-input" value="4"><span class="custom-control-label">Choice 4</span>
		                        </label>
							</div>
							
						</div>
						<div class="col-sm-6 pl-0">
							<p class="text-right">
								<input type="hidden" name="exam_id" value="{{$question->exam_id}}">
								<button type="submit" class="btn btn-space btn-primary" name="quiz_id" value="{{$question -> id}}">Save</button>
								<button class="btn btn-space btn-secondary">Cancel</button>
							</p>
						</div>
					</form>
				</div>
				@endisset
			</div>
		</div>
	</div>
	@include('lecturer.partials.footer')
</div>


@endsection