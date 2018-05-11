@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="public_preview">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="banner_public">

					<h3 class="public_content">Hosted By : @if(isset($hosted_test)){{$hosted_test->username}}@endif</h3>
					<h3 class="testname">Name : @if(isset($hosted_test)){{$hosted_test->host_name}}@endif</h3>
					<div class="test_proceed"><button type="button" class="btn test" class="deleteConfirm" onclick='confirmAlert_test()'>Proceed To Test</button></div>

				</div>
			</div>
			
			
		</div>
	</div>

	<div class="container border_public">
		<div class="row f_border_row">
			<div class="col-md-6 f_border_right">
				<div class="blink_me">
					<?php 
	                    $todaydate = new DateTime();
	                    $todaydate = $todaydate->format('Y-m-d');
	                    //dd( );
					?>
					@if(isset($hosted_test))
					@if( (strtotime($todaydate) == strtotime(date('Y-m-d',strtotime($hosted_test->test_open_date))) )  
					 || ( strtotime($todaydate) < strtotime(date('Y-m-d',strtotime($hosted_test->test_open_date))) ) )
							<h3 class="test_live">LIVE!</h3>
					@else
							<h3 class="test_live">EXPIRED!</h3>
					@endif
					@endif


					<!--<span style="color: green; font-size: 40px; font-weight: bold; text-align:center;"; class="blink_me">TEST IS LIVE</span>-->
				</div>

			</div>
			<div class="col-md-6 f_border_left">
				<table class="table table-bordered f_test_right">
					<thead>
						<tr>
							<th>Starts at</th>
							<th>Ends at</th>													
							<th>Duration</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($hosted_test))
                        <?php 
	                        $to_time = date("H:i:s",strtotime($hosted_test->test_open_date));
	                        $from_time = date("H:i:s",strtotime($hosted_test->test_close_date) );
	                    
	                        $datetime1 = new DateTime($to_time." ".$hosted_test->test_open_time);
	                        $datetime2 = new DateTime($from_time." ".$hosted_test->test_close_time);
	                        $interval = $datetime1->diff($datetime2);
                        ?>
                        @endif
						<tr>
						<td>@if(isset($hosted)){{ date("F jS, Y H:i", strtotime($hosted_test->test_open_date)) }}@endif</td>
						<td>@if(isset($hosted)){{ date("F jS, Y H:i", strtotime($hosted_test->test_close_date)) }}@endif</td>
						<td>@if(isset($interval))<?php echo $interval->format('%hh %im');?>@endif</td>
						</tr>						
						</tr>
					</tbody>
					
				</table>
			</div>

			<!-- Nav tabs -->
			

		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-tabs tabs_public" role="tablist">
					<li role="presentation" class="active"><a href="#instruction" aria-controls="home" role="tab" data-toggle="tab">Instructions</a></li>
					<li role="presentation"><a href="#description" aria-controls="profile" role="tab" data-toggle="tab">Description</a></li>
					
					
				</ul>

				<!-- Tab panes -->
				<div class="tab-content fa_tab">
					<div role="tabpanel" class="tab-pane active" id="instruction">
						<div class="fa_tab_content">
				<!-- 			<p>(1) Make sure you have a proper internet connection.</p>
							<p>(2) If your computer is taking unexpected time to load, it is recommended to reboot the system before you start the test.</p>
							<p>(3) Once you start the test, it is recommended to pursue it in one go for the complete duration.</p> -->-
							@if(isset($hosted)) 
							{!! $hosted_test->instruction !!}
							@endif
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="description">
						<div class="fa_tab_content">
						<p>@if(isset($hosted)){{$hosted_test->description}}@endif</p>
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection