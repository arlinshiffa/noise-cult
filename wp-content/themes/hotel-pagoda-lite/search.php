<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Hotel_Pagoda
 */

get_header();
$content_class = '';
$sidebar_class = hotel_pagoda_check_sidebar();
if($sidebar_class == 'pull-left'):
    $content_class = 'pull-right';
elseif($sidebar_class == 'pull-right'):
    $content_class = 'pull-left';
endif;
?>
    <div class="section-content section">
        <div class="container">
            <div class="row">
                <?php if($sidebar_class != 'no-sidebar'):?>
                <div class="col-md-8 <?php echo esc_html($content_class);?>">
                    <?php endif; ?>
                    <section id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

                            <?php
                            if (have_posts()) : ?>

                                <header class="page-header">
                                    <h1 class="page-title"><?php
                                        /* translators: %s: search query. */
                                        printf(esc_html__('Search Results for: %s', 'hotel-pagoda-lite'), '<span>' . get_search_query() . '</span>');
                                        ?></h1>
                                </header><!-- .page-header -->

                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    /**
                                     * Run the loop for the search to output the results.
                                     * If you want to overload this in a child theme then include a file
                                     * called content-search.php and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', 'search');

                                endwhile;

                                the_posts_pagination( array(
                                    'mid_size' => 2,
                                    'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'hotel-pagoda-lite' ),
                                    'next_text' => __( '<i class="fa fa-angle-right"></i>', 'hotel-pagoda-lite' ),
                                ) );

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>

                        </main><!-- #main -->
                    </section><!-- #primary -->
                    <?php if($sidebar_class != 'no-sidebar'):?>
                </div>
            <?php endif; ?>
                <?php if($sidebar_class != 'no-sidebar'):?>


                    <div class="col-md-4 sidebar <?php echo esc_html($sidebar_class);?>">

                        <div id="secondary">
                            <?php if (is_active_sidebar('hotel_pagoda_main_sidebar')) {
                                dynamic_sidebar('hotel_pagoda_main_sidebar');
                            } ?>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
get_footer();
