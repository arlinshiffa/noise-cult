<?php
$hotel_pagoda_settings = hotel_pagoda_get_theme_options();

$wp_customize->add_setting('hotel_pagoda_theme_options[show_stats_section]',
    array(
        'type'    => 'option',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
        'default' => $hotel_pagoda_settings['show_stats_section'],
    ));

$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
        $wp_customize, 'hotel_pagoda_theme_options[show_stats_section]',
        array(
            'section' => 'stat_options',
            'label'        => esc_html__( 'Show Stats Section In Homepage ?', 'hotel-pagoda-lite' ),
            'settings' => 'hotel_pagoda_theme_options[show_stats_section]',
            'priority' => 1,
        )
    )
);


for ($i = 1; $i <= 3; $i++) {
    $wp_customize->add_setting('hotel_pagoda_theme_options[hotel_pagoda_stat_'.$i.']',
        array(
            'type' => 'info',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(new Hotel_Pagoda_Section_Info($wp_customize, 'hotel_pagoda_theme_options[hotel_pagoda_stat_'.$i.'', array(
            'label' => esc_html__('Stats ', 'hotel-pagoda-lite') . ' ' . $i,
            'section' => 'stat_options',
            'settings' => 'hotel_pagoda_theme_options[hotel_pagoda_stat_'.$i.']',
        ))
    );


    $wp_customize->add_setting(
        'hotel_pagoda_theme_options[hotel_pagoda_stat_title'.$i.']',
        array(
            'default' => '',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('hotel_pagoda_theme_options[hotel_pagoda_stat_title'.$i.']', array(
        'label' => esc_html__('Title:', 'hotel-pagoda-lite') ,
        'type' => 'text',
        'section' => 'stat_options',
        'settings' => 'hotel_pagoda_theme_options[hotel_pagoda_stat_title'.$i.']',
    ));

    $wp_customize->add_setting(
        'hotel_pagoda_theme_options[hotel_pagoda_stat_number'.$i.']',
        array(
            'default' => '',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control('hotel_pagoda_theme_options[hotel_pagoda_stat_number'.$i.']', array(
        'label' => esc_html__('Number', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'stat_options',
        'settings' => 'hotel_pagoda_theme_options[hotel_pagoda_stat_number'.$i.']',
    ));
}