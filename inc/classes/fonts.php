<?php
/**
 * Customizer Font Option
 * @package yoneko
 */


$wp_customize->add_section( 'font_options', array(
    'title'                     => esc_html__( 'Theme Options', 'yoneko' ),
    'panel'                     => '',
    'priority'                  => 30,
    'capability'                => 'edit_theme_options',
));


// Paragraph font options
$wp_customize->add_setting( 'webfont', array(
    'default'   		        => 'Hiragino Sans',
    'transport' 			    => 'refresh',
    'sanitize_callback' 		=> 'sanitize_text_field'
) );

$wp_customize->add_control( 'webfont', array(
    'label' 			        => esc_html__( 'Font', 'yoneko'),
    'section' 			        => 'font_options',
    'priority' 			        => 1, 
    'type' 				        => 'select',
    'capability' 		        => 'edit_theme_options', 
    'choices' 			        => array( 
        'Hiragino Sans' 	    => esc_html__( 'Hiragino Sans', 'yoneko' ),
        'Noto Sans JP' 	        => esc_html__( 'Noto Sans JP', 'yoneko' ),
        'Noto Serif JP' 	    => esc_html__( 'Noto Serif JP', 'yoneko' ),
        'M PLUS Rounded 1c' 	=> esc_html__( 'M PLUS Rounded 1c', 'yoneko' ),
        'Kosugi Maru'           => esc_html__( 'Kosugi Maru', 'yoneko' ),
        'Sawarabi Mincho'       => esc_html__( 'Sawarabi Mincho', 'yoneko' ),
        'Sawarabi Gothic'       => esc_html__( 'Sawarabi Gothic', 'yoneko' ),
        'Lato' 	                => esc_html__( 'Lato', 'yoneko' ),
        'Roboto'                => esc_html__( 'Roboto', 'yoneko' ),
        'Merriweather'          => esc_html__( 'Merriweather', 'yoneko' ),
    ))
);