	@extends('student.layouts.default')
	@section('title','Online Learning System : KBTC')
	@section('content')
	<!-- ============================================================== -->
	<!-- main wrapper -->
	<!-- ============================================================== -->
	<div class="dashboard-main-wrapper">
		
	   
		<!-- ============================================================== -->
		<!-- wrapper  -->
		<!-- ============================================================== -->
		<div class="dashboard-wrapper">

			
			<div class="container course1">
				<div class="page-header" id="top">
					<h2>Exam</h2>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						
                    @if($flag!=0) 
                        @isset($quiz_mark)
                        <div class="card card-body">
                            <h3><i class="fas fa-question-circle text-info"></i> {{$exam->title}}</h3>
                            <h1>{{($quiz_mark->marks/$no_quiz)*100}}%</h1>
                            <div>
                               <i class="fas fa-check text-success"></i>
                              {{$quiz_mark->marks}} correct answers
                            </div>
                            <div>
                                <i class="fas fa-times text-danger"></i>
                              {{$quiz_mark->marks-$no_quiz}} incorrect answers
                            </div>
                            <div>
                                <i class="fas fa-chart-bar text-primary"></i>
                                {{$quiz_mark->marks}}
                                out of
                                {{$exam->no_quiz}} points
                            </div>

                        </div>
                        <button class="btn btn-success">Complete</button>
                        
                        @endisset
                    @else
                    @isset($quiz)
                    <form method="post" action="{{route('student_answer_exam_quiz')}}" >
                    @csrf
                    <div class=" card">
                    	<h3 style="margin: 20px;"><i class="fas fa-question-circle text-info"></i> {{$exam->title}}</h3>
	                    <ol>
	                        @foreach($quiz as $q)
	                        
	                    
	                        <li class="">
	                            {{$q->question}}

	                            <label class="custom-control custom-radio">
	                                <input type="radio" name="answer_{{$q->eid}}"class="custom-control-input" value="1"><span class="custom-control-label">{{$q->choice_1}}</span>
	                            </label>
	                            <label class="custom-control custom-radio">
	                                <input type="radio" name="answer_{{$q->eid}}" class="custom-control-input" value="2"><span class="custom-control-label">{{$q->choice_2}}</span>
	                            </label>
	                            <label class="custom-control custom-radio">
	                                <input type="radio" name="answer_{{$q->eid}}" class="custom-control-input"value="3" ><span class="custom-control-label">{{$q->choice_3}}</span>
	                            </label>
	                            <label class="custom-control custom-radio">
	                                <input type="radio" name="answer_{{$q->eid}}" class="custom-control-input"  value="4"><span class="custom-control-label">{{$q->choice_4}}</span>
	                            </label>
	                        </li>
	                        <br>
	                        
	                        @endforeach

	                        </ol>
                    </div>
                    
                        <input type="hidden" name="exam_id" value="{{$exam->id}}">
                        <div class="float-right">
                            <input type="submit" name="submit" class="btn btn-success" value="Submit">
                            <input type="reset" name="cancel" class="btn btn-outline-light" value="Cancel">
                        </div>
                        
                    </form>
                    @endisset
                    @endif
					</div>
				</div>
			</div>
		</div>
		@include('student.partials.footer')
	</div>
	<!-- ============================================================== -->
	<!-- end main wrapper  -->
	<!-- ============================================================== -->
	

@endsection