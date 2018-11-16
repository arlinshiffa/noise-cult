<?php
/**
 * Enqueue scripts and styles.
 */
function hotel_pagoda_scripts() {
    $hotel_pagoda_theme_options = hotel_pagoda_get_theme_options();
    $blog_bg = $hotel_pagoda_theme_options['blog_color'];
    $cta_bg = $hotel_pagoda_theme_options['cta_section_color'];
    $bgcolor = '';
    if ($cta_bg) {
        $bgcolor .= ".cta-sec-bottom:before{background : $cta_bg;}";
    }
    if ($blog_bg) {
        $bgcolor .= "section#blog:before{background : $blog_bg !important;}";
    }

    wp_enqueue_style( 'hotel-pagoda-style', get_stylesheet_uri() );
    wp_enqueue_style('hotel-pagoda-font-fonts', hotel_pagoda_fonts_url(), array(), null);
    wp_enqueue_style('hotel-pagoda-custom-style', get_template_directory_uri() . '/assets/css/hotel-pagoda.css', array(), '20181302125', null);
    wp_add_inline_style( 'hotel-pagoda-custom-style', $bgcolor );

    wp_enqueue_script( 'hotel-pagoda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'hotel-pagoda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '', true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), '', true);
    wp_enqueue_script('sticky-header', get_template_directory_uri() . '/assets/js/sticky-header.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-countto', get_template_directory_uri() . '/assets/js/jquery.countTo.js', array('jquery'), '', true);
    wp_enqueue_script('hotel-pagoda-custom-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '', true);
    wp_localize_script('hotel-pagoda-custom-js', 'hotel_pagoda_ajax_function', array('ajaxurl' => admin_url('admin-ajax.php'),));

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'hotel_pagoda_scripts' );

if (!function_exists('hotel_pagoda_lite_fonts_url')) :
    function hotel_pagoda_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();


        if ('off' !== _x('on', 'Questrial font: on or off', 'hotel-pagoda-lite')) {
            $fonts[] = 'Questrial';
        }
        if ('off' !== _x('on', 'Quicksand font: on or off', 'hotel-pagoda-lite')) {
            $fonts[] = 'Quicksand:400,500';
        }
        if ('off' !== _x('on', 'Playfair Display font: on or off', 'hotel-pagoda-lite')) {
            $fonts[] = 'Playfair Display:400,700,900';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
            ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;
