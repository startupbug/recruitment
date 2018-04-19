$('.edit')
.froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null});


var $radios = $('input[name=role_id]').change(function () {
  var value = $radios.filter(':checked').val();
  if (value == 2) {
    $("#phone_no").prop('disabled', true);
    $("#userrepeatpassword").prop('disabled', false);
    $('input[name=social]').prop('disabled', true);
    $("#phone_no_div").css("display", "none");
    $("#socialmedia_div").css("display", "none");
    $("#userrepeatpassword_div").css("display", "block");
  }
  else if(value == 3) {
    $("#phone_no").prop('disabled', false);
    $("#userrepeatpassword").prop('disabled', true);
    $('input[name=social]').prop('disabled', false);
    $("#phone_no_div").css("display", "block");
    $("#socialmedia_div").css("display", "block");
    $("#userrepeatpassword_div").css("display", "none");
  }
});


$('#send_your_query').click( function(e) {
  $('#send_your_query_popup').removeClass('hidden');
});
$('#send_your_query_popup_remove').click( function(e) {
  $('#send_your_query_popup').addClass('hidden');
});

$(".s_popup").hover(function(){
  $(this).children().toggleClass("show");
});

$(document.body).click( function(e) {
  $('.s_click_popup').children().removeClass('show');
});

$(".s_click_popup").click( function(e) {
  $(this).children().toggleClass("show");
  e.stopPropagation();
});


function functionAddTag() {
  $('#s_button_general_tag').addClass("hidden");
  $('#s_add_tag_button').removeClass("hidden");
}
function functionCancelTag() {
  $('#s_button_general_tag').removeClass("hidden");
  $('#s_add_tag_button').addClass("hidden");
}

$('.edit_tag').click(function(){
  $(this).siblings('input').prop("disabled", false);
  $(this).addClass('hidden');
  $(this).siblings('span.edit_delete').removeClass('hidden');
  $(this).siblings('span.delete_tag').addClass('hidden');
})

$('.edit_delete').click(function(){
  $(this).siblings('input').prop("disabled", true);
  $(this).addClass('hidden');
  $(this).siblings('span.edit_tag').removeClass('hidden');
  $(this).siblings('span.delete_tag').removeClass('hidden');
})

$( "#partial_marks" ).on( "click", function() {
  if ($("#partial_marks:checked").length == 1) {
    $('#choices_table > tbody tr > td:nth-child(2)').addClass("hidden");
    $('#choices_table > tbody tr > td:nth-child(4)').removeClass("hidden");
  }
  else {
    $('#choices_table > tbody tr > td:nth-child(2)').removeClass("hidden");
    $('#choices_table > tbody tr > td:nth-child(4)').addClass("hidden");
  }
});

function addrow_choice() {
 var colCount = 1;
 $('#choices_table tbody tr').each(function () {
   colCount++;
 });
 if ($('#partial_marks:checked').length == 0) {

   $('#choices_table tbody tr:last').after('<tr>'+
     '<td valign="center">'+colCount+'.</td>'+
     '<td> <input type="checkbox" name="status" value="1"> </td>'+
     '<td class="s_weight" valign="center">'+
     '<textarea class="form-control" name="choice[]" required=""></textarea>'+
     '</td>'+
     '<td valign="center" class="hidden">'+
     '<div class="input-group input-group-sm">'+
     '<input type="number" name="partial_marks[]" class="form-control" width="30px" max="100" min="0" >'+
     '<span class="input-group-addon" id="basic-addon1">%</span>'+
     '</div>'+
     '</td>'+
     '<td valign="center">'+
     '<a class="delete_row">'+
     '<i class="fa fa-times-circle-o"></i>'+
     '</a>'+
     '</td>'+
     '</tr>');
 }
 else {

  $('#choices_table tbody tr:last').after('<tr>'+
    '<td valign="center">'+colCount+'.</td>'+
    '<td class="hidden"> <input type="checkbox" name="status" value="1"> </td>'+
    '<td class="s_weight" valign="center">'+
    '<textarea class="form-control" name="choice[]" required=""></textarea>'+
    '</td>'+
    '<td valign="center">'+
    '<div class="input-group input-group-sm">'+
    '<input type="number" class="form-control" name="partial_marks[]" width="30px" max="100" min="0" >'+
    '<span class="input-group-addon" id="basic-addon1">%</span>'+
    '</div>'+
    '</td>'+
    '<td valign="center">'+
    '<a class="delete_row">'+
    '<i class="fa fa-times-circle-o"></i>'+
    '</a>'+
    '</td>'+
    '</tr>');
}
}

