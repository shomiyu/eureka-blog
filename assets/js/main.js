jQuery(function ($) {
  $('#js-menuOpen').on('click', function () {
    if ($('header').hasClass('is-active-menu')) {
      $('header').removeClass('is-active-menu');
      $('body').css('overflow', 'auto');
    } else {
      $('header').toggleClass('is-active-menu');
      $('body').css('overflow', 'hidden');
    }
  });

  // $('.js-hoverMenu').hover(function () {
  //   var hoverTarget = $(this).attr('data-target');
  //   $('#' + hoverTarget).toggleClass('is-active');
  // });
});
