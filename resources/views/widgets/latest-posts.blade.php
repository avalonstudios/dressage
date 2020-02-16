@php
$args = [
  'post_type'     => 'post',
  'numberposts'   => 3
];

$pposts = get_posts( $args );
@endphp

<div class="widget footer-latest-posts">
  <h3 class="widget-title">Latest Posts</h3>
  <div class="widget-body">
    @each( 'comps.post-secs.footer-latest-posts', $pposts, 'ppost' )
  </div>
</div>
