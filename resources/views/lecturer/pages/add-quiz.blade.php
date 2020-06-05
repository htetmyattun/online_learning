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
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="page-header">
					<h2 class="pageheader-title">Dashboard</h2>
					<div class="page-breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/lecturer/home" class="breadcrumb-link">My Classes</a></li>
								<li class="breadcrumb-item"><a onclick="history.back(-1)"  class="breadcrumb-link">Add Content</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Quiz</li>
							</ol>
						</nav>
					</div>
				 </div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h4>Quiz 1</h4>
				<ul class="list-group">
					<li class="list-group-item ">
						No (1) . Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						<label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked" checked="" class="custom-control-input"><span class="custom-control-label">Choice 1</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked" class="custom-control-input" disabled><span class="custom-control-label">Choice 2</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked" class="custom-control-input" disabled><span class="custom-control-label">Choice 3</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked" class="custom-control-input" disabled><span class="custom-control-label">Choice 4</span>
                        </label>
					</li>
					<li class="list-group-item ">
						No (2) . Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						<label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked1" checked="" class="custom-control-input"><span class="custom-control-label">Choice 1</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked1" class="custom-control-input" disabled><span class="custom-control-label">Choice 2</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked1" class="custom-control-input" disabled><span class="custom-control-label">Choice 3</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="radio-stacked1" class="custom-control-input" disabled><span class="custom-control-label">Choice 4</span>
                        </label>
					</li>
				 </ul>
				 <br>
				 <h4>Add quiz</h4>
				<div class="card card-body">
					<form id="form_add_section" action="{{route('lecturer_add_content')}}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Enter Question *</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<textarea name="quiz_question" class="form-control"></textarea>
								
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 1*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" name="title" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 2*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" name="title" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 3*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" name="title" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Choice 4*</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<input id="inputtext2" type="text" required="" name="title" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext2" class="col-3 col-lg-2 col-form-label text-right">Answer *</label>
							<div class="col-9 col-lg-10 col-xs-12">
								<label class="custom-control custom-radio custom-control-inline">
	                            	<input type="radio" name="radio-stacked2" checked="" class="custom-control-input"><span class="custom-control-label">Choice 1</span>
		                        </label>
		                        <label class="custom-control custom-radio custom-control-inline">
		                            <input type="radio" name="radio-stacked2" class="custom-control-input" ><span class="custom-control-label">Choice 2</span>
		                        </label>
		                        <label class="custom-control custom-radio custom-control-inline">
		                            <input type="radio" name="radio-stacked2" class="custom-control-input" ><span class="custom-control-label">Choice 3</span>
		                        </label>
		                        <label class="custom-control custom-radio custom-control-inline">
		                            <input type="radio" name="radio-stacked2" class="custom-control-input" ><span class="custom-control-label">Choice 4</span>
		                        </label>
							</div>
							
						</div>
						<div class="col-sm-6 pl-0">
							<p class="text-right">
								<button type="submit" class="btn btn-space btn-primary" name="add_section">Add</button>
								<button class="btn btn-space btn-secondary">Cancel</button>
							</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@include('lecturer.partials.footer')
</div>


@endsection