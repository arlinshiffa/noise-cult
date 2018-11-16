<?php
/*	
*	---------------------------------------------------------------------
*	MNKY Footer sidebar
*	--------------------------------------------------------------------- 
*/
?>

<footer class="site-footer" id="site-footer" itemscope itemtype="http://schema.org/WPFooter">

		<?php if ( is_active_sidebar( 'footer-widget-area-1' ) || is_active_sidebar( 'footer-widget-area-2' ) || is_active_sidebar( 'footer-widget-area-3' ) || is_active_sidebar( 'footer-widget-area-4' ) ) : ?>
			<div class="footer-sidebar clearfix" itemscope itemtype="http://schema.org/WPSideBar">
				<div class="inner">
				<div class="vc_row wpb_row">
					<?php if ( is_active_sidebar( 'footer-widget-area-1' ) ) : ?>
						<div class="<?php echo ot_get_option('footer_columns', 'vc_col-sm-3') ?>">
							<div class="widget-area">
								<?php dynamic_sidebar( 'footer-widget-area-1' ); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-widget-area-2' ) ) : ?>
						<div class="<?php echo ot_get_option('footer_columns', 'vc_col-sm-3') ?>">
							<div class="widget-area">
								<?php dynamic_sidebar( 'footer-widget-area-2' ); ?>
							</div>	
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-widget-area-3' ) ) : ?>
						<div class="<?php echo ot_get_option('footer_columns', 'vc_col-sm-3') ?>">
							<div class="widget-area">
								<?php dynamic_sidebar( 'footer-widget-area-3' ); ?>
							</div>	
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-widget-area-4' ) ) : ?>
						<div class="<?php echo ot_get_option('footer_columns', 'vc_col-sm-3') ?>">
							<div class="widget-area">
								<?php dynamic_sidebar( 'footer-widget-area-4' ); ?>
							</div>	
						</div>
					<?php endif; ?>
				</div><!-- .vc_row -->
				</div><!-- .inner -->
			</div><!-- .footer-sidebar -->
		<?php endif; ?>	
		
		<?php if ( is_active_sidebar( 'copyright-widget-area' ) ) : ?>	
			<div class="site-info" itemscope itemtype="http://schema.org/WPSideBar"> 
				<div class="inner">
					<?php dynamic_sidebar( 'copyright-widget-area' ); ?>
				</div>
			</div>	
		<?php endif; ?>	
		
</footer><!-- .site-footer -->