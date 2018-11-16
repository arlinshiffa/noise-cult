<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Functions
*	--------------------------------------------------------------------- 
*/

// Define constants
define('MNKY_PATH', get_template_directory());
define('MNKY_URI', get_template_directory_uri());
define('MNKY_INCLUDE', get_template_directory() . '/inc');
define('MNKY_ADMIN', get_template_directory() . '/inc/theme-options');
define('MNKY_ADMIN_EXT', get_template_directory() . '/inc/theme-options-extend');
define('MNKY_PLUGINS', get_template_directory() . '/inc/plugins');


// Theme setup
require_once(MNKY_INCLUDE . '/theme-setup.php');
require_once(MNKY_INCLUDE . '/custom-functions.php');
require_once(MNKY_INCLUDE . '/menu-walker.php');
require_once(MNKY_INCLUDE . '/compiler.php');
require_once(MNKY_INCLUDE . '/sidebars.php');
require_once(MNKY_INCLUDE . '/tgm-plugin-activation.php');
require_once(MNKY_INCLUDE . '/tgm-register-plugins.php');


// WooCommerce
require_once(MNKY_INCLUDE . '/woocommerce/index.php');

// Theme options
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
require(MNKY_ADMIN . '/ot-loader.php');
require(MNKY_ADMIN_EXT . '/theme-options.php' );
require(MNKY_ADMIN_EXT . '/config.php');
require(MNKY_ADMIN_EXT . '/typography.php');
require(MNKY_ADMIN_EXT . '/meta-boxes.php');


/*	
*	---------------------------------------------------------------------
*	MNKY Enqueue scripts & styles
*	--------------------------------------------------------------------- 
*/

add_action('wp_enqueue_scripts', 'mnky_scripts');
function mnky_scripts() {
			
	// Global scripts
	wp_register_script( 'mnky_main-js', MNKY_URI . '/js/init.js', array('jquery'), '', true);
	wp_enqueue_script( 'mnky_main-js' );	
	
	// Sticky menu
	$sticky_header = ot_get_option('sticky_header', 'sticky_header_smart');
	
	if( is_category() || is_single() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['custom_header'] != '' ) {
					$custom_header = $category_style['custom_header'];				
					if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
						$sticky_header = get_post_meta( $custom_header, 'sticky_header', true);
					}
					if( is_single() && $category_style['cs_select'] != '' && in_category( $category_style['cs_select'] )  && $category_style['cs_header_posts'] != 'off' ) {
						$sticky_header = get_post_meta( $custom_header, 'sticky_header', true);
					}
				}	
			}
		}
	}
	
	if( is_page() || is_single() ){
		$custom_header = get_post_meta( get_the_ID(), 'custom_header', true);
		if( $custom_header != '' ) {
			$sticky_header = get_post_meta( $custom_header, 'sticky_header', true);
		}
	}
	
	if ( $sticky_header == 'sticky_header_smart' ){
		wp_register_script( 'mnky_sticky-header-smart-js', MNKY_URI . '/js/sticky-header-smart.js', array('jquery'), '', true);		
		wp_enqueue_script( 'mnky_sticky-header-smart-js' );
	} elseif ( $sticky_header == 'sticky_header' ){
		wp_register_script( 'mnky_sticky-header-js', MNKY_URI . '/js/sticky-header.js', array('jquery'), '', true);
		wp_enqueue_script( 'mnky_sticky-header-js' );
	}
	
	// Woocommerce style
	if (class_exists( 'WooCommerce' )){
		wp_register_style( 'mnky_woocommerce', MNKY_URI . '/inc/woocommerce/woocommerce.css', null, 1.0, 'all' );
		wp_enqueue_style( 'mnky_woocommerce' );
	}

	// Main stylesheet
	wp_register_style( 'mnky_main', get_stylesheet_uri());
	wp_enqueue_style( 'mnky_main' );	
	
	// Theia Sticky Sidebar
	wp_register_script( 'mnky_sticky-sidebar', MNKY_URI . '/js/theia-sticky-sidebar.js', array('jquery'), '', true);
	wp_enqueue_script( 'mnky_sticky-sidebar' );	

	
	// Icons
	wp_register_style( 'mnky_post-icons', MNKY_URI . '/css/post-icons.css', null, 1.0, 'all' );
	wp_enqueue_style( 'mnky_post-icons' );
	
	if ( ! function_exists( 'vc_map' ) ) {
		wp_register_style( 'font-awesome', MNKY_URI . '/css/font-awesome.css', null, 1.0, 'all' );
		wp_enqueue_style( 'font-awesome' );
	} else {
		wp_enqueue_style( 'font-awesome' );
	}
		
	// Threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Default typo
	$body_typo_array = ot_get_option('body_font');
	if ( empty( $body_typo_array['font-family'] ) ) {
		wp_register_style( 'mnky_google-font-lato', 'https://fonts.googleapis.com/css?family=Lato:400,300,700,900', null, null, 'all' );
		wp_enqueue_style( 'mnky_google-font-lato' );
	}
	$menu_typo_array = ot_get_option('menu_font');
	$heading_typo_array = ot_get_option('heading_font');
	if ( empty( $menu_typo_array['font-family'] ) || empty( $heading_typo_array['font-family'] ) ) {
		wp_register_style( 'mnky_google-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900', null, null, 'all' );
		wp_enqueue_style( 'mnky_google-font-roboto' );
	}
	
}

// Enqueue custom styles from back-end
require_once(MNKY_PATH . '/custom-style.php');

// Editor style
function mnky_add_editor_styles() {
   add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'mnky_add_editor_styles' );


// Custom back-end style
add_action( 'admin_enqueue_scripts', 'mnky_admin_scripts' );
function mnky_admin_scripts() {
	wp_register_style( 'mnky_admin_css_extend', MNKY_URI . '/inc/theme-options-extend/assets/theme-options-extend.css', null, '1.0.0' );
	
	wp_enqueue_style( 'mnky_admin_css_extend' );
}