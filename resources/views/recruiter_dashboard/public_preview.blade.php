@extends('recruiter_dashboard.layouts.app')
@section('content')
<section class="public_preview">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="banner_public">

					<h3 class="public_content">Hosted By : @if(isset($hosted_test)){{$hosted_test->username}}@endif</h3>
					<h3 class="testname">Name : @if(isset($hosted_test->host_name)){{$hosted_test->host_name}}@elseif(isset($hosted_test->title)){{$hosted_test->title}}@endif</h3>
					<div class="test_proceed"><button type="button" class="btn test" class="deleteConfirm" onclick='confirmAlert_test()'>Proceed To Test</button></div>

				</div>
			</div>


		</div>
	</div>

	<div class="container border_public">
		<div class="row f_border_row">
			<div class="col-md-7">
				<div class="blink_me">
					<?php
	                    $todaydate = new DateTime();
	                    $todaydate = $todaydate->format('Y-m-d');
	                    // .0

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
			<div class="col-lg-5 left border-left-dashed f_border_right">
		      <div class="test-time-table">
		         <table class="col-lg-12 table table-bordered f_test_right">
		            <tbody>
		            	@if(isset($hosted_test->host_name))
                        <?php 
                        // dd($hosted_test->test_open_date);
	                        $to_time = date("H:i:s",strtotime($hosted_test->test_open_date));

	                        $from_time = date("H:i:s",strtotime($hosted_test->test_close_date) );

	                        $datetime1 = new DateTime($to_time." ".$hosted_test->test_open_time);
	                        // dd($datetime1);
	                        $datetime2 = new DateTime($from_time." ".$hosted_test->test_close_time);
	                        // dd($datetime2);
	                        $interval = $datetime1->diff($datetime2);
	                        // dd($interval);
                        ?>
                        @endif
		               @if(isset($hosted_test->host_name))
		               <tr>
		                  <th>Starts at</th>
		                  <td>{{ date("F jS, Y H:i", strtotime($hosted_test->test_open_date)) }}</td>
		               </tr>
		               <tr>
		                  <th>Ends at</th>
		                  <td>{{ date("F jS, Y H:i", strtotime($hosted_test->test_close_date)) }}</td>
		               </tr>

		               @endif	
		               <tr>
		                  <th>Duration</th>
		                  <td>
		                  	@if(isset($interval) && isset($hosted_test->host_name))
                  				<?php echo $interval->format('%hh %im');?>
	                  		@elseif(isset($hosted_test->title))
	                  			{{$hosted_test->duration}} minutes
	                  		@endif
		                  </td>
		               </tr>
		            </tbody>
		         </table>
		      </div>
		    </div>
		</div>
	</div>

	<div class="container">
	   <div class="row">
	      <div class="col-md-12">
	      	<div class="tabs_public">
	        	<ul class="nav nav-tabs">
	            	<li><a data-toggle="pill" href="#public_instructions">Instructions</a></li>
	            	<li><a data-toggle="pill" href="#public_description">Description</a></li>
	            	
	            	@foreach($Public_view_page as $key => $value)
                        <li>
                            <a data-toggle="pill" href="#public_page_view{{$value->id}}" >
                                {{$value->page_name}}
                            </a>
                        <li>
                    @endforeach
	        	</ul>
	        	<div class="panel panel-default navtab-body">
	            	<div class="panel-body">
	               		<div class="tab-content sidebar-content">
	                  		<div id="public_instructions" class="tab-pane fade in active">
	                     		<p>
	                     			@if(isset($hosted_test)) 
										{!! $hosted_test->instruction !!}
									@endif
	                     		</p>
	                  		</div>
	                  		<div id="public_description" class="tab-pane fade">
								<p>
									@if(isset($hosted_test))
										{!! $hosted_test->description !!}
									@endif
								</p>
	                  		</div>
	                  		@foreach($Public_view_page as $key => $value)
	                			<div id="public_page_view{{$value->id}}" class="tab-pane fade">
	                    			{{$value->page_detail}}
	                			</div>
             				@endforeach
	               		</div>
	            	</div>
	         	</div>
	     	</div>		
	      </div>
	   </div>
	</div>
</section>
@endsection
