$(".accordion-toggle").click(function(){
  // $(this).children('span').toggleClass("glyphicon-minus");
    $(this).children('span').toggleClass("fa-sort-desc");
});

$(document).ready(function() {
  $("#s_txtEditor").Editor();
  $("#s_txtEditor_programming").Editor();
  $("#s_txtEditor_programming_debug").Editor();
  $("#s_txtEditor_submission").Editor();
});

$(function () {
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

});
