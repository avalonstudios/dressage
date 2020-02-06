{{--
  Title: Facebook Page Feed
  Description: Facebook Page Feed
  Category: ava_block_category
  Icon: admin-comments
  Keywords: facebook, page, feed
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
  'slug'            => $block[ 'slug' ],
  'other_classes'   => " {$other_classes}",
  'title'           => $sectionTitle,
  'backImg'         => $image,
  'no_dots'         => ''
];
@endphp

@component( 'comps.blocks.blocks', $componentVars )
  @php
  $facebook_page_title  = $flds["facebook_page_title"];
  $facebook_page_link   = $flds["facebook_page_link"];
  $tabs_to_show         = $flds["tabs_to_show"];
  $width                = $flds["width"];
  $height               = $flds["height"];
  $small_header         = $flds["small_header"];
  $adapt_width          = $flds["adapt_container_width"];
  $hide_cover           = $flds["hide_cover"];
  $show_facepile        = $flds["show_facepile"];
  $hide_cta             = $flds["hide_cta"];

  $tabs = implode( ', ', $tabs_to_show );
  @endphp

  <div class="fb-page-wrapper">
    <div class="fb-page"
      data-href="{{ $facebook_page_link }}"
      data-tabs="{{ $tabs }}"
      data-width="{{ $width }}"
      data-height="{{ $height }}"
      data-small-header="{{ $small_header }}"
      data-adapt-container-width="{{ $adapt_width }}"
      data-hide-cover="{{ $hide_cover }}"
      data-show-facepile="{{ $show_facepile }}"
      data-hide-cta="{{ $hide_cta }}">
      <blockquote cite="{{ $facebook_page_link }}" class="fb-xfbml-parse-ignore">
        <a href="{{ $facebook_page_link }}">{{ $facebook_page_title }}</a>
      </blockquote>
    </div>
  </div>
  <!-- Place <div> tag where you want the feed to appear -->
  <div id="curator-feed-default-layout"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
@endcomponent
