    @extends('lecturer.layouts.default')
    @section('title','Online Learning System : KBTC')
    @section('content')
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <div class="nav-left-sidebar sidebar-dark">
                    <div class="menu-list">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 last-item">
                                    <div class="section-block">
                                        <h3 >Chat List</h3>
                                    </div>
                                    <div class="card mb-2 text">
                                        <div class="card-header " id="headingThree">
                                            <!-- <input class="form-control" type="text" placeholder="Search..">
                                            <h5 class="mb-0"></h5> -->
                                        </div>
                                        <div class="card">
                                            <div class="list-group chat-list" id="list-tab" role="tablist">
                                                @isset($users)
                                                @foreach($users as $user)
                                                <a class="chat-list-user list-group-item list-group-item-action" id="{{ $user->id }}" data-toggle="list" href="#{{ $user->id }}" role="tab" aria-controls="home">
                                                    <img src="http://localhost:8000/images/p1.jpg" alt="User Avatar" class="rounded-circle user-avatar float-left" width="50" height="50"><p class="text-center">{{ $user->name }}
                                                    @if($user->pending > 0)
                                                    <i class="far fa-bell fa-lg float-right"><span class="pending float-right">{{$user->pending}}</span></i>
                                                    @endif</p>
                                                    <span class=" float-right">Tuesday, April 21, 2020 </span>
                                                </a>
                                                @endforeach
                                                @endisset
                                            </div>  
                                        </div>
                                        <div class="card-footer">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-con" id="btn-create-new-con">Create a new conversion</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="dashboard-wrapper-1" id="messages">
    </div>
    
<!-- Modal -->
<div class="modal fade" id="create-con" tabindex="-1" role="dialog" aria-labelledby="create-con" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="create-con">Modal title</h5>
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
          
        @isset($students)
        
        <div class="list-group con-list overflow-auto" id="con-list" style="max-height:200px;">
    @foreach($students as $student)
             <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#{{$student->id}}" role="tab" aria-controls="profile">
      <img src="http://localhost:8000/images/p1.jpg" alt="User Avatar" class="rounded-circle user-avatar-sm">&nbsp;&nbsp;{{$student->name}}</a>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->


    @endsection