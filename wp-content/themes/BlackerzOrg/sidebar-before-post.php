<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Before single post sidebar
*	--------------------------------------------------------------------- 
*/
?>
		<?php if ( is_active_sidebar( 'before-single-post-sidebar' ) && get_post_meta( get_the_ID(), 'post_header_style', true) == 'style_deafault' || is_active_sidebar( 'before-single-post-sidebar' ) && get_post_meta( get_the_ID(), 'post_header_style', true) == 'style_1' ) : ?>
		<aside id="before-post-sidebar" class="clearfix">
			<div class="before-post-widget-area">
					<?php dynamic_sidebar( 'before-single-post-sidebar' ); ?>
			</div>
		</aside>
		<?php endif; ?>	