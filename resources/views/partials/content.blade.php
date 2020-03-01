@php
if ( !has_post_thumbnail() ) {
  $noImage = ' no-image';
}
$img = get_the_post_thumbnail_url();
$img = aq_resize( $img, 550, 340, true, true, true );
$link = get_the_permalink();
@endphp

<article @php post_class() @endphp>
  <div class="side-left">
    <div class="post-thumbnail{{ $noImage }}">
      @if ( has_post_thumbnail() )
        <img src="{{ $img }}" alt="{{ get_the_title() }}">
      @endif
    </div>
  </div>
  <div class="side-right">
    <div class="right-content">
      <header>
        <h2 class="entry-title"><a href="{{ $link }}">{!! get_the_title() !!}</a></h2>
        @include('partials/entry-meta')
      </header>
      <div class="entry-summary">
        @php the_excerpt() @endphp
      </div>
    </div>
    @include (
      'comps.btns.btn',
      [
        'btnTitle'  => 'read more',
        'btnLink'   => $link,
        'btnType'   => '',
      ]
    )
  </div>
</article>
