{{--
Template Name: Schedule
--}}
<style media="screen">
a.btn-social, .btn-social { padding-top: 12px; }
</style>

@extends('layouts.app')

@php
$dancefloor_options = get_option('dancefloor_settings');
$bank_details = $dancefloor_options['bank_details'];
$schedule = $dancefloor_options['schedule'];
@endphp

@section('content')
  @while(have_posts()) @php(the_post())
    @include('schedule.info-header')
    <br>
    @include('schedule.classes-per-day')
  @endwhile
  <br>
  {{-- @include('partials.content-page') --}}

@endsection

<div class="formulaire-proposition">
  <?php //$page = get_page_by_title( 'Proposition' , OBJECT, 'page'); ?>
  <?php //echo $page->post_content; ?>
</div>
