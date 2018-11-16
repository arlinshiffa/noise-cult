<?php
/**
 * Hotel Pagoda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hotel_Pagoda
 */

if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

if ( ! function_exists( 'hotel_pagoda_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hotel_pagoda_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Hotel Pagoda, use a find and replace
		 * to change 'hotel-pagoda-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hotel-pagoda-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'hotel-pagoda-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hotel_pagoda_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'hotel_pagoda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hotel_pagoda_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hotel_pagoda_content_width', 640 );
}
add_action( 'after_setup_theme', 'hotel_pagoda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hotel_pagoda_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Hotel Pagoda Sidebar', 'hotel-pagoda-lite' ),
		'id'            => 'hotel_pagoda_main_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'hotel-pagoda-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Hotel Booking Sidebar', 'hotel-pagoda-lite' ),
        'id'            => 'hotel_pagoda_booking_sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'hotel-pagoda-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name' => esc_html__('Footer Widget', 'hotel-pagoda-lite') . $i,
            'id' => 'hotel_pagoda_footer_' . $i,
            'description' => esc_html__('Shows widgets at Footer Widget ', 'hotel-pagoda-lite') . $i,
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
    }
}
add_action( 'widgets_init', 'hotel_pagoda_widgets_init' );


if (!function_exists('hotel_pagoda_get_theme_options')):
    function hotel_pagoda_get_theme_options()
    {
        return wp_parse_args(get_option('hotel_pagoda_theme_options', array()), hotel_pagoda_theme_options());
    }
endif;
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/template-parts/header/hotel-pagoda-menu.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/lib/hotel-pagoda-enqueue.php';

require get_template_directory() . '/lib/hotel-pagoda-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/functions/customizer.php';
require get_template_directory() . '/inc/theme-option-settings.php';
require get_template_directory() . '/inc/customizer/functions/custom-sanitization.php';
require get_template_directory() . '/inc/customizer/functions/customizer-control.php';
require get_template_directory() . '/inc/customizer/functions/class-hotel-pagoda-discount.php';
require get_template_directory() . '/inc/customizer/hotel-pagoda-color-picker/hotel-pagoda-color-picker.php';
require get_template_directory() . '/lib/hotel-pagoda-tgmp.php';

if (!function_exists('hotel_pagoda_lite_add_editor_styles')) {
    // Add editor styles
    function hotel_pagoda_lite_add_editor_styles()
    {
        add_editor_style(get_template_directory() . '/inc/customizer/css/admin/editor-styles.min.css');
    }

    add_action('init', 'hotel_pagoda_lite_add_editor_styles');
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (!function_exists('hotel_pagoda_shortcode_atts_gallery')) {

    function hotel_pagoda_shortcode_atts_gallery($out)
    {
        remove_filter(current_filter(), __FUNCTION__);
        $out['size'] = 'full';
        return $out;
    }
}