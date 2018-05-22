@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="test_question">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="caution"><span>Caution!</span> Please do not move away from the window or refresh. You may be marked as suspicious</p>
			</div>
		</div>
	</div>
	<div class="container border_question">
		<div class="row">
			<div class="col-md-1">
				<h3 class="side_caution">English Proficiency</h3>
			</div>
			<div class="col-md-9">
				<ul class="pagination question">
					<li><a href="#">«</a></li>
					<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">»</a></li>
				</ul>
			</div>
			<div class="col-md-12 border_content">
				<div class="row">
					<div class="col-md-8">
						<h3 class="question_mark">Question No. 1 of 10 <span>|4 Marks</span></h3>
					</div>
					<div class="col-md-4">
						<div class="button_mark">
							<button type="button" class="btn">
								<i class="glyphicon glyphicon-pushpin"></i><h5 style="margin: 0; margin-left:  19px;"> Flag For Review</h5></button></div>
							</div>
						</div>
					</div>

					<div class="col-md-5">
						<p class="discription_test"><em>You are provided with two definitions and options,choose the correct option which fits the discription best.</em></p>
						<p class="last_test"><strong>work with another  -------------</strong></p>

						<p class="last_test"><strong>work with another  -------------</strong></p>
					</div>
					<div class="col-md-7 ">
						<div class="panel panel-default test_panel">
							<div class="panel-body"><div class="radio">
								<label><input type="radio" name="optradio">collaborate,collaborate</label>
							</div></div>
						</div>

						<div class="panel panel-default test_panel">
							<div class="panel-body"><div class="radio">
								<label><input type="radio" name="optradio">collaborate,collaborate</label>
							</div></div>
						</div>
						<div class="panel panel-default test_panel">
							<div class="panel-body"><div class="radio">
								<label><input type="radio" name="optradio">collaborate,collaborate</label>
							</div></div>
						</div>
						<div class="panel panel-default test_panel">
							<div class="panel-body"><div class="radio">
								<label><input type="radio" name="optradio">collaborate,collaborate</label>
							</div></div>
						</div>
						<div class="button_question"><button type="button" class="btn">Next Question</button>
							<button type="button" class="btn">Clear Answer</button>
						</div>

					</div>
				</div>
			</div>
		</section>
		@endsection
