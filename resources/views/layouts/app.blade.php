@php
$fullWidth = $getfields[ 'full_width' ];
@endphp

<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0&appId=467256806658626&autoLogAppEvents=1"></script>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap container{{ $fullWidth ? ' full-width' : '' }}" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
    @include( 'partials.curator-code' )
  </body>
</html>
