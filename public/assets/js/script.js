$(document).ready(function(){

  $("#duplication_of_template").click(function () {
    
    var abc = $(this).data("message");
    console.log(abc);
    $('#duplication_of_template_ki_id').val(abc);
  });

});
function confirmAlert(ques, action, id){
	alertify.confirm(ques, function(){ 
   
    //alertify.success('Deleting..````````````')

  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });
  
  console.log("action" + action);

  $.ajax({
    type: 'post',
    url: action,
    data: {'id': id},                  
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

 }, function(){ 

    alertify.error('Cancelz')

});
}

function confirmAlert_test(){
	alertify.confirm('Hello !! This is preview', function(){ 
   //alertify.success('Ok') 
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
    beforeSend: function(){
      $('#loader_image').show();
    },                
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
      complete: function(){
        $('#loader_image').hide();
    }, 
     });
});


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



//Create Test Template Setting
$("#templatetestSetting").on('submit', function(e){
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
//Create Test Template Setting
 // MODAL DATA REMOVE FROM HERE AND MOVE TO LAYOUT/APP.BLADE.PHP

//Create Test Template Contact Setting
$("#templatetestContactSetting").on('submit', function(e){
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

//Create Test Template Message Setting
$("#templatetestMessageSetting").on('submit', function(e){
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

//Create Test Template Mail Setting
$("#templatetestMailSetting").on('submit', function(e){
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


//Create Test Template Contact Setting
$("#weightage_row_edit").on('click', '.delete_row', function () {

  $(this).closest('tr').remove();

  var colCount = 0;
  $('#weightage_row_edit tbody tr').each(function (data) {
    colCount++;
  });

  var total = 100;
  var count = colCount;
  var colCount_value = 0;
  $('#weightage_row_edit tbody tr').each(function () {
    colCount_value++;

    var s_value ;
    var val ;
    var value = total / count;
    var split_value = String(value).split(".");
    if (split_value[1]) {
      s_value = parseInt(split_value[0])+1;
    }
    else {
      s_value = parseInt(value);
    }
    total = total - s_value;

    $('#weightage_row_edit tbody tr:nth-child('+colCount_value+') td:nth-child(5)').html('<div class="col-md-offset-1 col-md-4"><input type="number" id="weightage" name="weightage[]" class="form-control input-md" value="'+s_value+'"></div><div class="col-md-7"><button class="btn btn-info btn-sm"><i class="fa fa-floppy-o"></i> Save</button><button class="btn btn-default btn-sm delete_row"><i class="fa fa-times"></i></button></div>');
    $('#weightage_row_edit tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');
    count--;
  });
});

function addrow_weightage_edit() {
   var colCount = 1;
   $('#weightage_row_edit tbody tr').each(function (data) {
        colCount++;
   });

   if (colCount == 1) {
     $('#weightage_row_edit tbody').append('<tr>'+
       '<td valign="center">'+colCount+'.</td>'+

       '<td>'+
         '<div class="text-center" style="margin-top: -11px">'+
           '<small class="text-danger"><em>*Unsaved</em></small>'+
         '</div>'+
         '<input type="text" class="form-control" name="test_case_name[]" required="" >'+
       '</td>'+

       '<td valign="center">'+
         '<textarea class="form-control" name="test_case_input[]" required=""></textarea>'+
       '</td>'+

       '<td valign="center">'+
         '<textarea class="form-control" name="test_case_output[]" required=""></textarea>'+
       '</td>'+

       '<td valign="center">'+
         '<div class="col-md-offset-1 col-md-4">'+
           '<input type="number" id="weightage" name="weightage[]" class="form-control input-md" value="100">'+
         '</div>'+

         '<div class="col-md-7">'+
            '<button class="btn btn-info btn-sm">'+
              '<i class="fa fa-floppy-o"></i> Save'+
            '</button>'+

            '<button class="btn btn-default btn-sm delete_row">'+
              '<i class="fa fa-times"></i>'+
            '</button>'+

         '</div>'+
       '</td>'+
     '</tr>');
   }
   else {
     $('#weightage_row_edit tbody tr:last').after('<tr>'+
       '<td valign="center">'+colCount+'.</td>'+

       '<td>'+
         '<div class="text-center" style="margin-top: -11px">'+
           '<small class="text-danger"><em>*Unsaved</em></small>'+
         '</div>'+
         '<input type="text" class="form-control" name="test_case_name[]" required="">'+
       '</td>'+

       '<td valign="center">'+
         '<textarea class="form-control" name="test_case_input[]" required=""></textarea>'+
       '</td>'+

       '<td valign="center">'+
         '<textarea class="form-control" name="test_case_output[]" required=""></textarea>'+
       '</td>'+

       '<td valign="center">'+
         '<div class="col-md-offset-1 col-md-4">'+
           '<input type="number" id="weightage" name="weightage[]" class="form-control input-md">'+
         '</div>'+

         '<div class="col-md-7">'+
            '<button class="btn btn-info btn-sm">'+
              '<i class="fa fa-floppy-o"></i> Save'+
            '</button>'+

            '<button class="btn btn-default btn-sm delete_row">'+
              '<i class="fa fa-times"></i>'+
            '</button>'+

         '</div>'+
       '</td>'+
     '</tr>');

   }

   // var value = 100 / colCount;
   var total = 100;
   var count = colCount;
   var colCount_value = 0;
   $('#weightage_row_edit tbody tr').each(function () {
      colCount_value++;

      var s_value ;
      var val ;
      var value = total / count;
      var split_value = String(value).split(".");
      if (split_value[1]) {
        s_value = parseInt(split_value[0])+1;
      }
      else {
        s_value = parseInt(value);
      }
      total = total - s_value;

      $('#weightage_row_edit tbody tr:nth-child('+colCount_value+') td:nth-child(5)').html('<div class="col-md-offset-1 col-md-4"><input type="number" id="weightage" name="weightage[]" class="form-control input-md" value="'+s_value+'"></div><div class="col-md-7"><button class="btn btn-info btn-sm"><i class="fa fa-floppy-o"></i> Save</button><button class="btn btn-default btn-sm delete_row"><i class="fa fa-times"></i></button></div>');

       count--;
   });
}

//Create Test Template Contact Setting

// Hasan Mehdi Delete choice Question

$('.delete_row').on('click', function(e) {
e.preventDefault();
    var dataId = $(this).attr('data-id');
    var thisScope = $(this);
    //alert(dataId);
    $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
  });
    $.ajax({
        url: $(this).attr('href'),
        type: 'get',
        success: function( msg ) {

            thisScope.closest("tr").hide();
            console.log(msg);

            // if ( msg.status === 'success' ) {
            //     toastr.success( msg.msg );
            //     setInterval(function() {
            //         window.location.reload();
            //     }, 5900);
            // }
        },
        error: function( data ) {
            if ( data.status === 422 ) {
                toastr.error('Cannot delete the category');
            }
        }
    });

    return false;
});

