		@extends('student.layouts.default')
		@section('title','Online Learning System : KBTC')
		@section('content')
		<!-- ============================================================== -->
		<!-- main wrapper -->
		<!-- ============================================================== -->
		<style>
.sidebar {
	height: 100%;
	width: 350px;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: white;
	overflow-x: hidden;
	transition: 0.5s;
	padding-top:5rem;
}


.sidebar .closebtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
	display: none;
}

.openbtn {
	font-size: 20px;
	cursor: pointer;
	border:1px solid grey;
	padding-top: 1rem;
	color: grey;
	border: none;
}

#main {
	transition: margin-left .5s;
	padding-top: 16px;

}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-width: 900px) {

	.sidebar .closebtn{
		display: block;
	}
}
@media screen and (max-width: 450px) {

	.sidebar {padding-top: 5rem;width: 0px;}
	.sidebar .closebtn{
		display: block;
	}
}
</style>

<div class="dashboard-main-wrapper">
	<div class="menu-sidebar__content js-scrollbar1">
		<div id="mySidebar" class="sidebar">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 last-item">
				<div class="section-block">
					<h3 >Chat List</h3>
				</div>
				<div class="card-header " id="headingThree">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
					<h5 class="mb-0"></h5>
				</div>
				<div class="list-group chat-list" id="list-tab" role="tablist">
					<form>
						<div class="input-group input-group-round">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-search"></i>
								</span>
							</div>
							<input type="search" class="form-control filter-list-input" placeholder="Search chat" id="search_chat_list" aria-label="Search Chat">
						</div>
					</form>
					<p></p>
                    @isset($messages)
                    @foreach($messages as $message)
                    @isset($lecturers)
                    @foreach($lecturers as $lecturer)
                    @if ($message -> lecturer_id == $lecturer-> id)
					<a class="chat-list-user list-group-item-3 list-group-item-action" id="{{ $lecturer->id }}" data-toggle="list" href="#{{ $lecturer->id }}" role="tab" aria-controls="home">                        
                        <img src="{{$lecturer->photo}}" alt="User Avatar" class="rounded-circle user-avatar float-left" width="50" height="50">
                        <p><b class="sender_name">{{ $lecturer->name }}</b>
                        @if($message->pending > 0)
                        <span class="new_pending"><i class="far fa-bell fa-lg float-right"><span class="pending float-right">{{$message->pending}}</span></i></span>
                        @endif
						<br><br>
						@if($message->type)
						<span class="recent_message">Attachment file...</span><br><br>
						@else
                        <span class="recent_message">{{ Str::limit($message -> message, 25) }}</span><br><br>
						@endif
                        <span style="opacity: 0.8">{{ date ('jS, F Y, h:i a', strtotime($message -> created_at)) }}</span><br>
                        {{-- <span style="opacity: 0.8">{{ date ('s, d F Y, h:i a', strtotime($message -> created_at)) }}</span><br>
                        <span style="opacity: 0.8">{{ date ('l, d F Y, h:i a', strtotime($message -> created_at)) }}</span><br>
                        <span style="opacity: 0.8">{{ date ('l, F j, Y', strtotime($message -> created_at)) }}</span><br> --}}
						</p>
					</a>
                    @endif
                    @endforeach
                    @endisset
					@endforeach
					@endisset
					@isset($groups)
                    @foreach($groups as $group)
                    {{-- @isset($lecturers)
                    @foreach($lecturers as $lecturer)
                    @if ($message -> lecturer_id == $lecturer-> id)
					<a class="chat-list-group list-group-item-3 list-group-item-action" id="{{ $lecturer->id }}" data-toggle="list" href="#{{ $lecturer->id }}" role="tab" aria-controls="home">                        
                        <img src="{{$lecturer->photo}}" alt="User Avatar" class="rounded-circle user-avatar float-left" width="50" height="50">
                        <p><b class="sender_name">{{ $lecturer->name }}</b>
                        @if($message->pending > 0)
                        <span class="new_pending"><i class="far fa-bell fa-lg float-right"><span class="pending float-right">{{$message->pending}}</span></i></span>
                        @endif
						<br><br>
						@if($message->type)
						<span class="recent_message">Attachment file...</span><br><br>
						@else
                        <span class="recent_message">{{ Str::limit($message -> message, 25) }}</span><br><br>
						@endif
                        <span style="opacity: 0.8">{{ date ('jS, F Y, h:i a', strtotime($message -> created_at)) }}</span><br>
						</p>
					</a>
                    @endif
                    @endforeach
					@endisset --}}
					<a class="chat-list-group list-group-item-3 list-group-item-action" data-group-id="{{$group -> group_chat_id}}" data-toggle="list" href="#" role="tab" aria-controls="home">
						<img src="{{$group->profile}}" alt="Group" class="rounded-circle user-avatar float-left" width="50" height="50">
						<p ><b class="sender_name">{{$group->group_name}}</b>
						{{-- @if($message->pending > 0)
						<i class="far fa-bell fa-lg float-right"><span class="pending float-right">{{$message->pending}}</span></i>
						@endif --}}
						<br>
						@if($group->status)
                        <span class="new_pending"><i class="far fa-bell fa-lg float-right"><span class="pending float-right"></span></i></span>
                        @endif
						<br><br>
						@if($group->type && $group->message)
						<span class="recent_message">Attachment file...</span><br><br>
						@else
                        <span class="recent_message">{{ Str::limit($group -> message, 25) }}</span><br><br>
						@endif
						<span style="opacity: 0.8">{{ date ('jS, F Y, h:i a', strtotime($group -> last_update)) }}</span>
						</p>
					</a>
					@endforeach
					@endisset
					</div>
					<p></p>  
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create-con" id="btn-create-new-con">Create a new conversion</button>
				@if (Auth::user()->type == 'college')
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create-con-group" id="btn-create-new-con-group">Create a new group chat</button>
				@endif
			</div>
		</div>

		<div id="main">
			<button class="openbtn" onclick="openNav()">☰ Chat List</button>
				<div class="dashboard-wrapper-2" id="messages">
				
			</div>
		</div>
							
