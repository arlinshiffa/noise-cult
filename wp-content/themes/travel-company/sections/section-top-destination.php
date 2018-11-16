<?php
$t_destination_enable = get_theme_mod( 'travel_company_t_destination_enable', '1' );
$t_destination_text =  get_theme_mod( 'travel_company_t_destination_text', __( 'World\'s Best Tourist Destinations', 'travel-company' ) );
$t_destination_heading =  get_theme_mod( 'travel_company_t_destination_heading', __( 'Book your Trip', 'travel-company' ) );
$t_destination_subheading =  get_theme_mod( 'travel_company_t_destination_subheading', __( 'Top Destination', 'travel-company' ) );

if($t_destination_enable):
	?>
	<!-- Top Destination -->
	<section id="top-destination" class="top-destination section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="title-line center">
						<p><?php echo esc_html($t_destination_text);?></p>
						<h2><span><?php echo esc_html($t_destination_heading);?></span><?php echo esc_html($t_destination_subheading);?></h2>
					</div>
				</div> 
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Destination Tab -->
					<div class="destination-inner">
						<!-- Nav Tab  -->                                                                                                   
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<?php for($i=1;$i<=6;$i++):
								$t_destination_cat[$i] = get_theme_mod( 'travel_company_t_destination_'.$i );
								$t_destination_cat_info[$i] = get_term( $t_destination_cat[$i], 'destination' );
								if ( $t_destination_cat_info[$i] && !is_wp_error($t_destination_cat_info[$i] ) ) :
									?>
								<li class="nav-item"><a class="nav-link <?php echo (($i == 1) ? 'active' : '');?>" data-toggle="tab" href="#t-tab<?php echo absint($i);?>" role="tab"><?php echo esc_html($t_destination_cat_info[$i]->name);?></a></li>
								<?php 
							endif;
						endfor;
						?>
					</ul>
					<!--/ End Nav Tab -->
					<div class="tab-content" id="myTabContent">
						<?php for($i=1;$i<=6;$i++):?>
							<div class="tab-pane fade  <?php echo ((($i) == 1) ? 'show active' : '');?>" id="t-tab<?php echo absint($i);?>" role="tabpanel">
								<div class="row">
									<?php
									if(isset($t_destination_cat[$i]) && ($t_destination_cat[$i] != '')):
										wp_reset_query();
									$args = array('post_type' => 'trip',
										'tax_query' => array(
											array(
												'taxonomy' => 'destination',
												'field' => 'term_id',
												'terms' => $t_destination_cat[$i],
											),
										),
										'posts_per_page' =>'6'
									);
									$loop = new WP_Query($args);

									if($loop->have_posts()) :
										?>
										<?php while($loop->have_posts()) : $loop->the_post();?>
											<div class="col-lg-4 col-md-6 col-12">
												<!-- Single Tab -->
												<div class="single-package">
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
															</p>
														</div>
														<div class="right">
															<p><?php echo esc_html__('From','travel-company');?><span><?php echo esc_html($currency);?><?php 
															if( isset( $meta['trip_prev_price'] ) && ! empty( $meta['trip_prev_price'] ) ){
																echo esc_html($meta['trip_prev_price']);
															}
															?></span></p>
														</div>
														<a href="<?php the_permalink();?>" class="btn primary"><?php echo esc_html__('View More','travel-company');?></a>
													</div>
												</div>
												<!--/ End Single Tab -->
											</div>
											<?php 
										endwhile;
									endif;
								endif;?>
							</div>
						</div>
					<?php endfor;?>	
				</div>
			</div>
			<!--/ End Destination Tab -->
		</div>
	</div>
</div>
</section>
<!--/ End Top Destination -->
<?php endif;?>	