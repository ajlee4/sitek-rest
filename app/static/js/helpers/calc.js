'use strict';

$(document).ready(function() {
  calculatePrice();
  $('#calc-form input').on('change', function() {
    calculatePrice();
  });
});

function calculatePrice() {
  var totalPrice = parseInt($('.total-price').attr('data-default-price'));
  var supplyPrice = parseInt($('input[name=supply]:checked', '#calc-form').val());
  var analogPrice = parseInt($('input[name=analog]:checked', '#calc-form').val());
  var digitalPrice = parseInt($('input[name=digital]:checked', '#calc-form').val());
  var equipmentPrice = parseInt($('input[name=equipment]:checked', '#calc-form').val());
  var workingPrice = parseInt($('input[name=working]:checked', '#calc-form').val());
  var otherPrice = $('input[name=other]:checked', '#calc-form');
  var totalOtherPrice = 0;
  $('input[name=other]:checked', '#calc-form').each((i, item) => {
    totalOtherPrice += parseInt(item.value);
  });
  totalPrice = totalPrice + supplyPrice + analogPrice + digitalPrice + equipmentPrice + workingPrice + totalOtherPrice;
  $('.total-price').text(totalPrice + '€');
}
