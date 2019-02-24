jQuery(document).ready(function ($) {
  slickSlide();
});

jQuery(window).resize(function ($) {
  slickSlide();
});

function slickSlide() {
  var carousel = $('#carousel-selector');
  var windowWidth = $(window).width();
  var commonBreakpoint = 300;

  if (windowWidth < commonBreakpoint && carousel.hasClass('slick-initialized')) {
    carousel.slick('unslick');
  } else if (windowWidth >= commonBreakpoint && !carousel.hasClass('slick-initialized')) {
    carousel.slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1
    });
  }
} slickSlide();