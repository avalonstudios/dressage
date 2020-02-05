@php
$displayPageTitle = $getfields[ 'display_page_title' ];
if ( !$displayPageTitle ) {
  return;
}
@endphp

<div class="page-header">
  <h1>{!! App::title() !!}</h1>
</div>
