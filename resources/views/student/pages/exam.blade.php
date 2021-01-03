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

			
			<div class="container-mobile course1">
				
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="single category">
                            <h3 class="side-title">Exam Category</h3>
                            @isset($cate_count)
                            <ul class="list-unstyled">
                                <li><a href="/student/exam" title=""  class="text-primary">All  <span class="pull-right">{{$cate_count['count']}}</span></a></li>
                                <li><a href="/student/exam/1" title="">Software Engineering <span class="pull-right">{{$cate_count['SE']}}</span></a></li>
                                <li><a href="/student/exam/2" title="">Networking <span class="pull-right">{{$cate_count['Net']}}</span></a></li>
                                <li><a href="/student/exam/3" title="">Cyber Security <span class="pull-right">{{$cate_count['Cyber']}}</span></a></li>

                                <li><a href="/student/exam/4" title="">Embedded System <span class="pull-right">{{$cate_count['Emb']}}</span></a></li>
                                <li><a href="/student/exam/5" title="">Business IT <span class="pull-right">{{$cate_count['Bus']}}</span></a></li>
                                
                                
                            </ul>
                            @endisset
                        </div>
                        <br>
                    </div>
					<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
						<h3>Exam</h3>
						<ul class="list-group">
							@isset($exams)
							@foreach($exams as $exam)
							
							<li class="list-group-item ">
								
								@if($exam->ass!="")

								<span class="fa fa-paperclip"></span>&nbsp;&nbsp;
								<span class="text-primary">{{$exam->title}}</span>
								<span class="text-secondary">({{$exam->subject}})</span>
								<span style="font-weight: bold;">By {{$exam->name}}</span>
								<span>- Assignment</span>
								<span class="social-sales-count text-dark">
									<div class="dd-nodrag btn-group ml-auto">
										
										
									</div>
								</span>
								<a href="{{asset(\App\Http\Controllers\studentController::show_image((string)$exam->ass))}}" class="upload" download=""><span class="fa fa-download text-success"> Download Exam file</span></a>
								@empty($exam->esid)
								<a href="#" class="upload" data-toggle="modal" data-target="#examAssignmentModal_{{$exam->eid}}"><span class="fas fa-upload text-primary"> Upload your file</span> </a>
								@endempty
								@isset($exam->esid)
								<br><br>
									Submitted at <span class="text-primary">{{date('d/m/y  h:i A', strtotime($exam->assignment_url_posted_at))}}</span>
									@endisset
								@elseif($exam->quiz==1)

								<span class="fa fa-file"></span>&nbsp;&nbsp;<a href="/student/exam-quiz/{{$exam->eid}}">
									<span class="text-primary">{{$exam->title}}</span>
									<span class="text-secondary">({{$exam->subject}})</span>
									<span style="font-weight: bold;">By {{$exam->name}}</span>

								<span>- Quiz</span>
								</a>

								<span class="social-sales-count text-dark">

									<div class="dd-nodrag btn-group ml-auto">
										
									</div>
								</span>
								@endif

								<span style="float: right;">
									{{date('d-m-Y', strtotime($exam->date))}}
								</span>
								 
							</li>
							@endforeach
							@endisset  
						 </ul>
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