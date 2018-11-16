<div class="middle-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-12">
				<!-- Logo -->
				<div class="logo">
					<?php 
					if(has_custom_logo()):
						the_custom_logo();
					else:    
						?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url());?>"><?php bloginfo('title');?></a></h1>
						<p class="site-description"><?php bloginfo('description');?></p>   
					<?php endif;?>
				</div>
				<!--/ End Logo -->
				<div class="mobile-nav"></div>
			</div>
			<div class="col-lg-9 col-md-9 col-12">
				<!-- Header Widget -->
				<div class="header-widget">
					<!-- Single Widget -->
					<?php middle_header_widget_items();?>
					<!--/ End Single Widget -->
				</div>
				<!--/ End Header Widget -->
			</div>
		</div>
	</div>
</div>