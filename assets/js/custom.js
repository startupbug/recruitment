 $(".accordion-toggle").click(function(){
  // $(this).children('span').toggleClass("glyphicon-minus");
    $(this).children('span').toggleClass("fa-sort-desc");
});

$("#cover_image_btn").click(function(){
   $("#cover_image").toggleClass("hidden");
});

$(".click_time").click(function(){
   $(this).siblings().toggleClass("hidden");
   $(this).toggleClass("hidden");
});

$(document).ready(function() {
  $("#s_txtEditor").Editor();
  $("#s_txtEditor_programming").Editor();
  $("#s_txtEditor_programming_debug").Editor();
  $("#s_txtEditor_submission").Editor();

  $("#s_txt_BD_InstructionsEditor").Editor();
  $("#s_txt_BD_DescriptionEditor").Editor();

  $("#s_txtEditor_selection_coding").Editor();
  $("#s_select_mcqs_txtEditor").Editor();
  $("#s_txtEditor_Add_section_submission").Editor();
  $("#s_txtEditor_Add_section_fill_blanks_submission").Editor();
  $("#s_txtEditor_Add_public_page").Editor();
  $("#s_txtEditor_Edit_public_page").Editor();

});

$(function () {


    $('.language_multi').multiselect({
        includeSelectAllOption: true
    });
    $('#btnSelected').click(function () {
        var selected = $(".language_multi option:selected");
        var message = "";
        selected.each(function () {
            message += $(this).text() + " " + $(this).val() + "\n";
        });
        alert(message);
    });

    $('#tag_multi').multiselect({
        includeSelectAllOption: true
    });
    $('#btnSelected').click(function () {
        var selected = $("#tag_multi option:selected");
        var message = "";
        selected.each(function () {
            message += $(this).text() + " " + $(this).val() + "\n";
        });
        alert(message);
    });

    $('#tag_multi_programming').multiselect({
        includeSelectAllOption: true
    });
    $('#btnSelected').click(function () {
        var selected = $("#tag_multi_programming option:selected");
        var message = "";
        selected.each(function () {
            message += $(this).text() + " " + $(this).val() + "\n";
        });
        alert(message);
    });

    $('#tag_multi_choose').multiselect({
        includeSelectAllOption: true
    });
    $('#btnSelected').click(function () {
        var selected = $("#tag_multi_choose option:selected");
        var message = "";
        selected.each(function () {
            message += $(this).text() + " " + $(this).val() + "\n";
        });
        alert(message);
    });

    $('#tag_multi_choose_sub').multiselect({
        includeSelectAllOption: true
    });
    $('#btnSelected').click(function () {
        var selected = $("#tag_multi_choose_sub option:selected");
        var message = "";
        selected.each(function () {
            message += $(this).text() + " " + $(this).val() + "\n";
        });
        alert(message);
    });

});

$(function () {
  $('[data-toggle="tooltip"]').tooltip({
      title: "asdasd",
      html: true
  });

  // $(".s_tooltip_modal").click(function(){
  //   alert(this);
  //    $(this).siblings().toggle();
  // });
  $(".s_tooltip_modal").click(function(){
console.log('add click event');
   });
//   $(".s_tooltip_modal").each( function() {
//     alert("Your book is overdue.");
// });

})
