// START section-magnific.php code

// Prevent gallery link interation until page content is fully loaded.
jQuery(window).on('load', function() {
  jQuery('.gallery-item').css('pointer-events', 'auto');
  jQuery('.gallery').css('opacity', 1);
  jQuery('.loader').css('display', 'none');
});

// Magnific Popup gallery and carousel modal
jQuery(window).on('load', function() {
  jQuery('.gallery-item').magnificPopup({
    type: 'image',
    gallery:{
      enabled:true
    }
  });
});

jQuery("iframe").wrap("<div class='iframe-wrapper'/>");

// END section-magnific.php code