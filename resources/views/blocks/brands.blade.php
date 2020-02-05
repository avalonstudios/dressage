{{--
  Title: Brands
  Description: Brands
  Category: keen_block_category
  Icon: admin-comments
  Keywords: our, brands
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
$brands = $flds[ 'brands' ];

if ( ! $active ) {
  return;
}

if ( ! $brands ) {
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
  <div class="brands-slider-wrapper">
    <div class="brands-slider">
      @foreach ( $brands as $brand )
        @php
        $img = $brand[ 'image' ];
        $img = aq_resize( $img, 120, 75, false, true, true );
        @endphp
        <div class="brand-slide">
          <div class="image"><img src="{{ $img }}" alt=""></div>
        </div>
      @endforeach
    </div>
  </div>
@endcomponent
