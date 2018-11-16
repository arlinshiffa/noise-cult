<?php get_header(); ?>

		<?php 
			// Layout setting
			$page_layout = ot_get_option('blog_layout', 'right-sidebar' );
			
			if( is_category() ){
				$category_styles = ot_get_option( 'category_styles', array() );
				if( ! empty( $category_styles ) ) {
					foreach( $category_styles as $category_style ) {
						if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
							if( $category_style['cat_layout'] != '' ){
								$page_layout = $category_style['cat_layout'];
							}
						}
					}
				}
			}
		
		?>


		<div id="container">
			<?php if( $page_layout == 'full-width' ) : ?>
		
				<div id="content">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'content' );
						endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;
					?>
					
					<div class="pagination">
						<?php mnky_numeric_pagination();?>
					</div>
				</div><!-- #content -->
				
			<?php else : ?>

				<div id="content" class="<?php if( $page_layout == 'right-sidebar' ) { echo 'float-left'; } else { echo 'float-right'; } ?>">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'content' );
						endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;
					?>
					
					<div class="pagination">
						<?php mnky_numeric_pagination();?>
					</div>

				</div><!-- #content -->

				<div id="sidebar" class="<?php if( $page_layout == 'right-sidebar' ) { echo 'float-right'; } else { echo 'float-left'; } ?>">
					<?php get_sidebar('blog'); ?>
				</div>
				
			<?php endif; ?>
		</div><!-- #container -->
		
<?php get_footer(); ?>