<?php
/*
Single Post Template: Right Sidebar
*/
?>
<?php get_header(); ?>
<?php if ( ! function_exists( 'mnky_ajax_enqueue_scripts' )) { mnky_setPostViews( get_the_ID() );} ?>
<?php get_sidebar('before-post'); ?>

		<div id="container" class="clearfix">

				<div id="content" class="float-left">
				
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'single' ); ?>
						
						<?php
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						} ?>
						
					<?php endwhile; ?>
						
				</div><!-- #content -->
				
				<div itemscope itemtype="http://schema.org/WPSideBar" id="sidebar" class="float-right">
					<?php get_sidebar('blog'); ?>
				</div>			

		</div><!-- #container -->

<?php get_footer(); ?>