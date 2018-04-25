

$( document ).ready(function() {


  $(".allow_number").on("keypress keyup blur",function (event) {
     $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
          event.preventDefault();
      }
  });

  $('.edit').froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null});

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
      $this.closest('tr').children('td ').last().children('a').hide();
    }
    else {
      $this.closest('tr').css('background-color', '#fff');
      $this.closest('tr').children('td ').last().children('a').show();
    }
  });

  $("#coding_qustion_table").on('click', '.delete_row', function () {

    $(this).closest('tr').remove();

    var colCount = 0;
    $('#choices_table tbody tr').each(function () {
      colCount++;
      $('#coding_qustion_table tbody tr:nth-child('+colCount+') td:nth-child(1)').html(colCount+'.');
    });

  });

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
  $('[data-toggle="tooltip"]').tooltip({
    title: "asdasd",
    html: true
  });

  $(".s_tooltip_modal").click(function(){
    console.log('add click event');
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

  $("#section_coding_table").on('click', '.delete_row', function () {

    $(this).closest('tr').remove();

    var colCount = 0;
    $('#section_coding_table tbody tr').each(function () {
      colCount++;
      $('#section_coding_table tbody tr:nth-child('+colCount+') td:nth-child(1)').html(colCount+'.');
    });

  });

  $("#weightage_row").on('click', '.delete_row', function () {

    $(this).closest('tr').remove();

    var colCount = 0;
    $('#weightage_row tbody tr').each(function (data) {
      colCount++;
    });

    var total = 100;
    var count = colCount;
    var colCount_value = 0;
    $('#weightage_row tbody tr').each(function () {
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

      $('#weightage_row tbody tr:nth-child('+colCount_value+') td:nth-child(5)').html('<div class="col-md-offset-1 col-md-4"><input type="number" id="weightage" name="weightage[]" class="form-control input-md" value="'+s_value+'"></div><div class="col-md-7"><button class="btn btn-info btn-sm"><i class="fa fa-floppy-o"></i> Save</button><button class="btn btn-default btn-sm delete_row"><i class="fa fa-times"></i></button></div>');
      $('#weightage_row tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');
      count--;
    });
  });

  $("#section_choices_table").on('click', '.delete_row', function () {

      var colCount_alert = 0;
      $('#section_choices_table tbody tr').each(function () {
          colCount_alert++;
      });

      if (colCount_alert == 2) {
        alert("Atleast two options are mandatory..");
      }else {
        $(this).closest('tr').remove();
      }

      var colCount = 0;
      $('#section_choices_table tbody tr').each(function () {
          colCount++;
          $('#section_choices_table tbody tr:nth-child('+colCount+') td:nth-child(1)').html(colCount+'.');
      });
  });

  $("#section_choices_table tbody tr td :checkbox").bind("click", function() {
      var $this = $(this);
      if($this.is(':checked')) {
          $this.closest('tr').css('background-color', '#3fb618');
          $this.closest('tr').children('td ').last().children('a').hide();
      }
      else {
          $this.closest('tr').css('background-color', '#fff');
          $this.closest('tr').children('td ').last().children('a').show();
      }

      var $count = 0;
      $('#section_choices_table tbody tr  td :checkbox').each(function () {
          var $this = $(this);
          if($this.is(':checked')) {
            $count++;
            if ($count >= 2) {
              console.log($count);
              $( "#section_partial_marks" ).attr("disabled", true);
            }
            else {
              $( "#section_partial_marks" ).attr("disabled", false);
            }
          }
      });
  });

  $('#request_resume').change(function() {
      if($(this).is(":checked")) {
        $("#mandate_resume_label").removeClass("hidden");
        $("#mandate_resume").attr("disabled", false);
      }
      else {
        $("#mandate_resume_label").addClass("hidden");
        $("#mandate_resume").attr("disabled", true);
      }
  });

  $('#mandate_resume').change(function() {
      if($(this).is(":checked")) {
        $("#request_resume").attr("disabled", true);
      }
      else {
        $("#request_resume").attr("disabled", false);
      }
  });

  $('#enable_verification').change(function() {
      if($(this).is(":checked")) {
        $("#enable_verification_bloc").addClass("hidden");
      }
      else {
        $("#enable_verification_bloc").removeClass("hidden");
      }
  });

  $('#test_template_types_id').change(function() {
    var item=$(this);
    if (item.val() == 1) {
      $('#test_template_types_id_help').html("This test will be open for all interested candidates");
    }
    else {
      $('#test_template_types_id_help').html("Only invited candidates can take the test");
    }
  });

  $('#webcam_id').change(function() {
    var item=$(this);
    if (item.val() == 1) {
      $('#webcam_id_help').html("(If webcam is not found, then candidate will not be able to give the test. The candidate will be prompted to check for webcam)");
    }
    else {
      $('#webcam_id_help').html("");
    }
  });

  $('.format_class').change(function() {
    var item=$(this);
    console.log(item.val());
    var abc = $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").children().find( ".option_table" );

    if (item.val() == 1) {
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
    }
    else if (item.val() == 2) {
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", false);

      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
    }
    else if (item.val() == 3) {
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", false);

      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
    }
    else if (item.val() == 4) {
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
    }
    else if (item.val() == 5) {
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
    }
    else if (item.val() == 6) {
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
    }
    else if (item.val() == 7) {
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

      $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
    }
  });

  $('.add_option').click(function(){
     var colCount = 1;
     $(this).closest( "tfoot" ).siblings("tbody").find( "tr" ).each(function () {
         colCount++;
     });

     $(this).closest( "tfoot" ).siblings("tbody").find( "tr:last" ).after('<tr>'+
         '<td valign="center">Option '+colCount+'</td>'+
         '<td class="s_weight" valign="center">'+
          '<input type="text" class="form-control option_text" name="option[]">'+
         '</td>'+
         '<td valign="center">'+
            '<a href="javascript:void(0)" class="delete_row_option">'+
              '<i class="fa fa-times-circle-o"></i>'+
            '</a>'+
         '</td>'+
     '</tr>');


       $('.delete_row_option').on("click",function(){

         var colCount_alert = 0;
         $(this).closest( "tbody" ).find( "tr" ).each(function () {
             colCount_alert++;
         });
         console.log(colCount_alert);
         if (colCount_alert == 1) {
           alert("Atleast One options are mandatory..");
         }else {
           $(this).closest('tr').remove();
         }

         var colCount = 0;
         $(this).closest( "tbody" ).find( "tr" ).each(function () {
             colCount++;
             $(this).closest( "tbody" ).find( "tr:nth-child("+colCount+") td:nth-child(1)").html('Option '+colCount);
         });

       });
  });

  $('.delete_row_option').on("click",function(){

    var colCount_alert = 0;
    $(this).closest( "tbody" ).find( "tr" ).each(function () {
        colCount_alert++;
    });
    console.log(colCount_alert);
    if (colCount_alert == 1) {
      alert("Atleast One options are mandatory..");
    }else {
      $(this).closest('tr').remove();
    }

    var colCount = 0;
    $(this).closest( "tbody" ).find( "tr" ).each(function () {
        colCount++;
        $(this).closest( "tbody" ).find( "tr:nth-child("+colCount+") td:nth-child(1)").html('Option '+colCount);
    });

  });

  // $('.edit_question').click(function() {
  //   $( this ).closest( ".row" ).siblings('.capsule').toggleClass('hidden');
  // });


  var edit_template_text_editor_setInterval;
  edit_template_text_editor_setInterval = setInterval(
    function(){

      var objVal = $('#title').val();
      if(objVal != ''){
        $('h3#title_video').text(objVal);
      }

      var instruction = $( "#edit_template_text_editor_instruction .fr-element.fr-view" ).html();
      $("#edit_template_text_editor_instruction_data").html(instruction);

      var description = $( "#edit_template_text_editor_description .fr-element.fr-view" ).html();
      $("#edit_template_text_editor_description_data").html(description);

     }
  , 1000);


  $('.level_easy').change(function() {
      if ($(this).is(":checked") && $('.level_medium').is(":checked") && $('.level_hard').is(":checked")) {
        $('.level_all').attr('checked', true);
        $('.level_easy').attr('checked', true);
      }
      else {
        $('.level_all').attr('checked', false);
        $('.level_easy').attr('checked', false);
      }
  });
  $('.level_medium').change(function() {
      if ($(this).is(":checked") && $('.level_easy').is(":checked") && $('.level_hard').is(":checked")) {
        $('.level_all').attr('checked', true);
        $('.level_medium').attr('checked', true);
      }
      else {
        $('.level_all').attr('checked', false);
        $('.level_medium').attr('checked', false);
      }
  });
  $('.level_hard').change(function() {
      if ($(this).is(":checked") && $('.level_easy').is(":checked") && $('.level_medium').is(":checked")) {
        $('.level_all').attr('checked', true);
        $('.level_hard').attr('checked', true);
      }
      else {
        $('.level_all').attr('checked', false);
        $('.level_hard').attr('checked', false);
      }
  });

  $('.level_all').change(function() {
      if ($(this).is(":checked")) {
        $('.level_easy').attr('checked', true);
        $('.level_medium').attr('checked', true);
        $('.level_hard').attr('checked', true);
      }
      else {
        $('.level_easy').attr('checked', false);
        $('.level_medium').attr('checked', false);
        $('.level_hard').attr('checked', false);
      }
  });


});


