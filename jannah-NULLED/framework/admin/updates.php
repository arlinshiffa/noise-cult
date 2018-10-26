<?php
/**
 * Database updates
 *
 * @package Jannah
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


if( $current_version = get_option( 'tie_jannah_ver' ) ){
	if( version_compare( $current_version, JANNAH_DB_VERSION, '<' ) ){


		# ChangeLog ----------
		$changelog = '';

		# Update the DB version number ----------
	  update_option( 'tie_jannah_ver', JANNAH_DB_VERSION );

	  # Use thic action to run functions after updating the theme version ----------
	  do_action( 'jannah_after_db_update' );





	  # Custom Versions updates ------------------------------------------ */
	  $updated_options = $original_options = get_option( 'tie_jannah_options' );







	  /*
	   * Update to version 1.0.3
	   *
	   * New Option for the AMP
	   */
	  if( version_compare( $current_version, '1.0.3', '<' ) ){

			$updated_options['amp_active'] = 'true';
		}


		/*
	   * Update to version 1.1.0
	   *
	   * Store the total puplished posts number
	   */
	  if( version_compare( $current_version, '1.1.0', '<' ) ){

	  	# Store the posts number needed for th switcher -----------
	  	$count_posts     = wp_count_posts();
			$published_posts = ! empty( $count_posts->publish ) ? $count_posts->publish : 0;
			update_option( 'jannah_published_posts', $published_posts, false );

			# Delete the stored cache to re-update it needed for the switcher ----------
			delete_transient( 'tie-data-'.JANNAH_THEME_FOLDER );

			# Chnagelog ----------
			$changelog .= '
				NEW: Introducing our Jannah Switcher Plugin now you can migrating your posts from 17 themes to Jannah.
				NEW: Option to set a custom RSS feed URL.
				NEW: Option to embed Audio code.
				NEW: Unlimited Source and Via options.
				NEW: Facebook Videos support.
				NEW: Twitter Videos support.
				NEW: Option to set the page as a front page directly from the edit page.
			';
		}







		# Update if the Changelog has items ------------------------------ */
		if( ! empty( $changelog ) ){

			# Store the new data ----------
			update_option( 'jannah_chnagelog', trim( $changelog ), false );

			# Remove the pointer from the dismissed array ----------
			$dismissed = array_filter( explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) ) );
			$pointer   = 'tie_jannah_new_updates';

			if ( in_array( $pointer, $dismissed ) ){
				unset( $dismissed[ array_search( $pointer, $dismissed )] );
			}
			$dismissed = implode( ',', $dismissed );

			update_user_meta( get_current_user_id(), 'dismissed_wp_pointers', $dismissed );
		}



		# Update the New options if it changed ------------------------------ */
		if( $updated_options != $original_options ){

			update_option( 'tie_jannah_options', $updated_options );
		}



	}
}
