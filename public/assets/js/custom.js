$( document ).ready(function() {

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

      $('#weightage_row tbody tr:nth-child('+colCount_value+') td:nth-child(5)').html('<div class="col-md-offset-1 col-md-4"><input type="number" id="weightage" name="weightage" class="form-control input-md" value="'+s_value+'" disabled="disabled"></div><div class="col-md-7"><button class="btn btn-info btn-sm"><i class="fa fa-floppy-o"></i> Save</button><button class="btn btn-default btn-sm delete_row"><i class="fa fa-times"></i></button></div>');
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

});



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

// function addrow_codingquestion() {
//    var colCount = 0;
//    $('#coding_qustion_table tbody tr').each(function () {
//        colCount++;
//
//        console.log(colCount);
//    });
//
//    if (colCount == 1) {
//      $('#coding_qustion_table tbody').append('<tr>'+
//        '<td valign="center">'+colCount+'.</td>'+
//        '<td valign="center">'+
//            '<textarea class="form-control" name="option" required=""></textarea>'+
//        '</td>'+
//        '<td valign="center">'+
//            '<textarea class="form-control" name="option" required=""></textarea>'+
//        '</td>'+
//        '<td valign="center">'+
//            '<a class="delete_row">'+
//             '<i class="fa fa-times-circle-o"></i>'+
//            '</a>'+
//        '</td>'+
//      '</tr>');
//    }
//    else {
//      $('#coding_qustion_table tbody tr:last').after('<tr>'+
//      '<td valign="center">'+colCount+'.</td>'+
//      '<td valign="center">'+
//      '<textarea class="form-control" name="option" required=""></textarea>'+
//      '</td>'+
//      '<td valign="center">'+
//      '<textarea class="form-control" name="option" required=""></textarea>'+
//      '</td>'+
//      '<td valign="center">'+
//      '<a class="delete_row">'+
//      '<i class="fa fa-times-circle-o"></i>'+
//      '</a>'+
//      '</td>'+
//      '</tr>');
//    }
//
// }
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
         '<input type="text" class="form-control" name="option" required="" >'+
       '</td>'+
       '<td valign="center">'+
         '<textarea class="form-control" name="input" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
         '<textarea class="form-control" name="output" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
         '<div class="col-md-offset-1 col-md-4">'+
           '<input type="number" id="weightage" name="weightage" class="form-control input-md" value="100" disabled="disabled">'+
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
         '<input type="text" class="form-control" name="option" required="" >'+
       '</td>'+
       '<td valign="center">'+
         '<textarea class="form-control" name="input" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
         '<textarea class="form-control" name="output" required=""></textarea>'+
       '</td>'+
       '<td valign="center">'+
         '<div class="col-md-offset-1 col-md-4">'+
           '<input type="number" id="weightage" name="weightage" class="form-control input-md" disabled="disabled">'+
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

      $('#weightage_row tbody tr:nth-child('+colCount_value+') td:nth-child(5)').html('<div class="col-md-offset-1 col-md-4"><input type="number" id="weightage" name="weightage" class="form-control input-md" value="'+s_value+'" disabled="disabled"></div><div class="col-md-7"><button class="btn btn-info btn-sm"><i class="fa fa-floppy-o"></i> Save</button><button class="btn btn-default btn-sm delete_row"><i class="fa fa-times"></i></button></div>');

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
