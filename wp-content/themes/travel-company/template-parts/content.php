<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Company
 */
?>

<div class="col-lg-6 col-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!-- Single Blog -->
		<div class="single-blog">
			<?php if(has_post_thumbnail()): ?>
				<div class="blog-head">
					<?php
					the_post_thumbnail( 'medium', array( 'class' => 'img-responsive' ) );
					?>
				</div>
			<?php endif; ?>
			<div class="blog-content">
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<div class="meta"><?php travel_company_posted_on();?> <span>|</span> 2 Comments</div>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html('Read More','travel-company'); ?></a>
			</div>
		</div>
		<!--/ End Single Blog -->
	</article>
</div>
