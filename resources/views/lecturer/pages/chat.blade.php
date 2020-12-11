    @extends('lecturer.layouts.default')
    @section('title','Online Learning System : KBTC')
    @section('content')
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
                    @isset($students)
                    @foreach($students as $student)
                    @if ($message -> student_id == $student-> id)
                    <a class="chat-list-user list-group-item-3 list-group-item-action" id="{{ $student->id }}" data-toggle="list" href="#{{ $student->id }}" role="tab" aria-controls="home">                        
                        <img src="{{$student->photo}}" alt="User Avatar" class="rounded-circle user-avatar float-left" width="50" height="50">
                        <p><b class="sender_name">{{ $student->name }}</b>
                        
                        <span class="new_pending">
                            @if($message->pending > 0)
                            <i class="far fa-bell fa-lg float-right"><span class="pending float-right">{{$message->pending}}</span></i>
                            @endif

                        </span>
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
                    @endisset
                    @endforeach
                    @endisset
                    </div>
                    <p></p>  
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#create-con" id="btn-create-new-con">Create a new conversion</button>
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
      <img src="{{$student->photo}}" alt="User Avatar" class="rounded-circle user-avatar-sm">&nbsp;&nbsp;{{$student->name}}</a>
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
@endsection