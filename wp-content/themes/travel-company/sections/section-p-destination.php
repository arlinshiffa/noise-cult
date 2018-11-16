<?php
$p_destination_enable = get_theme_mod( 'travel_company_popular_destination_enable', '1' );
$p_destination_title =  get_theme_mod( 'travel_company_popular_destination_title', __( 'Popular Destinations Offered', 'travel-company' ) );
$p_destination_description = get_theme_mod( 'travel_company_popular_destination_description', __( 'World\'s Best Tourist Destinations', 'travel-company' ) );

for($i=1;$i<=6;$i++){
	$p_destination_cat[$i] = get_theme_mod( 'travel_company_p_destination_'.$i );
	$p_destination_price[$i] =  get_theme_mod( 'travel_company_p_destination_price_'.$i );
	$p_destination_cat_info[$i] = get_term( $p_destination_cat[$i], 'destination' );
	$image[$i] = get_term_meta ( $p_destination_cat[$i], 'category-image-id', true );
}
$destination_thumb_size_1 = apply_filters('wp_travel_engine_destination_img_size', 'travel-company-p-destination-fl-thumb-571x235');
$destination_thumb_size_2 = apply_filters('wp_travel_engine_destination_img_size', 'travel-company-p-destination-stsl-thumb-270x235');
if($p_destination_enable):
	?>
	<!-- Popular Destination -->
	<section id="p-destination" class="p-destination section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="title-line center">
						<p><?php echo esc_html($p_destination_description);?></p>
						<h2><?php echo esc_html($p_destination_title);?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Destination -->
					<div class="destination-main">
						<div class="row">
							<?php for($i=1;$i<=6;$i++):
								if($i==1 || $i == 6):
									?>

									<div class="col-lg-6 col-12">
										<!-- Single Destination -->
										<div class="single-destination overlay">
											<?php 
											{
												if(isset($image[$i]) && $image[$i] !=''):
													echo wp_get_attachment_image ( $image[$i], $destination_thumb_size_1 );
												endif;
											}
											?>
											<div class="hover">
												<p class="price"><?php echo esc_html__('FROM','travel-company');?> <span><?php echo esc_html($p_destination_price[$i]);?></span></p>
												<?php if(isset($p_destination_cat[$i]) && ($p_destination_cat[$i] != '')):?>
												<h4 class="name"><?php echo esc_html($p_destination_cat_info[$i]->name);?></h4>
												<p class="location"><?php echo esc_html($p_destination_cat_info[$i]->description);?></p>
											<?php endif;?>
										</div>
									</div>
									<!--/ End Destination -->
								</div>

								<?php else :?>
									<div class="col-lg-3 col-12">
										<!-- Single Destination -->
										<div class="single-destination overlay">
											<?php 
											{
												if(isset($image[$i]) && $image[$i] !=''):
													echo wp_get_attachment_image ( $image[$i], $destination_thumb_size_2 );
												endif;
											}
											?>
											<div class="hover">
												<p class="price" id="price<?php echo absint( $i );?>"><?php echo esc_html__('FROM','travel-company');?> <span><?php echo esc_html($p_destination_price[$i]);?></span></p>
												<h4 class="name"><?php echo esc_html($p_destination_cat_info[$i]->name);?></h4>
												<p class="location"><?php echo esc_html($p_destination_cat_info[$i]->description);?></p>
											</div>
										</div>
										<!--/ End Destination -->
									</div>
								<?php endif;
							endfor;?>
						</div>
					</div>
					<!--/ End Destination -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End Popular Destination -->
	<?php endif;?>	