<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Template part: logo
*	--------------------------------------------------------------------- 
*/
	

// Logo URLs & dimensions	
$default_logo = ot_get_option('mobile_logo');
$retina_logo = ot_get_option('mobile_logo_retina');
$width = ot_get_option('mobile_retina_logo_width');
$height = ot_get_option('mobile_retina_logo_height');

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
	echo '<h1 class="site-title"><a href="'. esc_url( home_url( '/' ) ) .'" title="', esc_attr(bloginfo('name')) .'" rel="home">', esc_html(bloginfo('name')) .'</a></h1>';
}
