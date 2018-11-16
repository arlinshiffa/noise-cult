<?php
$blog_enable = get_theme_mod( 'travel_company_blog_enable', '1' );
$blog_text =  get_theme_mod( 'travel_company_blog_text', __( 'News & Blog', 'travel-company' ) );
$blog_title =  get_theme_mod( 'travel_company_blog_title', __( 'Latest Updates', 'travel-company' ) );
$blog_category_id = get_theme_mod( 'travel_company_blog_category_id' );
$blog_display_number = get_theme_mod( 'travel_company_blog_number' );

if($blog_enable):
	?>
	<!-- Blog Area -->
	<section id="blog-area" class="blog-area section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="title-line center">
						<p><?php echo esc_html($blog_text);?></p>
						<h2><?php echo esc_html($blog_title);?></h2>
					</div>
				</div>   
			</div>
			<div class="row">
				<?php  $args = array(
					'post_type' => 'post',
					'posts_per_page' => $blog_display_number,
					'post_status' => 'publish',
					'paged' => 1,
					'cat' => $blog_category_id,

				);
				$blogsloop = new WP_Query($args);
				if ( $blogsloop->have_posts() ) :
					while ($blogsloop->have_posts()) : $blogsloop->the_post(); 
						?>
						<div class="col-lg-4 col-md-4 col-12">
							<!-- Single Blog -->
							<div class="single-blog">
								<?php 
								if(has_post_thumbnail()): ?>
									<div class="blog-head">
										<?php the_post_thumbnail('travel-company-blogs-850x550'); ?>
									</div>
								<?php endif;?>
								<div class="blog-content">
									<span><?php date('F J Y');?></span>
									<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
									<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__('Read More','travel-company');?></a>
								</div>
							</div>
							<!--/ End Single Blog -->
						</div>
					<?php endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</section>
	<!--/ End Blog Area -->
	<?php endif;?>	