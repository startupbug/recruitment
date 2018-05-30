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
      $(this).closest('.ul_add').find('.education_list_form').addClass('hidden');
      $(this).closest('.ul_add').find('.education_list_data').removeClass('hidden');

      $(this).closest('.education_list_data').siblings('.education_list_form').removeClass('hidden');
      $(this).closest('.education_list_data').addClass('hidden');
    });

    $('.cancel_education_list_form').on('click', function(){
      $(this).closest('.education_list_form').siblings('.education_list_data').removeClass('hidden');
      $(this).closest('.education_list_form').addClass('hidden');
    });

    $('.form-control').on('keyup',function() {
      $(this).siblings('.btn').attr('disabled', false);
    });

    $('.add_skill').on('click', function() {
      var value = $(this).siblings('.form-control').val();
      var count = 0;
      var lenght = $(this).closest('.form-inline').siblings('.skill_info').children('.pad-right-10').length;

      for (var i = 1; i < lenght+1; i++) {
        var list_value = $(this).closest('.form-inline').siblings('.skill_info').children('.pad-right-10:nth-child('+i+')').find('.tags').text();
        if (value == list_value) {
          count++;
        }
      }
      if (count == 0 && value != '') {
        $(this).closest('.form-inline').siblings('.skill_info').append('<span class="pad-right-10">'+
          '<input type="hidden" name="skills[]" value="'+value+'" >'+
          '<span class="tags vertical-divider">'+value+'</span>'+
          '<a href="#" class="no-underline close_skills">×</a>'+
        '</span>');
      }

      $(this).siblings('.form-control').val('');

      $('.close_skills').on('click', function() {
        $(this).closest('.pad-right-10').remove();
      });

    });


    $('.cancel_edit_profile').on('click', function(){
      $(this).closest('.edit_profile').siblings('.view_profile').removeClass('hidden');
      $(this).closest('.edit_profile').addClass('hidden');
    });

    $('.cancel_view_profile').on('click', function(){
      $(this).closest('.view_profile').siblings('.edit_profile').removeClass('hidden');
      $(this).closest('.view_profile').addClass('hidden');
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
$('#profileEducationStore').on('change',function(e){
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
$('#editprofileEducationStore').on('submit',function(e){
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
            $('#editprofileEducationStore')[0].reset();
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

//on form submit Update Candidate Project Info
$('.delete_candidate_education').on('submit',function(e){
    e.preventDefault();
    console.log("herezz");
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
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
