
$("#weightage_table").on('keyup', '.weightage_no', function( event ) {

  if ($(this).val().length > 0) {
    $(this).closest('td').siblings().children('.save_button').attr("disabled", false);
  }
  else {
    $(this).closest('td').siblings().children('.save_button').attr("disabled", true);
  }

  if(parseInt($(this).val()) > 100){
    console.log($(this).val());
    $(this).closest('td').siblings().children('.save_button').attr("disabled", true);
  }

});

$("#weightage_table").on('click', '.equalize', function () {

  var colCount = 0;
  $('#weightage_table tbody tr').each(function (data) {
    colCount++;
  });

  colCount = colCount - 1 ;

  var total = 100;
  var count = colCount;
  var colCount_value = 0;
  $('#weightage_table tbody tr').each(function () {
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

    $('#weightage_table tbody tr:nth-child('+colCount_value+') td:nth-child(2)').find('.weightage_no').val(s_value);
    $('#weightage_table tbody tr:nth-child('+colCount_value+') td:nth-child(2)').find('.weightage_no_view').html(s_value);
    count--;
  });

});

$("#weightage_table").on('click', '.save_button', function() {
  var title = $(this).closest('td').siblings().find('.weightage_title').val();
  var no = $(this).closest('td').siblings().find('.weightage_no').val();
  $('#weightage_table tbody tr:first').before('<tr>'+
    '<td class="form-group form-group-sm">'+
       '<div class="weightage_title_view">'+title+'</div>'+

       '<div class="weightage_title_edit hidden">'+
          '<input type="text" class="form-control weightage_title" name="submission_evaluation_title[]" value="'+title+'">'+
       '</div>'+

    '</td>'+
    '<td class="form-group form-group-sm  text-align-center">'+
       '<div class="weightage_no_view">'+no+'</div>'+

       '<div class="weightage_no_edit hidden">'+
          '<div class="input-group input-group-sm">'+
             '<input type="number" class="form-control weightage_no" name="weightage[]" value="'+no+'" style="width:60px;">'+
             '<span class="input-group-addon">%</span>'+
          '</div>'+
       '</div>'+

    '</td>'+
    '<td class="form-group form-group-sm">'+
       '<div class="weightage_save_view">'+
          '<button type="button" class="btn btn-info weightage_edit_button"><i class="fa fa-pencil" aria-hidden="true"></i></button>'+
       '</div>'+

       '<div class="weightage_save_edit hidden">'+
          '<button type="button" class="btn weightage_save_button"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>'+
       '</div>'+

    '</td>'+
    '<td class="form-group form-group-sm">'+
       '<div class="weightage_cancel_view">'+
          '<button type="button" class="btn btn-danger weightage_remove_button"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
       '</div>'+

       '<div class="weightage_cancel_edit hidden">'+
          '<button type="button" class="btn btn-default weightage_cancel_button"><i class="fa fa-times" aria-hidden="true"></i></button>'+
       '</div>'+

    '</td>'+
  '</tr>');

  $(this).closest('td').siblings().find('.weightage_title').val("");
  $(this).closest('td').siblings().find('.weightage_no').val("");
  $(this).attr("disabled", true);


  var colCount = 0;
  var value = 0;
  $('#weightage_table tbody tr').each(function () {
    colCount++;
    var no = $('#weightage_table tbody tr:nth-child('+colCount+') td:nth-child(2)').find('.weightage_no').val();

    if (no != "") {
      value = parseInt(value) + parseInt(no);
    }
  });

  console.log(value);
  if (value > 100) {
    alertify.warning("Total weightage of the parameters cannot be grater than 100");
  }

});

$("#weightage_table").on('click', '.weightage_remove_button', function () {
  $(this).closest('tr').remove();
});
$("#weightage_table").on('click', '.weightage_cancel_button', function () {

  $(this).closest('tr').find('td .weightage_save_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_save_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_cancel_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_cancel_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_title_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_title_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_no_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_no_view').removeClass('hidden');

});

$("#weightage_table").on('click', '.weightage_edit_button', function () {

  $(this).closest('tr').find('td .weightage_save_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_save_view').addClass('hidden');

  $(this).closest('tr').find('td .weightage_cancel_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_cancel_view').addClass('hidden');

  $(this).closest('tr').find('td .weightage_title_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_title_view').addClass('hidden');

  $(this).closest('tr').find('td .weightage_no_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_no_view').addClass('hidden');

});
$("#weightage_table").on('click', '.weightage_save_button', function () {

  var title = $(this).closest('td').siblings().find('.weightage_title').val();
  var no = $(this).closest('td').siblings().find('.weightage_no').val();

  $(this).closest('tr').find('td .weightage_title_view').html(title);
  $(this).closest('tr').find('td .weightage_no_view').html(no);

  $(this).closest('tr').find('td .weightage_save_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_save_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_cancel_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_cancel_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_title_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_title_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_no_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_no_view').removeClass('hidden');
});




