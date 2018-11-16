<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class hotel_pagoda_lite_Discount_Customize {

    /**
     * Returns the instance.
     *
     */
    public static function get_instance() {

        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }

        return $instance;
    }

    /**
     * Constructor method.
     *
     */
    private function __construct() {}

    /**
     * Sets up initial actions.
     *
     */
    private function setup_actions() {

        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array( $this, 'sections' ) );

        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
    }

    /**
     * Sets up the customizer sections.
     *
     */
    public function sections( $manager ) {

        // Load custom sections.
        require get_template_directory(). '/inc/customizer/functions/hotel-pagoda-section-pro-discount.php';

        // Register custom section types.
        $manager->register_section_type( 'Hotel_Pagoda_Lite_Discount_Customize_Section_Pro' );

        // Register sections.
        $manager->add_section(
            new Hotel_Pagoda_Lite_Discount_Customize_Section_Pro(
                $manager,
                'Hotel_Pagoda_Lite_Discount_Customize_Section_Pro',
                array(

                    'pro_text' => wp_kses_post( "Buy Hotel Pagoda Pro (20% Off)", 'hotel-pagoda-lite' ),
                    'pro_url'  => 'https://www.pridethemes.com/product/hotel-pagoda-premium-wordpress-theme/',
                    'pro_info'  => esc_html__('Why Pro?','hotel-pagoda-lite'),
                    'pro_info1'  => esc_html__('Modern And clean design','hotel-pagoda-lite'),
                    'pro_info2'  => esc_html__('Instant Booking And Payment Option','hotel-pagoda-lite'),
                    'pro_info3'  => esc_html__('Premium Support','hotel-pagoda-lite'),
                    'pro_info4'  => esc_html__('Translation Ready','hotel-pagoda-lite'),
                    'pro_info5'  => esc_html__('Buy Premium','hotel-pagoda-lite'),
                    'priority' => 1,
                )
            )
        );
    }

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {

        wp_enqueue_script( 'hotel-pagoda-lite-customize-controls', get_template_directory_uri() . '/inc/customizer/assets/customizer.js', array( 'customize-controls' ) );

        wp_enqueue_style( 'hotel-pagoda-lite-customize-controls',get_template_directory_uri() . '/inc/customizer/css/customizer-control.css' );
    }
}

// Doing this customizer thang!
hotel_pagoda_lite_Discount_Customize::get_instance();
