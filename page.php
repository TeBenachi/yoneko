<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yoneko
 */

get_header();
?>
	<div class="inner-right">
		<main id="primary" class="container site-main">

			<div class="site-main-left">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
			
			<div class="site-main-right">
				<?php get_sidebar(); ?>
			</div>

		</main><!-- #main -->
	</div><!-- inner-right -->
</div><!-- flex wrapper -->

<?php get_footer(); ?>