$("#choices_table").on('click', '.delete_row', function () {

  var colCount_alert = 0;
  $('#choices_table tbody tr').each(function () {
    colCount_alert++;
  });

  if (colCount_alert == 2) {
    alert("Atleast two options are mandatory..");
  }else {
    $(this).closest('tr').remove();
  }

  var colCount = 0;
  $('#choices_table tbody tr').each(function () {
    colCount++;
    $('#choices_table tbody tr:nth-child('+colCount+') td:nth-child(1)').html(colCount+'.');
  });

});


$("#choices_table tbody tr td :checkbox").bind("click", function() {
  var $this = $(this);
  if($this.is(':checked')) {
    $this.closest('tr').css('background-color', '#3fb618');
        // $this.closest('td:nth-child(4)').css('display', 'none');
        // $this.find('tr td:nth-child(5)').toggle();
      }
      else {
        $this.closest('tr').css('background-color', '#fff');
      }
    });


function addrow_codingquestion() {
 var colCount = 1;
 $('#coding_qustion_table tbody tr').each(function () {
   colCount++;
 });

 $('#coding_qustion_table tbody tr:last').after('<tr>'+
   '<td valign="center">'+colCount+'.</td>'+
   '<td valign="center">'+
   '<textarea class="form-control" name="option" required=""></textarea>'+
   '</td>'+
   '<td valign="center">'+
   '<textarea class="form-control" name="option" required=""></textarea>'+
   '</td>'+
   '<td valign="center">'+
   '<a class="delete_row">'+
   '<i class="fa fa-times-circle-o"></i>'+
   '</a>'+
   '</td>'+
   '</tr>');

}
$("#coding_qustion_table").on('click', '.delete_row', function () {

  $(this).closest('tr').remove();

  var colCount = 0;
  $('#choices_table tbody tr').each(function () {
    colCount++;
    $('#coding_qustion_table tbody tr:nth-child('+colCount+') td:nth-child(1)').html(colCount+'.');
  });

});

$(".accordion-toggle").click(function(){
  $(this).children('span').toggleClass("fa-sort-desc");
});

$("#cover_image_btn").click(function(){
 $("#cover_image").toggleClass("hidden");
});

$(".click_time").click(function(){
 $(this).siblings().toggleClass("hidden");
 $(this).toggleClass("hidden");
});

// $('.test_live').blink();
$('.test_live').blink({
  delay: 300
});
$(document).ready(function() {
  $("#s_txtEditor").Editor();
  $("#s_txtEditor_programming").Editor();
  $("#s_txtEditor_programming_debug").Editor();
  $("#s_txtEditor_submission").Editor();
  $("#s_txtEditor_submission_Add_section_fill_blanks").Editor();

  $("#s_txt_BD_InstructionsEditor").Editor();
  $("#s_txt_BD_DescriptionEditor").Editor();

  $("#s_txtEditor_selection_coding").Editor();
  $("#s_select_mcqs_txtEditor").Editor();
  $("#s_txtEditor_Add_section_submission").Editor();
  $("#s_txtEditor_Add_section_fill_blanks_submission").Editor();
  $("#s_txtEditor_Add_public_page").Editor();
  $("#s_txtEditor_Edit_public_page").Editor();
  //open modal in new tab
});


$(function(){
  var url_string = window.location.href;
  var url = new URL(url_string);
  var c = url.searchParams.get("modal");
  $('#'+c).modal('show');
  console.log(c);
});
$(function () {


  $('.language_multi').multiselect({
    includeSelectAllOption: true
  });
  $('#btnSelected').click(function () {
    var selected = $(".language_multi option:selected");
    var message = "";
    selected.each(function () {
      message += $(this).text() + " " + $(this).val() + "\n";
    });
    alert(message);
  });

  $('#tag_multi').multiselect({
    includeSelectAllOption: true
  });
  $('#btnSelected').click(function () {
    var selected = $("#tag_multi option:selected");
    var message = "";
    selected.each(function () {
      message += $(this).text() + " " + $(this).val() + "\n";
    });
    alert(message);
  });

  $('#tag_multi_programming').multiselect({
    includeSelectAllOption: true
  });
  $('#btnSelected').click(function () {
    var selected = $("#tag_multi_programming option:selected");
    var message = "";
    selected.each(function () {
      message += $(this).text() + " " + $(this).val() + "\n";
    });
    alert(message);
  });

  $('#tag_multi_choose').multiselect({
    includeSelectAllOption: true
  });
  $('#btnSelected').click(function () {
    var selected = $("#tag_multi_choose option:selected");
    var message = "";
    selected.each(function () {
      message += $(this).text() + " " + $(this).val() + "\n";
    });
    alert(message);
  });

  $('#tag_multi_choose_sub').multiselect({
    includeSelectAllOption: true
  });
  $('#btnSelected').click(function () {
    var selected = $("#tag_multi_choose_sub option:selected");
    var message = "";
    selected.each(function () {
      message += $(this).text() + " " + $(this).val() + "\n";
    });
    alert(message);
  });

});

