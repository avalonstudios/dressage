@php
$prev = $prev_next_post[ 'prev' ];
$next = $prev_next_post[ 'next' ];
@endphp

@if ( $prev )
<div class="prev-next-posts prev-post">
  <a href="{{ $prev[ 'nextLink' ] }}">
    <div class="image prev-image{{ $prev[ 'prevThumb' ] ? '' : ' no-image' }}">
      @if ( $prev[ 'prevThumb' ] )
        <img src="{{ $prev[ 'prevThumb' ] }}" alt="{{ $prev[ 'prevTitle' ] }}">
      @endif
    </div>
    <div class="content">
      <h3 class="title prev-title">{{ $prev[ 'prevTitle' ] }}</h3>
      <div class="excerpt prev-excerpt">{{ $prev[ 'prevExcerpt' ] }}</div>
    </div>
  </a>
</div>
@endif

@if ( $next )
<div class="prev-next-posts next-post">
  <a href="{{ $next[ 'nextLink' ] }}">
    <div class="image next-image{{ $next[ 'nextThumb' ] ? '' : ' no-image' }}">
      @if ( $next[ 'nextThumb' ] )
        <img src="{{ $next[ 'nextThumb' ] }}" alt="{{ $next[ 'nextTitle' ] }}">
      @endif
    </div>
    <div class="content">
      <h3 class="title next-title">{{ $next[ 'nextTitle' ] }}</h3>
      <div class="excerpt next-excerpt">{{ $next[ 'nextExcerpt' ] }}</div>
    </div>
  </a>
</div>
@endif
