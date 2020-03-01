@php
$fla = $testt;
@endphp

@extends('layouts.app')


@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
  @include( 'partials.prev-next-post' )
@endsection
