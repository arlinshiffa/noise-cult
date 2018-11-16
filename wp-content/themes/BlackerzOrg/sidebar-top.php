<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Top bar sidebar
*	--------------------------------------------------------------------- 
*/
?>

<?php 
$top_bar = ot_get_option('top_bar');

if( is_category() || is_single() ){
	$category_styles = ot_get_option( 'category_styles', array() );
	if( ! empty( $category_styles ) ) {
		foreach( $category_styles as $category_style ) {
			if( $category_style['custom_header'] != '' ) {
				if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
					$top_bar = get_post_meta( $category_style['custom_header'], 'top_bar', true);
				}
				if( is_single() && $category_style['cs_select'] != '' && in_category( $category_style['cs_select'] )  && $category_style['cs_header_posts'] != 'off' ) {
					$top_bar = get_post_meta( $category_style['custom_header'], 'top_bar', true);
				}			
			}			
		}
	}
}

if( is_page() || is_single() ){
	$custom_header = get_post_meta( get_the_ID(), 'custom_header', true);
	if( $custom_header != '' ) {
		$top_bar = get_post_meta( $custom_header, 'top_bar', true);
	}
}
?>

<?php if ( $top_bar == 'on' && ( is_active_sidebar( 'top-left-widget-area' ) || is_active_sidebar( 'top-right-widget-area' ) ) ) : ?>

	<div id="top-bar-wrapper" class="clearfix">
		<div id="top-bar" itemscope itemtype="http://schema.org/WPSideBar">
		
			<?php if ( is_active_sidebar( 'top-left-widget-area' ) ) : ?>
				<div id="topleft-widget-area">
					<ul>
						<?php dynamic_sidebar( 'top-left-widget-area' ); ?>
					</ul>
				</div>
			<?php endif; ?>	
			
			<?php if ( is_active_sidebar( 'top-right-widget-area' ) ) : ?>
				<div id="topright-widget-area" class="clearfix">
					<ul>
						<?php dynamic_sidebar( 'top-right-widget-area' ); ?>
					</ul>
				</div>
			<?php endif; ?>	

		</div>
	</div>
	
<?php endif; ?>	
