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
    <script src="{{ asset('/libs/js/jquery.form.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script type="text/javascript">
    var student_id = '';
    var lecturer_id = '{{ Auth::id() }}';
    var new_student_id = '';
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
            if ($('.chat-list-user').find('#'+data.student_id))
            {
                $('#'+data.student_id).find('.recent_message').text(data.message);
                if (lecturer_id == data.lecturer_id && data.status == 1) {
                    $('#'+data.student_id).click();
                    scrollToBottom();
                }
                else if (lecturer_id  == data.lecturer_id && data.status == 0){
                    if(student_id == data.student_id) {
                        
                        $('#'+data.student_id).click();
                    }
                    else {
                        var pending = parseInt($('#'+data.student_id).find('.pending').html());
                        if (pending) {
                            $('#'+data.student_id).find('.pending').html(pending + 1);
                        }
                        else {
                            $('#'+data.student_id+' p .new_pending').html('<i class="far fa-bell fa-lg float-right"><span class="pending float-right">1</span></i>');
                        }
                    }
                }
                }
            else
            {
                location.reload();
            }
        });
        $(".chat-list-user").click(function () {
            student_id =(this).href.split("#")[1];
            var name = $(this).find('.sender_name').text()
            $(this).find('.far').remove();
            $.ajax({
                type: "GET",
                url: "message/"+student_id,
                success: function (msg_content) {

                    $('#messages').html(msg_content);
                    $('#con_sender_name').text(name);
                    scrollToBottom();
                }
            })
        })
        $(document).on('keyup', '#message', function (e) {
            var message = $(this).val();
            // Check if the key is pressed and message is not null also reciever is slected
            if (e.keyCode == 13 && message != '' && student_id != '') {
                $(this).val('');
                $.ajax({
                    type:'POST',
                    url: 'message',
                    data: {
                    'student_id': student_id,
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
            new_student_id = (this).href.split("#")[1];
        });
        $('#btn-create-con').on('click', function (e) {
            $('.error p').addClass('d-none');
            var message = $('#new-message-text').val();
            $('#new-message-text').val('');
            if (message != '' && new_student_id != '') {
                $.ajax({
                    type:'POST',
                    url: 'message',
                    data: {
                    'student_id': new_student_id,
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
        $("#search_chat_list").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#list-tab a").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        if ($('.chat-list-user'))
        {
            $('.chat-list-user:first').click();
        }
       
    });
    // Show message created date
    function show_date(id) {
        if ($(id).hasClass('d-none')) {
            $(id).removeClass('d-none');    
        }
        else {
            $(id).addClass('d-none');   
        }
    }
    function scrollToBottom() {
        // var objDiv = $(".chat");
        // objDiv.animate({scrollTop: objDiv.get(0).scrollHeight},1, 'linear');
        $('.chat-module-body').animate({
            scrollTop: $('.chat-module-body').get(0).scrollHeight }, 50
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
                    'student_id': student_id,
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
<script>
$(document).ready(function(){
    $('.progress').css('display','none');

    $('#form_add_section').ajaxForm({
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
        $('#form_add_section')[0].reset();
        window.location.reload();
      }
    });
    $('#form_add_quiz').ajaxForm({
      beforeSend:function(){

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
        $('#form_add_quiz')[0].reset();
        location.href = '/lecturer/add-quiz';
      }
    });
    $('#form_add_course').ajaxForm({
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
        window.location.href = "/lecturer/home";
      }
    });
    

});
</script>