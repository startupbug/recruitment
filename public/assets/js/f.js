
  $(".rec_div").hide();
  $(".rec_div2").hide();
  /* Adding Test Host */
  $("#hostTestAdd").on('submit', function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
          type: $(this).attr('method'),
          url: $(this).attr('action'),
          data: formData,
          success: function (data) {
            console.log(data);
           if(data.status == 200){
              alertify.success(data.msg);
              setTimeout(function(){ $('#_first_model').modal('toggle'); }, 2500);

                }else if(data.status == 202){
                  alertify.warning(data.msg);
                }
              },
              error: function (data) {
               alertify.warning("Oops. something went wrong. Please try again");
             }
           });
  });
  //Email report checbox handling
  $('#check_emailreport').change(function() {
    ($(this).is(":checked")) ? ( $(".rec_div").show() ) : ( $(".rec_div").hide() );
  });

  $("#rev_button, #rev_cancel_button").on("click", function(e){
      e.preventDefault();
      (this.id == 'rev_button') ? ( $(".rec_div").hide(),  $(".rec_div2").show() ): ( $(".rec_div2").hide(), $(".rec_div").show() );
  });

  $('.codeQuesCheck').change(function() {
    console.log("asdaf");
    var check;
    //$(this).closest('tbody');
     var table= $(this).closest('table');
     ($(this).is(":checked")) ?
          (

            $('td input:checkbox',table).prop('checked', true),
            check = $('td input:checkbox',table).map(function() {
              return this.value;
            }).get(),
            console.log(check),
            $(this).closest('.tab-pane').find('.input_c_id').val(check)

          ) :

          ( $('td input:checkbox',table).prop('checked', false),
            $(this).closest('.tab-pane').find('.input_c_id').val('')
          );

  });
