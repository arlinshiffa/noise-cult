<?php

add_action( 'wp_enqueue_scripts', 'jannah_child_scripts', 80 );
function jannah_child_scripts() {

	/* THIS WILL ALLOW ADDING CUSTOM CSS TO THE style.css */
	wp_enqueue_style( 'jannah-child-css', get_stylesheet_directory_uri().'/style.css', '' );

	/* Uncomment this line if you want to add custom javascript */
	//wp_enqueue_script( 'jannah-child-js', get_stylesheet_directory_uri() .'/js/scripts.js', '', false, true );
}