$(function () {
  $('[data-toggle="tooltip"]').tooltip({
    title: "asdasd",
    html: true
  });

  // $(".s_tooltip_modal").click(function(){
  //   alert(this);
  //    $(this).siblings().toggle();
  // });
  $(".s_tooltip_modal").click(function(){
    console.log('add click event');
  });
//   $(".s_tooltip_modal").each( function() {
//     alert("Your book is overdue.");
// });

})
$(document).ready(function() {

  $('.submit_prog').click(function(){
    var target = $(this).attr('data-target');
    var data = $('.prog-'+target).val();
  });

  var array_mc = []; 
  $('.prog_mc').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();
      array_mc.push(value);

      if (array_mc.length == 0) 
      {
        $(".delete_section_mc").addClass('hidden');
        $("#section_mc_id").val(array_mc);
      }
      else
      {
        $(".delete_section_mc").removeClass('hidden');
        $("#section_mc_id").val(array_mc);
      }
    }
    else{
      removeItem = $(this).val();

      array_mc = $.grep(array_mc, function(value) {
        return value != removeItem;
      });

      if (array_mc.length == 0) 
      {
        $(".delete_section_mc").addClass('hidden');
        $("#section_mc_id").val(array_mc);
      }
      else
      {
        $(".delete_section_mc").removeClass('hidden');
        $("#section_mc_id").val(array_mc);
      }
    }
  });

  var array_c = []; 
  $('.prog_c').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();
      array_c.push(value);

      if (array_c.length == 0) 
      {
        $(".delete_section_c").addClass('hidden');
        $("#section_c_id").val(array_c);
      }
      else
      {
        $(".delete_section_c").removeClass('hidden');
        $("#section_c_id").val(array_c);
      }
    }
    else{
      removeItem = $(this).val();

      array_c = $.grep(array_c, function(value) {
        return value != removeItem;
      });

      if (array_c.length == 0) 
      {
        $(".delete_section_c").addClass('hidden');
        $("#section_c_id").val(array_c);
      }
      else
      {
        $(".delete_section_c").removeClass('hidden');
        $("#section_c_id").val(array_c);
      }
    }
  });

  var array_s = []; 
  $('.prog_s').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();
      array_s.push(value);

      if (array_s.length == 0) 
      {
        $(".delete_section_s").addClass('hidden');
        $("#section_s_id").val(array_s);
      }
      else
      {
        $(".delete_section_s").removeClass('hidden');
        $("#section_s_id").val(array_s);
      }
    }
    else{
      removeItem = $(this).val();

      array_s = $.grep(array_s, function(value) {
        return value != removeItem;
      });

      if (array_s.length == 0) 
      {
        $(".delete_section_s").addClass('hidden');
        $("#section_s_id").val(array_s);
      }
      else
      {
        $(".delete_section_s").removeClass('hidden');
        $("#section_s_id").val(array_s);
      }
    }
  });   

});
$(document).ready(function() {
    //set initial state.

    $('#request_resume').change(function() {
      if(this.checked) {
        $('#mandate_resume_label').removeClass('hidden');
        $("#mandate_resume").attr("disabled", false);
      }
      else{

        $('#mandate_resume_label').addClass('hidden');
        $("#mandate_resume").attr("disabled", true);
      }        
    });

    $('#mandate_resume').change(function() {
      if(this.checked) {
        $("#request_resume").attr("disabled", true);
      }
      else{
        $("#request_resume").attr("disabled", false);
      }        
    });
    $('#enable_verification').change(function() {
      if(this.checked) {
        $('#enable_verification_block').addClass('hidden');  
      }
      else{
        $('#enable_verification_block').removeClass('hidden');  
      }        
    });

  });