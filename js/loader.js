(function ($) {
  'use strict';

  // Preloader
  $(window).on('load', function () {
    $('#preloader')
      .delay(450)
      .fadeOut('slow', function () {
        $(this).remove();
      });
  });
})(window.jQuery);
