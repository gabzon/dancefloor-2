
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
<br>
<hr>
<br>
<div class="price-explain">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-5 col-lg-5">
      <h3 class="tc">Cours 1h00</h3>
      <table class="table tc">
        <thead>
          <tr>
            <th scope="col">Cours</th>
            <th scope="col">Prix unité</th>
            <th scope="col">Cours restant</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tr>
          <td>1</td>
          <td>CHF 17,5</td>
          <td>8</td>
          <td>CHF 140</td>
        </tr>
        <tr>
          <td>2</td>
          <td>CHF 18,5</td>
          <td>7</td>
          <td>CHF 130</td>
        </tr>
        <tr>
          <td>3</td>
          <td>CHF 20</td>
          <td>6</td>
          <td>CHF 120</td>
        </tr>
        <tr>
          <td>4</td>
          <td>CHF 21</td>
          <td>5</td>
          <td>CHF 105</td>
        </tr>
        <tr>
          <td>5</td>
          <td>CHF 22</td>
          <td>4</td>
          <td>CHF 90</td>
        </tr>
        <tr>
          <td>6</td>
          <td>CHF 23</td>
          <td>3</td>
          <td>CHF 70</td>
        </tr>
        <tr>
          <td>7</td>
          <td>CHF 23</td>
          <td>2</td>
          <td>CHF 45</td>
        </tr>
        <tr>
          <td>8</td>
          <td>CHF 25</td>
          <td>1</td>
          <td>CHF 25</td>
        </tr>
      </table>
    </div>
    <div class="col-12 col-sm-12 col-md-5 col-lg-5">
      <h3 class="tc">Cours 1h30</h3>
      <table class="table tc">
        <thead>
          <tr>
            <th scope="col"># Cours</th>
            <th scope="col">Prix unité</th>
            <th scope="col">Cours restant</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tr>
          <td>1</td>
          <td>CHF 25</td>
          <td>8</td>
          <td>CHF 200</td>
        </tr>
        <tr>
          <td>2</td>
          <td>CHF 26</td>
          <td>7</td>
          <td>CHF 180</td>
        </tr>
        <tr>
          <td>3</td>
          <td>CHF 27</td>
          <td>6</td>
          <td>CHF 160</td>
        </tr>
        <tr>
          <td>4</td>
          <td>CHF 28</td>
          <td>5</td>
          <td>CHF 140</td>
        </tr>
        <tr>
          <td>5</td>
          <td>CHF 29</td>
          <td>4</td>
          <td>CHF 115</td>
        </tr>
        <tr>
          <td>6</td>
          <td>CHF 31</td>
          <td>3</td>
          <td>CHF 95</td>
        </tr>
        <tr>
          <td>7</td>
          <td>CHF 32</td>
          <td>2</td>
          <td>CHF 65</td>
        </tr>
        <tr>
          <td>8</td>
          <td>CHF 35</td>
          <td>1</td>
          <td>CHF 35</td>
        </tr>
      </table>
    </div>
  </div>
</div>
