<?php
/**
 * Customizer Color Option
 * @package yoneko
 */

 // Paragraph font options
$wp_customize->add_setting( 'accentcolor', array(
    'default'   		        => '#333333',
    'transport' 			    => 'refresh',
    'sanitize_callback'         => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accentcolor', array(
    'label' 			        => esc_html__( 'Accent Color', 'yoneko'),
    'section' 			        => 'font_options',
    'priority' 			        => 2, 
   )
) );
