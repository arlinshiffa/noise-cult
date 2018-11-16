<?php
/**
 * Template Name: Content / Left Sidebar
 */
?>

<?php get_header(); ?>

		<div id="container" class="clearfix">
			<div id="content" class="float-right">

				<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> >

					<div class="entry-content">
					<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<nav class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bitz' ) . '</span>',
						'after'       => '</nav>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
					?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php if ( comments_open() ) {
					comments_template( '', true );
				} ?>
			
			</div><!-- #content -->

			<div itemscope itemtype="http://schema.org/WPSideBar" id="sidebar" class="float-left">
				<?php get_sidebar(); ?>
			</div>

		</div><!-- #container -->
		
<?php get_footer(); ?>