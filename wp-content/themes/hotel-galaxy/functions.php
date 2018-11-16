<?php 

define('Hotel_galaxy_Template_Dir_Uri', get_template_directory_uri());
define('Hotel_galaxy_Dir_Uri', get_template_directory());
define('Hotel_galaxy_Dir_Uri_include',Hotel_galaxy_Dir_Uri.'/include');

/*** slider ***/
add_image_size('home_slider_img',1650,650,true);
add_image_size('home_blog_img',360,270,true);

require( Hotel_galaxy_Dir_Uri_include .'/script-bank/scripts-style.php');
require( Hotel_galaxy_Dir_Uri_include . '/admin/admin.php' );
require( Hotel_galaxy_Dir_Uri_include . '/menu/default_menu_walker.php' );
require( Hotel_galaxy_Dir_Uri_include . '/menu/nav_walker.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/theme-setup-function.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/breadcrumbs.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/sidebar-manage.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/pagination.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/read-more-btn.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/comment-function.php' );
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/full_leftside_template.php');
require( Hotel_galaxy_Dir_Uri_include . '/theme-functions/notice-bord.php');
require( Hotel_galaxy_Dir_Uri_include . '/customizer/theme-customizer.php');

require( Hotel_galaxy_Dir_Uri_include . '/widget/service-widget.php');


new hotel_galaxy_notice_bord();	


if ( ! function_exists( 'hotel_galaxy_posts_nav' ) ) :
	function hotel_galaxy_posts_nav(  ) {
		global $hotel_galaxy_post; 

		?>
		<div class="post-navigation clearfix animate" data-anim-type="zoomIn" data-anim-delay="800">
			<?php 

			the_post_navigation( array(
				'next_text' => '<div class="col-md-6"><div class="next-post">'.__('Next Post','hotel-galaxy').'<i class="fa fa-long-arrow-right"></i><h5>%title</h5></div>',
				'prev_text' => '<div class="col-md-6"><div class="prev-post">'.__('Previous Post','hotel-galaxy').'<i class="fa fa-long-arrow-left"></i><h5>%title</h5></div>',
				) );
				?>
			</div>
			<?php	
		}
		endif;


		if(! function_exists('hotel_galaxy_gravatar_class')) :
			add_filter('get_avatar','hotel_galaxy_gravatar_class');
		function hotel_galaxy_gravatar_class($class) {
			$class = str_replace("class='avatar", "class='", $class);
			return $class;
		}
		add_filter('get_avatar','hotel_galaxy_gravatar_class');
		endif;



		if ( ! function_exists( 'hotel_galaxy_fonts_url' ) ) :

	/**
	 * Register Google fonts.
	 *
	 * @since 1.0.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
function hotel_galaxy_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'hotel-galaxy' ) ) {
		$fonts[] = 'Open Sans:400,700,900,400italic,700italic,900italic';
	}
	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'hotel-galaxy' ) ) {
		$fonts[] = 'Roboto:400,500,700,900,400italic,700italic,900italic';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

endif;	

?>