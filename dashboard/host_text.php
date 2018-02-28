<?php require_once '../master/header.php';?>

<section class="view">
	<br>
	<div class="container-fluit padding-15-fluit">
		<div class="row border-row display-table">

			<div class="col-md-2 col-sm-12 col-xs-12 display-table-cell padding-0 nav-background">
				<ul class="nav nav-tabs nav-sidebar">
				 <li class="active"><a data-toggle="pill" href="#basic_detail"><i class="fa fa-th-list nav-icon" aria-hidden="true"></i> Basic Details </a></li>
				 <li>
					 <a data-toggle="pill" href="#section_subject"><i class="fa fa-question-circle nav-icon" aria-hidden="true"></i> Sections</a>
					 <ul class="subtitle_subject">
					 	<li>
							<i class="fa fa-caret-right"></i> English Profici...
							<div class="pull-right">
								<a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
								<a href="#" class=""><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
							</div>
						</li>
 					 	<li>
 							<i class="fa fa-caret-right"></i> English Profici...
 							<div class="pull-right">
 								<a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
 								<a href="#"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
 								<a href="#" class=""><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
 							</div>
 						</li>
 					 	<li>
 							<i class="fa fa-caret-right"></i> English Profici...
 							<div class="pull-right">
 								<a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
 								<a href="#"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
 								<a href="#" class=""><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
 							</div>
 						</li>
 					 	<button type="button" class="btn btn-default" name="button"> + Add Section</button>
					 </ul>
				 </li>
				 <li><a data-toggle="pill" href="#public"><i class="fa fa-cog nav-icon" aria-hidden="true"></i> Settings</a></li>
				 <li><a data-toggle="pill" href="#public"><i class="fa fa-th nav-icon" aria-hidden="true"></i> Public Page View</a></li>
				</ul>
			</div>

			<div class="col-md-10 col-sm-12 col-xs-12 display-table-cell padding-col">
			 <div class="tab-content sidebar-content">
				 <!-- Start basic_detail -->
				 <div id="basic_detail" class="tab-pane fade in active">
					 <div class="col-md-6 col-sm-12 col-xs-12 padding-0">
						 <form class="form-vertical" action="#">
					 		<div class="form-group">
					 			<label class="control-label" for="title">Title <i class="fa fa-info-circle"></i></label>
					 			<div>
					 				<input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
					 			</div>
					 		</div>
					 		<div class="form-group">
					 			<label class="control-label" for="description">Description <i class="fa fa-info-circle"></i></label>
					 			<div>
									<textarea id="s_txt_BD_DescriptionEditor" style="display: none;"></textarea>
					 			</div>
					 		</div>
					 		<div class="form-group">
					 			<label class="control-label" for="instructions">Instructions <i class="fa fa-info-circle"></i></label>
					 			<div>
									<textarea id="s_txt_BD_InstructionsEditor" rows="5" style="display: none;"></textarea>
					 			</div>
					 		</div>

					 	 </form>
					 </div>
					 <div class="col-md-6 col-sm-12 col-xs-12">
						 <div class="panel panel-default">
						   <div class="panel-heading">Preview</div>
						   <div class="panel-body">
								 <h1>Customer Service Test - CodeGround</h1>

								 <br>
								 <h3>Description</h3>
								 <p>This test is hosted via Codeground. Please read the instructions carefully before proceeding.</p>

								 <br>
								 <h3>Instructions</h3>
								 <p>(1) Make sure you have a proper internet connection.</p>

								 <br>
								 <p>(2) If your computer is taking unexpected time to load, it is recommended to reboot the system before you start the test.</p>

								 <br>
								 <p>(3) Once you start the test, it is recommended to pursue it in one go for the complete duration.</p>

						   </div>
						 </div>
				 	 </div>
				 </div>
 			 	 <!-- End basic_detail -->

				 <!-- Start section_subject -->
				 <div id="section_subject" class="tab-pane fade">
					 <div class="col-md-9 col-sm-12 col-xs-12 padding-0">
						 <ul class="nav nav-tabs">
						 	<li class="active"><a data-toggle="pill" href="#sections-multiplechoice">Multiple Choice (10)</a></li>
						 	<li><a data-toggle="pill" href="#sections-coding">Coding (2)</a></li>
						 	<li><a data-toggle="pill" href="#sections-submission">Submission (2)</a></li>
						 	<li class="pull-right"></li>
						 </ul>
						 <div class="tab-content">
						 	<div id="sections-multiplechoice" class="tab-pane fade in active">
						 		<div class="no-more-tables">
						 			<table class="table s_table">
						 				<thead>
						 					<tr>
						 						<th><input type="checkbox"></th>
						 						<th>#</th>
						 						<th>Statement</th>
						 						<th></th>
						 					</tr>
						 				</thead>
						 				<tbody>
						 					<tr>
												<td><input type="checkbox"></td>
						 						<td>1</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
											<tr>
												<td><input type="checkbox"></td>
						 						<td>2</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
											<tr>
												<td><input type="checkbox"></td>
						 						<td>3</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="4">
													<button type="button" class="btn" data-toggle="modal" data-target="#private-mcqs-Modal">
														<i class="fa fa-plus"></i> Add MCQ
													</button>
													<button type="button" class="btn" data-toggle="modal" data-target="#private-mcqs-Modal">
														<i class="fa fa-book"></i> Choose MCQ From Library
													</button>
												</td>
											</tr>
										</tfoot>
						 			</table>
						 		</div>
						 	</div>

						 	<div id="sections-coding" class="tab-pane fade">
								<div class="no-more-tables">
						 			<table class="table s_table">
						 				<thead>
						 					<tr>
						 						<th><input type="checkbox"></th>
						 						<th>#</th>
						 						<th>Statement</th>
						 						<th></th>
						 					</tr>
						 				</thead>
						 				<tbody>
						 					<tr>
												<td><input type="checkbox"></td>
						 						<td>1</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
													<!-- <div class="col-sm-5 position-static" data-ng-init="question.editAllowLang=false" data-ng-hide="question.type===codingquestiontype.DEBUG">
														<div class="pull-right">
															<div class="dropdown question-list">
																<button class="btn btn-sm btn-link dropdown-toggle no-padding" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-ng-click="getAllowedLanguages($index); question.expanded = !question.expanded;">
																	Languages
																	<span class="caret"></span>
																</button>
	 															<div class="dropdown-menu">
																	<div class="dropdown-form" data-ng-click="question.expanded = !question.expanded;">
																		<div class="checkbox all">
																			<label>
																				<input type="checkbox" data-ng-click="toggleAll($index)" data-ng-value="'ALL'" data-ng-checked="isAllSelected($index)" value="ALL" checked="checked"> <strong>ALL</strong>
																			</label>
																		</div>
																		<div class="row">
																			<div class="col-xs-2">
																				<div class="checkbox ng-scope" data-ng-repeat="language in getQuestionAllowedLanguages(question)">
																					<label class="ng-binding">
																						<input type="checkbox" data-ng-click="toggleSelected($parent.$index,language,allowedLanguages)" data-ng-value="language" data-ng-checked="codingQuestions[$parent.$index].allowedLanguages.indexOf(language) != -1" value="JAVA" checked="checked"> JAVA
																					</label>
																				</div>
																				<div class="checkbox ng-scope" data-ng-repeat="language in getQuestionAllowedLanguages(question)">
																					<label class="ng-binding">
																						<input type="checkbox" data-ng-click="toggleSelected($parent.$index,language,allowedLanguages)" data-ng-value="language" data-ng-checked="codingQuestions[$parent.$index].allowedLanguages.indexOf(language) != -1" value="C" checked="checked"> C
																					</label>
																				</div>
																				<div class="checkbox ng-scope" data-ng-repeat="language in getQuestionAllowedLanguages(question)">
																					<label class="ng-binding">
																						<input type="checkbox" data-ng-click="toggleSelected($parent.$index,language,allowedLanguages)" data-ng-value="language" data-ng-checked="codingQuestions[$parent.$index].allowedLanguages.indexOf(language) != -1" value="CPP" checked="checked"> CPP
																					</label>
																				</div>
																			</div>
																		</div>
																	</div>
																	<button class="btn btn-sm btn-info" data-ng-click="updateAllowedLanguages($index, allowedLanguages)">Save</button>
																</div>
															</div>
														</div>
													</div> -->
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
											<tr>
												<td><input type="checkbox"></td>
						 						<td>2</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
											<tr>
												<td><input type="checkbox"></td>
						 						<td>3</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="4">
													<div class="select_combobox col-md-5">
														<div class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
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

													<button type="button" class="btn  col-md-4" data-toggle="modal" data-target="#private-mcqs-Modal">
														<i class="fa fa-book"></i> Choose Coding From Library
													</button>
												</td>
											</tr>
										</tfoot>
						 			</table>
						 		</div>
						 	</div>

						 	<div id="sections-submission" class="tab-pane fade">
								<div class="no-more-tables">
						 			<table class="table s_table">
						 				<thead>
						 					<tr>
						 						<th><input type="checkbox"></th>
						 						<th>#</th>
						 						<th>Statement</th>
						 						<th></th>
						 					</tr>
						 				</thead>
						 				<tbody>
						 					<tr>
												<td><input type="checkbox"></td>
						 						<td>1</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
											<tr>
												<td><input type="checkbox"></td>
						 						<td>2</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
											<tr>
												<td><input type="checkbox"></td>
						 						<td>3</td>
						 						<td class="col-md-10 col-sm-12 col-xs-12">
													<div class="statement">
														<div class="row">
															<div class="single-line-ellipsis">
																<a href="" class="no-underline">Very cool Number</a>
															</div>
														</div>
													</div>
													<div class="description text-muted">
														<div class="row">
															<div class="col-md-4 col-sm-12 col-xs-12">
																<div class="row">
																	<div class="col-xs-6">
																		<span style="text-transform:capitalize;">
																			<i>easy</i>
																		</span>
																	</div>
																	<div class="col-xs-6 no-padding-left">
																		<span class="text-muted">Marks</span>
																		<span class="conjunction">:</span>49
																	</div>
																</div>
															</div>
															<div class="single-line-ellipsis col-md-8 col-sm-12 col-xs-12">
																<span class="text-muted">Tags : </span>
																<span class="question-tags">Programming</span>
															</div>
														</div>
													</div>
												</td>
						 						<td>
						 							<a data-toggle="modal" data-target="#private-mcqs-Modal">
						 								<i class="fa fa-times-circle text-danger"></i>
						 							</a>
						 						</td>
						 					</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="4">
													<button type="button" class="btn" data-toggle="modal" data-target="#private-mcqs-Modal">
														<i class="fa fa-plus"></i> Add MCQ
													</button>
													<button type="button" class="btn" data-toggle="modal" data-target="#private-mcqs-Modal">
														<i class="fa fa-book"></i> Choose MCQ From Library
													</button>
												</td>
											</tr>
										</tfoot>
						 			</table>
						 		</div>
						 	</div>

						 </div>
					 </div>
					 <div class="col-md-3 col-sm-12 col-xs-12 ">
						 <div class="panel panel-default">
							 <div class="panel-heading"><i class="fa fa-th-large"></i> Section Summary</div>
							 <div class="panel-body">
								 <div class="clearfix">
										<div class="row text-center s_small">
											<div class="col-xs-3">
												<small>Easy</small>
												<h4 class="no-margin strong ">6</h4>
											</div>
											<div class="col-xs-3 no-padding">
												<small>Medium</small>
												<h4 class="no-margin strong">5</h4>
											</div>
											<div class="col-xs-3">
												<small>Hard</small>
												<h4 class="no-margin strong">2</h4>
											</div>
											<div class="col-md-3 no-padding" style="border-left: 1px solid #ddd;">
												<small>Total Marks</small>
												<h4 class="no-margin strong">89</h4>
											</div>
										</div>
									</div>
							 </div>
						 </div>
						 <div class="panel panel-default">
							<div class="panel-heading"><i class="fa fa-cog"></i> Section Settings</div>
							<div class="panel-body">
								<form class="form-horizontal text-left">
									<div class="form-group form-group-sm">
										<label class="control-label col-md-8 col-sm-8 col-xs-8">
											Window Proctoring <i class="fa fa-info-circle"></i>
										</label>
										<div class="checkbox no-margin col-md-2 col-sm-2 col-xs-2">
											<input type="checkbox">
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label class="control-label col-md-8 col-sm-8 col-xs-8">
											Question Shuffling
										</label>
										<div class="checkbox no-margin col-md-2 col-sm-2 col-xs-2">
											<input type="checkbox">
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label class="control-label col-md-8 col-sm-8 col-xs-8">Duration (mins)</label>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<input type="number" min="0" class="form-control">
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label class="control-label col-md-8 col-sm-8 col-xs-8">
											<a href="">Advanced Settings</a>
										</label>
									</div>
									<button type="button" class="btn btn-primary btn-sm">Save</button>
								</form>
							</div>
						</div>
					 </div>
 				 </div>

			 </div>
			</div>

		</div>
	</div>
</section>

<?php require_once '../master/footer.php';?>
