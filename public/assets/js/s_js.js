$( document ).ready(function() {

    $("#weightage_table").on('keyup', '.weightage_no', function( event ) {

      if ($(this).val().length > 0) {
        $(this).closest('td').siblings().children('.save_button').attr("disabled", false);
      }
      else {
        $(this).closest('td').siblings().children('.save_button').attr("disabled", true);
      }

      if(parseInt($(this).val()) > 100){
        // console.log($(this).val());
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

      // console.log(value);
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
        // console.log($(this).val());
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

      // console.log(value);
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
    $("#setting_questionnaire_tab").on('click', '.new_question li a', function() {
      var id = $(this).data('id');
      var idli = $(this).data('idli');
      var question = $(this).data('question');
      var support_text = $(this).data('support_text');
      var template_id = $(this).closest('ul').data('template_id');
      var url = $('#newquestion').data('urlquestion');
      var urlnewquestion = $('#newquestion').data('urlnewquestion');
      // console.log(csrf);
      if(idli == "0")
      {
        $(this).closest('section').find(".unordered-list li:eq(0)").append('<li class="questionBorder">'+
          '<form class="questionRequest">'+
            csrf+
            '<input type="hidden" name="template_id" value="'+template_id+'">'+
            '<input type="hidden" name="question_id" value="'+id+'" >'+
            '<input type="hidden" name="question_url" value="'+url+'" >' +
            '<div class="row hidden" id="">'+
              '<div class="col-xs-6 title">'+
                '<a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Mandatory Question (Edit to change)">'+
                  '<small class="text-primary">'+
                    '<i class="fa fa-star" aria-hidden="true"></i>'+
                  '</small>'+
                '</a>'+
                '<span class="separator transparent-border"></span>'+
                '<span title="Help Text"></span>'+
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
            '<div class="form-horizontal capsule">'+
              '<div class="form-group form-group-sm">'+
                '<label class="control-label col-sm-2">Question</label>'+
                '<div class="col-sm-10">'+
                  '<input type="text" name="question" class="form-control" placeholder=" Eg: Enter your University name">'+
                '</div>'+
              '</div>'+
              '<div class="form-group form-group-sm">'+
                '<label class="control-label col-sm-2">Support textsss</label>'+
                '<div class="col-sm-10">'+
                  '<input type="text" name="support_text" class="form-control" placeholder="Eg: Give the full form of your University">'+
                '</div>'+
              '</div>'+
              '<div class="form-group form-group-sm">'+
                '<label class="control-label col-sm-2">'+
                  'Knock outing  '+
                  '<i class="fa fa-info-circle"></i>'+
                '</label>'+
                '<div class="col-sm-10">'+
                  '<div class="" >'+
                    '<label class="control-label">'+
                      '<input type="checkbox" name="knock_out" value="1" class="knockout_checkbox" style="top:4px">'+
                      ' Dont allow the candidate to take the test if the criteria does not meet'+
                    '</label>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div class="dropdown_format_menu">'+
                '<div class="form-group form-group-sm">'+
                  '<label class="control-label col-sm-2">Format</label>'+
                  '<div class="col-sm-4">'+
                    '<select class="form-control format_class" name="format_setting_id">'+
                      '<option value="1">Number</option>'+
                      '<option value="2">Text</option>'+
                      '<option value="3">Text Area</option>'+
                      '<option value="4">Check box</option>'+
                      '<option value="5">Multiple choice</option>'+
                      '<option value="6">Radio group</option>'+
                      '<option value="7">Drop down</option>'+
                    '</select>'+
                  '</div>'+
                  '<div class="col-sm-4" style="padding: 0;">'+
                    '<div style="padding: 1px">'+
                      '<label class="control-label mandatory_checkbox_label">'+
                        '<input type="checkbox" name="mandatory" value="1" class="mandatory_checkbox" style="top:4px"> Mandatory'+
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
                               '<input type="text" class="form-control option_text" data-message="1" name="option[]">'+
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
                    '<input type="text" name="placeholder" class="form-control placeholder_text" value="Enter Something" disabled>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div class="form-group form-group-sm knockout_criteria hidden">'+
                 '<label class="control-label col-sm-2">Knock out criteria</label>'+
                 '<div class="col-sm-10">'+

                   '<div class="knockout_li_number hidden">'+
                      '<div class="row">'+
                         '<label class="control-label col-md-1">Range: </label>'+
                         '<div class="col-sm-4">'+
                            '<div class="input-group input-group-sm">'+
                               '<div class="input-group-addon">'+
                                  'Min'+
                               '</div>'+
                               '<input type="number" name="min" class="form-control number_min" value="0">'+
                            '</div>'+
                         '</div>'+
                         '<div class="col-sm-4">'+
                            '<div class="input-group input-group-sm">'+
                               '<div class="input-group-addon">'+
                                  'Max'+
                               '</div>'+
                               '<input type="number" name="max" class="form-control number_max" value="0">'+
                            '</div>'+
                         '</div>'+
                      '</div>'+
                      '<small class="help-block">Any number between the range will be considered as correct</small>'+
                   '</div>'+

                   '<div class="knockout_li_checkbox hidden">'+
                      '<label class="control-label">Expected Answer:</label>'+
                      '<div class="radio no-padding">'+
                        '<label class="control-label">'+
                          '<input type="radio" checked name="checkbox" value="true">'+
                          'Checked'+
                        '</label>'+
                      '</div>'+
                      '<div class="radio no-padding">'+
                        '<label class="control-label">'+
                          '<input type="radio" name="checkbox" value="false">'+
                          'Unchecked'+
                        '</label>'+
                      '</div>'+
                   '</div>'+

                   '<div class="knockout_li_multiple_choice hidden">'+
                     '<label class="control-label">Expected Answer(s)</label>'+
                     '<ul style="padding:0;">'+
                      '<li>'+
                        '<div class="no-padding">'+
                           '<label class="control-label checkbox_1">'+
                            '<input type="checkbox" checked name="answer_multiple_choice[]">'+
                           '</label>'+
                        '</div>'+
                      '</li>'+
                     '</ul>'+

                     '<small class="help-block">Candidate should select the exact choices which are checked above to qualify for the test</small>'+
                   '</div>'+

                   '<div class="knockout_li_radio_group hidden">'+
                     '<label class="control-label">Expected Answer</label>'+
                     '<ul style="padding:0;">'+
                       '<li>'+
                         '<div class="radio no-padding">'+
                            '<label class="control-label radio_group_1">'+
                            '<input type="radio" checked name="answer_radio">'+
                            '</label>'+
                         '</div>'+
                       '</li>'+
                     '</ul>'+
                     '<small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>'+
                   '</div>'+

                   '<div class="knockout_li_drop_down hidden">'+
                     '<label class="control-label">Expected Answer</label>'+
                     '<ul style="padding:0;">'+
                       '<li>'+
                         '<div class="radio no-padding">'+
                            '<label class="control-label drop_down_1">'+
                            '<input type="radio" checked name="answer_drop_down">'+
                            '</label>'+
                         '</div>'+
                       '</li>'+
                     '</ul>'+
                     '<small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>'+
                   '</div>'+

                 '</div>'+
              '</div>'+
              '<div class="row">'+
                '<div class="col-sm-10 col-sm-offset-2">'+
                  '<button type="submit" class="btn btn-sm btn-info">Done</button>'+
                  '<button type="button" class="btn btn-sm btn-default cancel_button_remove">Cancel</button>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</form>'+
        '</li>');


        $(".questionRequest").on('submit', function(e){
            e.preventDefault();
            //console.log("console" + $(this).find("input[name='template_id']").val());
            var formData = $(this).serialize();

            // console.log(formData);
            $.ajaxSetup({
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
              type: 'post',
              url: $(this).find("input[name='question_url']").val(),
              data: formData,
              success: function (data) {
                console.log(data);

                //data inserted
                    if(data.status == 200){
                      location.reload(true);
                      alertify.success(data.msg);

                     //data couldnot be inserted
                    }else if(data.status == 202){
                      alertify.warning(data.msg);

                      //data duplicated
                    }else if(data.status == 204){
                      alertify.warning(data.msg);
                    }
                  },
                  error: function (data) {
                  alertify.warning("Oops. something went wrong. Please try again");
                 }
               });
        });

      }
      else {
        var length = $(this).closest('section').find(".unordered-list li input[value='"+question+"']").length;
        if (length > 0) {
          // console.log(length);

          $(this).closest('section').find(".unordered-list").append('<li class="questionBorder">'+

            '<form class="questionRequest">'+
              csrf+
              '<input type="hidden" name="template_id" value="'+template_id+'">'+
              '<input type="hidden" name="question_id" value="'+id+'" >'+
              '<input type="hidden" name="question_url" value="'+url+'" >' +
              '<div class="row" id="">'+
                '<div class="col-xs-6 title">'+
                  '<a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Mandatory Question (Edit to change)">'+
                    '<small class="text-primary">'+
                      '<i class="fa fa-star" aria-hidden="true"></i>'+
                    '</small>'+
                  '</a>'+
                  '<span class="separator transparent-border"></span>'+
                  '<span title="Help Text">'+question+'<small class="text text-danger"><i>(Duplicate)</i></small></span>'+
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
                      '<button type="button" class="btn btn-sm btn-link text-danger delete_question">'+
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
                    '<input type="text" class="form-control" name="question" placeholder=" Eg: Enter your University name" value="'+question+'">'+
                  '</div>'+
                '</div>'+
                '<div class="form-group form-group-sm">'+
                  '<label class="control-label col-sm-2">Support text</label>'+
                  '<div class="col-sm-10">'+
                    '<input type="text" class="form-control" name="support_text" placeholder="Eg: Give the full form of your University" value="'+support_text+'">'+
                  '</div>'+
                '</div>'+
                '<div class="form-group form-group-sm">'+
                  '<label class="control-label col-sm-2">'+
                    'Knock out  '+
                    '<i class="fa fa-info-circle"></i>'+
                  '</label>'+
                  '<div class="col-sm-10">'+
                    '<div class="" >'+
                      '<label class="control-label">'+
                        '<input type="checkbox" name="knock_out" class="knockout_checkbox" value="1" style="top:4px">'+
                        ' Dont allow the candidate to take the test if the criteria does not meet'+
                      '</label>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
                '<div class="dropdown_format_menu">'+
                  '<div class="form-group form-group-sm">'+
                    '<label class="control-label col-sm-2">Format</label>'+
                    '<div class="col-sm-4">'+
                      '<select class="form-control format_class" name="format_setting_id">'+
                        '<option value="1">Number</option>'+
                        '<option value="2">Text</option>'+
                        '<option value="3">Text Area</option>'+
                        '<option value="4">Check box</option>'+
                        '<option value="5">Multiple choice</option>'+
                        '<option value="6">Radio group</option>'+
                        '<option value="7">Drop down</option>'+
                      '</select>'+
                    '</div>'+
                    '<div class="col-sm-4" style="padding: 0;">'+
                      '<div style="padding: 1px">'+
                        '<label class="control-label mandatory_checkbox_label">'+
                          '<input type="checkbox" name="mandatory" value="1" class="mandatory_checkbox" style="top:4px"> Mandatory'+
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
                                 '<input type="text" class="form-control option_text" data-message="1" name="option[]">'+
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
                      '<input type="text" name="placeholder" class="form-control placeholder_text" value="Enter Something" disabled>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
                '<div class="form-group form-group-sm knockout_criteria hidden">'+
                   '<label class="control-label col-sm-2">Knock out criteria</label>'+
                   '<div class="col-sm-10">'+

                     '<div class="knockout_li_number hidden">'+
                        '<div class="row">'+
                           '<label class="control-label col-md-1">Range: </label>'+
                           '<div class="col-sm-4">'+
                              '<div class="input-group input-group-sm">'+
                                 '<div class="input-group-addon">'+
                                    'Min'+
                                 '</div>'+
                                 '<input type="number" name="min" class="form-control number_min" value="0">'+
                              '</div>'+
                           '</div>'+
                           '<div class="col-sm-4">'+
                              '<div class="input-group input-group-sm">'+
                                 '<div class="input-group-addon">'+
                                    'Max'+
                                 '</div>'+
                                 '<input type="number" name="max" class="form-control number_max" value="0">'+
                              '</div>'+
                           '</div>'+
                        '</div>'+
                        '<small class="help-block">Any number between the range will be considered as correct</small>'+
                     '</div>'+

                     '<div class="knockout_li_checkbox hidden">'+
                        '<label class="control-label">Expected Answer:</label>'+
                        '<div class="radio no-padding">'+
                          '<label class="control-label">'+
                            '<input type="radio" checked name="checkbox" value="true">'+
                            'Checked'+
                          '</label>'+
                        '</div>'+
                        '<div class="radio no-padding">'+
                          '<label class="control-label">'+
                            '<input type="radio" name="checkbox" value="false">'+
                            'Unchecked'+
                          '</label>'+
                        '</div>'+
                     '</div>'+

                     '<div class="knockout_li_multiple_choice hidden">'+
                       '<label class="control-label">Expected Answer(s)</label>'+
                       '<ul style="padding:0;">'+
                        '<li>'+
                          '<div class="no-padding">'+
                             '<label class="control-label checkbox_1">'+
                              '<input type="checkbox" checked name="answer_multiple_choice[]">'+
                             '</label>'+
                          '</div>'+
                        '</li>'+
                       '</ul>'+

                       '<small class="help-block">Candidate should select the exact choices which are checked above to qualify for the test</small>'+
                     '</div>'+

                     '<div class="knockout_li_radio_group hidden">'+
                       '<label class="control-label">Expected Answer</label>'+
                       '<ul style="padding:0;">'+
                         '<li>'+
                           '<div class="radio no-padding">'+
                              '<label class="control-label radio_group_1">'+
                              '<input type="radio" checked name="answer_radio">'+
                              '</label>'+
                           '</div>'+
                         '</li>'+
                       '</ul>'+
                       '<small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>'+
                     '</div>'+

                     '<div class="knockout_li_drop_down hidden">'+
                       '<label class="control-label">Expected Answer</label>'+
                       '<ul style="padding:0;">'+
                         '<li>'+
                           '<div class="radio no-padding">'+
                              '<label class="control-label drop_down_1">'+
                              '<input type="radio" checked name="answer_drop_down">'+
                              '</label>'+
                           '</div>'+
                         '</li>'+
                       '</ul>'+
                       '<small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>'+
                     '</div>'+

                   '</div>'+
                '</div>'+
                '<div class="row">'+
                  '<div class="col-sm-10 col-sm-offset-2">'+
                    '<button type="submit" class="btn btn-sm btn-info">Done</button>'+
                    '<button type="button" class="btn btn-sm btn-default cancel_button">Cancel</button>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</form>'+
          '</li>');

          $('#newquestion').attr("disabled", true);
          $('#button_error').removeClass("hidden");

        }else {

          $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
          });
          $.ajax({
            type: 'post',
            url: urlnewquestion,
            data: {'questionid':id, 'template_id':template_id},
            success: function (data) {
              // console.log(data);
                  if(data.status == 200){
                    alertify.success(data.msg);
                    location.reload(true);
                  }else if(data.status == 201){
                    alertify.warning(data.msg);

                  }
                },
                error: function (data) {
                alertify.warning("Oops. something went wrong. Please try again");
               }
             });

          // $(this).closest('section').find(".unordered-list").append('<li class="questionBorder">'+
          //   '<form class="questionRequest">'+
          //     csrf+
          //     '<input type="hidden" name="template_id" value="'+template_id+'">'+
          //     '<input type="hidden" name="question_id" value="'+id+'" >'+
          //     '<input type="hidden" name="question_url" value="'+url+'" >' +
          //     '<div class="row" id="">'+
          //       '<div class="col-xs-6 title">'+
          //         '<a href="#" class="f_tooltip" data-toggle="tooltip" data-placement="right" title="Mandatory Question (Edit to change)">'+
          //           '<small class="text-primary">'+
          //             '<i class="fa fa-star" aria-hidden="true"></i>'+
          //           '</small>'+
          //         '</a>'+
          //         '<span class="separator transparent-border"></span>'+
          //         '<span title="Help Text">'+question+'</span>'+
          //       '</div>'+
          //       '<div class="col-xs-3 title">'+
          //         '<span class="light-font">Text</span>'+
          //       '</div>'+
          //       '<div class="col-xs-3">'+
          //         '<div class="pull-right">'+
          //           '<div class="btn-group">'+
          //             '<button class="btn btn-sm btn-link">'+
          //                 '<span class="fa fa-arrow-up"></span>'+
          //             '</button>'+
          //             '<button class="btn btn-sm btn-link no-hover">'+
          //                 '<span class="fa fa-arrow-up transparent-font"></span>'+
          //             '</button>'+
          //             '<button type="button" class="btn btn-sm btn-link edit_question" >'+
          //                 '<span class="fa fa-pencil"></span>'+
          //             '</button>'+
          //             '<button type="button" class="btn btn-sm btn-link text-danger delete_question">'+
          //                 '<span class="fa fa-trash"></span>'+
          //             '</button>'+
          //           '</div>'+
          //         '</div>'+
          //       '</div>'+
          //     '</div>'+
          //     '<div class="form-horizontal hidden capsule">'+
          //       '<div class="form-group form-group-sm">'+
          //         '<label class="control-label col-sm-2">Question</label>'+
          //         '<div class="col-sm-10">'+
          //           '<input type="text" class="form-control" name="question" placeholder=" Eg: Enter your University name" value="'+question+'">'+
          //         '</div>'+
          //       '</div>'+
          //       '<div class="form-group form-group-sm">'+
          //         '<label class="control-label col-sm-2">Support text</label>'+
          //         '<div class="col-sm-10">'+
          //           '<input type="text" class="form-control" name="support_text" placeholder="Eg: Give the full form of your University" value="'+support_text+'">'+
          //         '</div>'+
          //       '</div>'+
          //       '<div class="form-group form-group-sm">'+
          //         '<label class="control-label col-sm-2">'+
          //           'Knock out  '+
          //           '<i class="fa fa-info-circle"></i>'+
          //         '</label>'+
          //         '<div class="col-sm-10">'+
          //           '<div class="" >'+
          //             '<label class="control-label">'+
          //               '<input type="checkbox" name="knock_out" class="knockout_checkbox" value="1" style="top:4px">'+
          //               ' Dont allow the candidate to take the test if the criteria does not meet'+
          //             '</label>'+
          //           '</div>'+
          //         '</div>'+
          //       '</div>'+
          //       '<div class="dropdown_format_menu">'+
          //         '<div class="form-group form-group-sm">'+
          //           '<label class="control-label col-sm-2">Format</label>'+
          //           '<div class="col-sm-4">'+
          //             '<select class="form-control format_class" name="format_setting_id">'+
          //               '<option value="1">Number</option>'+
          //               '<option value="2">Text</option>'+
          //               '<option value="3">Text Area</option>'+
          //               '<option value="4">Check box</option>'+
          //               '<option value="5">Multiple choice</option>'+
          //               '<option value="6">Radio group</option>'+
          //               '<option value="7">Drop down</option>'+
          //             '</select>'+
          //           '</div>'+
          //           '<div class="col-sm-4" style="padding: 0;">'+
          //             '<div style="padding: 1px">'+
          //               '<label class="control-label mandatory_checkbox_label">'+
          //                 '<input type="checkbox" name="mandatory" value="1" class="mandatory_checkbox" style="top:4px"> Mandatory'+
          //               '</label>'+
          //             '</div>'+
          //           '</div>'+
          //         '</div>'+
          //         '<div class="row hidden option_text_data">'+
          //           '<div class="col-sm-9 col-sm-offset-2">'+
          //             '<div class="no-more-tables">'+
          //               '<table class="table s_table option_table">'+
          //                 '<tbody>'+
          //                    '<tr>'+
          //                       '<td valign="center">Option 1</td>'+
          //                       '<td class="s_weight" valign="center">'+
          //                        '<input type="text" class="form-control option_text" data-message="1" name="option[]">'+
          //                       '</td>'+
          //                       '<td valign="center">'+
          //                          '<a class="delete_row_option">'+
          //                          '<i class="fa fa-times-circle-o"></i>'+
          //                          '</a>'+
          //                       '</td>'+
          //                    '</tr>'+
          //                 '</tbody>'+
          //                 '<tfoot>'+
          //                    '<tr>'+
          //                      '<td></td>'+
          //                      '<td colspan="2" class="text-align-center">'+
          //                        '<button type="button" class="btn btn-sm btn-warning add_option">+ Add Option</button>'+
          //                      '</td>'+
          //                    '</tr>'+
          //                 '</tfoot>'+
          //               '</table>'+
          //             '</div>'+
          //           '</div>'+
          //         '</div>'+
          //         '<div class="form-group form-group-sm hidden placeholder_text_data" style="">'+
          //           '<label class="control-label col-sm-2">Placeholder</label>'+
          //           '<div class="col-sm-10">'+
          //             '<input type="text" name="placeholder" class="form-control placeholder_text" value="Enter Something" disabled>'+
          //           '</div>'+
          //         '</div>'+
          //       '</div>'+
          //       '<div class="form-group form-group-sm knockout_criteria hidden">'+
          //          '<label class="control-label col-sm-2">Knock out criteria</label>'+
          //          '<div class="col-sm-10">'+
          //
          //            '<div class="knockout_li_number hidden">'+
          //               '<div class="row">'+
          //                  '<label class="control-label col-md-1">Range: </label>'+
          //                  '<div class="col-sm-4">'+
          //                     '<div class="input-group input-group-sm">'+
          //                        '<div class="input-group-addon">'+
          //                           'Min'+
          //                        '</div>'+
          //                        '<input type="number" name="min" class="form-control number_min" value="0">'+
          //                     '</div>'+
          //                  '</div>'+
          //                  '<div class="col-sm-4">'+
          //                     '<div class="input-group input-group-sm">'+
          //                        '<div class="input-group-addon">'+
          //                           'Max'+
          //                        '</div>'+
          //                        '<input type="number" name="max" class="form-control number_max" value="0">'+
          //                     '</div>'+
          //                  '</div>'+
          //               '</div>'+
          //               '<small class="help-block">Any number between the range will be considered as correct</small>'+
          //            '</div>'+
          //
          //            '<div class="knockout_li_checkbox hidden">'+
          //               '<label class="control-label">Expected Answer:</label>'+
          //               '<div class="radio no-padding">'+
          //                 '<label class="control-label">'+
          //                   '<input type="radio" checked name="checkbox" value="true">'+
          //                   'Checked'+
          //                 '</label>'+
          //               '</div>'+
          //               '<div class="radio no-padding">'+
          //                 '<label class="control-label">'+
          //                   '<input type="radio" name="checkbox" value="false">'+
          //                   'Unchecked'+
          //                 '</label>'+
          //               '</div>'+
          //            '</div>'+
          //
          //            '<div class="knockout_li_multiple_choice hidden">'+
          //              '<label class="control-label">Expected Answer(s)</label>'+
          //              '<ul style="padding:0;">'+
          //               '<li>'+
          //                 '<div class="no-padding">'+
          //                    '<label class="control-label checkbox_1">'+
          //                     '<input type="checkbox" checked name="answer_multiple_choice[]">'+
          //                    '</label>'+
          //                 '</div>'+
          //               '</li>'+
          //              '</ul>'+
          //
          //              '<small class="help-block">Candidate should select the exact choices which are checked above to qualify for the test</small>'+
          //            '</div>'+
          //
          //            '<div class="knockout_li_radio_group hidden">'+
          //              '<label class="control-label">Expected Answer</label>'+
          //              '<ul style="padding:0;">'+
          //                '<li>'+
          //                  '<div class="radio no-padding">'+
          //                     '<label class="control-label radio_group_1">'+
          //                     '<input type="radio" checked name="answer_radio">'+
          //                     '</label>'+
          //                  '</div>'+
          //                '</li>'+
          //              '</ul>'+
          //              '<small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>'+
          //            '</div>'+
          //
          //            '<div class="knockout_li_drop_down hidden">'+
          //              '<label class="control-label">Expected Answer</label>'+
          //              '<ul style="padding:0;">'+
          //                '<li>'+
          //                  '<div class="radio no-padding">'+
          //                     '<label class="control-label drop_down_1">'+
          //                     '<input type="radio" checked name="answer_drop_down">'+
          //                     '</label>'+
          //                  '</div>'+
          //                '</li>'+
          //              '</ul>'+
          //              '<small class="help-block">Candidate should select exact option that is selected above to qualify for the test</small>'+
          //            '</div>'+
          //
          //          '</div>'+
          //       '</div>'+
          //       '<div class="row">'+
          //         '<div class="col-sm-10 col-sm-offset-2">'+
          //           '<button type="submit" class="btn btn-sm btn-info">Done</button>'+
          //           '<button type="button" class="btn btn-sm btn-default cancel_button">Cancel</button>'+
          //         '</div>'+
          //       '</div>'+
          //     '</div>'+
          //   '</form>'+
          // '</li>');

        }

        $(".questionRequest").on('submit', function(e){
            e.preventDefault();
            //console.log("console" + $(this).find("input[name='template_id']").val());
            var formData = $(this).serialize();

            // console.log(formData);
            $.ajaxSetup({
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
              type: 'post',
              url: $(this).find("input[name='question_url']").val(),
              data: formData,
              success: function (data) {
                console.log(data);

                //data inserted
                    if(data.status == 200){
                      // location.reload(true);
                      alertify.success(data.msg);
                      // $('#newquestion').attr("disabled", true);
                      // $('#button_error').removeClass("hidden");
                      // $.getJSON($("#baseurl").val()+'/api/term/'+term+'/departments', function(data) {
                      //      $('#department').empty();
                      //      $('#department').append('<option disabled selected>Select Department</option>');
                      //      $.each(data, function(key, value) {
                      //        $('#department').append('<option value="'+value.id+'">'+value.department+'</option>');
                      //      });
                      //  });


                     //data couldnot be inserted
                    }else if(data.status == 202){
                      alertify.warning(data.msg);

                      //data duplicated
                    }else if(data.status == 204){
                      alertify.warning(data.msg);
                    }
                  },
                  error: function (data) {
                  alertify.warning("Oops. something went wrong. Please try again");
                 }
               });
        });
      }
    });
    $("#setting_questionnaire_tab").on('click', 'form .capsule .row .cancel_button_remove', function() {
      $( this ).closest( "li" ).remove();
    });
    $("#setting_questionnaire_tab").on('click', 'form .capsule .row .cancel_button', function() {
      $( this ).closest( ".row" ).parents('.capsule').toggleClass('hidden');
    });
    $("#setting_questionnaire_tab").on('click', '.unordered-list li .edit_question', function() {
      $( this ).closest( ".row" ).siblings('.capsule').toggleClass('hidden');
    });
    $("#setting_questionnaire_tab").on('click', '.unordered-list li .delete_question', function() {
      $( this ).closest( "li" ).remove();
      $('#newquestion').attr("disabled", false);
      $('#button_error').addClass("hidden");
    });
    $("#setting_questionnaire_tab").on('change', '.unordered-list li .format_class', function() {
      var item=$(this);

      if($(this).closest('li').find('.knockout_checkbox').is(":checked"))
      {
        if (item.val() == 1) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 2) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", false);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", true);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_criteria").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 3) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", false);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", true);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_criteria").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 4) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", true);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 5) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 6) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 7) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").removeClass('hidden');
        }
      }
      else {
        if (item.val() == 1) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');
        }
        else if (item.val() == 2) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", false);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", true);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');
        }
        else if (item.val() == 3) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").removeClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", false);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", true);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');
        }
        else if (item.val() == 4) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").addClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", true);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").addClass('hidden');
        }
        else if (item.val() == 5) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');
        }
        else if (item.val() == 6) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');
        }
        else if (item.val() == 7) {
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").addClass('hidden');
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".placeholder_text_data").find( ".placeholder_text" ).attr("disabled", true);
          $( this ).parentsUntil( ".dropdown_format_menu" ).siblings(".option_text_data").removeClass('hidden');

          $( this ).closest( "li" ).find(".knockout_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox").attr("disabled", false);
          $( this ).closest( "li" ).find(".mandatory_checkbox_label").removeClass('hidden');
        }
      }
    });
    $("#setting_questionnaire_tab").on('change', '.unordered-list li .knockout_checkbox', function() {
      var item=$(this).closest('li').find('.format_class');
      if($(this).is(":checked"))
      {
        if (item.val() == 1) {
          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 2) {
          $( this ).closest( "li" ).find(".knockout_criteria").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 3) {
          $( this ).closest( "li" ).find(".knockout_criteria").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 4) {
          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 5) {
          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 6) {
          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
        }
        else if (item.val() == 7) {
          $( this ).closest( "li" ).find(".knockout_criteria").removeClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
          $( this ).closest( "li" ).find(".knockout_li_drop_down").removeClass('hidden');
        }
      }
      else {
        $( this ).closest( "li" ).find(".knockout_criteria").addClass('hidden');
        $( this ).closest( "li" ).find(".knockout_li_number").addClass('hidden');
        $( this ).closest( "li" ).find(".knockout_li_checkbox").addClass('hidden');
        $( this ).closest( "li" ).find(".knockout_li_multiple_choice").addClass('hidden');
        $( this ).closest( "li" ).find(".knockout_li_radio_group").addClass('hidden');
        $( this ).closest( "li" ).find(".knockout_li_drop_down").addClass('hidden');
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
            '<input type="text" class="form-control option_text" data-message="'+colCount+'" name="option[]">'+
           '</td>'+
           '<td valign="center">'+
              '<a href="javascript:void(0)" class="delete_row_option">'+
                '<i class="fa fa-times-circle-o"></i>'+
              '</a>'+
           '</td>'+
       '</tr>');

       $(this).closest('li').find(".knockout_criteria .knockout_li_multiple_choice ul").append('<li>'+
         '<div class="no-padding">'+
            '<label class="control-label checkbox_'+colCount+'">'+
              '<input type="checkbox" name="answer_multiple_choice[]">'+
            '</label>'+
         '</div>'+
       '</li>');

       $(this).closest('li').find(".knockout_criteria .knockout_li_radio_group ul").append('<li>'+
         '<div class="radio no-padding">'+
            '<label class="control-label radio_group_'+colCount+'">'+
              '<input type="radio" name="answer_radio">'+
            '</label>'+
         '</div>'+
       '</li>');

       $(this).closest('li').find(".knockout_criteria .knockout_li_drop_down ul").append('<li>'+
         '<div class="radio no-padding">'+
            '<label class="control-label drop_down_'+colCount+'">'+
              '<input type="radio" name="answer_drop_down">'+
            '</label>'+
         '</div>'+
       '</li>');
    });
    $("#setting_questionnaire_tab").on('click', '.option_table tbody tr td .delete_row_option', function() {
        var colCount_alert = 0;
        var this_value = $(this);
        $(this).closest( "tbody" ).find( "tr" ).each(function () {
            colCount_alert++;
        });
        if (colCount_alert == 1) {
          alert("Atleast One options are mandatory..");
        }else {
          var len = $(this).closest('tbody').find("tr").length;

          $(this).closest('tbody').addClass("temp-"+len);
          var data_message = $(this).closest( "tbody" ).find( "tr td:nth-child(2) input").data('message');

          // console.log(data_message);

          $(this).closest('li').find(".knockout_li_multiple_choice ul li:last-child ").remove();
          $(this).closest('li').find(".knockout_li_radio_group ul li:last-child ").remove();
          $(this).closest('li').find(".knockout_li_drop_down ul li:last-child ").remove();


          $(this).closest('tr').remove();
          for(var i = 1; i<len; i++){
            $(".temp-"+len).find("tr:nth-child("+i+") td").first().text("Option "+i);
            $(".temp-"+len).find("tr:nth-child("+i+") td:nth-child(2) input").data('message', i);

            var value = $(".temp-"+len).find("tr:nth-child("+i+") td:nth-child(2) input").val();


            $(".temp-"+len).closest('li').find(".knockout_li_multiple_choice ul li .checkbox_"+i).html('<input type="checkbox" name="answer_multiple_choice[]" value="'+value+'"> '+value);
            $(".temp-"+len).closest('li').find(".knockout_li_radio_group ul li .radio_group_"+i).html('<input type="radio" name="answer_radio" value="'+value+'"> '+value);
            $(".temp-"+len).closest('li').find(".knockout_li_drop_down ul li .drop_down_"+i).html('<input type="radio" name="answer_drop_down" value="'+value+'"> '+value);

          }

          $(".temp-"+len).removeAttr('class');
        }
    });
    $("#setting_questionnaire_tab").on('keyup', '.option_table tbody tr td .option_text', function() {
      var id = $(this).data("message");
      var value = $(this).val();
      $(this).closest('li').find(".knockout_li_multiple_choice ul li .checkbox_"+id).html('<input type="checkbox" name="answer_multiple_choice[]" value="'+value+'"> '+value);
      $(this).closest('li').find(".knockout_li_radio_group ul li .radio_group_"+id).html('<input type="radio" name="answer_radio" value="'+value+'"> '+value);
      $(this).closest('li').find(".knockout_li_drop_down ul li .drop_down_"+id).html('<input type="radio" name="answer_drop_down" value="'+value+'"> '+value);
    });

    //Quesiton request form submit
    $("#public_check").on('change', function () {
      if($(this).is(":checked")){

        if ($('#private_check').is(":checked")) {
          $( "#both_check" ).prop( "checked", true );
        }

      }
      else {
        if ($('#private_check').is(":checked")) {
          $( "#both_check" ).prop( "checked", false );
        }
        else {
          $(this).prop( "checked", true );
        }
      }
    });
    $("#private_check").on('change', function () {
      if($(this).is(":checked")){

        if ($('#public_check').is(":checked")) {
          $( "#both_check" ).prop( "checked", true );
        }

      }
      else {
        if ($('#public_check').is(":checked")) {
          $( "#both_check" ).prop( "checked", false );
        }
        else {
          $(this).prop( "checked", true );
        }
      }
    });
    $("#both_check").on('change', function () {
      if($(this).is(":checked")){

        $( "#public_check" ).prop( "checked", true );
        $( "#private_check" ).prop( "checked", true );

      }
      else {
        $( "#public_check" ).prop( "checked", true );
        $( "#private_check" ).prop( "checked", false );
      }
    });

    $('#multiple_choice_mcqs').on('change', '.level_easy', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_medium').is(":checked") && $(this).closest('form').find('.level_hard').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_medium').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_hard').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).prop( "checked", true );
            }
          }
        }
    });
    $('#multiple_choice_mcqs').on('change', '.level_medium', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_easy').is(":checked") && $(this).closest('form').find('.level_hard').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_easy').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_hard').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).closest('form').find('.level_easy').prop( "checked", true );
            }
          }
        }
    });
    $('#multiple_choice_mcqs').on('change', '.level_hard', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_easy').is(":checked") && $(this).closest('form').find('.level_medium').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_easy').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_medium').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).closest('form').find('.level_easy').prop( "checked", true );
            }
          }
        }
    });
    $('#multiple_choice_mcqs').on('change', '.level_all', function(){
        if ($(this).is(":checked")) {

          $(this).closest('form').find('.level_easy').prop('checked', true);
          $(this).closest('form').find('.level_medium').prop('checked', true);
          $(this).closest('form').find('.level_hard').prop('checked', true);

        }
        else {

          $(this).closest('form').find('.level_easy').prop('checked', true);
          $(this).closest('form').find('.level_medium').prop('checked', false);
          $(this).closest('form').find('.level_hard').prop('checked', false);

        }
    });

    $('#coding_choice_mcqs').on('change', '.level_easy', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_medium').is(":checked") && $(this).closest('form').find('.level_hard').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_medium').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_hard').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).prop( "checked", true );
            }
          }
        }
    });
    $('#coding_choice_mcqs').on('change', '.level_medium', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_easy').is(":checked") && $(this).closest('form').find('.level_hard').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }else {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }

        }
        else {

          if ($(this).closest('form').find('.level_easy').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_hard').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).closest('form').find('.level_easy').prop( "checked", true );
            }
          }
        }
    });
    $('#coding_choice_mcqs').on('change', '.level_hard', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_easy').is(":checked") && $(this).closest('form').find('.level_medium').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_easy').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_medium').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).closest('form').find('.level_easy').prop( "checked", true );
            }
          }
        }
    });
    $('#coding_choice_mcqs').on('change', '.level_all', function(){
        if ($(this).is(":checked")) {

          $(this).closest('form').find('.level_easy').prop('checked', true);
          $(this).closest('form').find('.level_medium').prop('checked', true);
          $(this).closest('form').find('.level_hard').prop('checked', true);

        }
        else {

          $(this).closest('form').find('.level_easy').prop('checked', true);
          $(this).closest('form').find('.level_medium').prop('checked', false);
          $(this).closest('form').find('.level_hard').prop('checked', false);

        }
    });

    $('#submission_choice_mcqs').on('change', '.level_easy', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_medium').is(":checked") && $(this).closest('form').find('.level_hard').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_medium').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_hard').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).prop( "checked", true );
            }
          }
        }
    });
    $('#submission_choice_mcqs').on('change', '.level_medium', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_easy').is(":checked") && $(this).closest('form').find('.level_hard').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_easy').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_hard').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).closest('form').find('.level_easy').prop( "checked", true );
            }
          }
        }
    });
    $('#submission_choice_mcqs').on('change', '.level_hard', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('form').find('.level_easy').is(":checked") && $(this).closest('form').find('.level_medium').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', true);
          }

        }
        else {

          if ($(this).closest('form').find('.level_easy').is(":checked")) {
            $(this).closest('form').find('.level_all').prop('checked', false);
          }
          else {
            if ($(this).closest('form').find('.level_medium').is(":checked")) {
              $(this).closest('form').find('.level_all').prop('checked', false);
            }
            else {
              $(this).closest('form').find('.level_easy').prop( "checked", true );
            }
          }
        }
    });
    $('#submission_choice_mcqs').on('change', '.level_all', function(){
        if ($(this).is(":checked")) {

          $(this).closest('form').find('.level_easy').prop('checked', true);
          $(this).closest('form').find('.level_medium').prop('checked', true);
          $(this).closest('form').find('.level_hard').prop('checked', true);

        }
        else {

          $(this).closest('form').find('.level_easy').prop('checked', true);
          $(this).closest('form').find('.level_medium').prop('checked', false);
          $(this).closest('form').find('.level_hard').prop('checked', false);

        }
    });

    $('#section-submission-question-Modal').on('change', 'input[name="help_material_name[]"]', function() {
      console.log($(this).val());
      if ($(this).val() == 6) {
        if($(this).is(":checked")){
          $('#submission_limit').attr('disabled', false);
        }
        else {
          $('#submission_limit').attr('disabled', true);
        }
      }

    });

    $("#section-submission-question-Modal").on('change', '.add_resources_submission_ul li input[name="resources[]"]', function() {

      var path = $(this).val().split('\\');
      var fileName = path[path.length-1];

      $(this).closest('li').find('.s_upload_name').removeClass('hidden');
      $(this).closest('li').find('.s_upload_name span').text(fileName);
      $(this).closest('li').find('.f_upload_btn').addClass('hidden');

      if(fileName)
      {
        alertify.success("uploaded resource");
        $(this).closest(".add_resources_submission_ul").append('<li>'+
          '<div class="s_upload_name hidden">'+
            '<span>9a85bf01a4cb686355a00b5363b08e15.ogg</span> <i class="fa fa-times-circle-o s_close"></i>'+
          '</div>'+
          '<div class="f_upload_btn">'+
            ' + Add resources'+
            '<input type="file" name="resources[]">'+
          '</div>'+
        '</li>');
      }

    });

    $("#section-submission-question-Modal").on('click', '.add_resources_submission_ul li .s_upload_name .s_close', function() {
      $(this).closest('li').remove();
    });

    $("#private-submission-question-Modal").on('change', '.add_resources_submission_ul li input[name="resources[]"]', function() {

      var path = $(this).val().split('\\');
      var fileName = path[path.length-1];

      $(this).closest('li').find('.s_upload_name').removeClass('hidden');
      $(this).closest('li').find('.s_upload_name span').text(fileName);
      $(this).closest('li').find('.f_upload_btn').addClass('hidden');

      if(fileName)
      {
        alertify.success("uploaded resource");
        $(this).closest(".add_resources_submission_ul").append('<li>'+
          '<div class="s_upload_name hidden">'+
            '<span>9a85bf01a4cb686355a00b5363b08e15.ogg</span> <i class="fa fa-times-circle-o s_close"></i>'+
          '</div>'+
          '<div class="f_upload_btn">'+
            ' + Add resources'+
            '<input type="file" name="resources[]">'+
          '</div>'+
        '</li>');
      }

    });

    $("#private-submission-question-Modal").on('click', '.add_resources_submission_ul li .s_upload_name .s_close', function() {
      $(this).closest('li').remove();
    });

    $('.state').on('change', '.staged', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('.state').find('.ready').is(":checked")) {
            $(this).closest('.state').find('.all').prop('checked', true);
          }
          else {
            $(this).closest('.state').find('.all').prop('checked', false);
          }

        }
        else {

          if ($(this).closest('.state').find('.ready').is(":checked")) {
            $(this).closest('.state').find('.all').prop('checked', false);
          }
          else {
            $(this).closest('.state').find('.all').prop('checked', false);
            $(this).prop( "checked", true );
          }

        }
    });
    $('.state').on('change', '.ready', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('.state').find('.staged').is(":checked")) {
            $(this).closest('.state').find('.all').prop('checked', true);
          }
          else {
            $(this).closest('.state').find('.all').prop('checked', false);
          }

        }
        else {

            $(this).closest('.state').find('.all').prop('checked', false);
            $(this).closest('.state').find('.staged').prop('checked', true);

        }
    });
    $('.state').on('change', '.all', function(){
      if ($(this).is(":checked")) {
        $(this).closest('.state').find('.staged').prop('checked', true);
        $(this).closest('.state').find('.ready').prop('checked', true);
      }
      else {
        $(this).closest('.state').find('.staged').prop('checked', true);
        $(this).closest('.state').find('.ready').prop('checked', false);
      }
    });

    $('.level').on('change', '.easy', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('.level').find('.intermediate').is(":checked") && $(this).closest('.level').find('.hard').is(":checked")) {
            $(this).closest('.level').find('.all').prop('checked', true);
          }
          else {
            $(this).closest('.level').find('.all').prop('checked', false);
          }

        }
        else {

          if ($(this).closest('.level').find('.intermediate').is(":checked") || $(this).closest('.level').find('.hard').is(":checked")) {
            $(this).closest('.level').find('.all').prop('checked', false);
          }
          else {
            $(this).closest('.level').find('.all').prop('checked', false);
            $(this).prop( "checked", true );
          }

        }
    });
    $('.level').on('change', '.intermediate', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('.level').find('.easy').is(":checked") && $(this).closest('.level').find('.hard').is(":checked")) {
            $(this).closest('.level').find('.all').prop('checked', true);
          }
          else {
            $(this).closest('.level').find('.all').prop('checked', false);
          }

        }
        else {
          if ($(this).closest('.level').find('.easy').is(":checked") || $(this).closest('.level').find('.hard').is(":checked")){
            $(this).closest('.level').find('.all').prop('checked', false);
          }else {
            $(this).closest('.level').find('.easy').prop('checked', true);
            $(this).closest('.level').find('.all').prop('checked', false);
          }

        }
    });
    $('.level').on('change', '.hard', function(){
        if ($(this).is(":checked")) {

          if ($(this).closest('.level').find('.easy').is(":checked") && $(this).closest('.level').find('.intermediate').is(":checked")) {
            $(this).closest('.level').find('.all').prop('checked', true);
          }
          else {
            $(this).closest('.level').find('.all').prop('checked', false);
          }

        }
        else {
          if ($(this).closest('.level').find('.easy').is(":checked") || $(this).closest('.level').find('.intermediate').is(":checked")){
            $(this).closest('.level').find('.all').prop('checked', false);
          }else {
            $(this).closest('.level').find('.easy').prop('checked', true);
            $(this).closest('.level').find('.all').prop('checked', false);
          }

        }
    });
    $('.level').on('change', '.all', function(){
      if ($(this).is(":checked")) {
        $(this).closest('.level').find('.easy').prop('checked', true);
        $(this).closest('.level').find('.intermediate').prop('checked', true);
        $(this).closest('.level').find('.hard').prop('checked', true);
      }
      else {
        $(this).closest('.level').find('.easy').prop('checked', true);
        $(this).closest('.level').find('.intermediate').prop('checked', false);
        $(this).closest('.level').find('.hard').prop('checked', false);
      }
    });

    $('.url_textarea').on('keyup', function(){
      var regex = /https?:\/\/[\-A-Za-z0-9+&@#\/%?=~_|$!:,.;]*/g;
      if($(this).val().match(regex))
      {
        $(this).siblings('.url_tooltip').addClass('hidden');
      }else {
        $(this).siblings('.url_tooltip').removeClass('hidden');
      }
    });

    $('.modal-title-icon').on('click', function(){
      $(this).parent().next().toggleClass("hidden");
    });

    $('.deleteConfirm_section').on('click' , function(e) {
      e.preventDefault();

      const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
      })

      swalWithBootstrapButtons({
        title: 'Are you sure?',
        text: "You are about to delete a section. You will loose all the questions added in this section. But the questions will continue to exist in you question library for further use.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete Section',
        cancelButtonText: 'Cancel',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
          });
          $.ajax({
            type: 'get',
            url: $(this).attr('href'),
            success: function (data) {
              console.log(data);
              if(data.status == 200){
                alertify.success(data.msg);
                location.reload();
              }
            },
            error: function (data) {
              console.log(data);
              alertify.warning("Oops. something went wrong. Please try again");
            }
          });

        }
        else if (result.dismiss === swal.DismissReason.cancel)
        {
        }
      })

      return false;
    });

    $('#myCarouse2').carousel({
     interval: 1000000
    })

    pagination_table('my_pagination_table','pagination_number');
    pagination_table('my_pagination_table_2','pagination_number_2');
    pagination_table('my_pagination_table_3','pagination_number_3');
    pagination_table('my_pagination_table_4','pagination_number_4');
    pagination_table('my_pagination_table_5','pagination_number_5');


    $('.s_radio_border').on('change', 'label', function() {
      
      var id  = $(this).closest('.s_radio_border').attr('id');
      $('#'+id+' .radio_button').closest('label').css('background', '#fff');
      
      if ($(this).find('.radio_button').is(":checked")) {
        $(this).css('background', '#fff9ae');
        $(this).closest('.s_radio_border').siblings('.button_question').find('.clear_question').addClass('active');
      }
      else {
        $(this).find('.radio_button').css('background', '#fff');
      }

    });


    $('#m_timer').countdowntimer({
        hours : 0,
        minutes :1,
        seconds :0,
        timeUp : timeisUp,
        size : "lg"
    });

    function timeisUp() {
      var url = $('.finish_url').attr('href');
      location.href = url;
    }

    // var mcqs_pageLen = 20;
    var mcqs_pageLen = $('#mcqs_pagination_number').data('message');
    var mcqs_curPage = 1;
    var mcqs_item = [];
    for(var i = 1; i<=mcqs_pageLen;i++){
      mcqs_item.push(i);
    }

    function mcqs_isPageInRange( mcqs_curPage, index, maxPages, pageBefore, pageAfter ) {
      if (index <= 1) {
        // first 2 pages
        return true;
      }
      if (index >= maxPages - 2) {
        // last 2 pages
        return true;
      }
      if (index >= mcqs_curPage - pageBefore && index <= mcqs_curPage + pageAfter) {
        return true;
      }
    }
    function mcqs_render( mcqs_curPage, mcqs_item, first ) {
      var html = '', separatorAdded = false;
      for(var i in mcqs_item){
        if ( mcqs_isPageInRange( mcqs_curPage, i, mcqs_pageLen, 2, 2 ) ) {
          html += '<li data-page="' + mcqs_item[i] + '">' + mcqs_item[i] + '</li>';
          // as we added a page, we reset the separatorAdded
          separatorAdded = false;
        } else {
          if (!separatorAdded) {
            // only add a separator when it wasn't added before
            html += '<li class="separator" />';
            separatorAdded = true;
          }
        }
      }

      var holder = document.querySelector("#mcqs_pagination_number");
      holder.innerHTML = html;
      $('#mcqs_pagination_number>li[data-page="' + mcqs_curPage + '"]').addClass('active')
      // document.querySelector('#'+$pagination_id+'>li[data-page="' + mcqs_curPage + '"]').classList.add('active');
      if ( first ) {
        holder.addEventListener('click', function(e) {
          if (!e.target.getAttribute('data-page')) {
            return;
          }

          var pageNum = e.target.getAttribute('data-page');
          $('.question_pre').removeClass('active');
          $('#question_pre_text_'+pageNum).addClass('active');

          mcqs_curPage = parseInt( e.target.getAttribute('data-page') );
          mcqs_render( mcqs_curPage, mcqs_item );
        });
      }
    }
    mcqs_render( 1, mcqs_item, true );


    $('.next_question').on('click' , function(e) {


      if (!e.target.getAttribute('data-page')) {
            return;
      }

      var pageNum = e.target.getAttribute('data-page');
      $('.question_pre').removeClass('active');
      $('#question_pre_text_'+pageNum).addClass('active');

      mcqs_curPage = parseInt( e.target.getAttribute('data-page') );
      mcqs_render( mcqs_curPage, mcqs_item );
    
    });

    $('.clear_question').on('click' , function(e) {
        $(this).closest('.button_question').siblings('.s_radio_border').find('.radio_button').closest('label').css('background', '#fff');
        $(this).closest('.button_question').siblings('.s_radio_border').find('.radio_button').prop('checked', false);
        $(this).removeClass('active');
    });






});


