@php
$thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$thumb = aq_resize( $thumb, 1920, 600, true, true, true );
@endphp

<article @php post_class() @endphp>
  <header @if ( $thumb ) style="background-image: url( '{{ $thumb }}' );" @endif>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
    @if ( ! $thumb )
    <div class="no-post-image"></div>
    @endif
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
