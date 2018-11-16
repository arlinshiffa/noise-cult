<?php
function mnky_ot_typography_fields( $array, $field_id ) {
    
	if ( $field_id == "menu_font" ) {
		$array = array( 'font-family', 'font-weight', 'letter-spacing', 'text-transform' );
	} else {
		$array = array( 'font-family', 'font-weight', 'line-height', 'letter-spacing', 'text-transform' );
	}
	return $array;
}
add_filter( 'ot_recognized_typography_fields', 'mnky_ot_typography_fields', 10, 2 );