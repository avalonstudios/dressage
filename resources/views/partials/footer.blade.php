<footer class="content-info">
  <div class="container">
    @php dynamic_sidebar('sidebar-footer') @endphp
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
