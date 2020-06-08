@extends('lecturer.layouts.default')
@section('title','Online Learning System : KBTC')
@section('content')

<div class="dashboard-main-wrapper">
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<div class="nav-left-sidebar sidebar-dark">
				<div class="menu-list">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="d-xl-none d-lg-none" href="#">Dashboard</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav flex-column">
								<li class="nav-divider">
									Menu
								</li>
								<li class="nav-item ">
									<a class="nav-link active " href="/lecturer/home"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
									
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="/lecturer/add-course" ><i class="fas fa-plus-square"></i>Add Course <span class="badge badge-success">6</span></a>
									
								</li>
								<li class="nav-item ">
									<a class="nav-link" href="/lecturer/assignment-list"><i class="fas fa-tag"></i>Check Assignments<span class="badge badge-success">6</span></a>
									
								</li>
								
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</nav>
	</div>
	<div class="dashboard-wrapper-1 container course">
		<div class="row">
			@isset($section)
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-7">
				<div class="page-header">
					<h2 class="pageheader-title">Dashboard</h2>
					<div class="page-breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
								<li class="breadcrumb-item"><a onclick="history.back(-1)"  class="breadcrumb-link">{{$section->title}}</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Content</li>
							</ol>
						</nav>
					</div>
				 </div>
			</div>
			<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-7">
				<div class="page-header">
					<h4>{{$section->title}}</h4>		
				 </div>
			</div>
			@endisset
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2" style="float: right;">
				<a href="" class="btn btn-primary" data-toggle="modal" data-target="#quizModal">Add Quiz</a>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				 <ul class="list-group">
					@isset($course_contents)
					@foreach($course_contents as $course_content)
					<li class="list-group-item ">
						@if($course_content->video_url!="")
						<span class="fa fa-play-circle"></span>&nbsp;{{$course_content->title}}
						@elseif($course_content->assignment_url!="")
						<span class="fa fa-paperclip"></span>&nbsp;{{$course_content->title}}
						@elseif($course_content->presentation_url!="")
						<span class="fa fa-file"></span>&nbsp;{{$course_content->title}}
						@elseif($course_content->quiz="1")
						<span class="fa fa-file"></span>&nbsp;<a href="/lecturer/add-quiz/{{$course_content->id}}">{{$course_content->title}}</a>
						@endif
						<span class="social-sales-count text-dark">
							<div class="dd-nodrag btn-group ml-auto">
								<a href="/lecturer/edit-content/{{$course_content->id}}" class="btn btn-outline-light">Edit</a>
								<a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#content_deleteModal_{{$course_content->id}}"> <i class="far fa-trash-alt"></i></a>
							</div>
						</span> 
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
					<script type="text/javascript">
var myVideos = [];

window.URL = window.URL || window.webkitURL;

document.getElementById('fileUp').onchange = setFileInfo;

function setFileInfo() {
  var files = this.files;
  myVideos.push(files[0]);
  var video = document.createElement('video');
  video.preload = 'metadata';

  video.onloadedmetadata = function() {
    window.URL.revokeObjectURL(video.src);
    var duration = video.duration;
    myVideos[myVideos.length - 1].duration = duration;
    updateInfos();
  }

  video.src = URL.createObjectURL(files[0]);;
}


function updateInfos() {
  var infos = document.getElementById('infos');
  infos.textContent = "";
  for (var i = 0; i < myVideos.length; i++) {
    infos.value=myVideos[i].duration;

  }
}
</script>
					@endisset
				</div>
			</div>
		</div>
	</div>
	@include('lecturer.partials.footer')
</div>


@endsection