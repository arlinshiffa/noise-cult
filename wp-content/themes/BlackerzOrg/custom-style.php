<?php
function mnky_custom_css() {
	
/*	
*	---------------------------------------------------------------------
*	General
*	--------------------------------------------------------------------- 
*/
	
	$custom_css = '';
	
	// Define theme accent color
	$accent_color = ot_get_option('accent_color', '#e74c3c');
	
	// If different category custom color
	if( is_category() || is_single() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
					if( $category_style['cs_color'] != '' ){
						$accent_color = $category_style['cs_color'];
					}
				}			
				if( is_single() && $category_style['cs_select'] != '' && in_category( $category_style['cs_select'] ) ){
					if( $category_style['cs_color_posts'] != 'off' && $category_style['cs_color'] != '' ){
						$accent_color = $category_style['cs_color'];
					}
				}
			}
		}
	}
 
	// If different post/page custom color 
	if( is_page() || is_single() ){
		if( get_post_meta( get_the_ID(), 'custom_accent_color', true) ){
			$accent_color = get_post_meta( get_the_ID(), 'custom_accent_color', true);
		}
	}	  
	
	
	// Check if custom header selected
	$custom_header = '';
		
	if( is_category() || is_single() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['custom_header'] != '' ) {
					if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
						$custom_header = $category_style['custom_header'];
					}
						
					if( is_single() && $category_style['cs_select'] != '' && in_category( $category_style['cs_select'] )  && $category_style['cs_header_posts'] != 'off' ) {
						$custom_header = $category_style['custom_header'];
					}
				}
			}
		}
	}
		
	if( is_page() || is_single() ){
		if( get_post_meta( get_the_ID(), 'custom_header', true) != '' ) {
			$custom_header = get_post_meta( get_the_ID(), 'custom_header', true);	
		}	
	}	
	
	
	// Accent color (background-color)
	$custom_css .= '
		input[type=\'submit\'], button, #wp-calendar #today, .pricing-box .plan-badge, .scrollToTop, .mm-header, .widget-area .widget .tagcloud a:hover, .page-links span, .page-links a:hover span, .pagination span.current, .pagination a:hover, blockquote.box-left, blockquote.box-right, blockquote.callout, #navigation-wrapper, #navigation-container, #navigation-inner, .article-labels span, .rating-bar-value, #site-navigation ul li.megamenu ul li.menu-label a, #mobile-site-navigation .mobile-menu-header{background-color:'. esc_attr ($accent_color) .';}
	';
	
	$custom_css .= '::selection{background-color:'. esc_attr ($accent_color) .';}::-moz-selection{background-color:'. esc_attr ($accent_color) .';}';
	$custom_css .= '#secondary-navigation-wrapper{background-color:rgba('. mnky_hex2rgb( esc_attr ($accent_color) ) .',0.98);}';
	$custom_css .= '.header-search .searchform-wrapper {background-color:rgba('. mnky_hex2rgb( esc_attr ($accent_color) ) .',0.9);}';
	
	// Accent color (color)
	$custom_css .= '
		.themecolor_txt, a, a:hover, span.required,  blockquote.center p, #comments .comment-reply-link:hover,#comments .comment-meta a:hover, .vc_toggle_default .vc_toggle_title .vc_toggle_icon:after, .entry-header .entry-meta a:hover, #comments p.comment-notes:before, p.logged-in-as:before, p.must-log-in:before, .sticky .post-preview:after, .separator_w_icon i, .format-chat p:nth-child(odd):before,.author .author-info a, #comments .comment-navigation a:hover, .pagination a.next:hover, .pagination a.prev:hover, .footer-sidebar a:hover, .footer-sidebar .widget_nav_menu ul li.current-menu-item a:hover, .team_member_position, .heading_wrapper .heading_subtitle:after, .testimonials-slider .flex-control-paging li a.flex-active:after, .wpb_tour .wpb_tabs_nav li.ui-tabs-active a, .wpb_tour .wpb_tabs_nav li a:hover, .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a:hover, .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active a, #site-navigation .mnky-menu-posts .menu-post-container a:hover h6, .mnky-related-posts .related-post-container a:hover h6, .mnky-posts .mp-title a:hover, .mp-author a:hover, .entry-meta-blog .meta-author:hover, .archive-layout .entry-category a:hover, .mp-category a:hover, .rating_aspect_value .rating-value, .rating_summary_value, #mobile-site-navigation ul > li > a:hover, .woocommerce-MyAccount-navigation ul li.is-active a {color:'. esc_attr ($accent_color) .';}		
	';


	// Accent color (border-color)
	$custom_css .= '
		input[type=\'submit\'], #comments .comment-reply-link:hover, input:focus,textarea:focus, blockquote.border p, blockquote.bold:after, .rating-bar-value:after, .woocommerce-MyAccount-navigation ul li.is-active {border-color:'. esc_attr ($accent_color) .';} 
	';
	
	
	// Accent color (misc)
	
	
	// Accent color WooCommerce
	if (class_exists( 'WooCommerce' )){
		$custom_css .= '
			.woocommerce div.product span.price,.woocommerce div.product p.price,.woocommerce #content div.product span.price,.woocommerce #content div.product p.price,.woocommerce-page div.product span.price,.woocommerce-page div.product p.price,.woocommerce-page #content div.product span.price,.woocommerce-page #content div.product p.price, .woocommerce ul.products li.product .price,.woocommerce-page ul.products li.product .price, #site-utility .header_cart_widget .woocommerce a:hover, a:hover, .woocommerce ul li.product-category:hover h3,.woocommerce ul li.product-category:hover h3 mark {color:'. esc_attr ($accent_color) .';}		
		';
		
		$custom_css .= '
			.woocommerce a.button, .woocommerce .page-sidebar a.button, .woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,.woocommerce-page #respond input#submit,.woocommerce-page #content input.button, .woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce #content input.button.alt,.woocommerce-page a.button.alt,.woocommerce-page button.button.alt,.woocommerce-page input.button.alt,.woocommerce-page #respond input#submit.alt,.woocommerce-page #content input.button.alt, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce a.added_to_cart,.woocommerce-page a.added_to_cart, .woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a {background-color:'. esc_attr ($accent_color) .';}		
		';
				
		$custom_css .= '
			.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce #content nav.woocommerce-pagination ul li span.current,.woocommerce #content nav.woocommerce-pagination ul li a:hover,.woocommerce #content nav.woocommerce-pagination ul li a:focus,.woocommerce-page nav.woocommerce-pagination ul li span.current,.woocommerce-page nav.woocommerce-pagination ul li a:hover,.woocommerce-page nav.woocommerce-pagination ul li a:focus,.woocommerce-page #content nav.woocommerce-pagination ul li span.current,.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,.woocommerce-page #content nav.woocommerce-pagination ul li a:focus {background-color:'. esc_attr ($accent_color) .';}		
		';
		
		$custom_css .= '
			.woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a
			{border-color:'. esc_attr ($accent_color) .';}		
		';
		
		(ot_get_option('submenu_link_color') != '') ? $custom_css .= '#site-utility .header_cart_widget .woocommerce a {color:'. ot_get_option('submenu_link_color') .'}' : '';
		
		(ot_get_option('headings_color') != '') ? $custom_css .= '#site-utility .header_cart_widget .woocommerce .total {color:'. ot_get_option('headings_color') .'}' : '';
		
		(ot_get_option('theme_button_color') != '') ? $custom_css .= '.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,.woocommerce-page #respond input#submit,.woocommerce-page #content input.button, .woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce #content input.button.alt,.woocommerce-page a.button.alt,.woocommerce-page button.button.alt,.woocommerce-page input.button.alt,.woocommerce-page #respond input#submit.alt,.woocommerce-page #content input.button.alt {background-color:'. ot_get_option('theme_button_color') .'}' : '';
		(ot_get_option('theme_button_hover_color') != '') ? $custom_css .= '.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit:hover,.woocommerce #content input.button:hover,.woocommerce-page a.button:hover,.woocommerce-page button.button:hover,.woocommerce-page input.button:hover,.woocommerce-page #respond input#submit:hover,.woocommerce-page #content input.button:hover, .woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce #content input.button.alt:hover,.woocommerce-page a.button.alt:hover,.woocommerce-page button.button.alt:hover,.woocommerce-page input.button.alt:hover,.woocommerce-page #respond input#submit.alt:hover,.woocommerce-page #content input.button.alt:hover {background-color:'. ot_get_option('theme_button_hover_color') .'}' : '';
		(ot_get_option('button_text_color') != '') ? $custom_css .= '.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit,.woocommerce #content input.button,.woocommerce-page a.button,.woocommerce-page button.button,.woocommerce-page input.button,.woocommerce-page #respond input#submit,.woocommerce-page #content input.button, .woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce #content input.button.alt,.woocommerce-page a.button.alt,.woocommerce-page button.button.alt,.woocommerce-page input.button.alt,.woocommerce-page #respond input#submit.alt,.woocommerce-page #content input.button.alt {color:'. ot_get_option('button_text_color') .'}' : '';
		
	}

	// Layout & Content width	
	$content_width = ot_get_option('content_width', '1200');
	$layout_style = ot_get_option('layout_style');
	
		// If custom content width or layout
		if( is_page() || is_single() ){
			if( get_post_meta( get_the_ID(), 'content_width', true) ){
				$content_width = get_post_meta( get_the_ID(), 'content_width', true);
			}			
			
			if( get_post_meta( get_the_ID(), 'custom_layout_style', true) ){
				$layout_style = get_post_meta( get_the_ID(), 'custom_layout_style', true);
			}
		}	  
	
	$custom_css .= '#main, #site-header #header-container, #top-bar, #mobile-site-header, #container, .inner, li.megamenu-tabs .submenu-content, #navigation-inner, .page-header h1, .page-header p, .header-search .search-input, #wrapper .author {max-width:'. esc_attr($content_width)  .'px; }';	
	
	$custom_css .= '#site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:'. esc_attr($content_width) .'px; left: calc(50% - '. esc_attr($content_width/2) .'px);}';

	if ( $content_width == '1400') {
		$custom_css .= '@media only screen and (max-width : 1400px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; left:0px;} }';
	}
	if ( $content_width == '1200') {
		$custom_css .= '@media only screen and (max-width : 1200px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; left:0px;} }';
	}
	if ( $content_width == '1100') {
		$custom_css .= '@media only screen and (max-width : 1100px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; left:0px;} }';
	}
	if ( $content_width == '940') {
		$custom_css .= '@media only screen and (max-width : 940px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; left:0px;} }';
	}
	
	if ( is_rtl() ) {
		
		$custom_css .= '#site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:'. esc_attr($content_width) .'px; right: calc(50% - '. esc_attr($content_width/2) .'px);}';

		if ( $content_width == '1400') {
			$custom_css .= '@media only screen and (max-width : 1400px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; right:0px;} }';
		}
		if ( $content_width == '1200') {
			$custom_css .= '@media only screen and (max-width : 1200px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; right:0px;} }';
		}
		if ( $content_width == '1100') {
			$custom_css .= '@media only screen and (max-width : 1100px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; right:0px;} }';
		}
		if ( $content_width == '940') {
			$custom_css .= '@media only screen and (max-width : 940px){ #site-navigation ul li.megamenu > ul, #site-navigation ul li.megamenu-tabs > ul.sub-menu {width:100%; right:0px;} }';
		}

	}
	

	if( $layout_style == 'boxed' ){
		$content_width = $content_width + 60;	
		$custom_css .= '#wrapper{max-width:'. esc_attr($content_width) .'px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);}';
		$custom_css .= '#header-wrapper, #navigation-container{max-width:'. esc_attr($content_width) .'px;}';
	}
	
			
		
/*	
*	-------------------------------------------------------------------------------------------------
*	Header
*	-------------------------------------------------------------------------------------------------
*/

	// Header style
	(ot_get_option('header_bg') != '') ? $custom_css .= '#site-header{background-color:'. ot_get_option('header_bg', '#1f1f1f') .';}' : '';	
	(ot_get_option('header_padding_top') != '') ? $custom_css .= '#header-container{padding-top:'. ot_get_option('header_padding_top') .';}' : '';	
	(ot_get_option('header_padding_bottom') != '') ? $custom_css .= '#header-container{padding-bottom:'. ot_get_option('header_padding_bottom') .';}' : '';	
	
		
	// Top bar style
	(ot_get_option('top_bar_bg') != '') ? $custom_css .= '#top-bar-wrapper{background:'. ot_get_option('top_bar_bg') .'}' : '';
	(ot_get_option('top_bar_text_color') != '') ? $custom_css .= '#top-bar-wrapper, #top-bar-wrapper a, #top-bar ul li ul li a:after{color:'. ot_get_option('top_bar_text_color') .'}' : '';
	(ot_get_option('top_bar_link_hover') != '') ? $custom_css .= '#top-bar-wrapper a:hover{color:'. ot_get_option('top_bar_link_hover') .'}' : '';
	
	// Menu style
	(ot_get_option('menu_height') != '') ? $custom_css .= '#navigation-wrapper, #navigation-container, #navigation-inner, #menu-sidebar{height:'. ot_get_option('menu_height') .';}' : '';
	(ot_get_option('menu_height') != '') ? $custom_css .= '#site-navigation ul li a, #site-utility .search_button, #menu-sidebar .widget-container, .secondary-menu-toggle, .secondary-menu-toggle i, #site-utility .header_cart_link{line-height:'. ot_get_option('menu_height') .';}' : '';
	(ot_get_option('menu_height') != '') ? $custom_css .= '.header-style-2 #site-logo img, .header-style-6 #site-logo img{max-height:'. ot_get_option('menu_height') .';}' : '';
	
	(ot_get_option('menu_color') != '') ? $custom_css .= '#navigation-wrapper, #navigation-container, #navigation-inner{background-color:'. ot_get_option('menu_color') .';}' : '';
	(ot_get_option('menu_color') != '') ? $custom_css .= '#secondary-navigation-wrapper{background-color:rgba('. mnky_hex2rgb( ot_get_option('menu_color') ) .',0.98);}' : '';
	(ot_get_option('menu_color') != '') ? $custom_css .= '.header-search .searchform-wrapper {background-color:rgba('. mnky_hex2rgb( ot_get_option('menu_color') ) .',0.9);}' : '';
	
	
	(ot_get_option('menu_font_size') != '11px') ? $custom_css .= '#site-navigation ul li a {font-size:'. ot_get_option('menu_font_size') .'}' : '';
	(ot_get_option('default_menu_link') != '') ? $custom_css .= '#site-navigation ul li a, #site-utility .search_button, #site-navigation .header_cart_button, .toggle-mobile-menu i, #site-utility .header_cart_link i, .secondary-menu-toggle, #secondary-menu-sidebar .widget-title, #secondary-menu-sidebar ul li, #secondary-menu-sidebar ul ul li a, #secondary-menu-sidebar ul ul li a, .secondary-navigation-close, #secondary-navigation a, .header-search .search-input {color:'. ot_get_option('default_menu_link') .'}' : '';
	(ot_get_option('default_menu_link') != '') ? $custom_css .= '#secondary-menu-sidebar .secondary-menu-widget-area {border-color:'. ot_get_option('default_menu_link') .'}' : '';
	(ot_get_option('default_menu_link_h') != '') ? $custom_css .= '#site-navigation ul li a:hover, #site-utility .search_button:hover, #site-navigation .header_cart_button:hover {color:'. ot_get_option('default_menu_link_h') .'}' : '';
	
	if ( !has_nav_menu( 'secondary' ) ){
	$custom_css .= '.header-style-1 #site-navigation, .header-style-2 #site-navigation, .header-style-3 #site-navigation{margin-left:-15px;}';	
	}
	
	// Sub-menu style
	(ot_get_option('sub_menu_font_size') != '13px') ? $custom_css .= '#site-navigation ul li ul li a {font-size:'. ot_get_option('sub_menu_font_size') .'}' : '';
	(ot_get_option('submenu_background') != '') ? $custom_css .= '#site-navigation ul li ul {background-color:'. ot_get_option('submenu_background'). '}' : '';

	(ot_get_option('submenu_hover_bg') != '') ? $custom_css .= '#site-navigation ul li ul li a:hover, #site-navigation ul li ul li.current-menu-item > a,.single-post #site-navigation ul li ul li.current_page_parent > a, #site-navigation ul li ul li.current-menu-ancestor > a {background-color:'. ot_get_option('submenu_hover_bg'). '}' : '';
		
	(ot_get_option('submenu_link_color') != '') ? $custom_css .= '#site-navigation ul li ul li a, #site-navigation ul li ul li a:hover {color:'. ot_get_option('submenu_link_color'). '}' : '';
		
	(ot_get_option('submenu_link_color') != '') ? $custom_css .= '#site-navigation ul li ul li a:hover {color:'. ot_get_option('submenu_link_color'). '}' : '';
	
	(ot_get_option('megamenu_active_item_color') != '') ? $custom_css .= '#site-navigation ul li.megamenu ul li ul li a:hover, #site-navigation ul li.megamenu ul li.current-menu-item > a, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li:hover > a, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li.nav-active a  {color:'. ot_get_option('megamenu_active_item_color') .';}' : $custom_css .= '#site-navigation ul li.megamenu ul li ul li a:hover, #site-navigation ul li.megamenu ul li.current-menu-item > a, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li:hover > a, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li.nav-active a  {color:'. $accent_color .';}';
		
	(ot_get_option('megamenu_title_color') != '') ? $custom_css .= '#site-navigation ul li.megamenu > ul > li > a, #site-navigation ul li.megamenu > ul > li > a:hover{color:'. ot_get_option('megamenu_title_color'). ' !important}' : '';
		
	(ot_get_option('megamenu_separator_color') != '') ? $custom_css .= '#site-navigation ul > li.megamenu > ul > li {border-right-color:'. ot_get_option('megamenu_separator_color'). '}' : '';
	
	// Mobile menu style
	(ot_get_option('mobile_menu_background') != '') ? $custom_css .= '#mobile-site-header{background:'. ot_get_option('mobile_menu_background'). '}' : '';
	(ot_get_option('mobile_menu_toggle_color') != '') ? $custom_css .= '#mobile-site-header .toggle-mobile-menu i {color:'. ot_get_option('mobile_menu_toggle_color'). '}' : '';
	
	// Logo
	(ot_get_option('logo_top') != '') ? $custom_css .= '#site-logo {margin-top:'. ot_get_option('logo_top') .'}' : '';
	(ot_get_option('logo_left') != '') ? $custom_css .= '#site-logo {margin-left:'. ot_get_option('logo_left') .'}' : '';
	(ot_get_option('logo_retina') != '') ? $custom_css .= '#site-logo img.retina-logo{width:'. ot_get_option('retina_logo_width') .'; height:'. ot_get_option('retina_logo_height') .';}' : '';
	(ot_get_option('mobile_logo_retina') != '') ? $custom_css .= '#mobile-site-header #site-logo img.retina-logo{width:'. ot_get_option('mobile_retina_logo_width') .'; height:'. ot_get_option('mobile_retina_logo_height') .';}' : '';
	
	
	/* IF CUSTOM HEADER ------------------------------------------------------------------------------------------------------------ */

	if( is_page() || is_single() || is_category() ){
		if( $custom_header != '' ) {
			
			// Header style
			(get_post_meta( $custom_header,'header_bg', true ) != '') ? $custom_css .= '#site-header{background-color:'. esc_attr(get_post_meta( $custom_header, 'header_bg', true )) .';}' : '';	
			(get_post_meta( $custom_header,'header_padding_top', true ) != '') ? $custom_css .= '#header-container{padding-top:'. esc_attr(get_post_meta( $custom_header, 'header_padding_top', true)) .';}' : '';	
			(get_post_meta( $custom_header,'header_padding_bottom', true ) != '') ? $custom_css .= '#header-container{padding-bottom:'. esc_attr(get_post_meta( $custom_header,'header_padding_bottom', true)) .';}' : '';	
			
				
			// Top bar style
			(get_post_meta( $custom_header,'top_bar_bg', true ) != '') ? $custom_css .= '#top-bar-wrapper{background:'. esc_attr(get_post_meta( $custom_header,'top_bar_bg', true)) .'}' : '';
			(get_post_meta( $custom_header,'top_bar_text_color', true ) != '') ? $custom_css .= '#top-bar-wrapper, #top-bar-wrapper a, #top-bar ul li ul li a:after{color:'. esc_attr(get_post_meta( $custom_header,'top_bar_text_color', true)) .'}' : '';
			(get_post_meta( $custom_header,'top_bar_link_hover', true ) != '') ? $custom_css .= '#top-bar-wrapper a:hover{color:'. esc_attr(get_post_meta( $custom_header,'top_bar_link_hover', true)) .'}' : '';
			
			// Menu style
			(get_post_meta( $custom_header,'menu_height', true ) != '') ? $custom_css .= '#navigation-wrapper, #navigation-container, #navigation-inner, #menu-sidebar{height:'. esc_attr(get_post_meta( $custom_header,'menu_height', true)) .';}' : '';
			(get_post_meta( $custom_header,'menu_height', true ) != '') ? $custom_css .= '#site-navigation ul li a, #site-utility .search_button, #menu-sidebar .widget-container, .secondary-menu-toggle, .secondary-menu-toggle i, #site-utility .header_cart_link{line-height:'. esc_attr(get_post_meta( $custom_header,'menu_height', true)) .';}' : '';
			(get_post_meta( $custom_header,'menu_height', true ) != '') ? $custom_css .= '.header-style-2 #site-logo img, .header-style-6 #site-logo img{max-height:'. esc_attr(get_post_meta( $custom_header,'menu_height', true)) .';}' : '';
			
			(get_post_meta( $custom_header,'menu_color', true ) != '') ? $custom_css .= '#navigation-wrapper, #navigation-container, #navigation-inner{background-color:'. esc_attr(get_post_meta( $custom_header,'menu_color', true)) .';}' : '';
			(get_post_meta( $custom_header,'menu_color', true ) != '') ? $custom_css .= '#secondary-navigation-wrapper{background-color:rgba('. mnky_hex2rgb( esc_attr(get_post_meta( $custom_header,'menu_color', true) )) .',0.98);}' : '';
			(get_post_meta( $custom_header, 'menu_color', true) != '') ? $custom_css .= '.header-search .searchform-wrapper {background-color:rgba('. mnky_hex2rgb( esc_attr(get_post_meta( $custom_header, 'menu_color', true) )) .',0.9);}' : '';
			
			
			(get_post_meta( $custom_header,'default_menu_link', true ) != '') ? $custom_css .= '#site-navigation ul li a, #site-utility .search_button, #site-navigation .header_cart_button, .toggle-mobile-menu i, #site-utility .header_cart_link i, .secondary-menu-toggle, #secondary-menu-sidebar .widget-title, #secondary-menu-sidebar ul li, #secondary-menu-sidebar ul ul li a, #secondary-menu-sidebar ul ul li a, .secondary-navigation-close, #secondary-navigation a, .header-search .search-input {color:'. esc_attr(get_post_meta( $custom_header,'default_menu_link', true)) .'}' : '';
			(get_post_meta( $custom_header,'default_menu_link', true ) != '') ? $custom_css .= '#secondary-menu-sidebar .secondary-menu-widget-area {border-color:'. esc_attr(get_post_meta( $custom_header,'default_menu_link', true)) .'}' : '';
			(get_post_meta( $custom_header,'default_menu_link_h', true ) != '') ? $custom_css .= '#site-navigation ul li a:hover, #site-utility .search_button:hover, #site-navigation .header_cart_button:hover {color:'. esc_attr(get_post_meta( $custom_header,'default_menu_link_h', true)) .'}' : '';
			
			// Sub-menu style
			(get_post_meta( $custom_header,'submenu_background', true ) != '') ? $custom_css .= '#site-navigation ul li ul {background-color:'. esc_attr(get_post_meta( $custom_header,'submenu_background', true)). '}' : '';

			(get_post_meta( $custom_header,'submenu_hover_bg', true ) != '') ? $custom_css .= '#site-navigation ul li ul li a:hover, #site-navigation ul li ul li.current-menu-item > a,.single-post #site-navigation ul li ul li.current_page_parent > a, #site-navigation ul li ul li.current-menu-ancestor > a {background-color:'. esc_attr(get_post_meta( $custom_header,'submenu_hover_bg', true)). '}' : '';
				
			(get_post_meta( $custom_header,'submenu_link_color', true ) != '') ? $custom_css .= '#site-navigation ul li ul li a, #site-navigation ul li ul li a:hover {color:'. esc_attr(get_post_meta( $custom_header,'submenu_link_color', true)). '}' : '';
				
			(get_post_meta( $custom_header,'submenu_link_color', true ) != '') ? $custom_css .= '#site-navigation ul li ul li a:hover {color:'. esc_attr(get_post_meta( $custom_header,'submenu_link_color', true)). '}' : '';
			
			(get_post_meta( $custom_header,'megamenu_active_item_color', true ) != '') ? $custom_css .= '#site-navigation ul li.megamenu ul li ul li a:hover, #site-navigation ul li.megamenu ul li.current-menu-item > a, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li:hover > a, #site-navigation ul li.megamenu-tabs .submenu-content .tabs-nav li.nav-active a  {color:'. esc_attr(get_post_meta( $custom_header,'megamenu_active_item_color', true)) .';}' : '';
				
			(get_post_meta( $custom_header,'megamenu_title_color', true ) != '') ? $custom_css .= '#site-navigation ul li.megamenu > ul > li > a, #site-navigation ul li.megamenu > ul > li > a:hover{color:'. esc_attr(get_post_meta( $custom_header,'megamenu_title_color', true)). ' !important}' : '';
				
			(get_post_meta( $custom_header,'megamenu_separator_color', true ) != '') ? $custom_css .= '#site-navigation ul > li.megamenu > ul > li {border-right-color:'. esc_attr(get_post_meta( $custom_header,'megamenu_separator_color', true)). '}' : '';
			
			// Logo
			(get_post_meta( $custom_header,'logo_top', true ) != '') ? $custom_css .= '#site-logo {margin-top:'. esc_attr(get_post_meta( $custom_header,'logo_top', true)) .'}' : '';
			(get_post_meta( $custom_header,'logo_left', true ) != '') ? $custom_css .= '#site-logo {margin-left:'. esc_attr(get_post_meta( $custom_header,'logo_left', true)) .'}' : '';
			(get_post_meta( $custom_header,'logo_retina', true ) != '') ? $custom_css .= '#site-logo img.retina-logo{width:'. esc_attr(get_post_meta( $custom_header,'retina_logo_width', true)) .'; height:'. esc_attr(get_post_meta( $custom_header,'retina_logo_height', true)) .';}' : '';
		}
	}
	

	
/*	
*	-------------------------------------------------------------------------------------------------
*	Content
*	-------------------------------------------------------------------------------------------------
*/
	
	// Content style
	(ot_get_option('theme_button_color') != '') ? $custom_css .= 'input[type=\'submit\'], button {background-color:'. ot_get_option('theme_button_color') .'}' : '';
	(ot_get_option('theme_button_hover_color') != '') ? $custom_css .= 'input[type=\'submit\']:hover, button:hover {background-color:'. ot_get_option('theme_button_hover_color') .'}' : '';
	(ot_get_option('button_text_color') != '') ? $custom_css .= 'input[type=\'submit\'], button, input[type=\'submit\']:active, button:active {color:'. ot_get_option('button_text_color') .'}' : '';
	
	(ot_get_option('link_color') != '') ? $custom_css .= 'a,.author .author-info a {color:'. ot_get_option('link_color') .'}' : '';
	(ot_get_option('link_hover_color') != '') ? $custom_css .= 'a:hover, .entry-header .entry-meta a:hover, .widget a:hover, .footer-sidebar a:hover, .footer-sidebar .widget_nav_menu ul li.current-menu-item a:hover, .mp-author a:hover, .entry-meta-blog .meta-author:hover, .archive-layout .entry-category a:hover, .mp-category a:hover,#site-navigation .mnky-menu-posts .menu-post-container a:hover h6, .mnky-related-posts .related-post-container a:hover h6, .mnky-posts .mp-title a:hover, .review_author a:hover {color:'. ot_get_option('link_hover_color') .'}' : '';
	(ot_get_option('meta_color') != '') ? $custom_css .= '.entry-header .entry-meta, .entry-header .entry-meta a {color:'. ot_get_option('meta_color') .'}' : '';
	(ot_get_option('sidebar_text_color') != '') ? $custom_css .= '.page-sidebar .widget{color:'. ot_get_option('sidebar_text_color') .'}' : '';
	(ot_get_option('sidebar_link_color') != '') ? $custom_css .= '.page-sidebar a{color:'. ot_get_option('sidebar_link_color') .'}' : '';
	(ot_get_option('sidebar_link_hover_color') != '') ? $custom_css .= '.page-sidebar a:hover{color:'. ot_get_option('sidebar_link_hover_color') .'}' : '';
	(ot_get_option('sidebar_title_color') != '') ? $custom_css .= '.page-sidebar .widget .widget-title, #sidebar .widget_nav_menu ul li a{color:'. ot_get_option('sidebar_title_color') .'}' : '';
	(ot_get_option('sidebar_divider_color') != '') ? $custom_css .= '.page-sidebar .widget ul li,.page-sidebar .widget ul ul{border-color:'. ot_get_option('sidebar_divider_color') .'}' : '';
	
	// Article
	if( is_single() ){
		$header_style = ot_get_option('post_header_style_opt', 'style_deafault');
		if( get_post_meta( get_the_ID(), 'post_header_style', true ) && get_post_meta( get_the_ID(), 'post_header_style', true ) != 'opt_default') {
			$header_style = get_post_meta( get_the_ID(), 'post_header_style', true );
		}

		$post_width = get_post_meta( get_the_ID(), 'post_width', true);
		if( $post_width != '' ){
			$post_width = preg_replace( '/\D/', '', $post_width );
			$custom_css .= '.entry-content p, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6{max-width:'. $post_width .'px; margin-left:auto; margin-right:auto;}';
		} 

		if( $header_style == 'style_2' ){
			$custom_css .= '.entry-header{margin-top:-150px; margin-left:-30px; margin-right:-30px; background:#fff; padding: 30px 30px 0 30px;} @media only screen and (max-width: 767px) {.entry-header {margin-top:-60px;} }';
		} elseif( $header_style == 'style_3' ){
			$custom_css .= '#container{margin-top:-150px; margin-left:-30px; margin-right:-30px; background:#fff; padding: 30px 30px 0 30px;}@media only screen and (max-width: 767px) {#container {margin-top:-60px;}}';
		} 
	}
	
	// Post views
	(ot_get_option('low_views_color') != '') ? $custom_css .= '.views-low{color:'. ot_get_option('low_views_color') .'}' : '';
	(ot_get_option('medium_views_color') != '') ? $custom_css .= '.views-mid{color:'. ot_get_option('medium_views_color') .'}' : '';
	(ot_get_option('hot_views_color') != '') ? $custom_css .= '.views-hot{color:'. ot_get_option('hot_views_color') .'}' : '';


	// Body background
	$body_bg = ot_get_option('body_background');
		
		// If custom body background
		if( is_page() || is_single() ){
			if( get_post_meta( get_the_ID(), 'body_background', true) ){
				$body_bg = get_post_meta( get_the_ID(), 'body_background', true); 
			}	
		}
		
	if ( ! empty( $body_bg ) ){
		$body_styles = array(
			($body_bg['background-color'] != '') ? 'background-color:'. $body_bg['background-color'] : null,
			($body_bg['background-image'] != '') ? 'background-image: url('. $body_bg['background-image'] .')' : null,
			($body_bg['background-repeat'] != '') ? 'background-repeat:'. $body_bg['background-repeat'] : null,
			($body_bg['background-position'] != '') ? 'background-position:'. $body_bg['background-position'] : null,
			($body_bg['background-attachment'] != '') ? 'background-attachment:'. $body_bg['background-attachment'] : null,
			($body_bg['background-size'] != '') ? 'background-size:'. $body_bg['background-size'] : null,
				
		);
		
		$body_styles = implode('; ', array_filter($body_styles));	
		$custom_css .= 'body{'.$body_styles.'}';
	}

	
	
	
/*	
*	-------------------------------------------------------------------------------------------------
*	Pre-content
*	-------------------------------------------------------------------------------------------------
*/
	
	// Default pre-content style
	if( is_page() || is_single() ){
		$pre_header_bg = get_post_meta( get_the_ID(), 'pre_content_bg', true);
		if ( ! empty( $pre_header_bg ) ){
			$pre_header_styles = array(
				($pre_header_bg['background-color'] != '') ? 'background-color:'. $pre_header_bg['background-color'] : null,
				($pre_header_bg['background-image'] != '') ? 'background-image: url('. $pre_header_bg['background-image'] .')' : null,
				($pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $pre_header_bg['background-repeat'] : null,
				($pre_header_bg['background-position'] != '') ? 'background-position:'. $pre_header_bg['background-position'] : null,
				($pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $pre_header_bg['background-attachment'] : null,
				($pre_header_bg['background-size'] != '') ? 'background-size:'. $pre_header_bg['background-size'] : null,
				
			);
		
			$pre_header_styles = implode('; ', array_filter($pre_header_styles));	
			$custom_css .= '.pre-content{'.$pre_header_styles.'}';
		}
		if ( get_post_meta( get_the_ID(), 'pre_content_responsive_height', true ) == 'on' ){
		$custom_css .= '@media only screen and (max-width: 979px) {.pre-content{max-height:none; min-height:400px; height:auto !important;}}@media only screen and (max-width: 767px) {.pre-content{max-height:none; min-height:250px; height:auto !important;}}';
		}
	}

	// Blog pre-content style
	if( is_home() ){
		$blog_pre_header_bg = ot_get_option('blog_pre_content_bg');
		if ( ! empty( $blog_pre_header_bg ) ){
			$blog_pre_header_styles = array(
				($blog_pre_header_bg['background-color'] != '') ? 'background-color:'. $blog_pre_header_bg['background-color'] : null,
				($blog_pre_header_bg['background-image'] != '') ? 'background-image: url('. $blog_pre_header_bg['background-image'] .')' : null,
				($blog_pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $blog_pre_header_bg['background-repeat'] : null,
				($blog_pre_header_bg['background-position'] != '') ? 'background-position:'. $blog_pre_header_bg['background-position'] : null,
				($blog_pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $blog_pre_header_bg['background-attachment'] : null,
				($blog_pre_header_bg['background-size'] != '') ? 'background-size:'. $blog_pre_header_bg['background-size'] : null,
				
			);
		
			$blog_pre_header_styles = implode('; ', array_filter($blog_pre_header_styles));	
			$custom_css .= '.pre-content{'.$blog_pre_header_styles.'}';
		}
		
		if (  ot_get_option('blog_pre_content_responsive_height') == 'on' ){
		$custom_css .= '@media only screen and (max-width: 979px) {.pre-content{max-height:none; min-height:400px; height:auto !important;}}@media only screen and (max-width: 767px) {.pre-content{max-height:none; min-height:250px; height:auto !important;}}';
		}
	}

	// Category pre-content style
	if( is_category() ){
		$category_styles = ot_get_option( 'category_styles', array() );
		if( ! empty( $category_styles ) ) {
			foreach( $category_styles as $category_style ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
				
					$cat_pre_header_bg = $category_style['cat_pre_content_bg'];
					if ( ! empty( $cat_pre_header_bg ) ){
						$cat_pre_header_styles = array(
							($cat_pre_header_bg['background-color'] != '') ? 'background-color:'. $cat_pre_header_bg['background-color'] : null,
							($cat_pre_header_bg['background-image'] != '') ? 'background-image: url('. $cat_pre_header_bg['background-image'] .')' : null,
							($cat_pre_header_bg['background-repeat'] != '') ? 'background-repeat:'. $cat_pre_header_bg['background-repeat'] : null,
							($cat_pre_header_bg['background-position'] != '') ? 'background-position:'. $cat_pre_header_bg['background-position'] : null,
							($cat_pre_header_bg['background-attachment'] != '') ? 'background-attachment:'. $cat_pre_header_bg['background-attachment'] : null,
							($cat_pre_header_bg['background-size'] != '') ? 'background-size:'. $cat_pre_header_bg['background-size'] : null,
							
						);
					
						$cat_pre_header_styles = implode('; ', array_filter($cat_pre_header_styles));	
						$custom_css .= '.pre-content{'.$cat_pre_header_styles.'}';
					}
					
				if (  $category_style['cat_pre_content_responsive_height'] == 'on' ){
				$custom_css .= '@media only screen and (max-width: 979px) {.pre-content{max-height:none; min-height:400px; height:auto !important;}}@media only screen and (max-width: 767px) {.pre-content{max-height:none; min-height:250px; height:auto !important;}}';
				}					
				
				}
			}
		}
	}

	
	
/*	
*	-------------------------------------------------------------------------------------------------
*	Typography
*	-------------------------------------------------------------------------------------------------
*/	

	// Body typo
	$body_typo_array = ot_get_option('body_font');
	if ( ! empty( $body_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$body_typo_array['font-family']]['family'] ) ) {
			$body_typo = 'font-family: "' . $ot_google_fonts[$body_typo_array['font-family']]['family'] . '";';
		} else {
			$body_typo = 'font-family: "' . $body_typo_array['font-family'] . '";';
		}
		if( ! empty( $body_typo_array['font-weight'] ) ) { $body_typo .= 'font-weight:'. $body_typo_array['font-weight'] .';'; }
		if( ! empty( $body_typo_array['line-height'] ) ) { $body_typo .= 'line-height:'. $body_typo_array['line-height'] .';'; }
		if( ! empty( $body_typo_array['letter-spacing'] ) ) { $body_typo .= 'letter-spacing:'. $body_typo_array['letter-spacing'] .';'; }
		if( ! empty( $body_typo_array['text-transform'] ) ) { $body_typo .= 'text-transform:'. $body_typo_array['text-transform'] .';'; }

		$custom_css .= 'body, textarea{'.$body_typo.'}';
	}

	$custom_css .= 'body{color:'. ot_get_option('body_text_color', '#575757') .'; font-size:'. ot_get_option('body_size').'}';

	(ot_get_option('body_text_color') != '') ? $custom_css .= '#content h4.wpb_toggle, .mp-author a, .entry-meta-blog .meta-author {color:'. ot_get_option('body_text_color', '#575757') .';}' : '';	
	
	
	// Menu typo
	$menu_typo_array = ot_get_option('menu_font');
	if ( ! empty( $menu_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$menu_typo_array['font-family']]['family'] ) ) {
			$menu_typo = 'font-family: "' . $ot_google_fonts[$menu_typo_array['font-family']]['family'] . '";';
		} else {
			$menu_typo = 'font-family: "' . $menu_typo_array['font-family'] . '";';
		}
		if( ! empty( $menu_typo_array['font-weight'] ) ) { $menu_typo .= 'font-weight:'. $menu_typo_array['font-weight'] .';'; }
		if( ! empty( $menu_typo_array['letter-spacing'] ) ) { $menu_typo .= 'letter-spacing:'. $menu_typo_array['letter-spacing'] .';'; }
		if( ! empty( $menu_typo_array['text-transform'] ) ) { $menu_typo .= 'text-transform:'. $menu_typo_array['text-transform'] .';'; }

		$custom_css .= '#site-navigation{'.$menu_typo.'}';
	}	
	
	
	// Heading typo
	$heading_typo_array = ot_get_option('heading_font');
	if ( ! empty( $heading_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$heading_typo_array['font-family']]['family'] ) ) {
			$heading_typo = 'font-family: "' . $ot_google_fonts[$heading_typo_array['font-family']]['family'] . '";';
		} else {
			$heading_typo = 'font-family: "' . $heading_typo_array['font-family'] . '";';
		}
		if( ! empty( $heading_typo_array['font-weight'] ) ) { $heading_typo .= 'font-weight:'. $heading_typo_array['font-weight'] .';'; }
		if( ! empty( $heading_typo_array['line-height'] ) ) { $heading_typo .= 'line-height:'. $heading_typo_array['line-height'] .';'; }
		if( ! empty( $heading_typo_array['letter-spacing'] ) ) { $heading_typo .= 'letter-spacing:'. $heading_typo_array['letter-spacing'] .';'; }
		if( ! empty( $heading_typo_array['text-transform'] ) ) { $heading_typo .= 'text-transform:'. $heading_typo_array['text-transform'] .';'; }

		$custom_css .= 'h1, h2, h3, h4, h5, h6{'.$heading_typo.'}';
	}		
	
	
	// Single post typo
	$single_typo_array = ot_get_option('single_post_font');
	if ( ! empty( $single_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$single_typo_array['font-family']]['family'] ) ) {
			$single_typo = 'font-family: "' . $ot_google_fonts[$single_typo_array['font-family']]['family'] . '";';
		} else {
			$single_typo = 'font-family: "' . $single_typo_array['font-family'] . '";';
		}
		if( ! empty( $single_typo_array['font-weight'] ) ) { $single_typo .= 'font-weight:'. $single_typo_array['font-weight'] .';'; }
		if( ! empty( $single_typo_array['line-height'] ) ) { $single_typo .= 'line-height:'. $single_typo_array['line-height'] .';'; }
		if( ! empty( $single_typo_array['letter-spacing'] ) ) { $single_typo .= 'letter-spacing:'. $single_typo_array['letter-spacing'] .';'; }
		if( ! empty( $single_typo_array['text-transform'] ) ) { $single_typo .= 'text-transform:'. $single_typo_array['text-transform'] .';'; }

		$custom_css .= '.single-post .entry-content{'.$single_typo.'}';
	}	
	
	$custom_css .= '.single .entry-content{font-size:'. ot_get_option('single_post_text_font_size').'}';
	
	
	// Widget typo
	$widget_typo_array = ot_get_option('widget_font');
	if ( ! empty( $widget_typo_array['font-family'] ) ) {
		$ot_google_fonts = get_theme_mod( 'ot_google_fonts', array() );
		if ( isset( $ot_google_fonts[$widget_typo_array['font-family']]['family'] ) ) {
			$widget_typo = 'font-family: "' . $ot_google_fonts[$widget_typo_array['font-family']]['family'] . '";';
		} else {
			$widget_typo = 'font-family: "' . $widget_typo_array['font-family'] . '";';
		}
		if( ! empty( $widget_typo_array['font-weight'] ) ) { $widget_typo .= 'font-weight:'. $widget_typo_array['font-weight'] .';'; }
		if( ! empty( $widget_typo_array['line-height'] ) ) { $widget_typo .= 'line-height:'. $widget_typo_array['line-height'] .';'; }
		if( ! empty( $widget_typo_array['letter-spacing'] ) ) { $widget_typo .= 'letter-spacing:'. $widget_typo_array['letter-spacing'] .';'; }
		if( ! empty( $widget_typo_array['text-transform'] ) ) { $widget_typo .= 'text-transform:'. $widget_typo_array['text-transform'] .';'; }

		$custom_css .= '.widget .widget-title{'.$widget_typo.'}';
	}
	
	
	// Headings
	$custom_css .= 'h1{font-size:'. ot_get_option('h1', '30px') .'}';
	$custom_css .= 'h2{font-size:'. ot_get_option('h2', '24px') .'}';
	$custom_css .= 'h3{font-size:'. ot_get_option('h3', '20px') .'}';
	$custom_css .= 'h4{font-size:'. ot_get_option('h4', '18px') .'}';
	$custom_css .= 'h5{font-size:'. ot_get_option('h5', '16px') .'}';
	$custom_css .= 'h6{font-size:'. ot_get_option('h6', '13px') .'}';
	(ot_get_option('headings_color') != '') ? $custom_css .= 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color:'. ot_get_option('headings_color') .'}' : '';	
		
	

