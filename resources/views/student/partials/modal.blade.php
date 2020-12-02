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
                    <h2 class="text-danger">{{$first_course->cname}} course</h2>
                    <p class="text-dark"><em>Tr.{{$first_course->lecturer_name}}</em></p>

                    <h4 class="text-dark" ><span id="price_{{$first_course['id']}}">{{number_format($first_course->price-$first_course->discount_price)}}</span> Kyats
                        <del class="product-del">{{number_format($first_course->discount_price)}} Kyats</del>
                    </h4>
                    <h4 class="text-primary">Please submit your payment information.</h4>
                    <input type="hidden" name="course_id" value="{{$first_course->id}}">
                    <input type="hidden" name="pre_amount" id="pre_amount_{{$first_course->id}}" value="{{$first_course->price-$first_course->discount_price}}">
                    <input type="hidden" name="amount" id="amount_{{$first_course->id}}" value="{{$first_course->price}}">
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
                    <div>
                        <input type="file" name="payment_photo" class="form-control">
                    </div>
                    <br>
                    <div  id="applybox_{{$first_course['id']}}">
                        <p>Please apply your discount coupon.</p>

                        <div class="input-group">
                          <input type="text" placeholder="Enter coupon..." aria-label="Coupon" aria-describedby="basic-addon2" name="couponcode" id="couponcode_{{$first_course['id']}}">
                          <div class="input-group-append">
                            <button class="btn btn-secondary" onclick="applycoupon({{$first_course->id}})" type="button">Apply</button>
                          </div>
                        </div> 
                    </div>
                    <input type="hidden" name="validcoupon" id="validcoupon_{{$first_course->id}}"> 
                    
                   
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
            </div>
            <form action="{{route('student_enrollment')}}" method="post" enctype="multipart/form-data">
            @csrf                                                           
                <div class="modal-body">
                    <br>
                    <h2 class="text-danger">{{$course->cname}} course</h2>
                    <p class="text-dark"><em>Tr.{{$course->lecturer_name}}</em></p>
                    <h4 class="text-dark" ><span id="price_{{$course['id']}}">{{number_format($course->price-$course->discount_price)}}</span> Kyats
                        <del class="product-del">{{number_format($course->discount_price)}} Kyats</del>
                    </h4>
                    <h4 class="text-primary">Please submit your payment information.</h4>
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="pre_amount" id="pre_amount_{{$course->id}}" value="{{$course->price-$course->discount_price}}">
                    <input type="hidden" name="amount" id="amount_{{$course->id}}" value="{{$course->price}}">
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
                    <div>
                        <input type="file" name="payment_photo" class="form-control">
                    </div>
                    <br>
                    <div  id="applybox_{{$course['id']}}">
                        <p>Please apply your discount coupon.</p>

                        <div class="input-group">
                          <input type="text" placeholder="Enter coupon..." aria-label="Coupon" aria-describedby="basic-addon2" name="couponcode" id="couponcode_{{$course['id']}}">
                          <div class="input-group-append">
                            <button class="btn btn-secondary" onclick="applycoupon({{$course->id}})" type="button">Apply</button>
                          </div>
                        </div> 
                    </div>
                    <input type="hidden" name="validcoupon" id="validcoupon_{{$course->id}}" value=" "> 
                    
                   
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

@isset($cate_course)
@foreach($cate_course as $course)
<div class="modal fade" id="enrollModal_{{$course['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h2 class="text-danger">{{$course->cname}} course</h2>
                    <p class="text-dark"><em>Tr.{{$course->lecturer_name}}</em></p>

                    <h4 class="text-dark" ><span id="price_{{$course['id']}}">{{number_format($course->price-$course->discount_price)}}</span> Kyats
                        <del class="product-del">{{number_format($course->discount_price)}} Kyats</del>
                    </h4>
                    <h4 class="text-primary">Please submit your payment information.</h4>
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="pre_amount" id="pre_amount_{{$course->id}}" value="{{$course->price-$course->discount_price}}">
                    <input type="hidden" name="amount" id="amount_{{$course->id}}" value="{{$course->price}}">
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
                    <div>
                        <input type="file" name="payment_photo" class="form-control">
                    </div>
                    <br>
                    <div  id="applybox_{{$course['id']}}">
                        <p>Please apply your discount coupon.</p>

                        <div class="input-group">
                          <input type="text" placeholder="Enter coupon..." aria-label="Coupon" aria-describedby="basic-addon2" name="couponcode" id="couponcode_{{$course['id']}}">
                          <div class="input-group-append">
                            <button class="btn btn-secondary" onclick="applycoupon({{$course->id}})" type="button">Apply</button>
                          </div>
                        </div> 
                    </div>
                    <input type="hidden" name="validcoupon" id="validcoupon_{{$course->id}}"> 
                    
                   
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


@isset($sections)
@isset($course_contents)
@foreach ($sections as $section)
@foreach ($course_contents as $temp)
@if ($temp->section_id == $section->sec_id)
@if ($temp->assignment_url)
<div class="modal fade" id="assignmentModal_{{$temp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Upload Assignment</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
            </div>
            <form action="{{route('student_assignment_upload')}}" method="post" id="form_assignment_{{$temp['id']}}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <br>
                    <h2>{{$section->title}}</h2>
                    <h3 class="pageheader-subtitle">{{$temp->title}}</h3>
                    <p>Please upload your assignment.</p>
                    <input type="file" name="assignment" class="form-control" required="true">
                    <div class="progress">
                        <div class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            0%
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="submit" value="{{$temp['id']}}" name="course_content"class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endif
@endif
@endforeach
@endforeach
@endisset
@endisset

<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Change Password</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                        </a>
            </div>
            <form action="{{route('student_update_password')}}" method="post" enctype="multipart/form-data">
            @csrf                                                           
                <div class="modal-body">
                    <input type="password" style="display: none">
                   <input type="password" autocomplete="off" name="old_pass" id="old_pass" placeholder="Enter old password..." class="form-control">
                </div>
            
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="button" onclick="checkOldPass()" id="submit_pass" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
