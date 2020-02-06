@php
$postID = $ppost->ID;
$postExcerpt = get_the_excerpt( $postID );

$thumb = get_the_post_thumbnail_url( $postID, 'full' );
$thumb = aq_resize( $thumb, 550, 340, true, true, true );

$noThumb = '';
if ( !$thumb ) {
  $noThumb = ' no-image';
}
@endphp

<article {{ post_class( '', $postID ) }}>
  <div class="article-slide-wrapper">
    <div class="post-thumbnail{{ $noThumb }}">
      @if ( $thumb )
        <img src="{{ $thumb }}" alt="">
      @endif
    </div>
    <header>
      <div class="post-content">
        <h1 class="post-title">{{ $ppost->post_title }}</h1>
        @include('partials/entry-meta')
        <div class="entry-content">{!! $postExcerpt !!}</div>
      </div>
    </header>
  </div>
</article>
