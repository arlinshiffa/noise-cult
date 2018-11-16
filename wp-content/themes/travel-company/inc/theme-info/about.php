<?php
/**
 * About configuration
 *
 * @package Travel_Company
 */

$config = array(
	'menu_name' => esc_html__( 'Travel Company Setup', 'travel-company' ),
	'page_name' => esc_html__( 'Travel Company Setup', 'travel-company' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'travel-company' ), 'Travel Company' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'travel-company' ), 'Travel Company' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','travel-company' ),
			'url'  => 'https://scorpionthemes.com/downloads/travel-company-wordpress-theme/',
		),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','travel-company' ),
			'url'  => 'https://demo.scorpionthemes.com/travel-company',
		),
		'documentation_url' => array(
			'text'   => esc_html__( 'Documentation','travel-company' ),
			'url'    => 'http://scorpionthemes.com/wp-content/uploads/2018/08/Travel-Company.pdf',
		),
		'upgrade_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','travel-company' ),
			'url'    => 'https://justwpthemes.com/downloads/travel-company-pro/',
			'button' => 'primary'
		),
	),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'travel-company' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'travel-company' ),
		'support'             => esc_html__( 'Support', 'travel-company' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'travel-company' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'travel-company' ),
			'button_label'        => esc_html__( 'View documentation', 'travel-company' ),
			'button_link'         => '#',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'travel-company' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'travel-company' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'travel-company' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=travel-company-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'travel-company' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'travel-company' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'travel-company' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'travel-company-helper' => array(
				'title'       => esc_html__( 'Travel Company Helper Plugin', 'travel-company' ),
				'description' => esc_html__( 'Please install the Travel Company Helper Plugin Before Importing Demo.', 'travel-company' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'travel-company-helper',
				'id'          => 'travel-company-helper',
			),
			'wp-travel-engine' => array(
				'title'       => esc_html__( 'WP Travel Engine Plugin', 'travel-company' ),
				'description' => esc_html__( 'Please install the WP Travel Engine Plugin Before Importing Demo.', 'travel-company' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'wp-travel-engine',
				'id'          => 'wp-travel-engine',
			),
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','travel-company' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'travel-company' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'travel-company' ) . '</a>',
			),
			'contact-form-7' => array(
				'title'       => esc_html__( 'Contact Form 7', 'travel-company' ),
				'description' => esc_html__( 'Please install the Contact Form 7 plugin Before Importing Demo.', 'travel-company' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'contact-form-7',
				'id'          => 'contact-form-7',
			),
			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'travel-company' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'travel-company' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'travel-company' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'travel-company' ),
			'button_label' => esc_html__( 'Contact Support', 'travel-company' ),
			'button_link'  => esc_url( 'https://scorpionthemes.com/downloads/travel-company-wordpress-theme/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'travel-company' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'travel-company' ),
			'button_label' => esc_html__( 'View Documentation', 'travel-company' ),
			'button_link'  => '#',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'travel-company' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Feel free to contact us any time if you need any customization service.', 'travel-company' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'travel-company' ),
			'button_link'  => '#',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Travel_Company_About::init( apply_filters( 'travel_company_about_filter', $config ) );