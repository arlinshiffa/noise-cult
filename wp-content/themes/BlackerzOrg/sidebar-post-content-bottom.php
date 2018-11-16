<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Post Content Bottom Sidebar
*	--------------------------------------------------------------------- 
*/
?>
		<?php if ( is_active_sidebar( 'post-content-bottom-sidebar' ) ) : ?>
		<aside id="post-content-bottom-sidebar" class="clearfix">		
			<div class="post-widget-area">
					<?php dynamic_sidebar( 'post-content-bottom-sidebar' ); ?>
			</div>
		</aside>	
		<?php endif; ?>	
		