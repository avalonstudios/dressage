{{--
  Title: Display Team Block
  Description: Display Team Block
  Category: keen_block_category
  Icon: admin-comments
  Keywords: team, our, members
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

$sectionTitle = $secProp[ 'section_title' ];
$componentVars = [
  'id'              => $block[ 'id' ],
  'classes'         => $block[ 'classes' ],
  'other_classes'   => " {$other_classes}",
  'title'           => $sectionTitle,
  'backImg'         => $image,
  'no_dots'         => ''
];
@endphp

@component( 'comps.blocks-wrapper', $componentVars )
  <pre>@dump($flds)</pre>
@endcomponent
