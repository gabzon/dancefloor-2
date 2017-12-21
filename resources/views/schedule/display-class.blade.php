@php( $room = Course::get_room($key) )

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
