<?php require_once '../master/header.php';?>
<section class="customer_support">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
			<div class="customer_image"><img src="../assets/img/customer_image.png" class="img-responsive"></div>
				<h3 class="content_customer">
					Your customer support id is 49
				</h3>
				<p class="customer_inner_content">
					For support queries you can email us at <br>support@talentoca.com
				</p>

				<p class="customer_inner_content">
					Good old fashioned phone calls work best for critical cases.  <br>Give us a ring on - 080 655 55 814
				</p>
				<div class="button_history"><button type="button" class="btn" id="send_your_query">Send your query</button></div>
			</div>

			<div class="col-md-6">
				<h3 class="customer_right">
					Need help? Say it here
				</h3>
				  <div class="input_field"><span class="glyphicon glyphicon-user"></span><input type="text"  class="form-control" id="email"></div>
				  <p class="customer_bottom">e.g. :How to host test</p>
			</div>

		</div>
	</div>
</section>

<div class="popUpCont transition300 hidden" id="send_your_query_popup">
   <div class="rightArrow transition300" id="send_your_query_popup_remove"></div>
   <h2>Send Us Your Query</h2>
   <form class="">
      <div class="form-group">
         <label>Title</label>
         <input type="text" class="form-control" name="title" required="">
      </div>
      <div class="form-group">
         <label>Description</label>
         <textarea class="form-control" name="info" rows="7" required=""></textarea>
      </div>
      <div class="form-group">
         <center>
            <button class="btn sendButton transition300">SEND</button>
         </center>
      </div>
   </form>
</div>
<?php require_once '../master/footer.php';?>
