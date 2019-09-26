<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
<svg class="svg-footer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2000 50" preserveAspectRatio="none"><polygon class="svg-footer-level-2" points="2000 0 2000 50 668 50 2000 0"/><polygon class="svg-footer-level-1" points="0 0 2000 50 0 50 0 0"/></svg>
<div class="wrapper" id="wrapper-footer">

	<footer id="colophon" class="site-footer <?php echo esc_attr( $container ); ?>">

		<div id="footer-primary" class="row">

			<div class="col-md-9">
				<?php if ( is_active_sidebar( 'footernav' ) ) : 
					dynamic_sidebar( 'footernav' ); 
				endif;?>

			</div><!--col end -->
			<div class="col-md-3">
				<?php if ( is_active_sidebar( 'footerbrand' ) ) : 
					dynamic_sidebar( 'footerbrand' ); 
				endif;?>
			</div>

		</div><!-- row-primary end -->
		<hr>
		<div id="footer-secondary" class="row">

		<?php if ( is_active_sidebar( 'footeraux' ) ) : 
			dynamic_sidebar( 'footeraux' ); 
		endif;?>

		</div><!-- row end -->

</footer><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->



<?php wp_footer(); ?>
<?php

if ( is_front_page() ) :?>
	<script type="text/javascript">
		var windowHeight = $(window).height();
		var navHeight = $('#wrapper-navbar').height();
		var heroHeight = windowHeight - navHeight;
		$(document).ready(function(){
			$('.herocanvas').css("height",heroHeight);
		});
		

	</script>
<?php endif;?>
</body>

</html>