function pagination_table($table_id , $pagination_id) {

  var trnum = 0;
  var maxRows = parseInt("20");
  var totalRows = $("#"+$table_id+" tbody tr").length;
  $("#"+$table_id+" tr:gt(0)").each(function(){
    trnum++;
    if (trnum > maxRows) {
      if (trnum % 2 === 0){}
      else {
        $(this).hide();
      }
    }
    if (trnum <= maxRows) {
        if (trnum % 2 === 0){}
        else {
          $(this).show();
        }
    }
  });



  if (totalRows > maxRows) {

    var pageLen = Math.ceil(totalRows/maxRows);
    var curPage = 1;
    var item = [];
    for(var i = 1; i<=pageLen;i++){
      item.push(i);
    }

    function isPageInRange( curPage, index, maxPages, pageBefore, pageAfter ) {
      if (index <= 1) {
        // first 2 pages
        return true;
      }
      if (index >= maxPages - 2) {
        // last 2 pages
        return true;
      }
      if (index >= curPage - pageBefore && index <= curPage + pageAfter) {
        return true;
      }
    }
    function render( curPage, item, first ) {
      var html = '', separatorAdded = false;
      for(var i in item){
        if ( isPageInRange( curPage, i, pageLen, 2, 2 ) ) {
          html += '<li data-page="' + item[i] + '">' + item[i] + '</li>';
          // as we added a page, we reset the separatorAdded
          separatorAdded = false;
        } else {
          if (!separatorAdded) {
            // only add a separator when it wasn't added before
            html += '<li class="separator" />';
            separatorAdded = true;
          }
        }
      }

      var holder = document.querySelector("#"+$pagination_id);
      holder.innerHTML = html;
      $('#'+$pagination_id+'>li[data-page="' + curPage + '"]').addClass('active')
      // document.querySelector('#'+$pagination_id+'>li[data-page="' + curPage + '"]').classList.add('active');
      if ( first ) {
        holder.addEventListener('click', function(e) {
          if (!e.target.getAttribute('data-page')) {
            return;
          }

          var pageNum = e.target.getAttribute('data-page');
          var trIndex = 0;
          var maxRows = parseInt("20");
          $("#"+$table_id+" tr:gt(0)").each(function(){
            trIndex++;
            if ( trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows) ) {
              if (trIndex % 2 === 0) {}else {
                $(this).hide();
              }
            }else{
              if (trIndex % 2 === 0) {}
              else {
                 $(this).show();
              }
            }
          });

          curPage = parseInt( e.target.getAttribute('data-page') );
          render( curPage, item );
        });
      }
    }
    render( 1, item, true );

    // var pagenum = Math.ceil(totalRows/maxRows);
    // for (var i = 1; i <= 10;) {
    //   $("#"+$pagination_id).append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(Current)</span></span>\</li>').show();
    // }
  }

  // $("#"+$pagination_id+" li:first-child").addClass('active');
  //
  // $("#"+$pagination_id+" li").on('click', function() {
  //   var pageNum = $(this).attr('data-page');
  //   var trIndex = 0;
  //   $("#"+$pagination_id+" li").removeClass('active');
  //   $(this).addClass('active');
  //   $("#"+$table_id+" tr:gt(0)").each(function(){
  //     trIndex++;
  //     if ( trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows) ) {
  //       if (trIndex % 2 === 0) {}else {
  //         $(this).hide();
  //       }
  //     }else{
  //       if (trIndex % 2 === 0) {}
  //       else {
  //          $(this).show();
  //       }
  //     }
  //   });
  // });
}

function testcase_fileformat(){
  swal({
    title: 'Pattern of Test Cases',
    type: 'info',
    html:
      "<p>"+
        "<p>There should be a delimiter </p>"+
        "<p>'-----CodeGrounds-----'</p>"+
        "<p>after input and a delimiter</p>"+
        "<p>'-----EndCodeGrounds-----'</p>"+
        "<p>at the end of test case</p>"+
        "<p><b>Example:</b>If your input is 5 &amp; output is 10,your file should be as</p>"+
        "<pre>5<br>-----CodeGrounds-----<br>10<br>-----EndCodeGrounds-----</pre>"+
        "<p></p>"+
      "</p>" ,
    confirmButtonClass: 'btn-info',
    confirmButtonText: 'Got It!',
  });
}
