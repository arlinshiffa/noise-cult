<?php
$about_enable = get_theme_mod( 'travel_company_about_enable', '1' );
$about_page_id = get_theme_mod( 'travel_company_about_page_title' );
$about_text =  get_theme_mod( 'travel_company_about_text', __( 'About Company', 'travel-company' ) );
$query_post =  get_post($about_page_id);
$about_title = $query_post->post_title;
$about_description = $query_post->post_content;  
$about_image = get_the_post_thumbnail_url($about_page_id, 'travel-company-about-thumb-500x680');
if($about_enable):
	?>
	<!-- About Us -->
	<section id="about-us" class="about-us section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12">
					<!-- About Left -->
					<div class="about-left">
						<?php if($about_image):?>
							<img src="<?php echo esc_url($about_image);?>" alt="#">
						<?php endif;?>
					</div>
					<!--/ End About Left -->
				</div>
				<div class="col-lg-6 col-12">	
					<!-- About Right -->
					<div class="about-right">
						<div class="title-line">
							<p><?php echo esc_html($about_text);?></p>
							<h2><?php echo esc_html($about_title);?></h2>
						</div>
						<div class="about-main">
							<?php echo esc_html($about_description);?>
							<!-- Skill Main -->
							<div class="skill-main">
								<div class="row">
									<?php travel_company_skill_items();?>
								</div>
							</div>
							<!--/ End Skill Main -->
						</div>
					</div>
					<!--/ End About Right -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End Main Area -->
	<?php endif;?>