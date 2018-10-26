<?php
/**
 * Posts Switcher
 *
 * @package Jannah
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



if( ! class_exists( 'TIE_POSTS_SWITCHER' )){

	class TIE_POSTS_SWITCHER{


		public $menu_slug = 'tie-posts-switcher';
		public static $switcher_themes;



		/**
		 * __construct
		 *
		 * Class constructor where we will call our filter and action hooks.
		 */
		function __construct(){

			# Check if the current user role ----------
			if( ! current_user_can( 'switch_themes' ) ){
				return;
			}

			# Disbable the switcher if the Disable option is on ----------
			if( jannah_get_option( 'disable_switcher' ) ){
				return;
			}

			# Filters ----------
			add_filter( 'jannah_panel_submenus', array( $this, '_add_options_menu' ), 400 );
			add_filter( 'jannah_about_tabs',     array( $this, '_add_about_tabs' )  , 30 );
			add_filter( 'admin_notices',         array( $this, '_switcher_notices' ), 30 );


			# Themes Supported by the Switcher -----------
			self::$switcher_themes = array( 'braxton', 'click-mag', 'flex-mag', 'goodlife-wp', 'goodnews5', 'hottopix', 'maxmag', 'multinews', 'Newsmag', 'Newspaper', 'publisher', 'simplemag', 'thevoux-wp', 'topnews', 'valenti' );
		}



		/**
		 * _add_about_tabs
		 *
		 * Add the Switcher Page to the about page's tabs
		 */
		function _add_about_tabs( $tabs ){

			$tabs['switcher'] = array(
				'text' => esc_html__( 'Posts Switcher', 'jannah' ),
				'url'  => menu_page_url( $this->menu_slug, false ),
			);

			return $tabs;
		}



		/**
		 * _add_options_menu
		 *
		 */
		function _add_options_menu( $menus ){

			$menus[] = array(
				'page_title' => esc_html__( 'Posts Switcher', 'jannah' ),
				'menu_title' => esc_html__( 'Posts Switcher', 'jannah' ),
				'menu_slug'  => $this->menu_slug,
				'function'   => array( $this, '_page_content' ),
			);

			return $menus;
		}



		/**
		 * _detect_themes
		 *
		 */
		static function _detect_themes( $single = true ){

			global $wpdb;

			# Get the slug of all themes installed before -------------------------------
			$query  = 'SELECT option_name FROM ' . $wpdb->options . ' WHERE option_name LIKE "theme_mods_%"';
			$themes = $wpdb->get_results( $query );

			if( ! empty( $themes ) && is_array( $themes ) ){

				$previous_themes = array();
				foreach( $themes as $key => $value ){

					if( ! empty( $value->option_name ) ){
						$previous_themes[] = str_replace( 'theme_mods_', '', $value->option_name );
					}
				}
			}

			# Let's do some check ----------
			if( ! empty( $previous_themes ) && is_array( $previous_themes ) ){

				$all_previous_themes = array();

				# Check for TieLabs Themes First ----------
				if( in_array( 'sahifa', $previous_themes ) || in_array( 'jarida', $previous_themes ) || get_option( 'tie_options' ) ){

					# YAY this is a Loyal Customer ;) ----------
					if( in_array( 'jarida', $previous_themes ) ){
						$detected_theme = 'Jarida';

						$all_previous_themes[] = $detected_theme;
					}
					else{
						$detected_theme = 'Sahifa';
						$all_previous_themes[] = $detected_theme;
					}
				}

				# Check if the site used one of our Switcher suported themes ----------
				if( empty( $detected_theme ) ){
					foreach ( $previous_themes as $theme ){

						if( in_array( $theme, self::$switcher_themes ) ){

							$detected_theme = $theme;
							$detected_theme = str_replace( array( '5', '-wp' ), '', $detected_theme );

							if( $single ){
								break;
							}
							else{
								$all_previous_themes[] = $detected_theme;
							}
						}
					}
				}

				if( ! empty( $detected_theme ) ){

					if( $single ){
						return $detected_theme;
					}

					# Return the Full Array ----------
					return $all_previous_themes;
				}

				return false;
			}
		}



		/**
		 * _switcher_notices
		 *
		 */
		function _switcher_notices(){

			$notice_id = 'jannah_switcher_notice';

			if ( jannah_notice_is_dismissed( $notice_id ) ){
				return false;
			}


			#Get the theme name ----------
			$detected_theme = self::_detect_themes();

			# We just found the old theme ----------
			if( ! empty( $detected_theme ) ){
				$is_on = true;
				$title = sprintf( esc_html__( 'Are You Megrating from %s?', 'jannah' ), $detected_theme );
				$image = WP_PLUGIN_URL . '/jannah-switcher/assets/images/'. strtolower( $detected_theme ) .'.png';
				$mssge = sprintf( esc_html__( 'It seems you are megrating from %1s%2s%3s theme, click on the button below to complete the switching process.', 'jannah' ), '<strong>', $detected_theme, '</strong>' );
			}
			elseif( get_option('jannah_published_posts') > 30 ){
				$is_on = true;
				$title = esc_html__( 'Are You Megrating from another theme?', 'jannah' );
				$image = false;
				$mssge = sprintf( esc_html__( 'It seems you are megrating from another theme, it is recommended to check our Switcher it supports %1s%2s%3s themes, click on the button below to check them.', 'jannah' ), '<strong>', count( self::$switcher_themes ) + 2, '</strong>' );
			}

			if( ! empty( $is_on ) ){
				jannah_admin_notice_message( array(
					'notice_id'   => $notice_id,
					'title'       => $title,
					'message'     => '<p>'. $mssge .'</p>',
					'dismissible' => true,
					'standard'    => true,
					'class'       => 'warning',
					'img'         => class_exists( 'JANNAH_SWITCHER_CLASS' ) ? $image : false,
					'button_text' => esc_html__( 'Run the Switcher', 'jannah' ),
					'button_url'  => menu_page_url( 'tie-posts-switcher', false ),
					'button_class'=> 'green',
				));
			}
		}



		/**
		 * _out
		 *
		 */
		function _page_content() {

			echo '<div class="wrap about-wrap tie-about-wrap">';

			TIE_WELCOME_PAGE::_head_section( 'switcher' );
			?>

				<h2><?php _e( 'Switch to Jannah Theme', 'jannah' ); ?></h2>

			<?php

				# is the theme activated ----------
				if( ! get_option( 'tie_token_'.JANNAH_THEME_ENVATO_ID ) ){
					jannah_notice_not_authorize_theme( false );
				}

				# Is the Switcher plugin active ----------
				elseif( ! class_exists( 'JANNAH_SWITCHER_CLASS' ) ){

					jannah_admin_notice_message( array(
						'notice_id'   => 'switcher_is_requried',
						'title'       => esc_html__( 'Jannah Switcher Plugin is required', 'jannah' ),
						'message'     => '<p>'. esc_html__( 'Jannah Switcher Plugin is required, click on the button below to go to the plugins page to install it.', 'jannah' ) .'</p>',
						'dismissible' => false,
						'standard'    => false,
						'class'       => 'error',
						'button_text' => esc_html__( 'Go to the Plugins Page', 'jannah' ),
						'button_url'  => menu_page_url( 'tie-install-plugins', false ),
					));
				}


				else{

					do_action( 'jannah_switcher_content' );
				}

			echo '</div>';
		}

	}



	new TIE_POSTS_SWITCHER();
}
