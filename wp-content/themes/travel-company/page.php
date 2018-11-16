<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
* @package Travel_Company
 */

get_header(); ?>


	<!-- Blog Grid -->
	<section id="blog-area" class="blog-area archive grid section">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="col-lg-8 col-12">
				<?php else: ?>
				<div class="col-lg-12 col-12">
				<?php endif; ?>

					<div class="row">

					<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.
						?>

								</div>
							</div>
							<?php if ( is_active_sidebar( 'sidebar-1' ) ) : 
								get_sidebar(); 
					endif; ?>
		</div>
	</section>
	<!--/ End Blog Grid -->


<?php get_footer();
