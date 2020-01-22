'use strict';

$('#header-tablet-menu').on('click', function (e) {
  e.preventDefault();
  $(this).toggleClass('burger-close');
 $('.header').toggleClass('open')
 $('.header__tablet-nav').slideToggle()
  $('body').toggleClass('header-menu-opened');
 
});

$('#header-mobile-menu').on('click', function (e) {
  e.preventDefault();
  $(this).toggleClass('burger-close');
  $('.header__mobile-menu').fadeToggle();
  $('body').toggleClass('header-menu-opened');
 
});