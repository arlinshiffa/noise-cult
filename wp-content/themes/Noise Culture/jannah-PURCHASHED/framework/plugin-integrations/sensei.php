<?php
/**
 * Wootheme Sensei Plugin
 *
 * @package Jannah
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



/*-----------------------------------------------------------------------------------*/
# Unhook the default Sensei wrappers
/*-----------------------------------------------------------------------------------*/
if( JANNAH_SENSEI_IS_ACTIVE ){

	global $woothemes_sensei;
	remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ),     10 );
	remove_action( 'sensei_after_main_content',  array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );
}


/*-----------------------------------------------------------------------------------*/
# Hook our wrappers
/*-----------------------------------------------------------------------------------*/
add_action('sensei_before_main_content', 'jannah_sensei_wrapper_start', 10);
add_action('sensei_after_main_content',  'jannah_sensei_wrapper_end',   10);

function jannah_sensei_wrapper_start() {
	echo '
		<div '. jannah_content_column_attr( false ) .'>
			<div class="container-wrapper">
	';
}

function jannah_sensei_wrapper_end() {
	echo '
			</div>
		</div>
	';

	get_sidebar();
}
