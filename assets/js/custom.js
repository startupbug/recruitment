$(".accordion-toggle").click(function(){
  // $(this).children('span').toggleClass("glyphicon-minus");
    $(this).children('span').toggleClass("fa-sort-desc");
});

$(document).ready(function() {
  $("#s_txtEditor").Editor();
});
