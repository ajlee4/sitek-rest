'use strict';

$(document).ready(function() {
  $('.catalog__list-expand').on('click', function(e) {
    e.preventDefault();
    $(this).hide();
    $('.catalog__sublist').slideDown({
      duration: 200,
    });
  });

  $('.sitekgram__list-expand').on('click', function(e) {
    e.preventDefault();
    $(this).hide();
    $('.sitekgram-sublist').slideDown({
      duration: 200,
    });
  });

  $('.expand-btn').on('click', function(e) {
    e.preventDefault();
    $(this).hide();
    $('.other-sublist').slideDown({
      duration: 200,
    });
  });
  $('#total-price-form-wrap').on('click', function(e) {
    e.preventDefault();
    $('.total-price-form').show(300);
    $('.total-price-field--tablet').hide(300);
  });
  $('#total-price-form-close').on('click', function(e) {
    e.preventDefault();
    $('.total-price-form').hide(300);
    $('.total-price-field--tablet').show(300);
  });
  if (document.body.clientWidth<=425){
    $('#catalog-search .filter-field__title ').on('click', function(e) {
      e.preventDefault();
  
      $(this)
        .next('.filter-field__list')
        .slideToggle(300);
      $(this)
        .children('.catalog-mobile-wrap')
        .toggleClass('open');
    });
  }
 
  $('.sitekgram__subfield .filter-subfield__title ').on('click', function(e) {
    e.preventDefault();
    $(this)
      .next('.filter-subfield__list')
      .slideToggle(300);
    $(this)
      .children('.sitekgram-mobile-wrap')
      .toggleClass('open');
  });
});
