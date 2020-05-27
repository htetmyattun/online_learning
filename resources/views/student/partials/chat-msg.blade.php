
<div class="chat-module">
                        <div class="chat-module-top">
                            
                            <div class="chat-module-body">
                                @foreach ($messages as $message)
                                <div class="row">
                                    <div class="col-12">
                                        <p class="card-text {{$message -> status == 0 ? 'chat-reciever float-right' : 'chat-sender float-left'}}">{{$message->message}}</p>
                                    </div>                        
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <span class="card-text {{$message -> status == 0 ? 'float-right' : 'float-left'}}"> Sent: {{ date ('d F y, h:i a', strtotime($message -> created_at)) }}</span>
                                    </div>
                                </div><br>
                                @endforeach
                            </div>
                        </div>
                        <div class="chat-module-bottom">
                            
                            <form class="chat-form">
                                <textarea class="form-control chat-textarea" placeholder="Type a message..." name="message" id="message"></textarea>
                                <div class="chat-form-buttons">
                                    <button class="btn rounded-circle" onclick="send_message()" type="button"><i class="fas fa-paper-plane" style="color: #3a77e0"></i></button>
                                    
                                    <!-- <div class="custom-file custom-file-naked">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">
                                            <i class="fas fa-paperclip"></i>
                                        </label>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>