<div class="footer-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Single Widget -->
				<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
					<?php dynamic_sidebar( 'footer-1' );?>
				<?php } ?>
				<!--/ End Single Widget -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Single Widget -->
				<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
					<?php dynamic_sidebar( 'footer-2' );?>
				<?php } ?>
				<!--/ End Single Widget -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Single Widget -->
				<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
					<?php dynamic_sidebar( 'footer-3' );?>
				<?php } ?>
				<!--/ End Single Widget -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Single Widget -->
				<div class="single-widget about">
					<!-- Single Widget -->
				<?php if ( is_active_sidebar( 'footer-4' ) ) { ?>
					<?php dynamic_sidebar( 'footer-4' );?>
				<?php } ?>
				<!--/ End Single Widget -->
				</div>
				<!--/ End Single Widget -->
			</div>
		</div>
	</div>
</div>