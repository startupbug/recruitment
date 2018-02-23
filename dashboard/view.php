
<?php require_once '../master/header.php';?>

<section class="view">

	<div class="container">
	<div class="row">
		<div class="col-md-12">
			 
			<div class="button_view"><span class="glyphicon glyphicon-plus"></span><button type="button" class="btn">Create a Test Template</button></div>
	</div>
	</div>
</div>
</section>

<div class="container">


 <ul class="nav nav-tabs">
   <li class="active"><a data-toggle="pill" href="#home">Test Hosted (1)<i class="fa fa-info-circle"></i></a></li>
   <li><a data-toggle="pill" href="#menu1">Test Templates (6)<i class="fa fa-info-circle"></i></a></li>
  
 </ul>
 <div class="tab-content">
   <div id="home" class="tab-pane fade in active">
   	<i class="fa fa-filter"></i>
    
     <section class="tab_nav">
		
			<div class="row main_tab">
				
				<div class="col-md-6">
					<div class="left_tab">
					<ul>
						<li>Live</li>
						<li>Java Coding(Try)</li>
					</ul>
          

					</div>
				</div>
					<div class="col-md-6">
						<div class="right_tab">
					<ul>
						<li><a href="#">Invite Candidates</a></li>
						<li>Edit</li>
						<li>Report</li>
						<li><div class="dropdown">
										<button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											fnovellino
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<li><a href="invited_candidates.php">View Invited Candidates</a></li>
											<li><a href="#">Preview Test</a></li>
											<li><a href="#">Delete Test</a></li>
											<li role="separator" class="divider"></li>
											<li><a href="#">Setup Manual Evaluation</a></li>
										</ul>
									</div></li>
					</ul>

					</div>

				</div>
			</div>
			<div class="row border_view">
				<div class="col-md-12">
			<p class="view_content">Webcam : required</p>
		</div>

		<div class="col-md-3">

		<table class="table table-bordered">
    <thead>
      <tr>
        <th>Candidate attempts <i class="fa fa-sync"></i></th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span>Candidates attempted</span> 
          <span class="pull-right margin_25">
            <span class="margin_25">:</span>
            1
          </span>
        </td>
      </tr>
      <tr>
        <td>
          <span>Candidates attempting</span>
          <span class="pull-right margin_25">
            <span class="margin_25">:</span>
            0
          </span>
        </td>
      </tr>
      <tr>
        <td>
          <span>Candidates passed</span>
          <span class="pull-right margin_25">
            <span class="margin_25">:</span>
            0
          </span>
        </td>
      </tr>

    </tbody>
  </table>
		</div>
		<div class="col-md-4">

			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Timings</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span>Starts at</span>
          <span class="pull-right margin_23">
            <span class="margin_25">:</span>
            Tue, Feb 6, 8:42 AM, CAST
          </span>
        </td>
      </tr>
      <tr>
        <td><span>Ends at	</span>  
          <span class="pull-right margin_25">
            <span class="margin_25">:</span>
          Tue, Feb 20, 8:39 AM, CAST</span></td>
     
      </tr>
      <tr>
      <td><span>Duration</span>
        <span class="pull-right margin_22">
          <span class="margin_25">:</span>
        1 hour 30 minutes</span></td>
        
      </tr>
      
    </tbody>
  </table>
		</div>
		<div class="col-md-2">

			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Scoring</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><span>Total Score</span>
          <span class="pull-right margin_20">
          <span class="margin_25">:</span>
        132</span>
        </td>
        
        
      </tr>
      <tr>
        <td><span>Cut-off Score</span>
           <span class="pull-right margin_20">
          <span class="margin_25">:</span>
        106</span></td>
        </td>
     
      </tr>
     
      
    </tbody>
  </table>
		</div>
		<div class="col-md-3">
			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Sections</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Section1 	2 Coding / 8 MCQ (90min)</td>
        
        
      </tr>
      
     
      
    </tbody>
  </table>
		</div>

	</div>
		
		
		


	</section>
   </div>
   <div id="menu1" class="tab-pane fade">
     <h3>Menu 1</h3>
     <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
   </div>
   <div id="menu2" class="tab-pane fade">
     <h3>Menu 2</h3>
     <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
   </div>
   <div id="menu3" class="tab-pane fade">
     <h3>Menu 3</h3>
     <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
   </div>
 </div>
</div>







<?php require_once '../master/footer.php';?>