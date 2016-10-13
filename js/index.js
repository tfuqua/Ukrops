

$(function(){
  $("#searchToggle").click(function(){
    $("#searchForm").toggleClass('active');
  });
});

$(function(){
  $("#navbar-toggle").click(function(){
    $("html").toggleClass('show-menu');
  });
});

$(function(){
  $(".chevron").click(function(){
    $(this).closest("li").toggleClass('active-menu');
  });
});



function isElementInViewport (el) {

    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }

    var rect = el.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        //rect.left >= 0 &&
        //rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
    );
}

var animationCheck = function() {
    $('.animate').each(function(){
      if (isElementInViewport($(this))){
        $(this).removeClass('animate');
        $(this).addClass('animated');
      } else {
      }
    });
};

//jQuery
$(window).on('DOMContentLoaded load resize scroll', animationCheck);
