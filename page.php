<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) :
	if ( is_active_sidebar( 'herocanvas' ) ):
		echo '<section class="herocanvas">';
		dynamic_sidebar( 'herocanvas' );
		echo '</section><!-- .herocanvas -->';
	endif;
endif;

?>

<div class="wrapper" id="page-wrapper">
	<?php 
	if ( ! is_front_page() ) : ?>
	
		<header class="entry-header" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?> );">
			<div class="container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</header><!-- .entry-header -->
	<?php endif;?>
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

	<main class="site-main" id="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content', 'page' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->

	</div><!-- #content -->
	<!-- Do the left sidebar check -->
	<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
	<!-- Do the right sidebar check -->
	<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>			
</div><!-- #page-wrapper -->

<?php get_footer(); ?>