/*	
*	-------------------------------------------------------------------------------------------------
*	Footer
*	-------------------------------------------------------------------------------------------------
*/
		
	// Footer background
	$footer_bg = ot_get_option('footer_bg');
	if ( ! empty( $footer_bg ) ){
		$footer_styles = array(
			($footer_bg['background-color'] != '') ? 'background-color:'. $footer_bg['background-color'] : null,
			($footer_bg['background-image'] != '') ? 'background-image: url('. $footer_bg['background-image'] .')' : null,
			($footer_bg['background-repeat'] != '') ? 'background-repeat:'. $footer_bg['background-repeat'] : null,
			($footer_bg['background-position'] != '') ? 'background-position:'. $footer_bg['background-position'] : null,
			($footer_bg['background-attachment'] != '') ? 'background-attachment:'. $footer_bg['background-attachment'] : null,
			($footer_bg['background-size'] != '') ? 'background-size:'. $footer_bg['background-size'] : null,
			
		);
	
		$footer_styles = implode('; ', array_filter($footer_styles));	
		$custom_css .= '.footer-sidebar{'.$footer_styles.'}';
	}
	// Footer columns
	$footer_columns = ot_get_option('footer_columns', 'vc_col-sm-3');
	
	if ( $footer_columns == 'vc_col-sm-6') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-6:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-6:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	}
	
	if ( $footer_columns == 'vc_col-sm-4') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	(ot_get_option('footer_column_3_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-4:nth-child(3) {width:'. ot_get_option('footer_column_3_width') .'}' : '';
	}
	
	if ( $footer_columns == 'vc_col-sm-3') {
	(ot_get_option('footer_column_1_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(1) {width:'. ot_get_option('footer_column_1_width') .'}' : '';
	(ot_get_option('footer_column_2_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(2) {width:'. ot_get_option('footer_column_2_width') .'}' : '';
	(ot_get_option('footer_column_3_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(3) {width:'. ot_get_option('footer_column_3_width') .'}' : '';
	(ot_get_option('footer_column_4_width') != '') ? $custom_css .= '.footer-sidebar .vc_col-sm-3:nth-child(4) {width:'. ot_get_option('footer_column_4_width') .'}' : '';
	}
	
	// Footer style
	(ot_get_option('footer_text_color') != '') ? $custom_css .= '.footer-sidebar .widget{color:'. ot_get_option('footer_text_color') .'}' : '';
	(ot_get_option('footer_link') != '') ? $custom_css .= '.footer-sidebar a{color:'. ot_get_option('footer_link') .'}' : '';
	(ot_get_option('footer_link_hover') != '') ? $custom_css .= '.footer-sidebar a:hover, .footer-sidebar .widget_nav_menu ul li.current-menu-item a:hover {color:'. ot_get_option('footer_link_hover') .'}' : '';
	(ot_get_option('footer_widget_title') != '') ? $custom_css .= '.footer-sidebar .widget .widget-title{color:'. ot_get_option('footer_widget_title') .'}' : '';
	
	
	// Copyright background
	$copyright_bg = ot_get_option('copyright_bg');
	if ( ! empty( $copyright_bg ) ){
		$copyright_styles = array(
			($copyright_bg['background-color'] != '') ? 'background-color:'. $copyright_bg['background-color'] : null,
			($copyright_bg['background-image'] != '') ? 'background-image: url('. $copyright_bg['background-image'] .')' : null,
			($copyright_bg['background-repeat'] != '') ? 'background-repeat:'. $copyright_bg['background-repeat'] : null,
			($copyright_bg['background-position'] != '') ? 'background-position:'. $copyright_bg['background-position'] : null,
			($copyright_bg['background-attachment'] != '') ? 'background-attachment:'. $copyright_bg['background-attachment'] : null,
			($copyright_bg['background-size'] != '') ? 'background-size:'. $copyright_bg['background-size'] : null,
			
		);
	
		$copyright_styles = implode('; ', array_filter($copyright_styles));	
		$custom_css .= '.site-info{'.$copyright_styles.'}';
	}
	
	// Copyright style
	(ot_get_option('copyright_text_color') != '') ? $custom_css .= '.site-info .widget{color:'. ot_get_option('copyright_text_color') .'}' : '';
	(ot_get_option('copyright_link') != '') ? $custom_css .= '.site-info a{color:'. ot_get_option('copyright_link') .'}' : '';
	(ot_get_option('copyright_link_hover') != '') ? $custom_css .= '.site-info a:hover{color:'. ot_get_option('copyright_link_hover') .'}' : '';
	(ot_get_option('copyright_widget_title') != '') ? $custom_css .= '.site-info .widget .widget-title{color:'. ot_get_option('copyright_widget_title') .'}' : '';


	
/*	
*	-------------------------------------------------------------------------------------------------
*	Misc
*	-------------------------------------------------------------------------------------------------
*/
		
	// Mobile style
	if ( class_exists('Mobile_Detect') ){
		$detect = new Mobile_Detect;
		if ( $detect->isMobile() ) {
			$custom_css .= '@media only screen and (max-width : 1024px){
				.wpb_row, .pre-content, .page-header {background-attachment:scroll !important;}
			}';
		}
	}

	
	// Custom CSS from option panel
	$custom_css .=  ot_get_option('custom_css');
	
	// Header custom CSS
	$custom_header_css = ot_get_option('header_custom_css');	
	if( is_page() || is_single() || is_category() ){
		if( $custom_header != '' ) {
			(get_post_meta( $custom_header,'header_custom_css', true ) != '') ? $custom_header_css = get_post_meta( $custom_header,'header_custom_css', true ) : $custom_header_css = '';
		}
	}
	$custom_css .= $custom_header_css;


	$custom_css = preg_replace('/\r|\n/', '', $custom_css);
	
	wp_add_inline_style( 'mnky_main', $custom_css );
}

add_action('wp_enqueue_scripts', 'mnky_custom_css');