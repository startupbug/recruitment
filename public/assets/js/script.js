$(document).ready(function(){


});


function confirmAlert(){
	alertify.confirm('Are You Sure ?', 'You are about to delete this template permanently and you cannot undo this action.', function(){ 
			alertify.success('Ok') 
		}, function(){ alertify.error('Cancel')});
}

function confirmAlert_test(){
	alertify.confirm('Hello !! This is preview', function(){ 
			alertify.success('Ok') 
		}, );
}

//Update Test Template
$("#update_test_template").on('submit', function(e){
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });
      $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,                  
        success: function (data) { 
          console.log(data);
          if(data.array == 1){
            alertify.success('Your Data Has Been Successfully Updated');            
        }else if(data.array == 0){           
          alertify.warning('Something Went Wrong, Please Try Again!');
         }else{           
          alertify.warning(data.array.errorInfo[2]);
         }       
       },
       error: function (data) {
        alertify.warning("Oops. something went wrong. Please try again");
  }
    });
    });
//Update Test Template

//Duplicate Test Template
$("#create_duplicate_template_post").on('submit', function(e){
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });
      $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,                  
        success: function (data) { 
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#createtemplate').modal('hide');  
            // $('#close_modal_template').trigger('click');          
        }else if(data.status == 202){           
          alertify.warning(data.msg);
         }else{           
          alertify.warning(data.array.errorInfo[2]);
         }       
       },
       error: function (data) {
         alertify.warning("Oops. something went wrong. Please try again");
  }
    });
  });
//Duplicate Test Template
 function section_id(id) {
    console.log(id);
    $('#section_id').val(id);
  }

//Adding Section
$("#add_section").on('submit', function(e){  
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });
      $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,                  
        success: function (data) { 
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);                
            setTimeout(function(){
               window.location.reload(1);
            }, 1000);
          }else if(data.status == 202){           
            alertify.warning(data.msg);
          }else{           
            alertify.warning(data.array.errorInfo[2]);
          }       
       },
       error: function (data) {
         alertify.warning("Oops. something went wrong. Please try again");
  }
    });
  });
//Adding Section

//Deleting Question
$("#delete_question").on('click', function(e){  
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
      });
      $.ajax({
        type: 'get',
        url: $(this).attr('href'),
        data: formData,                  
        success: function (data) { 
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);                
            setTimeout(function(){
               window.location.reload(1);
            }, 1000);
          }else if(data.status == 202){           
            alertify.warning(data.msg);
          }else{           
            alertify.warning(data.array.errorInfo[2]);
          }       
       },
       error: function (data) {
         alertify.warning("Oops. something went wrong. Please try again");
  }
    });
  });
//Adding Section