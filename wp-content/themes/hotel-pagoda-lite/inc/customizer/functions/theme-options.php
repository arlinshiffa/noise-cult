<?php
$hotel_pagoda_settings = hotel_pagoda_get_theme_options();

//Support section
$wp_customize->add_section('hotel_pagoda_theme_support', array(
    'title' => esc_html__('Support', 'hotel-pagoda-lite'),
    'priority' => 1, // Mixed with top-level-section hierarchy.
));


/* Theme Color */
$wp_customize->add_setting(
    'hotel_pagoda_theme_options[hotel_pagoda_theme_color]',
     array(
        'type'              => 'option',
        'default'           => '#45deb0',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
  $wp_customize->add_control(new WP_Customize_Color_Control ( $wp_customize, 'hotel_pagoda_theme_color', array(
      'label'    => esc_html__( 'Theme Color', 'hotel-pagoda-lite' ),
      'section'  => 'colors',
      'settings' => 'hotel_pagoda_theme_options[hotel_pagoda_theme_color]')
    ) );


/* General Options*/

	$wp_customize->add_setting('hotel_pagoda_theme_options[hotel_pagoda_reset_all]',
    array(
        'default' => $hotel_pagoda_settings['hotel_pagoda_reset_all'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hotel_pagoda_reset_alls',
        'transport' => 'postMessage',
    ));
	$wp_customize->add_control('hotel_pagoda_theme_options[hotel_pagoda_reset_all]',
    array(
        'priority' => 50,
        'label' => esc_html__('Reset all default settings. (Refresh it to view the effect)', 'hotel-pagoda-lite'),
        'section' => 'general_option',
        'type' => 'checkbox',
    ));



		/* Layout Picker */

		$wp_customize->add_setting( 'hotel_pagoda_theme_options[sidebar_layout_picker]', array(
				'default'           => $hotel_pagoda_settings['sidebar_layout_picker'],
				'sanitize_callback' => 'hotel_pagoda_sanitize_choices',
                'type'      =>'option',
            )
		);

        $wp_customize->add_control('hotel_pagoda_theme_options[sidebar_layout_picker]', array(
            'label' => esc_html__('Sidebar Alignment', 'hotel-pagoda-lite'),
            'description' => esc_html__('Sidebar For Post And Pages', 'hotel-pagoda-lite'),
            'type' => 'radio',
            'choices' => array(
                '3' => esc_html__('Right Sidebar', 'hotel-pagoda-lite'),
                '1' => esc_html__('No Sidebar', 'hotel-pagoda-lite'),
                '2' => esc_html__('Left Sidebar', 'hotel-pagoda-lite'),
            ),
            'section' => 'general_option',
            'settings' => 'hotel_pagoda_theme_options[sidebar_layout_picker]'
        ));



$wp_customize->add_setting(
    'hotel_pagoda_theme_options[header_phone]',
    array(
        'default' => $hotel_pagoda_settings['header_phone'],
        'type' => 'option',
        'sanitize_callback' => 'absint',
        'capability' => 'edit_theme_options'
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[header_phone]', array(
    'label' => esc_html__('Phone No.', 'hotel-pagoda-lite'),
    'type' => 'text',
    'section' => 'header_options',
    'settings' => 'hotel_pagoda_theme_options[header_phone]'
));
/* Intro Options*/

/* Intro Options*/


$wp_customize->add_setting(
    'hotel_pagoda_theme_options[show_intro]',
    array(
        'default' => $hotel_pagoda_settings['show_intro'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
        $wp_customize, 'hotel_pagoda_theme_options[show_intro]',
        array(
            'label' => esc_html__('Show Hotel Info Section In Homepage? ', 'hotel-pagoda-lite'),
            'section' => 'introduction_options',
            'settings' => 'hotel_pagoda_theme_options[show_intro]',
            'priority' => 1,
        )
    )
);

$wp_customize->add_setting(
    'hotel_pagoda_theme_options[intro_pages]',
    array(
        'default' => $hotel_pagoda_settings['intro_pages'],
        'type' => 'option',
        'sanitize_callback' => 'absint',
        'capability' => 'edit_theme_options'
    )
);
$wp_customize->add_control('intro_pages', array(
    'label' => esc_html__('Choose Introduction Page :', 'hotel-pagoda-lite'),
    'type' => 'dropdown-pages',
    'section' => 'introduction_options',
    'settings' => 'hotel_pagoda_theme_options[intro_pages]'
));

$wp_customize->add_setting('hotel_pagoda_theme_options[intro_title]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['intro_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[intro_title]',
    array(
        'label' => esc_html__('Title', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'introduction_options',
        'settings' => 'hotel_pagoda_theme_options[intro_title]',
    )
);

//Testimonial options
$wp_customize->add_setting(
    'hotel_pagoda_theme_options[show_testimonial_section]',
    array(
        'default' => $hotel_pagoda_settings['show_testimonial_section'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
        $wp_customize, 'hotel_pagoda_theme_options[show_testimonial_section]',
        array(
            'label' => esc_html__('Show Testimonial Section In Homepage? ', 'hotel-pagoda-lite'),
            'section' => 'testimonial_options',
            'settings' => 'hotel_pagoda_theme_options[show_testimonial_section]',
            'priority' => 1,
        )
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[testimonial_title]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['testimonial_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[testimonial_title]',
    array(
        'label' => esc_html__('Title', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'testimonial_options',
        'settings' => 'hotel_pagoda_theme_options[testimonial_title]',
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[testimonial_desc]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['testimonial_desc'],
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[testimonial_desc]',
    array(
        'label' => esc_html__('Subtitle', 'hotel-pagoda-lite'),
        'type' => 'textarea',
        'section' => 'testimonial_options',
        'settings' => 'hotel_pagoda_theme_options[testimonial_desc]',
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[testimonial_count]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['testimonial_count'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[testimonial_count]',
    array(
        'label' => esc_html__('No. of Posts', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'testimonial_options',
        'settings' => 'hotel_pagoda_theme_options[testimonial_count]',
    )
);
    $wp_customize->add_setting('hotel_pagoda_theme_options[testimonial_options_column]',
        array(
            'default' => $hotel_pagoda_settings['testimonial_options_column'],
            'sanitize_callback' => 'hotel_pagoda_sanitize_select',
            'type' => 'option',
        ));
$wp_customize->add_control('hotel_pagoda_theme_options[testimonial_options_column]',
    array(
        'label' => esc_html__('Select Design', 'hotel-pagoda-lite'),
        'section' => 'testimonial_options',
        'type' => 'select',
        'settings' => 'hotel_pagoda_theme_options[testimonial_options_column]',
        'choices' =>
            array(
                'one-column' => esc_html__('One Column', 'hotel-pagoda-lite'),
                'three-column' => esc_html__('Three Column', 'hotel-pagoda-lite'),
            ),
    ));
$wp_customize->add_setting('hotel_pagoda_theme_options[testimonial_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hotel_pagoda_theme_options[testimonial_image]',
        array(
            'label' => esc_html__('Add Background Image', 'hotel-pagoda-lite'),
            'section' => 'testimonial_options',
            'settings' => 'hotel_pagoda_theme_options[testimonial_image]',
        ))
);


$wp_customize->add_setting('hotel_pagoda_theme_options[testimonial_section_color]',
    array(
        'type' => 'option',
        'default' => '#fff',
        'sanitize_callback' => 'hotel_pagoda_sanitize_rgba',
    )
);


$wp_customize->add_control(
    new  Hotel_Pagoda_Customize_Opacity_Color_Control(
        $wp_customize,
        'hotel_pagoda_theme_options[testimonial_section_color]',
        array(
            'label' => esc_html__('Add Background Color', 'hotel-pagoda-lite'),
            'section' => 'testimonial_options',
            'settings' => 'hotel_pagoda_theme_options[testimonial_section_color]',
        ))
);

//Blog options
$wp_customize->add_setting(
    'hotel_pagoda_theme_options[show_blog_section]',
    array(
        'default' => $hotel_pagoda_settings['show_blog_section'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
        $wp_customize, 'hotel_pagoda_theme_options[show_blog_section]',
        array(
            'label' => esc_html__('Show Blog Section In Homepage? ', 'hotel-pagoda-lite'),
            'section' => 'blog_options',
            'settings' => 'hotel_pagoda_theme_options[show_blog_section]',
            'priority' => 1,
        )
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[blog_title]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['blog_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[blog_title]',
    array(
        'label' => esc_html__('Title', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'blog_options',
        'settings' => 'hotel_pagoda_theme_options[blog_title]',
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[blog_desc]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['blog_desc'],
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[blog_desc]',
    array(
        'label' => esc_html__('Subtitle', 'hotel-pagoda-lite'),
        'type' => 'text',
        'section' => 'blog_options',
        'settings' => 'hotel_pagoda_theme_options[blog_desc]',
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[blog_category]',
    array(
        'type'    => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => $hotel_pagoda_settings['blog_category'],
    ));

$wp_customize->add_control(new Hotel_Pagoda_Top_Dropdown_Customize_Control(
        $wp_customize, 'hotel_pagoda_theme_options[blog_category]',
        array(
            'section' => 'blog_options',
            'label'   => esc_html__('Select Category For Blog Section?', 'hotel-pagoda-lite'),
            'settings' => 'hotel_pagoda_theme_options[blog_category]',
            'priority' => 1,
        )
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[hotel_pagoda_entry_meta_blog]',
    array(
        'default' => $hotel_pagoda_settings['hotel_pagoda_entry_meta_blog'],
        'sanitize_callback' => 'hotel_pagoda_sanitize_select',
        'type' => 'option',
    ));
$wp_customize->add_control('hotel_pagoda_theme_options[hotel_pagoda_entry_meta_blog]',
    array(
        'priority' => 45,
        'label' => esc_html__('Meta for blog page', 'hotel-pagoda-lite'),
        'section' => 'blog_options',
        'type' => 'select',
        'settings' => 'hotel_pagoda_theme_options[hotel_pagoda_entry_meta_blog]',
        'choices' =>
            array(
                'show-meta' => esc_html__('Show Meta', 'hotel-pagoda-lite'),
                'hide-meta' => esc_html__('Hide Meta', 'hotel-pagoda-lite'),
            ),
    ));

$wp_customize->add_setting('hotel_pagoda_theme_options[blog_background]',
    array(
        'type' => 'option',
        'default' => $hotel_pagoda_settings['blog_background'],
        'sanitize_callback' => 'esc_url_raw',

    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hotel_pagoda_theme_options[blog_background]',
        array(
            'label' => esc_html__('Add Background Image', 'hotel-pagoda-lite'),
            'section' => 'blog_options',
            'settings' => 'hotel_pagoda_theme_options[blog_background]',
        ))
);
$wp_customize->add_setting('hotel_pagoda_theme_options[blog_color]',
    array(
        'type' => 'option',
        'default' => '#fff',
        'sanitize_callback' => 'hotel_pagoda_sanitize_rgba',
    )
);


$wp_customize->add_control(
    new  Hotel_Pagoda_Customize_Opacity_Color_Control(
        $wp_customize,
        'hotel_pagoda_theme_options[blog_color]',
        array(
            'label' => esc_html__('Backgorund Overlay', 'hotel-pagoda-lite'),
            'section' => 'blog_options',
            'settings' => 'hotel_pagoda_theme_options[blog_color]',
        ))
);

//Pre Footer options


//Footer Section

$wp_customize->add_setting('hotel_pagoda_theme_options[room_checkbox]',
    array(
        'type'    => 'option',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
        'default' => $hotel_pagoda_settings['room_checkbox'],
    ));

$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
        $wp_customize, 'hotel_pagoda_theme_options[room_checkbox]',
        array(
            'section' => 'room_section',
            'label'   => esc_html__('Show Room Section In Homepage?', 'hotel-pagoda-lite'),
            'settings' => 'hotel_pagoda_theme_options[room_checkbox]',
            'priority' => 1,
        )
    )
);


$wp_customize->add_setting(
    'hotel_pagoda_theme_options[room_page]',
    array(
        'default'           => $hotel_pagoda_settings['room_page'],
        'type'              => 'option',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control('hotel_pagoda_theme_options[room_page]',
    array(
        'label'             => esc_html__( 'Select Page For Title And Description', 'hotel-pagoda-lite' ),
        'type'              =>'dropdown-pages',
        'section'           => 'room_section',
        'settings'          => 'hotel_pagoda_theme_options[room_page]',
        'priority' => 1,
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[room_category]',
    array(
        'type'    => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => $hotel_pagoda_settings['room_category'],
    ));

$wp_customize->add_control(new Hotel_Pagoda_Top_Dropdown_Customize_Control(
        $wp_customize, 'hotel_pagoda_theme_options[room_category]',
        array(
            'section' => 'room_section',
            'label'   => esc_html__('Select Category For Room Section?', 'hotel-pagoda-lite'),
            'settings' => 'hotel_pagoda_theme_options[room_category]',
            'priority' => 1,
        )
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[footer_checkbox]',
    array(
        'type'    => 'option',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
        'default' => $hotel_pagoda_settings['footer_checkbox'],
    ));

$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
        $wp_customize, 'hotel_pagoda_theme_options[footer_checkbox]',
        array(
            'section' => 'footer_section',
            'label'   => esc_html__('Show Pre-Footer', 'hotel-pagoda-lite'),
            'description' => esc_html__('You Can Add The Widgets From Customizer>widgets.', 'hotel-pagoda-lite'),
            'settings' => 'hotel_pagoda_theme_options[footer_checkbox]',
            'priority' => 1,
        )
    )
);


$wp_customize->add_setting(
    'hotel_pagoda_theme_options[contact_fblink]',
    array(
        'default'           => $hotel_pagoda_settings['contact_fblink'],
        'type'              => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('hotel_pagoda_theme_options[contact_fblink]',
    array(
        'label'             => esc_html__( 'Facebook Link', 'hotel-pagoda-lite' ),
        'type'              =>'text',
        'section'           => 'header_options',
        'settings'          => 'hotel_pagoda_theme_options[contact_fblink]'
    )
);

$wp_customize->add_setting(
    'hotel_pagoda_theme_options[contact_tlink]',
    array(
        'default'           => $hotel_pagoda_settings['contact_tlink'],
        'type'              => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('hotel_pagoda_theme_options[contact_tlink]',
    array(
        'label'             => esc_html__( 'Twitter Link', 'hotel-pagoda-lite' ),
        'type'              =>'text',
        'section'           => 'header_options',
        'settings'          => 'hotel_pagoda_theme_options[contact_tlink]'
    )
);
$wp_customize->add_setting(
    'hotel_pagoda_theme_options[contact_ins]',
    array(
        'default'           => $hotel_pagoda_settings['contact_ins'],
        'type'              => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('hotel_pagoda_theme_options[contact_ins]',
    array(
        'label'             => esc_html__( 'Instagram Link', 'hotel-pagoda-lite' ),
        'type'              =>'text',
        'section'           => 'header_options',
        'settings'          => 'hotel_pagoda_theme_options[contact_ins]'
    )
);

$wp_customize->add_setting(
    'hotel_pagoda_theme_options[hotel_show]',
    array(
        'default' => $hotel_pagoda_settings['hotel_show'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hotel_pagoda_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Hotel_Pagoda_checkbox_Customize_Controls(
        $wp_customize, 'hotel_pagoda_theme_options[hotel_show]',
        array(
            'label' => esc_html__('Show Hotel Listing Section In Homepage ? ', 'hotel-pagoda-lite'),
            'section' => 'hotel_options',
            'settings' => 'hotel_pagoda_theme_options[hotel_show]',
            'priority' => 1,
        )
    )
);

$wp_customize->add_setting('hotel_pagoda_theme_options[hotel_title]',
    array(
        'capability' => 'edit_theme_options',
        'default' => $hotel_pagoda_settings['hotel_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[hotel_title]',
    array(
        'label' => esc_html__('Section Title', 'hotel-pagoda-lite'),
        'priority' => 1,
        'section' => 'hotel_options',
        'type' => 'text',
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[hotel_description]',
    array(
        'capability' => 'edit_theme_options',
        'default' => $hotel_pagoda_settings['hotel_description'],
        'sanitize_callback' => 'sanitize_textarea_field',
        'type' => 'option',
    )
);
$wp_customize->add_control('hotel_pagoda_theme_options[hotel_description]',
    array(
        'label' => esc_html__('Section Description', 'hotel-pagoda-lite'),
        'priority' => 1,
        'section' => 'hotel_options',
        'type' => 'textarea',
    )
);
$wp_customize->add_setting('hotel_pagoda_theme_options[hotel_category]', array(
    'default' => $hotel_pagoda_settings['hotel_category'],
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',

));

$wp_customize->add_control(new Hotel_Pagoda_Hotel_Dropdown_Customize_Control(
    $wp_customize, 'hotel_pagoda_theme_options[hotel_category]',
    array(
        'label' => esc_html__('Select Hotel Category', 'hotel-pagoda-lite'),
        'section' => 'hotel_options',
        'settings' => 'hotel_pagoda_theme_options[hotel_category]',
    )
));