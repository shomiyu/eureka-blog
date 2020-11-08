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

  // 一覧のいいねボタンはクリックできないようにする
  $(window).on('load', function () {
    $('.home .wp_ulike_btn').attr('disabled', 'true');
  });
});
