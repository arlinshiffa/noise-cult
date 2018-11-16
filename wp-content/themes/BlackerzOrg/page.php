<?php
/**
 * The template for displaying all pages
 */
?>

<?php get_header(); ?>

		<div id="container">
			<div id="content">

				<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> >
					<div class="entry-content clearfix">
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
				</article>

				<?php if ( comments_open() ) {
					comments_template( '', true );
				} ?>
				<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #container -->
		
<?php get_footer(); ?>