function moreSettings() {
  $('.moreSettings').removeClass('hidden');
  $('.moreSettings_button').addClass('hidden');
}
function functionAddTag() {
  $('#s_button_general_tag').addClass("hidden");
  $('#s_add_tag_button').removeClass("hidden");
}
function functionCancelTag() {
  $('#s_button_general_tag').removeClass("hidden");
  $('#s_add_tag_button').addClass("hidden");
}
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
function addrow_codingquestion() {
   var colCount = 0;
   $('#coding_qustion_table tbody tr').each(function (data) {
        // console.log(data);
        // if()
        colCount++;
   });

   if (colCount == 1) {
     $('#coding_qustion_table tbody').append('<tr>'+
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
   else {
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

}
function addrow_section_codingquestion() {
   var colCount = 1;
   $('#section_coding_table tbody tr').each(function (data) {
        colCount++;
   });

   if (colCount == 1) {
     $('#section_coding_table tbody').append('<tr>'+
       '<td valign="center">'+colCount+'.</td>'+
       '<td valign="center">'+
           '<textarea class="form-control" name="coding_input[]" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
           '<textarea class="form-control" name="coding_output[]" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
           '<a class="delete_row">'+
            '<i class="fa fa-times-circle-o"></i>'+
           '</a>'+
       '</td>'+
     '</tr>');
   }
   else {
     $('#section_coding_table tbody tr:last').after('<tr>'+
       '<td valign="center">'+colCount+'.</td>'+
       '<td valign="center">'+
           '<textarea class="form-control" name="coding_input[]" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
           '<textarea class="form-control" name="coding_output[]" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
           '<a class="delete_row">'+
            '<i class="fa fa-times-circle-o"></i>'+
           '</a>'+
       '</td>'+
     '</tr>');
   }

}
function addrow_weightage() {
   var colCount = 1;
   $('#weightage_row tbody tr').each(function (data) {
        colCount++;
   });

   if (colCount == 1) {
     $('#weightage_row tbody').append('<tr>'+
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
     $('#weightage_row tbody tr:last').after('<tr>'+
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
   $('#weightage_row tbody tr').each(function () {
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

      $('#weightage_row tbody tr:nth-child('+colCount_value+') td:nth-child(5)').html('<div class="col-md-offset-1 col-md-4"><input type="number" id="weightage" name="weightage[]" class="form-control input-md" value="'+s_value+'"></div><div class="col-md-7"><button class="btn btn-info btn-sm"><i class="fa fa-floppy-o"></i> Save</button><button class="btn btn-default btn-sm delete_row"><i class="fa fa-times"></i></button></div>');

       count--;
   });
}
$(function(){
  var url_string = window.location.href;
  var url = new URL(url_string);
  var c = url.searchParams.get("modal");
  $('#'+c).modal('show');
  console.log(c);
});

var testtemp_setInterval_Expand;
var testtemp_setInterval_Collapse;
function edittesttemplate_Collapse() {
  clearInterval(testtemp_setInterval_Expand);
  testtemp_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#section-mcqs-Modal-Collapse .fr-element.fr-view" ).html();
      $("#preview_data_section").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#edittemp_panel").addClass('hidden');
        $("#section-mcqs-Modal .fr-element.fr-view").html(htmlString);
        $("#preview_data_section_expand").html(htmlString);
      }
      else {
        console.log(htmlString);
        $("#section-mcqs-Modal .fr-element.fr-view").html(htmlString);
        $("#edittemp_panel").removeClass('hidden');
        $("#preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
//Duplicate Test Template
function section_id(id) {
  console.log(id);
  $('#section_id_1').val(id);
  $('#section_id_2').val(id);
  $('#section_id_3').val(id);
  testtemp_setInterval_Expand = setInterval(
    function(){
      var htmlString = $( "#section-mcqs-Modal .fr-element.fr-view" ).html();
      $("#preview_data_section").html(htmlString);
      $("#section-mcqs-Modal-Collapse .fr-element.fr-view").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#edittemp_panel").addClass('hidden');
        $("#preview_data_section_expand").html(htmlString);
      }
      else {
        $("#edittemp_panel").removeClass('hidden');
        $("#preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function edittesttemplate_Expand(id) {

  console.log(id);
  $('#section_id_1').val(id);
  $('#section_id_2').val(id);
  $('#section_id_3').val(id);


  testtemp_setInterval_Expand = setInterval(
    function(){
      var htmlString = $( "#section-mcqs-Modal .fr-element.fr-view" ).html();
      $("#preview_data_section").html(htmlString);
      $("#section-mcqs-Modal-Collapse .fr-element.fr-view").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#edittemp_panel").addClass('hidden');
        $("#preview_data_section_expand").html(htmlString);
      }
      else {
        $("#edittemp_panel").removeClass('hidden');
        $("#preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function collapse_modal() {
  $("#section-mcqs-Modal-Collapse").modal('hide');
  $("#section-mcqs-Modal").css('overflow','scroll');
  clearInterval(testtemp_setInterval_Collapse);
  edittesttemplate_Expand();
}


var code_testtemp_setInterval_Expand;
var code_testtemp_setInterval_Collapse;
function code_edittesttemplate_Collapse() {
  clearInterval(code_testtemp_setInterval_Expand);
  code_testtemp_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#section-coding-add-compilable-question-Modal-Collapse .fr-element.fr-view" ).html();
      $("#code_preview_data_section").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#section-coding-add-compilable-question-Modal .fr-element.fr-view").html(htmlString);
        $("#code_edittemp_panel").addClass('hidden');
        $("#code_preview_data_section_expand").html(htmlString);
      }
      else {
        console.log(htmlString);
        $("#section-coding-add-compilable-question-Modal .fr-element.fr-view").html(htmlString);
        $("#code_edittemp_panel").removeClass('hidden');
        $("#code_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function code_edittesttemplate_Expand() {
  code_testtemp_setInterval_Expand = setInterval(
    function(){
      var htmlString = $( "#section-coding-add-compilable-question-Modal .fr-element.fr-view" ).html();
      $("#code_preview_data_section").html(htmlString);
      $("#section-coding-add-compilable-question-Modal-Collapse .fr-element.fr-view").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#code_edittemp_panel").addClass('hidden');
        $("#code_preview_data_section_expand").html(htmlString);
      }
      else {
        $("#code_edittemp_panel").removeClass('hidden');
        $("#code_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function code_collapse_modal() {
  $("#section-coding-add-compilable-question-Modal-Collapse").modal('hide');
  $("#section-coding-add-compilable-question-Modal").css('overflow','scroll');
  clearInterval(code_testtemp_setInterval_Collapse);
  code_edittesttemplate_Expand();
}


var submission_testtemp_setInterval_Expand;
var submission_testtemp_setInterval_Collapse;
function submission_edittesttemplate_Expand() {
  clearInterval(submission_testtemp_setInterval_Collapse);
  submission_testtemp_setInterval_Expand = setInterval(
    function(){
      var htmlString = $( "#section-submission-question-Modal .fr-element.fr-view" ).html();

      if (htmlString == "<p><br></p>") {
        $("#section-submission-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").addClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
      else {
        console.log(htmlString);
        $("#section-submission-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").removeClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function submission_edittesttemplate_Collapse() {
  clearInterval(submission_testtemp_setInterval_Expand);
  submission_testtemp_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#section-submission-question-Modal-collapse .fr-element.fr-view" ).html();
      $("#submission_preview_data_section_collapse").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#section-submission-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").addClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
      else {
        $("#section-submission-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").removeClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function submission_collapse_modal() {
  $("#section-submission-question-Modal-collapse").modal('hide');
  $("#section-submission-question-Modal").css('overflow','scroll');
  clearInterval(submission_edittesttemplate_Expand);
  submission_edittesttemplate_Expand();
}


var submission_fill_testtemp_setInterval_Expand;
var submission_fill_testtemp_setInterval_Collapse;
function submission_fill_edittesttemplate_Expand() {
  clearInterval(submission_fill_testtemp_setInterval_Collapse);
  submission_fill_testtemp_setInterval_Expand = setInterval(
    function(){
      var htmlString = $( "#section-submission-fill-blanks-question-Modal .fr-element.fr-view" ).html();

      if (htmlString == "<p><br></p>") {
        $("#section-submission-fill-blanks-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").addClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
      else {
        console.log(htmlString);
        $("#section-submission-fill-blanks-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").removeClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function submission_fill_edittesttemplate_Collapse() {
  clearInterval(submission_fill_testtemp_setInterval_Expand);
  submission_fill_testtemp_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#section-submission-fill-blanks-question-Modal-collapse .fr-element.fr-view" ).html();
      $("#submission_fill_preview_data_section_collapse").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#section-submission-fill-blanks-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").addClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
      else {
        $("#section-submission-fill-blanks-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").removeClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function submission_fill_collapse_modal() {
  $("#section-submission-fill-blanks-question-Modal-collapse").modal('hide');
  $("#section-submission-fill-blanks-question-Modal").css('overflow','scroll');
  clearInterval(submission_fill_edittesttemplate_Expand);
  submission_fill_edittesttemplate_Expand();
}



function edit_template_text_editor() {
  // clearInterval(code_testtemp_setInterval_Expand);

}

// Create Template Section
$( "#section_partial_marks" ).on( "click", function() {
  if ($("#section_partial_marks:checked").length == 1) {
    $('#section_choices_table > tbody tr > td:nth-child(2)').addClass("hidden");
    $('#section_choices_table > tbody tr > td:nth-child(4)').removeClass("hidden");

    $("#section_choices_table tbody tr").closest('tr').css('background-color', '#fff');
    $("#section_choices_table > tbody tr > td:nth-child(5)").children('a').show();
  }
  else {
    $('#section_choices_table > tbody tr > td:nth-child(2)').removeClass("hidden");
    $('#section_choices_table > tbody tr > td:nth-child(4)').addClass("hidden");

    $('#section_choices_table tbody tr  td :checkbox').each(function () {
        var $this = $(this);
        if($this.is(':checked')) {
          $this.closest('tr').css('background-color', '#3fb618');
          $this.closest('tr').children('td ').last().children('a').hide();
        }
        else {
          $this.closest('tr').css('background-color', '#fff');
          $this.closest('tr').children('td ').last().children('a').show();
        }
    });
  }
});

function template_row_add_choice() {
   var colCount = 1;
   $('#section_choices_table tbody tr').each(function () {
       colCount++;
   });

   if ($('#section_partial_marks:checked').length == 0) {

     $('#section_choices_table tbody tr:last').after('<tr>'+
       '<td valign="center">'+colCount+'.</td>'+
       '<td> <input type="checkbox" name="answer[]" class="choices_table_checkbox"> </td>'+
       '<td class="s_weight" valign="center">'+
           '<textarea class="form-control" name="choice[]" required=""></textarea>'+
       '</td>'+
       '<td valign="center" class="hidden">'+
           '<div class="input-group input-group-sm">'+
               '<input type="number" name="partial_marks[]" value="0" class="form-control" width="30px" max="100" min="0" >'+
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

      $('#section_choices_table tbody tr:last').after('<tr>'+
        '<td valign="center">'+colCount+'.</td>'+
        '<td class="hidden"> <input type="checkbox" name="answer[]" class="choices_table_checkbox"> </td>'+
        '<td class="s_weight" valign="center">'+
            '<textarea class="form-control" name="choice[]" required=""></textarea>'+
        '</td>'+
        '<td valign="center">'+
            '<div class="input-group input-group-sm">'+
                '<input type="number" class="form-control" value="0" name="partial_marks[]" width="30px" max="100" min="0" >'+
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

   $("#section_choices_table tbody tr td :checkbox").bind("click", function() {
       var $this = $(this);
       if($this.is(':checked')) {
           $this.closest('tr').css('background-color', '#3fb618');
           $this.closest('tr').children('td ').last().children('a').hide();
       }
       else {
           $this.closest('tr').css('background-color', '#fff');
           $this.closest('tr').children('td ').last().children('a').show();
       }

       var $count = 0;
       $('#section_choices_table tbody tr  td :checkbox').each(function () {
           var $this = $(this);
           if($this.is(':checked')) {
             $count++;
             if ($count >= 2) {
               console.log($count);
               $( "#section_partial_marks" ).attr("disabled", true);
             }
             else {
               $( "#section_partial_marks" ).attr("disabled", false);
             }
           }
       });
   });
}

function addQuestionnaire(id) {
  $(".unordered-list").append('<li class="questionBorder">'+
    '<div class="row" id="">'+
      '<div class="col-xs-6 title">'+
        '<small class="text-primary" uib-tooltip="Mandatory Question (Edit to change)" tooltip-placement="right">'+
          '<i class="fa fa-star" aria-hidden="true"></i>'+
        '</small>'+
        '<span class="separator transparent-border"></span>'+
        '<span title="Help Text">What is your CGPA?</span>'+
      '</div>'+
      '<div class="col-xs-3 title">'+
        '<span class="light-font">Text</span>'+
      '</div>'+
      '<div class="col-xs-3">'+
        '<div class="pull-right">'+
          '<div class="btn-group">'+
            '<button class="btn btn-sm btn-link">'+
                '<span class="fa fa-arrow-up"></span>'+
            '</button>'+
            '<button class="btn btn-sm btn-link no-hover">'+
                '<span class="fa fa-arrow-up transparent-font"></span>'+
            '</button>'+
            '<button type="button" class="btn btn-sm btn-link edit_question" >'+
                '<span class="fa fa-pencil"></span>'+
            '</button>'+
            '<button class="btn btn-sm btn-link text-danger">'+
                '<span class="fa fa-trash"></span>'+
            '</button>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>'+
    '<div class="form-horizontal hidden capsule">'+
      '<div class="form-group form-group-sm">'+
        '<label class="control-label col-sm-2">Question</label>'+
        '<div class="col-sm-10">'+
          '<input type="text" class="form-control" placeholder=" Eg: Enter your University name">'+
        '</div>'+
      '</div>'+
      '<div class="form-group form-group-sm">'+
        '<label class="control-label col-sm-2">Support text</label>'+
        '<div class="col-sm-10">'+
          '<input type="text" class="form-control" placeholder="Eg: Give the full form of your University">'+
        '</div>'+
      '</div>'+
      '<div class="form-group form-group-sm">'+
        '<label class="control-label col-sm-2">'+
          'Knock out'+
          '<i class="fa fa-info-circle"></i>'+
        '</label>'+
        '<div class="col-sm-10">'+
          '<div class="checkbox" style="padding: 1px">'+
            '<label class="control-label">'+
              '<input type="checkbox" style="top:4px" disabled="disabled">'+
              'Dont allow the candidate to take the test if the criteria does not meet'+
            '</label>'+
          '</div>'+
        '</div>'+
      '</div>'+
      '<div class="dropdown_format_menu">'+
        '<div class="form-group form-group-sm">'+
          '<label class="control-label col-sm-2">Format</label>'+
          '<div class="col-sm-4">'+
            '<select class="form-control format_class">'+
              '<option value="1">Number</option>'+
              '<option value="2">Text</option>'+
              '<option value="3">Text Area</option>'+
              '<option value="4">Check box</option>'+
              '<option value="5">Multiple choice</option>'+
              '<option value="6">Radio group</option>'+
              '<option value="7">Drop down</option>'+
            '</select>'+
          '</div>'+
          '<div class="col-sm-4">'+
            '<div class="checkbox" style="padding: 1px">'+
              '<label class="control-label">'+
                '<input type="checkbox" style="top:4px"> Mandatory'+
              '</label>'+
            '</div>'+
          '</div>'+
        '</div>'+
        '<div class="row hidden option_text_data">'+
          '<div class="col-sm-9 col-sm-offset-2">'+
            '<div class="no-more-tables">'+
              '<table class="table s_table option_table">'+
                '<tbody>'+
                   '<tr>'+
                      '<td valign="center">Option 1</td>'+
                      '<td class="s_weight" valign="center">'+
                       '<input type="text" class="form-control option_text" name="option[]">'+
                      '</td>'+
                      '<td valign="center">'+
                         '<a class="delete_row_option">'+
                         '<i class="fa fa-times-circle-o"></i>'+
                         '</a>'+
                      '</td>'+
                   '</tr>'+
                '</tbody>'+
                '<tfoot>'+
                   '<tr>'+
                     '<td></td>'+
                     '<td colspan="2" class="text-align-center">'+
                       '<button type="button" class="btn btn-sm btn-warning add_option">+ Add Option</button>'+
                     '</td>'+
                   '</tr>'+
                '</tfoot>'+
              '</table>'+
            '</div>'+
          '</div>'+
        '</div>'+
        '<div class="form-group form-group-sm hidden placeholder_text_data" style="">'+
          '<label class="control-label col-sm-2">Placeholder</label>'+
          '<div class="col-sm-10">'+
            '<input type="text" class="form-control placeholder_text" disabled>'+
          '</div>'+
        '</div>'+
      '</div>'+
      '<div class="row">'+
        '<div class="col-sm-10 col-sm-offset-2">'+
          '<button class="btn btn-sm btn-info">Done</button>'+
          '<button class="btn btn-sm btn-default">Cancel</button>'+
        '</div>'+
      '</div>'+
    '</div>'+
  '</li>');

  loadJS();

}

$(function(){
  loadJS();
})

 function loadJS (){

   $('.format_class').change(function() {
     var item=$(this);
     console.log(item.val());
     var abc = $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").children().find( ".option_table" );

     if (item.val() == 1) {
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
     }
     else if (item.val() == 2) {
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", false);

       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
     }
     else if (item.val() == 3) {
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", false);

       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
     }
     else if (item.val() == 4) {
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
     }
     else if (item.val() == 5) {
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
     }
     else if (item.val() == 6) {
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
     }
     else if (item.val() == 7) {
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").children().find( ".placeholder_text" ).attr("disabled", true);

       $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
     }
   });

   $('.add_option').click(function(){
      var colCount = 1;
      $(this).closest( "tfoot" ).siblings("tbody").find( "tr" ).each(function () {
          colCount++;
      });

      $(this).closest( "tfoot" ).siblings("tbody").find( "tr:last" ).after('<tr>'+
          '<td valign="center">Option '+colCount+'</td>'+
          '<td class="s_weight" valign="center">'+
           '<input type="text" class="form-control option_text" name="option[]">'+
          '</td>'+
          '<td valign="center">'+
             '<a href="javascript:void(0)" class="delete_row_option">'+
               '<i class="fa fa-times-circle-o"></i>'+
             '</a>'+
          '</td>'+
      '</tr>');


        $('.delete_row_option').on("click",function(){

          var colCount_alert = 0;
          $(this).closest( "tbody" ).find( "tr" ).each(function () {
              colCount_alert++;
          });
          console.log(colCount_alert);
          if (colCount_alert == 1) {
            alert("Atleast One options are mandatory..");
          }else {
            $(this).closest('tr').remove();
          }

          var colCount = 0;
          $(this).closest( "tbody" ).find( "tr" ).each(function () {
              colCount++;
              $(this).closest( "tbody" ).find( "tr:nth-child("+colCount+") td:nth-child(1)").html('Option '+colCount);
          });

        });
   });

   $('.delete_row_option').on("click",function(){

     var colCount_alert = 0;
     $(this).closest( "tbody" ).find( "tr" ).each(function () {
         colCount_alert++;
     });
     console.log(colCount_alert);
     if (colCount_alert == 1) {
       alert("Atleast One options are mandatory..");
     }else {
       $(this).closest('tr').remove();
     }

     var colCount = 0;
     $(this).closest( "tbody" ).find( "tr" ).each(function () {
         colCount++;
         $(this).closest( "tbody" ).find( "tr:nth-child("+colCount+") td:nth-child(1)").html('Option '+colCount);
     });

   });

   $('.edit_question').click(function() {
      console.log("sadsjadh");
       $( this ).closest( ".row" ).siblings('.capsule').toggleClass('hidden');
    });

 }

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

      $('.codeQuesCheck_prog_mc').prop('checked', false);

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
  $('.codeQuesCheck_prog_mc').change(function() {
    var check;
    //$(this).closest('tbody');
     var table= $(this).closest('table');
     ($(this).is(":checked")) ?
          (

            $('td input:checkbox',table).prop('checked', true),
            check = $('td input:checkbox',table).map(function() {
              array_mc.push(this.value);
              return this.value;
            }).get(),

            $(this).closest('.tab-pane').find('.input_c_id').val(check),
            $(".delete_section_mc").removeClass('hidden')

          ) :

          ( $('td input:checkbox',table).prop('checked', false),
            array_mc = [],
            $(this).closest('.tab-pane').find('.input_c_id').val(''),
            $(".delete_section_mc").addClass('hidden')
          );

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

      $('.codeQuesCheck_prog_c').prop('checked', false);

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
  $('.codeQuesCheck_prog_c').change(function() {
    var check;
    //$(this).closest('tbody');
     var table= $(this).closest('table');
     ($(this).is(":checked")) ?
          (

            $('td input:checkbox',table).prop('checked', true),
            check = $('td input:checkbox',table).map(function() {
              array_c.push(this.value);
              return this.value;
            }).get(),

            $(this).closest('.tab-pane').find('.input_c_id').val(check),
            $(".delete_section_c").removeClass('hidden')

          ) :

          ( $('td input:checkbox',table).prop('checked', false),
            array_c = [],
            $(this).closest('.tab-pane').find('.input_c_id').val(''),
            $(".delete_section_c").addClass('hidden')
          );
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

      $('.codeQuesCheck_prog_s').prop('checked', false);

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
  $('.codeQuesCheck_prog_s').change(function() {
    var check;
    //$(this).closest('tbody');
     var table= $(this).closest('table');
     ($(this).is(":checked")) ?
          (

            $('td input:checkbox',table).prop('checked', true),
            check = $('td input:checkbox',table).map(function() {
              array_s.push(this.value);
              return this.value;
            }).get(),

            $(this).closest('.tab-pane').find('.input_c_id').val(check),
            $(".delete_section_s").removeClass('hidden')

          ) :

          ( $('td input:checkbox',table).prop('checked', false),
            array_s = [],
            $(this).closest('.tab-pane').find('.input_c_id').val(''),
            $(".delete_section_s").addClass('hidden')
          );
  });



  var public_question_mcq = [];
  $('.public_question_mcq').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();

      public_question_mcq.push(value);
      $(this).closest('tr').css('background-color', '#fff9ae');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", false);
      $(this).closest('tr').children('td:nth-child(5)').children('input').attr("disabled", false);
      $("#public_question_mcq_id").val(public_question_mcq);

      if (public_question_mcq.length >= 1) {
        $('#add_selected_question_button').removeClass('hidden');
        $('#add_selected_question_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_button').addClass('hidden');
        $('#add_selected_question_span').removeClass('hidden');
      }
    }
    else{
      removeItem = $(this).val();
      $("#public_question_mcq_id").val(public_question_mcq);

      if (public_question_mcq.length >= 1) {
        $('#add_selected_question_button').removeClass('hidden');
        $('#add_selected_question_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_button').addClass('hidden');
        $('#add_selected_question_span').removeClass('hidden');
      }
    }
  });
  $('.codeQuesCheck_public_question_mcq').change(function() {
    var check;
    var value;
    //$(this).closest('tbody');
     var table= $(this).closest('table');
     ($(this).is(":checked")) ?
          (
            $(this).closest('table').find('tr').css('background-color', '#fff9ae'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", false),
            $(this).closest('table').find('tr > td:nth-child(5) input').attr("disabled", false),
            $('td input:checkbox',table).prop('checked', true),
            check = $('td input:checkbox',table).map(function() {
              var index = public_question_mcq.indexOf(this.value);
              if (index > -1) {
              }else {
                public_question_mcq.push(this.value);
              }
              return this.value;
            }).get(),
            $('#public_question_mcq_id').val(public_question_mcq)
          ) :

          (
            $(this).closest('table').find('tr').css('background-color', '#fff'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", true),
            $(this).closest('table').find('tr > td:nth-child(5) input').attr("disabled", true),
            $('td input:checkbox',table).prop('checked', false),
            check = $('td input:checkbox',table).map(function(item) {
               var index = public_question_mcq.indexOf(this.value);
               if (index > -1) {
                 public_question_mcq.splice(index, 1);
               }
            }).get(),
            $('#public_question_mcq_id').val(public_question_mcq)
          );

      if (public_question_mcq.length >= 1) {
        $('#add_selected_question_button').removeClass('hidden');
        $('#add_selected_question_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_button').addClass('hidden');
        $('#add_selected_question_span').removeClass('hidden');
      }
  });

  $('.private_question_mcq').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();

      public_question_mcq.push(value);
      $(this).closest('tr').css('background-color', '#fff9ae');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", false);
      $(this).closest('tr').children('td:nth-child(5)').children('input').attr("disabled", false);
      $("#public_question_mcq_id").val(public_question_mcq);

      if (public_question_mcq.length >= 1) {
        $('#add_selected_question_button').removeClass('hidden');
        $('#add_selected_question_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_button').addClass('hidden');
        $('#add_selected_question_span').removeClass('hidden');
      }

    }
    else{
      removeItem = $(this).val();

      public_question_mcq = $.grep(public_question_mcq, function(value) {
        return value != removeItem;
      });

      $('.codeQuesCheck_private_question_mcq').prop('checked', false);

      $(this).closest('tr').css('background-color', '#fff');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", true);
      $(this).closest('tr').children('td:nth-child(5)').children('input').attr("disabled", true);
      $("#public_question_mcq_id").val(public_question_mcq);

      if (public_question_mcq.length >= 1) {
        $('#add_selected_question_button').removeClass('hidden');
        $('#add_selected_question_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_button').addClass('hidden');
        $('#add_selected_question_span').removeClass('hidden');
      }
    }
  });
  $('.codeQuesCheck_private_question_mcq').change(function() {
    var check;
    var value;
     var table= $(this).closest('table');
     ($(this).is(":checked")) ?
          (
            $(this).closest('table').find('tr').css('background-color', '#fff9ae'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", false),
            $(this).closest('table').find('tr > td:nth-child(5) input').attr("disabled", false),
            $('td input:checkbox',table).prop('checked', true),
            check = $('td input:checkbox',table).map(function() {
              var index = public_question_mcq.indexOf(this.value);
              if (index > -1) {
              }else {
                public_question_mcq.push(this.value);
              }
              return this.value;
            }).get(),

            $('#public_question_mcq_id').val(public_question_mcq)

          ) :
          (
            $(this).closest('table').find('tr').css('background-color', '#fff'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", true),
            $(this).closest('table').find('tr > td:nth-child(5) input').attr("disabled", true),
            $('td input:checkbox',table).prop('checked', false),
            check = $('td input:checkbox',table).map(function(item) {
               var index = public_question_mcq.indexOf(this.value);
               if (index > -1) {
                 public_question_mcq.splice(index, 1);
               }
            }).get(),
            $('#public_question_mcq_id').val(public_question_mcq)
          );


      if (public_question_mcq.length >= 1) {
        $('#add_selected_question_button').removeClass('hidden');
        $('#add_selected_question_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_button').addClass('hidden');
        $('#add_selected_question_span').removeClass('hidden');
      }
  });



});
