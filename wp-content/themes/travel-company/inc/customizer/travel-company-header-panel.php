<?php
/**
 * Travel Company Header Settings panel at Theme Customizer
 *
 * @package Travel_Company
 * @since 1.0.0
 */

add_action( 'customize_register', 'travel_company_header_settings_register' );

function travel_company_header_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';

	/**
     * Add Header Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
     'travel_company_header_settings_panel',
     array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Header Settings', 'travel-company' ),
     )
 );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'travel_company_top_header_section',
        array(
        	'priority'       => 2,
        	'panel'          => 'travel_company_header_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Top Header Section', 'travel-company' ),
            'description'    => __( 'Managed the content display at top header section.', 'travel-company' ),
        )
    );

   

    /**Top Header Enable/Disable Social Links */
    $wp_customize->add_setting(
        'travel_company_top_header_social_links_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'travel_company_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_company_top_header_social_links_enable',
        array(
            'section'     => 'travel_company_top_header_section',
            'label'       => __( 'Social Links', 'travel-company' ),
            'description' => __( 'Enable/Disable social links in top header.', 'travel-company' ),
            'type'        => 'checkbox'
        )       
    );

 
    /** Top Header Welcome Text */
    $wp_customize->add_setting(
        'top_header_welcome_text',
        array(
            'default'           => __( 'Welcome to Travel Company', 'travel-company' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'top_header_welcome_text',
        array(
            'label'    => __( 'Welcome Text', 'travel-company' ),
            'section'  => 'travel_company_top_header_section',
            'type'     => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'top_header_welcome_text', array(
        'selector' => '.topbar .container .row .col-lg-6 p',
        'render_callback' => 'travel_company_get_top_header_welcome_text',
    ) );

    /** Social Links */
    $wp_customize->add_setting( 
        new Travel_Company_Repeater_Setting( 
            $wp_customize, 
            'top_header_social_links', 
            array(
                'default' => array(
                    array(
                        'font' => 'fa fa-facebook',
                        'link' => 'https://www.facebook.com/',                        
                    ),
                    array(
                        'font' => 'fa fa-linkedin',
                        'link' => 'https://www.linkedin.com/',
                    ),
                    array(
                        'font' => 'fa fa-twitter',
                        'link' => 'https://twitter.com/',
                    ),
                    array(
                        'font' => 'fa fa-google-plus',
                        'link' => 'https://plus.google.com',
                    )
                ),
                'sanitize_callback' => array( 'Travel_Company_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Travel_Company_Control_Repeater(
            $wp_customize,
            'top_header_social_links',
            array(
                'section' => 'travel_company_top_header_section',              
                'label'   => __( 'Social Links', 'travel-company' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'travel-company' ),
                        'description' => __( 'Example: fa-facebook', 'travel-company' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'travel-company' ),
                        'description' => __( 'Example: http://facebook.com', 'travel-company' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'travel-company' ),
                    'field' => 'link'
                )                        
            )
        )
    );


    /*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Middle Header section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'travel_company_middle_header_section',
    array(
        'priority'       => 3,
        'panel'          => 'travel_company_header_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Middle Header Section', 'travel-company' ),
        'description'    => __( 'Managed the content display at middle header section.', 'travel-company' ),
    )
);



/** Middle Header Widget */
$wp_customize->add_setting( 
    new Travel_Company_Repeater_Setting( 
        $wp_customize, 
        'middle_header_widget_items', 
        array(
            'default' => array(
                array(
                    'icon' => 'fa fa-map-marker',
                    'title' => '87 Rue Jeanne St, Nancy',    
                    'sub_title'=> 'Middlesex, London'                    
                ),
                array(
                    'icon' => 'fa fa-phone',
                    'title' => '+012 345 678990',    
                    'sub_title'=> 'Troll Free' 
                ),
                array(
                    'icon' => 'fa fa-clock-o',
                    'title' => 'Mon -Fri: 9:00-19:00',    
                    'sub_title'=> 'Sunday Closed' 
                ),
            ),
            'sanitize_callback' => array( 'Travel_Company_Repeater_Setting', 'sanitize_repeater_setting' ),
        ) 
    ) 
);

$wp_customize->add_control(
    new Travel_Company_Control_Repeater(
        $wp_customize,
        'middle_header_widget_items',
        array(
            'section' => 'travel_company_middle_header_section',              
            'label'   => __( 'Middle header location items', 'travel-company' ),
            'fields'  => array(
                'icon' => array(
                    'type'        => 'font',
                    'label'       => __( 'Font Awesome Icon', 'travel-company' ),
                    'description' => __( 'Example: fa-facebook', 'travel-company' ),
                ),
                'title' => array(
                    'type'        => 'text',
                    'label'       => __( 'Location Title', 'travel-company' ),
                ),
                'sub_title' => array(
                    'type'        => 'text',
                    'label'       => __( 'Location Sub-title', 'travel-company' ),
                )
            ),
            'row_label' => array(
                'type' => 'field',
                'value' => __( 'locations', 'travel-company' ),
                'field' => 'sub_title'
            )                        
        )
    )
);

}