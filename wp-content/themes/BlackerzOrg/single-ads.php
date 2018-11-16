<?php get_header(); ?>


		<div id="container">
				<div id="content">
				
					<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="entry-content clearfix">
					<?php esc_html_e ('This post type can not be previewed.','bitz') ?>
					</div><!-- .entry-content -->					
						
					<?php endwhile; ?>
						
				</div><!-- #content -->
		</div>
<?php get_footer(); ?>