{{--
  Title: Services
  Description: Services only
  Category: keen_block_category
  Icon: admin-comments
  Keywords: hero, images
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
$text = $flds[ 'text' ];

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
  @php
  // Services Section
  $services   = $flds[ 'services' ];
  $title      = $services[ 'section_title' ];
  $reps       = $services[ 'services_rep' ];
  @endphp
  @if ( $reps )
    <div class="services-section">
      <div class="text-only">{{ $text }}</div>
      <div class="services-images">
        @foreach ( $reps as $rep )
          @php
          $title = $rep[ 'subtitle' ];
          $image = $rep[ 'background_image' ];
          @endphp
          <div class="service-slide slide-{{ $loop->iteration }}" style="background-image: url( '{{ $image }}' );">
            <div class="services-content">
              <h3 class="title">{{ $title }}</h3>
            </div><!-- .services-content -->
          </div><!-- .service-slide slide-{{ $loop->iteration }} -->
        @endforeach
      </div>
    </div>
  @endif
@endcomponent
