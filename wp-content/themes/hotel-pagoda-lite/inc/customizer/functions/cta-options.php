<?php
$hotel_pagoda_settings = hotel_pagoda_get_theme_options();

$wp_customize->add_setting(
    'hotel_pagoda_theme_options[show_cta_section]',
    array(
        'default' => $hotel_pagoda_settings['show_cta_section'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
    $wp_customize, 'hotel_pagoda_theme_options[show_cta_section]',
        array(
            'label' => esc_html__('Show Call To Action Section In Homepage? ', 'hotel-pagoda-lite'),
            'section' => 'cta_section',
            'settings' => 'hotel_pagoda_theme_options[show_cta_section]',
            'priority' => 1,
        )
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[home_cta_title]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('home_cta_title',
    array(
        'label' => esc_html__('Title', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'cta_section',
        'settings' => 'hotel_pagoda_theme_options[home_cta_title]',
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[home_cta_description]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('home_cta_description',
    array(
        'label' => esc_html__('Description', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'cta_section',
        'settings' => 'hotel_pagoda_theme_options[home_cta_description]',
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[cta_button_txt]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['cta_button_txt'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[cta_button_txt]',
    array(
        'label' => esc_html__('Button Text', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'cta_section',
        'settings' => 'hotel_pagoda_theme_options[cta_button_txt]',
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[cta_button_url]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['cta_button_url'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[cta_button_url]',
    array(
        'label' => esc_html__('Button Link', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'cta_section',
        'settings' => 'hotel_pagoda_theme_options[cta_button_url]',
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[cta_video_bg_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hotel_pagoda_theme_options[cta_video_bg_image]',
        array(
            'label' => esc_html__('Add Background Image', 'hotel-pagoda-lite'),
            'section' => 'cta_section',
            'settings' => 'hotel_pagoda_theme_options[cta_video_bg_image]',
        ))
);

$wp_customize->add_setting('hotel_pagoda_theme_options[cta_section_color]',
    array(
        'type' => 'option',
        'default' => '#000000b5',
        'sanitize_callback' => 'hotel_pagoda_sanitize_rgba',
    )
);


$wp_customize->add_control(
    new  Hotel_Pagoda_Customize_Opacity_Color_Control(
        $wp_customize,
        'hotel_pagoda_options[cta_section_color]',
        array(
            'label' => esc_html__('Add Background Color', 'hotel-pagoda-lite'),
            'section' => 'cta_section',
            'settings' => 'hotel_pagoda_theme_options[cta_section_color]',
        ))
);