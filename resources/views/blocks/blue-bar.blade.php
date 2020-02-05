{{--
  Title: Blue Bar
  Description: Blue bar text
  Category: keen_block_category
  Icon: admin-comments
  Keywords: blue, bar, text
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

$text = $flds[ 'text' ];

if ( ! $text ) {
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
  <div class="text">{{ $text }}</div>
@endcomponent
