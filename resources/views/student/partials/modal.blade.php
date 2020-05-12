@isset($first_course)
<div class="modal fade" id="enrollModal_{{$first_course['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Enroll course</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                        </a>
            </div> 
            <form action="{{route('student_enrollment')}}" method="post" enctype="multipart/form-data">
            @csrf                                                          
                <div class="modal-body">
                    <br>
                    <h3>{{$first_course->cname}} course</h3>
                    <p class="text-dark"><em>Tr.{{$first_course->lecturer_name}}</em></p>
                    <h4 class="text-dark">{{$first_course->discount_price}} Kyats
                        <del class="product-del">{{$first_course->price}} Kyats</del>
                    </h4>
                    <h4 class="text-primary">Please submit your payment information.</h4>
                    
                    <p>Please select your payment method.</p>
                    <input type="hidden" name="course_id" value="{{$first_course->id}}">
                    <input type="hidden" name="amount" value="{{$first_course->discount_price}}">
                    <select class="form-control" name="payment_method">
                        <option class="text-primary" value="KBZ Pay">KBZ Pay</option>
                        <option class="text-primary" value="Wavemoney">Wavemoney</option>
                        <option class="text-secondary" value="KBZ Account">KBZ Account</option>
                        <option class="text-secondary" value="AYA Account">AYA Account</option>
                        <option class="text-secondary" value="CB Account">CB Account</option>
                    </select>
                    <br>
                    <p>Please enter your completed payment script.</p>
                    <input type="file" name="payment_photo" class="form-control">
                
                </div>
            
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endisset
@isset($courses)
@foreach($courses as $course)
<div class="modal fade" id="enrollModal_{{$course['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Enroll course</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                        </a>
            </div>                                                                                             <form action="{{route('student_enrollment')}}" method="post" enctype="multipart/form-data">
            @csrf                                                           
                <div class="modal-body">
                    <br>
                    <h2 class="text-danger">{{$course->cname}} course</h2>
                    <p class="text-dark"><em>Tr.{{$course->lecturer_name}}</em></p>
                    <h4 class="text-dark">{{$course->discount_price}} Kyats
                        <del class="product-del">{{$course->price}} Kyats</del>
                    </h4>
                    <h4 class="text-primary">Please submit your payment information.</h4>
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="amount" value="{{$course->discount_price}}">
                    <p>Please select your payment method.</p>
                    <select class="form-control"  name="payment_method">
                        <option class="text-primary" value="KBZ Pay">KBZ Pay</option>
                        <option class="text-primary" value="Wavemoney">Wavemoney</option>
                        <option class="text-secondary" value="KBZ Account">KBZ Account</option>
                        <option class="text-secondary" value="AYA Account">AYA Account</option>
                        <option class="text-secondary" value="CB Account">CB Account</option>
                    </select>
                    <br>
                    <p>Please enter your completed payment script.</p>
                    <input type="file" name="payment_photo" class="form-control">
                
                </div>
            
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endforeach
@endisset
