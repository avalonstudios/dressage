{{--
  Title: Image Gallery
  Description: Image Gallery
  Category: ava_block_category
  Icon: admin-comments
  Keywords: image, gallery
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

$images = $flds[ 'image_gallery' ];

if ( ! $images ) {
  return;
}

$imagesNum = count( $images );

switch ( $imagesNum ) {
  case $imagesNum % 4 == 0:
    $splitter = 4;
    break;
  case $imagesNum % 2 == 0:
    $splitter = 2;
    break;
  case $imagesNum % 3 == 0:
    $splitter = 3;
    break;
  case $imagesNum % 5 == 0:
    $splitter = 5;
    break;
  default:
    $splitter = 3;
    break;
}

$imageIterator = 1;

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
  <div class="gallery-images-wrapper split-{{ $splitter }}">
    @foreach ( $images as $image )
      @php
      $title        = $image[ 'title' ];
      $url          = $image[ 'url' ];
      $alt          = $image[ 'alt' ];
      $desc         = $image[ 'description' ];
      $caption      = $image[ 'caption' ];
      $name         = $image[ 'name' ];

      $large        = aq_resize( $url, 1800, 1113, true, true, true );
      $medium       = aq_resize( $url, 900, 556, true, true, true );
      $small        = aq_resize( $url, 600, 371, true, true, true );
      @endphp
      <div class="gallery-image image-{{ $imageIterator }}">
        <a href="{{ $large }}" data-slide-id={{ $loop->iteration }}>
          <figure>
            <picture>
              <source media="(min-width: 1800px)" srcset="{{ $large }}">
              <source media="(min-width: 601px)" srcset="{{ $medium }}">
              <img src="{{ $small }}" alt="{{ $alt }}" title="{{ $title }}">
            </picture>
            @if ( $caption )
              <figcaption>
                <span class="caption">{{ $caption }}</span>
              </figcaption>
            @endif
          </figure>
        </a>
      </div>
      @php
      $imageIterator++;
      if ( $imageIterator >= ( $splitter + 1 ) ) {
        $imageIterator = 1;
      }
      @endphp
    @endforeach
  </div>

  <div class="gallery-modal">
    <div class="gallery-slider-wrapper">
      <div class="gallery-modal-slider">
        @foreach ( $images as $image )
          @php
          $title        = $image[ 'title' ];
          $url          = $image[ 'url' ];
          $alt          = $image[ 'alt' ];
          $desc         = $image[ 'description' ];
          $caption      = $image[ 'caption' ];
          $name         = $image[ 'name' ];

          $large        = aq_resize( $url, 1800, 1113, true, true, true );
          $medium       = aq_resize( $url, 900, 556, true, true, true );
          $small        = aq_resize( $url, 600, 371, true, true, true );
          @endphp
          <div class="gallery-image-slide">
            <img src="{{ $large }}" alt="{{ $alt }}" title="{{ $title }}">
          </div>
        @endforeach
      </div> <!-- gallery-modal-slider -->
      <button class="close-slider btn">close</button>
    </div> <!-- gallery-slider-wrapper -->
  </div> <!-- gallery-modal -->
@endcomponent
