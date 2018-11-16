<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Secondary menu sidebar
*	--------------------------------------------------------------------- 
*/
?>
		<?php if ( is_active_sidebar( 'secondary-menu-sidebar' ) ) : ?>
		<aside id="secondary-menu-sidebar" class="clearfix">
			<ul class="secondary-menu-widget-area">
					<?php dynamic_sidebar( 'secondary-menu-sidebar' ); ?>
			</ul>
		</aside>
		<?php endif; ?>	
