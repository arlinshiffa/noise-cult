<?php
/**
 *
 * Template Name: Page with left sidebar
 *
 * @package Hotel Pagoda
 */

get_header(); ?>

    <div class="section-content section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="secondary">
                        <?php if (is_active_sidebar('hotel_pagoda_main_sidebar')) {
                            dynamic_sidebar('hotel_pagoda_main_sidebar');
                        } ?>
                    </div>

                </div>

                <div class="col-md-8">

                    <div id="primary" class="content-area">

                        <main id="main" class="site-main">

                            <?php
                            while (have_posts()) : the_post();

                                get_template_part('template-parts/content', 'page');

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div>

            </div>
        </div>
    </div>

<?php
get_footer();
