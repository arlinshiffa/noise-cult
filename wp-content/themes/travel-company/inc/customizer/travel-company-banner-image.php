<?php
/**
 * Travel Company Header Settings panel at Theme Customizer
 * @package Travel_Company
 * @since 1.0.0
 */

add_action( 'customize_register', 'travel_company_banner_settings_register' );

function travel_company_banner_settings_register( $wp_customize ) {
     /**
     * Enable/Disable option for Banner
     *
     * @since 1.0.0
     */
     $wp_customize->add_setting( 'travel_company_banner_enable', array(
        'capability'            => 'edit_theme_options',
        'default'               => 1,
        'sanitize_callback'     => 'travel_company_sanitize_checkbox'
    ) );

     $wp_customize->add_control( 'travel_company_banner_enable', array(
        'label'                 =>  __( 'Enable/Disable banner options', 'travel-company' ),
        'section'               => 'header_image',
        'type'                  => 'checkbox',
        'settings'              => 'travel_company_banner_enable',
    ) );

   
     /** Banner Title Text */
     $wp_customize->add_setting(
        'travel_company_banner_title_text',
        array(
            'default'           => __( 'Simply the Best', 'travel-company' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );

     $wp_customize->add_control(
        'travel_company_banner_title_text',
        array(
            'label'    => __( 'Banner Title', 'travel-company' ),
            'section'  => 'header_image',
            'type'     => 'text',
        )
    );

     $wp_customize->selective_refresh->add_partial( 'travel_company_banner_title_text', array(
        'selector' => '.hero-area .hero-main .container .hero-inner .welcome-text h1',
        'render_callback' => 'travel_company_get_banner_title',
    ) );


     /** Banner Title Text */
     $wp_customize->add_setting(
        'travel_company_banner_description_text',
        array(
            'default'           => __( '# 1 Most loved by everyone', 'travel-company' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );

     $wp_customize->add_control(
        'travel_company_banner_description_text',
        array(
            'label'    => __( 'Banner Descrition', 'travel-company' ),
            'section'  => 'header_image',
            'type'     => 'text',
        )
    );

     $wp_customize->selective_refresh->add_partial( 'travel_company_banner_description_text', array(
        'selector' => '.hero-area .hero-main .container .hero-inner .welcome-text p',
        'render_callback' => 'travel_company_get_banner_description',
    ) );

 }