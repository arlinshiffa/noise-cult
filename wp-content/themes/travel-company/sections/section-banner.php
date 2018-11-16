	<!-- Hero Area -->
	<?php
	$banner_enable = get_theme_mod( 'travel_company_banner_enable', '1' );
	$banner_search_form_enable = get_theme_mod( 'travel_company_banner_advance_search_enable', '1' );
	$banner_title =  get_theme_mod( 'travel_company_banner_title_text', __( 'Simply the Best', 'travel-company' ) );
	$banner_description =  get_theme_mod( 'travel_company_banner_description_text', __( '# 1 MOST LOVED BY EVERYONE', 'travel-company' ) );
	if($banner_enable):
		?>
		<section id="hero-area" class="hero-area overlay" data-stellar-background-ratio="0.7" style="background-image:url(<?php if(has_header_image()):echo esc_url(get_header_image());endif;?>)">
			<div class="hero-main">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="hero-inner">
								<!-- Welcome Text -->
								<div class="welcome-text">	
									<p><?php echo esc_html($banner_description);?></p>
									<h1><?php echo esc_html($banner_title);?></h1>
								</div>
								<!--/ End Welcome Text -->
								<!-- Search Form -->
								<?php if($banner_search_form_enable):
									get_template_part('template-parts/content','trips-search');
								endif;?>
								<!--/ End Search Form -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Hero Area -->
		<?php endif;?>    