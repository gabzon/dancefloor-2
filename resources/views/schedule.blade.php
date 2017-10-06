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

<?php function display_course($key) { ?>
  @php
  $classrooms = get_posts([
      'post_type' => 'classroom',
      'posts_per_page' => -1,
      'post_belongs' => $key,
      'post_status' => 'publish',
      'suppress_filters' => false // This must be set to false
  ]);
  $room = [];
  foreach ($classrooms as $salle) { $room =  $salle->ID; }
  @endphp

  <a href="<?= esc_url(get_permalink($key)); ?>" class="course black hover-dark-gray">
      <div class="course-link pl2 grow hover-bg-near-white" style="border-left: 5px solid {{ get_post_meta($room,'classroom_color',true) }};">
          <span class="course-time"><?= get_post_meta($key,'course_start_time',true); ?> - <?= get_post_meta($key,'course_end_time',true); ?></span><br>
          <span class="primary-color"><?= get_post_meta($key, 'course_title',true); ?></span><br>
          @if (get_post_meta($key,'course_level',true))
              <span class="secondary-color">
                  {{ _e(get_post_meta($key,'course_level',true),'sage') }}
                  @if (get_post_meta($key,'course_level_number',true))
                      ({{_e('Level','sage')}} {{get_post_meta($key,'course_level_number',true)}})
                  @endif
              </span><br>
          @endif
          <span class="course-teacher">Prof <i lang="en" class="text-muted">(Teacher)</i> : {{ get_post_meta($key,'course_teacher',true) }}</span>
          <br>
          @if ($room)
              <span class="course-time">Lieu <i lang="en" class="text-muted">(Place)</i> : {{ get_the_title($room) }}</span>
          @endif
      </div>
  </a>
  <br>
  <?php
}
?>

@section('content')
    @while(have_posts()) @php(the_post())
      <div class="page-header">
          <div class="row">
              <div class="col"><h1>{{ get_the_title() }}</h1></div>
              <div class="col text-right">
                  @if ($schedule)
                      <a href="{{ esc_url( $schedule ) }}" class="f6 link grow no-underline ph3 pv2 mt3 dib bg-dark-red white hover-white" target="_blank">
                          <i class="fa fa-download" aria-hidden="true"></i> Planning <i lang="en">(Schedule)</i>
                      </a>
                  @endif
                  &nbsp;
                  @if ($bank_details)
                      <a href="<?= esc_url($bank_details) ?>" class="f6 link grow no-underline ph3 pv2 mb2 dib bg-dark-red white hover-white" target="_blank">
                          <i class="fa fa-credit-card" aria-hidden="true"></i> Coordonnées bancaires <i lang="en">(Bank details)</i>
                      </a>
                  @endif
              </div>
          </div>
      </div>

      <br>
      <div class="row">
          @php( $mon = Course::get_courses_by_day('mon') )
          @if ( count($mon) > 0 )
              <div class="col">
                  <h4 class="f4">Lundi <span class="text-muted"><i>(Monday)</i></span></h4>
                  @foreach ($mon as $key)
                      {{ display_course($key) }}
                  @endforeach
              </div>
          @endif

          @php( $tue = Course::get_courses_by_day('tue') )
          <?php if (count($tue) > 0 ): ?>
              <div class="col">
                  <h4 class="f4">Mardi <i class="text-muted" lang="en">(Tuesday)</i></h4>
                  <?php foreach ($tue as $key): ?>
                      <?php display_course($key); ?>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>

          @php( $wed = Course::get_courses_by_day('wed') )
          @if ( count($wed) > 0 )
              <div class="col">
                  <h4 class="f4">Mercredi <i class="text-muted" lang="en">(Wednesday)</i></h4>
                  @foreach ($wed as $key)
                      @php( display_course($key) )
                  @endforeach
              </div>
          @endif

          @php( $thu = Course::get_courses_by_day('thu') )
          @if ( count($thu) > 0 )
              <div class="col">
                  <h4 class="f4">@php( _e('Thursday','sage') )</h4>
                  @foreach ($thu as $key)
                      @php( display_course($key) )
                  @endforeach
              </div>
          @endif

          @php( $fri = Course::get_courses_by_day('fri') )
          @if( count($fri) > 0 )
              <div class="col">
                  <h4 class="f4">@php( _e('Friday','sage') )</h4>
                  @foreach ($fri as $key)
                      @php( display_course($key) )
                  @endforeach
              </div>
          @endif

          @php($sat = Course::get_courses_by_day('sat'))
          @if( count($sat) > 0 )
              <div class="col">
                  <h4 class="f4">@php( _e('Saturday','sage') )</h4>
                  @foreach ($sat as $key)
                      @php( display_course($key) )
                  @endforeach
              </div>
          @endif

          @php( $sun = Course::get_courses_by_day('sun') )
          @if( count($sun) > 0 )
              <div class="col">
                  <h4 class="f4">@php( _e('Sunday','sage') )</h4>
                  @foreach ($sun as $key)
                      @php( display_course($key) )
                  @endforeach
              </div>
          @endif
      </div>
    @endwhile

    <br>
    @include('partials.content-page')
@endsection



<div class="formulaire-proposition">
    <?php //$page = get_page_by_title( 'Proposition' , OBJECT, 'page'); ?>
    <?php //echo $page->post_content; ?>
</div>
