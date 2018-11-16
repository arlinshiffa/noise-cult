<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Mobile Menu Sidebar
*	--------------------------------------------------------------------- 
*/
?>

		<?php if ( is_active_sidebar( 'mobile-menu-widget-area' ) ) : ?>
		<div id="mobile-menu-sidebar" class="clearfix">
			<?php dynamic_sidebar( 'mobile-menu-widget-area' ); ?>
		</div>
		<?php endif; ?>	
