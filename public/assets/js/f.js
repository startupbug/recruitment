
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

  $(".adv_filButton").on("click", function(e){
      e.preventDefault();
      console.log("fil button" + $(this).data('temptype') + $(this).data('questype'));
  });

  $(".quesDetail").on("click", function(e){
      e.preventDefault();
      console.log("data" + $(this).data('id') + "questype" + $(this).data('questype'));
      var quesType = $(this).data('questype');
      var questionid = $(this).data('id'); 
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      });

      $.ajax({
        type: 'post',
        url: $(this).data('url'),
        data: {'id': questionid, 'quesType': quesType},
        success: function (data) { 
           console.log("success");
           console.log(data);
           //console.log("data" + $(this).data('id') + "questype" + data.data.ques_type_id);
            
            if(quesType == 1){
               $("#pub_mcq_type").text(data.data.type_name);
               $("#pub_mcq_no").text(data.data.id);
               $("#pub_mcq_statement").html(data.data.question_statement);
               $("#pub_mcq_tags").text(data.data.question_tag[0].tag_name);

                /* Multiple Choices HTML */
                  $choices_html = ``;

                  var i=1;
                  var partialFlag = 0;
                  var shuffleFlag = 0;
                  $.each(data.data.question_choices, function( index, value ) {
                           //alert( index + ": " + value );
                           //value.partial_marks = value.partial_marks ? value.partial_marks : '';
                           $choices_html += `<tr class="">
                                              <td class="">`+i+`.</td>
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

                  $("#choiceTable_lib").html($choices_html);

        }else if(quesType==2){

          console.log("ques2 success");

               $(".pub_cod_no").text(data.data.id);
               $(".pub_cod_title").val(data.data.coding_program_title);
               $(".pub_cod_statement").html(data.data.question_statement);
               $(".pub_cod_input").text(data.data.input);
               $(".pub_cod_output").text(data.data.output);

               //test cases
               //pub_cod_cases
                  var cases_html = "";
                  var i =1;
                   $.each(data.data.test_cases, function( index, value ) {
                           //alert( index + ": " + value );
                           //value.partial_marks = value.partial_marks ? value.partial_marks : '';
                           cases_html += `<tr>
                                        <td valign="center">`+i+`</td>
                                        <td valign="center">
                                            `+value.test_case_name+`
                                        </td>
                                        <td valign="center">
                                            <input type="number" name="" value="`+value.weightage+`" disabled>
                                        </td>
                                    </tr> `;
                    i++;              
                  });
                   
                   $("#pub_cod_cases").html(cases_html);

                   //pub input output
                    var inout_html = "";
                    var i =1;
                     $.each(data.data.sample_input_output, function( index, value ) {
                             //alert( index + ": " + value );
                             //value.partial_marks = value.partial_marks ? value.partial_marks : '';
                             inout_html += `<tr>
                                          <td valign="center">`+i+`</td>
                                          <td valign="center">
                                              <textarea class="form-control" name="option" rows="4" required="" disabled> `+value.input+`
                                              </textarea>
                                          </td>
                                          <td valign="center">
                                              <textarea class="form-control" name="option" rows="4" required="" disabled> `+value.output+`</textarea>
                                          </td>
                                      </tr>`;
                      i++;              
                    });

                   $("#pub_cod_inout").html(inout_html);

                   $("#pub_cod_tags").text(data.data.question_tag[0].tag_name);

                   $("#pub_cod_level").text(data.data.level_name);

                   $(".pub_cod_provider").val(data.data.provider);
                   
                   $(".pub_cod_author").val(data.data.user_name);

          //Assign model values
          
         // if(data.status == 200){
         //    alertify.success(data.msg);
         //    setTimeout(function(){ $('#_first_model').modal('toggle'); }, 2500);
            
         //      }else if(data.status == 202){           
         //        alertify.warning(data.msg);
         //      }    
            }
          },
            error: function (data) {
              console.log(data);
             //alertify.warning("Oops. something went wrong. Please try again");
           }
         });

  });

