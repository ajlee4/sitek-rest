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

  $('#slider-scope-min').slick({
    dots: true,
    infinite: true,
    autoplay: false,


  },
  $('.slider-scope-min').addClass('created')
  );


  $('#configuration-bench-slider').slick({
    dots: true,
    infinite: true,
    autoplay: false,


  },
  $('.configuration-bench-slider').addClass('created')
  );


  $('.configuration-bench-slider-created').slick({
    dots: true,
    infinite: true,
    autoplay: false,


  },
 
  );

 

  $('.clients-slider').slick({
    dots: true,
    infinite: true,
    autoplay: false,


  },
 
  );


  $('#advantages-bench-slider').slick({
    dots: true,
    infinite: true,
    autoplay: false,


  },
  $('.advantages-bench-slider').addClass('created')
  );

  $('#scenario-slider').slick({
    dots: true,
    infinite: true,
    autoplay: false,


  },
  $('.scenario-slider').addClass('created')
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
