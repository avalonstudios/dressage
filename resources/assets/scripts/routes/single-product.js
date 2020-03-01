export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    $( '.keen-product-images-wrapper img' ).on( 'click', function( e ) {
      e.preventDefault(  );
      let $slideID = $( this ).data( 'slide-id' );
      $( '.keen-product-images-modal' ).fadeIn(  );
      galleryModalSlider( $slideID );
    } );

    $( '.keen-product-images-modal .close-slider' ).on( 'click', function( ) {
        shudownSlider(  );
    } );

    $( document ).keyup( function( e ) {
      if ( e.key === 'Escape' ) {
        shudownSlider(  );
      }
    } );
  },
};

function shudownSlider(  ) {
  $( '.keen-product-images-modal' ).fadeOut( function(  ) {
    $( '.products-modal-slider' ).slick( 'unslick' );
  } );
}

function galleryModalSlider( $slideID ) {
  var settings = {
    dots: false,
    arrows: true,
    nextArrow: '<div class="custom-slick-arrow custom-slick-next arrows-blue circled"></div>',
    prevArrow: '<div class="custom-slick-arrow custom-slick-prev arrows-blue circled"></div>',
    infinite: true,
    fade: false,
    speed: 700,
    autoplay: false,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  };

  $( '.products-modal-slider' ).slick( settings );
  $( '.products-modal-slider' ).slick( 'slickGoTo', $slideID - 1 );
}
