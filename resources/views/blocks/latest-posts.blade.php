{{--
  Title: Latest Posts
  Description: Latest posts
  Category: keen_block_category
  Icon: admin-comments
  Keywords: latest, posts
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

$latest   = $flds[ 'select_latest' ];

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
  @if ( $latest == 'latest' )
    @php
    $args = [
      'post_type'             => 'post',
      'posts_per_page'        => 2,
      'ignore_sticky_posts'   => 1
    ];
    @endphp
  @elseif ( $latest == 'manual' )
    @php
    $chosenPosts = $flds[ 'chosen_posts' ];
    $args = [
      'post_type'             => 'post',
      'posts_per_page'        => 2,
      'ignore_sticky_posts'   => 1,
      'post__in'              => $chosenPosts
    ];
    @endphp
  @endif
  @php
  $latestPostsQuery = new WP_Query( $args );
  $postCounter = 1;
  if ( $latestPostsQuery->have_posts() ) {
    while ( $latestPostsQuery->have_posts() ) { $latestPostsQuery->the_post(  ); @endphp
      @include ( 'partials.content', [ 'postCounter', $postCounter ] )
    @php
    $postCounter++;
    }
  }
  @endphp
  @include (
    'comps.btns.btn',
    [
      'btnTitle'  => 'see more tips',
      'btnLink'   => App::getBlogLink(  ),
      'btnType'   => '',
      'btnTarget' => ''
    ]
  )
  <div class="grey-grad"></div>
@endcomponent
