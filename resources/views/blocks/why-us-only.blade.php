{{--
  Title: Why Us
  Description: Why us ( no services )
  Category: keen_block_category
  Icon: admin-comments
  Keywords: why us, why, us
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

if ( ! $active ) {
  return;
}

$sectionTitle = $flds[ 'section_title' ];

$wu         = $flds[ 'why_us' ];
$wuBackImg  = $wu[ 'background_image' ];
$wuBackImg  = aq_resize( $wuBackImg, 960, 482, true, true, true );
$wuText     = $wu[ 'text' ];

$backImg    = $flds[ 'background_image' ];
$backImg    = aq_resize( $backImg, 960, 482, true, true, true );

$componentVars = [
  'id'              => $block[ 'id' ],
  'classes'         => $block[ 'classes' ],
  'slug'            => $block[ 'slug' ],
  'other_classes'   => " {$other_classes}",
  'title'           => '',
  'backImg'         => $image,
  'has_deco'        => 1
];
@endphp

@component( 'comps.blocks.blocks', $componentVars )
  <div class="why-us-section" style="background-image: url( '{{ $wuBackImg }}' );">
    <div class="why-us-content">
      <div class="title-background">
        <h3 class="section-title">
          <span class="has-deco">{{ $sectionTitle }}</span>
        </h3>
      </div>
      <div class="text">{{ $wuText }}</div>
    </div>
  </div>
  <div class="background-image" style="background-image: url( '{{ $backImg }}' );"></div>
@endcomponent
