{{--
  Title: Why Us & Services
  Description: WHy Us on the left, Services on the right
  Category: keen_block_category
  Icon: admin-comments
  Keywords: why us, services
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
  // Why Us Section
  $wu       = $flds[ 'why_us' ];
  $title    = $wu[ 'section_title' ];
  $backImg  = $wu[ 'background_image' ];
  $text     = $wu[ 'text' ];
  $btn      = $wu[ 'button' ];
  if ( $btn ) {
    $btnTitle   = $btn[ 'title' ];
    $btnLink    = $btn[ 'url' ];
    $btnTarget  = $btn[ 'target' ];
  }
  @endphp

  @if ( $wu )
    <div class="why-us-section" style="background-image: url( '{{ $backImg }}' );">
      <div class="why-us-content">
        <div class="title-background">
          <h3 class="section-title">
            <span class="has-deco">{{ $title }}</span>
          </h3>
        </div>
        <div class="text">{{ $text }}</div>
        @include (
          'comps.btns.btn',
          [
            'btnTitle'  => $btnTitle,
            'btnLink'   => $btnLink,
            'btnType'   => '',
            'btnTarget' => $btnTarget
          ]
        )
      </div>
    </div>
  @endif
  @php
  // Services Section
  $services   = $flds[ 'services' ];
  $title      = $services[ 'section_title' ];
  $reps       = $services[ 'services_rep' ];
  @endphp
  @if ( $reps )
    <div class="services-section">
      <div class="title-background">
        <h3 class="section-title">
          <span class="has-deco">{{ $title }}</span>
        </h3>
      </div><!-- .title-background -->
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
  @endif
@endcomponent
