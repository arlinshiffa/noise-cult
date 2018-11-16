<?php
$testimonial_enable = get_theme_mod( 'travel_company_testimonials_enable', '1' );
$testimonials_page_id = get_theme_mod( 'travel_company_testimonials_page_title' );
$testimonials_category_id = get_theme_mod( 'travel_company_testimonials_category_id' );
$testimonials_display_number = get_theme_mod( 'travel_company_testimonials_number' );
$query_post =  get_post($testimonials_page_id);
$testimonials_title = $query_post->post_title;
$testimonials_description = $query_post->post_content ;  
$testimonials_image = get_the_post_thumbnail_url($testimonials_page_id, 'travel-company-testimonials-560x400');
if($testimonial_enable):
	?>	
	<!-- Testimonials -->
	<section id="testimonials" class="testimonials section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="title-line center">
						<p><?php echo esc_html($testimonials_description);?></p>
						<h2><?php echo esc_html($testimonials_title);?></h2>
					</div>  
				</div> 
			</div>
			<div class="row">
				<div class="col-12">
					<div class="testimonial-main">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<!-- Testimonial Slider -->
								<div class="testimonial-slider">
									<?php  $args = array(
										'post_type' => 'post',
										'posts_per_page' => $testimonials_display_number,
										'post_status' => 'publish',
										'paged' => 1,
										'cat' => $testimonials_category_id,

									);
									$blogsloop = new WP_Query($args);
									if ( $blogsloop->have_posts() ) :
										while ($blogsloop->have_posts()) : $blogsloop->the_post(); 
											?>
											<!-- Single Slider -->
											<div class="single-slider">
												<?php the_content();?>
												<span><?php the_title();?></span>
											</div>
											<!--/ End Single Slider -->
										<?php endwhile;
										wp_reset_postdata();
									endif;
									?>
								</div>
								<!--/ End Testimonial Slider -->
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<?php if(isset($testimonials_image) && $testimonials_image != ''):?>
									<!-- Testimonial Image -->
									<div class="testimonial-image">
										<img src="<?php echo esc_url($testimonials_image);?>" alt="#">
									</div>
									<!--/ End Testimonial Image -->
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Testimonials -->
	<?php endif;?>