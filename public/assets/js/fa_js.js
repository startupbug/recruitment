  $('.message_success_change').on('change', function() {
     var message = $(this).data("message");
     alertify.success(message);
   });


   $('.message_warning_change').on('change', function() {
     var message = $(this).data("message");
     alertify.warning(message);
   });

   $('.message_success_click').on('click', function() {
     var message = $(this).data("message");
     alertify.success(message);
   });


   $('.message_warning_click').on('click', function() {
     var message = $(this).data("message");
     alertify.warning(message);
   });