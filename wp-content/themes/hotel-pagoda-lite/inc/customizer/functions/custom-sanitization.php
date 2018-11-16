<?php
if (!function_exists('hotel_pagoda_sanitize_css')):

    function hotel_pagoda_sanitize_css($input)
    {
        return wp_filter_nohtml_kses($input);
    }
endif;


if (!function_exists('hotel_pagoda_sanitize_checkbox')):
    function hotel_pagoda_sanitize_checkbox($input)
    {
        return ((isset($input) && true == $input) ? true : false);
    }
endif;

if (!function_exists('hotel_pagoda_sanitize_checkboxes')) {

    function hotel_pagoda_sanitize_checkboxes($input)
    {
        return $input;
    }
}

if ( ! function_exists( 'hotel_pagoda_sanitize_page' ) ) :
    function hotel_pagoda_sanitize_page( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;

if (!function_exists('hotel_pagoda_sanitize_select')) {

    function hotel_pagoda_sanitize_select($input, $setting)
    {

        // Ensure input is a slug
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
}

if (!function_exists('hotel_pagoda_sanitize_choices')):
    function hotel_pagoda_sanitize_choices($input, $setting)
    {
        global $wp_customize;

        $control = $wp_customize->get_control($setting->id);

        if (array_key_exists($input, $control->choices)) {
            return $input;
        } else {
            return $setting->default;
        }
    }
endif;

if (!function_exists('hotel_pagoda_unsanitize')):
    function hotel_pagoda_unsanitize($input)
    {
        return $input;
    }
endif;

if (!function_exists('hotel_pagoda_sanitize_rgba')):
    function hotel_pagoda_sanitize_rgba($color)
    {
        if (empty($color) || is_array($color))
            return 'rgba(0,0,0,0)';

        // If string does not start with 'rgba', then treat as hex
        // sanitize the hex color and finally convert hex to rgba
        if (false === strpos($color, 'rgba')) {
            return sanitize_hex_color($color);
        }

        // By now we know the string is formatted as an rgba color so we need to further sanitize it.
        $color = str_replace(' ', '', $color);
        sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);
        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
    }
endif;

if (!function_exists('hotel_pagoda_reset_alls')){

    function hotel_pagoda_reset_alls($input)
    {
        if ($input == 1) {
            delete_option('hotel_pagoda_theme_options');
            $input = 0;
            return $input;
        } else {
            return '';
        }
    }
}