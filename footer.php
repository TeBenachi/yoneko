<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yoneko
 */

?>

<footer id="colophon" class="site-footer mb-4">
		
	<div role="contentinfo" class="flex container w-full text-center p-6 items-center">
		<div class="site-info text-sm text-center md:text-left">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'yoneko' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'yoneko' ), 'WordPress' );
			?>
		</a>
		<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s', 'yoneko' ), 'Yoneko', 'TeBenachi' );
			?>
		</div>
	</div>
	
</footer>

<?php wp_footer(); ?>

</body>
</html>
