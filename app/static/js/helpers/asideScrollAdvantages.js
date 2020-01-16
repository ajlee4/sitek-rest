'use strict';

function checkScroll() {
  var $scroll = $('.scroll');
  $scroll.each(function(i, el) {
    var top = $(el).offset().top -100;
    var bottom = top + $(el).height();
    var scroll = $(window).scrollTop();
    var id = $(el).attr('id');
    if (scroll > top && scroll < bottom) {
      $('#aside .nav__link').removeClass('active');
      $('a[href="#' + id + '"]').addClass('active');
    }
  });

}
function stickyAside() {
    var a = document.querySelector('.aside__inner'),
    b = null,
    P = 100; // если ноль заменить на число, то блок будет прилипать до того, как верхний край окна браузера дойдёт до верхнего края элемента. Может быть отрицательным числом
  window.addEventListener('scroll', Ascroll, false);
  document.body.addEventListener('scroll', Ascroll, false);
  $(document).ready(Ascroll,false)
  function Ascroll() {
    if (b == null) {
      var Sa = getComputedStyle(a, ''),
        s = '';
      for (var i = 0; i < Sa.length; i++) {
        if (
          Sa[i].indexOf('overflow') == 0 ||
          Sa[i].indexOf('padding') == 0 ||
          Sa[i].indexOf('border') == 0 ||
          Sa[i].indexOf('outline') == 0 ||
          Sa[i].indexOf('box-shadow') == 0 ||
          Sa[i].indexOf('background') == 0
        ) {
          s += Sa[i] + ': ' + Sa.getPropertyValue(Sa[i]) + '; ';
        }
      }
      b = document.createElement('div');
      b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
      a.insertBefore(b, a.firstChild);
      var l = a.childNodes.length;
      for (var i = 1; i < l; i++) {
        b.appendChild(a.childNodes[1]);
      }
      a.style.height = b.getBoundingClientRect().height + 'px';
      a.style.padding = '0';
      a.style.border = '0';
    }
    var Ra = a.getBoundingClientRect(),
      R = Math.round(
        Ra.top + b.getBoundingClientRect().height - document.querySelector('#advantages-bench-section').getBoundingClientRect().top + 0,
      ); // селектор блока, при достижении верхнего края которого нужно открепить прилипающий элемент;  Math.round() только для IE; если ноль заменить на число, то блок будет прилипать до того, как нижний край элемента дойдёт до футера
    if (Ra.top - P <= 0) {
      if (Ra.top - P <= R) {
        b.className = 'stop';
        b.style.top = -R + 'px';
      } else {
        b.className = 'sticky';
        b.style.top = P + 'px';
      }
    } else {
      b.className = '';
      b.style.top = '';
    }
    window.addEventListener(
      'resize',
      function() {
        a.children[0].style.width = getComputedStyle(a, '').width;
      },
      false,
    );
  }
}
$(document).ready(function() {
  $('#menu ').on('click', 'a', function(event) {
    event.preventDefault();

    $('#menu .active').removeClass('active');
    $(this).addClass('active');
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({ scrollTop: top }, 1000);
  });

  checkScroll();
  stickyAside();
});


jQuery(window).scroll(function() {
  checkScroll();

});
