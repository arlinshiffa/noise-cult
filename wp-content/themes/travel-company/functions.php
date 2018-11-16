<?php
/**
 * Travel Trek functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travel_Company
 */

if ( ! function_exists( 'travel_company_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travel_company_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Travel Trek, use a find and replace
		 * to change 'travel-company' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travel-company', get_template_directory() . '/languages' );

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
		add_image_size( 'travel-company-about-thumb-500x680', 500, 680, true );
		add_image_size( 'travel-company-p-destination-fl-thumb-571x235', 571, 235, true );
		add_image_size( 'travel-company-p-destination-stsl-thumb-270x235', 270, 235, true );
		add_image_size( 'travel-company-trips-bg-2000x1000', 344, 230, true );
		add_image_size( 'travel-company-general-344x230', 344, 230, true );
		add_image_size( 'travel-company-testimonials-560x400', 960, 510, true );
		add_image_size( 'travel-company-service-960x510', 960, 510, true );
		add_image_size( 'travel-company-blogs-850x550', 850, 550, true );
		add_image_size( 'travel-company-clients-220x60', 220, 60, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'travel-company' ),
			'footer-1' => esc_html__( 'Footer one(Company)', 'travel-company' ),
			'footer-2' => esc_html__( 'Footer two(Reservation)', 'travel-company' )
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
		add_theme_support( 'custom-background', apply_filters( 'travel_company_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'travel_company_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_company_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'travel_company_content_width', 640 );
}
add_action( 'after_setup_theme', 'travel_company_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_company_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travel-company' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'travel-company' ),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'travel-company' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'travel-company' ),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'travel-company' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'travel-company' ),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'travel-company' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'travel-company' ),
		'before_widget' => '<div id="%1$s" class="single-widget gallery %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'travel-company' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'travel-company' ),
		'before_widget' => '<div id="%1$s" class="single-widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Google map iframe', 'travel-company' ),
		'id'            => 'google-map',
		'description'   => __( 'Add widgets here.', 'travel-company' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travel_company_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 *  Partials for Selective Refresh Customizer
 */
require get_template_directory() . '/inc/customizer/customizer-partials-function.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
* Bootstrap Navwalker
*/
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';


/**
 * Breadcrumbs Trail
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Check if Wp Travel Engine Plugin is installed
*/
function travel_company_is_wpte_activated(){
    return class_exists( 'Wp_Travel_Engine' ) ? true : false;
}


if( ! function_exists( 'travel_company_get_trip_currency' ) ) :
/**
 * Get currency for WP Travel Engine Trip
*/
function travel_company_get_trip_currency(){
    $currency = '';
    if( travel_company_is_wpte_activated() ){
        $wpte_setting = get_option( 'wp_travel_engine_settings', true ); 
        $code = 'USD';
        if( isset( $wpte_setting['currency_code'] ) && $wpte_setting['currency_code']!= '' ){
            $code = $wpte_setting['currency_code'];
        } 
        $obj = new Wp_Travel_Engine_Functions();
        $currency = $obj->wp_travel_engine_currencies_symbol( $code );
    }
    return $currency;
}
endif;

if ( is_admin() ) {
	// Load about.
	
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';

	// Load demo.
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/class-demo.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/demo.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
