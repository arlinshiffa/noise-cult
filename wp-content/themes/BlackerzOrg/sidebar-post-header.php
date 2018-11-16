<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Post Header Sidebar
*	--------------------------------------------------------------------- 
*/
?>
<aside id="post-header-sidebar" class="clearfix">

		<?php if ( is_active_sidebar( 'post-header-sidebar' ) ) : ?>
			<div class="post-header-widget-area">
					<?php dynamic_sidebar( 'post-header-sidebar' ); ?>
			</div>
		<?php endif; ?>	

</aside>