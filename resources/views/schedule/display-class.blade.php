@php( $classroom = Course::get_classroom($key) )

<a href="<?= esc_url(get_permalink($key)); ?>" class="course black hover-dark-gray">
  <div class="course-link pl2 grow hover-bg-near-white" style="border-left: 5px solid {{ get_term_meta($classroom[0]->term_id, 'classroom_color', true) }};">
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
    <span class="course-teacher"><?= __('Teacher','sage'); ?> <i lang="en" class="text-muted">(Teacher)</i> : {{ get_post_meta($key,'course_teacher',true) }}</span>
    <br>
    {{-- @if ($room)
      <span class="course-time">Lieu <i lang="en" class="text-muted">(Place)</i> : {{ get_the_title($room) }}</span>
    @endif --}}
    @if (count($classroom) > 0)
      <span class="course-time">Lieu <i lang="en" class="text-muted">(Place)</i> : {{ $classroom[0]->name }}</span>
    @endif
  </div>
</a>
<br>
