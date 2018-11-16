<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Post Content Top Sidebar
*	--------------------------------------------------------------------- 
*/
?>

		<?php if ( is_active_sidebar( 'post-content-top-sidebar' ) ) : ?>
		<aside id="post-content-top-sidebar" class="clearfix">
			<div class="post-widget-area">
					<?php dynamic_sidebar( 'post-content-top-sidebar' ); ?>
			</div>
		</aside>
		<?php endif; ?>	
