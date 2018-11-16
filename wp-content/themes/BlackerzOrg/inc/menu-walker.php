<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Custom menu walker
*	--------------------------------------------------------------------- 
*/


class mnky_walker extends Walker_Nav_Menu {
	
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$classes = 'menu-item-' . $item->ID;
		$description = '';
		if( $depth == 1 ) {
			if( ! empty( $item->description ) ) {
				$description = '<li class="tab-content '. esc_attr( $classes ) .' clearfix">'. do_shortcode( $item->description ) .'</li>';
			}
		}
		
		$output .= "</li>\n".$description;
	}
}