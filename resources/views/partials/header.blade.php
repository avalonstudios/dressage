<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <div class="main-navigation">
      <div class="main-navigation-wrapper">
        <div class="menus-wrapper">
          <div class="side-left">
            <a href="{{ get_home_url(  ) }}" class="custom-logo-link small" rel="home"><img src="@asset( 'images/logo-small.png' )" class="custom-logo small-logo" alt="Mediterranean Academy of Classical Dressage"></a>
            {!! App::getCustomLogo(  ) !!}
            <button class="btn menu-btn">menu</button>
            <nav class="nav-primary">
              <button class="close btn small"><i class="fas fa-times"></i></button>
              @include ( 'partials.menus.social-menu', [ 'position' => 'small-menu' ] )
              @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
              @endif
            </nav>
          </div>
          <div class="side-right">
            {{--@include ( 'partials.menus.social-menu', [ 'position' => 'header' ] )--}}
            <div class="search-btn"><i class="fas fa-search"></i></div>
            @include ( 'partials.buttons.three-lines' )
          </div>
        </div>
      </div>
      <div class="header-search-form">
        {{ get_search_form() }}
      </div>
      <div class="underlay"></div>
    </div>
  </div>
</header>
