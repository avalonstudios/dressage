export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $( '.main-navigation .search-btn' ).on( 'click', menuSearchBtn );
    $( '.close' ).on( 'click', closeBtn );
    // open main menu
    $( '.main-navigation .menu-btn' ).on( 'click', menuBtn );
    // open side menu
    $( '.main-navigation .three-lines' ).on( 'click', sideMenu );
    // underlay close side-menu
    $( '.side-menu .underlay' ).on( 'click', underlaySideMenu );

    $( '.gallery-images-wrapper a' ).on( 'click', function( e ) {
      e.preventDefault(  );
      let $slideID = $( this ).data( 'slide-id' );
      $( '.gallery-modal' ).fadeIn(  );
      galleryModalSlider( $slideID );
    } );

    $( '.gallery-modal .close-slider' ).on( 'click', function( ) {
        shudownSlider(  );
    } );

    $( document ).keyup( function( e ) {
      if ( e.key === 'Escape' ) {
        shudownSlider(  );
      }
    } );


    $( window ).on( 'resize', (  ) => {
      doNoImage(  );
    } );

    $( window ).on( 'scroll', (  ) => {
      // close stuff on scroll
      underlaySideMenu(  );

      addClassToMenu(  );
    } );

    setTimeout( function( ) {
      doNoImage(  );
      doHeroSlider(  );
      doProductsSlider(  );
      doLatestPostsSlider(  );
    }, 500 );
  },
};

function doNoImage(  ) {
  let $noImage = $( '.no-image' );
  $noImage.each( function(  ) {
    let width = $( this ).outerWidth(  );
    let height = Math.round( width / 1.618 );
    $( this ).height( height );
  } );
}

function doHeroSlider(  ) {
  var heroSlider = {
    dots: false,
    arrows: false,
    //nextArrow: '<div class="custom-slick-arrow custom-slick-next"></div>',
    //prevArrow: '<div class="custom-slick-arrow custom-slick-prev"></div>',
    infinite: true,
    fade: true,
    speed: 700,
    autoplay: false,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.hero-slides-content',
  };

  var heroSliderContent = {
    dots: true,
    arrows: false,
    //nextArrow: '<div class="custom-slick-arrow custom-slick-next"></div>',
    //prevArrow: '<div class="custom-slick-arrow custom-slick-prev"></div>',
    infinite: true,
    speed: 700,
    autoplay: false,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.hero-slides',
  };

  $( '.hero-slides' ).slick( heroSlider );
  $( '.hero-slides-content' ).slick( heroSliderContent );
}

function galleryModalSlider( $slideID ) {
  var settings = {
    dots: false,
    arrows: true,
    nextArrow: '<div class="custom-slick-arrow custom-slick-next"></div>',
    prevArrow: '<div class="custom-slick-arrow custom-slick-prev"></div>',
    infinite: true,
    fade: false,
    speed: 700,
    autoplay: false,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  };

  $( '.gallery-modal-slider' ).slick( settings );
  $( '.gallery-modal-slider' ).slick( 'slickGoTo', $slideID - 1 );
}

function menuSearchBtn(  ) {
  let $searchForm = $( '.main-navigation .header-search-form' );
  let $mainNav = $( '.main-navigation' );
  let $navWrapper = $( '.main-navigation-wrapper' );
  $mainNav.addClass( 'search-open' );
  $navWrapper.fadeOut(  );
  $searchForm.addClass( 'open' );
  $searchForm.fadeIn(  );
}

function closeBtn( e ) {
  e.preventDefault(  );
  $( this ).closest( '.open' ).removeClass( 'open' ).fadeOut( 'slow', function(  ) {
    $( '.nav-primary' ).css( 'display', '' );
    $( '.side-menu' ).css( 'display', '' );
    $( '.main-navigation' ).removeClass( 'search-open' );
    $( '.main-navigation-wrapper' ).fadeIn(  );
  } );
  let $underlay   = $( '.main-navigation .underlay' );
  $underlay.fadeOut(  );
}

function menuBtn( e ) {
  e.preventDefault(  );
  let $navPrimary = $( '.main-navigation.footer' );
  let $underlay   = $( '.main-navigation .underlay' );
  //$navPrimary.css( 'display', '' );
  $navPrimary.addClass( 'open' );
  $underlay.fadeIn(  );
}

function sideMenu( e ) {
  e.preventDefault(  );
  let $sideMenu = $( '.side-menu' );
  $sideMenu.addClass( 'open' );
}

function underlaySideMenu(  ) {
  let $sideMenu = $( '.side-menu' );
  $sideMenu.removeClass( 'open' );
}

function addClassToMenu(  ) {
  let scroll = $( window ).scrollTop(  );

  if ( scroll > 0 ) {
    $( '.main-navigation' ).addClass( 'scrolled' );
  } else {
    $( '.main-navigation' ).removeClass( 'scrolled' );
  }
}

function shudownSlider(  ) {
  $( '.gallery-modal' ).fadeOut(  );
  $( '.gallery-modal-slider' ).slick( 'unslick' );
}

function doProductsSlider(  ) {
  var theSlider = {
    dots: false,
    arrows: true,
    nextArrow: '<div class="custom-slick-arrow custom-slick-next arrows-blue circled"></div>',
    prevArrow: '<div class="custom-slick-arrow custom-slick-prev arrows-blue circled"></div>',
    infinite: true,
    speed: 700,
    autoplay: false,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1042,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };

  let $slides = $( '.products-slides .woocommerce ul.products' );

  $slides.on( 'init', function(  ) {
    let $lastSlide = $( '.products-slides .slick-active' ).last(  );
    $lastSlide.addClass( 'last-active-slide' );
  } );

  $slides.on( 'beforeChange', function(  ) {
    $( '.products-slides .slick-slide' )
      .removeClass( 'last-active-slide' )
      .addClass( 'inactive-slide' );
  } );

  $slides.on( 'afterChange', function(  ) {
    let $lastSlide = $( '.products-slides .slick-active' ).last(  );
    $lastSlide.addClass( 'last-active-slide' );
  } );

  $slides.slick( theSlider );
}

function doLatestPostsSlider(  ) {
  var settings = {
    dots: false,
    arrows: true,
    nextArrow: '<div class="custom-slick-arrow custom-slick-next arrows-blue circled"></div>',
    prevArrow: '<div class="custom-slick-arrow custom-slick-prev arrows-blue circled"></div>',
    infinite: true,
    speed: 700,
    autoplay: false,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  };

  let $slides = $( '.latest-posts .posts-wrapper' );

  $slides.slick( settings );
}
