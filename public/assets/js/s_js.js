$( document ).ready(function() {

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
              '<input type="text" class="form-control weightage_title" name="weightage_title[]" value="'+title+'">'+
           '</div>'+

        '</td>'+
        '<td class="form-group form-group-sm  text-align-center">'+
           '<div class="weightage_no_view">'+no+'</div>'+

           '<div class="weightage_no_edit hidden">'+
              '<div class="input-group input-group-sm">'+
                 '<input type="number" class="form-control weightage_no" name="weightage_no[]" value="'+no+'" style="width:60px;">'+
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
              '<input type="text" class="form-control weightage_title" name="weightage_title[]" value="'+title+'">'+
           '</div>'+

        '</td>'+
        '<td class="form-group form-group-sm  text-align-center">'+
           '<div class="weightage_no_view">'+no+'</div>'+

           '<div class="weightage_no_edit hidden">'+
              '<div class="input-group input-group-sm">'+
                 '<input type="number" class="form-control weightage_no" name="weightage_no[]" value="'+no+'" style="width:60px;">'+
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


    $("#weightage_code_add_row").on('click', function() {
      if($('#weightage_status').is(":checked")) {
        var colCount = 1;
        $('#weightage_code_table tbody tr').each(function (data) {
             colCount++;
        });
        if (colCount == 1) {
          $('#weightage_code_table tbody').append('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+
                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value" value="100">'+
                '<input type="number" class="form-control input-md weightage" value="100" disabled>'+
              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button type="button" class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button type="button" class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button type="button" class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button type="button" class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+
              '</div>'+
            '</td>'+
          '</tr>');
        }
        else {
          $('#weightage_code_table tbody tr:last').after('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+

                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value">'+
                '<input type="number" class="form-control input-md weightage" disabled>'+

              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button type="button" class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button type="button" class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button type="button" class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button type="button" class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+

              '</div>'+
            '</td>'+
          '</tr>');
        }
        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_code_table tbody tr').each(function () {
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

           $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
           $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
           count--;
        });
      }
      else {
        var colCount = 1;
        $('#weightage_code_table tbody tr').each(function (data) {
             colCount++;
        });
        if (colCount == 1) {
          $('#weightage_code_table tbody').append('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+
                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value" value="0">'+
                '<input type="number" class="form-control input-md weightage" value="0">'+
              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button type="button" class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button type="button" class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button type="button" class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button type="button" class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+

              '</div>'+
            '</td>'+
          '</tr>');
        }
        else {
          $('#weightage_code_table tbody tr:last').after('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+
                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value" value="0">'+
                '<input type="number" class="form-control input-md weightage" value="0">'+
              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+

              '</div>'+
            '</td>'+
          '</tr>');
        }
      }
    });
    $("#weightage_status").on('change', function () {

      if($(this).is(":checked")){

        var colCount = 0;
        $('#weightage_code_table tbody tr').each(function (data) {
             colCount++;
        });

        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_code_table tbody tr').each(function () {
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

           $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
           $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
           $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', true);

            count--;
        });

      }
      else {
          var colCount_value = 0;
          $('#weightage_code_table tbody tr').each(function (data) {
            colCount_value++;
            $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', false);
          });
      }


        var sum_value = 0;
        var colCount_value = 0;
        $('#weightage_code_table tbody tr').each(function () {
           colCount_value++;

          var value = $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
          sum_value = parseInt(sum_value) + parseInt(value)
        });

        if(parseInt(sum_value) > 100){
          $('.weightage_blink_success').addClass('hidden');
          $('.weightage_blink_error').removeClass('hidden');

          $('.weightage_blink_error').html('Total: '+sum_value+'% (> 100%)');

          $('.weightage_blink_error').blink({
               delay: 600
          });
        }
        else {
           $('.weightage_blink_error').unblink();
           $('.weightage_blink_success').removeClass('hidden');
           $('.weightage_blink_error').addClass('hidden');

           $('.weightage_blink_success').html('Total: '+sum_value+'%');
        }


    });
    $("#weightage_code_table").on('keyup', '.test_case_name', function( event ) {
      var test_case_output = $(this).closest('td').siblings().find('.test_case_output').val();
      var test_case_input = $(this).closest('td').siblings().find('.test_case_input').val();
      var weightage_value = $(this).closest('td').siblings().find('.weightage_value').val();
      var weightage = $(this).closest('td').siblings().find('.weightage').val();

      if ($(this).val().length > 0 && test_case_output.length > 0 && test_case_input.length > 0 && weightage_value.length > 0 && weightage.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }
    });
    $("#weightage_code_table").on('keyup', '.test_case_output', function( event ) {
      var test_case_name = $(this).closest('td').siblings().find('.test_case_name').val();
      var test_case_input = $(this).closest('td').siblings().find('.test_case_input').val();
      var weightage_value = $(this).closest('td').siblings().find('.weightage_value').val();
      var weightage = $(this).closest('td').siblings().find('.weightage').val();

      if ($(this).val().length > 0 && test_case_name.length > 0 && test_case_input.length > 0 && weightage_value.length > 0 && weightage.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }
    });
    $("#weightage_code_table").on('keyup', '.test_case_input', function( event ) {
      var test_case_name = $(this).closest('td').siblings().find('.test_case_name').val();
      var test_case_output = $(this).closest('td').siblings().find('.test_case_output').val();
      var weightage_value = $(this).closest('td').siblings().find('.weightage_value').val();
      var weightage = $(this).closest('td').siblings().find('.weightage').val();

      if ($(this).val().length > 0 && test_case_name.length > 0 && test_case_output.length > 0 && weightage_value.length > 0 && weightage.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }
    });
    $("#weightage_code_table").on('keyup', '.weightage', function( event ) {
      var test_case_name = $(this).closest('td').siblings().find('.test_case_name').val();
      var test_case_output = $(this).closest('td').siblings().find('.test_case_output').val();
      var test_case_input = $(this).closest('td').siblings().find('.test_case_input').val();
      var weightage = $(this).val();
      $(this).closest('td').find('.weightage_value').val(weightage);

      if (weightage.length > 0 && test_case_name.length > 0 && test_case_output.length > 0 && test_case_input.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }


      var sum_value = 0;
      var colCount_value = 0;
      $('#weightage_code_table tbody tr').each(function () {
         colCount_value++;

        var value = $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
        sum_value = parseInt(sum_value) + parseInt(value)
      });

      if(parseInt(sum_value) > 100){
        $('.weightage_blink_success').addClass('hidden');
        $('.weightage_blink_error').removeClass('hidden');

        $('.weightage_blink_error').html('Total: '+sum_value+'% (> 100%)');

        $('.weightage_blink_error').blink({
             delay: 600
        });
      }
      else {
         $('.weightage_blink_error').unblink();
         $('.weightage_blink_success').removeClass('hidden');
         $('.weightage_blink_error').addClass('hidden');

         $('.weightage_blink_success').html('Total: '+sum_value+'%');
      }
    });
    $("#weightage_code_table").on('click', '.save_row', function () {

      $(this).parent('.weightage_save').addClass('hidden');
      $(this).closest('td').find('.weightage_edit').removeClass('hidden');

      var name = $(this).closest('tr').find('td .weightage_save_test_case_name input').val();
      var input = $(this).closest('tr').find('td .weightage_save_test_case_input textarea').val();
      var output = $(this).closest('tr').find('td .weightage_save_test_case_output textarea').val();

      $(this).closest('tr').find('td .weightage_edit_test_case_name').html(name);
      $(this).closest('tr').find('td .weightage_edit_test_case_input').html(input);
      $(this).closest('tr').find('td .weightage_edit_test_case_output').html(output);

      $(this).closest('tr').find('td .weightage_save_test_case_name').addClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_name').removeClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_input').addClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_input').removeClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_output').addClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_output').removeClass('hidden');

    });
    $("#weightage_code_table").on('click', '.edit_row', function () {

      $(this).parent('.weightage_edit').addClass('hidden');
      $(this).closest('td').find('.weightage_save').removeClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_name').removeClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_name').addClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_input').removeClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_input').addClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_output').removeClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_output').addClass('hidden');

    });
    $("#weightage_code_table").on('click', '.remove_row', function () {
      $(this).closest('tr').remove();
      if($('#weightage_status').is(":checked")) {
        var colCount = 0;
        $('#weightage_code_table tbody tr').each(function (data) {
          colCount++;
        });
        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_code_table tbody tr').each(function () {
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

          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', true);
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');

          count--;
        });
      }
      else {
        var colCount_value = 0;
        $('#weightage_code_table tbody tr').each(function () {
          colCount_value++;
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');
        });
      }

      var sum_value = 0;
      var colCount_value = 0;
      $('#weightage_code_table tbody tr').each(function () {
         colCount_value++;

        var value = $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
        sum_value = parseInt(sum_value) + parseInt(value)
      });
      if(parseInt(sum_value) > 100){
        $('.weightage_blink_success').addClass('hidden');
        $('.weightage_blink_error').removeClass('hidden');

        $('.weightage_blink_error').html('Total: '+sum_value+'% (> 100%)');

        $('.weightage_blink_error').blink({
             delay: 600
        });
      }
      else {
         $('.weightage_blink_error').unblink();
         $('.weightage_blink_success').removeClass('hidden');
         $('.weightage_blink_error').addClass('hidden');

         $('.weightage_blink_success').html('Total: '+sum_value+'%');
      }

    });
    $("#weightage_code_table").on('click', '.delete_row', function () {
      $(this).closest('tr').remove();
      if($('#weightage_status').is(":checked")) {
        var colCount = 0;
        $('#weightage_code_table tbody tr').each(function (data) {
          colCount++;
        });
        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_code_table tbody tr').each(function () {
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

          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', true);
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');

          count--;
        });
      }
      else {
        var colCount_value = 0;
        $('#weightage_code_table tbody tr').each(function () {
          colCount_value++;
          $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');
        });
      }

      var sum_value = 0;
      var colCount_value = 0;
      $('#weightage_code_table tbody tr').each(function () {
         colCount_value++;

        var value = $('#weightage_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
        sum_value = parseInt(sum_value) + parseInt(value)
      });
      if(parseInt(sum_value) > 100){
        $('.weightage_blink_success').addClass('hidden');
        $('.weightage_blink_error').removeClass('hidden');

        $('.weightage_blink_error').html('Total: '+sum_value+'% (> 100%)');

        $('.weightage_blink_error').blink({
             delay: 600
        });
      }
      else {
         $('.weightage_blink_error').unblink();
         $('.weightage_blink_success').removeClass('hidden');
         $('.weightage_blink_error').addClass('hidden');

         $('.weightage_blink_success').html('Total: '+sum_value+'%');
      }
    });


    $("#weightage_edit_code_add_row").on('click', function() {
      if($('#weightage_edit_status').is(":checked")) {
        var colCount = 1;
        $('#weightage_edit_code_table tbody tr').each(function (data) {
             colCount++;
        });
        if (colCount == 1) {
          $('#weightage_edit_code_table tbody').append('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+
                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value" value="100">'+
                '<input type="number" class="form-control input-md weightage" value="100" disabled>'+
              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button type="button" class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button type="button" class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button type="button" class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button type="button" class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+
              '</div>'+
            '</td>'+
          '</tr>');
        }
        else {
          $('#weightage_edit_code_table tbody tr:last').after('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+

                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value">'+
                '<input type="number" class="form-control input-md weightage" disabled>'+

              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button type="button" class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button type="button" class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button type="button" class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button type="button" class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+

              '</div>'+
            '</td>'+
          '</tr>');
        }
        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_edit_code_table tbody tr').each(function () {
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

           $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
           $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
           count--;
        });
      }
      else {
        var colCount = 1;
        $('#weightage_edit_code_table tbody tr').each(function (data) {
             colCount++;
        });
        if (colCount == 1) {
          $('#weightage_edit_code_table tbody').append('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+
                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value" value="0">'+
                '<input type="number" class="form-control input-md weightage" value="0">'+
              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button type="button" class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button type="button" class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button type="button" class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button type="button" class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+

              '</div>'+
            '</td>'+
          '</tr>');
        }
        else {
          $('#weightage_edit_code_table tbody tr:last').after('<tr>'+
            '<td valign="center">'+colCount+'.</td>'+

            '<td>'+

              '<div class="weightage_save_test_case_name">'+
                '<div class="text-center" style="margin-top: -11px">'+
                  '<small class="text-danger"><em>*Unsaved</em></small>'+
                '</div>'+
                '<input type="text" class="form-control test_case_name" name="test_case_name[]" required="" >'+
              '</div>'+

              '<div class="weightage_edit_test_case_name hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_input">'+
                '<textarea class="form-control test_case_input" name="test_case_input[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_input hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+

              '<div class="weightage_save_test_case_output">'+
                '<textarea class="form-control test_case_output" name="test_case_output[]" required=""></textarea>'+
              '</div>'+

              '<div class="weightage_edit_test_case_output hidden">'+
              '</div>'+

            '</td>'+

            '<td valign="center">'+
              '<div class="col-md-offset-1 col-md-4">'+
                '<input type="hidden" name="weightage[]" class="form-control input-md weightage_value" value="0">'+
                '<input type="number" class="form-control input-md weightage" value="0">'+
              '</div>'+

              '<div class="col-md-7">'+

                 '<div class="weightage_save">'+
                   '<button class="btn btn-info btn-sm save_row" disabled>'+
                   '<i class="fa fa-floppy-o"></i> Save'+
                   '</button>'+

                   '<button class="btn btn-default btn-sm delete_row">'+
                   '<i class="fa fa-times"></i>'+
                   '</button>'+
                 '</div>'+

                 '<div class="weightage_edit hidden">'+
                   '<button class="btn btn-default btn-sm edit_row">'+
                   '<i class="fa fa-pencil"></i> Edit'+
                   '</button>'+

                   '<button class="btn btn-danger btn-sm remove_row">'+
                   '<i class="fa fa-trash-o"></i>'+
                   '</button>'+
                 '</div>'+

              '</div>'+
            '</td>'+
          '</tr>');
        }
      }
    });
    $("#weightage_edit_status").on('change', function () {

      if($(this).is(":checked")){

        var colCount = 0;
        $('#weightage_edit_code_table tbody tr').each(function (data) {
             colCount++;
        });

        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_edit_code_table tbody tr').each(function () {
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

           $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
           $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
           $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', true);

            count--;
        });

      }
      else {
          var colCount_value = 0;
          $('#weightage_edit_code_table tbody tr').each(function (data) {
            colCount_value++;
            $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', false);
          });
      }


        var sum_value = 0;
        var colCount_value = 0;
        $('#weightage_edit_code_table tbody tr').each(function () {
           colCount_value++;

          var value = $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
          sum_value = parseInt(sum_value) + parseInt(value)
        });

        if(parseInt(sum_value) > 100){
          $('.weightage_edit_blink_success').addClass('hidden');
          $('.weightage_edit_blink_error').removeClass('hidden');

          $('.weightage_edit_blink_error').html('Total: '+sum_value+'% (> 100%)');

          $('.weightage_edit_blink_error').blink({
               delay: 600
          });
        }
        else {
           $('.weightage_edit_blink_error').unblink();
           $('.weightage_edit_blink_success').removeClass('hidden');
           $('.weightage_edit_blink_error').addClass('hidden');

           $('.weightage_edit_blink_success').html('Total: '+sum_value+'%');
        }


    });
    $("#weightage_edit_code_table").on('keyup', '.test_case_name', function( event ) {
      var test_case_output = $(this).closest('td').siblings().find('.test_case_output').val();
      var test_case_input = $(this).closest('td').siblings().find('.test_case_input').val();
      var weightage_value = $(this).closest('td').siblings().find('.weightage_value').val();
      var weightage = $(this).closest('td').siblings().find('.weightage').val();

      if ($(this).val().length > 0 && test_case_output.length > 0 && test_case_input.length > 0 && weightage_value.length > 0 && weightage.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }
    });
    $("#weightage_edit_code_table").on('keyup', '.test_case_output', function( event ) {
      var test_case_name = $(this).closest('td').siblings().find('.test_case_name').val();
      var test_case_input = $(this).closest('td').siblings().find('.test_case_input').val();
      var weightage_value = $(this).closest('td').siblings().find('.weightage_value').val();
      var weightage = $(this).closest('td').siblings().find('.weightage').val();

      if ($(this).val().length > 0 && test_case_name.length > 0 && test_case_input.length > 0 && weightage_value.length > 0 && weightage.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }
    });
    $("#weightage_edit_code_table").on('keyup', '.test_case_input', function( event ) {
      var test_case_name = $(this).closest('td').siblings().find('.test_case_name').val();
      var test_case_output = $(this).closest('td').siblings().find('.test_case_output').val();
      var weightage_value = $(this).closest('td').siblings().find('.weightage_value').val();
      var weightage = $(this).closest('td').siblings().find('.weightage').val();

      if ($(this).val().length > 0 && test_case_name.length > 0 && test_case_output.length > 0 && weightage_value.length > 0 && weightage.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }
    });
    $("#weightage_edit_code_table").on('keyup', '.weightage', function( event ) {
      var test_case_name = $(this).closest('td').siblings().find('.test_case_name').val();
      var test_case_output = $(this).closest('td').siblings().find('.test_case_output').val();
      var test_case_input = $(this).closest('td').siblings().find('.test_case_input').val();
      var weightage = $(this).val();
      $(this).closest('td').find('.weightage_value').val(weightage);

      if (weightage.length > 0 && test_case_name.length > 0 && test_case_output.length > 0 && test_case_input.length > 0 ) {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().find('.save_row').attr("disabled", true);
      }


      var sum_value = 0;
      var colCount_value = 0;
      $('#weightage_edit_code_table tbody tr').each(function () {
         colCount_value++;

        var value = $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
        sum_value = parseInt(sum_value) + parseInt(value)
      });

      if(parseInt(sum_value) > 100){
        $('.weightage_edit_blink_success').addClass('hidden');
        $('.weightage_edit_blink_error').removeClass('hidden');

        $('.weightage_edit_blink_error').html('Total: '+sum_value+'% (> 100%)');

        $('.weightage_edit_blink_error').blink({
             delay: 600
        });
      }
      else {
         $('.weightage_edit_blink_error').unblink();
         $('.weightage_edit_blink_success').removeClass('hidden');
         $('.weightage_edit_blink_error').addClass('hidden');

         $('.weightage_edit_blink_success').html('Total: '+sum_value+'%');
      }
    });
    $("#weightage_edit_code_table").on('click', '.save_row', function () {

      $(this).parent('.weightage_save').addClass('hidden');
      $(this).closest('td').find('.weightage_edit').removeClass('hidden');

      var name = $(this).closest('tr').find('td .weightage_save_test_case_name input').val();
      var input = $(this).closest('tr').find('td .weightage_save_test_case_input textarea').val();
      var output = $(this).closest('tr').find('td .weightage_save_test_case_output textarea').val();

      $(this).closest('tr').find('td .weightage_edit_test_case_name').html(name);
      $(this).closest('tr').find('td .weightage_edit_test_case_input').html(input);
      $(this).closest('tr').find('td .weightage_edit_test_case_output').html(output);

      $(this).closest('tr').find('td .weightage_save_test_case_name').addClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_name').removeClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_input').addClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_input').removeClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_output').addClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_output').removeClass('hidden');

    });
    $("#weightage_edit_code_table").on('click', '.edit_row', function () {

      $(this).parent('.weightage_edit').addClass('hidden');
      $(this).closest('td').find('.weightage_save').removeClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_name').removeClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_name').addClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_input').removeClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_input').addClass('hidden');

      $(this).closest('tr').find('td .weightage_save_test_case_output').removeClass('hidden');
      $(this).closest('tr').find('td .weightage_edit_test_case_output').addClass('hidden');

    });
    $("#weightage_edit_code_table").on('click', '.remove_row', function () {
      $(this).closest('tr').remove();

      if($('#weightage_edit_status').is(":checked")) {
        var colCount = 0;
        $('#weightage_edit_code_table tbody tr').each(function (data) {
          colCount++;
        });
        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_edit_code_table tbody tr').each(function () {
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

          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', true);
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');

          count--;
        });
      }
      else {
        var colCount_value = 0;
        $('#weightage_edit_code_table tbody tr').each(function () {
          colCount_value++;
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');
        });
      }

      var sum_value = 0;
      var colCount_value = 0;
      $('#weightage_edit_code_table tbody tr').each(function () {
         colCount_value++;

        var value = $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
        sum_value = parseInt(sum_value) + parseInt(value)
      });
      if(parseInt(sum_value) > 100){
        $('.weightage_edit_blink_success').addClass('hidden');
        $('.weightage_edit_blink_error').removeClass('hidden');

        $('.weightage_edit_blink_error').html('Total: '+sum_value+'% (> 100%)');

        $('.weightage_edit_blink_error').blink({
             delay: 600
        });
      }
      else {
         $('.weightage_edit_blink_error').unblink();
         $('.weightage_edit_blink_success').removeClass('hidden');
         $('.weightage_edit_blink_error').addClass('hidden');

         $('.weightage_edit_blink_success').html('Total: '+sum_value+'%');
      }

    });
    $("#weightage_edit_code_table").on('click', '.delete_row', function () {
      $(this).closest('tr').remove();

      if($('#weightage_edit_status').is(":checked")) {
        var colCount = 0;
        $('#weightage_edit_code_table tbody tr').each(function (data) {
          colCount++;
        });
        var total = 100;
        var count = colCount;
        var colCount_value = 0;
        $('#weightage_edit_code_table tbody tr').each(function () {
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

          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').val(s_value);
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val(s_value);
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage').prop('disabled', true);
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');

          count--;
        });
      }
      else {
        var colCount_value = 0;
        $('#weightage_edit_code_table tbody tr').each(function () {
          colCount_value++;
          $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(1)').html(colCount_value+'.');
        });
      }

      var sum_value = 0;
      var colCount_value = 0;
      $('#weightage_edit_code_table tbody tr').each(function () {
         colCount_value++;

        var value = $('#weightage_edit_code_table tbody tr:nth-child('+colCount_value+') td:nth-child(5)').find('.weightage_value').val();
        sum_value = parseInt(sum_value) + parseInt(value)
      });
      if(parseInt(sum_value) > 100){
        $('.weightage_edit_blink_success').addClass('hidden');
        $('.weightage_edit_blink_error').removeClass('hidden');

        $('.weightage_edit_blink_error').html('Total: '+sum_value+'% (> 100%)');

        $('.weightage_edit_blink_error').blink({
             delay: 600
        });
      }
      else {
         $('.weightage_edit_blink_error').unblink();
         $('.weightage_edit_blink_success').removeClass('hidden');
         $('.weightage_edit_blink_error').addClass('hidden');

         $('.weightage_edit_blink_success').html('Total: '+sum_value+'%');
      }

    });


    $('#setting_questionnaire_tab').on('change', '.enable_questionaire', function() {
        if($(this).is(":checked")){
          $(this).closest('section').find('.new_questionnaire').removeClass('hidden');
        }
        else {
          $(this).closest('section').find('.new_questionnaire').addClass('hidden');
        }
    });
    $("#setting_questionnaire_tab").on('click', '.new_question li', function() {
      $(this).closest('section').find(".unordered-list").append('<li class="questionBorder">'+
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
    });
    $("#setting_questionnaire_tab").on('click', '.unordered-list li .edit_question', function() {
      $( this ).closest( ".row" ).siblings('.capsule').toggleClass('hidden');
    });
    $("#setting_questionnaire_tab").on('change', '.unordered-list li .format_class', function() {
      var item=$(this);
      if (item.val() == 1) {
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
      }
      else if (item.val() == 2) {
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", false);
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
      }
      else if (item.val() == 3) {
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", false);
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
      }
      else if (item.val() == 4) {
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');
      }
      else if (item.val() == 5) {
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
      }
      else if (item.val() == 6) {
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
      }
      else if (item.val() == 7) {
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
        $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');
      }
    });
    $("#setting_questionnaire_tab").on('click', '.option_table tfoot tr td .add_option', function() {
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
    });
    $("#setting_questionnaire_tab").on('click', '.option_table tbody tr td .delete_row_option', function() {
        var colCount_alert = 0;
        $(this).closest( "tbody" ).find( "tr" ).each(function () {
            colCount_alert++;
        });

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
