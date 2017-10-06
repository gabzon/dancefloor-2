{{--
Template Name: Videos Template
--}}


<style media="screen">
* { box-sizing: border-box; }

/* ---- isotope ---- */

/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .element-item ---- */

.element-item {
  position: relative;
  float: left;
  width: 350px;
  padding: 10px 10px 10px 0;
  margin-bottom: 10px;
  color: #262524;
}

.element-item > * {
  margin: 0;
  padding: 0;
}

a.btn-social, .btn-social { padding-top: 12px; }
</style>

@extends('layouts.app')
@php
// WP_Query arguments
$args = [
  'post_type' => ['df_video'],
];

// The Query
$query = new WP_Query( $args );
@endphp

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    {{-- The Loop --}}
    <div id="filters">
      <button class="btn btn-outline-dark mv1" data-filter="*">show all</button>
      @php
      $terms = get_terms();
      @endphp
      @foreach ($terms as $t)
        <button class="btn btn-outline-dark mv1" data-filter=".{{$t->slug}}">{{$t->name}}</button>
      @endforeach
    </div>
    <br>
    @if ($query->have_posts())
      <div class="grid">
        @while( $query->have_posts() )
          @php( $query->the_post() )
          @php
          $categories = get_the_category();
          $category_string = '';
          @endphp
          @foreach ($categories as $c)
            @php( $category_string = $category_string . ' ' . $c->slug )
          @endforeach
          <div class="element-item transition metal {{$category_string}}" data-category="transition">
            <div class="card">
              @php( the_content() )
              <div class="card-body" style="margin-top:-1.2rem;">
                <h4 class="card-title">@php( the_title() )</h4>
                <p class="card-text">
                  @foreach ($categories as $c)
                    <span class="badge badge-danger">{{$c->name}}</span>
                  @endforeach
                </p>
              </div>
            </div>
          </div>
        @endwhile
      </div>
    @endif

    {{-- Restore original Post Data --}}
    @php( wp_reset_postdata() )

    @include('partials.content-page')
    <br>
    <br>
  @endwhile
@endsection
