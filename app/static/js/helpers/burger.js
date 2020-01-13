'use strict';

$('#header-tablet-menu').on('click', function (e) {
  e.preventDefault();
  $(this).toggleClass('burger-close');
  $('.header__tablet-nav').toggleClass('open');
 
});

$('#header-mobile-menu').on('click', function (e) {
  e.preventDefault();
  $(this).toggleClass('burger-close');
  $('.header__mobile-menu').fadeToggle();
  $('body').toggleClass('header-menu-opened');
 
});