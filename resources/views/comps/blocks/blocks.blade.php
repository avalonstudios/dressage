<article id="{{ $id }}" class="ava-block {{ $classes }}{{ $other_classes }}{{ $backImg ? ' has-background' : '' }}"@if ( $backImg ) style="background-image:url( '{{ $backImg }}' );" @endif>
  <div class="block-content-wrapper {{ $slug }}-wrapper">
    @if ( $title and ! $no_title )
      <h2 class="section-title">{{ $title }}</h2>
    @endif
    {{ $slot }}
  </div>
</article>
