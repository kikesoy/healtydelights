<?php
  $homeContentTitle = block_field( 'home-content-title', false );
  $homeContentImage = block_field( 'home-content-image', false );
  $homeContentImageUrl = wp_get_attachment_image_src( $homeContentImage, 'medium' );
  $homeContentDescription = block_field( 'home-content-description', false );
  $homeContentBtnText = block_field( 'home-content-button-text', false );
  $homeContentBtnUrl = block_field( 'home-content-button-url', false );
?>

<article class="home-content" >
  <header class="home-content-header">
    <h3 class="home-content-header-title">
      <?php echo $homeContentTitle ?>
    </h3>
    <h5 class="home-content-header-description">
      <?php echo $homeContentDescription ?>
    </h5>
  </header>
  <section class="home-content-image">
    <?php echo '<img src="' . esc_url( $homeContentImageUrl[0] ) . '">'; ?>
  </section>
  <footer class="home-content-footer">
    <a href="<?php echo $homeContentBtnUrl ?>" class="btn btn-secondary">
      <?php echo $homeContentBtnText ?>
    </a>
  </footer>
</article>