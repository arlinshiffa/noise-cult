<?php
if (!function_exists('hotel_pagoda_theme_options')) :
    function hotel_pagoda_theme_options()
    {
        $defaults = array(
			'hotel_pagoda_theme_color' => '#45deb0',
			'sidebar_layout_picker' => '3',
            'banner_picker' => 'banner-image',
            'header_phone' => '',
            'header_layout' => '',
            'contact_ins' => '',
            'youtube_video' => '',
            'show_intro_pages' => '',
            'add_intro_title' => '',
            'add_intro_image_align' => '',
            'show_add_intro' => '',
            'hotel_show' => '',
            'hotel_title' => '',
            'hotel_description' => '',
            'hotel_category' => '',
            'upload_banner_video' => '',
            'slider_image_title' => '',
            'slider_image_description' => '',
            'slider_image_text' => '',
            'slider_image_link' => '',
            'upload_banner_image' => '',
            'slider_video_title' => '',
            'slider_video_description' => '',
            'slider_video_text' => '',
            'slider_video_link' => '',
            'upload_banner_video_preview_image' => '',
            'video_btn' => '',
            'video_link' => '',
            'cover_banner' => '',
            'banner_post_type' => '',
            'banner_video_audio' => 1,
            'decor_image' => '',
            'single_btn1' => '',
            'single_btn2' => '',
            'single_link1' => '',
            'single_link2' => '',
            'slider_posts' => '',
            'hotel_pagoda_reset_all' => '',

            //intro options
            'show_intro' => 0,
            'intro_pages' => '',
            'introbg_image' => '',
            'intro_title' => '',
            'intro_image_align' => 'right',
            'show_intro_2' => 0,
            'intro_pages_2' => '',
            'introbg_image_2' => '',
            'intro_title_2' => '',
            'intro_image_align_2' => 'right',

            //woocommerce
            'product_show' => 0,
            'show_sc1' => 0,
            'show_sc2' => 0,
            'product_title' => '',
            'product_description' => '',
            'product_listing_woo' => '',
            'hotel_pagoda_shortcode1' => '',
            'hotel_pagoda_shortcode2' => '',

            //Top call outs
            'hotel_pagoda_top_callout_show' => 0,
            'callout_title' => '',
            'callout_desc' => '',
            'callout_category' => 'none',
            'bottom_callout_bgimg' => '',
            'top_callout_background' => '',
            'top_callout_color' => '#fff',

            //Bottom call outs
            'hotel_pagoda_bottom_callout_show' => 0,
            'bottom_callout_title' => '',
            'bottom_callout_desc' => '',
            'bottom_callout_category' => 'none',			
            'bottom_callout_section_color' => '#fff',
            'hotel_pagoda_top_layout1' => 'layout-1',
            'hotel_pagoda_bottom_layout1' => 'layout-1',

            //Room Section
            'room_checkbox' => 0,
            'room_category' => '',
            'room_page' => '',

            //CTA section
            'show_cta_section' => '',
            'home_cta_title' => '',
            'home_cta_description' => '',
            'cta_video_radio' => 'video_link',
            'youtube_vemeo_link' => '',
            'cta_upload_video' => '',
            'cta_video_bg_image' => '',
            'video_bg_option' => '',
            'cta_section_color' => '#000000b5',
            'cta_parallax' => 0,
            'hotel_pagoda_sortable_control' => '',
            'cta_button_txt' => '',
            'cta_button_url' => '',

            //Service Option
            'hotel_pagoda_service_show'     => 0,
            'service_desc'                  => '',
            'service_title'                 => '',
            'service_background'                 => '',
            'service_color'                 => '#fff',
            'service_layout1'  => 'layout-1',
            'service_posts'              => 1,

            //Bottom CTA
            'bottom_cta_show'   => 0,
            'bottom_cta_desc'   => '',
            'bottom_cta_text'   => '',
            'bottom_cta_link'   => '',
            'bottom_cta_color'   => '#45deb0',

            //Stats Options
            'show_stats_section' => 0,
            'hotel_pagoda_stat_title1' => '',
            'hotel_pagoda_stat_title2' => '',
            'hotel_pagoda_stat_title3' => '',
            'hotel_pagoda_stat_title4' => '',
            'hotel_pagoda_stat_number1' => '',
            'hotel_pagoda_stat_number2' => '',
            'hotel_pagoda_stat_number3' => '',
            'hotel_pagoda_stat_number4' => '',
            'hotel_pagoda_stat_icon1' => '',
            'hotel_pagoda_stat_icon2' => '',
            'hotel_pagoda_stat_icon3' => '',
            'hotel_pagoda_stat_icon4' => '',
            'hotel_pagoda_stat_image1' => '',
            'hotel_pagoda_stat_image2' => '',
            'hotel_pagoda_stat_image3' => '',
            'hotel_pagoda_stat_image4' => '',
            'hotel_pagoda_stat_option' => 'icon-layout',
            'mid_bg_image' => '',
            'features_layout' => '',
            'stat_section_color' => '#45deb0',
            'show_featured_section' => '',
            'stat_section_slider' => '#fff',
            'mid_bg_option' => 'mid_bg_cover',
            'feature_post_type' => '',
            'features_block_title' => '',
            'navigation_font_family' => '',
            'heading_font_family' => '',
            'paragraph_font_family' => '',

            //Recent opions
            'show_recent_section' => 0,
            'recent_title' => '',
            'recent_background' => '',
            'recent_layout' => 'layout-1',
            'recent_desc' => '',
            'recent_color' => '#fff',
            'recent_box' => 'container',
            'recent_cat' => 'none',
            'recent_number' => '6',
            'recent_padding' => 0,


            //Team Options
            'show_team_section' => 0,
            'team_title' => '',
            'team_desc' => '',
            'team_background' => '',
            'team_color' => '#fff',
            'team_layout' => 'layout-1',
            'team_count' => 3,

            //Testimonial Options
            'show_testimonial_section' => 0,
            'testimonial_title' => '',
            'testimonial_desc' => '',
            'testimonial_section_color' => '#fff',
            'testimonial_image' => '',
            'testimonial_bg_option' => '',
            'testimonial_bg' => 'bg-cover',
            'testimonial_options_column' => 'one-column',
            'testimonial_count' => 3,

            //Clients Options
            'show_clients_section' => 0,
            'clients_count' => 6,

            //Clients Options
            'show_subscribe_section' => 0,
            'subscribe_title' => '',
            'subscribe_color' => '#fff',
            'subscribe_background' => '',
            'subscribe_description' => '',
            'subscribe_layout' => 'layout-1',

            //Clients Options
            'show_price_section' => 0,
            'price_title' => '',
            'price_desc' => '',
            'price_background' => '',
            'price_color' => '#fff',
            'clients_desc' => '',
            'clients_title' => '',

            //Blog Options
            'show_blog_section' => 0,
            'blog_title' => '',
            'blog_desc' => '',
            'blog_color' => '#fff',
            'blog_background' => '',
            'blog_category' => '',
            'hotel_pagoda_entry_meta_blog' => 'show-meta',
            'blog_layout1' => 'layout-1',


            //social
            'contact_fblink'   => '',
            'contact_dblink'   => '',
            'contact_lilink'   => '',
            'contact_gitlink'   => '',
            'contact_tlink'   => '',
            'contact_gplink'   => '',




            //counter option
            'counter_show' => 0,
            'counter_title' => '',
            'counter_desc' => '',
            'counter_date' => '',
            'counter_color' => '#fff',
            'counter_background' => '',

            // footer
            'footer_checkbox' => 0,
            'pre_footer_layout' => 'prefooter1',
            'footer_layout' => 'footer1',
            'copyright_text' => '&copy; Copyright 2018',
            'developed_by_text' => 'Pride Themes',
            'developed_by_link' => 'https://pridethemes.com/',

        );
        $user_info = get_userdata(1);
        $user_email = $user_info->user_email;
        if(is_email($user_email) && !empty($user_email)){
            $defaults['form_email'] =$user_email;
        }
        else{
            $defaults['form_email'] = '';
        }
        $options = get_option('hotel_pagoda_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;