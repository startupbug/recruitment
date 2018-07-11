$(document).ready(function(){
	$(".tag_update").on('change', 'input', function(){
		var tag_value = $(this).val();
		var tag_id = $(this).attr('tag-id');
		console.log(tag_value);

		$.ajax({
			method: 'post',
			url: base_url+'ajax_tag_post',
			data: {id: tag_id, value: tag_value},
			success: function(data){
				console.log(data)
			},
			error: function(){

			}
		});
	});
});

function functionAddNewTag(){
	console.log(base_url+'recruiter/ajax_tag_post')
	var new_tag_value = $("input[name=newTagValue]").val();
	var tag = '<div class="row form-group"><div class="input-group addon"><input type="text" value="'+new_tag_value+'" class="form-control" disabled tag-id=""><span class="input-group-addon success edit_tag"><i class="fa fa-pencil" aria-hidden="true"></i></span><span class="input-group-addon success edit_delete hidden"><i class="fa fa-close"></i></span><span class="input-group-addon success QuestionTagSetting_delete"><i class="fa fa-times-circle-o"></i></span></div></div>';
	$(".tag_update").append(tag);
	$("input[name=newTagValue]").val("");

	$.ajax({
		method: 'post',
		url: base_url+'recruiter/ajax_tag_post',
		data: {value: new_tag_value},
		success: function (data) { 
	      console.log(data);
	       if(data.status == 200){
	          alertify.success(data.msg);       
	         setTimeout(function(){
	           window.location.reload();
	         }, 2000);

	       }else if(data.status==202){
	          alertify.warning(data.msg)
	       }
    },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
	});
}


//Update Test Template	
$(".QuestionTagSetting").on('click', function(e){
	console.log("asdasdzzzzz"  + $(this).data('id'));
  e.preventDefault();
  //var formData = $(this).serialize();
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
  });
  $.ajax({
    //type: $(this).attr('method'),
    //url: $(this).attr('action'),
    method: 'post',
	url: $(this).data('url'),
    data: {id: $(this).data('id')}, 
             
    success: function (data) { 
      console.log(data);
      if(data.status == 200){
        alertify.success(data.msg);
        $('#createtemplate').modal('hide');
         setTimeout(function(){
           window.location.reload();
         }, 1000);  
            // $('#close_modal_template').trigger('click');          
          }else if(data.status == 202){           
            alertify.warning(data.msg);
          }else{           
            alertify.warning(data.array.errorInfo[2]);
          }       
        },
        error: function (data) {
         alertify.warning("Oops. something went wrong. Please try again");
       },   
     });
});
//Update Test Template