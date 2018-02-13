{{-- https://gist.github.com/smutek/cd95c8bc4f1db70ee1eda2740bfbf6fd --}}
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-black">
  <div class="container">
    <a class="brand navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/dancefloor-logo-white.svg" alt="Dancefloor logo" class="img-fluid" width="150"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation','menu_class' => 'nav navbar-nav bg-black']) !!}
      @endif
    </div>
  </div>
</nav>
