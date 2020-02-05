@if ( $lat and $lng )
  <div class="contact-map">
    <div id="mapid"></div>
  </div>
  <script>
    jQuery( document ).ready( function(  ) {
      var map = L.map( 'mapid' ).setView( [ {{ $lat }}, {{ $lng }} ], 16 );
      var mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

      setTimeout( function(  ) {
        map.invalidateSize( false );
      }, 400 );

      L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; ' + mapLink + ' Contributors',
          //minZoom: 11,
          //maxZoom: 11,
        }).addTo(map);

      var agIcon = L.icon({
        iconUrl: "@asset( 'images/map-marker.png' )",
        iconSize: [77,57],
        iconAnchor: [38,57]
      });

      marker = new L.marker( [ {{ $lat }}, {{ $lng }} ], {icon: agIcon} ).addTo( map );
    } );
  </script>
@endif
