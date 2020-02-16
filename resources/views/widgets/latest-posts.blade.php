@php
$args = [
  'post_type'     => 'post',
  'numberposts'   => 3
];

$pposts = get_posts( $args );
@endphp

<div class="footer-latest-posts">
  @each( 'comps.post-secs.footer-latest-posts', $pposts, 'ppost' )
</div>
