<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package yoneko
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function yoneko_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'yoneko_body_classes' );

if ( ! function_exists( 'yoneko_post_title' ) ) {
	/**
	 * Add a title to posts and pages that are missing titles.
	 *
	 * @since 1.0.5
	 *
	 * @param string $title The title.
	 *
	 * @return string
	 */
	function yoneko_post_title( $title ) {
		return '' === $title ? esc_html_x( 'Untitled', 'Added to posts and pages that are missing titles', 'yoneko' ) : $title;
	}
}
add_filter( 'the_title', 'yoneko_post_title' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function yoneko_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'yoneko_pingback_header' );
