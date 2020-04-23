 @isset($sections)
 @foreach($sections as $section)
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a href="/lecturer/delete-section/{{$section->id}}" class="btn btn-secondary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
@endisset
            <div class="modal fade" id="savemarkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Save Mark</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <h3>Assignment 1</h3>
                            By <span class="text-primary">Yamone Oo</span>
                        </div>
                        <form id="form" data-parsley-validate="" novalidate="">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="inputtext2" class="col-5 col-lg-3 col-form-label text-right">Enter Mark *</label>
                                    <div class="col-7 col-lg-8 col-xs-12">
                                        <input id="inputtext2" type="text" required="" name="section_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary">Save</a>
                                <a href="#" class="btn btn-light" data-dismiss="modal">Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>