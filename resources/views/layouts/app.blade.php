<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
  @php(do_action('get_header'))
  @include('partials.header')
  <div class="wrap container" role="document">
    <div class="content">
      @if (App\display_sidebar())
        <div class="row">
          <div class="col-12 col-sm-4 col-md-3 col-lg-3">
            <aside class="sidebar">
              @include('partials.sidebar')
            </aside>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-lg-9">
            <main class="main">
              @yield('content')
            </main>
          </div>
        </div>
      @else
        <main class="main">
          @yield('content')
        </main>
      @endif


    </div>
  </div>
  @php(do_action('get_footer'))
  @include('partials.footer')
  @php(wp_footer())
</body>
</html>
