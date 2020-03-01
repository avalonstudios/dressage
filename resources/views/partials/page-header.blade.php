@php
$displayPageTitle = $getfields[ 'display_page_title' ];

if ( is_shop() ) {
  $shopPageID = get_option( 'woocommerce_shop_page_id' );
  $thumb      = get_the_post_thumbnail_url( $shopPageID, 'full' );
  $displayPageTitle = 1;
} elseif ( has_post_thumbnail() ) {
  $thumb = get_the_post_thumbnail_url();
}

if ( !$displayPageTitle ) {
  return;
}

$thumb = aq_resize( $thumb, 1920, 600, true, true, true );
@endphp

<div class="page-header" @if ( $thumb ) style="background-image: url( '{{ $thumb }}' );" @endif>
  <h1>{!! App::title() !!}</h1>
  @php woocommerce_breadcrumb() @endphp
  @if ( ! $thumb )
  <div class="no-post-image"></div>
  @endif
</div>
