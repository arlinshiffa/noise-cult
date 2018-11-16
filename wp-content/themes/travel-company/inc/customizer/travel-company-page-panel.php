<?php
/**
 * Free Education Pages Settings panel at Theme Customizer
 *
 * @package Travel_Company
 * @since 1.0.0
 */

add_action( 'customize_register', 'travel_Company_page_settings_register' );

function travel_Company_page_settings_register( $wp_customize ) {

	/**
     * Add Page Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
       'travel_company_page_settings_panel',
       array(
           'priority'       => 25,
           'capability'     => 'edit_theme_options',
           'theme_supports' => '',
           'title'          => __( 'Page Settings', 'travel-company' ),
       )
   );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Contact Page section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'travel_company_contact_page_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'travel_company_page_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Contact Page', 'travel-company' ),
            'description'    => __( 'Managed the content display at contact page.', 'travel-company' ),
        )
    );

    /** Contact Text */
    $wp_customize->add_setting(
        'travel_company_contact_text',
        array(
            'default'           => __( 'Our Information', 'travel-company' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'travel_company_contact_text',
        array(
            'label'    => __( 'contact title line text', 'travel-company' ),
            'section'  => 'travel_company_contact_page_section',
            'type'     => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'travel_company_contact_text', array(
        'selector' => '.contact-us .title-line p',
        'render_callback' => 'travel_company_get_contact_text',
    ) );


    /** Contact Title line heading */
    $wp_customize->add_setting(
        'travel_company_contact_title',
        array(
            'default'           => __( 'Contact Us', 'travel-company' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'travel_company_contact_title',
        array(
            'label'    => __( 'contact title line heading', 'travel-company' ),
            'section'  => 'travel_company_contact_page_section',
            'type'     => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'travel_company_contact_title', array(
        'selector' => '.contact-us .title-line h2',
        'render_callback' => 'travel_company_get_contact_title',
    ) );

    // Contact form
    $wp_customize->add_setting( 'travel_company_contact_form_shortcode', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'travel_company_contact_form_shortcode', array(
        'label'                 =>  __( 'Use Shortcode for contact form', 'travel-company' ),
        'description'           =>  __( 'eg [contact-form-7 id="108" title="Contact form 1"]', 'travel-company' ),
        'section'               => 'travel_company_contact_page_section',
        'type'                  => 'text',
        'settings' => 'travel_company_contact_form_shortcode',
    ) );


    
    /** Contact Items */
    $wp_customize->add_setting( 
        new Travel_Company_Repeater_Setting( 
            $wp_customize, 
            'travel_company_contact_items', 
            array(
                'default' => array(
                    array(
                        'icon' => 'fa fa-map-marker',
                        'title' => 'Our Location',    
                        'address'=> '87 Rue Jeanne St, House 20, Block E, Nancy Middlesex, London',
                        'email' => '' 
                    ),
                    array(
                        'icon' => 'fa fa-phone',
                        'title' => 'Contact Us',    
                        'address'=> 'Telephone: +012 345 678990',
                        'email' => 'info@yourwebsite.com' 
                    ),
                    array(
                        'icon' => 'fa fa-clock-o',
                        'title' => 'Working Times',    
                        'address'=> 'Monday - Friday: 9:00AM -19:00PM Sunday Close',
                        'email' => '' 
                    )
                ),
                'sanitize_callback' => array( 'Travel_Company_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );

    $wp_customize->add_control(
        new Travel_Company_Control_Repeater(
            $wp_customize,
            'travel_company_contact_items',
            array(
                'section' => 'travel_company_contact_page_section',              
                'label'   => __( 'Contact items', 'travel-company' ),
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
                    'address' => array(
                        'type'        => 'text',
                        'label'       => __( 'Adress', 'travel-company' ),
                    ),
                    'email' => array(
                        'type'        => 'text',
                        'label'       => __( 'Email', 'travel-company' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'contacts', 'travel-company' ),
                    'field' => 'title'
                )                        
            )
        )
    );
}