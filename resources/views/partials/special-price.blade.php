
@php($dancefloor_options = get_option('dancefloor_settings'))

<div class="card-deck">
  @for ($i=0; $i < count($dancefloor_options['df_price_title']); $i++)
    @if ( $dancefloor_options['df_price_is_reduced'][$i] == 'reduced')
      <div class="card text-center mb2">
        <div class="card-header">
          <strong>
            @php
              echo $dancefloor_options['df_price_title'][$i]
            @endphp
          </strong>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $dancefloor_options['df_price_nb_hours'][$i] }}</li>
            <li class="list-group-item">{{ $dancefloor_options['df_price_nb_sessions'][$i] }} leçons</li>
            <li class="list-group-item">{{ $dancefloor_options['df_price_description'][$i] }}</li>
          </ul>
        </div>
        <div class="card-footer">
          @if ($dancefloor_options['df_price_discount'][$i])
            <span class="text-muted"><strike>{{$dancefloor_options['df_currency']}} {{ $dancefloor_options['df_price_normal'][$i] }}</strike></span>
            <strong>{{ $dancefloor_options['df_currency'] }} {{ $dancefloor_options['df_price_discount'][$i] }}</strong>
          @else
              <strong>{{$dancefloor_options['df_currency'] }} {{ $dancefloor_options['df_price_normal'][$i] }}</strong>
          @endif
        </div>
      </div>
    @endif
  @endfor
</div>
