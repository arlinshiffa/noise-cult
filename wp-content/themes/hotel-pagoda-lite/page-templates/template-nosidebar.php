<?php
/**
 *
 * Template Name: Page with no sidebar
 *
 * @package Hotel Pagoda
 */

get_header();
?>
    <div class="section-content section">
        <div class="container">
            <div class="row">
                <main id="main" class="site-main" role="main">

                    <?php
                    if(has_post_thumbnail()){
                        the_post_thumbnail();
                    }
                    while ( have_posts() ) : the_post();

                        the_content();

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div>
        </div>
    </div>
<?php
get_footer();
