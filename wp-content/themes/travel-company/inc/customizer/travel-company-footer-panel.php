<?php
/**
 * Travel Company Header Settings panel at Theme Customizer
 *
 * @package Travel_Company
 * @since 1.0.0
 */

add_action( 'customize_register', 'travel_company_footer_settings_register' );

function travel_company_footer_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';

	/**
     * Add Footer Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
     'travel_company_footer_settings_panel',
     array(
         'priority'       => 20,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Footer Settings', 'travel-company' ),
     )
 );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Bottom Footer section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'travel_company_bottom_footer_section',
        array(
        	'priority'       => 2,
        	'panel'          => 'travel_company_footer_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Bottom Footer Social links Section', 'travel-company' ),
            'description'    => __( 'Managed the content display at footer bottom social Link section.', 'travel-company' ),
        )
    );



    /**Top Header Enable/Disable Social Links */
    $wp_customize->add_setting(
        'travel_company_bottom_footer_social_links_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'travel_company_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'travel_company_bottom_footer_social_links_enable',
        array(
            'section'     => 'travel_company_bottom_footer_section',
            'label'       => __( 'Social Links', 'travel-company' ),
            'description' => __( 'Enable/Disable social links in Bottom Footer.', 'travel-company' ),
            'type'        => 'checkbox'
        )       
    );

 
    /** Social Links */
    $wp_customize->add_setting( 
        new Travel_Company_Repeater_Setting( 
            $wp_customize, 
            'bottom_footer_social_links', 
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
            'bottom_footer_social_links',
            array(
                'section' => 'travel_company_bottom_footer_section',              
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
}