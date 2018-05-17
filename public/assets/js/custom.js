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
    // console.log('add click event');
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
      console.log(colCount_alert);

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
              // console.log($count);
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

      public_question_mcq = $.grep(public_question_mcq, function(value) {
        return value != removeItem;
      });

      $('.codeQuesCheck_public_question_mcq').prop('checked', false);

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


  var public_code_question_mcq = [];
  $('.public_code_question_mcq').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();

      public_code_question_mcq.push(value);
      $(this).closest('tr').css('background-color', '#fff9ae');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", false);
      $(this).closest('tr').children('td:nth-child(5)').children('input').attr("disabled", false);
      $("#public_code_question_mcq_id").val(public_code_question_mcq);

      if (public_code_question_mcq.length >= 1) {
        $('#add_selected_question_code_button').removeClass('hidden');
        $('#add_selected_question_code_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_code_button').addClass('hidden');
        $('#add_selected_question_code_span').removeClass('hidden');
      }
    }
    else{
      removeItem = $(this).val();

      public_code_question_mcq = $.grep(public_code_question_mcq, function(value) {
        return value != removeItem;
      });

      $('.codeQuesCheck_public_code_question_mcq').prop('checked', false);

      $(this).closest('tr').css('background-color', '#fff');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", true);
      $(this).closest('tr').children('td:nth-child(5)').children('input').attr("disabled", true);
      $("#public_code_question_mcq_id").val(public_code_question_mcq);


      if (public_code_question_mcq.length >= 1) {
        $('#add_selected_question_code_button').removeClass('hidden');
        $('#add_selected_question_code_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_code_button').addClass('hidden');
        $('#add_selected_question_code_span').removeClass('hidden');
      }
    }
  });
  $('.codeQuesCheck_public_code_question_mcq').change(function() {
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
              var index = public_code_question_mcq.indexOf(this.value);
              if (index > -1) {
              }else {
                public_code_question_mcq.push(this.value);
              }
              return this.value;
            }).get(),
            $('#public_code_question_mcq_id').val(public_code_question_mcq)
          ) :

          (
            $(this).closest('table').find('tr').css('background-color', '#fff'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", true),
            $(this).closest('table').find('tr > td:nth-child(5) input').attr("disabled", true),
            $('td input:checkbox',table).prop('checked', false),
            check = $('td input:checkbox',table).map(function(item) {
               var index = public_code_question_mcq.indexOf(this.value);
               if (index > -1) {
                 public_code_question_mcq.splice(index, 1);
               }
            }).get(),
            $('#public_code_question_mcq_id').val(public_code_question_mcq)
          );

      if (public_code_question_mcq.length >= 1) {
        $('#add_selected_question_code_button').removeClass('hidden');
        $('#add_selected_question_code_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_code_button').addClass('hidden');
        $('#add_selected_question_code_span').removeClass('hidden');
      }
  });

  $('.private_code_question_mcq').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();

      public_code_question_mcq.push(value);
      $(this).closest('tr').css('background-color', '#fff9ae');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", false);
      $(this).closest('tr').children('td:nth-child(5)').children('input').attr("disabled", false);
      $("#public_code_question_mcq_id").val(public_code_question_mcq);

      if (public_code_question_mcq.length >= 1) {
        $('#add_selected_question_code_button').removeClass('hidden');
        $('#add_selected_question_code_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_code_button').addClass('hidden');
        $('#add_selected_question_code_span').removeClass('hidden');
      }

    }
    else{
      removeItem = $(this).val();

      public_code_question_mcq = $.grep(public_code_question_mcq, function(value) {
        return value != removeItem;
      });

      $('.codeQuesCheck_private_code_question_mcq').prop('checked', false);

      $(this).closest('tr').css('background-color', '#fff');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", true);
      $(this).closest('tr').children('td:nth-child(5)').children('input').attr("disabled", true);
      $("#public_code_question_mcq_id").val(public_code_question_mcq);

      if (public_code_question_mcq.length >= 1) {
        $('#add_selected_question_code_button').removeClass('hidden');
        $('#add_selected_question_code_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_code_button').addClass('hidden');
        $('#add_selected_question_code_span').removeClass('hidden');
      }
    }
  });
  $('.codeQuesCheck_private_code_question_mcq').change(function() {
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
              var index = public_code_question_mcq.indexOf(this.value);
              if (index > -1) {
              }else {
                public_code_question_mcq.push(this.value);
              }
              return this.value;
            }).get(),

            $('#public_code_question_mcq_id').val(public_code_question_mcq)

          ) :
          (
            $(this).closest('table').find('tr').css('background-color', '#fff'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", true),
            $(this).closest('table').find('tr > td:nth-child(5) input').attr("disabled", true),
            $('td input:checkbox',table).prop('checked', false),
            check = $('td input:checkbox',table).map(function(item) {
               var index = public_code_question_mcq.indexOf(this.value);
               if (index > -1) {
                 public_code_question_mcq.splice(index, 1);
               }
            }).get(),
            $('#public_code_question_mcq_id').val(public_code_question_mcq)
          );


      if (public_code_question_mcq.length >= 1) {
        $('#add_selected_question_code_button').removeClass('hidden');
        $('#add_selected_question_code_span').addClass('hidden');
      }
      else {
        $('#add_selected_question_code_button').addClass('hidden');
        $('#add_selected_question_code_span').removeClass('hidden');
      }
  });


  var private_submission_question_mcq = [];
  $('.private_submission_question_mcq').change(function(){
    var value ;
    if($(this).is(":checked")) {
      value = $(this).val();

      private_submission_question_mcq.push(value);
      $(this).closest('tr').css('background-color', '#fff9ae');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", false);
      $("#private_submission_question_mcq_id").val(private_submission_question_mcq);

      if (private_submission_question_mcq.length >= 1) {
        $('#add_submission_question_code_button').removeClass('hidden');
        $('#add_submission_question_code_span').addClass('hidden');
      }
      else {
        $('#add_submission_question_code_button').addClass('hidden');
        $('#add_submission_question_code_span').removeClass('hidden');
      }

    }
    else{
      removeItem = $(this).val();

      private_submission_question_mcq = $.grep(private_submission_question_mcq, function(value) {
        return value != removeItem;
      });

      $('.codeQuesCheck_private_submission_question_mcq').prop('checked', false);

      $(this).closest('tr').css('background-color', '#fff');
      $(this).closest('tr').children('td:nth-child(4)').children('input').attr("disabled", true);
      $("#private_submission_question_mcq_id").val(private_submission_question_mcq);

      if (private_submission_question_mcq.length >= 1) {
        $('#add_submission_question_code_button').removeClass('hidden');
        $('#add_submission_question_code_span').addClass('hidden');
      }
      else {
        $('#add_submission_question_code_button').addClass('hidden');
        $('#add_submission_question_code_span').removeClass('hidden');
      }
    }
  });
  $('.codeQuesCheck_private_submission_question_mcq').change(function() {
    var check;
    var value;
     var table= $(this).closest('table');
     ($(this).is(":checked")) ?
          (
            $(this).closest('table').find('tr').css('background-color', '#fff9ae'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", false),
            $('td input:checkbox',table).prop('checked', true),
            check = $('td input:checkbox',table).map(function() {
              var index = private_submission_question_mcq.indexOf(this.value);
              if (index > -1) {
              }else {
                private_submission_question_mcq.push(this.value);
              }
              return this.value;
            }).get(),

            $('#private_submission_question_mcq_id').val(private_submission_question_mcq)

          ) :
          (
            $(this).closest('table').find('tr').css('background-color', '#fff'),
            $(this).closest('table').find('tr > td:nth-child(4) input').attr("disabled", true),
            $('td input:checkbox',table).prop('checked', false),
            check = $('td input:checkbox',table).map(function(item) {
               var index = private_submission_question_mcq.indexOf(this.value);
               if (index > -1) {
                 private_submission_question_mcq.splice(index, 1);
               }
            }).get(),
            $('#private_submission_question_mcq_id').val(private_submission_question_mcq)
          );


      if (private_submission_question_mcq.length >= 1) {
        $('#add_submission_question_code_button').removeClass('hidden');
        $('#add_submission_question_code_span').addClass('hidden');
      }
      else {
        $('#add_submission_question_code_button').addClass('hidden');
        $('#add_submission_question_code_span').removeClass('hidden');
      }
  });

});

