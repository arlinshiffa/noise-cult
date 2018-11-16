<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: logo
*	--------------------------------------------------------------------- 
*/
	

// Logo URLs & dimensions	
$default_logo = ot_get_option('logo');
$retina_logo = ot_get_option('logo_retina');
$width = ot_get_option('retina_logo_width');
$height = ot_get_option('retina_logo_height');

if( is_category() || is_single() ){
	$category_styles = ot_get_option( 'category_styles', array() );
	if( ! empty( $category_styles ) ) {
		foreach( $category_styles as $category_style ) {
			if( $category_style['custom_header'] != '' ) {
				$custom_header = $category_style['custom_header'];
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
						( get_post_meta( $custom_header, 'logo', true ) != '') ? $default_logo  = get_post_meta( $custom_header, 'logo', true ) : '';
						( get_post_meta( $custom_header, 'logo_retina', true ) != '') ? $retina_logo  = get_post_meta( $custom_header, 'logo_retina', true ) : '';
						( get_post_meta( $custom_header, 'retina_logo_width', true ) != '') ? $width = get_post_meta( $custom_header, 'retina_logo_width', true ) : '';
						( get_post_meta( $custom_header, 'retina_logo_height', true ) != '') ? $height = get_post_meta( $custom_header, 'retina_logo_height', true ) : '';
				}
				
				if( is_single() && $category_style['cs_select'] != '' && in_category( $category_style['cs_select'] )  && $category_style['cs_header_posts'] != 'off' ) {
					( get_post_meta( $custom_header, 'logo', true ) != '') ? $default_logo  = get_post_meta( $custom_header, 'logo', true ) : '';
					( get_post_meta( $custom_header, 'logo_retina', true ) != '') ? $retina_logo  = get_post_meta( $custom_header, 'logo_retina', true ) : '';
					( get_post_meta( $custom_header, 'retina_logo_width', true ) != '') ? $width = get_post_meta( $custom_header, 'retina_logo_width', true ) : '';
					( get_post_meta( $custom_header, 'retina_logo_height', true ) != '') ? $height = get_post_meta( $custom_header, 'retina_logo_height', true ) : '';
				}
			}
		}
	}
}

if( is_page() || is_single() ){
	$custom_header = get_post_meta( get_the_ID(), 'custom_header', true);
	if( $custom_header != '' ) {
		( get_post_meta( $custom_header, 'logo', true ) != '') ? $default_logo  = get_post_meta( $custom_header, 'logo', true ) : '';
		( get_post_meta( $custom_header, 'logo_retina', true ) != '') ? $retina_logo  = get_post_meta( $custom_header, 'logo_retina', true ) : '';
		( get_post_meta( $custom_header, 'retina_logo_width', true ) != '') ? $width = get_post_meta( $custom_header, 'retina_logo_width', true ) : '';
		( get_post_meta( $custom_header, 'retina_logo_height', true ) != '') ? $height = get_post_meta( $custom_header, 'retina_logo_height', true ) : '';
	}
}

// Logo output
if ($default_logo != ''){
	if ($retina_logo ){
		echo '<a href="'. esc_url( home_url( '/' ) ) .'">
				<img src="'. esc_attr($default_logo) .'" width="'. esc_attr(str_replace( "px", "", $width )) .'" height="'. esc_attr(str_replace( "px", "", $height )) .'" alt="', esc_attr(bloginfo('name')) .'" class="default-logo" />
				<img src="'. esc_attr($retina_logo) .'" width="'. esc_attr(str_replace( "px", "", $width )) .'" height="'. esc_attr(str_replace( "px", "", $height )) .'" alt="', esc_attr(bloginfo('name')) .'" class="retina-logo" />
			</a>';
	} else {
		echo '<a href="'. esc_url( home_url( '/' ) ) .'"><img src="'. esc_attr($default_logo) .'" alt="', esc_attr(bloginfo('name')) .'" /></a>';
	}
} else {
	echo '<h1 class="site-title"><a href="'. esc_url( home_url( '/' ) ) .'" title="', esc_attr(bloginfo('name')) .'" rel="home">',  esc_html(bloginfo('name')) .'</a></h1>';
}
