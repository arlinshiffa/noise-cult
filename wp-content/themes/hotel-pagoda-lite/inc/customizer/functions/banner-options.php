<?php
//Banner Section
$hotel_pagoda_options = hotel_pagoda_get_theme_options();

$wp_customize->add_setting(
    'hotel_pagoda_theme_options[banner_picker]',
    array(
        'type'      =>'option',
        'sanitize_callback' => 'esc_html',
        'default'   => 'banner-image',
    )
);
    $banner_choice = array(
        'banner-image'       =>  esc_html__( 'Single Image Banner (default)', 'hotel-pagoda-lite' ),
        'banner-slider'      =>  esc_html__( 'Slider Banner', 'hotel-pagoda-lite' ),
        );


$wp_customize->add_control(
    'hotel_pagoda_theme_options[banner_picker]',
    array(
        'section' => 'banner_options',
        'label'   => esc_html__( 'Banner', 'hotel-pagoda-lite' ),
        'type'    => 'radio',
        'choices' => $banner_choice,
        'settings' => 'hotel_pagoda_theme_options[banner_picker]',

    )
);

for ($i = 1; $i <= 2; $i++) {
    $wp_customize->add_setting('hotel_pagoda_theme_options[featured_page_slider_' . $i . ']',
        array(
            'default' => '',
            'sanitize_callback' => 'hotel_pagoda_sanitize_page',
            'type' => 'option',
            'capability' => 'manage_options'
        ));
    $wp_customize->add_control('hotel_pagoda_theme_options[featured_page_slider_' . $i . ']',
        array(
            'priority' => 220 . $i,
            'label' => __(' Page Slider', 'hotel-pagoda-lite') . ' ' . $i,
            'section' => 'banner_options',
            'type' => 'dropdown-pages',
            'active_callback' => 'hotel_pagoda_banner_callback_choice',
        ));
}