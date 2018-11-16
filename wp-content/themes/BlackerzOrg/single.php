<?php get_header(); ?>
<?php if ( ! function_exists( 'mnky_ajax_enqueue_scripts' )) { mnky_setPostViews( get_the_ID() );} ?>
<?php get_sidebar('before-post'); ?>
		<div id="container">
				<div id="content">
				
					<?php while ( have_posts() ) : the_post(); ?>
										
						<?php get_template_part( 'content', 'single' ); ?>
						
						<?php
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						} ?>
						
					<?php endwhile; ?>
						
				</div><!-- #content -->				
		</div><!-- #container -->
<?php get_footer(); ?>