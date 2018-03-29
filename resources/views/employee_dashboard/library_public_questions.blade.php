@extends('employee_dashboard.layouts.app')
@section('content')

<section class="view">
	<br>
	<div class="container-fluid padding-15-fluit">
		<div class="row border-row display-table s_magin-10">

			<div class="col-md-3 col-sm-12 col-xs-12 display-table-cell padding-0 nav-background">
				<ul class="nav nav-tabs nav-sidebar">
				 <li class="active"><a data-toggle="pill" href="#public">Public Questions <i class=""></i></a></li>
				 <li><a data-toggle="pill" href="#private">Private Questions <i class=""></i></a></li>
			 	</ul>
			</div>

			<div class="col-md-9 col-sm-12 col-xs-12 display-table-cell padding-col">
			 <div class="tab-content sidebar-content">
				 <!-- Start Public Question -->
				 <div id="public" class="tab-pane fade in active">
					<ul class="nav nav-tabs">
			 			<li class="active"><a data-toggle="pill" href="#public-mcqs">MCQs (50)</a></li>
			 			<li><a data-toggle="pill" href="#public-programming-question">Programming Questions (2)</a></li>
		 			</ul>
			 		<div class="tab-content">
			 			<div id="public-mcqs" class="tab-pane fade in active">
							<div class="padding-col">
								<form>
							    <div class="form-group col-md-3">
										<select class="form-control radius-0" name="">
											<option value="">All Levels</option>
										</select>
							    </div>
									<div class="form-group col-md-3">
										<select class="form-control radius-0" name="">
											<option value="">All Tag</option>
										</select>
							    </div>
									<div class="button_apply" >
										<button type="button" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal">Advanced Filter</a>
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
							      <tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false">
							        <td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false">
													<span class="fa fa-caret-right"></span>
								          Collapsible Group Item #1
								        </a>
											</td>
							        <td>READY</td>
							        <td>Intermediate</td>
							        <td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
											</td>
											<td> <a data-toggle="modal" data-target="#public-mcqs-Modal"><i class="fa fa-eye"></i></a></td>
							      </tr>
										<tr id="collapse1" class="panel-collapse collapse">
											<td colspan="5">
												<div class="modal-content s_modal">
												 <div class="modal-header s_modal_header">
													 <h4 class="modal-title s_font">Question Statement</h4>
												 </div>
												 <div class="modal-body s_modal_body">
													<p>
														The 'Miscria Champions League' (MCL) is coming soon, and its preparations have already started. ThunderCracker is busy practicing with his team, when suddenly he thinks of an interesting problem.
														ThunderCracker's team consists of 'N' players (including himself). All the players stand in a straight line (numbered from 1 to N), and pass the ball to each other. The maximum power with which any player can hit the ball on the i'th pass is given by an array Ai. This means that if a player at position 'j' (1<=j<=N) has the ball at the time of the i'th pass, he can pass it to any player with a position from <strong>(j-Ai) to (j-1), or from (j+1) to (j+Ai)</strong> (provided that the position exists).
													</p>
													<br>
													<h2>Output :</h2>
													<p class="s_modal_body_heading">
														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
													</p>
												 </div>
											 </div>
					            </td>
										</tr>

										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
							        <td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
													<span class="fa fa-caret-right"></span>
													(1333565) What does the following idiom/ phras...
												</a>
											</td>
							        <td>READY</td>
							        <td>Intermediate</td>
							        <td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
							        </td>
											<td><a data-toggle="modal" data-target="#public-mcqs-Modal"><i class="fa fa-eye"></i></a></td>

							      </tr>
										<tr id="collapse2" class="panel-collapse collapse">
											<td colspan="5">
					               Hidden by default
					            </td>
										</tr>

										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
							        <td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
													<span class="fa fa-caret-right"></span>
													(1333565) What does the following idiom/ phras...
												</a>
											</td>
							        <td>READY</td>
							        <td>Intermediate</td>
							        <td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
							        </td>
											<td><a data-toggle="modal" data-target="#public-mcqs-Modal"><i class="fa fa-eye"></i></a></td>
							      </tr>
										<tr id="collapse3" class="panel-collapse collapse">
											<td colspan="5">
					                <div >Hidden by default</div>
					            </td>
										</tr>
							    </tbody>
							  </table>
							</div>
						</div>

			 			<div id="public-programming-question" class="tab-pane fade">
							<div class="padding-col">
								<form>
									<div class="form-group col-md-3">
										<select class="form-control radius-0" name="">
											<option value="">All Levels</option>
										</select>
									</div>
									<div class="form-group col-md-3">
										<select class="form-control radius-0" name="">
											<option value="">All Tag</option>
										</select>
									</div>
									<div class="button_apply" >
										<button type="button" class="btn">Apply</button>

										<a data-toggle="modal" data-target="#filter-programming-Modal">Advanced Filter</a>
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
										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false">
											<td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false">
													<span class="fa fa-caret-right"></span>
													Collapsible Group Item #1
												</a>
											</td>
											<td>READY</td>
											<td>Intermediate</td>
											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
											</td>
											<td><a data-toggle="modal" data-target="#public-programming-question-Modal"><i class="fa fa-eye"></i></a></td>

										</tr>
										<tr id="collapse4" class="panel-collapse collapse">
											<td colspan="5">
												<div class="modal-content s_modal">
												 <div class="modal-header s_modal_header">
													 <h4 class="modal-title s_font">Question Statement</h4>
												 </div>
												 <div class="modal-body s_modal_body">
													<p>
														The 'Miscria Champions League' (MCL) is coming soon, and its preparations have already started. ThunderCracker is busy practicing with his team, when suddenly he thinks of an interesting problem.
														ThunderCracker's team consists of 'N' players (including himself). All the players stand in a straight line (numbered from 1 to N), and pass the ball to each other. The maximum power with which any player can hit the ball on the i'th pass is given by an array Ai. This means that if a player at position 'j' (1<=j<=N) has the ball at the time of the i'th pass, he can pass it to any player with a position from <strong>(j-Ai) to (j-1), or from (j+1) to (j+Ai)</strong> (provided that the position exists).
													</p>
													<br>
													<h2>Output :</h2>
													<p class="s_modal_body_heading">
														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
													</p>
												 </div>
											 </div>
											</td>
										</tr>

										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
											<td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
													<span class="fa fa-caret-right"></span>
													(1333565) What does the following idiom/ phras...
												</a>
											</td>
											<td>READY</td>
											<td>Intermediate</td>
											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
											</td>
											<td><a data-toggle="modal" data-target="#public-programming-question-Modal"><i class="fa fa-eye"></i></a></td>
										</tr>
										<tr id="collapse5" class="panel-collapse collapse">
											<td colspan="5">
												 Hidden by default
											</td>
										</tr>

										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
											<td>
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
													<span class="fa fa-caret-right"></span>
													(1333565) What does the following idiom/ phras...
												</a>
											</td>
											<td>READY</td>
											<td>Intermediate</td>
											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
											</td>
											<td><a data-toggle="modal" data-target="#public-programming-question-Modal"><i class="fa fa-eye"></i></a></td>
										</tr>
										<tr id="collapse6" class="panel-collapse collapse">
											<td colspan="5">
													<div >Hidden by default</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
			 		</div>
				 </div>
 			 	 <!-- End Public Question -->

				 <!-- Start Private Question -->
				 <div id="private" class="tab-pane fade">
					<ul class="nav nav-tabs">
 			 			<li class="active"><a data-toggle="pill" href="#private-mcqs">MCQs (50)</a></li>
 			 			<li><a data-toggle="pill" href="#private-programming-question">Programming Questions (2)</a></li>
 			 			<li><a data-toggle="pill" href="#private-submission-question">Submission Questions (2)</a></li>
						<li class="pull-right"></li>
 		 			</ul>
					<div class="tab-content">
						<div id="private-mcqs" class="tab-pane fade in active">
							<div class="button_add_question pull-right">
								<button type="button" class="btn" data-toggle="modal" data-target="#private-mcqs-Modal"><i class="fa fa-plus"></i> Add a Question</button>
							</div>
 							<div class="padding-col">
 								<form>
 							    <div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 											<option value="">All Levels</option>
 										</select>
 							    </div>
 									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 											<option value="">All Tag</option>
 										</select>
 							    </div>
 									<div class="button_apply" >
 										<button type="button" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal">Advanced Filter</a>

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
 							      <tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false">
 							        <td>
		 										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false">
		 											<span class="fa fa-caret-right"></span>
 								          Collapsible Group Item #1
 								        </a>
 											</td>
 							        <td>READY</td>
 							        <td>Intermediate</td>
 							        <td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 							        </td>
 											<td>
												<a data-toggle="modal" data-target="#private-mcqs-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 							      </tr>
 										<tr id="collapse11" class="panel-collapse collapse">
 											<td colspan="5">
 												<div class="modal-content s_modal">
 												 <div class="modal-header s_modal_header">
 													 <h4 class="modal-title s_font">Question Statement</h4>
 												 </div>
 												 <div class="modal-body s_modal_body">
 													<p>
 														The 'Miscria Champions League' (MCL) is coming soon, and its preparations have already started. ThunderCracker is busy practicing with his team, when suddenly he thinks of an interesting problem.
 														ThunderCracker's team consists of 'N' players (including himself). All the players stand in a straight line (numbered from 1 to N), and pass the ball to each other. The maximum power with which any player can hit the ball on the i'th pass is given by an array Ai. This means that if a player at position 'j' (1<=j<=N) has the ball at the time of the i'th pass, he can pass it to any player with a position from <strong>(j-Ai) to (j-1), or from (j+1) to (j+Ai)</strong> (provided that the position exists).
 													</p>
 													<br>
 													<h2>Output :</h2>
 													<p class="s_modal_body_heading">
 														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
 													</p>
 												 </div>
 											 </div>
 					            </td>
 										</tr>

 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse12">
 							        <td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse12">
 													<span class="fa fa-caret-right"></span>
 													(1333565) What does the following idiom/ phras...
 												</a>
 											</td>
 							        <td>READY</td>
 							        <td>Intermediate</td>
 							        <td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 							        </td>
 											<td>
												<a data-toggle="modal" data-target="#private-mcqs-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 							      </tr>
 										<tr id="collapse12" class="panel-collapse collapse">
 											<td colspan="5">
 					               Hidden by default
 					            </td>
 										</tr>

 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse13">
 							        <td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse13">
 													<span class="fa fa-caret-right"></span>
 													(1333565) What does the following idiom/ phras...
 												</a>
 											</td>
 							        <td>READY</td>
 							        <td>Intermediate</td>
 							        <td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 							        </td>
 											<td>
												<a data-toggle="modal" data-target="#private-mcqs-Modal">
													<i class="fa fa-pencil"></i>
												</a>
 											</td>
 							      </tr>
 										<tr id="collapse13" class="panel-collapse collapse">
 											<td colspan="5">
 					                <div >Hidden by default</div>
 					            </td>
 										</tr>
 							    </tbody>
 							  </table>
 							</div>
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
 								<form>
 									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 											<option value="">All Levels</option>
 										</select>
 									</div>
 									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 											<option value="">All Tag</option>
 										</select>
 									</div>
 									<div class="button_apply" >
 										<button type="button" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#filter-programming-Modal">Advanced Filter</a>
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
 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false">
 													<span class="fa fa-caret-right"></span>
 													Collapsible Group Item #1
 												</a>
 											</td>
 											<td>READY</td>
 											<td>Intermediate</td>
 											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-programming-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse14" class="panel-collapse collapse">
 											<td colspan="5">
 												<div class="modal-content s_modal">
 												 <div class="modal-header s_modal_header">
 													 <h4 class="modal-title s_font">Question Statement</h4>
 												 </div>
 												 <div class="modal-body s_modal_body">
 													<p>
 														The 'Miscria Champions League' (MCL) is coming soon, and its preparations have already started. ThunderCracker is busy practicing with his team, when suddenly he thinks of an interesting problem.
 														ThunderCracker's team consists of 'N' players (including himself). All the players stand in a straight line (numbered from 1 to N), and pass the ball to each other. The maximum power with which any player can hit the ball on the i'th pass is given by an array Ai. This means that if a player at position 'j' (1<=j<=N) has the ball at the time of the i'th pass, he can pass it to any player with a position from <strong>(j-Ai) to (j-1), or from (j+1) to (j+Ai)</strong> (provided that the position exists).
 													</p>
 													<br>
 													<h2>Output :</h2>
 													<p class="s_modal_body_heading">
 														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
 													</p>
 												 </div>
 											 </div>
 											</td>
 										</tr>

 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse15">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse15">
 													<span class="fa fa-caret-right"></span>
 													(1333565) What does the following idiom/ phras...
 												</a>
 											</td>
 											<td>READY</td>
 											<td>Intermediate</td>
 											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-programming-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse15" class="panel-collapse collapse">
 											<td colspan="5">
 												 Hidden by default
 											</td>
 										</tr>

 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse16">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse16">
 													<span class="fa fa-caret-right"></span>
 													(1333565) What does the following idiom/ phras...
 												</a>
 											</td>
 											<td>READY</td>
 											<td>Intermediate</td>
 											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-programming-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse16" class="panel-collapse collapse">
 											<td colspan="5">
 													<div >Hidden by default</div>
 											</td>
 										</tr>
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
 								<form>
 									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 											<option value="">All Levels</option>
 										</select>
 									</div>
 									<div class="form-group col-md-3">
 										<select class="form-control radius-0" name="">
 											<option value="">All Tag</option>
 										</select>
 									</div>
 									<div class="button_apply" >
 										<button type="button" class="btn">Apply</button>
										<a data-toggle="modal" data-target="#mcqs-filter-Modal">Advanced Filter</a>
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
 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="false">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="false">
 													<span class="fa fa-caret-right"></span>
 													Collapsible Group Item #1
 												</a>
 											</td>
 											<td>READY</td>
 											<td>Intermediate</td>
 											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-submission-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse17" class="panel-collapse collapse">
 											<td colspan="5">
 												<div class="modal-content s_modal">
 												 <div class="modal-header s_modal_header">
 													 <h4 class="modal-title s_font">Question Statement</h4>
 												 </div>
 												 <div class="modal-body s_modal_body">
 													<p>
 														The 'Miscria Champions League' (MCL) is coming soon, and its preparations have already started. ThunderCracker is busy practicing with his team, when suddenly he thinks of an interesting problem.
 														ThunderCracker's team consists of 'N' players (including himself). All the players stand in a straight line (numbered from 1 to N), and pass the ball to each other. The maximum power with which any player can hit the ball on the i'th pass is given by an array Ai. This means that if a player at position 'j' (1<=j<=N) has the ball at the time of the i'th pass, he can pass it to any player with a position from <strong>(j-Ai) to (j-1), or from (j+1) to (j+Ai)</strong> (provided that the position exists).
 													</p>
 													<br>
 													<h2>Output :</h2>
 													<p class="s_modal_body_heading">
 														A single integer, that is the number of ways in which the ball can be passed such that the first pass is made by ThunderCracker, and the ball reaches MunKee after M passes. As the answer can be very large, output it modulo 1000000007.
 													</p>
 												 </div>
 											 </div>
 											</td>
 										</tr>

 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse18">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse18">
 													<span class="fa fa-caret-right"></span>
 													(1333565) What does the following idiom/ phras...
 												</a>
 											</td>
 											<td>READY</td>
 											<td>Intermediate</td>
 											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-submission-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse18" class="panel-collapse collapse">
 											<td colspan="5">
 												 Hidden by default
 											</td>
 										</tr>

 										<tr class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse19">
 											<td>
 												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse19">
 													<span class="fa fa-caret-right"></span>
 													(1333565) What does the following idiom/ phras...
 												</a>
 											</td>
 											<td>READY</td>
 											<td>Intermediate</td>
 											<td>
												<span class="badge">
													<span>Dynamic Programing </span>
												</span>
 											</td>
 											<td>
												<a data-toggle="modal" data-target="#private-submission-question-Modal">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
 										</tr>
 										<tr id="collapse19" class="panel-collapse collapse">
 											<td colspan="5">
 													<div >Hidden by default</div>
 											</td>
 										</tr>
 									</tbody>
 								</table>
 							</div>
 						</div>
 			 		</div>
 				 </div>
			 </div>
			</div>
		</div>
	</div>
</section>
@endsection