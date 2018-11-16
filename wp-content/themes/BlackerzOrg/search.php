<?php get_header(); ?>

		<div id="container">
			<?php if( ot_get_option('blog_layout') == 'full-width' ) : ?>
		
				<div id="content">
					<div class="results-container">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content', get_post_format() );
							endwhile;
						else :
							get_template_part( 'content', 'none' );
						endif;
						?>
					</div>
					
					<nav class="pagination" role="navigation">
						<?php mnky_numeric_pagination();?>
					</nav>

				</div><!-- #content -->
				
			<?php else : ?>

				<div id="content" class="<?php if( ot_get_option('blog_layout') == 'right-sidebar' ) { echo 'float-left'; } else { echo 'float-right'; } ?>">
					<div class="results-container">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'content', get_post_format() );
							endwhile;
						else :
							get_template_part( 'content', 'none' );
						endif;
						?>
					</div>	
					
					<nav class="pagination" role="navigation">
						<?php mnky_numeric_pagination();?>
					</nav>

				</div><!-- #content -->

				<div id="sidebar" class="<?php if( ot_get_option('blog_layout') == 'right-sidebar' ) { echo 'float-right'; } else { echo 'float-left'; } ?>">
					<?php get_sidebar('blog'); ?>
				</div>
			<?php endif; ?>
		</div><!-- #container -->
		
<?php get_footer(); ?>