<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yoneko
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php $accent_color  = 	esc_html(get_theme_mod('accentcolor')); ?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<a class="skip-link screen-reader-text" href="#primary" aria-label="<?php esc_attr_e('Skip to content','yoneko'); ?>"><?php esc_html_e( 'Skip to content', 'yoneko' ); ?></a>

<div class="flex flex-col md:flex-row justify-between">
	<div class="container inner-left">
		<header id="masthead" class="site-header">
		
			
	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		
		<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle" type="button" aria-label="<?php _e( 'Open primary menu', 'yoneko' ); ?>">
			<span class="toggle-inner">
				<span class="toggle-icon">
					<svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16" /></svg>
				</span>
			</span>
		</button>
		
		
		<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">
			<div class="menu-modal-inner modal-inner">
				<div class="menu-wrapper section-inner">
								
					<div class="close-button-wrapper">
						<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal" aria-label="<?php _e( 'Close primary menu', 'yoneko' ); ?>">
							<svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path d="M6 18L18 6M6 6l12 12" /></svg>
						</button>
					</div>
					
					<nav class="expanded-menu<?php echo esc_attr( $expanded_nav_classes ); ?>" aria-label="<?php echo esc_attr_x( 'Expanded', 'menu', 'yoneko' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">
						
							<?php
							wp_nav_menu(
								array(
									'container' 		=> 	'',
									'items_wrap'     	=> 	'%3$s',
									'show_toggles'   	=> 	true,
									'theme_location' 	=> 	'menu-1',
								)
							);
							?>
						</ul>

				</div>
			</div>
		</div>
	<?php endif; ?>
			
		
			<div class="site-logo">
				<div class="site-branding">
					<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
							<?php
						endif;
						$yoneko_description = get_bloginfo( 'description', 'display' );
						if ( $yoneko_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $yoneko_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- site-branding -->
				<div class="sidebar-wrapper">
					<?php get_sidebar(); ?>
				</div>
			</div>
	</header>	
 </div><!-- container.inner-left -->