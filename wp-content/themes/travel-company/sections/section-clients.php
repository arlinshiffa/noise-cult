<?php
$client_enable = get_theme_mod( 'travel_company_clients_enable', '1' );
$client_category_id = get_theme_mod( 'travel_company_clients_category_id' );
$client_display_number = get_theme_mod( 'travel_company_client_number' );

if($client_enable):
	?>
	<!-- Clients -->
	<div id="clients" class="clients section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="clients-slider">
						<!-- Single Clients -->
						<?php  $args = array(
							'post_type' => 'post',
							'posts_per_page' => $client_display_number,
							'post_status' => 'publish',
							'paged' => 1,
							'cat' => $client_category_id,

						);
						$clientsloop = new WP_Query($args);
						if ( $clientsloop->have_posts() ) :
							while ($clientsloop->have_posts()) : $clientsloop->the_post(); 
								?>
								
								<div class="single-clients">
									<a href="<?php the_permalink();?>" target="_blank">
										<?php 
										if(has_post_thumbnail()): 
											the_post_thumbnail('travel-company-clients-220x60'); 
										endif;
										?>
									</a>
								</div>
								<!--/ End Single Clients -->
							<?php endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Clients -->
	<?php endif;?>