$("#weightage_fill_table").on('keyup', '.weightage_no', function( event ) {

  if ($(this).val().length > 0) {
    $(this).closest('td').siblings().children('.save_button').attr("disabled", false);
  }
  else {
    $(this).closest('td').siblings().children('.save_button').attr("disabled", true);
  }

  if(parseInt($(this).val()) > 100){
    console.log($(this).val());
    $(this).closest('td').siblings().children('.save_button').attr("disabled", true);
  }

});

$("#weightage_fill_table").on('click', '.equalize', function () {

  var colCount = 0;
  $('#weightage_fill_table tbody tr').each(function (data) {
    colCount++;
  });

  colCount = colCount - 1 ;

  var total = 100;
  var count = colCount;
  var colCount_value = 0;
  $('#weightage_fill_table tbody tr').each(function () {
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

    $('#weightage_fill_table tbody tr:nth-child('+colCount_value+') td:nth-child(2)').find('.weightage_no').val(s_value);
    $('#weightage_fill_table tbody tr:nth-child('+colCount_value+') td:nth-child(2)').find('.weightage_no_view').html(s_value);
    count--;
  });

});

$("#weightage_fill_table").on('click', '.save_button', function() {
  var title = $(this).closest('td').siblings().find('.weightage_title').val();
  var no = $(this).closest('td').siblings().find('.weightage_no').val();
  $('#weightage_fill_table tbody tr:first').before('<tr>'+
    '<td class="form-group form-group-sm">'+
       '<div class="weightage_title_view">'+title+'</div>'+

       '<div class="weightage_title_edit hidden">'+
          '<input type="text" class="form-control weightage_title" name="submission_evaluation_title[]" value="'+title+'">'+
       '</div>'+

    '</td>'+
    '<td class="form-group form-group-sm  text-align-center">'+
       '<div class="weightage_no_view">'+no+'</div>'+

       '<div class="weightage_no_edit hidden">'+
          '<div class="input-group input-group-sm">'+
             '<input type="number" class="form-control weightage_no" name="weightage[]" value="'+no+'" style="width:60px;">'+
             '<span class="input-group-addon">%</span>'+
          '</div>'+
       '</div>'+

    '</td>'+
    '<td class="form-group form-group-sm">'+
       '<div class="weightage_save_view">'+
          '<button type="button" class="btn btn-info weightage_edit_button"><i class="fa fa-pencil" aria-hidden="true"></i></button>'+
       '</div>'+

       '<div class="weightage_save_edit hidden">'+
          '<button type="button" class="btn weightage_save_button"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>'+
       '</div>'+

    '</td>'+
    '<td class="form-group form-group-sm">'+
       '<div class="weightage_cancel_view">'+
          '<button type="button" class="btn btn-danger weightage_remove_button"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
       '</div>'+

       '<div class="weightage_cancel_edit hidden">'+
          '<button type="button" class="btn btn-default weightage_cancel_button"><i class="fa fa-times" aria-hidden="true"></i></button>'+
       '</div>'+

    '</td>'+
  '</tr>');

  $(this).closest('td').siblings().find('.weightage_title').val("");
  $(this).closest('td').siblings().find('.weightage_no').val("");
  $(this).attr("disabled", true);


  var colCount = 0;
  var value = 0;
  $('#weightage_fill_table tbody tr').each(function () {
    colCount++;
    var no = $('#weightage_fill_table tbody tr:nth-child('+colCount+') td:nth-child(2)').find('.weightage_no').val();

    if (no != "") {
      value = parseInt(value) + parseInt(no);
    }
  });

  console.log(value);
  if (value > 100) {
    alertify.warning("Total weightage of the parameters cannot be grater than 100");
  }

});

$("#weightage_fill_table").on('click', '.weightage_remove_button', function () {
  $(this).closest('tr').remove();
});
$("#weightage_fill_table").on('click', '.weightage_cancel_button', function () {

  $(this).closest('tr').find('td .weightage_save_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_save_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_cancel_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_cancel_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_title_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_title_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_no_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_no_view').removeClass('hidden');

});

$("#weightage_fill_table").on('click', '.weightage_edit_button', function () {

  $(this).closest('tr').find('td .weightage_save_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_save_view').addClass('hidden');

  $(this).closest('tr').find('td .weightage_cancel_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_cancel_view').addClass('hidden');

  $(this).closest('tr').find('td .weightage_title_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_title_view').addClass('hidden');

  $(this).closest('tr').find('td .weightage_no_edit').removeClass('hidden');
  $(this).closest('tr').find('td .weightage_no_view').addClass('hidden');

});
$("#weightage_fill_table").on('click', '.weightage_save_button', function () {

  var title = $(this).closest('td').siblings().find('.weightage_title').val();
  var no = $(this).closest('td').siblings().find('.weightage_no').val();

  $(this).closest('tr').find('td .weightage_title_view').html(title);
  $(this).closest('tr').find('td .weightage_no_view').html(no);

  $(this).closest('tr').find('td .weightage_save_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_save_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_cancel_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_cancel_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_title_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_title_view').removeClass('hidden');

  $(this).closest('tr').find('td .weightage_no_edit').addClass('hidden');
  $(this).closest('tr').find('td .weightage_no_view').removeClass('hidden');
});
