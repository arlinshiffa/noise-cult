<?php
$p_trips_enable = get_theme_mod( 'travel_company_p_trips_enable', '1' );
$p_trips_page_id = get_theme_mod( 'travel_company_p_trips_page_title' );
$p_trips_text =  get_theme_mod( 'travel_company_p_trips_text', __( 'Popular Trips', 'travel-company' ) );
$query_post =  get_post($p_trips_page_id);
$p_trips_title = $query_post->post_title;
$p_trips_description = $query_post->post_content;  
$p_trips_image = get_the_post_thumbnail_url($p_trips_page_id, 'travel-company-trips-bg-2000x1000');
$p_trips_count = get_theme_mod('travel_company_p_trips_items_number',3);
if($p_trips_enable):
	?>
	<!-- Popular Trips -->
	<section id="popular-trips" class="popular-trips section overlay" style="background-image:url('<?php echo esc_url($p_trips_image);?>');">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-12">
					<div class="title-line">
						<p class="title"><?php echo esc_html($p_trips_text);?></p>
						<h2><?php echo esc_html($p_trips_title);?></h2>
						<p class="text"><?php echo esc_html($p_trips_description);?></p>
					</div>
				</div> 
			</div>
			<div class="row">
				<div class="col-12">
					<div class="trips-main">
						<!-- Trips Slider -->
						<div class="trips-slider">
							<?php
							$popular_trips_args = array(
								'post_type'         => 'trip',
								'posts_per_page'    => absint( $p_trips_count ),
								'meta_key'          => 'travel_company_helper_track_post_views',
								'orderby'           => 'meta_value_num',
								'order'             => 'DESC'
							);        
							$popular_trips_query = new WP_Query( $popular_trips_args );
							?>     
							<?php
							if ( $popular_trips_query->have_posts() ) {
								while ( $popular_trips_query->have_posts() ) {
									$popular_trips_query->the_post();?>
									<!-- Single Slider -->
									<div class="single-slider">
										<?php if(has_post_thumbnail()):?>
											<div class="trip-head">
												<?php the_post_thumbnail( 'travel-company-general-344x230' );?>
											</div>
										<?php endif;?>
										<div class="trip-details">
											<?php
											$meta     = get_post_meta( get_the_ID(), 'wp_travel_engine_setting', true ); 
											$currency = travel_company_get_trip_currency(); ?>
											<div class="left">
												<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
												<p><i class="fa fa-clock-o"></i>
													<?php 
													if( ( isset( $meta['trip_duration'] ) && '' != $meta['trip_duration'] ) || ( isset( $meta['trip_duration_nights'] ) ) && '' != $meta['trip_duration_nights'] ){?>
														<?php
														if( $meta['trip_duration'] ) 
															 /* translators: %s: Popular Trips Duration */ 
															printf( esc_html__( '%s Days', 'travel-company' ), absint( $meta['trip_duration'] ));
														if( $meta['trip_duration_nights'] ) 
															 /* translators: %s: Popular Trips Duration Nights */ 
															printf( esc_html__( ' - %s Nights', 'travel-company' ), absint( $meta['trip_duration_nights'] ) ); 
														?>
													<?php }?>
												</div>


												<div class="right">
													<p><?php echo esc_html__('From','travel-company');?><span><?php echo esc_html($currency);?><?php 
													if( isset( $meta['trip_prev_price'] ) && ! empty( $meta['trip_prev_price'] ) ){
														echo esc_html($meta['trip_prev_price']);
													}
													?></span></p>
												</div>
												<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__('View More','travel-company');?></a>
											</div>
										</div>
										<!--/ End Single Trips -->
									<?php  }

								} else {?>
									<div class="travel-company-no-popular-trips-found"><?php esc_html_e( 'No Popular trips found', 'travel-company' ); ?></div>
								<?php }
								wp_reset_postdata();?>
							</div>
							<!--/ End Trips Slider -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Popular Trips -->
		<?php endif;?>	