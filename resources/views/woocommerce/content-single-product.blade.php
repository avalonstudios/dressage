{{--
The template for displaying product content in the single-product.php template

This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see     https://docs.woocommerce.com/document/template-structure/
@package WooCommerce/Templates
@version 3.6.0
--}}

@php
defined( 'ABSPATH' ) || exit;
global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
//do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
  echo get_the_password_form(); // WPCS: XSS ok.
  return;
}

$stockQty = $product->get_stock_quantity(  );
if ( $stockQty >= 1 ) {
  $inStockClass = 'stock-in';
  $inStockText = 'in stock';
} else {
  $inStockClass = 'stock-out';
  $inStockText = 'out of stock';
}

remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

$mainImageID = $product->get_image_id(  );
$img = wp_get_attachment_url( $mainImageID, 'woocommerce_single' );
$img = aq_resize( $img, 443, 421, false, true, true );

$imageIDs = $product->get_gallery_image_ids(  );
@endphp

<div class="keen-single-product-wrapper">
  <div id="product-@php the_ID(); @endphp" @php wc_product_class( '', $product ); @endphp>

    <div class="keen-product-wrapper">

      @include( 'partials.shop.single-product-images' )

      <div class="summary entry-summary">
        @php
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        add_action( 'woocommerce_single_product_summary', function() {
          global $product;
          $prod_sku = $product->get_sku(  );
          $prod_description = $product->get_description(  );
          @endphp
            <div class="keen-product-info">
              <div class="keen-product-sku"><span class="sku-title">item code: </span><span class="sku-code">{{ $prod_sku }}</span></div>
              <div class="keen-product-description">{!! $prod_description !!}</div>
            </div>
          @php
        }, 6 );
        @endphp

        <div class="keen-top-meta">
          <div class="keen-categories">{!! $product->get_categories() !!}</div>
          <div class="keen-in-stock {{ $inStockClass }}">{{ $inStockText }}</div>
        </div>

        @php
        do_action( 'woocommerce_single_product_summary' );
        @endphp
      </div>
    </div>
  </div>
</div>

@php
echo do_shortcode( "[shop_messages]" );
do_action( 'woocommerce_after_single_product' ); @endphp

@include( 'partials.shop.customers-also-bought' )
