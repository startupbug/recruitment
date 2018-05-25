<?php $base_url = 'http://localhost/recruitment/public/'; ?>
<div class="modal fade" id="create-test-template-Modal" role="dialog">
   <div class="modal-dialog  modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header s_modal_form_header">
            <div class="pull-right">
               <button type="button" class="btn s_save_button s_font" data-dismiss="modal">Create</button>
               <button type="button" class="btn btn-default s_font" data-dismiss="modal">Cancel</button>
            </div>
            <h3 class="modal-title s_font">Create New Test Template</h3>
         </div>
         <div class="modal-body ng-scope" ng-if="!modalObject.isTest">
            <div class="form-group" style="border-bottom: 1px solid #ccc;padding-bottom:5px">
               <div class="row">
                  <div class="col-md-4">
                     <label><i class="fa fa-globe" aria-hidden="true"></i> &nbsp;Browser</label>
                  </div>
                  <div class="col-md-4 ng-binding">
                     Chrome 65
                  </div>
                  <div class="col-md-4">
                     <span class=""><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> &nbsp;Browser supported</span>
                     <span class="ng-hide"><i class="fa fa-close" style="color:red" aria-hidden="true"></i> &nbsp;Browser not supported</span>
                  </div>
               </div>
            </div>
            <div class="form-group" style="border-bottom: 1px solid #ccc;padding-bottom:5px">
               <div class="row">
                  <div class="col-md-4">
                     <label><i class="fa fa-camera" aria-hidden="true"></i> &nbsp;Web Cam</label>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4" style="">
                     <span><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> &nbsp;Device found</span>
                     <span class=""><i class="fa fa-close" style="color:red" aria-hidden="true"></i> &nbsp;Device not found&nbsp; <button class="btn btn-default btn-xs">Retry</button></span>
                  </div>
                  <div class="col-md-4 ng-hide" style="">
                     <!--<img style="height:10px" src="./c_assets/images/loader.gif">-->
                  </div>
               </div>
            </div>
            <div class="form-group" style="border-bottom: 1px solid #ccc;padding-bottom:5px">
               <div class="row">
                  <div class="col-md-4">
                     <label><i class="fa fa-microphone" aria-hidden="true"></i> &nbsp;Microphone</label>
                  </div>
                  <div class="col-md-4">
                     <div id="viz">
                        <canvas style="padding-bottom:10px" id="analyser"></canvas>
                     </div>
                  </div>
                  <div class="col-md-4" style="">
                     <span class="ng-hide"><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> &nbsp;Device found</span>
                     <span class=""><i class="fa fa-close" style="color:red" aria-hidden="true"></i> &nbsp;Device not found&nbsp; <button class="btn btn-default btn-xs">Retry</button></span>
                  </div>
                  <div class="col-md-4 ng-hide" style="">
                     <!--<img style="height:10px" src="./c_assets/images/loader.gif">-->
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                     <label><i class="fa fa-soundcloud" aria-hidden="true"></i> &nbsp;Speaker</label>
                  </div>
                  <div class="col-md-4">
                     <audio style="width:200px" src="./c_assets/audio/speakerCheck.ogg" controls=""></audio>
                     <br>(Play the audio)
                  </div>
                  <div class="col-md-4">
                     You can test your speaker by playing the audio. If you hear the beep, you are good to go.
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <div class="pull-right" style="margin-top:-5px">
               <div ng-hide="modalObject.devicesChecked" class="">
                  <span class="text-info">Checking Devices...</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end-->
<script src="{{ asset('public/bower_components/jquery/dist/jQuery.min.js') }}"></script>
<script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/bower_components/wow/dist/wow.min.js') }}"></script>
<script src="{{ asset('public/bower_components/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('public/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="http://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
<script src="{{ asset('public/assets/plugins/menu/js/jquery.mmenu.all.js') }}"></script>
<script src="{{ asset('public/assets/plugins/menu/js/jquery.mhead.js') }}"></script>
<script src="{{ asset('public/assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.blink.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.localscroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.scrollTo.js') }}"></script>
<script src="{{ asset('public/assets/js/editor.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
<script src="{{ asset('public/assets/js/script.js') }}"></script>
<script src="{{ asset('public/assets/js/asif.js') }}"></script>
<script type="text/javascript">
   $('body').scrollspy({target: "#myScrollspy"})
   $(document).ready(function(){
       $(".dropdown").click(function() {
           $('.dropdown-menu', this).toggleClass('open');
       });
             /*$('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
             $(this).toggleClass('open');
           },
           function() {
             $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
             $(this).toggleClass('open');
           }
       );
   });*/
</script>
<script>
   $(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();   
   });
</script>
<script type="text/javascript">
   // $(document).ready(function(){
   //     $('.sendButton').attr('disabled',true);
   //     $('#message').keyup(function(){
   //         if($(this).val().length !=0)
   //             $('.sendButton').attr('disabled', false);            
   //         else
   //             $('.sendButton').attr('disabled',true);
   //     })
   // });
   
   
   function functionAddTag (id) {
     $('#'+id).toggleClass('hidden');
   }
   
   function functionCloseTag (id) {
     $('#'+id).addClass('hidden');
   }
   
     $('#Currently_studying').change(function() {
         if($(this).is(":checked")) {
   
           $('#to_enddate').addClass('hidden');
           $('#end_month').addClass('hidden');
           $('#end_year').addClass('hidden');
   
           $('#end_month').prop('disabled', true);
           $('#end_year').prop('disabled', true);
         }
         else{
   
           $('#to_enddate').removeClass('hidden');
           $('#end_month').removeClass('hidden');
           $('#end_year').removeClass('hidden');
   
           $('#end_month').prop('disabled', false);
           $('#end_year').prop('disabled', false);
   
   
         }        
     });
   
</script>
</body>
</html>