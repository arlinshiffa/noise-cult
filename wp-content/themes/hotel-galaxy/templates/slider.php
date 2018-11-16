<?php 
$slider_details = hotel_galaxy_get_slider_details();
$hotel_galaxy_default_setting=hotel_galaxy_default_setting(); 
$hotel_option = wp_parse_args(get_option( 'hotel_galaxy_option', array() ), $hotel_galaxy_default_setting ); 

?>
<!--Main slider-->
<section class="main-carousel" role="slider" style="padding:0;">
	
	<?php
	if(count($slider_details)>0){
		?>
		<div id="main-slider" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<?php				
				$cont=1;
				foreach( $slider_details as $slide){
					?> 

					<div class="item <?php echo ($cont==1)? __('active','hotel-galaxy') :''; ?>">					
						<img src="<?php echo esc_url( $slide['image_url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>">
						<div class="<?php echo ($hotel_option['slider_smartphone_res']) ? __('hidden-xs','hotel-galaxy') :'' ?> carousel-caption intro-caption">
							<div class="slide-info">
								<h1 class="slider-title animate zoomIn" data-anim-type="zoomIn" data-anim-delay="200"><?php echo wp_kses_post( $slide['title'] ); ?></h1>
								<?php if(!empty($slide['excerpt'])){
									?>
									<p class="animate zoomIn" data-anim-type="zoomIn" data-anim-delay="400"><?php echo esc_attr( $slide['excerpt'] ); ?></p>
									<?php
								} ?>
								
								<?php 
								if(!empty($hotel_option['slider_sec_btn']))
								{
									?>
									<a target="_blank" href="<?php echo esc_url( $slide['url'] ); ?>" class="custom-btn book-lg animate fadeInUp"><?php echo esc_attr($hotel_option['slider_sec_btn']) ?></a> 
									<?php
								}

								?>

							</div>
						</div>
					</div>
					<?php
					$cont++;
				}
				?>
			</div> 
			<!-- Pagination --> 
			<?php if($cont > 2){
				?>
				<ul class="carousel-navigation">
					<li><a class="carousel-prev" href="#main-slider" data-slide="prev"></a></li>
					<li><a class="carousel-next" href="#main-slider" data-slide="next"></a></li>
				</ul> 
				<?php
			}?>
			
			<!-- /Pagination -->
		</div>
		
		<?php

	}else{				
		?>
		<div id="main-slider" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="item active" style="max-height:650px;">					
					<img src="<?php echo esc_url(Hotel_galaxy_Template_Dir_Uri.'/images/no-image.png'); ?>" alt="No Image">
					<div class="carousel-caption intro-caption">
						<h1 class="slider-title animate zoomIn" data-anim-type="zoomIn" data-anim-delay="200"><?php _e( 'No Title','hotel-galaxy' ); ?></h1>
						<p class="animate zoomIn" data-anim-type="zoomIn" data-anim-delay="400"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing Lorem ipsum dolor sit amet, consectetur adipisicing','hotel-galaxy' ); ?></p>
						<a href="#" class="custom-btn book-lg animate fadeInUp"><?php _e('Book Now','hotel-galaxy'); ?></a> 
					</div>
				</div>

			</div> 
			<!-- Pagination --> 
			<ul class="carousel-navigation">
				<li><a class="carousel-prev" href="#main-slider" data-slide="prev"></a></li>
				<li><a class="carousel-next" href="#main-slider" data-slide="next"></a></li>
			</ul> 
			<!-- /Pagination -->
		</div>
		<?php				
	}
	?>

</section> 
<!--/Main slider-->
<div class="clearfix"></div>