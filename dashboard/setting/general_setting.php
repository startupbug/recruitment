<?php require_once '../../master/header.php';?>


<section class="general">
	<div class="container-fluid padding-15-fluit">
		<h3 class="general_main">Settings</h3>
		<div class="row border-row display-table">

			<div class="col-md-3 col-sm-12 col-xs-12 display-table-cell padding-0 nav-background">
				<ul class="nav nav-tabs nav-sidebar">
					<li><a href="#general1"><i class="fa fa-cog"></i>General Settings<i class=""></i></a></li>
					<li><a href="#contact2"><i class="fa fa-hand-pointer-o"></i>Contact Details <i class=""></i></a></li>
					<li><a href="#completion3"><i class="fa fa-envelope" aria-hidden="true"></i>Test Completion Mail<i class=""></i></a></li>
					<!-- <li><a data-toggle="pill" href="#trial"><i class="fa fa-list"></i>Trial Run<i class=""></i></a></li> -->
					<li><a href="#management4"><i class="fa fa-users" aria-hidden="true"></i>User Management<i class=""></i></a></li>
					<li><a href="#question5"><i class="fa fa-question-circle" aria-hidden="true"></i>Question Tags<i class=""></i></a></li>
				</ul>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 s-over-flow">
					<a class="s_link" name="general1">
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">
								General Setting
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Full Name 
										<div class="s_popup">
											<i class="fa fa-info-circle"> </i>
										  	<span class="s_popuptext">
										  		This is the Account holders name. <br>
										  		Good to Know: <br>
										  		This will be the showcased on the top right corner of the titlebar.
										  	</span>
										</div>
										
									</label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Full Name" class="form-control general">
									</div>
								</div>
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Company Logo Image Url 
										
										<div class="s_popup">
											<i class="fa fa-info-circle"> </i>
										  	<span class="s_popuptext">
										  		Insert the link to the company's logo. <br>
										  		Good to Know: <br>
										  		This logo will be the shown on the upper left corner of the titlebar. and the candidate registration page. <br>
										  		Logo size will be fit to 75px x 50px.
										  	</span>
										</div>


									</label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="image (url http://www.url)" class="form-control general">
										<div class="button_general"><button type="button" class="btn">Update</button></div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a class="s_link" name="contact2">
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">
								Contact Details
							</div>
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
					</a>
					<a class="s_link" name="completion3">
						<div class="panel panel-default" id="test">
							<div class="panel-heading setting_gen">
								Test Completion Mail
							</div>
							<div class="panel-body">
								<p class="contact_content">An email will be sent to the candidates after completing the test.</p>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Message </label>
									<div class="col-md-9 test_completion">
										<textarea rows="6" cols="60" placeholder="Your Message">Hi <candidateName>,
Your test - <testTitle> has been submitted successfully.
Thanks,
Codeground.
											
										</textarea>
										<br>
										<!--<div class="link"><a href="#">Show Advanced</a></div>-->
										<p class="candididate_user">You can use tags such as candidateName and testTitle to represent candidate name and test title respectively.</p>
										<p class="candididate_user">For example:Hi candidateName,Your test - testTitle has been submitted successfully.</testTitle>
										<div class="button_general"><button type="button" class="btn">Save</button></div>
									</div>
								</div>
							</div>
						</div>
					</a>
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
					<a class="s_link" name="management4">
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">
								User Management
							</div>
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
					</a>
					<a class="s_link" name="question5">
						<div class="panel panel-default">
							<div class="panel-heading setting_gen">
								Question Tags
							</div>
							<div class="panel-body">
								<p class="contact_content">Repository of tags that are used to tag questions in the library <div class="s_popup">
											<i class="fa fa-info-circle"> </i>
										  	<span class="s_popuptext">
										  		This is the Account holders name. <br>
										  		Good to Know: <br>
										  		This will be the showcased on the top right corner of the titlebar.
										  	</span>
										</div>

								</p>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Tags 
										<div class="s_popup">
											<i class="fa fa-info-circle"> </i>
										  	<span class="s_popuptext">
										  		This is the Account holders name. <br>
										  		Good to Know: <br>
										  		This will be the showcased on the top right corner of the titlebar.
										  	</span>
										</div>
									</label>
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
		                  <div class="col-md-8 cancel_add">
												<input id="name" name="name" type="text" placeholder="Add a tag" class="form-control general add_last">
											</div>
											<div class="col-md-4">
												<button type="button" class="btn add">add</button>
												<button type="button" class="btn cancel_btn_fa" onclick="functionCancelTag()">cancel</button>
											</div>
										</div>

									</div>



								</div>


							</div>
						</div>
					</a>
			</div>

		</div>

	</div>
</section>


<?php require_once '../../master/footer.php';?>
