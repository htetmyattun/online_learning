 @isset($students)
 @foreach($students as $student)
<div class="modal fade" id="deleteModal_{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Confirm deleting contents</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-1">
                                    <i class="fas fa-question-circle fa-2x green"></i>
                                </div>
                                <div class="col-10" style="top:5px;">
                                    <p>Are you sure want to delete ? </p>
                                </div>                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            <a href="/management/delete-student/{{$student->id}}" class="btn btn-secondary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
@endisset

 @isset($reviews)
 @foreach($reviews as $review)
<div class="modal fade" id="delete_review_Modal_{{$review->rid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Confirm deleting contents</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-1">
                                    <i class="fas fa-question-circle fa-2x green"></i>
                                </div>
                                <div class="col-10" style="top:5px;">
                                    <p>Are you sure want to delete ? </p>
                                </div>                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            <a href="/management/delete-review/{{$review->rid}}" class="btn btn-secondary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
@endisset

 @isset($certificate)
 @foreach($certificate as $c)
<div class="modal fade" id="certificateModal_{{$c->cid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Add Certificate Photo</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <form method="post" action="{{route('management_save_certificate')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="certificate_id" value="{{$c->cid}}">
                            <div class="modal-body">
                                <div class="row" style="margin-bottom: 1rem;">
                                    <div class="col-3">
                                        <label>Certificate Photo :</label>
                                    </div>
                                    <div class="col-5" style="top:5px;">
                                       <input type="file" name="certificate_photo">
                                    </div>                                
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endforeach
@endisset
