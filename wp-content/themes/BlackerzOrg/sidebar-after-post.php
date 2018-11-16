<?php
/*	
*	---------------------------------------------------------------------
*	MNKY After single post sidebar
*	--------------------------------------------------------------------- 
*/
?>
<aside id="after-post-sidebar" class="clearfix">

		<?php if ( is_active_sidebar( 'after-single-post-sidebar' ) ) : ?>
			<div class="after-post-widget-area">
					<?php dynamic_sidebar( 'after-single-post-sidebar' ); ?>
			</div>
		<?php endif; ?>	

</aside>