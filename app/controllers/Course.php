<?php

namespace App;

use Sober\Controller\Controller;

class Course extends Controller
{
  public static function display_enrolled_members()
  {
    if ( is_user_logged_in() )
    {
      $output = '';

      $output += '<section class="enrolled-members">';
      $output += '<h3>{{ _e('Enrolled members', 'sage') }}' . '</h3>'


        <? $enrolls = get_post_meta($post->ID,'enroll_group'); ?>
        <table class="table table-hover">
          @for ($i = 0; $i < count($enrolls[0]) ; $i++)
            <tr>
              <td>
                <?php $user_info = get_userdata($enrolls[0][$i]['members']); ?>
                <?= $user_info->first_name . ' ' . $user_info->last_name;?><br>
              </td>
              <td>
                @if ($enrolls[0][$i]['member_cours_payment'] == 'paid')
                  <div class="ui green big label">
                    {{ $enrolls[0][$i]['member_cours_payment'] }}
                  </div>
                @else
                  <div class="ui red big label">
                    {{ _e('Not paid', 'sage') }}
                  </div>
                @endif
              </td>
            </tr>
          @endfor
        </table>
      </section>
    }
  }

  @if (is_user_logged_in())
    <section class="cours-videos">
      <div class="ui divider"></div>
      <h3>{{ _e('Videos', 'sage') }}</h3>
      @php($videos = get_post_meta($post->ID,'course_videos'))
      <div class="row">
        @foreach ($videos as $v)
          <div class="col">
            @php( $youtube_link = 'http://www.youtube.com/embed/' . $v . '?rel=0&modestbranding=1' )
            <iframe width="100%" height="210" src="{{ $youtube_link}}" frameborder="0" allowfullscreen></iframe>
          </div>
        @endforeach
      </div>
    </section>
  @endif
}
