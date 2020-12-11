				@if($type == 'group')
				<div class="modal fade" id="group-member" tabindex="-1" role="dialog" aria-labelledby="group-member" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Manage Group</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-12">
										<p>Member List</p>
										<form>
											@csrf
											{{-- <button type="submit">Continue</button> --}}
											<div class="list-group overflow-auto" style="max-height:200px;">
												<div class="list-group checkbox-list-group">
													@isset($members)
														@foreach($members as $member)
														<div class="list-group-item">
															<label class="col-md-12">
																
																<span class="list-group-item-text">
																	<img src="{{$member->profile}}" alt="User Avatar" class="rounded-circle user-avatar-sm"/>&nbsp;&nbsp;{{$member->name}}
																</span> 
																{{$member->type == 1 ? "- Admin" : "- Member" }}
																{{-- <input type="checkbox" name="student_ids[]" value="{{$member->id}}" readonly>&nbsp;&nbsp; --}}
																@if (Auth::id() == $admin->member_id && $member->type != 1)
																<i class="fas fa-trash float-right remove_member" style="color: #3a77e0" data-group-chat-detail-id="{{$member->id}}"></i>
																@endif
															</label>
														</div>
														@endforeach
													@endisset
												</div>
											</div>
										</form>
										<br>
										<p>Non-member List</p>
										<form>
											@csrf
											<div class="list-group overflow-auto" style="max-height:200px;">
												<div class="list-group checkbox-list-group">
													@isset($non_members)
														@foreach($non_members as $non_members)
														<div class="list-group-item">
															<label>
																<input type="checkbox" name="non_members_ids[]" value="{{$non_members->id}}" readonly>&nbsp;&nbsp;
																<span class="list-group-item-text">
																	<img src="{{$non_members->profile}}" alt="User Avatar" class="rounded-circle user-avatar-sm"/>&nbsp;&nbsp;{{$non_members->name}}
																</span>
															</label>
														</div>
														@endforeach
													@endisset
												</div>
											</div>								
										</form>
									</div>            
								</div>
								<div class="row">
									<div class="col-12 error">
										<p class="text-center text-danger d-none">Could not add a new member !!!</p>
									</div>
								</div>
							</div>
							
							
							<div class="modal-footer">
								<div class="row">
									<div class="col-12">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" id="btn-add-new-group-member" value="{{$admin->group_chat_id}}">Add new members</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="chat-module">
					<div class="navbar bg-white breadcrumb-bar border-bottom"><b id="con_sender_name"></b><b class="float-right"  data-toggle="modal" data-target="#group-member"><i class="fas fa-pencil-alt" style="color: #3a77e0"></i></b></div>
					<div class="chat-module-top">
						<div class="chat-module-body">
							@isset($group_messages)
							@foreach ($group_messages as $group_message)
							<div class="row">
								<div class="col-12">
									@if ($group_message -> sender_id != Auth::id())
									<div class="float-left col-12">
										{{ucwords($group_message->name)}}
										<img src="{{$group_message->profile}}" alt="User Avatar" class="rounded-circle user-avatar float-left" width="50" height="50">
									</div>
									@endif
									<p class="card-text {{$group_message -> sender_id == Auth::id() ? 'chat-reciever float-right' : 'chat-sender float-left'}}" onclick="show_date(chat_date_{{$group_message->id}})">
										{{$group_message->message}}
										@if ($group_message->type == 1)
										<br>
										<iframe src="{{$group_message->src}}" alt="file" max-width="350" max-height="350" controls autoplay="false"></iframe>											
										@elseif ($group_message->type == 2)
										<br>
										<a class="card-text" href="{{$group_message->src}}">
											{{$group_message->filename}}
										</a>
										@elseif ($group_message->type == 3)
										<br>
										<video controls="true" width="350" height="350" >
											<source src="{{$group_message->src}}" />
										</video>							
										@endif
										
									</p>
								</div>
							</div>
							
							<div class="row d-none" id="chat_date_{{$group_message->id}}">
								<div class="col-12">
									<span class="card-text {{$group_message -> sender_id == Auth::id() ? 'float-right' : 'float-left'}}"> Sent: {{ date ('d F y, h:i a', strtotime($group_message -> created_at)) }}</span>
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
							<input type="number" name="type" id="group_id" value="{{$group_id}}" hidden>
							<div class="chat-form-buttons">
								<button class="btn rounded-circle" onclick="send_group_message()" type="button"><i class="fas fa-paper-plane" style="color: #3a77e0"></i></button>
							</div>
							<div class="loader"></div>
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input" id="chatFile">
								<label class="custom-file-label" id="chatFile-label" for="chatFile">Choose file</label>
							</div>
						</form>
					</div>
				</div>
				@elseif( $type == 'management')
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
								<button class="btn rounded-circle" onclick="send_management_message()" type="button"><i class="fas fa-paper-plane" style="color: #3a77e0"></i></button>
							</div>
							<div class="loader"></div>
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input" id="chatFile">
								<label class="custom-file-label" id="chatFile-label" for="chatFile">Choose file</label>
							</div>
						</form>
					</div>
				</div>
				@else
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
				@endif
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
				$(".remove_member").click(function () {
					var member = $(this).closest('.list-group-item');
					$.ajax({
						type: "DELETE",
						url: "group_member",
						data: {
							'id':$(this).data('group-chat-detail-id')
						},
						success: function () {
							member.remove();
							swal({
								icon: "success",
								text:"Remove member successfully !!!"
							});
							// $('#messages').html(msg_content);
							// $('#con_sender_name').text(name);
							// scrollToBottom();
						}
					})
				});
				$("#btn-add-new-group-member").click(function (e) {
					e.preventDefault();
					var student_ids = [];
					$('.error p').addClass('d-none');
					$("input[name='non_members_ids[]']:checked").each(function () {
						student_ids.push($(this).val());
					});
					if (student_ids.length > 0) {
						$.ajax({
							type:'POST',
							url: 'group_member',
							data: {
								'student_ids': student_ids,
								'group_chat_id':$(this).val()
							},
							success: function(data) { location.reload(); },
							error: function (jqXHR, status, err) { 
								$('.error p').removeClass('d-none');
							},
							complete: function () { }
						});
					}
					else {
						$('.error p').removeClass('d-none');
					}
					
				});
				
				</script>
				