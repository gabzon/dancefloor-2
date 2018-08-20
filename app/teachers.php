<?php

function display_person($indice, $id, $email, $photo, $first_name, $last_name, $title, $description){
  ?>
  <!-- Modal -->
  <div class="modal fade" id="myModal-<?= $indice ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?= esc_html( $first_name ) . ' ' . esc_html( $last_name ) ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <?= $description; ?>
          <br>
          <br>
          <?php echo get_user_meta( $id, 'accomplishments', true ); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <div class="card grow pointer mb2">
    <?php if ($photo): ?>
      <a class="" type="button" data-toggle="modal" data-target="#myModal-<?= $indice; ?>">
        <img class="card-img-top img-fluid " src="<?= wp_get_attachment_url($photo); ?>" alt="Card image cap" />
      </a>
    <?php else: ?>
      <img class="card-img-top card-img img-fluid " src="<?php echo get_avatar_url( $email, array('size'  => 512) ); ?>" alt="Card image cap"/>
    <?php endif; ?>
    <div class="card-body">
      <h4 class="card-title"><h3><?= esc_html( $first_name ); ?> <?= esc_html( $last_name ); ?></h3></h4>
      <p class="card-text text-muted"><?= esc_html($title); ?></p>
      <?php if (get_user_meta($id,'skills')): ?>
        <h5><?php _e('Skills'); ?></h5>
        <span>
          <?php $skills = get_user_meta($id,'skills'); ?>
          <?php for ($i = 0; $i < count($skills); $i++) : ?>
            <?php if ($i != 0): ?>
              |
            <?php endif; ?>
            <?= $skills[$i]; ?>
          <?php endfor; ?>
        </span>
      <?php endif; ?>
    </div>
    <div class="card-footer">
      <a class="btn-social btn-google-plus" href="mailto:<?= esc_html($email); ?>"><i class="fa fa-envelope"></i></a>
      <?php if (get_user_meta($id,'facebook',true)): ?>
        <a class="btn-social bg-primary" href="<?= get_user_meta($id,'facebook',true); ?>"><i class="fa fa-facebook"></i></a>
      <?php endif; ?>
      <?php if (get_user_meta($id,'phone',true)): ?>
        <a class="btn-social btn-google-plus" href="tel:<?= get_user_meta($id,'phone',true); ?>"><i class="fa fa-phone"></i></a>
      <?php endif; ?>
    </div>
  </div>

  <?php
}
