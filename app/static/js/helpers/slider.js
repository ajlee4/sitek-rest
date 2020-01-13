'use strict';

$(document).ready(function() {
  $('#main__slider').slick({
    dots: true,
    infinite: true,
    autoplay: false,
    prevArrow: $('.prev-arrow'),
    nextArrow: $('.next-arrow'),
  },
  $('.main__slider').addClass('created')
  );
  $('.slider-primary').slick({
    dots: true,
    infinite: true,
    autoplay: false,

  },
  $('.slider-primary').addClass('created')
  );

});

$(document).ready(function() {
  $('.slider-tab').slick({
    dots: true,
    infinite: true,
    // autoplay:true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});