<!-- <nav class="navbar-sidebar">
<div class="nav-left-sidebar sidebar-dark">
	<div class="menu-list">
			<nav class="navbar navbar-expand-lg navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
					<div class="collapse navbar-collapse" id="navbarNav">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 last-item">
				<div class="section-block">
						<h3 >Chat List</h3>
				</div>
				<div class="card-header " id="headingThree">
								<input class="form-control" type="text" placeholder="Search..">
								<h5 class="mb-0"></h5>
				</div>
						<div class="list-group chat-list" id="list-tab" role="tablist">
								 <form>
										<div class="input-group input-group-round">
												<div class="input-group-prepend">
														<span class="input-group-text">
																<i class="fas fa-search"></i>
														</span>
												</div>
												<input type="search" class="form-control filter-list-input" placeholder="Search chat" aria-label="Search Chat">
										</div>
								</form>
								<p></p>
										@isset($messages)
										@foreach($messages as $message)
										<a class="chat-list-user list-group-item-3 list-group-item-action" id="{{ $message->id }}" data-toggle="list" href="#{{ $message->id }}" role="tab" aria-controls="home">
												<img src="{{$message->photo}}" alt="User Avatar" class="rounded-circle user-avatar float-left" width="50" height="50">
												<p ><b>{{ $message->name }}</b>
												@if($message->pending > 0)
												<i class="far fa-bell fa-lg float-right"><span class="pending float-right">{{$message->pending}}</span></i>
												@endif
												<br>
												<span style="opacity: 0.8">Tuesday, April 21, 2020</span>
												

												</p>
										</a>
										@endforeach
										@endisset
								</div>
								<p></p>  
						<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create-con" id="btn-create-new-con">
										Create a new conversion
								</button>
		</div>
											</div>
									</nav>
							</div>
					</div>
			</nav> -->
	</div>
</div>
		<!-- <div class="dashboard-wrapper-2" id="messages">
		</div> -->
		
<!-- Modal -->
<div class="modal fade" id="create-con" tabindex="-1" role="dialog" aria-labelledby="create-con" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="create-con">Create a new conversation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
						<div class="col-12">
							<form>
					<!-- <div class="form-group">
						<label for="recipient-name" class="col-form-label">Recipient:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div> -->
							@isset($lecturers)
							<div class="list-group con-list overflow-auto" id="con-list" style="max-height:200px;">
								@foreach($lecturers as $lecturer)
								<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#{{$lecturer->id}}" role="tab" aria-controls="profile">
									<img src="{{$lecturer->photo}}" alt="User Avatar" class="rounded-circle user-avatar-sm"/>&nbsp;&nbsp;{{$lecturer->name}}
								</a>
								@endforeach
							</div>
							@endisset
							<div class="form-group">
								<label for="message-text" class="col-form-label">Message:</label>
								<textarea class="form-control" id="new-message-text" placeholder="Type a new message..."></textarea>
							</div>
						</form>
					</div>            
				</div>
				<div class="row">
					<div class="col-12 error">
						<p class="text-center text-danger d-none">Could not create new conversation !!!</p>
					</div>
				</div>
			</div>
			
			
			<div class="modal-footer">
				<div class="row">
						<div class="col-12">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="btn-create-con">Create conversion</button>
						</div>
						
				</div>
			</div>
		</div>
	</div>
</div>
@if (Auth::user()->type == 'college')
<div class="modal fade" id="create-con-group" tabindex="-1" role="dialog" aria-labelledby="create-con-group" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="create-con-group">Create a new group</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<form>
							@csrf
							<div class="list-group overflow-auto" style="max-height:200px;">
								<div class="list-group checkbox-list-group">
									@isset($students)
										@foreach($students as $student)
										<div class="list-group-item">
											<label>
												<input type="checkbox" name="student_ids[]" value="{{$student->id}}" readonly>&nbsp;&nbsp;
												<span class="list-group-item-text">
													<img src="{{$student->profile}}" alt="User Avatar" class="rounded-circle user-avatar-sm"/>&nbsp;&nbsp;{{$student->name}}
												</span>
											</label>
										</div>
										@endforeach
									@endisset
								  </div>
								</div>								
							<div class="form-group">
								<label for="message-text" class="col-form-label">Group Name:</label>
								<input type="text" class="form-control" id="group-name" placeholder="Type a group name...">
							</div>
						</form>
					</div>            
				</div>
				<div class="row">
					<div class="col-12 error">
						<p class="text-center text-danger d-none">Could not create a new group !!!</p>
					</div>
				</div>
			</div>
			
			
			<div class="modal-footer">
				<div class="row">
					<div class="col-12">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-create-con-group">Create a new group</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
    
		@endsection