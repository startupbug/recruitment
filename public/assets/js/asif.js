$(document).ready(function(){
    $('input[name="candidate_resume"]').change(function(e){
        var fileName = e.target.files[0].name;
        $(this).closest('section').find('.file_name').text(fileName);
    });

    $(".currently_working").on('click', function() {
      
      if($(this).is(":checked")) {
        $(this).closest('.checkbox').siblings('.to_date_value').find('.month_to').attr('disabled', true);
        $(this).closest('.checkbox').siblings('.to_date_value').find('.month_to').attr('disabled', true);
        $(this).closest('.checkbox').siblings('.to_date_value').hide();
        $(this).closest('.checkbox').siblings('.to_value').hide();
      }
      else{
        $(this).closest('.checkbox').siblings('.to_date_value').find('.month_to').attr('disabled', false);
        $(this).closest('.checkbox').siblings('.to_date_value').find('.month_to').attr('disabled', false);
        $(this).closest('.checkbox').siblings('.to_date_value').show();
        $(this).closest('.checkbox').siblings('.to_value').show();
      }

    });

    $('.edit_education_list').on('click', function(){
      $('.education_list_form').addClass('hidden');
      $('.education_list_data').removeClass('hidden');
      
      $(this).closest('.education_list_data').siblings('.education_list_form').removeClass('hidden');
      $(this).closest('.education_list_data').addClass('hidden');
    });

    $('.cancel_education_list_form').on('click', function(){
      $(this).closest('.education_list_form').siblings('.education_list_data').removeClass('hidden');
      $(this).closest('.education_list_form').addClass('hidden');
    });

});

//on form submit change Admin Profile picture
$('#change_can_profile_pic').change(function(e){
    e.preventDefault();
    console.log("herezz");
    var form = new FormData(this);
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: form,
        processData: false,
        contentType: false,
        success: function(response){
            if(response.code === 200){              
                $('.profile-pic > img').attr('src', response.img);
                alertify.success(response.success);              
               
            }
            if(response.code === 202){
                 alertify.warning(response.error);  
                // alert(response.error);
              
            }
            if(response.code === 202){
               
            }
        },
        error: function(){
            alert('Image uploaading failed');
        }
    });
});

//on form submit change Candidate Resume
$('#CanResumeUpload').change(function(e){
    e.preventDefault();
    console.log("herezz");
    var form = new FormData(this);
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: form,
        processData: false,
        contentType: false,
        success: function(response){
            if(response.code === 200){
                alertify.success(response.success);
                setTimeout(function(){
                   window.location.reload();
               }, 1000);
            }
            if(response.code === 202){
                 alertify.warning(response.error);
            }
            if(response.code === 202){
                 alertify.warning(response.error);
            }
        },
        error: function(){
            alert('Image uploaading failed');
        }
    });
});
//on form submit change Candidate Resume

//on form submit Create Candidate Education Info
$('#profileEducationStore').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#profileEducationStore')[0].reset();
            setTimeout(function(){
               window.location.reload();
           }, 1000);
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Create Candidate Education Info

//on form submit Edit/Update Candidate Education Info
$('editprofileEducationStore').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
             setTimeout(function(){
             window.location.reload();
         }, 1000);            
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Edit/Update Candidate Education Info

//on form submit Update Candidate Work Experience Info
$('#storeprofileWorkExperience').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#storeprofileWorkExperience')[0].reset();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Update Candidate Work Experience Info

//on form submit Update Candidate Project Info
$('#storeprofileProjectInfo').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#storeprofileProjectInfo')[0].reset();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Update Candidate Project Info

//on form submit Update Candidate Language
$('#storeprofileLanguages').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#storeprofileLanguages')[0].reset();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else if(data.status == 204){
            alertify.warning(data.msg);
            $('#storeprofileLanguages')[0].reset();
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Update Candidate Language

//on form submit Update Candidate Framework
$('#storeprofileFrameworks').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#storeprofileFrameworks')[0].reset();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else if(data.status == 204){
            alertify.warning(data.msg);
            $('#storeprofileFrameworks')[0].reset();
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Update Candidate Framework

//on form submit Update Candidate Publications
$('#storeprofilePublications').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#storeprofilePublications')[0].reset();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Update Candidate Publications

//on form submit Update Candidate Achievements
$('#storeprofileAchievements').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#storeprofileAchievements')[0].reset();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Update Candidate Achievements

//on form submit Update Candidate Achievements
$('#storeprofileConnections').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    var formData = $(this).serialize();
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            alertify.success(data.msg);
            $('#storeprofileConnections')[0].reset();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
    });
});
//on form submit Update Candidate Achievements

//Candidate Info
$("#UpdateCanInfo").on('submit', function(e){
  e.preventDefault();
  var formData = $(this).serialize();
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
  });
  $.ajax({
    type: $(this).attr('method'),
    url: $(this).attr('action'),
    data: formData,
    success: function (data) {
      console.log(data);
      if(data.status == 200){
        alertify.success(data.msg);
      }else if(data.status == 202){
        alertify.warning(data.msg);
      }else{
        alertify.warning(data.array.errorInfo[2]);
      }
    },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
  });
});


$('.delete_candidate_education').on('click',function(e){
    e.preventDefault();
    var number = Math.floor(Math.random() * (1 - 200 + 5));
    var classname = "remove"+number;
    $(this).closest('li.panel-block').addClass(classname);
    
    $.ajax({
        type: $(this).data('message'),
        url: $(this).attr('href'),
        success: function (data) {
          console.log(data);
          if(data.status == 200){
            $('.'+classname).closest('li.panel-block').remove();
            alertify.success(data.msg);
         //    setTimeout(function(){
         //     window.location.reload();
         // }, 1000);
            $(this).closest('.panel-block').remove();
          }else if(data.status == 202){
            alertify.warning(data.msg);
          }else if(data.status == 203){
            alertify.warning(data.msg);
          }else if(data.status == 204){
            alertify.warning(data.msg);
          }else{
            alertify.warning(data.array.errorInfo[2]);
          }
        },
      error: function (data) {
        alertify.warning("Oops. something went wrong. Please try again");
      }
    });
});
//on form submit Update Candidate Project Info

//Candidate Post Setting Info Data Through Ajax
$("#can_save_setting_info").on('submit', function(e){
  e.preventDefault();
  $('.loader').removeClass('hidden');
  var formData = $(this).serialize();
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
  });
  $.ajax({
    type: $(this).attr('method'),
    url: $(this).attr('action'),
    data: formData,
    success: function (data) {
      console.log(data);
      if(data.status == 200){
          
         $('.loader').addClass('hidden');
        alertify.success(data.msg);
        $('#can_save_setting_info').find('.form-control').val('');
      }else if(data.status == 202){
        alertify.warning(data.msg);
      }else{
        alertify.warning(data.array.errorInfo[2]);
      }
    },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
    }
  });
});
//Candidate Post Setting Info Data Through Ajax