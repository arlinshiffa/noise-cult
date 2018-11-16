<?php
$service_enable = get_theme_mod( 'travel_company_service_enable', '1' );
$service_page_id = get_theme_mod( 'travel_company_service_page_title' );  
$service_query = get_post($service_page_id);
$service_image = get_the_post_thumbnail_url($service_page_id, 'travel-company-service-960x510');
if($service_enable):
	?>	
	<!-- Services -->
	<section id="services" class="services">
		<div class="container-fluid no-padding">
			<div class="service-img overlay" data-stellar-background-ratio="0.7" style="background-image: url(<?php echo esc_url($service_image);?>);">
				<div class="video-play">
					<?php if($service_query->post_content):?>
						<a href="<?php echo esc_url($service_query->post_content);?>" class="btn video-popup mfp-fade"><i class="fa fa-play"></i></a>
					<?php endif;?>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="offset-lg-6 col-lg-6 col-12">
					<div class="row no-gutters">
						<?php
						$args = array (
							'post_type' => 'service',
							'post_per_page' => 4,
							'orderby'           =>'post__in',
						);
						$serviceloop = new WP_Query($args);
						if ($serviceloop->have_posts()) :  while ($serviceloop->have_posts()) : $serviceloop->the_post(); ?>
							<div class="col-lg-6 col-md-6 col-12">
								<!-- single service -->
								<div class="single-service">
									<?php $value = get_post_meta( $post->ID, '_service_icon_value_key', true );?>
									<i class="<?php echo esc_attr($value); ?>" aria-hidden="true"></i>
									<h2><?php the_title();?></h2>
									<?php the_excerpt();?>
									<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__('Read More','travel-company');?></a>
								</div>
								<!--/ End single service -->
							</div>
							<?php
							endwhile; 
							wp_reset_postdata();
						endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Services -->
		<?php endif;?>	