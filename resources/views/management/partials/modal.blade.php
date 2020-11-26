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