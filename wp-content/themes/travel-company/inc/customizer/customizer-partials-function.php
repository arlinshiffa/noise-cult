<?php
/**
 * Partials for Selective Refresh
 *
 * @package Travel_Company
 */

if( ! function_exists( 'travel_company_get_top_header_welcome_text' ) ) :
/**
 * Prints Top Header Welcome Text
*/
function travel_company_get_top_header_welcome_text(){
    return get_theme_mod( 'top_header_welcome_text', __( 'Welcome to Travel Company', 'travel-company' ) );
}
endif;

if( ! function_exists( 'travel_company_get_banner_title' ) ) :
/**
 * Prints Banner Title
*/
function travel_company_get_banner_title(){
    return get_theme_mod( 'travel_company_banner_title_text', __( 'Simply the Best', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_banner_description' ) ) :
/**
 * Prints Banner Description
*/
function travel_company_get_banner_description(){
    return get_theme_mod( 'travel_company_banner_description_text', __( '# 1 Most loved by everyone', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_about_text' ) ) :
/**
 * Prints About Text
*/
function travel_company_get_about_text(){
    return get_theme_mod( 'travel_company_about_text', __( 'About Company', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_popular_destination_title' ) ) :
/**
 * Prints popular destination Title
*/
function travel_company_get_popular_destination_title(){
    return get_theme_mod( 'travel_company_popular_destination_title', __( 'Popular Destinations Offered', 'travel-company' ) );
}
endif;

if( ! function_exists( 'travel_company_get_popular_destination_description' ) ) :
/**
 * Prints popular destination Title
*/
function travel_company_get_popular_destination_description(){
    return get_theme_mod( 'travel_company_popular_destination_description', __( 'World\'s Best Tourist Destinations', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_blog_text' ) ) :
/**
 * Prints News & Blog Text
*/
function travel_company_get_blog_text(){
    return get_theme_mod( 'travel_company_blog_text', __( 'News & Blog', 'travel-company' ) );
}
endif;

if( ! function_exists( 'travel_company_get_blog_title' ) ) :
/**
 * Prints News & Blog Title
*/
function travel_company_get_blog_title(){
    return get_theme_mod( 'travel_company_blog_title', __( 'Latest Updates', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_cta_text' ) ) :
/**
 * Prints Call to action title line text
*/
function travel_company_get_cta_text(){
    return get_theme_mod( 'travel_company_cta_text', __( 'About Company', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_cta_title' ) ) :
/**
 * Prints Call to action title line heading
*/
function travel_company_get_cta_title(){
    return get_theme_mod( 'travel_company_cta_title', __( 'Worthy time spent around the world with traveltrek.', 'travel-company' ) );
}
endif;

if( ! function_exists( 'travel_company_get_cta_button_text' ) ) :
/**
 * Prints Call to action button text
*/
function travel_company_get_cta_button_text(){
    return get_theme_mod( 'travel_company_cta_button_text', __( 'Book your trip', 'travel-company' ) );
}
endif;

if( ! function_exists( 'travel_company_get_p_trips_text' ) ) :
/**
 * Prints Popular trips text
*/
function travel_company_get_p_trips_text(){
    return get_theme_mod( 'travel_company_p_trips_text', __( 'Popular Trips', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_t_destination_text' ) ) :
/**
 * Prints Top Destination Title Line text
*/
function travel_company_get_t_destination_text(){
    return get_theme_mod( 'travel_company_t_destination_text', __( 'World\'s Best Tourist Destinations', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_t_destination_heading' ) ) :
/**
 * Prints Top Destination Heading 
*/
function travel_company_get_t_destination_heading(){
    return get_theme_mod( 'travel_company_t_destination_heading', __( 'Book your Trip', 'travel-company' ) );
}
endif;

if( ! function_exists( 'travel_company_get_t_destination_subheading' ) ) :
/**
 * Prints Top Destination Subheading 
*/
function travel_company_get_t_destination_subheading(){
    return get_theme_mod( 'travel_company_t_destination_subheading', __( 'Top Destination', 'travel-company' ) );
}
endif;


if( ! function_exists( 'travel_company_get_contact_text' ) ) :
/**
 * Prints Contact title line text 
*/
function travel_company_get_contact_text(){
    return get_theme_mod( 'travel_company_contact_text', __( 'Our Information', 'travel-company' ) );
}
endif;

if( ! function_exists( 'travel_company_get_contact_title' ) ) :
/**
 * Prints Contact title line heading 
*/
function travel_company_get_contact_title(){
    return get_theme_mod( 'travel_company_contact_title', __( 'Contact Us', 'travel-company' ) );
}
endif;

 