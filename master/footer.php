</div>
<!-- private-mcqs-Modal -->
<div class="modal fade" id="private-mcqs-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Save</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Close</button>
            </div>
            <h3 class="modal-title s_font">Multiple Choice Question</h3>
         </div>
         <div class="modal-body s_modal_form_body">
            <div class="row">
               <div class="col-md-10 col-md-offset-1">
                  <!-- Question Statement -->
                  <div class="modal-content s_modal s_blue_color_modal">
                     <div class="modal-header s_modal_header s_blue_color_header">
                        <h4 class="modal-title s_font">Question Statement</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question State <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div>
                           <label class="container_radio border_radio_left">STAGE
                           <input type="radio" checked="checked" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">READY
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">ABANDONED
                           <input type="radio" name="radio">
                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <hr>
                        <div class="heading_modal_statement">
                           <strong>Question Statement (<a href="#">Expand</a>) <i class="fa fa-info-circle"></i></strong>
                           <span>Please add atleast 3 characters in the statement</span>
                        </div>
                        <textarea id="s_txtEditor"></textarea>
                        <h1>Media(Audio/Video)</h1>
                        <button type="button" class="btn">Upload Media</button>
                     </div>
                  </div>
                  <br>
                  <!-- Choices -->
                  <div class="modal-content s_modal s_green_color_modal">
                     <div class="modal-header s_modal_header s_green_color_header">
                        <h4 class="modal-title s_font">Choices</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question State <i class="fa fa-info-circle"></i></strong>
                           <strong class="pull-right">
	                           <input type="checkbox" name="" value="">
	                           Partial marks
                           </strong>
                           <div class="no-more-tables ">
                              <table class="table s_table">
                                 <tbody>
                                    <tr>
                                       <td valign="center">1.</td>
                                       <td class="s_weight" valign="center">
                                          <textarea class="form-control" name="option" required=""></textarea>
                                       </td>
                                       <td valign="center">
                                          <div class="input-group input-group-sm">
                                             <input type="number" class="form-control" width="30px" max="100" min="0" >
                                             <span class="input-group-addon" id="basic-addon1">%</span>
                                          </div>
                                       </td>
                                       <td valign="center">
                                          <a href="">
                                          <i class="fa fa-times-circle-o"></i>
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td valign="center">1.</td>
                                       <td class="s_weight" valign="center">
                                          <textarea class="form-control" name="option" required=""></textarea>
                                       </td>
                                       <td valign="center">
                                          <div class="input-group input-group-sm">
                                             <input type="number" class="form-control" width="30px" max="100" min="0" >
                                             <span class="input-group-addon" id="basic-addon1">%</span>
                                          </div>
                                       </td>
                                       <td valign="center">
                                          <a href="">
                                          <i class="fa fa-times-circle-o"></i>
                                          </a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td valign="center">1.</td>
                                       <td class="s_weight" valign="center">
                                          <textarea class="form-control" name="option" required=""></textarea>
                                       </td>
                                       <td valign="center">
                                          <div class="input-group input-group-sm">
                                             <input type="number" class="form-control" width="30px" max="100" min="0" >
                                             <span class="input-group-addon" id="basic-addon1">%</span>
                                          </div>
                                       </td>
                                       <td valign="center">
                                          <a href="">
                                          <i class="fa fa-times-circle-o"></i>
                                          </a>
                                       </td>
                                    </tr>
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td colspan="5" class="text-align-center">
                                          <button class="btn btn-add-new btn-block"> + Add New Option</button>
                                       </td>
                                    </tr>
                                 </tfoot>
                              </table>
                           </div>
                           <div class="checkbox">
                              <label>
                              <input type="checkbox">Shuffle the options in the test
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!-- Question Details -->
                  <div class="modal-content s_modal s_yellow_color_modal">
                     <div class="modal-header s_modal_header s_yellow_color_header">
                        <h4 class="modal-title s_font">Question Details</h4>
                     </div>
                     <div class="modal-body s_modal_body">
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question State <i class="fa fa-info-circle"></i> No tags added</strong>
                        </div>
                        <div class="form-group-sm">
                           <div class="row">
                              <div class="col-md-3">
                                 <select class="form-control">
                                    <option value="add Tag" disabled="">Add Tag</option>
                                    <option>algo</option>
                                    <option>basic-programming</option>
                                    <option>database</option>
                                    <option>design</option>
                                    <option>iterative</option>
                                    <option>maths</option>
                                    <option>recursion</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="heading_modal_statement heading_padding_bottom">
                           <strong>Question Level <i class="fa fa-info-circle"></i></strong>
                        </div>
                        <div class="heading_padding_bottom">
                           <label class="container_radio border_radio_left">Easy
	                           <input type="radio" checked="checked" name="radio">
	                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio">Medium
	                           <input type="radio" name="radio">
	                           <span class="checkmark"></span>
                           </label>
                           <label class="container_radio border_radio_right">Hard
	                           <input type="radio" name="radio">
	                           <span class="checkmark"></span>
                           </label>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
																 <div class="heading_modal_statement heading_padding_bottom">
																	 <strong>Provider <i class="fa fa-info-circle"></i></strong>
																 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="form-group form-group-sm">
																 <div class="heading_modal_statement heading_padding_bottom">
																		<strong>Author <i class="fa fa-info-circle"></i></strong>
																 </div>
                                 <input type="text" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <!--  Solution Details (Optional) -->
                  <div class="modal-content s_modal s_gray_color_modal">
                     <div class="modal-header s_modal_header s_gray_color_header">
                        <h4 class="modal-title s_font"> Solution Details (Optional)</h4>
                     </div>
                     <div class="modal-body s_modal_body">
											 <div class="row">
													<div class="col-md-3 col-sm-12 col-xs-12">
														 <div class="form-group form-group-sm">
																<div class="heading_modal_statement heading_padding_bottom">
																	<strong>Text <i class="fa fa-info-circle"></i></strong>
																</div>
																<textarea min="0" class="form-control" name="solutionText" style=""></textarea>
														</div>
													</div>
											 </div>
											 <div class="row">
													<div class="col-md-3 col-sm-12 col-xs-12">
														 <div class="form-group form-group-sm">
																<div class="heading_modal_statement heading_padding_bottom">
																	<strong>Code <i class="fa fa-info-circle"></i></strong>
																</div>
																<textarea min="0" class="form-control" name="solutionText" style=""></textarea>
														</div>
													</div>
											 </div>
											 <div class="row">
													<div class="col-md-3 col-sm-12 col-xs-12">
														 <div class="form-group form-group-sm">
																<div class="heading_modal_statement heading_padding_bottom">
																	<strong>URL <i class="fa fa-info-circle"></i></strong>
																</div>
																<textarea min="0" class="form-control" name="solutionText" style=""></textarea>
														</div>
													</div>
											 </div>
											 <div class="heading_modal_statement heading_padding_bottom">
											 	<strong>Files <i class="fa fa-info-circle"></i></strong>
											 </div>
											 <button type="file" class="btn">Upload Files</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?php echo $base_url;?>/assets/bower_components/jquery/dist/jQuery.min.js"></script>
<script src="<?php echo $base_url;?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url;?>/assets/bower_components/wow/dist/wow.min.js"></script>
<script src="<?php echo $base_url;?>/assets/bower_components/masonry-layout/dist/masonry.pkgd.min.js"></script>
<script src="<?php echo $base_url;?>/assets/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo $base_url;?>/assets/bower_components/alertify/alertify.min.js"></script>
<script src="<?php echo $base_url;?>/assets/plugins/menu/js/jquery.mmenu.all.js"></script>
<script src="<?php echo $base_url;?>/assets/plugins/menu/js/jquery.mhead.js"></script>
<script src="<?php echo $base_url;?>/assets/js/editor.js"></script>
<script src="<?php echo $base_url;?>/assets/js/custom.js"></script>
<script type="text/javascript">
	$('body').scrollspy({target: "#myScrollspy"})
	$(document).ready(function(){
		$(".dropdown").hover(
			function() {
				$('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
				$(this).toggleClass('open');
			},
			function() {
				$('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
				$(this).toggleClass('open');
			}
			);
	});
</script>
</body>
</html>
