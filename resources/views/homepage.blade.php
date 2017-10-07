{{--
Template Name: Home page
--}}
@extends('layouts.app')

@php
// WP_Query arguments
$args = [
  'post_type'             => array( 'post' ),
  'order'                 => 'DESC',
  'posts_per_page'        => 6,
  'category_name'         => 'wall'
];
// The Query
$query = new WP_Query( $args );
@endphp


@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-page')
    <br>
    <br>
    <h1 class="landing-title"><span style="color:#BF2E36">DANCE</span>FLOOR</h1>
    <!-- <hr style="margin:0"> -->
    <h2 style="background:black;color:white;text-align:center; text-transform:uppercase; margin:0; letter-spacing:0.1px; font-size:25px">école & Compagnie de danse à Genève</h2>
    <br>
    <br>
    <br>
    <div class="row" id="landing-grid">
      @if ($query->have_posts())
        @while ($query->have_posts()) @php(($query->the_post()))
          <div class="col-md-4 mb3 tc">
            @php( $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ) )
            {{-- @php( $img_type = get_image_type($image) ) --}}
            <a href="{{ the_permalink() }}">
              <img src="{{ $image[0] }}" class="img-fluid grow"/>
              <div class="title" style="text-transform:uppercase;" >
                <span class="pv1 ph2 bg-black">@php(the_title())</span>
              </div>
            </a>
        </div>
      @endwhile
    @else
      @php( _e('There are no post','sage') )
    @endif
    @php( wp_reset_postdata() )
  </div>
@endwhile
<br>
<br>
@endsection
