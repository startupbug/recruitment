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