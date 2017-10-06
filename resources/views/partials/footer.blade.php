<br>
<footer class="content-info bg-black text-white">
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 centering">
                <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/dancefloor-logo-white.svg" alt="Dancefloor logo" class="img-fluid" min-width="150" max-width="150" width="200"/></a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 social-links text-center">
              <br>
                <a class="btn-social btn-facebook" target="_blank" href="https://www.facebook.com/DancefloorGeneva/">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a class="btn-social btn-google-plus" target="_blank" href="https://plus.google.com/+DancefloorgenevasalsaCh/videos">
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                </a>
                <a class="btn-social btn-twitter" target="_blank" href="https://twitter.com/DancefloorGe">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a class="btn-social btn-youtube" target="_blank" href="https://www.youtube.com/channel/UCPHPIzyomTiHI9uRuRfbsLQ">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 centering contact">
                <h6 style="padding-top:10px"><a href="mailto:infos@dancefloorgenevasalsa.ch" target="_blank" class="email white link hover-gray"><i class="fa fa-envelope" aria-hidden="true"></i> infos@dancefloorgenevasalsa.ch</a></h6>
                <h6><a href="tel:+41786575056" class="phone white link hover-gray"><i class="fa fa-phone" aria-hidden="true"></i>  +41 78 657 50 56</a></h6>
                <div class="fb-like" data-href="https://www.facebook.com/DancefloorGeneva/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
            </div>
        </div>
        <br>
            @php(dynamic_sidebar('sidebar-footer'))
        <br>
    </div>
</footer>
