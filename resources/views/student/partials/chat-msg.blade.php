
				<div class="chat-module">
					 <div class="navbar bg-white breadcrumb-bar border-bottom"><b id="con_sender_name"></b></div>
						<div class="chat-module-top">
							<div class="chat-module-body">
								@isset($messages)
								@foreach ($messages as $message)
								<div class="row">
									<div class="col-12">
										<p class="card-text {{$message -> status == 0 ? 'chat-reciever float-right' : 'chat-sender float-left'}}" onclick="show_date(chat_date_{{$message->id}})">
											{{$message->message}}
											@if ($message->type == 1)
											<br>
											<iframe src="{{$message->src}}" alt="file" max-width="350" max-height="350" controls autoplay="false"></iframe>											
											@elseif ($message->type == 2)
											<br>
											<a class="card-text" href="{{$message->src}}">
												{{$message->filename}}
											</a>
											@elseif ($message->type == 3)
											<br>
											<video controls="true" width="350" height="350" >
												<source src="{{$message->src}}" />
											</video>							
											@endif
											
										</p>
									</div>
								</div>
								
								<div class="row d-none" id="chat_date_{{$message->id}}">
									<div class="col-12">
										<span class="card-text {{$message -> status == 0 ? 'float-right' : 'float-left'}}"> Sent: {{ date ('d F y, h:i a', strtotime($message -> created_at)) }}</span>
									</div>
								</div><br>
								@endforeach
								@endisset
							</div>
						</div>
						
						<div class="chat-module-bottom" id="form_chat-form">
							
							<form class="chat-form" enctype="multipart/form-data" id="form-send-message">
								<textarea class="form-control chat-textarea" placeholder="Type a message..." name="message" id="message"></textarea>
								<input type="number" name="type" id="message-type" hidden>
								<div class="chat-form-buttons">
									<button class="btn rounded-circle" onclick="send_message()" type="button"><i class="fas fa-paper-plane" style="color: #3a77e0"></i></button>
								</div>
								<div class="loader"></div>
								<div class="custom-file">
									<input type="file" name="file" class="custom-file-input" id="chatFile">
									<label class="custom-file-label" id="chatFile-label" for="chatFile">Choose file</label>
								</div>
							</form>
						</div>
					</div>
					<style>
						a {
							color:inherit;
							text-decoration: none;
						}
						.loader {
							margin:auto;
							border: 16px solid #f3f3f3; /* Light grey */
							border-top: 16px solid #3498db; /* Blue */
							border-radius: 50%;
							width: 25px;
							height: 25px;
							animation: spin 2s linear infinite;
						}

						@keyframes spin {
							0% { transform: rotate(0deg); }
							100% { transform: rotate(360deg); }
						}
					</style>
					<script>
					// Add the following code if you want the name of the file appear on select
					$("#chatFile").on("change", function() {
						$("#message-type").val('1');
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings("#chatFile-label").addClass("selected").html(fileName);
					});
					$('.loader').css('display','none');
					</script>