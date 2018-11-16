<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Register sidebars
*	--------------------------------------------------------------------- 
*/

function mnky_sidebars() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog/Post Sidebar', 'bitz' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Appears on blog layout and posts', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Page Sidebar', 'bitz' ),
		'id' => 'default-sidebar',
		'description' => esc_html__( 'Appears as default sidebar on pages', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Single Post Header Sidebar', 'bitz' ),
		'id' => 'post-header-sidebar',
		'description' => esc_html__( 'Appears in single post header', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Top', 'bitz' ),
		'id' => 'post-content-top-sidebar',
		'description' => esc_html__( 'Appears before single post content', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Bottom', 'bitz' ),
		'id' => 'post-content-bottom-sidebar',
		'description' => esc_html__( 'Appears after single post content', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'After Single Post Sidebar', 'bitz' ),
		'id' => 'after-single-post-sidebar',
		'description' => esc_html__( 'Appears after single post', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Before Single Post Sidebar', 'bitz' ),
		'id' => 'before-single-post-sidebar',
		'description' => esc_html__( 'Appears above single post content and sidebar with default header style', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Sidebar', 'bitz' ),
		'id' => 'header-sidebar',
		'description' => esc_html__( 'Appears in top right of the header area', 'bitz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Menu Sidebar', 'bitz' ),
		'id' => 'menu-sidebar',
		'description' => esc_html__( 'Appears on the right side of the menu bar', 'bitz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Secondary Menu Sidebar', 'bitz' ),
		'id' => 'secondary-menu-sidebar',
		'description' => esc_html__( 'Appears in secondary overlay menu', 'bitz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Left', 'bitz' ),
		'id' => 'top-left-widget-area',
		'description' => esc_html__( 'Top bar widget area (align left)', 'bitz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
		
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Right', 'bitz' ),
		'id' => 'top-right-widget-area',
		'description' => esc_html__( 'Top bar widget area (align right)', 'bitz' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 1', 'bitz' ),
		'id' => 'footer-widget-area-1',
		'description' => esc_html__( 'Appears in the footer section', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 2', 'bitz' ),
		'id' => 'footer-widget-area-2',
		'description' => esc_html__( 'Appears in the footer section', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 3', 'bitz' ),
		'id' => 'footer-widget-area-3',
		'description' => esc_html__( 'Appears in the footer section', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 4', 'bitz' ),
		'id' => 'footer-widget-area-4',
		'description' => esc_html__( 'Appears in the footer section', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Copyright Area', 'bitz' ),
		'id' => 'copyright-widget-area',
		'description' => esc_html__( 'Appears in the footer section', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'WooCommerce Page Sidebar', 'bitz' ),
		'id' => 'shop-widget-area',
		'description' => esc_html__( 'Product page widget area', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Mobile Menu Sidebar', 'bitz' ),
		'id' => 'mobile-menu-widget-area',
		'description' => esc_html__( 'Mobile menu widget area', 'bitz' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

}

add_action( 'widgets_init', 'mnky_sidebars' );