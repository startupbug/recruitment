<?php require_once '../../master/header.php';?>

<section class="general">
	<div class="container-fluid padding-15-fluit">
		<h3 class="general_main">Settings</h3>
		<div class="row border-row display-table">

			<div class="col-md-3 col-sm-12 col-xs-12 display-table-cell padding-0 nav-background">
				<ul class="nav nav-tabs nav-sidebar">
					<li class="active"><a data-toggle="pill" href="#public"><i class="fa fa-cog"></i>General Settings<i class=""></i></a></li>
					<li><a data-toggle="pill" href="#private"><i class="fa fa-hand-pointer-o"></i>Contact Details <i class=""></i></a></li>

					<li><a data-toggle="pill" href="#completion"><i class="fa fa-envelope" aria-hidden="true"></i>Test Completion Mail<i class=""></i></a></li>

					<!-- <li><a data-toggle="pill" href="#trial"><i class="fa fa-list"></i>Trial Run<i class=""></i></a></li> -->
					<li><a data-toggle="pill" href="#user"><i class="fa fa-users" aria-hidden="true"></i>User Management<i class=""></i></a></li>
					<li><a data-toggle="pill" href="#tags"><i class="fa fa-question-circle" aria-hidden="true"></i>Question Tags<i class=""></i></a></li>
				</ul>
			</div>

			<div class="col-md-9 col-sm-12 col-xs-12 display-table-cell padding-col">
				<div class="tab-content sidebar-content">
					<div id="public" class="tab-pane fade in active">
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">General Setting</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Full Name <i class="fa fa-info-circle"></i></label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Full Name" class="form-control general">
									</div>
								</div>
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Company Logo Image Url <i class="fa fa-info-circle"></i></label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="image (url http://www.url)" class="form-control general">
										<div class="button_general"><button type="button" class="btn">Update</button></div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">Contact Details</div>
							<div class="panel-body">
								<p class="contact_content">These are the contact details for the candidate's reference incase of any query. <i class="fa fa-info-circle"></i></p>
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Email ID </label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="support@codeground.in" class="form-control general color">
										<div class="checkbox"><input type="checkbox" name="vehicle" value="Bike">Make visible to candidate<br></div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="contact">Contact Number</label>
									<div class="col-md-9">
										<input id="contact" name="contact" type="text" placeholder="080-65555814" class="form-control general color">
										<div class="checkbox">
											<input type="checkbox" name="vehicle" value="Bike">Make visible to candidate<br>
										</div>
										<div class="button_general">
											<button type="button" class="btn">Save</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default" id="test">
						<div class="panel-heading setting_gen">Test Completion Mail</div>
						<div class="panel-body">
							<p class="contact_content">An email will be sent to the candidates after completing the test.</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Message </label>
								<div class="col-md-9 test_completion">
									<textarea rows="6" cols="60" placeholder="Your Message">Hi candidateName,
										Your test - < testTitle > has been submitted successfully.
										Thanks,
										Codeground.
									</textarea>
									<br>
									<div class="link"><a href="#">Show Advanced</a></div>
									<div class="button_general"><button type="button" class="btn">Save</button></div>
								</div>
							</div>
						</div>
					</div>
					 <!-- <div class="panel panel-default">
						<div class="panel-heading">Trial Run</div>
						<div class="panel-body">
							<p class="contact_content">Enter email ids for a trial run below (your account will not be charged for these candidates)</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Trial Email Id</label>
								<div class="col-md-9">
									<br>
									<button class="general_buuton_last"><span class="glyphicon glyphicon-plus"></span>Add Candidate Email</button>
									<div class="button_general"><button type="button" class="btn">Update</button></div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="panel panel-default">
						<div class="panel-heading setting_gen">User Management</div>
						<div class="panel-body">
							<p class="contact_content">You can add users and assign roles, which allow them to perform specific operations on your account</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Users</label>
								<div class="col-md-9">
									<div class="role">
										<ul>
											<li>Role</li>
											<li>User Id</li>
										</ul>
									</div>
									<p class="yet">No Roles added yet</p>
									<br><div class="button_general"><button type="button" class="btn"  data-toggle="modal" data-target="#usermanagement"><span class="glyphicon glyphicon-plus"></span>
									Add Role</button></div>
								</div>
							</div>
						</div>
					</div>


					<div class="panel panel-default">
						<div class="panel-heading setting_gen">Question Tags</div>
						<div class="panel-body">
							<p class="contact_content">Repository of tags that are used to tag questions in the library <i class="fa fa-info-circle"></i></p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Tags <i class="fa fa-info-circle"></i></label>
								<div class="col-md-9">
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control" disabled>
											<span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span>
											<span class="input-group-addon success delete_tag"><i class="fa fa-times-circle-o"></i></span>
										</div>
									</div>

									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control" disabled>
											<span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span>
											<span class="input-group-addon success delete_tag"><i class="fa fa-times-circle-o"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control" disabled>
											<span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span>
											<span class="input-group-addon success delete_tag"><i class="fa fa-times-circle-o"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control" disabled>
											<span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span>
											<span class="input-group-addon success delete_tag"><i class="fa fa-times-circle-o"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control" disabled>
											<span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span>
											<span class="input-group-addon success delete_tag"><i class="fa fa-times-circle-o"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control" disabled>
											<span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span>
											<span class="input-group-addon success delete_tag"><i class="fa fa-times-circle-o"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control" disabled>
											<span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span>
											<span class="input-group-addon success delete_tag"><i class="fa fa-times-circle-o"></i></span>
										</div>
									</div>


									<br>
									<div class="button_general_tag" id="s_button_general_tag">
										<button type="button" class="btn " onclick="functionAddTag()">
											<span class="glyphicon glyphicon-plus"></span>Add New Tag
										</button>
									</div>

									<div class="hidden" id="s_add_tag_button">
	                  <div class="col-md-8">
											<input id="name" name="name" type="text" placeholder="Add a tag" class="form-control general">
										</div>
										<div class="col-md-4">
											<button type="button" class="disabled_click" disabled>add</button>
											<button type="button" class="btn cancel_btn_fa" onclick="functionCancelTag()">cancel</button>
										</div>
									</div>

								</div>



							</div>


						</div>
					</div>
					</div>

					<!--Contact-->
					<div id="private" class="tab-pane fade">
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">Contact Details</div>
							<div class="panel-body">
								<p class="contact_content">These are the contact details for the candidate's reference incase of any query. <i class="fa fa-info-circle"></i></p>
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Email ID </label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="support@codeground.in" class="form-control general color">
										<div class="checkbox"><input type="checkbox" name="vehicle" value="Bike">Make visible to candidate<br></div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="contact">Contact Number</label>
									<div class="col-md-9">
										<input id="contact" name="contact" type="text" placeholder="080-65555814" class="form-control general color">
										<div class="checkbox">
											<input type="checkbox" name="vehicle" value="Bike">Make visible to candidate<br>
										</div>
										<div class="button_general">
											<button type="button" class="btn">Save</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
						<div class="panel-heading setting_gen">Test Completion Mail</div>
						<div class="panel-body">
							<p class="contact_content">An email will be sent to the candidates after completing the test.</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Message </label>
								<div class="col-md-9">
									<textarea rows="6" cols="60" placeholder="Your Message">Hi candidateName,
										Your test - < testTitle > has been submitted successfully.
										Thanks,
										Codeground.
									</textarea>
									<br>
									<div class="link"><a href="#">Show Advanced</a></div>
									<div class="button_general"><button type="button" class="btn">Save</button></div>
								</div>
							</div>
						</div>
					</div>
					 <!-- <div class="panel panel-default">
						<div class="panel-heading">Trial Run</div>
						<div class="panel-body">
							<p class="contact_content">Enter email ids for a trial run below (your account will not be charged for these candidates)</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Trial Email Id</label>
								<div class="col-md-9">
									<br>
									<button class="general_buuton_last"><span class="glyphicon glyphicon-plus"></span>Add Candidate Email</button>
									<div class="button_general"><button type="button" class="btn">Update</button></div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="panel panel-default">
						<div class="panel-heading setting_gen">User Management</div>
						<div class="panel-body">
							<p class="contact_content">You can add users and assign roles, which allow them to perform specific operations on your account</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Users</label>
								<div class="col-md-9">
									<div class="role">
										<ul>
											<li>Role</li>
											<li>User Id</li>
										</ul>
									</div>
									<p class="yet">No Roles added yet</p>
									<br><div class="button_general"><button type="button" class="btn"  data-toggle="modal" data-target="#usermanagement"><span class="glyphicon glyphicon-plus"></span>Add Role</button></div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading setting_gen">Question Tags</div>
						<div class="panel-body">
							<p class="contact_content">Repository of tags that are used to tag questions in the library <i class="fa fa-info-circle"></i></p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Tags <i class="fa fa-info-circle"></i></label>
								<div class="col-md-9">
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>

									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>


									<br><div class="button_general_tag"><button type="button" class="btn"><span class="glyphicon glyphicon-plus"></span>Add New Tag</button></div>
								</div>
							</div>
						</div>
					</div>

					</div>





                     <!--Test Completion mail-->
					<div id="completion" class="tab-pane fade">
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">Test Completion Mail</div>
							<div class="panel-body">
								<p class="contact_content">An email will be sent to the candidates after completing the test.</p>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Message </label>
									<div class="col-md-9">
										<textarea rows="6" cols="60" placeholder="Your Message">Hi candidateName,
											Your test - < testTitle > has been submitted successfully.
											Thanks,
											Codeground.
										</textarea>
										<br>
										<div class="link"><a href="#">Show Advanced</a></div>
										<div class="button_general"><button type="button" class="btn">Save</button></div>
									</div>
								</div>
							</div>
						</div>

					<!-- <div class="panel panel-default">
						<div class="panel-heading">Trial Run</div>
						<div class="panel-body">
							<p class="contact_content">Enter email ids for a trial run below (your account will not be charged for these candidates)</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Trial Email Id</label>
								<div class="col-md-9">
									<br>
									<button class="general_buuton_last"><span class="glyphicon glyphicon-plus"></span>Add Candidate Email</button>
									<div class="button_general"><button type="button" class="btn">Update</button></div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="panel panel-default">
						<div class="panel-heading setting_gen">User Management</div>
						<div class="panel-body">
							<p class="contact_content">You can add users and assign roles, which allow them to perform specific operations on your account</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Users</label>
								<div class="col-md-9">
									<div class="role">
										<ul>
											<li>Role</li>
											<li>User Id</li>
										</ul>
									</div>
									<p class="yet">No Roles added yet</p>
									<br><div class="button_general"><button type="button" class="btn"  data-toggle="modal" data-target="#usermanagement"><span class="glyphicon glyphicon-plus"></span>Add Role</button></div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading setting_gen">Question Tags</div>
						<div class="panel-body">
							<p class="contact_content">Repository of tags that are used to tag questions in the library <i class="fa fa-info-circle"></i></p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Tags <i class="fa fa-info-circle"></i></label>
								<div class="col-md-9">
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>

									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>


									<br><div class="button_general_tag"><button type="button" class="btn"><span class="glyphicon glyphicon-plus"></span>Add New Tag</button></div>
								</div>
							</div>
						</div>
					</div>
					</div>






					<!-- <div id="trial" class="tab-pane fade">

						<div class="panel panel-default">
						<div class="panel-heading">Trial Run</div>
						<div class="panel-body">
							<p class="contact_content">Enter email ids for a trial run below (your account will not be charged for these candidates)</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Trial Email Id</label>
								<div class="col-md-9">
									<br>
									<button class="general_buuton_last"><span class="glyphicon glyphicon-plus"></span>Add Candidate Email</button>
									<div class="button_general"><button type="button" class="btn">Update</button></div>
								</div>
							</div>
						</div>
					</div> -->
					<!--<div class="panel panel-default">
						<div class="panel-heading setting_gen">User Management</div>
						<div class="panel-body">
							<p class="contact_content">You can add users and assign roles, which allow them to perform specific operations on your account</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Users</label>
								<div class="col-md-9">
									<div class="role">
										<ul>
											<li>Role</li>
											<li>User Id</li>
										</ul>
									</div>
									<p class="yet">No Roles added yet</p>
									<br><div class="button_general"><button type="button" class="btn"><span class="glyphicon glyphicon-plus"></span>Add Role</button></div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading setting_gen">Question Tags</div>
						<div class="panel-body">
							<p class="contact_content">Repository of tags that are used to tag questions in the library <i class="fa fa-info-circle"></i></p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Tags <i class="fa fa-info-circle"></i></label>
								<div class="col-md-9">
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>

									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>


									<br><div class="button_general_tag"><button type="button" class="btn"><span class="glyphicon glyphicon-plus"></span>Add New Tag</button></div>
								</div>
							</div>
						</div>
					</div>
					</div>-->

					<div id="user" class="tab-pane fade">

						<div class="panel panel-default">
						<div class="panel-heading setting_gen">User Management</div>
						<div class="panel-body">
							<p class="contact_content">You can add users and assign roles, which allow them to perform specific operations on your account</p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Users</label>
								<div class="col-md-9">
									<div class="role">
										<ul>
											<li>Role</li>
											<li>User Id</li>
										</ul>
									</div>
									<p class="yet">No Roles added yet</p>
									<br><div class="button_general"><button type="button" class="btn" data-toggle="modal" data-target="#usermanagement"><span class="glyphicon glyphicon-plus"></span>Add Role</button></div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading setting_gen">Question Tags</div>
						<div class="panel-body">
							<p class="contact_content">Repository of tags that are used to tag questions in the library <i class="fa fa-info-circle"></i></p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Tags <i class="fa fa-info-circle"></i></label>
								<div class="col-md-9">
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>

									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>


									<br><div class="button_general_tag"><button type="button" class="btn"><span class="glyphicon glyphicon-plus"></span>Add New Tag</button></div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div id="tags" class="tab-pane fade">
							<div class="panel panel-default">
						<div class="panel-heading setting_gen">Question Tags</div>
						<div class="panel-body">
							<p class="contact_content">Repository of tags that are used to tag questions in the library <i class="fa fa-info-circle"></i></p>
							<div class="form-group">
								<label class="col-md-3 control-label" for="name">Tags <i class="fa fa-info-circle"></i></label>
								<div class="col-md-9">
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>

									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>
									<div class="row form-group">
										<div class="input-group addon">
											<input type="text" class="form-control">
											<span class="input-group-addon success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											<span class="input-group-addon success"><i class="fa fa-close"></i></span>
										</div>
									</div>


									<br><div class="button_general_tag"><button type="button" class="btn"><span class="glyphicon glyphicon-plus"></span>Add New Tag</button></div>
								</div>
							</div>
						</div>
					</div>
					</div>

				</div>
			</div>

		</div>

	</div>
</section>


<?php require_once '../../master/footer.php';?>
