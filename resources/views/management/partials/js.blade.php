<!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Pusher.logToConsole = true;
        var pusher = new Pusher('93f19a2ed0efc1abcf99', {
            cluster: 'ap1',
            forceTLS: true
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // console.log(data)
            // console.log(lecturer_id)
            // if (lecturer_id == data.lecturer_id && data.status == 1) {
            //     $('#'+data.student_id).click();
            //     scrollToBottom();
            // }
            // else if (lecturer_id  == data.lecturer_id && data.status == 0){
            //     if(student_id == data.student_id) {
            //         $('#'+data.student_id).click();
            //     }
            //     else {
            //         var pending = parseInt($('#'+data.student_id).find('.pending').html());
            //         if (pending) {
            //             $('#'+data.student_id).find('.pending').html(pending + 1);
            //         }
            //         else {
            //             $('#'+data.student_id+' p').append('<i class="far fa-bell fa-lg float-right"><span class="pending float-right">1</span></i>');
            //         }
            //     }
            // }
        });
        $(".chat-list-user").click(function () {
            var student_id =(this).href.split("#")[1];
            $(this).find('.far').remove();
            $.ajax({
                type: "GET",
                url: "message/"+student_id,
                success: function (msg_content) {
                    $('#messages').html(msg_content);
                    scrollToBottom();
                }
            })
        })
        // $(document).on('keyup', '#message', function (e) {
        //     var message = $(this).val();
        //     // Check if the key is pressed and message is not null also reciever is slected
        //     if (e.keyCode == 13 && message != '' && student_id != '') {
        //         $(this).val('');
        //         $.ajax({
        //             type:'POST',
        //             url: 'message',
        //             data: {
        //             'student_id': student_id,
        //             'message': message},
        //             success: function(data) { },
        //             error: function (jqXHR, status, err) { },
        //             complete: function () { }
        //         });
        //     }
        // });
        $('#con-list a').on('click', function (e) {
            e.preventDefault();
            $('#con-list a').removeClass('active');
            $(this).addClass('active');
            new_student_id = (this).href.split("#")[1];
        });
        // $('#btn-create-con').on('click', function (e) {
        //     $('.error p').addClass('d-none');
        //     var message = $('#new-message-text').val();
        //     $('#new-message-text').val('');
        //     if (message != '' && new_student_id != '') {
        //         $.ajax({
        //             type:'POST',
        //             url: 'message',
        //             data: {
        //             'student_id': new_student_id,
        //             'message': message},
        //             success: function(data) { location.reload(); },
        //             error: function (jqXHR, status, err) { },
        //             complete: function () { }
        //         });
        //     }
        //     else {
        //         $('.error p').removeClass('d-none');
        //     }
            
        // });
    });
    function scrollToBottom() {
        // var objDiv = $(".chat");
        // objDiv.animate({scrollTop: objDiv.get(0).scrollHeight},1, 'linear');
        $('.chat').animate({
            scrollTop: $('.chat').get(0).scrollHeight }, 50
        );
    }
    // function send_message() {
    //     var message = $(this).val();
    //     $(this).val('');
    //     $.ajax({
    //         type:'POST',
    //         url: 'message',
    //         data: {
    //         'student_id': student_id,
    //         'message': message},
    //         success: function(data) { },
    //         error: function (jqXHR, status, err) { },
    //         complete: function () { }
    //     });
    // }
    function send_message()
    {
        var message = $('#message').val();
        var student_id = $(this).val();
		
		var file = $("#chatFile")[0].files[0];
			// Check if the key is pressed and message is not null also reciever is slected
		if (message != '' && student_id != '') {
			$('#message').val('');
			$("#chatFile").val('');
			$("#chatFile-label").val('');
			$("#chatFile-label").text('Choose file');
			var form_data = new FormData();
			form_data.append('student_id', student_id);
			form_data.append('message', message);
			form_data.append('chat_file', file);
			$.ajax({
				type:'POST',
				url: 'message',
				beforeSend:function(){
					$('.loader').css('display','block');
				},
				processData: false,
				data:form_data,
				contentType: false,
				enctype: 'multipart/form-data',
				success: function(data) {
					
				 },
				error: function (jqXHR, status, err) { },
				complete: function () {
					$('.loader').css('display','none');
				 }
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
