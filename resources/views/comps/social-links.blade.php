@php
$socialName = $social[ 'name' ];
$icon       = $socialName[ 'value' ];
$label      = $socialName[ 'label' ];
$url        = $social[ 'url' ];
@endphp

<li class="social-item">
  <a href="{{ $url }}" title="{{ $label }}"><i class="fab fa-{{ $icon }}"></i></a>
</li>
