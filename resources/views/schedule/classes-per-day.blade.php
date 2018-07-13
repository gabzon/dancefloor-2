@php( $days = Course::days_of_week())
<div class="row">
  @foreach ($days as $d)
    @php( $class = Course::class($d) )
    @if ( $class->have_posts() )
      <div class="col">
        <h4 class="f4 pb1 ttc"><?= __($d, 'sage'); ?></h4>
          @while ( $class->have_posts() )
            @php( $class->the_post() )
            @php ( $key = get_the_ID() )
            @include('schedule.display-class')
          @endwhile
      </div>
    @endif
  @endforeach
</div>
