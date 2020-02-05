{{--
  Title: Post Slider
  Description: Post slider
  Category: keen_block_category
  Icon: admin-comments
  Keywords: post, slider
  Mode: edit
  Align: full
  PostTypes: page post
  SupportsAlign: true
  SupportsMode: true
  SupportsMultiple: true
--}}

@php
$flds  = get_fields(  );
$secProp = $flds[ 'sec_prop' ];

$active = $secProp[ 'active' ];

$images = $flds[ 'images' ];

if ( ! $images ) {
  return;
}

if ( ! $active ) {
  return;
}

$sectionTitle = $flds[ 'section_title' ];

$componentVars = [
  'id'              => $block[ 'id' ],
  'classes'         => $block[ 'classes' ],
  'slug'            => $block[ 'slug' ],
  'other_classes'   => " {$other_classes}",
  'title'           => $sectionTitle,
  'backImg'         => $image,
  'has_deco'        => 1
];
@endphp

@component( 'comps.blocks.blocks', $componentVars )
  <div class="single-post-slider">
    @foreach ( $images as $image )
      @php
      $img = $image[ 'image' ][ 'url' ];
      $alt = $image[ 'image' ][ 'alt' ];
      $img = aq_resize( $img, 720, 407, true, true, true );
      @endphp
      <div class="post-slider-image">
        <img src="{{ $img }}" alt="{{ $alt }}">
      </div>
    @endforeach
  </div>
@endcomponent
