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


/* Datatable Callings */
// $(".public_mcq_table").DataTable(); 
// $(".public_coding_table").DataTable();
// $(".private_mcq_table").DataTable();
// $(".private_coding_table").DataTable();
// $(".private_submission_table").DataTable();
});

$(document).ready(function() {
    var deleteurl = $('.label-public-page').data('delete');
    var template_id = $('.label-public-page').data('id');
     $.ajax({
        type: 'post',
        url: $('.label-public-page').data('url'),
        data: {'id': template_id},
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                $('.label-public-page').append('<label> '+data[i].tag_name+' <span data-url="'+deleteurl+'" data-template_id="'+data[i].template_id+'" data-id="'+data[i].id+'" class="btn delete_public_tag">x</span> </label> ')
            }
        }
    });

});


$('.tag_textbox').keyup(function(e){
    
    var value = $(this).val();
    var deleteurl = $('.label-public-page').data('delete');
    console.log(deleteurl);
    var template_id = $(this).data('id');
    if(e.keyCode == 13)
    {
        $.ajax({
            type: 'post',
            url: $(this).data('url'),
            data: {'id': template_id,'value': value},
            success: function (data) {
                    if (data != "alredy inserted") {
                        var delete_image_tags = "delete_image_tags";
                        $('.label-public-page').empty();
                        for (var i = 0; i < data.length; i++) {
                            $('.label-public-page').append('<label> '+data[i].tag_name+' <span data-url="'+deleteurl+'" data-template_id="'+data[i].template_id+'" data-id="'+data[i].id+'" class="btn delete_public_tag">x</span> </label> ')
                        }
                         alertify.success("page view updated successfully");
                    }
                    else{
                        
                         alertify.error(data);
                    }
            }
        });
    }    
});


$( ".label-public-page" ).on('click', '.delete_public_tag', function() {
    var id = $(this).data('id');
    var template_id = $('.label-public-page').data('id');
    var deleteurl = $('.label-public-page').data('delete');

    $.ajax({
        type: 'get',
        url: $(this).data('url'),
        data: {'id': id,'template_id': template_id},
        success: function (data) {

                    $('.label-public-page').empty();
                    for (var i = 0; i < data.length; i++) {
                        $('.label-public-page').append('<label> '+data[i].tag_name+' <span data-url="'+deleteurl+'" data-template_id="'+data[i].template_id+'" data-id="'+data[i].id+'" class="btn delete_public_tag">x</span> </label> ')
                    }
                     alertify.success("page view updated successfully");
                
        }
    });
});




// $('.paginathing_table tbody').paginathing({
//       perPage: 10,
//       insertAfter: '.table',
//       pageNumbers: true
// }); 