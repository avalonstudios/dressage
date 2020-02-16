@php
$opts = $getoptions;
@endphp

<footer class="content-info">
  <div class="container">
    @include( 'widgets.footer-widgets' )
  </div>
  <div class="sep"></div>
  <div class="footer-credits-wrapper">
    <div class="footer-credits-width">
      <div class="footer-credits">
        <a href="{{ get_home_url(  ) }}" class="custom-logo-link small footer-logo" rel="home"><img src="@asset( 'images/logo-small.png' )" class="custom-logo small-logo" alt="Mediterranean Academy of Classical Dressage"></a>
        <div class="copyright">&copy; {{ date( 'Y' ) }} {{ get_bloginfo( 'name' ) }}</div>
        @include ( 'partials.menus.social-menu', [ 'position' => 'footer-menu' ] )
      </div>
    </div>
  </div>
</footer>

@include ( 'partials.menus.side-menu' )
@if (has_nav_menu('primary_navigation'))
  <div class="main-navigation footer">
    <button class="close btn small"><i class="fas fa-times"></i></button>
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    <div class="underlay"></div>
  </div>
@endif
