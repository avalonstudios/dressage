export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $( '.single-post .wrap.container' ).on('swipeleft', function() {
      console.log( 'swipeleft' );
      var post_nav = jQuery('link[rel="next"]');
      if ( post_nav ) {
        jQuery(location).attr('href', post_nav.attr('href'));
      }
    }).on('swiperight', function() {
      console.log( 'swiperight' );
      var post_nav = jQuery('link[rel="prev"]');
      if ( post_nav ) {
        jQuery(location).attr('href', post_nav.attr('href'));
      }
    });
  },
};
