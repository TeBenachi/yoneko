<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yoneko
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	
	<?php if ( is_singular() ) { ?>
		<header class="entry-header between-space">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
	<?php } else { ?>
		<header class="entry-header entry-title-listings">
			<div class="flex flex-col-reverse md:flex-row justify-between entry-title-list">
				<div>
					<h2>
						<?php if ( is_sticky() ) { ?>
							<?php yoneko_sticky_posts(); ?>
						<?php }; ?>
						<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
				</div>
				<div class="entry-title-list-date text-left md:text-right">
					<?php yoneko_posted_on(); ?>
				</div>
			</div>
	<?php } ?>
	
		<?php if ( 'post' === get_post_type() ) : ?>
		<?php endif; ?>
		
		<?php if ( is_singular() ) { ?>
			<div class="entry-meta-author">
				<?php yoneko_posted_on(); ?> <?php yoneko_posted_by(); ?> <?php yoneko_entry_footer(); ?> 
			</div>
		<?php }; ?>
	</header><!-- .entry-header -->
	
	<?php if ( is_singular() ) { ?>
		<div class="entry-content between-spacex2">
			
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="between-space">
					<?php yoneko_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
			
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'yoneko' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yoneko' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<div class="entry-footer my-8 clear-both">	
			<div class="flex flex-wrap justify-between">
				<div class="flex-1">
					<?php yoneko_entry_tags(); ?>
				</div>
				<div class="flex-none">		
					<?php yoneko_entry_footer_comments(); ?>
				</div>
			</div>	
		</div>
	<?php } ?>
	
</article><!-- #post-<?php the_ID(); ?> -->