$(function(){
  var url_string = window.location.href;
  var url = new URL(url_string);
  var c = url.searchParams.get("modal");
  $('#'+c).modal('show');
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
           '<textarea class="form-control choice" name="choice[]" required=""></textarea>'+
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
            '<textarea class="form-control choice" name="choice[]" required=""></textarea>'+
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
        // console.log(htmlString);
        $("#section-mcqs-Modal .fr-element.fr-view").html(htmlString);
        $("#edittemp_panel").removeClass('hidden');
        $("#preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function duplicate_values(mcqs) {
  for (var i = 0; i < mcqs.length; i++) {
    for (var j = i+1 ; j < mcqs.length; j++) {
      if (mcqs[i] == mcqs[j] && mcqs[i] != "") {
        var a = parseInt(i)+1;
        var b = parseInt(j)+1;

        return a+"-"+b;
      }
    }
  }
}

//Duplicate Test Template
function section_id(id) {
  $('#section_id_1').val(id);
  $('#section_id_2').val(id);
  $('#section_id_3').val(id);
  $('#section_id_4').val(id);
  $('#section_id_5').val(id);
  $('#section_id_6').val(id);
}
function edittesttemplate_Expand(id) {

  $('#section_id_1').val(id);
  $('#section_id_2').val(id);
  $('#section_id_3').val(id);


  testtemp_setInterval_Expand = setInterval(
    function(){

      var text = $( "#section-mcqs-Modal .fr-element.fr-view" ).text();

      var checkbox_Count = 0;
      $('#section_choices_table tbody tr td :checkbox').each(function () {
        if ($(this).is(":checked")) {
          checkbox_Count++;
        }
      });

      if (text.length <= 2 ) {
        $("#section-mcqs-Modal .header_span_commint").text("Please add atleast 3 characters in the question statement ");
        $("#section-mcqs-Modal .textarea_span_commint").text("Please add atleast 3 characters in the statement ");
        $("#section-mcqs-Modal .submit_button").attr("disabled", true);
      }
      else {
        $("#section-mcqs-Modal .header_span_commint").text("");
        $("#section-mcqs-Modal .textarea_span_commint").text("");

        var weightage_colCount = 1;
        var weightage = [];
        var sum = 0;
        $('#section_choices_table tbody tr').each(function () {
          var value = $('#section_choices_table tbody tr:nth-child('+weightage_colCount+') td:nth-child(4) input').val();
          weightage.push(value);
          sum += parseInt(value);
          weightage_colCount++;
        });

        var text_colCount = 1;
        var mcqs = [];
        $('#section_choices_table tbody tr').each(function () {
          var value = $('#section_choices_table tbody tr:nth-child('+text_colCount+') td:nth-child(3) .choice').val();
          mcqs.push(value);
          text_colCount++;
        });

        for (var i = 0; i < mcqs.length; i++) {
          if ($('#section_partial_marks:checked').length == 0) {

            if (mcqs[i] == "") {
              var j = parseInt(i)+1;
              $("#section-mcqs-Modal .header_span_commint").text("The option #"+j+" is blank");
              $("#section-mcqs-Modal .choice_span_commint").text("(The option #"+j+" is blank)");
              $("#section-mcqs-Modal .submit_button").attr("disabled", true);
              break;
            }else {

              $("#section-mcqs-Modal .choice_span_commint").text("");

              if (duplicate_values(mcqs)) {
                var data = duplicate_values(mcqs);
                var num = data.split('-');
                $("#section-mcqs-Modal .header_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#section-mcqs-Modal .choice_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#section-mcqs-Modal .submit_button").attr("disabled", true);
              }

              if (checkbox_Count >= 1 ){
                $("#section-mcqs-Modal .header_span_commint").text("");
                $("#section-mcqs-Modal .submit_button").attr("disabled", false);
              }else {
                $("#section-mcqs-Modal .header_span_commint").text("Please select at least one choice as correct answer for the question");
                $("#section-mcqs-Modal .submit_button").attr("disabled", true);
              }
            }

          }
          else {
            if (mcqs[i] == "") {
              var j = parseInt(i)+1;
              $("#section-mcqs-Modal .header_span_commint").text("The option #"+j+" is blank");
              $("#section-mcqs-Modal .choice_span_commint").text("(The option #"+j+" is blank)");
              $("#section-mcqs-Modal .submit_button").attr("disabled", true);
              break;
            }else{

              $("#section-mcqs-Modal .choice_span_commint").text("");
              $("#section-mcqs-Modal .header_span_commint").text("Please add atleast one option with 100 as partial marks weightage");

              if (duplicate_values(mcqs)) {
                var data = duplicate_values(mcqs);
                var num = data.split('-');
                $("#section-mcqs-Modal .header_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#section-mcqs-Modal .choice_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#section-mcqs-Modal .submit_button").attr("disabled", true);
              }

              $("#section-mcqs-Modal .submit_button").attr("disabled", true);

              if (sum >= 1) {
                for (var i = 0; i < weightage.length; i++) {
                  if (weightage[i] == 100) {
                    $("#section-mcqs-Modal .header_span_commint").text("");
                    $("#section-mcqs-Modal .submit_button").attr("disabled", false);
                  }else if(weightage[i] > 100){
                    var j = parseInt(i)+1;
                    $("#section-mcqs-Modal .header_span_commint").text("Please provide the partial marks weightage(0-100) for choice #"+j);
                    $("#section-mcqs-Modal .submit_button").attr("disabled", true);
                    return false;
                  }
                }
              }
            }
          }
        }
      }


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
      console.log("grfhg");
      var htmlString = $( "#section-coding-add-compilable-question-Modal-Collapse .fr-element.fr-view" ).html();
      $("#code_preview_data_section").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#section-coding-add-compilable-question-Modal .fr-element.fr-view").html(htmlString);
        $("#code_edittemp_panel").addClass('hidden');
        $("#code_preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
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
      // 1. Title
      var title = $( "#section-coding-add-compilable-question-Modal input[name='coding_program_title']" ).val();
      // 2. Statement
      var statement  = $( "#section-coding-add-compilable-question-Modal .fr-element.fr-view" ).text();
      // 3. Sample Input or Output
      var input_output = 1;
      var count_input_output = 0;
      $('#section_coding_table tbody tr').each(function () {
        var input = $('#section_coding_table tbody tr:nth-child('+input_output+') td:nth-child(2) textarea').val();
        var output = $('#section_coding_table tbody tr:nth-child('+input_output+') td:nth-child(3) textarea').val();

        if (input == "" || output == "") {
          count_input_output++;
        }
        input_output++;
      });
      // 4. Test Case
      var test_case_Count = 0;
      $('#weightage_code_table tbody tr').each(function (data) {
           test_case_Count++;
      });
      var test_case_result_Count = 0;
      $('#weightage_code_table tbody tr').each(function (data) {
        var result = $(this).find('.weightage_save').hasClass( "hidden" ).toString();
        if (result == "false") {
          test_case_result_Count++;
        }
      });
      // 5. Marks for this Question
      var marks = $( "#section-coding-add-compilable-question-Modal input[name='marks']" ).val();


      if (title.length <= 1 ) {
        $("#section-coding-add-compilable-question-Modal .header_span_commint").text("Please add the question title");
        $("#section-coding-add-compilable-question-Modal .submit_button").attr("disabled", true);
      }
      else if(statement.length <= 0){
        $("#section-coding-add-compilable-question-Modal .header_span_commint").text("Please add the question statement");
        $("#section-coding-add-compilable-question-Modal .submit_button").attr("disabled", true);
      }
      else if(count_input_output > 0){
        var count = parseInt(input_output)-1;
        $("#section-coding-add-compilable-question-Modal .header_span_commint").text("Please check Sample "+count+" for emptiness");
        $("#section-coding-add-compilable-question-Modal .submit_button").attr("disabled", true);
      }
      else {
        if (test_case_Count > 0) {
          if (test_case_result_Count > 0) {
            $("#section-coding-add-compilable-question-Modal .header_span_commint").text("Some test cases are not saved. Please upload the testCases");
            $("#section-coding-add-compilable-question-Modal .submit_button").attr("disabled", true);
          }else {
            $("#section-coding-add-compilable-question-Modal .header_span_commint").text("Please enter the marks");
            $("#section-coding-add-compilable-question-Modal .submit_button").attr("disabled", true);
            if (marks != "") {
              $("#section-coding-add-compilable-question-Modal .header_span_commint").text("");
              $("#section-coding-add-compilable-question-Modal .submit_button").attr("disabled", false);
            }
          }
        }else {
          $("#section-coding-add-compilable-question-Modal .header_span_commint").text("Please add test cases");
          $("#section-coding-add-compilable-question-Modal .submit_button").attr("disabled", true);
        }
      }

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

var code_debug_setInterval_Expand;
var code_debug_setInterval_Collapse;
function code_debug_Collapse() {
  clearInterval(code_debug_setInterval_Expand);
  code_debug_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#section-coding-debug-Modal-Collapse .fr-element.fr-view" ).html();
      $("#code_preview_data_debug").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#section-coding-debug-Modal .fr-element.fr-view").html(htmlString);
        $("#code_debug_panel").addClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
        $("#section-coding-debug-Modal .fr-element.fr-view").html(htmlString);
        $("#code_debug_panel").removeClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
     }
  , 1000);
}
function code_debug_Expand() {
  code_debug_setInterval_Expand = setInterval(
    function(){
      // 1. Title
      var title = $( "#section-coding-debug-Modal input[name='coding_program_title']" ).val();
      // 2. Statement
      var statement  = $( "#section-coding-debug-Modal .fr-element.fr-view" ).text();
      // 3. Test Case
      var test_case_Count = 0;
      $('#weightage_edit_code_table tbody tr').each(function (data) {
           test_case_Count++;
      });
      var test_case_result_Count = 0;
      $('#weightage_edit_code_table tbody tr').each(function (data) {
        var result = $(this).find('.weightage_save').hasClass( "hidden" ).toString();
        if (result == "false") {
          test_case_result_Count++;
        }
      });
      // 4. Marks for this Question
      var marks = $( "#section-coding-debug-Modal input[name='marks']" ).val();

      if (title.length <= 1 ) {
        $("#section-coding-debug-Modal .header_span_commint").text("Please add the question title");
        $("#section-coding-debug-Modal .submit_button").attr("disabled", true);
      }
      else if(statement.length <= 0){
        $("#section-coding-debug-Modal .header_span_commint").text("Please add the question statement");
        $("#section-coding-debug-Modal .submit_button").attr("disabled", true);
      }
      else {
        if (test_case_Count > 0) {
          if (test_case_result_Count > 0) {
            $("#section-coding-debug-Modal .header_span_commint").text("Some test cases are not saved. Please upload the testCases");
            $("#section-coding-debug-Modal .submit_button").attr("disabled", true);
          }else {
            $("#section-coding-debug-Modal .header_span_commint").text("Please enter the marks");
            $("#section-coding-debug-Modal .submit_button").attr("disabled", true);
            if (marks != "") {
              $("#section-coding-debug-Modal .header_span_commint").text("");
              $("#section-coding-debug-Modal .submit_button").attr("disabled", false);
            }
          }
        }else {
          $("#section-coding-debug-Modal .header_span_commint").text("Please add test cases");
          $("#section-coding-debug-Modal .submit_button").attr("disabled", true);
        }
      }

      var htmlString = $( "#section-coding-debug-Modal .fr-element.fr-view" ).html();
      $("#code_preview_data_debug").html(htmlString);
      $("#section-coding-debug-Modal-Collapse .fr-element.fr-view").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#code_debug_panel").addClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
      else {
        $("#code_debug_panel").removeClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
     }
  , 1000);
}
function code_debug_collapse_modal() {
  $("#section-coding-debug-Modal-Collapse").modal('hide');
  $("#section-coding-debug-Modal").css('overflow','scroll');
  clearInterval(code_debug_setInterval_Collapse);
  code_debug_Expand();
}

var submission_testtemp_setInterval_Expand;
var submission_testtemp_setInterval_Collapse;
function submission_edittesttemplate_Expand() {
  clearInterval(submission_testtemp_setInterval_Collapse);
  submission_testtemp_setInterval_Expand = setInterval(
    function(){
      // 1. Question Statement
      var text = $( "#section-submission-question-Modal .fr-element.fr-view" ).text();
      // 2. Candidate can use
      var checkbox_Count = 0;
      $("#section-submission-question-Modal input[name='help_material_name[]']").each( function () {
    		if ($(this).is(":checked")) {
          checkbox_Count++;
        }
    	});

      if (text.length <= 2 ) {
        $("#section-submission-question-Modal .header_span_commint").text("Please add atleast 3 characters in the question statement ");
        $("#section-submission-question-Modal .submit_button").attr("disabled", true);
      }
      else {
        $("#section-submission-question-Modal .header_span_commint").text("Please select atleast one resource allowed by candidate to upload");
        $("#section-submission-question-Modal .submit_button").attr("disabled", true);

        if(checkbox_Count > 0){
          $("#section-submission-question-Modal .header_span_commint").text("");
          $("#section-submission-question-Modal .submit_button").attr("disabled", false);
        }
      }

      var htmlString = $( "#section-submission-question-Modal .fr-element.fr-view" ).html();

      if (htmlString == "<p><br></p>") {
        $("#section-submission-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").addClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
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
  clearInterval(submission_testtemp_setInterval_Collapse);
  submission_edittesttemplate_Expand();
}

var submission_fill_testtemp_setInterval_Expand;
var submission_fill_testtemp_setInterval_Collapse;
function submission_fill_edittesttemplate_Expand() {
  clearInterval(submission_fill_testtemp_setInterval_Collapse);
  submission_fill_testtemp_setInterval_Expand = setInterval(
    function(){
      // 1. Question Statement
      var text = $( "#section-submission-fill-blanks-question-Modal .fr-element.fr-view" ).text();
      if (text.length <= 2 ) {
        $("#section-submission-fill-blanks-question-Modal .header_span_commint").text("Please add atleast 3 characters in the question statement ");
        $("#section-submission-fill-blanks-question-Modal .submit_button").attr("disabled", true);
      }
      else {
        $("#section-submission-fill-blanks-question-Modal .header_span_commint").text("");
        $("#section-submission-fill-blanks-question-Modal .submit_button").attr("disabled", false);
      }

      var htmlString = $( "#section-submission-fill-blanks-question-Modal .fr-element.fr-view" ).html();

      if (htmlString == "<p><br></p>") {
        $("#section-submission-fill-blanks-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").addClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
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
  clearInterval(submission_fill_testtemp_setInterval_Collapse);
  submission_fill_edittesttemplate_Expand();
}

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
           '<textarea class="form-control choice" name="choice[]" required=""></textarea>'+
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
            '<textarea class="form-control choice" name="choice[]" required=""></textarea>'+
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
               // console.log($count);
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


}

function moreSettings_code() {
  $('.moreSettings_code').removeClass('hidden');
  $('.moreSettings_button_code').addClass('hidden');
}
function moreSettings_submission() {
  $('.moreSettings_submission').removeClass('hidden');
  $('.moreSettings_button_submission').addClass('hidden');
}

var publicpageview_setInterval;
function publicpageview_start() {
  publicpageview_setInterval = setInterval(
    function(){

      var objVal = $('#publicpageview_title').val();
      if(objVal != ''){
        $('#publicpageview_title_data').html(objVal);
      }


      var description = $( "#publicpageview_text_editor .fr-element.fr-view" ).html();
      $("#publicpageview_description_data").html(description);

     }
  , 1000);
}
function publicpageview_stop() {
  clearInterval(publicpageview_setInterval);
}

var add_publicpageview_setInterval;
function add_publicpageview_start() {
  add_publicpageview_setInterval = setInterval(
    function(){

      var objVal = $('#add_publicpageview_title').val();
      if(objVal != ''){
        $('#add_publicpageview_title_data').html(objVal);
      }


      var description = $( "#add_publicpageview_text_editor .fr-element.fr-view" ).html();
      $("#add_publicpageview_description_data").html(description);

     }
  , 1000);
}
function add_publicpageview_stop() {
  clearInterval(add_publicpageview_setInterval);
}

var pencil_testtemp_setInterval_Expand;
var pencil_testtemp_setInterval_Collapse;
var count_method = 0;
function pencil_edittesttemplate_Expand() {
  pencil_testtemp_setInterval_Expand = setInterval(
    function(){
      console.log("asdasdas");
      var text = $( "#modal_pencil .fr-element.fr-view" ).text();

      var checkbox_Count = 0;

      $('#modal_pencil #section_choices_table tbody tr td :checkbox').each(function () {
        if ($(this).is(":checked")) {
          checkbox_Count++;
        }
      });

      if (text.length <= 2 ) {
        $("#modal_pencil .header_span_commint").text("Please add atleast 3 characters in the question statement ");
        $("#modal_pencil .textarea_span_commint").text("Please add atleast 3 characters in the statement ");
        $("#modal_pencil .submit_button").attr("disabled", true);
      }
      else {
        $("#modal_pencil .header_span_commint").text("");
        $("#modal_pencil .textarea_span_commint").text("");

        var weightage_colCount = 1;
        var weightage = [];
        var sum = 0;
        $('#modal_pencil #section_choices_table tbody tr').each(function () {
          var value = $('#modal_pencil #section_choices_table tbody tr:nth-child('+weightage_colCount+') td:nth-child(4) input').val();
          weightage.push(value);
          sum += parseInt(value);
          weightage_colCount++;
        });

        var text_colCount = 1;
        var mcqs = [];
        $('#modal_pencil #section_choices_table tbody tr').each(function () {
          var value = $('#modal_pencil #section_choices_table tbody tr:nth-child('+text_colCount+') td:nth-child(3) .choice').val();
          mcqs.push(value);
          text_colCount++;
        });

        for (var i = 0; i < mcqs.length; i++) {
          if ($('#section_partial_marks:checked').length == 0) {

            if (mcqs[i] == "") {
              var j = parseInt(i)+1;
              $("#modal_pencil .header_span_commint").text("The option #"+j+" is blank");
              $("#modal_pencil .choice_span_commint").text("(The option #"+j+" is blank)");
              $("#modal_pencil .submit_button").attr("disabled", true);
              break;
            }else {

              $("#modal_pencil .choice_span_commint").text("");

              if (duplicate_values(mcqs)) {
                var data = duplicate_values(mcqs);
                var num = data.split('-');
                $("#modal_pencil .header_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#modal_pencil .choice_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#modal_pencil .submit_button").attr("disabled", true);
              }

              if (checkbox_Count >= 1 ){
                $("#modal_pencil .header_span_commint").text("");
                $("#modal_pencil .submit_button").attr("disabled", false);
              }else {
                $("#modal_pencil .header_span_commint").text("Please select at least one choice as correct answer for the question");
                $("#modal_pencil .submit_button").attr("disabled", true);
              }
            }

          }
          else {
            if (mcqs[i] == "") {
              var j = parseInt(i)+1;
              $("#modal_pencil .header_span_commint").text("The option #"+j+" is blank");
              $("#modal_pencil .choice_span_commint").text("(The option #"+j+" is blank)");
              $("#modal_pencil .submit_button").attr("disabled", true);
              break;
            }else{

              $("#modal_pencil .choice_span_commint").text("");
              $("#modal_pencil .header_span_commint").text("Please add atleast one option with 100 as partial marks weightage");

              if (duplicate_values(mcqs)) {
                var data = duplicate_values(mcqs);
                var num = data.split('-');
                $("#modal_pencil .header_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#modal_pencil .choice_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#modal_pencil .submit_button").attr("disabled", true);
              }

              $("#modal_pencil .submit_button").attr("disabled", true);

              if (sum >= 1) {
                for (var i = 0; i < weightage.length; i++) {
                  if (weightage[i] == 100) {
                    $("#modal_pencil .header_span_commint").text("");
                    $("#modal_pencil .submit_button").attr("disabled", false);
                  }else if(weightage[i] > 100){
                    var j = parseInt(i)+1;
                    $("#modal_pencil .header_span_commint").text("Please provide the partial marks weightage(0-100) for choice #"+j);
                    $("#modal_pencil .submit_button").attr("disabled", true);
                    return false;
                  }
                }
              }
            }
          }
        }
      }


      var htmlString = $( "#modal_pencil .fr-element.fr-view" ).html();
      $("#pencil_preview_data_section").html(htmlString);
      $("#modal_pencil_Collapse .fr-element.fr-view").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#edittemp_pencil_panel").addClass('hidden');
        $("#pencil_preview_data_section_expand").html(htmlString);
      }
      else {
        $("#edittemp_pencil_panel").removeClass('hidden');
        $("#pencil_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function pencil_edittesttemplate_Collapse() {
  count_method++;
  clearInterval(pencil_testtemp_setInterval_Expand);
  pencil_testtemp_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#modal_pencil_Collapse .fr-element.fr-view" ).html();
      $("#pencil_preview_data_section").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#edittemp_pencil_panel").addClass('hidden');
        $("#modal_pencil .fr-element.fr-view").html(htmlString);
        $("#pencil_preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
        $("#modal_pencil .fr-element.fr-view").html(htmlString);
        $("#edittemp_pencil_panel").removeClass('hidden');
        $("#pencil_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function pencil_collapse_modal() {
  $("#modal_pencil_Collapse").modal('hide');
  $("#modal_pencil").css('overflow','scroll');
  clearInterval(pencil_testtemp_setInterval_Collapse);
  pencil_edittesttemplate_Expand();
}

if (count_method == 0) {
  pencil_edittesttemplate_Expand();
}


var private_mcqs_Modal_setInterval_Expand;
var private_mcqs_Modal_setInterval_Collapse;
function private_mcqs_Modal_Collapse() {
  clearInterval(private_mcqs_Modal_setInterval_Expand);
  private_mcqs_Modal_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#private-mcqs-Modal-Collapse .fr-element.fr-view" ).html();
      $("#preview_data_section").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#edittemp_panel").addClass('hidden');
        $("#private-mcqs-Modal .fr-element.fr-view").html(htmlString);
        $("#preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
        $("#private-mcqs-Modal .fr-element.fr-view").html(htmlString);
        $("#edittemp_panel").removeClass('hidden');
        $("#preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_mcqs_Modal_Expand() {
  private_mcqs_Modal_setInterval_Expand = setInterval(
    function(){

      var text = $( "#private-mcqs-Modal .fr-element.fr-view" ).text();

      var checkbox_Count = 0;
      $('#section_choices_table tbody tr td :checkbox').each(function () {
        if ($(this).is(":checked")) {
          checkbox_Count++;
        }
      });

      if (text.length <= 2 ) {
        $("#private-mcqs-Modal .header_span_commint").text("Please add atleast 3 characters in the question statement ");
        $("#private-mcqs-Modal .textarea_span_commint").text("Please add atleast 3 characters in the statement ");
        $("#private-mcqs-Modal .submit_button").attr("disabled", true);
      }
      else {
        $("#private-mcqs-Modal .header_span_commint").text("");
        $("#private-mcqs-Modal .textarea_span_commint").text("");

        var weightage_colCount = 1;
        var weightage = [];
        var sum = 0;
        $('#section_choices_table tbody tr').each(function () {
          var value = $('#section_choices_table tbody tr:nth-child('+weightage_colCount+') td:nth-child(4) input').val();
          weightage.push(value);
          sum += parseInt(value);
          weightage_colCount++;
        });

        var text_colCount = 1;
        var mcqs = [];
        $('#section_choices_table tbody tr').each(function () {
          var value = $('#section_choices_table tbody tr:nth-child('+text_colCount+') td:nth-child(3) .choice').val();
          mcqs.push(value);
          text_colCount++;
        });

        for (var i = 0; i < mcqs.length; i++) {
          if ($('#section_partial_marks:checked').length == 0) {

            if (mcqs[i] == "") {
              var j = parseInt(i)+1;
              $("#private-mcqs-Modal .header_span_commint").text("The option #"+j+" is blank");
              $("#private-mcqs-Modal .choice_span_commint").text("(The option #"+j+" is blank)");
              $("#private-mcqs-Modal .submit_button").attr("disabled", true);
              break;
            }else {

              $("#private-mcqs-Modal .choice_span_commint").text("");

              if (duplicate_values(mcqs)) {
                var data = duplicate_values(mcqs);
                var num = data.split('-');
                $("#private-mcqs-Modal .header_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#private-mcqs-Modal .choice_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#private-mcqs-Modal .submit_button").attr("disabled", true);
              }

              if (checkbox_Count >= 1 ){
                $("#private-mcqs-Modal .header_span_commint").text("");
                $("#private-mcqs-Modal .submit_button").attr("disabled", false);
              }else {
                $("#private-mcqs-Modal .header_span_commint").text("Please select at least one choice as correct answer for the question");
                $("#private-mcqs-Modal .submit_button").attr("disabled", true);
              }
            }

          }
          else {
            if (mcqs[i] == "") {
              var j = parseInt(i)+1;
              $("#private-mcqs-Modal .header_span_commint").text("The option #"+j+" is blank");
              $("#private-mcqs-Modal .choice_span_commint").text("(The option #"+j+" is blank)");
              $("#private-mcqs-Modal .submit_button").attr("disabled", true);
              break;
            }else{

              $("#private-mcqs-Modal .choice_span_commint").text("");
              $("#private-mcqs-Modal .header_span_commint").text("Please add atleast one option with 100 as partial marks weightage");

              if (duplicate_values(mcqs)) {
                var data = duplicate_values(mcqs);
                var num = data.split('-');
                $("#private-mcqs-Modal .header_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#private-mcqs-Modal .choice_span_commint").text("The options #"+num[0]+" and #"+num[1]+" are same");
                $("#private-mcqs-Modal .submit_button").attr("disabled", true);
              }

              $("#private-mcqs-Modal .submit_button").attr("disabled", true);

              if (sum >= 1) {
                for (var i = 0; i < weightage.length; i++) {
                  if (weightage[i] == 100) {
                    $("#private-mcqs-Modal .header_span_commint").text("");
                    $("#private-mcqs-Modal .submit_button").attr("disabled", false);
                  }else if(weightage[i] > 100){
                    var j = parseInt(i)+1;
                    $("#private-mcqs-Modal .header_span_commint").text("Please provide the partial marks weightage(0-100) for choice #"+j);
                    $("#private-mcqs-Modal .submit_button").attr("disabled", true);
                    return false;
                  }
                }
              }
            }
          }
        }
      }


      var htmlString = $( "#private-mcqs-Modal .fr-element.fr-view" ).html();
      $("#preview_data_section").html(htmlString);
      $("#private-mcqs-Modal-Collapse .fr-element.fr-view").html(htmlString);

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
function private_mcqs_Modal_collapse_modal() {
  $("#private-mcqs-Modal-Collapse").modal('hide');
  $("#private-mcqs-Modal").css('overflow','scroll');
  clearInterval(private_mcqs_Modal_setInterval_Collapse);
  private_mcqs_Modal_Expand();
}

var private_programming_question_setInterval_Expand;
var private_programming_question_setInterval_Collapse;
function private_programming_question_Collapse() {
  clearInterval(private_programming_question_setInterval_Expand);
  private_programming_question_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#private-programming-question-Modal-Collapse .fr-element.fr-view" ).html();
      $("#code_preview_data_section").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#private-programming-question-Modal .fr-element.fr-view").html(htmlString);
        $("#code_edittemp_panel").addClass('hidden');
        $("#code_preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
        $("#private-programming-question-Modal .fr-element.fr-view").html(htmlString);
        $("#code_edittemp_panel").removeClass('hidden');
        $("#code_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_programming_question_Expand() {
  private_programming_question_setInterval_Expand = setInterval(
    function(){
      // 1. Title
      var title = $( "#private-programming-question-Modal input[name='coding_program_title']" ).val();
      // 2. Statement
      var statement  = $( "#private-programming-question-Modal .fr-element.fr-view" ).text();
      // 3. Sample Input or Output
      var input_output = 1;
      var count_input_output = 0;
      $('#section_coding_table tbody tr').each(function () {
        var input = $('#section_coding_table tbody tr:nth-child('+input_output+') td:nth-child(2) textarea').val();
        var output = $('#section_coding_table tbody tr:nth-child('+input_output+') td:nth-child(3) textarea').val();

        if (input == "" || output == "") {
          count_input_output++;
        }
        input_output++;
      });
      // 4. Test Case
      var test_case_Count = 0;
      $('#weightage_code_table tbody tr').each(function (data) {
           test_case_Count++;
      });
      var test_case_result_Count = 0;
      $('#weightage_code_table tbody tr').each(function (data) {
        var result = $(this).find('.weightage_save').hasClass( "hidden" ).toString();
        if (result == "false") {
          test_case_result_Count++;
        }
      });
      // 5. Marks for this Question
      var marks = $( "#private-programming-question-Modal input[name='marks']" ).val();


      if (title.length <= 1 ) {
        $("#private-programming-question-Modal .header_span_commint").text("Please add the question title");
        $("#private-programming-question-Modal .submit_button").attr("disabled", true);
      }
      else if(statement.length <= 0){
        $("#private-programming-question-Modal .header_span_commint").text("Please add the question statement");
        $("#private-programming-question-Modal .submit_button").attr("disabled", true);
      }
      else if(count_input_output > 0){
        var count = parseInt(input_output)-1;
        $("#private-programming-question-Modal .header_span_commint").text("Please check Sample "+count+" for emptiness");
        $("#private-programming-question-Modal .submit_button").attr("disabled", true);
      }
      else {
        if (test_case_Count > 0) {
          if (test_case_result_Count > 0) {
            $("#private-programming-question-Modal .header_span_commint").text("Some test cases are not saved. Please upload the testCases");
            $("#private-programming-question-Modal .submit_button").attr("disabled", true);
          }else {
            $("#private-programming-question-Modal .header_span_commint").text("Please enter the marks");
            $("#private-programming-question-Modal .submit_button").attr("disabled", true);
            if (marks != "") {
              $("#private-programming-question-Modal .header_span_commint").text("");
              $("#private-programming-question-Modal .submit_button").attr("disabled", false);
            }
          }
        }else {
          $("#private-programming-question-Modal .header_span_commint").text("Please add test cases");
          $("#private-programming-question-Modal .submit_button").attr("disabled", true);
        }
      }

      var htmlString = $( "#private-programming-question-Modal .fr-element.fr-view" ).html();
      $("#code_preview_data_section").html(htmlString);
      $("#private-programming-question-Modal-Collapse .fr-element.fr-view").html(htmlString);

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
function private_programming_question_collapse_modal() {
  $("#private-programming-question-Modal-Collapse").modal('hide');
  $("#private-programming-question-Modal").css('overflow','scroll');
  clearInterval(private_programming_question_setInterval_Collapse);
  private_programming_question_Expand();
}

var private_programming_debug_setInterval_Expand;
var private_programming_debug_setInterval_Collapse;
function private_programming_debug_Collapse() {
  clearInterval(private_programming_debug_setInterval_Expand);
  private_programming_debug_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#private-programming-debug-Modal-Collapse .fr-element.fr-view" ).html();
      $("#code_preview_data_debug").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#private-programming-debug-Modal .fr-element.fr-view").html(htmlString);
        $("#code_debug_panel").addClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
        $("#private-programming-debug-Modal .fr-element.fr-view").html(htmlString);
        $("#code_debug_panel").removeClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_programming_debug_Expand() {
  private_programming_debug_setInterval_Expand = setInterval(
    function(){
      // 1. Title
      var title = $( "#private-programming-debug-Modal input[name='coding_program_title']" ).val();
      // 2. Statement
      var statement  = $( "#private-programming-debug-Modal .fr-element.fr-view" ).text();
      // 3. Test Case
      var test_case_Count = 0;
      $('#weightage_edit_code_table tbody tr').each(function (data) {
           test_case_Count++;
      });
      var test_case_result_Count = 0;
      $('#weightage_edit_code_table tbody tr').each(function (data) {
        var result = $(this).find('.weightage_save').hasClass( "hidden" ).toString();
        if (result == "false") {
          test_case_result_Count++;
        }
      });
      // 4. Marks for this Question
      var marks = $( "#private-programming-debug-Modal input[name='marks']" ).val();

      if (title.length <= 1 ) {
        $("#private-programming-debug-Modal .header_span_commint").text("Please add the question title");
        $("#private-programming-debug-Modal .submit_button").attr("disabled", true);
      }
      else if(statement.length <= 0){
        $("#private-programming-debug-Modal .header_span_commint").text("Please add the question statement");
        $("#private-programming-debug-Modal .submit_button").attr("disabled", true);
      }
      else {
        if (test_case_Count > 0) {
          if (test_case_result_Count > 0) {
            $("#private-programming-debug-Modal .header_span_commint").text("Some test cases are not saved. Please upload the testCases");
            $("#private-programming-debug-Modal .submit_button").attr("disabled", true);
          }else {
            $("#private-programming-debug-Modal .header_span_commint").text("Please enter the marks");
            $("#private-programming-debug-Modal .submit_button").attr("disabled", true);
            if (marks != "") {
              $("#private-programming-debug-Modal .header_span_commint").text("");
              $("#private-programming-debug-Modal .submit_button").attr("disabled", false);
            }
          }
        }else {
          $("#private-programming-debug-Modal .header_span_commint").text("Please add test cases");
          $("#private-programming-debug-Modal .submit_button").attr("disabled", true);
        }
      }

      var htmlString = $( "#private-programming-debug-Modal .fr-element.fr-view" ).html();
      $("#code_preview_data_debug").html(htmlString);
      $("#private-programming-debug-Modal-Collapse .fr-element.fr-view").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#code_debug_panel").addClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
      else {
        $("#code_debug_panel").removeClass('hidden');
        $("#code_preview_data_debug_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_programming_debug_collapse_modal() {
  $("#private-programming-debug-Modal-Collapse").modal('hide');
  $("#private-programming-debug-Modal").css('overflow','scroll');
  clearInterval(private_programming_debug_setInterval_Collapse);
  private_programming_debug_Expand();
}

var private_submission_question_setInterval_Expand;
var private_submission_question_setInterval_Collapse;
function private_submission_question_Expand() {
  clearInterval(private_submission_question_setInterval_Collapse);
  private_submission_question_setInterval_Expand = setInterval(
    function(){
      // 1. Question Statement
      var text = $( "#private-submission-question-Modal .fr-element.fr-view" ).text();
      // 2. Candidate can use
      var checkbox_Count = 0;
      $("#private-submission-question-Modal input[name='help_material_name[]']").each( function () {
        if ($(this).is(":checked")) {
          checkbox_Count++;
        }
      });

      if (text.length <= 2 ) {
        $("#private-submission-question-Modal .header_span_commint").text("Please add atleast 3 characters in the question statement ");
        $("#private-submission-question-Modal .submit_button").attr("disabled", true);
      }
      else {
        $("#private-submission-question-Modal .header_span_commint").text("Please select atleast one resource allowed by candidate to upload");
        $("#private-submission-question-Modal .submit_button").attr("disabled", true);

        if(checkbox_Count > 0){
          $("#private-submission-question-Modal .header_span_commint").text("");
          $("#private-submission-question-Modal .submit_button").attr("disabled", false);
        }
      }

      var htmlString = $( "#private-submission-question-Modal .fr-element.fr-view" ).html();

      if (htmlString == "<p><br></p>") {
        $("#private-submission-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").addClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
        $("#private-submission-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").removeClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_submission_question_Collapse() {
  clearInterval(private_submission_question_setInterval_Expand);
  private_submission_question_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#private-submission-question-Modal-collapse .fr-element.fr-view" ).html();
      $("#submission_preview_data_section_collapse").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#private-submission-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").addClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
      else {
        $("#private-submission-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_edittemp_panel").removeClass('hidden');
        $("#submission_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_submission_question_collapse_modal() {
  $("#private-submission-question-Modal-collapse").modal('hide');
  $("#private-submission-question-Modal").css('overflow','scroll');
  clearInterval(private_submission_question_setInterval_Collapse);
  private_submission_question_Expand();
}

var private_submission_fill_blanks_question_setInterval_Expand;
var private_submission_fill_blanks_question_setInterval_Collapse;
function private_submission_fill_blanks_question_Expand() {
  clearInterval(private_submission_fill_blanks_question_setInterval_Collapse);
  private_submission_fill_blanks_question_setInterval_Expand = setInterval(
    function(){
      // 1. Question Statement
      var text = $( "#private-submission-fill-blanks-question-Modal .fr-element.fr-view" ).text();
      if (text.length <= 2 ) {
        $("#private-submission-fill-blanks-question-Modal .header_span_commint").text("Please add atleast 3 characters in the question statement ");
        $("#private-submission-fill-blanks-question-Modal .submit_button").attr("disabled", true);
      }
      else {
        $("#private-submission-fill-blanks-question-Modal .header_span_commint").text("");
        $("#private-submission-fill-blanks-question-Modal .submit_button").attr("disabled", false);
      }

      var htmlString = $( "#private-submission-fill-blanks-question-Modal .fr-element.fr-view" ).html();

      if (htmlString == "<p><br></p>") {
        $("#private-submission-fill-blanks-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").addClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
      else {
        // console.log(htmlString);
        $("#private-submission-fill-blanks-question-Modal-collapse .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").removeClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_submission_fill_blanks_question_Collapse() {
  clearInterval(private_submission_fill_blanks_question_setInterval_Expand);
  private_submission_fill_blanks_question_setInterval_Collapse = setInterval(
    function(){
      var htmlString = $( "#private-submission-fill-blanks-question-Modal-collapse .fr-element.fr-view" ).html();
      $("#submission_fill_preview_data_section_collapse").html(htmlString);

      if (htmlString == "<p><br></p>") {
        $("#private-submission-fill-blanks-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").addClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
      else {
        $("#private-submission-fill-blanks-question-Modal .fr-element.fr-view").html(htmlString);
        $("#submission_fill_edittemp_panel").removeClass('hidden');
        $("#submission_fill_preview_data_section_expand").html(htmlString);
      }
     }
  , 1000);
}
function private_submission_fill_blanks_question_collapse_modal() {
  $("#private-submission-fill-blanks-question-Modal-collapse").modal('hide');
  $("#private-submission-fill-blanks-question-Modal").css('overflow','scroll');
  clearInterval(private_submission_fill_blanks_question_setInterval_Collapse);
  private_submission_fill_blanks_question_Expand();
}


