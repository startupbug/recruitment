 $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });
$(document).ready(function(){

	$('.edit_public_page_view_data').click(function(){
		console.log($(this).data('id'));

		$("#public_page_view_id").val($(this).data('id'));

            var page_view_id = $(this).data('id');
		 $.ajax({
                type: 'post',
                url: $(this).data('url'),
                data: {'id': page_view_id},

                success: function (data) {
                console.log("success");
                console.log(data);
                $("#publicpageview_title").val(data.page_name);
                $("#publicpageview_text_editor").find('.fr-element.fr-view p').text(data.page_detail);
            }
	});
		 });


});