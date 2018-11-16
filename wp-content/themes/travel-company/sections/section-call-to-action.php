<?php
$cta_enable = get_theme_mod( 'travel_company_cta_enable', '1' );
$cta_text =  get_theme_mod( 'travel_company_cta_text', __( 'About Company', 'travel-company' ) );
$cta_title =  get_theme_mod( 'travel_company_cta_title', __( 'Worthy time spent around the world with traveltrek.', 'travel-company' ) );
$cta_btn_text =  get_theme_mod( 'travel_company_cta_button_text', __( 'Book your trip', 'travel-company' ) );
$cta_btn_url =  get_theme_mod( 'travel_company_cta_button_url', __( '#', 'travel-company' ) );
$cta_bg_img =  get_theme_mod( 'travel_company_cta_bg_image' );
if($cta_enable):
	?>
<!-- Call To Action -->
	<section id="cta" class="cta section" style="  	background-image: url('<?php echo esc_url($cta_bg_img);?>');">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="cta-text">
						<div class="title-line">
							<p><?php echo esc_html($cta_text);?></p>
							<h2><?php echo esc_html($cta_title);?></h2>
						</div>
						<a href="<?php echo esc_html($cta_btn_url);?>" class="btn"><?php echo esc_html($cta_btn_text);?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Call To Action -->
<?php endif;?>	