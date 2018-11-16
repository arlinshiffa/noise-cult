<?php
/**
 * Demo configuration
 *
 * @package Travel_Company
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'menu-1' 		=> 'menu',
		'footer-1'	=>'footer-1',
		'footer-2'	=>'footer-2'
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Travel Company Demo', 'travel-company' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo/widgets.wie',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'travel-company' ),
      		'preview_url'                  => 'https://demo.scorpionthemes.com/travel-company/',
		),
		
	),
);

Travel_Company_Demo::init( apply_filters( 'travel_company_demo_filter', $config ) );