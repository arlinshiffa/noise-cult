<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Company
 */

?>
<div class="col-12">
	<div class="single-blog">
		<?php if(has_post_thumbnail()): ?>
			<div class="blog-head">
				<?php
				travel_company_post_thumbnail(); 
				?>
			</div>
		<?php endif; ?>
		<div class="blog-content">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<div class="meta"><?php travel_company_posted_on();?><span>|</span> 2 Comments</div>
			<?php the_content(); 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-company' ),
				'after'  => '</div>',
			) );?>
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'travel-company' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div>
	</div>
	<!--/ End Single Blog -->
</div>