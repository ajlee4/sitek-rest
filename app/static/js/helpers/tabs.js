$(document).ready(function(){
    $('ul.tabs__header').on('click', 'li:not(.active)', function() {
        $(this)
          .addClass('active').siblings().removeClass('active')
          .closest('#tabs').find('div.tab-content').removeClass('active').eq($(this).index()).addClass('active');
      });
})
