<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Menu Sidebar
*	--------------------------------------------------------------------- 
*/
?>
		<?php if ( is_active_sidebar( 'menu-sidebar' ) ) : ?>
		<div id="menu-sidebar">
			<ul class="menu-widget-area">
					<?php dynamic_sidebar( 'menu-sidebar' ); ?>
			</ul>
		</div>
		<?php endif; ?>	