<div class="keen-product-images-wrapper">
  @php
  remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
  do_action( 'woocommerce_before_single_product_summary' );
  @endphp
  @if ( $mainImageID )
  <div class="keen-main-image">
    <img src="{{ $img }}" data-slide-id="1">
  </div>
  @endif
  @if ( $imageIDs )
    <div class="keen-product-gallery-thumbs">
      @foreach ( $imageIDs as $image )
        @php
        $img = wp_get_attachment_url( $image, 'woocommerce_gallery_thumbnail' );
        $img = aq_resize( $img, 98, 94, true, true, true );
        @endphp
        <div class="keen-product-gallery-image"><img src="{{ $img }}" data-slide-id="{{ $loop->iteration + 1 }}"></div>
      @endforeach
    </div>
  @endif
</div><!-- keen-product-images-wrapper -->

@php
array_unshift( $imageIDs, (int) $mainImageID );
@endphp

<div class="keen-product-images-modal">
  <div class="products-slider-wrapper">
    <div class="products-modal-slider">
      @foreach ( $imageIDs as $image )
        @php
        $url    = $image[ 'url' ];
        $img    = wp_get_attachment_url( $image, 'woocommerce_gallery_thumbnail' );
        $large  = aq_resize( $img, 1800, 900, false, true, true );
        @endphp
        <div class="gallery-image-slide">
          <img src="{{ $large }}" alt="{{ $alt }}" title="{{ $title }}">
        </div>
      @endforeach
    </div><!-- products-modal-slider -->
    <button class="close-slider btn btn-outline">close</button>
  </div><!-- products-slider-wrapper -->
</div><!-- keen-product-images-modal -->
