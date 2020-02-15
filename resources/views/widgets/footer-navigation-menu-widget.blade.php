@php
$flds = $flds;
$titleLink = $flds[ 'title_link' ];
$pages = $flds[ 'pages' ];
$shopcats = $flds[ 'shop_categories' ];
@endphp

{!! $args[ 'before_widget' ] !!}
{!! $args[ 'before_title' ] !!}
@if ( $titleLink )
  <a href="{!! $titleLink !!}">{!! $instance[ 'title' ] !!}</a>
@else
  {!! $instance[ 'title' ] !!}
@endif
{!! $args[ 'after_title' ] !!}

<div class="sep"></div>

@if ( $pages or $shopcats )

  <div class="widget-body list-unstyled">
    <ul class="menu">
    @if ( $pages )
      @foreach ( $pages as $page )
        @php
        $id       = $page->ID;
        $title    = $page->post_title;
        @endphp
        <li><a href="{!! get_the_permalink( $id ) !!}">{{ $title }}</a></li>
      @endforeach
    @endif

    @if ( $shopcats )
      @foreach ( $shopcats as $sc )
        @php
        $id       = $sc->term_id;
        $title    = $sc->name;
        $link     = get_term_link( $id, 'product_cat' );
        @endphp
        <li><a href="{!! $link !!}">{{ $title }}</a></li>
      @endforeach
    @endif
    </ul>
  </div>

@endif

{!! $args[ 'after_widget' ] !!}
