<article @php(post_class())>
  @if ( has_post_format( 'video' ) )

    <div class="card">
      @php( the_content() )
      <div class="card-body">
        <h4 class="card-title">
          <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
        </h4>
      </div>
    </div>

  @else

    <a href="<?php the_permalink(); ?>">
      <div class="card">
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="" class="card-img-top" />
        <div class="card-body">
          <h4 class="card-title">
            <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
          </h4>
          <p class="card-text">
            @php( the_excerpt() )
          </p>
        </div>
      </div>
    </a>

  @endif
</article>
<br>
