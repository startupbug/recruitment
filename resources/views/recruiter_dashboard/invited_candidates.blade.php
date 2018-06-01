@extends('recruiter_dashboard.layouts.app')
@section('content')

<section class="candidates">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12">
				@if(Session::has('success_msg'))
			    <div class="alert-box success">
			        <h2>{{ Session::get('success_msg') }}</h2>
			    </div>
				@endif
				@if(Session::has('error_msg'))
			    <div class="alert-box success">
			        <h2>{{ Session::get('error_msg') }}</h2>
			    </div>
				@endif
				@if(Session::has('war_msg'))
			    <div class="alert-box success">
			        <h2>{{ Session::get('war_msg') }}</h2>
			    </div>
				@endif
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
							<form action="{{route('invitaion_to_candidate',$host_id)}}" method="post">
								{{csrf_field()}}
								<div class="col-md-4">
									<div class="input-group">
										<input type="hidden" name="host_id" value="{{$host_id}}">
										<input type="text" name="candidate_email" class="form-control" placeholder="Search for candidate Email-id...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button">clear</button>
										</span>
									</div>

								</div>
							
								<div class="col-md-8">
									<div class="message">
										<button type="submit" class="btn">Send Message</button>
							</form>
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
												<th colspan="3">Close At</th>
											</tr>
										</thead>
										<tbody>
											@foreach($invited_candidates as $key => $invited_candidate)
											<tr class="border">
												<td><input type="checkbox" name="email" value="email"><span>{{$key + 1}} </span> {{$invited_candidate->email}}</td>
												<td>{{$hosted_time->test_open_date}}} {{$hosted_time->test_open_time}}</td>
												<td>{{$hosted_time->test_close_date}}} {{$hosted_time->test_close_time}}</td>
												<td></td>
												<td><div class="invite_button"><a href="{{route('delete_invitation',$invited_candidate->id)}}">cancel Invite</a></div></td>
											</tr>
											@endforeach
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

<!--Invited Candidates on send reminder-->
<div class="modal fade" id="duplicatesend-2" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <form action="{{route('send_remainder')}}" method="post">
        	{{csrf_field()}}
	        <div class="modal-content filter fa_evaluate">
	            <div class="modal-header s_modal_form_header">
	                <div class="pull-right">
	                    <button type="submit" class="btn s_save_button s_font" >Send</button>
	                    <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
	                </div>
	                <h3 class="modal-title s_font f_font"><i class="fa fa-copy duplicate_copy"></i>Compose mail</h3>
	            </div>
	            <div class="modal-body s_modal_form_body modal_top modal_duplicate">
	                <div class="row">

	                    <div class="col-md-10">

	                        <div class="form-group title">
	                            <label class="col-md-3 control-label" for="name">Recipients:</label>
	                            <div class="col-md-9">
	                                <h3 class="candidate_view">All Candidates</h3>

	                            </div>
	                        </div>

	                    </div>
	                    <br>
	                    <br>
	                    <input type="hidden" name="host_id" value="{{$host_id}}">
	                    <div class="col-md-10 subject">

	                        <div class="form-group title">
	                            <label class="col-md-3 control-label" for="name">Subject:</label>
	                            <div class="col-md-9">
	                                <div class="template">
	                                	<input id="name" name="subject" type="text" placeholder="Subject of the mail" class="form-control general">
	                                </div>
	                            </div>
	                        </div>

	                    </div>
	                     <div class="col-md-10 subject">

	                        <div class="form-group title message_body">
	                            <label class="col-md-3 control-label" for="name">Body:</label>
	                            <div class="col-md-9">
	                                    <textarea rows="8" name="email_body" cols="112" placeholder="Please add the information that you want to notify to the candidate">Dear candidates,
        	}
	 This is to remind you that the testJava Coding will commence on 02/06/2018 08:42 am and ends on 02/20/2018 08:39 am.
	 We wish you the best of luck.
	                                    </textarea>
	                            </div>
	                        </div>

	                    </div>
	                </div>
	            </div>
	        </div>
    </form>
    </div>
</div>
<!--end-->

@endsection