 @isset($sections)
 @foreach($sections as $section)
<div class="modal fade" id="deleteModal_{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

@isset($course_contents)
@foreach($course_contents as $course_content)
<div class="modal fade" id="content_deleteModal_{{$course_content->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="/lecturer/delete-content/{{$course_content->id}}&{{$course_content->section_id}}" class="btn btn-secondary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
@endforeach
@endisset

@isset($assignments)
@foreach ($assignments as $temp)
@isset($temp->assignment_url_posted)
@empty($temp->marks)
<div class="modal fade" id="savemarkModal_{{$temp->assignment_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Save Mark</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <h3>{{$temp->title}}</h3>
                For <span class="text-primary">{{$temp->name}}</span>
            </div>
            <form id="form" action="{{route('lecturer_add_assignment_marks')}}" method="post" data-parsley-validate="" novalidate="">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputtext2" class="col-3 col-lg-3 col-form-label text-right">Enter Mark *</label>
                        <div class="col-8 col-lg-8 col-xs-12">
                            <input id="inputtext2" type="number" min="0" max="100" required="" name="marks" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputtext2" class="col-3 col-lg-3 col-form-label text-right">Comment</label>
                        <div class="col-8 col-lg-8 col-xs-12">
                            <textarea name="comment" required="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" name="a_id" value="{{$temp->assignment_id}}">Save</button>
                    <button class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endempty
@endisset
@endforeach
@endisset
@isset($id)
<div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Add Quiz Title</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <form id="form_add_quiz" method="post" action="{{route('lecturer_add_content')}}">
                            @csrf
                            <input type="hidden" name="section_id" value="{{$id}}">
                           <input type="hidden" value="4" name="type">
                        <div class="modal-body">
                            
                                <input type="text" name="title" class="form-control" placeholder="Enter quiz title...">
                            <input type="hidden" name="length" id="infos" value="0"><br />
                                <div class="progress">
                                    <div class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        0%
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-secondary">Add</button> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endisset
@isset($course_contents)
@isset($id)
@foreach($course_contents as $course_content)
<div class="modal fade" id="editquizModal_{{$course_content->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Edit Quiz Title</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <form id="form_edit_quiz" method="post" action="{{route('lecturer_edit_quiz')}}">
                            @csrf
                            <input type="hidden" name="section_id" value="{{$id}}">
                           <input type="hidden" value="4" name="type">
                           <input type="hidden" name="id" value="{{$course_content->id}}">
                        <div class="modal-body">
                            
                                <input type="text" name="title" class="form-control" placeholder="Enter quiz title...">
                            <input type="hidden" name="length" id="infos" value="0"><br />
                                <div class="progress">
                                    <div class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        0%
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-secondary">Update</button> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endisset
            @endisset

@isset($questions)
@foreach ($questions as $question)
<div class="modal fade" id="quiz_question_deleteModal_{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">Confirm deleting question</h5>
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
                        <a href="/lecturer/delete-quiz-question/{{$question->id}}" class="btn btn-secondary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
@endforeach
@endisset

@isset($questions)
@foreach ($questions as $question)
<div class="modal fade" id="exam_quiz_question_deleteModal_{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">Confirm deleting question</h5>
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
                        <a href="/lecturer/exam_delete-quiz-question/{{$question->id}}" class="btn btn-secondary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
@endforeach
@endisset

@isset($exams)
 @foreach($exams as $exam)
<div class="modal fade" id="exam_deleteModal_{{$exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a href="/lecturer/delete-exam/{{$exam->id}}" class="btn btn-secondary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
@endisset

 @isset($assignments)
 @foreach($assignments as $temp)
<div class="modal fade" id="assignment_deleteModal_{{$temp->eid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a href="\lecturer\delete-exam-assignment\{{$temp->eid}}" class="btn btn-secondary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
@endisset


 @isset($quiz)
 @foreach($quiz as $temp)
<div class="modal fade" id="quiz_deleteModal_{{$temp->seid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a href="\lecturer\delete-exam-quiz-list\{{$temp->seid}}" class="btn btn-secondary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
@endisset