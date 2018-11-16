<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Theme Setup
*	--------------------------------------------------------------------- 
*/


/* Set content width */
if ( ! isset( $content_width ) ) $content_width = 940;

function mnky_theme_setup() {

	/* Register menu */
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Navigation', 'bitz' ),
		'secondary' => esc_html__( 'Secondary Navigation', 'bitz' ),
		'mobile' => esc_html__( 'Mobile Navigation', 'bitz' )
	) );

	/* Menu fallback */
	function mnky_no_menu(){
		$url = admin_url( 'nav-menus.php');
		echo '<div class="menu-container"><ul class="menu"><li><a href="'. esc_url($url) .'">'.esc_html__( 'Click here to assign menu!', 'bitz' ).'</a></li></ul></div>';
	}   

	/* Thumbnails */
	add_theme_support( 'post-thumbnails' );

	/* Title tag */
	add_theme_support( 'title-tag' );

	/* Post formats */
	add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

	/* Feeds */
	add_theme_support( 'automatic-feed-links' );

	/* HTML5 */
	add_theme_support( 'html5', array( 'gallery', 'caption' ) );

	/* Languages */
	load_theme_textdomain( 'bitz', get_template_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'mnky_theme_setup' );

/* Add import demo page */
function mnky_import_demo_menu() {
	add_theme_page('Import Demo Data', 'Import Demo', 'edit_theme_options', 'import_demo_data', 'mnky_import_demo_data');
}
add_action('admin_menu', 'mnky_import_demo_menu', 11);


if( ! function_exists( 'mnky_import_demo_data' ) ){
	function mnky_import_demo_data() {
		require_once(MNKY_INCLUDE . '/welcome-page.php');
	}	
}	


/* Remove editor from "Ads" post type */
function mnky_edit_ads_post_type() {
	remove_post_type_support( 'ads', 'editor' );
}
add_action( 'init', 'mnky_edit_ads_post_type' );


/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');


/* Add Single post templates */
function mnky_post_template( $template ) {
 	global $post;
	
	if( is_singular('post') ){
		$custom_field = get_post_meta( $post->ID, 'post_template', true );

		if( ! $custom_field ) {
			if( ot_get_option('post_layout') != 'single.php') {
				$custom_field = ot_get_option('post_layout');
			} else {
				return $template;
			}
		} elseif( $custom_field == 'single.php') {
			return $template;
		}
		
		/** Prevent directory traversal */
		$custom_field = str_replace( '..', '', $custom_field );
		if(strlen($custom_field) > 0) {
			if( file_exists( get_stylesheet_directory() . "/{$custom_field}" ) ) {
				$template = get_stylesheet_directory() . "/{$custom_field}";
			} elseif( file_exists( get_template_directory() . "/{$custom_field}" ) ) {
				$template = get_template_directory() . "/{$custom_field}";
			}
		}	
	}
	return $template;
}
add_filter( 'single_template', 'mnky_post_template' );


/* Redirect to "Theme Options/Import Data" after activation */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	wp_redirect( admin_url( 'themes.php?page=import_demo_data' ) );
}


/* Extend editor */
function mnky_more_buttons($buttons) {
  $buttons[] = 'fontsizeselect';
 
  return $buttons;
}
add_filter("mce_buttons_2", "mnky_more_buttons");


/**
 *  Deletes the resized images when the original image is deleted from the Wordpress Media Library.
 *  @author Matthew Ruddy
 */
add_action( 'delete_attachment', 'matthewruddy_delete_resized_images' );
function matthewruddy_delete_resized_images( $post_id ) {
	// Get attachment image metadata
	$metadata = wp_get_attachment_metadata( $post_id );
	if ( !$metadata )
		return;
	
	// Do some bailing if we cannot continue
	if ( !isset( $metadata['file'] ) || !isset( $metadata['image_meta']['resized_images'] ) )
		return;
	$pathinfo = pathinfo( $metadata['file'] );
	$resized_images = $metadata['image_meta']['resized_images'];
	
	// Get Wordpress uploads directory (and bail if it doesn't exist)
	$wp_upload_dir = wp_upload_dir();
	$upload_dir = $wp_upload_dir['basedir'];
	if ( !is_dir( $upload_dir ) )
		return;
	
	// Delete the resized images
	foreach ( $resized_images as $dims ) {
		// Get the resized images filename
		$file = $upload_dir .'/'. $pathinfo['dirname'] .'/'. $pathinfo['filename'] .'-'. $dims .'.'. $pathinfo['extension'];
		// Delete the resized image
		@unlink( $file );
	}
}