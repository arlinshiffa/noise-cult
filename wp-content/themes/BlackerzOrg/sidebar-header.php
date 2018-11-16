<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Header Sidebar
*	--------------------------------------------------------------------- 
*/
?>
<div id="header-sidebar" class="clearfix">

		<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
			<ul class="header-widget-area">
					<?php dynamic_sidebar( 'header-sidebar' ); ?>
			</ul>
		<?php endif; ?>	

</div>