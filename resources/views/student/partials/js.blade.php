<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
	<!-- bootstap bundle js -->
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
	<!-- slimscroll js -->
	<script src="{{ asset('/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
	<!-- main js -->
	<script src="{{ asset('/libs/js/main-js.js')}}"></script>
	<!-- chart chartist js -->
	<script src="{{ asset('/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
	<!-- sparkline js -->
	<script src="{{ asset('/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
	<!-- morris js -->
	<script src="{{ asset('/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
	<script src="{{ asset('/vendor/charts/morris-bundle/morris.js')}}"></script>
	<!-- chart c3 js -->
	<script src="{{ asset('/vendor/charts/c3charts/c3.min.js')}}"></script>
	<script src="{{ asset('/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
	<script src="{{ asset('/vendor/charts/c3charts/C3chartjs.js')}}"></script>
	<script src="{{ asset('/libs/js/dashboard-ecommerce.js')}}"></script>
	<script src="{{ asset('/libs/js/main-js.js')}}"></script>
	<script src="{{ asset('/libs/js/jquery.form.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="{{asset('/libs/js/carousel.js')}}"></script>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>

	<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
	return true;
  }).catch(function(e) {
	var carbonScript = document.createElement("script");
	carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
	carbonScript.id = "_carbonads_js";
	document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
	<!--scripts loaded here-->
	
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
	this.parentElement.querySelector(".nested").classList.toggle("active");
	this.classList.toggle("caret-down");
  });
}
</script>
<script type="text/javascript">
	var student_id = '{{ Auth::id() }}';
	var lecturer_id = '';
	var new_lecturer_id = '';
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var pusher = new Pusher('93f19a2ed0efc1abcf99', {
			cluster: 'ap1',
			forceTLS: true
		});
		var channel = pusher.subscribe('my-channel');
		channel.bind('my-event', function(data) {
			if (student_id == data.student_id && data.status == 0) {
				$('#'+data.lecturer_id).click();
				scrollToBottom();
			}
			else if (student_id == data.student_id && data.status == 1){
				if(lecturer_id == data.lecturer_id) {
					$('#'+data.lecturer_id).click();
				}
				else {
					var pending = parseInt($('#'+data.lecturer_id).find('.pending').html());
					if (pending) {
						$('#'+data.lecturer_id).find('.pending').html(pending + 1);
					}
					else {
						$('#'+data.lecturer_id+' p').append('<i class="far fa-bell fa-lg float-right"><span class="pending float-right">1</span></i>');
					}
				}
			}
		});
		$(".chat-list-user").click(function () {
			lecturer_id =(this).href.split("#")[1];
			$(this).find('.far').remove();
			$.ajax({
				type: "GET",
				url: "message/"+lecturer_id,
				success: function (msg_content) {
					$('#messages').html(msg_content);
					scrollToBottom();
				}
			})
		})
		$(document).on('keyup', '#message', function (e) {
			var message = $(this).val();
			// Check if the key is pressed and message is not null also reciever is slected
			if (e.keyCode == 13 && message != '' && lecturer_id != '') {
				$(this).val('');
				$.ajax({
					type:'POST',
					url: 'message',
					data: {
					'lecturer_id': lecturer_id,
					'message': message},
					success: function(data) { },
					error: function (jqXHR, status, err) { },
					complete: function () { }
				});
			}
		});
		
		
		$('#con-list a').on('click', function (e) {
			e.preventDefault();
			$('#con-list a').removeClass('active');
			$(this).addClass('active');
			new_lecturer_id = (this).href.split("#")[1];
		});
		$('#btn-create-con').on('click', function (e) {
			e.preventDefault();
			$('.error p').addClass('d-none');
			var message = $('#new-message-text').val();
			$('#new-message-text').val('');
			if (message != '' && new_lecturer_id != '') {
				$.ajax({
					type:'POST',
					url: 'message',
					data: {
					'lecturer_id': new_lecturer_id,
					'message': message},
					success: function(data) { location.reload(); },
					error: function (jqXHR, status, err) { },
					complete: function () { }
				});
			}
			else {
				$('.error p').removeClass('d-none');
			}
			
		});
	});
	function scrollToBottom() {
		// var objDiv = $(".chat");
		// objDiv.animate({scrollTop: objDiv.get(0).scrollHeight},1, 'linear');
		$('.chat').animate({
			scrollTop: $('.chat').get(0).scrollHeight }, 50
		);
	}
	function send_message()
	{
		var message = $('#message').val();
			// Check if the key is pressed and message is not null also reciever is slected
			if (message != '' && lecturer_id != '') {
				$('#message').val('');
				$.ajax({
					type:'POST',
					url: 'message',
					data: {
					'lecturer_id': lecturer_id,
					'message': message},
					success: function(data) { },
					error: function (jqXHR, status, err) { },
					complete: function () { }
				});
			}
	}
	function readURL(input) {
	      if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        
	        reader.onload = function(e) {
	          $('#profile').attr('src', e.target.result);
	        }
	        
	        reader.readAsDataURL(input.files[0]); // convert to base64 string
	      }
	    }

	    $("#imgInp").change(function() {
	      readURL(this);
	    });
		
	</script>
	@isset($sections)
	@isset($course_contents)
	@foreach ($sections as $section)
	@foreach ($course_contents as $temp)
	@if ($temp->section_id == $section->sec_id)
	@if ($temp->assignment_url)
	<script>
	$(document).ready(function(){
	    $('.progress').css('display','none');

	    $('#form_assignment_{{$temp['id']}}').ajaxForm({
	      beforeSend:function(){
	        $('.progress').css('display','block');
	        $('.progress-bar').text(0 + '%');
	        $('.progress-bar').css('width', 0 + '%');
	        $('#success').empty();
	      },
	      uploadProgress:function(event, position, total, percentComplete)
	      {
	        $('.progress-bar').text(percentComplete + '%');
	        $('.progress-bar').css('width', percentComplete + '%');
	      },
	      success:function(data)
	      {
	        if (data =="Success") {
	        	location.href = '/student/assignment/{{$section->course_id}}';
	        }
	      }
	    });
	});
	</script>
	@endif
	@endif
	@endforeach
	@endforeach
	@endisset
	@endisset