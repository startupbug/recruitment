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


function modal_data(id){   
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });
  $.ajax({
    url: base_url  + 'recruiter/question_modal_partial_data',
    type: 'post',
    data: {'question_id': id},
    'dataType' : 'json',
    success: function (data) { 
      console.log("123");
      console.log(data.dataz);
      console.log(data.question_data.question_level_id);
      $("#questionmarks").val(data.question_data.marks);         
      $("#negativeMarks").val(data.question_data.negative_marks);         
      $("#question_id_id").val(data.question_data.question_id);         
      

      $("#question_statement_id").text(data.question_data.question_statement);         
      $("#state_name").text(data.question_data.state_name);         
      $("#level_name").text(data.question_data.level_name);         
      $("#tagName").text(data.question_data.tag_name);

      /* Multiple Choices HTML */
      $choices_html = ``;

    var i=1;
    var partialFlag = 0;
    var shuffleFlag = 0;
    $.each(data.question_choices, function( index, value ) {
             //alert( index + ": " + value );
             //value.partial_marks = value.partial_marks ? value.partial_marks : '';
             $choices_html += `<tr class="">
                              <td class="">`+i+`.</td>
                              <td class="">
                                 <input type="radio" name="893" value="true" disabled="disabled">
                              </td>
                              <td>
                                 <textarea class="form-control" name="option" required="" disabled="disabled">`+value.choice+`</textarea>
                              </td>
                              <td width="120px" class="">
                                 <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" width="30px" value="`+value.partial_marks+`"  disabled="disabled">
                                    <span class="input-group-addon" id="basic-addon1">%</span>
                                 </div>
                              </td>
                              <td>
                              </td>
                           </tr> `;
              //checking partial flag 
              if(value.partial_marks != null){
                    partialFlag = 1;
              }
              if(value.shuffleFlag != 0){
                    shuffleFlag = 1;
              }
      i++;                     
    });

    //Ticking Partial flag if required
    if(partialFlag == 1){
      $('.partialCheck').prop('checked', true);
    }
    if(shuffleFlag == 1){
      $('.shuffleCheck').prop('checked', true);
    }
    

    $("#choiceTable").html($choices_html);

    // if(typeof(data.question_choices[0]) != "undefined" && data.question_choices[0] !== null){      
    //   console.log(data.question_choices[0]);
    //   $("#mcq1").val(data.question_choices[0].choice);
    // }

    // if(typeof(data.question_choices[1]) != "undefined" && data.question_choices[1] !== null){      
    //   console.log(data.question_choices[1]);
    //   $("#mcq1").val(data.question_choices[1].choice);
    // }

    // if(typeof(data.question_choices[2]) != "undefined" && data.question_choices[2] !== null){      
    //   console.log(data.question_choices[2]);
    //   $("#mcq1").val(data.question_choices[2].choice);
    // }

    // if(typeof(data.question_choices[3]) != "undefined" && data.question_choices[3] !== null){      
    //   console.log(data.question_choices[3]);
    //   $("#mcq4").val(data.question_choices[3].choice);
    // }            

    // var i;
    // for (i = 0; i < 40; i++) { 
    //     if(typeof(data.question_choices[i]) != "undefined" && data.question_choices[i] !== null){      
    //         console.log(data.question_choices[i]);
    //         $("#mcq"+i).val(data.question_choices[i].choice);
    //     }else{
    //        $("#mcqrow"+i).hide();
    //     }
    // }    

    },
    error: function (data) {
      console.log(data);
    }
  });        

}

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