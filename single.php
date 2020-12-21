<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yoneko
 */

get_header();
?>
	<div class="container inner-right">
		<main id="primary" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation(
						array(
							'prev_text' => '<div class="post_nav_prev text-left md:text-left"><span class="nav-subtitle font-medium">' . esc_html__( 'Previous', 'yoneko' ) . '</span><br><span class="nav-title font-normal">%title</span></div>',
							
							'next_text' => '<div class="post_nav_next text-right md:text-right"><span class="nav-subtitle font-medium">' . esc_html__( 'Next', 'yoneko' ) . '</span><br><span class="nav-title font-normal">%title</span></div>',
						)
					);

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				
		</main><!-- #main -->
	</div>
</div><!-- flex wrapper -->

<?php get_footer(); ?>