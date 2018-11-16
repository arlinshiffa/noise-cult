<?php
/**
 * Hotel Pagoda Theme Customizer
 *
 * @package Hotel_Pagoda
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotel_pagoda_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'hotel_pagoda_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'hotel_pagoda_customize_partial_blogdescription',
		) );
	}

    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__( 'Theme Options','hotel-pagoda-lite' ),
            'priority' => 2,
        )
    );
    $wp_customize->add_panel(
        'woo_options',
        array(
            'title' => esc_html__( 'Woocommerce Options','hotel-pagoda-lite' ),
            'priority' => 2,
        )
    );

    /* General Section */
    $wp_customize->add_section(
        'general_option',
        array(
            'title'    => esc_html__( 'General Options','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' => 2,
        )
    );
    /* Banner section */
    $wp_customize->add_section(
        'header_options',
        array(
            'title'    => esc_html__( 'Header Options','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' => 3,
        )
    );

    /* Banner section */
    $wp_customize->add_section(
        'banner_options',
        array(
            'title'    => esc_html__( 'Banner Options','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' => 4,
        )
    );
    /* Intro Options*/
    $wp_customize->add_section(
        'introduction_options',
        array(
            'title'    => esc_html__( 'Hotel Info Page','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' =>5,
        )
    );
    $wp_customize->add_section(
        'stat_options',
        array(
            'title'    => esc_html__( 'Hotel Info Stat Options','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' => 6,
        )
    );

    /* Top Shortcode Options*/
    $wp_customize->add_section(
        'room_section',
        array(
            'title' => esc_html__('Room Section', 'hotel-pagoda-lite'),
            'panel' => 'theme_options',
            'priority' => 9,
        )
    );

    /* Call to Action Options*/

    $wp_customize->add_section(
        'cta_section',
        array(
            'title'    => esc_html__( 'Call To Action Option','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' => 11,
        )
    );

    /* Blog Options*/

    $wp_customize->add_section(
        'blog_options',
        array(
            'title'    => esc_html__( 'Blog Options','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' => 24,
        )
    );


    /* Footer Section */
    $wp_customize->add_section(
        'footer_section',
        array(
            'title'    => esc_html__( 'Footer Options','hotel-pagoda-lite' ),
            'panel' => 'theme_options',
            'priority' => 25,
        )
    );

    require get_template_directory() . '/inc/customizer/functions/theme-options.php';
    require get_template_directory() . '/inc/customizer/functions/banner-options.php';
    require get_template_directory() . '/inc/customizer/functions/cta-options.php';
    require get_template_directory() . '/inc/customizer/functions/stat-options.php';


}
add_action( 'customize_register', 'hotel_pagoda_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotel_pagoda_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotel_pagoda_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotel_pagoda_customize_preview_js() {
	wp_enqueue_script( 'hotel-pagoda-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hotel_pagoda_customize_preview_js' );
