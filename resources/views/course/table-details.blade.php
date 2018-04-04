<table class="table f6">
  <tr>
    <td width="43%"><strong>Niveau <i lang="en" class="text-muted">(Level)</i> :</strong></td>
    <td width="57%">
      @php($levels = Course::get_levels($post->ID))
      @for ($i=0; $i < count($levels); $i++)
        @if ($i == count($levels)-1)
          {{ $levels[$i]->name }}
        @else
          {{ $levels[$i]->name . ', ' }}
        @endif
      @endfor
    </td>
  </tr>
  <tr>
    <td><strong>Jour <i class="text-muted" lang="en">(Day)</i> : </strong></td>
    <td>
      @php($days = Course::get_days($post->ID))
      @php($dow = Course::days_of_week())
      @foreach ($days as $d)
        <span class="ttc">{{ __($dow[$d],'sage') }}</span><br>
      @endforeach
    </td>
  </tr>
  <tr>
    <td><strong>Heure <i class="text-muted" lang="en">(Time)</i> :</strong></td>
    <td>{{ get_post_meta($post->ID,'course_start_time', true) . ' - ' . get_post_meta($post->ID,'course_end_time', true) }}</td>
  </tr>
  <tr>
    <td><strong>Période <i class="text-muted" lang="en">(Period)</i> :</strong></td>
    @if ( get_post_meta($post->ID,'course_start_date', true) == get_post_meta($post->ID,'course_end_date', true) )
      <td>{{ get_post_meta($post->ID,'course_start_date', true) }}</td>
    @else
      <td>{{ get_post_meta($post->ID,'course_start_date', true) . ' - ' . get_post_meta($post->ID,'course_end_date', true) }}</td>
    @endif
  </tr>
  @if (get_post_meta($post->ID,'course_required_level',true))
    <tr>
      <td><strong>Niveau requis <i class="text-muted" lang="en">(Required level)</i> :</strong></td>
      <td>{{ get_post_meta($post->ID,'course_required_level',true) }}</td>
    </tr>
  @endif
  <tr>
    <td><strong>Prof <i class="text-muted" lang="en">(Teacher)</i> :</strong></td>
    <td>
      <?php if (get_post_meta($post->ID,'course_teacher', true)): ?>
        <?= get_post_meta($post->ID,'course_teacher', true); ?>
      <?php else: ?>
        <?php _e('Not available','sage'); ?>
      <?php endif; ?>
    </td>
  </tr>
  @php($price = App::prices($post->ID))
  <tr>
    <td><strong>Prix <i class="text-muted">(Price)</i> :</strong></td>
    @if (!$price['multi_price'])
      <td>{{ $price['currency'] . ' ' . $price['regular_price'] }} / {{ $price['currency'] . ' ' . $price['reduced_price'] }}</td>
    @else
      <td>{{ __('Dès','sage') . ' ' .  $price['currency'] . ' ' . $price['regular_price'] }}</td>
    @endif
  </tr>
  <tr>
    <td colspan="2" style="padding:0.75rem 0;">
      <a class="f5 no-underline dark-red bg-animate hover-bg-dark-red hover-white inline-flex items-center pa3 ba border-box w-100" href="#inscription">
        <i class="far fa-edit"></i>&nbsp; Inscription &nbsp;<i lang="en"> (Registration)</i>
      </a>
      {{-- <div class="mv2"></div>
      @php
      the_favorites_button($post->ID);
    @endphp --}}
  </td>
</tr>
</table>
