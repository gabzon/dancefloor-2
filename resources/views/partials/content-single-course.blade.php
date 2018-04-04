
@php( $dancefloor_options = get_option('dancefloor_settings') )
@php( $bank_details = $dancefloor_options['bank_details'] )


<article @php(post_class())>
  <header>
    <h1 class="entry-title">{{ get_post_meta($post->ID,'course_title',true) }}</h1>
  </header>
  <div class="entry-content">

    {{--  Alert Message --}}
    @if (get_post_meta($post->ID,'course_attention_message', true))
      <div class="alert alert-success" role="alert">
        {{ get_post_meta($post->ID,'course_attention_message', true) }}
      </div>
    @endif

    {{--  Table & Content section --}}
    <div class="row">
      <div class="col-md-4">
        @include('course/table-details')
      </div>

      <div class="col-md-8">
        <?php the_content() ?>
        <br>
        @if (!get_post_meta($post->ID,'course_holidays')[0] == '' )
          <div class="ui big label">
            <i class="fa fa-calendar"></i> {{ _e('Holidays (there won\'t be courses during this dates)') }}
          </div>
          <br>
          <br>
          <ul>
            @foreach (get_post_meta($post->ID,'course_holidays') as $key)
              <li>{{ $key }}</li>
            @endforeach
          </ul>
        @endif
      </div>
    </div>

    {{--  Classroom section --}}
    <hr>
    @php( $classroom = Course::get_classroom($post->ID) )
    @include('course/section-classroom')
    <br>

    <hr>
    {{-- @include('course/form') --}}
  </div>

  <footer>
    @php( wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) )
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>

<br>

{{-- @php( $registered_students = get_users_who_favorited_post($post->ID) )

@if ($registered_students)
@foreach ($registered_students as $key => $value)

<pre>
@php
echo $value->display_name;
//print_r($value)

@endphp

</pre>
@endforeach
@endif --}}
