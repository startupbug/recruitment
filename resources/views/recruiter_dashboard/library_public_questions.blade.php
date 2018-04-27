@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="view">
	<br>
	<div class="container-fluid padding-15-fluit">
		<div class="row border-row display-table s_magin-10">
			@php $temp_unset=false @endphp
			@if(!isset($templateType_fil))
				@php $temp_unset=true @endphp
			@endif
			<div class="col-md-3 col-sm-12 col-xs-12 display-table-cell padding-0 nav-background">
				<ul class="nav nav-tabs nav-sidebar">
				 <li @if(isset($templateType_fil) && $templateType_fil==1) class="active" @endif ><a data-toggle="pill" href="#public">Public Questions <i class=""></i></a></li>
				 <li @if(isset($templateType_fil) && $templateType_fil==2) class="active" @endif ><a data-toggle="pill" href="#private">Private Questions <i class=""></i></a></li>
			 	</ul>
			</div>

			<div class="col-md-9 col-sm-12 col-xs-12 display-table-cell padding-col">
			 <div class="tab-content sidebar-content">
				 <!-- Start Public Question -->
				 <div id="public" class="tab-pane fade @if(isset($templateType_fil) && $templateType_fil==1) in active @elseif($temp_unset) in active @endif ">
					<ul class="nav nav-tabs">
			 			<li @if(isset($questionType_fil) && $questionType_fil==1) class="active"@elseif(!isset($templateType_fil)) class="active"@endif><a data-toggle="pill" href="#public-mcqs">MCQs ({{isset($public_questions_mcqs) ? $public_questions_mcqs->total() : ''}})</a></li>
			 			<li @if(isset($questionType_fil) && $questionType_fil==2) class="active" @endif><a data-toggle="pill" href="#public-programming-question">Programming Questions ({{isset($public_questions_codings) ? $public_questions_codings->total() : ''}})</a></li>
		 			</ul>
			 		<div class="tab-content">
			 			<div id="public-mcqs" class="tab-pane fade in active">
							<div class="padding-col">
								<form id="libFilterMCQ" action="{{route('libFilter')}}" method="post">
								    <div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="level">
	 											<option value="">All Levels</option>
	 											@foreach($levels as $level)
	 											<option value="{{$level->id}}">{{$level->level_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
										<div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="tag">
	 										    <option value="">All Tag</option>
	 											@foreach($tags as $tag)
	 											<option value="{{$tag->id}}">{{$tag->tag_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
									<div class="button_apply" >
										 <input type="hidden" name="templateType" value="1">
										 <input type="hidden" name="questionType" value="1">
										  <input type="hidden" name="_token" value="{{Session::token()}}">
										<button type="submit" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal" data-temptype="1"data-questype="1" class="adv_filButton">Advanced Filter</a>
									</div>
							    </form>
							</div>
							<div class="no-more-tables">
								<table class="table s_table">
							    <thead>
							      <tr>
							        <th>Question Id & Statement</th>
							        <th>State</th>
							        <th>Level</th>
							        <th>Tags</th>
											<th></th>
							      </tr>
							    </thead>
							    <tbody>
							@if(isset($public_questions_mcqs) && count($public_questions_mcqs) > 0)							    
							    @foreach($public_questions_mcqs as $public_questions_mcq)

							      <tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$public_questions_mcq->id}}" aria-expanded="false">
							        <td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$public_questions_mcq->id}}" aria-expanded="false">
													<span class="fa fa-caret-right"></span>
								          
								          ({{$public_questions_mcq->id}}) {!! substr($public_questions_mcq->question_statement, 0, 35).'...'!!}
								        </a>
											</td>
							        <td>{{$public_questions_mcq->state_name}}</td>
							        <td>{{$public_questions_mcq->level_name}}</td>
							        <td>
											<span class="badge">
												<span>{{$public_questions_mcq->tag_name}} </span>
											</span>
											</td>
											<td> <a data-toggle="modal" data-url="{{route('lib_ques_detail')}}" data-id="{{$public_questions_mcq->id}}" class="quesDetail" data-questype="1" data-target="#public-mcqs-Modal"><i class="fa fa-eye"></i></a></td>
							      </tr>

						      
										<tr id="collapse{{$public_questions_mcq->id}}" class="panel-collapse collapse">
											<td colspan="5">
												<div class="modal-content s_modal">
												 <div class="modal-header s_modal_header">
													 <h4 class="modal-title s_font">Question Statement</h4>
												 </div>
												 <div class="modal-body s_modal_body">
													<p>
													{{$public_questions_mcq->question_statement}}
													</p>

									<!-- 				<br>
													<h2>Output :</h2>
													<p class="s_modal_body_heading">
														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
													</p> -->
												 </div>
											 </div>
					           			 </td>
										</tr>
							    @endforeach
		  					  @else
 								<p>No Questions Found</p>
 							  @endif							    
							    </tbody>
							  </table>
							 
							</div>
							@if(isset($private_questions_submissions))
							 {{ $private_questions_submissions->links() }}
							 @endif
						</div>

			 			<div id="public-programming-question" class="tab-pane fade">
							<div class="padding-col">
								<form id="libFilterMCQ" action="{{route('libFilter')}}" method="post">
									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="123">
 											<option value="">All Levels</option>
 											@foreach($levels as $level)
 											<option value="{{$level->id}}">{{$level->level_name}}</option>
 											@endforeach
 										</select>
									</div>
									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 										    <option value="">All Tag</option>
 											@foreach($tags as $tag)
 											<option value="{{$tag->id}}">{{$tag->tag_name}}</option>
 											@endforeach
 										</select>
									</div>
									<div class="button_apply" >
										 <input type="hidden" name="templateType" value="1">
										 <input type="hidden" name="questionType" value="2">
										  <input type="hidden" name="_token" value="{{Session::token()}}">

										<button type="submit" class="btn">Apply</button>

										<a data-toggle="modal" data-target="#filter-programming-Modal" data-temptype="1" data-questype="2" class="adv_filButton">Advanced Filter</a>
									</div>
								</form>
							</div>
							<div class="no-more-tables">
								<table class="table s_table">
									<thead>
										<tr>
											<th>Question Id & Statement</th>
											<th>State</th>
											<th>Level</th>
											<th>Tags</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
							@if( isset($public_questions_codings) && count($public_questions_codings) > 0 )										
							    @foreach($public_questions_codings as $public_questions_coding)
										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$public_questions_coding->id}}" aria-expanded="false">
											<td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$public_questions_coding->id}}" aria-expanded="false">
													<span class="fa fa-caret-right"></span>
													({{$public_questions_coding->id}}) {!! substr($public_questions_coding->question_statement, 0, 35).'...' !!}
												</a>
											</td>
											<td>{{$public_questions_coding->state_name}}</td>
											<td>{{$public_questions_coding->level_name}}</td>
											<td>
												<span class="badge">
													<span>{{$public_questions_coding->tag_name}} </span>
												</span>
											</td>
											<td><a data-toggle="modal" data-url="{{route('lib_ques_detail')}}" data-id="{{$public_questions_coding->id}}" class="quesDetail" data-questype="2" data-target="#public-programming-question-Modal"><i class="fa fa-eye"></i></a></td>

										</tr>
										<tr id="collapse{{$public_questions_coding->id}}" class="panel-collapse collapse">
											<td colspan="5">
												<div class="modal-content s_modal">
												 <div class="modal-header s_modal_header">
													 <h4 class="modal-title s_font">Question Statement</h4>
												 </div>
												 <div class="modal-body s_modal_body">
													<p>
														{{$public_questions_coding->question_statement}}
													</p>
	
												 </div>
											 </div>
											</td>
										</tr>
							    @endforeach
		  					  @else
 								<p>No Questions Found</p>
 							  @endif							    									
									</tbody>
								</table>
							</div>
							@if(isset($public_questions_codings))
							   {{ $public_questions_codings->links() }}
							@endif
						</div>
			 		</div>
				 </div>
 			 	 <!-- End Public Question -->

				 <!-- Start Private Question -->
				 <div id="private" class="tab-pane fade @if(isset($templateType_fil) && $templateType_fil==2)  active in @endif ">
					<ul class="nav nav-tabs">
 			 			<li @if(isset($questionType_fil) && $questionType_fil==1) class="active"@elseif(!isset($templateType_fil)) class="active"@endif><a data-toggle="pill" href="#private-mcqs">MCQs ({{isset($private_questions_mcqs) ?  count($private_questions_mcqs) : ''}})</a></li>
 			 			<li @if(isset($questionType_fil) && $questionType_fil==2) class="active" @endif><a data-toggle="pill" href="#private-programming-question">Programming Questions ({{isset($private_questions_codings) ? count($private_questions_codings): '' }})</a></li>
 			 			<li @if(isset($questionType_fil) && $questionType_fil==3) class="active" @endif ><a data-toggle="pill" href="#private-submission-question">Submission Questions ({{isset($private_questions_submissions) ? count($private_questions_submissions) : '' }})</a></li>
						<li class="pull-right"></li>
 		 			</ul>
					<div class="tab-content">
						<div id="private-mcqs" class="tab-pane fade in active">
							<div class="button_add_question pull-right">
								<button type="button" class="btn" data-toggle="modal" data-target="#private-mcqs-Modal"><i class="fa fa-plus"></i> Add a Question</button>
							</div>
 							<div class="padding-col">

								<form id="libFilterMCQ" action="{{route('libFilter')}}" method="post">
								    <div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="level">
	 											<option value="">All Levels</option>
	 											@foreach($levels as $level)
	 											<option value="{{$level->id}}">{{$level->level_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
										<div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="tag">
	 										    <option value="">All Tag</option>
	 											@foreach($tags as $tag)
	 											<option value="{{$tag->id}}">{{$tag->tag_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
									<div class="button_apply" >
										 <input type="hidden" name="templateType" value="2">
										 <input type="hidden" name="questionType" value="1">
										  <input type="hidden" name="_token" value="{{Session::token()}}">
										<button type="submit" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal" data-temptype="1"data-questype="1" class="adv_filButton">Advanced Filter</a>
									</div>
							    </form>

 								<!-- <form>
 							    <div class="form-group col-md-3">
 										<select class="form-control radius-0" name="123">
 											<option value="">All Levels</option>
 											@foreach($levels as $level)
 											<option value="{{$level->id}}">{{$level->level_name}}</option>
 											@endforeach
 										</select>
 							    </div>
 									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 											@foreach($tags as $tag)
 											<option value="{{$tag->id}}">{{$tag->tag_name}}</option>
 											@endforeach
 										</select>
 							    </div>
 									<div class="button_apply" >
 										<button type="button" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal">Advanced Filter</a>

 									</div>
 							  </form> -->


 							</div>
 							<div class="no-more-tables">
 								<table class="table s_table">
 							    <thead>
 							      <tr>
 							        <th>Question Id & Statement</th>
 							        <th>State</th>
 							        <th>Level</th>
 							        <th>Tags</th>
 											<th></th>
 							      </tr>
 							    </thead>
 							    <tbody>
							@if(isset($private_questions_mcqs) && count($private_questions_mcqs) > 0)
 							      @foreach($private_questions_mcqs as $private_questions_mcq)

 							      <tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$private_questions_mcq->id}}" aria-expanded="false">
 							        <td>
		 										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$private_questions_mcq->id}}" aria-expanded="false">
		 											<span class="fa fa-caret-right"></span>
								({{$private_questions_mcq->id}}) {!! substr($private_questions_mcq->question_statement, 0, 35).'...'!!} 								          		
 								        </a>
 											</td>
 							        <td>{{$private_questions_mcq->state_name}}</td>
 							        <td>{{$private_questions_mcq->level_name}}</td>
 							        <td>
												<span class="badge">
													<span>{{$private_questions_mcq->tag_name}}</span>
												</span>
 							        </td>
 											<td>
												<a data-toggle="modal" data-target="#private-mcqs-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 							      </tr>
 										<tr id="collapse{{$private_questions_mcq->id}}" class="panel-collapse collapse">
 											<td colspan="5">
 												<div class="modal-content s_modal">
 												 <div class="modal-header s_modal_header">
 													 <h4 class="modal-title s_font">Question Statement</h4>
 												 </div>
 												 <div class="modal-body s_modal_body">
 													{!! $private_questions_mcq->question_statement !!}
 													<br>
 <!-- 													<h2>Output :</h2>
 													<p class="s_modal_body_heading">
 														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
 													</p> -->
 												 </div>
 											 </div>
 					            </td>
 										</tr>

 							      @endforeach
		  					  @else
 								<p>No Questions Found</p>
 							  @endif 								
 							    </tbody>
 							  </table>
 							</div>
 							@if(isset($private_questions_mcqs))
 							{{ $private_questions_mcqs->links() }}
 							@endif
 						</div>

 			 			<div id="private-programming-question" class="tab-pane fade">
							<div class="button_add_question pull-right">
								<div class="open">
									<div class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
										<button class="btn s_dropdown_left_button" data-toggle="modal" data-target="#private-programming-question-Modal" style="right: 39px;">
											<span class="fa fa-plus"></span>
											Add Coding Question
										</button>
										<button class="btn s_dropdown_right_button">
											<span class="caret"></span>
										</button>
									</div>
									<ul class="dropdown-menu s_addquestion_dropdown_menu">
									<li><a data-toggle="modal" data-target="#private-programming-question-Modal">Add Compilable Question</a></li>
									<li><a data-toggle="modal" data-target="#private-programming-debug-Modal">Add Debug Question</a></li>
									</ul>
								</div>
								<!-- <button type="button" class="btn" data-toggle="modal" data-target="#private-programming-question-Modal"><i class="fa fa-plus"></i> Add Coding a Question</button> -->
							</div>
 							<div class="padding-col">
								<form id="libFilterMCQ" action="{{route('libFilter')}}" method="post">
								    <div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="level">
	 											<option value="">All Levels</option>
	 											@foreach($levels as $level)
	 											<option value="{{$level->id}}">{{$level->level_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
										<div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="tag">
	 										    <option value="">All Tag</option>
	 											@foreach($tags as $tag)
	 											<option value="{{$tag->id}}">{{$tag->tag_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
									<div class="button_apply" >
										 <input type="hidden" name="templateType" value="2">
										 <input type="hidden" name="questionType" value="2">
										  <input type="hidden" name="_token" value="{{Session::token()}}">
										<button type="submit" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal" data-temptype="1"data-questype="1" class="adv_filButton">Advanced Filter</a>
									</div>
							    </form>
 							</div>
 							<div class="no-more-tables">
 								<table class="table s_table">
 									<thead>
 										<tr>
 											<th>Question Id & Statement</th>
 											<th>State</th>
 											<th>Level</th>
 											<th>Tags</th>
 											<th></th>
 										</tr>
 									</thead>
 									<tbody>
							@if(isset($private_questions_codings) &&  count($private_questions_codings) > 0) 									
 									@foreach($private_questions_codings as $private_questions_coding)

 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$private_questions_coding->id}}" aria-expanded="false">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$private_questions_coding->id}}" aria-expanded="false">
 													<span class="fa fa-caret-right"></span>
												({{$private_questions_coding->id}}) {!! substr($private_questions_coding->question_statement, 0, 35).'...'!!}

 												</a>
 											</td>
 											<td>{{$private_questions_coding->state_name}}</td>
 											<td>{{$private_questions_coding->level_name}}</td>
 											<td>
												<span class="badge">
													<span>{{$private_questions_coding->tag_name}} </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-programming-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse{{$private_questions_coding->id}}" class="panel-collapse collapse">
 											<td colspan="5">
 												<div class="modal-content s_modal">
 												 <div class="modal-header s_modal_header">
 													 <h4 class="modal-title s_font">Question Statement</h4>
 												 </div>
 												 <div class="modal-body s_modal_body">
 														{!! $private_questions_coding->tag_name!!} 
 													<br>
 													<!-- <h2>Output :</h2>
 													<p class="s_modal_body_heading">
 														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
 													</p> -->
 												 </div>
 											 </div>
 											</td>
 										</tr>
 									@endforeach
		  					  @else
 								<p>No Questions Found</p>
 							  @endif 									
 									</tbody>
 								</table>
 							</div>
 						</div>

						<div id="private-submission-question" class="tab-pane fade">
							<div class="button_add_question pull-right">
								<div class="open">
									<div class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
										<button class="btn s_dropdown_left_button" data-toggle="modal" data-target="#private-submission-question-Modal" style="right: 39px;">
											<span class="fa fa-plus"></span>
											Add Submission Question
										</button>
										<button class="btn s_dropdown_right_button">
											<span class="caret"></span>
										</button>
									</div>
									<ul class="dropdown-menu s_addquestion_dropdown_menu">
									<li><a data-toggle="modal" data-target="#private-submission-question-Modal">Add Submission Question</a></li>
									<li><a data-toggle="modal" data-target="#private-submission-fill-blanks-question-Modal">Add Fill In The Blanks Question</a></li>
									</ul>
								</div>
							</div>
 							<div class="padding-col">
								<form id="libFilterMCQ" action="{{route('libFilter')}}" method="post">
								    <div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="level">
	 											<option value="">All Levels</option>
	 											@foreach($levels as $level)
	 											<option value="{{$level->id}}">{{$level->level_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
										<div class="form-group col-md-3">
	 										<select class="form-control radius-0" name="tag">
	 										    <option value="">All Tag</option>
	 											@foreach($tags as $tag)
	 											<option value="{{$tag->id}}">{{$tag->tag_name}}</option>
	 											@endforeach
	 										</select>
								    </div>
									<div class="button_apply" >
										 <input type="hidden" name="templateType" value="2">
										 <input type="hidden" name="questionType" value="3">
										  <input type="hidden" name="_token" value="{{Session::token()}}">
										<button type="submit" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal" data-temptype="1"data-questype="1" class="adv_filButton">Advanced Filter</a>
									</div>
							    </form>
 							</div>
 							<div class="no-more-tables">
 								<table class="table s_table">
 									<thead>
 										<tr>
 											<th>Question Id & Statement</th>
 											<th>State</th>
 											<th>Level</th>
 											<th>Tags</th>
 											<th></th>
 										</tr>
 									</thead>
 									<tbody>
 									@if(isset($private_questions_submissions) && count($private_questions_submissions) > 0)
 									   @foreach($private_questions_submissions as $private_questions_submission)
										 
										 <tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$private_questions_submission->id}}" aria-expanded="false">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$private_questions_submission->id}}" aria-expanded="false">
 													<span class="fa fa-caret-right"></span>
 													({{$private_questions_submission->id}}) {!! substr($private_questions_submission->question_statement, 0, 35).'...'!!}
 												</a>
 											</td>
 											<td>{{$private_questions_submission->state_name}}</td>
 											<td>{{$private_questions_submission->level_name}}</td>
 											<td>
												<span class="badge">
													<span>{{$private_questions_submission->tag_name}} </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-submission-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse{{$private_questions_submission->id}}" class="panel-collapse collapse">
 											<td colspan="5">
 												<div class="modal-content s_modal">
 												 <div class="modal-header s_modal_header">
 													 <h4 class="modal-title s_font">Question Statement</h4>
 												 </div>
 												 <div class="modal-body s_modal_body">
 													{{$private_questions_submission->question_statement}}
 													<br>
 												<!-- 	<h2>Output :</h2>
 													<p class="s_modal_body_heading">
 														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
 													</p> -->
 												 </div>
 											 </div>
 											</td>
 										</tr>

 									   @endforeach
 									  @else
 									   <p>No Questions Found</p>
 									  @endif
 									</tbody>
 								</table>
 							</div>
 							@if(isset($private_questions_submissions))
 							 {{ $private_questions_submissions->links() }}
                          	@endif
 						</div>
 			 		</div>
 				 </div>
			 </div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="modal_pencil" role="dialog">

   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      
      <!-- HASAN MEHDI NAQVI -->
   	<form action="{{route('update_questions_modal',$get_data->question_id)}}" method="post" enctype="multipart/form-data">
   		{{csrf_field()}}
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <span>Please add atleast 3 characters in the question statement </span>
               <button type="submit" class="btn s_save_button s_font" >Save</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">Submission Question</h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <!-- Question State -->
                  <div class="modal-content s_modal s_blue_color_modal">
                     <div class="modal-header s_modal_header s_blue_color_header">
                        <h4 class="modal-title s_font">Question Statement</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>
                              Question State
                              <div class="s_popup">
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext">
                                 There are three possible states for a question. <br>
                                 (1) Stage (2) Ready (3) Abondoned<br>
                                 Why is it needed: The purpose of the states is to manage the question development cycle.
                                 <br>
                                 Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented.
                                 </span>
                              </div>
                           </strong>
                        </div>
                        <div>
                        
                           <label class="container_radio border_radio_left">STAGE
                           <input type="radio" @if($get_data->question_state_id == 1)  checked="checked" value="1" @endif name="question_state_id" >
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">READY
                           <input type="radio" name="question_state_id" @if($get_data->question_state_id == 2)  checked="checked" value="2" @endif >
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">ABANDONED
                           <input type="radio" name="question_state_id" @if($get_data->question_state_id == 3)  checked="checked" value="3" @endif >
                           <span class="checkmark"></span>
                           </label>
                       
                        </div>
                        <hr>
                        <hr>
                        <div class="heading_modal_statement">
                           <strong>
                              Question Statement (<a href="#">Expand</a>)
                              <div class="s_popup">
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext">
                                 This section provides a markdown editor to write a program statement. <br>
                                 What does it mean: Markdown is a lightweight markup language with plain text formatting syntax:<br>
                                 Learning Refrence:
                                 <br>
                                 http://markdowntutorial.com
                                 <br>
                                 Good to know: The expends link open an expanded view of the editor for a better view of the text while typing/editing.
                                 </span>
                              </div>
                           </strong>
                        </div>
                        <textarea id="s_txtEditor_submission_Add_section_fill_blanks" class="edit" name="question_statement" value="{{$get_data->question_statement}}" >{{$get_data->question_statement}}</textarea>
                        <br>
                     </div>
                  </div>
                  <br>
                  <!-- Media and Resources -->
                  <div class="modal-content s_modal s_green_color_modal">
                     <div class="modal-header s_modal_header s_green_color_header">
                        <h4 class="modal-title s_font">Media and Resources</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="heading_modal_statement heading_padding_bottom">
                           <div class="">
                              <h5><b>Media(Audio/Video)</b></h5>
                              <!--<button type="button" class="btn">Upload Media</button>-->
                              <div class="f_upload_btn">
                                 Upload Media
                                 <input type="file" name="audio_video1" value="{{$get_data->media}}">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!-- Fill In The Blanks Solution Details -->
                  <div class="modal-content s_modal s_yellow_light_color_modal">
                     <div class="modal-header s_modal_header s_yellow_light_green_color_header">
                        <h4 class="modal-title s_font">Fill In The Blanks Solution Details</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <h4>Enter Solutions for the Blanks</h4>
                     </div>
                  </div>
                  <br>
                  <!--  Question Details -->
                  <div class="modal-content s_modal s_gray_color_modal">
                     <div class="modal-header s_modal_header s_gray_color_header">
                        <h4 class="modal-title s_font"> Question Details</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="form-group form-group-sm" >
                           <label>Marks for this Question <i class="fa fa-info-circle"></i></label>
                           <input type="number" name="marks" min="1" class="form-control" required="required" style="" value="{{$get_data->marks}}">
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>
                              Question Level
                              <div class="s_popup">
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext">
                                 Question level determines the standard of the question. supported classification are easy, intermediate and hard.
                                 </span>
                              </div>
                           </strong>
                        </div>
                        <div class="heading_padding_bottom">
                        @if($get_data->question_level_id == 1)
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio" checked="checked" name="question_level" value="1">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="question_level" value="2">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="question_level" value="3">
                           <span class="checkmark"></span>
                           </label>
                        @elseif($get_data->question_level_id == 2)
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio" name="question_level" value="1">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="question_level" checked="checked" value="2">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="question_level" value="3">
                           <span class="checkmark"></span>
                           </label>
                        @elseif($get_data->question_level_id == 3)
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio"  name="question_level" value="1">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="question_level" value="2">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="question_level" checked="checked" value="3">
                           <span class="checkmark"></span>
                           </label>
                        @else
                        	<label class="container_radio border_radio_left">Easy
                            <input type="radio"  name="question_level" value="1">
                            <span class="checkmark"></span>
                            </label>
                            <label class="container_radio">Medium
                            <input type="radio" name="question_level" value="2">
                            <span class="checkmark"></span>
                            </label>
                            <label class="container_radio border_radio_right">Hard
                            <input type="radio" name="question_level" value="3">
                            <span class="checkmark"></span>
                            </label>
                        @endif
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>
                              Tags
                              <div class="s_popup">
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext">
                                 Each question can be associated with multiple tags. <br>
                                 <br>
                                 Why it matters:
                                 <br>
                                 (1) Tags are used in filters while searching through the library.<br>
                                 (2) Tagging is an efficient way of management of library spanning multiple conceptual categories and classification.
                                 </span>
                              </div>
                              No tags added
                           </strong>
                        </div>
                        <div class="form-group-sm">
                           <div class="row">
                              <div class="col-md-3">
                                 <select class="form-control"  name="tag_name">
										<option selected disabled >choose a tag</option>
				                    @foreach($items as $value)
				                    <option value="{{$value->id}}" required>{{$value->tag_name}}</option>
				                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>
                                       Provider
                                       <div class="s_popup">
                                          <i class="fa fa-info-circle"> </i>
                                          <span class="s_popuptext">
                                          This optional field is meant to contain the <br>
                                          organization name that serves as the provider of the question.
                                          </span>
                                       </div>
                                    </strong>
                                 </div>
                                 <input type="text" class="form-control" name="provider" value="{{$get_data->provider}}">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Author </strong>
                                    <div class="s_popup">
                                       <i class="fa fa-info-circle"> </i>
                                       <span class="s_popuptext">
                                       This field is meant to contain the <br>
                                       name of the author of the question.
                                       </span>
                                    </div>
                                 </div>
                                 <input type="text" class="form-control" name="author" value="{{$get_data->author}}">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!--   Evaluation Parameters (Optional) -->
                  <div class="modal-content s_modal s_green_color_modal">
                       <div class="modal-header s_modal_header s_green_color_header">
                          <h4 class="modal-title s_font">Choices</h4>
                       </div>
                       <div class="modal-body s_modal_body">
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>
                                Choices
                                <div class="s_popup">
                                   <i class="fa fa-info-circle"> </i>
                                   <span class="s_popuptext">
                                   Under this section, one can add the <br>
                                   Good to Know: <br>
                                   (1) Multiple choice multiple answer type questions are supported.
                                   <br>
                                   <br>
                                   (2) Choice field's value cannot be empty or a duplicate.
                                   </span>
                                </div>
                             </strong>
                             <strong class="pull-right">
                             <input type="checkbox" name="partial_marks" id="section_partial_marks">
                             Partial marks
                             </strong>
                             <div class="no-more-tables ">
                                <table class="table s_table" id="section_choices_table">
                                   <tbody>
                                   	@php $k = 1 @endphp
                                   	@foreach($choices as $choice)

                                      <tr>
                                         <td valign="center">{{$k}}</td>
                                         <td>
                                            <input type="checkbox" name="answer[]" class="choices_table_checkbox">
                                         </td>
                                         <input type="hidden" name="choice_id[]" value="{{$choice->id}}">
                                         <td class="s_weight" valign="center">
                                            <textarea class="form-control" name="choice[]" required="" value="{{$choice->id}}">{{$choice->choice}}</textarea>
                                         </td>
                                         <td valign="center" class="hidden">
                                            <div class="input-group input-group-sm">
                                               <input type="number" name="partial_marks[]" value="{{$choice->partial_marks}}" class="form-control" width="30px" max="100" min="0" >
                                               <span class="input-group-addon" id="basic-addon1">{{$choice->partial_marks}}%</span>
                                            </div>
                                         </td>
                                         <td valign="center">
                                            <a href="{{route('delete_choice',$choice->id)}}" id="delete_choice" class="delete_row" data-id = "{{$choice->id}}" >
                                            <i class="fa fa-times-circle-o"></i>
                                            </a>
                                         </td>
                                      </tr>
                                      @php $k++ @endphp
                                      @endforeach
                                   </tbody>
                                   <tfoot>
                                      <tr>
                                         <td colspan="5" class="text-align-center">
                                            <button type="button" class="btn btn-add-new btn-block" onclick="template_row_add_choice()"> + Add New Option</button>
                                         </td>
                                      </tr>
                                   </tfoot>
                                </table>
                             </div>
                             <div class="checkbox">
                                <label>
                                <input type="checkbox">Shuffle the options in the test
                                </label>
                             </div>
                          </div>
                       </div>
                    </div>
                  <br>
                  <!--   Evaluation Parameters (Optional) -->
                  <div class="modal-content s_modal s_light_green_color_modal">
                     <div class="modal-header s_modal_header s_light_green_color_header">
                        <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>
                                       Text
                                       <div class="s_popup">
                                          <i class="fa fa-info-circle"> </i>
                                          <span class="s_popuptext">
                                          Provide the solution to the question in text if the question is required to use. <br>
                                          </span>
                                       </div>
                                    </strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutiontext" style="" value="{{isset($solution->text) ?  $solution->text : ''}}">{{isset($solution->text) ?  $solution->text : ''}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>
                                       Code
                                       <div class="s_popup">
                                          <i class="fa fa-info-circle"> </i>
                                          <span class="s_popuptext">
                                          Provide the solution to the question in code if the question is required to use. <br>
                                          </span>
                                       </div>
                                    </strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutioncode" style="" value="{{isset($solution->code) ?  $solution->code: ''}}" >{{isset($solution->code) ?  $solution->code: ''}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>
                                       URL
                                       <div class="s_popup">
                                          <i class="fa fa-info-circle"> </i>
                                          <span class="s_popuptext">
                                          Provide the solution to the question in URL if the question is required to use. <br>
                                          </span>
                                       </div>
                                    </strong>
                                 </div>

                                 <textarea min="0" class="form-control" name="solutionurl" style="" value="{{isset($solution->url) ? $solution->url: ''}}" >{{isset($solution->url) ? $solution->url : ''}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>
                              Files
                              <div class="s_popup">
                                 <i class="fa fa-info-circle"> </i>
                                 <span class="s_popuptext">
                                 Provide the solution to the question in file if the question is required to use. <br>
                                 </span>
                              </div>
                           </strong>
                        </div>
                        <!--<button type="file" class="btn">Upload Files</button>-->
                        <div class="f_upload_btn">
                           Upload Media
                           <input type="file" name="audio_video" value="{{isset($solution->solution_media) ? $solution->solution_media : ''}}" >
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
  	</form>
   </div>
</div>
<div class="modal fade" id="submission_modal1" role="dialog">

   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <span>Please add atleast 3 characters in the question statement </span>
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Save</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">Submission Question123</h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <!-- Question State -->
                  <div class="modal-content s_modal s_blue_color_modal">
                     <div class="modal-header s_modal_header s_blue_color_header">
                        <h4 class="modal-title s_font">Question Statement</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question State <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                        </div>
                        <div>
                           <label class="container_radio border_radio_left">STAGE
                           <input type="radio" checked="checked" name="radio" disabled>
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">READY
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">ABANDONED
                           <input type="radio" name="radio" disabled>
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <hr>
                        <hr>
                        <div class="heading_modal_statement">
                           <strong>Question Statement (<a href="#">Expand</a>) <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                        </div>
                        <textarea class="edit"></textarea>
                        <div class="checkbox">
                           <label>
                           <input type="checkbox"> Enable code modification and show difference
                           </label>
                           <br>
                           <label class="control-label" style="color: #999;">
                           (The candidate will be asked to modify the code and the differences will be shown in the report)
                           </label>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!-- Media and Resources -->
                  <div class="modal-content s_modal s_green_color_modal">
                     <div class="modal-header s_modal_header s_green_color_header">
                        <h4 class="modal-title s_font">Media and Resources</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="heading_modal_statement heading_padding_bottom">
                           <div class="">
                              <h5><b>Media(Audio/Video)</b></h5>
                              <!--<button type="button" class="btn">Upload Media</button>-->
                              <div class="f_upload_btn">
                                 Upload Media
                                 <input type="file" name="">
                              </div>
                           </div>
                           <br>
                           <strong>
                           Resources
                           <i class="fa fa-info-circle"></i>
                           </strong>
                           <label class="control-label">
                           (These resources will be available for the candidate to download during the test)
                           </label>
                           <div class="s_pur_body">
                              <!--<button type="button" class="btn"> + Add resources</button>-->
                              <div class="f_upload_btn">
                                 + Add resources
                                 <input type="file" name="">
                              </div>
                           </div>
                           <hr>
                           <strong>
                           Candidate can use
                           <i class="fa fa-info-circle"></i>
                           </strong>
                           <div class="checkbox">
                              <label><input type="checkbox"> Images</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> URLs</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Files</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Text</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Code</label>
                           </div>
                           <div class="checkbox">
                              <label><input type="checkbox"> Audio</label>
                           </div>
                           <span class="input-group input-group-sm">
                           <span class="input-group-addon s_addon ">Limit</span>
                           <input type="number" class="form-control" min="1" style="height:30px; width:70px;">
                           <span class="input-group-addon s_addon">seconds</span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!--  Question Details -->
                  <div class="modal-content s_modal s_gray_color_modal">
                     <div class="modal-header s_modal_header s_gray_color_header">
                        <h4 class="modal-title s_font"> Question Details</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="form-group form-group-sm" >
                           <label>Marks for this Question <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></label>
                           <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question Level <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                        </div>
                        <div class="heading_padding_bottom">
                           <label class="container_radio border_radio_left">Easy
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Tags <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a> No tags added</strong>
                        </div>
                        <div class="form-group-sm">
                           <div class="row">
                              <div class="col-md-3">
                                 <select class="form-control">
                                    <option value="add Tag" disabled="">Select Tag</option>
                                    <option>algo</option>
                                    <option>basic-programming</option>
                                    <option>database</option>
                                    <option>design</option>
                                    <option>iterative</option>
                                    <option>maths</option>
                                    <option>recursion</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Provider <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Author <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!--   Evaluation Parameters (Optional) -->
                  <div class="modal-content s_modal s_orange_color_modal">
                     <div class="modal-header s_modal_header s_orange_color_header">
                        <h4 class="modal-title s_font">  Evaluation Parameters (Optional)</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="no-more-tables ">
                           <table class="table s_table">
                              <thead>
                                 <th>Tile</th>
                                 <th>Weightage (%)</th>
                                 <th></th>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="s_weight" valign="center">
                                       <div >
                                          <input type="text" class="form-control text-margin" name="title" value="">
                                       </div>
                                    </td>
                                    <td valign="center">
                                       <div class="input-group input-group-sm">
                                          <input type="number" class="form-control" width="30px" max="100" min="0">
                                          <span class="input-group-addon" id="basic-addon1">%</span>
                                       </div>
                                    </td>
                                    <td valign="center">
                                       <button type="button" class="btn">+ Save New</button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!--   Evaluation Parameters (Optional) -->
                  <div class="modal-content s_modal s_light_green_color_modal">
                     <div class="modal-header s_modal_header s_light_green_color_header">
                        <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Text <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Code <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
                                 <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>URL <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                                 </div>
                                 <textarea min="0" class="form-control" name="solutionText" style=""></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Files <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" Provide the solution to the question in text if the question is required to use."> <i class="fa fa-info-circle"> </i></a></strong>
                        </div>
                        <!--<button type="file" class="btn">Upload Files</button>-->
                        <div class="f_upload_btn">
                           Upload Files
                           <input type="file" name="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Coding Full Edit Modal By Fareha -->
<div class="modal fade" id="modal_coding" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
         <form action="" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
         <input type="hidden" name="section_id" id="section_id_2" value="">
         <input type="hidden" name="question_type_id" value="">
         <input type="hidden" name="question_sub_types_id" value="">
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <span>Please add the question title </span>
                    <button type="submit" class="btn s_save_button s_font">Save</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font">Coding Question234</h3>
            </div>
            <div class="modal-body s_modal_form_body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- Question State -->
                        <div class="modal-content s_modal s_blue_color_modal">
                            <div class="modal-header s_modal_header s_blue_color_header">
                                <h4 class="modal-title s_font">Question State</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Question State
                                        <div class="s_popup">

                                          <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" There are three possible states for a question. <br>
                                               (1) Stage (2) Ready (3) Abondoned<br>
                                                Why is it needed: The purpose of the states is to manage the question development cycle.
                                                <br>
                                                Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented."> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              There are three possible states for a question. <br>
                                               (1) Stage (2) Ready (3) Abondoned<br>
                                                Why is it needed: The purpose of the states is to manage the question development cycle.
                                                <br>
                                                Question in the Stage state represents the question which is added partially or completely. Question in the ready state represents a question that has been reviewed and is ready to be used. Question in the abandoned state represents a question which is represented.
                                            </span>-->
                                        </div>
                                    </strong>
                                </div>
                                <div>
                                  <label class="container_radio border_radio_left">STAGE
                                  <input type="radio" name="`" value="1" disabled>
                                  <span class="checkmark"></span>
                                  </label>
                                  <label class="container_radio">READY
                                  <input type="radio" checked="checked" name="question_state_id" value="2">
                                  <span class="checkmark"></span>
                                  </label>
                                  <label class="container_radio border_radio_right">ABANDONED
                                  <input type="radio" name="question_state_id" value="3" disabled>
                                  <span class="checkmark"></span>
                                  </label>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <div class="heading_modal_statement heading_padding_bottom">
                                                <strong>Program Title
                                                    <div class="s_popup">
                                                        <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  This is meant to contain a suitable title <br>
                                                representing the program.<br>
                                               Why it matters: Program title is used for better representation of a coding question to the test taker. <br>
                                               and also serve as a parameter for filters while searching through the library."> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                                This is meant to contain a suitable title <br>
                                                representing the program.<br>
                                               Why it matters: Program title is used for better representation of a coding question to the test taker. <br>
                                               and also serve as a parameter for filters while searching through the library.
                                            </span>-->
                                        </div>
                                                </strong>
                                            </div>
                                            <input type="text" name="coding_program_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="heading_modal_statement">
                                    <strong>Program Statement (<a href="#section-coding-add-compilable-question-Modal-Collapse" data-toggle="modal" onclick="code_edittesttemplate_Collapse()" >Expand</a>)  <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="  This is meant to contain a suitable title <br>
                                                representing the program.<br>
                                               Why it matters: Program title is used for better representation of a coding question to the test taker. <br>
                                               and also serve as a parameter for filters while searching through the library."> <i class="fa fa-info-circle"> </i></a></strong>
                                </div>
                                <textarea class="edit"></textarea>
                                <br>
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Sample Input & Output
                                        <div class="s_popup">
                                           <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               htmlTooltip.modalProgramSamples <br>

                                            </span>-->
                                        </div>
                                    </strong>
                                    <div class="heading_modal_statement heading_padding_bottom">

                                    <div class="no-more-tables ">
                                        <table class="table s_table" id="section_coding_table">
                                            <thead>
                                                <th></th>
                                                <th>Input</th>
                                                <th>Output</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="center">1.</td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="coding_input[]" required=""></textarea>
                                                    </td>
                                                    <td valign="center">
                                                        <textarea class="form-control" name="coding_output[]" required=""></textarea>
                                                    </td>
                                                    <td valign="center">
                                                        <a class="delete_row">
                                                        <i class="fa fa-times-circle-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-align-center">
                                                        <button class="btn" onclick="addrow_section_codingquestion()">+ Add Sample Test Case</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Test Cases -->
                        <div class="modal-content s_modal s_green_color_modal">
                            <div class="modal-header s_modal_header s_green_color_header">
                                <h4 class="modal-title s_font">Test Cases</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <strong>Test Cases
                                         <div class="s_popup">
                                           <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a>
                                            <!--<i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                               htmlTooltip.modalProgramTestcases <br>

                                            </span>-->
                                        </div>
                                    </strong>
                                    <strong class="pull-right">
                                      <input type="checkbox" name="weightage_status" id="weightage_status" value="1" checked>
                                      Equalize Weightage,
                                      <strong class="text-success weightage_blink_success">Total: 100%</strong>
                                      <strong class="text-danger weightage_blink_error hidden">Total: 1001% (&gt; 100%)</strong>
                                    </strong>
                                    <!-- id="weightage_row" -->
                                    <table class="table s_table" id="weightage_code_table">
                                        <thead>
                                            <th></th>
                                            <th class="col-md-2">Name</th>
                                            <th class="col-md-3">Input</th>
                                            <th class="col-md-3">Output</th>
                                            <th class="col-md-4 text-center">Weightage</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <hr>
                                   <button type="button" class="btn" id="weightage_code_add_row">+ Add Test Case as Text</button>
                                   <div class="s_uplosd_btn f_upload_btn">
                                     Upload Test Case Files
                                     <input type="file" name="test_case_file" >
                                   </div>
                                    <a href="#">Test case file format</a>
                                    <div class="checkbox s_margin_0">
                                        <label>
                                        <input type="checkbox" name="test_case_verify">Verify the Test Cases
                                        </label>
                                    </div>
                                    <p>Test Cases should be added/uploaded</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Default Codes -->
                        <!-- <div class="modal-content s_modal s_yellow_color_modal">
                            <div class="modal-header s_modal_header s_yellow_color_header">
                                <h4 class="modal-title s_font">Default Codes</h4>
                            </div>
                            <div class="modal-body s_modal_body">
                                <div class="heading_modal_statement heading_padding_bottom">
                                    <div class="checkbox s_margin_0">
                                        <label>
                                        <input type="checkbox">
                                        <strong>
                                        Add Default Codes for the Question
                                         <div class="s_popup">
                                            <i class="fa fa-info-circle"> </i>
                                            <span class="s_popuptext">
                                              These codes will be provided to the candidate during the test will be the only allowed languages for which the code is provided. <br>

                                            </span>
                                        </div>
                                        <a href="#"> Advanced</a>
                                        </strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <br>
                        <!--  Question Details -->
                        <div class="modal-content s_modal s_gray_color_modal">
                           <div class="modal-header s_modal_header s_gray_color_header">
                              <h4 class="modal-title s_font"> Question Details</h4>
                           </div>
                           <div class="modal-body s_modal_body">
                              <div class="form-group form-group-sm">
                                 <strong>Marks for this Question <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                 <input type="number" name="marks" min="1" class="form-control" required="required" style="">
                              </div>
                              <div class="form-group form-group-sm">
                                 <strong>Allowed languages <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                 <div class="row">
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label class="ng-binding">
                                          <input type="checkbox" name="allowed_languages_id[]" value="1" checked="checked"> JAVA
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label class="ng-binding">
                                          <input type="checkbox" name="allowed_languages_id[]" value="2" checked="checked"> C
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="3" checked="checked"> CPP
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="4" checked="checked"> PYTHON
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="5" checked="checked"> RUBY
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="6" checked="checked"> PHP
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="7" checked="checked"> JAVASCRIPT
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="8" checked="checked"> CSHARP
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <div class="checkbox no-margin">
                                          <label>
                                          <input type="checkbox" name="allowed_languages_id[]" value="9" checked="checked"> R
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="heading_modal_statement heading_padding_bottom">
                                 <strong>Tags <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                              </div>
                              <div class="form-group-sm">
                                 <div class="row">
                                    <div class="col-md-3">
                                       <select name="tag_id" class="form-control">
                                         <option value="add Tag" disabled="">Add Tag</option>
                                          <option value="">Tag One</option>
                                          <option value="">Tag One</option>
                                          <option value="">Tag One</option>
                                          <option value="">Tag One</option>
                                          <option value="">Tag One</option>       
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="heading_modal_statement heading_padding_bottom"><br>
                                 <strong>Question Level <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                              </div>
                              <div class="heading_padding_bottom">
                                 <label class="container_radio border_radio_left">Easy
                                 <input type="radio" checked="checked" value="1" name="question_level_id">
                                 <span class="checkmark"></span>
                                 </label>
                                 <label class="container_radio">Medium
                                 <input type="radio" name="question_level_id" value="2">
                                 <span class="checkmark"></span>
                                 </label>
                                 <label class="container_radio border_radio_right">Hard
                                 <input type="radio" name="question_level_id" value="3">
                                 <span class="checkmark"></span>
                                 </label>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Provider <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <input type="text" name="provider" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group form-group-sm">
                                       <div class="heading_modal_statement heading_padding_bottom">
                                          <strong>Author <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                       </div>
                                       <input type="text" name="author" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                        <!--  Solution Details (Optional) -->
                          <div class="modal-content s_modal s_gray_color_modal">
                       <div class="modal-header s_modal_header s_gray_color_header">
                          <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                       </div>
                       <div class="modal-body s_modal_body">
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Text <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="text" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>Code <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="code" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="row">
                             <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                   <div class="heading_modal_statement heading_padding_bottom">
                                      <strong>URL <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                                   </div>
                                   <textarea min="0" class="form-control" name="url" style=""></textarea>
                                </div>
                             </div>
                          </div>
                          <div class="heading_modal_statement heading_padding_bottom">
                             <strong>Files <a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title=" htmlTooltip.modalProgramSamples <br>"> <i class="fa fa-info-circle"> </i></a></strong>
                          </div>
                          <!--<input type="file" name="solution_media">-->
                           <div class="f_upload_btn">
                                    Upload Files
                                    <input type="file" name="">
                                </div>
                       </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>
<!-- Coding Full Edit Modal By Fareha -->

<div class="modal fade" id="mcqs-filter-Modal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header s_modal_form_header">
                <div class="pull-right">
                    <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Apply</button>
                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
                </div>
                <h3 class="modal-title s_font"><i class="fa fa-filter fa-lg"></i>Filter Criteria</h3>
            </div>
            <div class="modal-body s_modal_form_body">
                <form class="form-horizontal" action="#">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">Question id:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="id" placeholder="Enter question id" name="id"  min="0" max="9999999999999">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">Question Statement:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="statement" placeholder="Enter question statement" name="statement">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tags :</label>
                        <div class="col-sm-9">
                            <select id="tag_multi" multiple="multiple">
                                <option value="1">Aptitude</option>
                                <option value="2">Basic Algebra</option>
                                <option value="3">HTML and CSS</option>
                                <option value="4">JAVA</option>
                                <option value="5">C#</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">State :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Staged
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Ready
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">All
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="statement">State :</label>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Easy
                        </div>
                        <div class="checkbox col-md-2 col-xs-4">
                            <input type="checkbox">EasyIntermediate
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">Hard
                        </div>
                        <div class="checkbox col-sm-2 col-xs-4">
                            <input type="checkbox">All
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="provider">Provider:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="provider" placeholder="Enter provider of question" name="provider">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="author" placeholder="Enter author of question" name="author">
                        </div>
                        <div class="col-sm-9">
                    		<button type="submit" class="btn s_save_button s_font" data-dismiss="modal">Apply</button>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection