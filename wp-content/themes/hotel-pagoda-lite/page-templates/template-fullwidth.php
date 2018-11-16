<?php
/**
 *
 * Template Name: Full width - Blank Container
 *
 * @package Hotel Pagoda
 */

get_header();
?>
<div class="section-content">
<?php while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/content', 'page' );

endwhile; // End of the loop.
?>
</div>
<?php get_footer();