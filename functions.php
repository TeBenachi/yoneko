<?php
/**
 * yoneko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yoneko
 */

if ( ! defined( 'YONEKO_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'YONEKO_VERSION', '1.0.5' );
}

if ( ! function_exists( 'yoneko_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yoneko_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yoneko, use a find and replace
		 * to change 'yoneko' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yoneko', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'yoneko' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'navigation-widgets',
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'yoneko_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image'          => '',
					'default-preset'         => 'default', 
					'default-position-x'     => 'left',   
					'default-position-y'     => 'top',   
					'default-size'           => 'auto', 
					'default-repeat'         => 'no-repeat',  
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'yoneko_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yoneko_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yoneko_content_width', 640 );
}
add_action( 'after_setup_theme', 'yoneko_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yoneko_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'yoneko' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'yoneko' ),
			'before_widget' => '<section role="navigation" aria-label="[title]" id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'yoneko_widgets_init' );


/* Credit:  Stp Accessibility Theme by Joseph LoPreste */

function yoneko_accessibility_widget_func($params) {
	$name = isset($params[0]['widget_name']) ? $params[0]['widget_name'] : "";
	$params[0]['before_widget'] = str_replace('[title]', esc_attr($name), $params[0]['before_widget'] );
	return $params;
}
add_filter('dynamic_sidebar_params', 'yoneko_accessibility_widget_func');

/**
 * Customizer google fonts
 */

function yoneko_google_font_preconnect() {

	echo '<link rel="preconnect" href="'. 'https://fonts.gstatic.com/' . '" >';
 }
 add_action( 'wp_head', 'yoneko_google_font_preconnect' );

function yoneko_google_font_script(){
	
	 $body_font 		= 	esc_html(get_theme_mod('webfont'));
	 $font_choice 	= 	str_replace(" ", "+", $body_font);
	 
	 wp_enqueue_style( 
		 'yoneko-google-fonts', 
		 'https://fonts.googleapis.com/css2?family='. $font_choice . '',  
		 array(), 
		 null  
	);

}
add_action('wp_enqueue_scripts','yoneko_google_font_script');


/**
 * Enqueue scripts and styles.
 */
function yoneko_scripts() {
	
	wp_enqueue_style( 'yoneko-style', get_stylesheet_uri(), array(), YONEKO_VERSION );
	wp_style_add_data( 'yoneko-style', 'rtl', 'replace' );
	
	include( get_template_directory() . '/inc/inline-style.php' );
	wp_add_inline_style( 'yoneko-style', $inline_styles );

	wp_enqueue_script( 'yoneko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), YONEKO_VERSION, true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'yoneko_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

