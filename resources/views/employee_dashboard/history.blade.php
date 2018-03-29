@extends('employee_dashboard.layouts.app')
@section('content')
<section class="history">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-3 col-sm-8">
				<input id="searchinput" name="searchinput" type="search" placeholder="Name or Email-id" class="form-control input-md">
			</div>

			<div class="col-md-3 col-sm-4">
				<div class="header-search_history">
					<div class="icon-addon addon-md">
						<input type="text" placeholder="SEARCH" class="form-control input-search" id="text">
						<label for="text" class="glyphicon glyphicon-search" rel="tooltip" title="text"></label>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-3 col-sm-8">
				<p class="content_history">(Name or email-id separated by comma)</p>
			</div>

					
		</div>
	</div>


</section>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="history_last">Search for candidates by name or email to view assessment history</h3>
		</div>
	</div>
</div>
@endsection