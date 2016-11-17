

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

$(function(){
  $("#video-toggle").click(function(){
    $("#videoModal").toggleClass("open in");
  });
  $("#video-close").click(function(){
    $("#videoModal").removeClass("open in");
  });
});

$(function(){

  //init carousels
  $(".product-carousel").slick({
    prevArrow: '<button type="button" class="slick-prev carousel-btn">&lt;</button>',
    nextArrow: '<button type="button" class="slick-next carousel-btn">&gt;</button>',
    infinite: true,
    speed: 2000,
    autoplay: true,
    autoplaySpeed: 2000,
    fade: true,
    slidesToShow:1,
    adaptiveHeight: true,
    cssEase: 'linear'
  });

  $(".quote-carousel").slick({
      prevArrow: '<a class="slick-prev carousel-btn">&lt;</a>',
      nextArrow: '<a class="slick-next carousel-btn">&gt;</a>',
      appendArrows: '#carousel-nav',
      appendDots: '#carousel-nav',
      dots: true,
      infinite: true,
  });

  $(".good-meadow-carousel").slick({
      infinite: true,
      arrows: false,
      fade: true,
      autoplay: true,
      slidesToShow:1,
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
