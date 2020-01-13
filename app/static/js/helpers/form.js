'use strict';

$(document).ready(function() {
  $('#catalog-search').submit(function(e) {
    var $form = $(this);
    e.preventDefault();
    console.log($form.serialize());
    $.ajax({
      type: $form.attr('method'),
      url: $form.attr('action'),
      data: $form.serialize(),
    }).fail(function(error) {
      console.error(error);
    });
  });

  $('.total-price-form').submit(function(e) {
    var $form = $(this);
    e.preventDefault();

    // Получение даты

    var date = new Date();
    var dd = date.getDate();
    var mm = date.getMonth() + 1;
    var yyyy = date.getFullYear();
    var hours = date.getHours();
    var minutes = date.getMinutes();

    if (dd < 10) {
      dd = '0' + dd;
    }
    if (mm < 10) {
      mm = '0' + mm;
    }
    if (minutes < 10) {
      minutes = '0' + minutes;
    }

    var date = dd + '/' + mm + '/' + yyyy;
    var time = hours + ':' + minutes;
    //
    var modelBench = $(this).attr('data-model-bench');
    const data = {
      date,
      time,
      modelBench,
    };

    $form.find('input, textearea, select').each(function() {
      data[this.name] = $(this).val();
    });

    $.ajax({
      type: $form.attr('method'),
      url: $form.attr('action'),
      data,
    }).fail(function(error) {
      console.error(error);
    });
  });

  $(document).ready(function() {
    $('.contact-form').submit(function(e) {
      const data = {};
      e.preventDefault();
      var $form = $(this);
      $form.find('input, textarea, select').each(function() {
        data[this.name] = $(this).val();
      });

      $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data,
      }).fail(function(error) {
        console.error(error);
      });
    });
  });

  $(document).ready(function() {
    $('.sitekgram__filter input').on('change', function(e) {
      const data = {};
      e.preventDefault();
      var $form = $('.sitekgram__filter');
      $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize(),
      }).fail(function(error) {
        console.error(error);
      });
    });
  });
});

// $('#sitekgram-page').ready(function() {
//   $('#catalog-search input').on('change', function(e) {
//     const data = {}
//     var $form = $(this);
//     e.preventDefault();
//     console.log($form.serialize());
//     $.ajax({
//       type: $form.attr('method'),
//       url: $form.attr('action'),
//       data: $form.serialize(),
//     }).fail(function(error) {
//       console.error(error);
//     });
//   });

//   $('.sitekgram_subfield input').on('change', function(e) {
//     const data = {}
//     var $form = $(this);
//     e.preventDefault();
//     $.ajax({
//       type: $form.attr('method'),
//       url: $form.attr('action'),
//       data: $form.serialize(),
//     }).fail(function(error) {
//       console.error(error);
//     });
//   });
// });
