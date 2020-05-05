
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body chat">
                        @foreach ($messages as $message)
                        <div class="row">
                            <div class="col-12">
                                <p class="card-text {{$message -> status == 1 ? 'chat-reciever float-right' : 'chat-sender float-left'}}">{{$message->message}}</p>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="card-text {{$message -> status == 1 ? 'float-right' : 'float-left'}}"> Sent: {{ date ('d F y, h:i a', strtotime($message -> created_at)) }}</span>
                            </div>
                        </div><br>
                        @endforeach
                        
                    </div>
                    <div class="card-footer">
                        <form class="chat-action">
                            <div class="form-group row">
                                <div class="col-10">
                                    <textarea class="form-control chat-textarea" placeholder="Type a message..." name="message" id="message" rows="4"></textarea>
                                </div>
                                <div class="col-2"> 
                                    <button class="btn rounded-circle" onclick="send_message()" type="button"><i class="far fa-share-square"></i></button>
                                    <button class="btn rounded-circle" type="reset"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>  
                </div>
             </div>
         </div>