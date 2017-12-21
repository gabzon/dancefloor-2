<div class="row">
    @php( $monday = Course::get_courses_by_day('mon') )
    @if ( count($monday) > 0 )
        <div class="col">
            <h3 class="f3 pb1">Lundi <span class="text-muted"><i>(Monday)</i></span></h3>
            @foreach ($monday as $key)
                @include('schedule.display-class')
            @endforeach
        </div>
    @endif

    @php( $tuesday = Course::get_courses_by_day('tue') )
    @if (count($tuesday) > 0)
      <div class="col">
          <h3 class="f3 pb1">Mardi <i class="text-muted" lang="en">(Tuesday)</i></h3>
          @foreach ($tuesday as $key)
            @include('schedule.display-class')
          @endforeach
      </div>
    @endif


    @php( $wed = Course::get_courses_by_day('wed') )
    @if ( count($wed) > 0 )
        <div class="col">
            <h3 class="f3 pb1">Mercredi <i class="text-muted" lang="en">(Wednesday)</i></h3>
            @foreach ($wed as $key)
                @include('schedule.display-class')
            @endforeach
        </div>
    @endif

    @php( $thu = Course::get_courses_by_day('thu') )
    @if ( count($thu) > 0 )
        <div class="col">
            <h3 class="f3 pb1">@php( _e('Thursday','sage') )</h3>
            @foreach ($thu as $key)
                @include('schedule.display-class')
            @endforeach
        </div>
    @endif

    @php( $fri = Course::get_courses_by_day('fri') )
    @if( count($fri) > 0 )
        <div class="col">
            <h3 class="f3 pb1">@php( _e('Friday','sage') )</h3>
            @foreach ($fri as $key)
                @include('schedule.display-class')
            @endforeach
        </div>
    @endif

    @php($sat = Course::get_courses_by_day('sat'))
    @if( count($sat) > 0 )
        <div class="col">
            <h3 class="f3 pb1">@php( _e('Saturday','sage') )</h3>
            @foreach ($sat as $key)
                @include('schedule.display-class')
            @endforeach
        </div>
    @endif

    @php( $sun = Course::get_courses_by_day('sun') )
    @if( count($sun) > 0 )
        <div class="col">
            <h3 class="f3 pb1">@php( _e('Sunday','sage') )</h3>
            @foreach ($sun as $key)
                @include('schedule.display-class')
            @endforeach
        </div>
    @endif
</div>
