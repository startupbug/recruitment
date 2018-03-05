<?php require_once '../master/header.php';?>
<section class="candidates">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="button_back"><a href="view.php"> <button type="button" class="btn" >Back</button></a>
					<h3 class="java">Java Coding - Manage Invitations</h3>
				</div>

			</div>


			<div class="col-md-12">
				<div class="panel with-nav-tabs panel-default invite_candidate">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1default" data-toggle="tab">Invited Candidates</a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1default">

								<div class="col-md-4">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search for candidate Email-id...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button">clear</button>
										</span>
									</div>

								</div>
								<div class="col-md-8">
									<div class="message"><button type="button" class="btn">Send Message</button>
										<button type="button" class="btn" data-toggle="modal" data-target="#duplicatesend-2">Send Reminder</button>
										<button type="button" class="btn">Change Time</button>
									</div>

								</div>


								<div class="col-md-12">
									<table class="table invited">
										<thead>
											<tr>
												<th> <input type="checkbox" name="email" value="email"><span>#</span>Email<br></th>
												<th>Opens At</th>
												<th>Close At</th>

											</tr>
										</thead>
										<tbody>
											<tr class="border">
												<td><input type="checkbox" name="email" value="email"><span>1 </span> jagjeet.kmr89@gmail.com</td>
												<td>Feb 6, 7:42 PM</td>
												<td>Feb 20, 7:39 PM</td>
												<td></td>
												<td><div class="invite_button"><button type="button" class="btn">cancel Invite</button></div></td>
											</tr>
											<tr>
												<td><input type="checkbox" name="email" value="email"><span>2 </span>  manjeet.kmr18@gmail.com</td>
												<td>Feb 6, 7:42 PM</td>
												<td>Feb 20, 7:39 PM</td>
												<td></td>
												<td><div class="invite_button"><button type="button" class="btn">cancel Invite</button></div></td>
											</tr>
											<tr class="border">
												<td><input type="checkbox" name="email" value="email"><span>3</span>   pacognovellino@gmail.com</td>
												<td>Feb 6, 7:42 PM</td>
												<td>Feb 20, 7:39 PM</td>
												<td><a href="#">View</a><br><a href="#">Resume</a></td>
												<td><div class="invite_button"><button type="button" class="btn">cancel Invite</button></div></td>

											</tr>
										</tbody>
									</table>
								</div>






							</div>

						</div>
						<div class="tab-pane fade" id="tab2default">Default 2</div>
						<div class="tab-pane fade" id="tab3default">Default 3</div>
						<div class="tab-pane fade" id="tab4default">Default 4</div>
						<div class="tab-pane fade" id="tab5default">Default 5</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>



<?php require_once '../master/footer.php';?>
